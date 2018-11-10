<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Open Chat</div>
                    <div class="card-body" >
                        <ul class="list-group" >
                            <li class="list-group-item" v-for="index in messages">{{index.text}}</li>
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" v-model="text"  @keyup.enter="sendMessage" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" @click="sendMessage" type="button">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                text:'',
                messages: [
                ],
            }
        },
        methods:{
            sendMessage(){
                // push messages to massages list
                this.messages.push({text:this.text});

                // send message
                axios.post('/addOpenMessage',{text:this.text}).then(response => {
                });
                this.text = '';
            },

        },
        mounted() {

            Echo.channel('openChat')
                .listen('.newMessage', (message) => {
                    this.messages.push(message);
                });

        }
    }
</script>

<style lang="css">
    .card-body li:nth-child(even){
        background-color: #ccc;
        text-align: end;
    }
    .card-body{
        height: 300px;
        overflow-y: scroll;
    }
    .card-footer{
        padding: 15px 10px 0  10px;
    }

</style>
