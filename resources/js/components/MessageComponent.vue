<template>
    <div class="card chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session_block}">
                {{ friend.name }}
                <span v-if="session_block">(Blocked)</span>
            </b>

            <!-- Close Button -->
            <a href="" @click.prevent="close">
                <i class="fa fa-times float-right" aria-hidden="true"></i>
            </a>
            <!-- Close Button Ends -->

            <!-- Options -->
            <div class="dropdown float-end">
                <a href="" type="button" id="dropdownMenuButton1"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v mr-4" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li v-if="session_block"><a class="dropdown-item" href="#" @click.prevent="unblock">Unblock</a></li>
                    <li v-else><a class="dropdown-item" href="#" @click.prevent="block">Block</a></li>
                    <li><a class="dropdown-item" href="#">Clear Chat</a></li>
                </ul>
            </div>
            <!-- Options Ends -->
        </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">
                {{ chat.message }}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" class="form-control" v-model="message" placeholder="Write your message here"
                       :disabled="session_block">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['friend'],
    data() {
        return {
            chats: [],
            message: null,
            session_block: false
        }
    },
    created() {
        this.chats.push({
                message: 'Heyyyyyyy',
            },
            {
                message: 'How are you'
            },
            {
                message: 'Heyy',
            },
            {
                message: 'How are yofdu'
            },
            {
                message: 'Heyyyy',
            },
            {
                message: 'How are you!'
            },
            {
                message: 'Heyyyyyyy4',
            },
            {
                message: 'How are yoyu'
            },
            {
                message: 'Heyyyyyd',
            },
            {
                message: 'How are yotfu'
            })
    },
    mounted() {
        console.log('MessageComponent mounted.')
    },
    methods: {
        send() {
            let $message = this.message;
            if ($message) {
                this.pushToChats($message)
                let requestBody = {
                    message: $message,
                    to_user: this.friend.id
                }
                axios.post(`/session/${this.friend.session.id}/send`, requestBody)
                this.message = null;
            }
        },
        pushToChats(message) {
            this.chats.push({message: message});
        },
        close() {
            this.$emit('close')
        },
        block() {
            this.session_block = true;
        },
        unblock() {
            this.session_block = false;
        }
    }
}
</script>
<style scoped>
.chat-box {
    height: 400px;
}

.card-body {
    overflow-y: scroll;
}

.mr-4 {
    margin-right: 10px;
}
</style>
