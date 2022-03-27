<template>
    <div class="card chat-box">
        <div class="card-header">
            Chats

            <!-- Close Button -->
            <a href="" @click.prevent="close">
                <i class="fa fa-times float-right" aria-hidden="true"></i>
            </a>
            <!-- Close Button Ends -->

            <!-- Options -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <i class="fa fa-ellipsis-v float-right mr-4" aria-hidden="true"></i>
            <!-- Options Ends -->
        </div>
        <div class="card-body" v-chat-scroll>
                <p class="card-text" v-for="chat in chats" :key="chat.message">
                    {{chat.message}}
                </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Write your message here">
                </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                chats: []
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