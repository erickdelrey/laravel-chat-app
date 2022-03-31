<template>
    <div class="card chat-box">
        <div class="card-header">
            <b :class="{'text-danger':session_block}">
                User Name
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
                    {{chat.message}}
                </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write your message here" :disabled="session_block">
                </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                chats: [],
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
                console.log('yeah');
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
.float-right {
    float: right;
}
.mr-4 {
    margin-right: 4px;
}
</style>
