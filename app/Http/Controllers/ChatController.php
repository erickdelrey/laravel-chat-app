<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class ChatController extends Controller
{
    public function send(Session $session, Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);

        $message = $session->messages()->create(['content' => $requestContent['message']]);

        $message->createForSend($session->id);

        $message->createForReceive($session->id, $requestContent['to_user']);

        return response($message, 202);
    }
}
