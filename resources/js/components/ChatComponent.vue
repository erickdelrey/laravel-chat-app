<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Private Chat App</div>
                    <ul class="list-group">
                        <li class="list-group-item">Chaos</li>
                        <li class="list-group-item">White Foot</li>
                        <li class="list-group-item">Coffee</li>
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
                open: true
            }
        },
        methods: {
            close() {
                this.open = false;
            }
        }
    }
</script>
<style scoped>
.list-group-item {
    border: none;
    border-bottom: 1px solid lightgray;
}
</style>
