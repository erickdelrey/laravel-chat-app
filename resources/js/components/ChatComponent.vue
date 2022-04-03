<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Private Chat App</div>
                    <ul class="list-group">
                        <a href="" @click.prevent>
                            <li class="list-group-item"
                                :key="friend.id"
                                v-for="friend in friends">
                                <a href="" @click.prevent>
                                {{friend.name}}
                                </a>
                            </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <message-component v-if="open" @close="close"></message-component>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageComponent from './MessageComponent';
    export default {
        components: {MessageComponent},
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                open: true,
                friends: []
            }
        },
        methods: {
            close() {
                this.open = false;
            },
            getFriends() {
                axios.post('/getFriends').then(res => console.log(res.data));
            }
        },
        created() {
            this.getFriends();
        }
    }

</script>
<style scoped>
.list-group-item {
    border: none;
    border-bottom: 1px solid lightgray;
}
</style>
