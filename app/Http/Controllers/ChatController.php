<?php

namespace App\Http\Controllers;

use App\Events\PrivateChatEvent;
use App\Http\Resources\ChatResource;
use Illuminate\Http\Request;
use App\Models\Session;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function send(Session $session, Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);

        $message = $session->messages()->create(['content' => $requestContent['message']]);

        $chat = $message->createForSend($session->id);

        $message->createForReceive($session->id, $requestContent['to_user']);

        broadcast(new PrivateChatEvent($requestContent['message'], $chat));

        return response($message, 202);
    }

    public function chats(Session $session)
    {
        return ChatResource::collection($session->chats->where('user_id', auth()->id()));
    }

    public function read(Session $session)
    {
        $chats = $session->chats->where('read_at', null)->where('type', 0)->where('user_id', '!=', auth()->id());

        foreach ($chats as $chat) {
            $chat->update(['read_at' => Carbon::now()]);
        }
    }
}
