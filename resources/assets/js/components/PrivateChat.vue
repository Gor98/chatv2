<template>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Open Chat</div>
                    <div class="card-body">
                        <ul class="list-group" >
                            <li  v-for="index in messages" v-if="index.user_id == user.id"   class="list-group-item col-6"  >{{index.text}} <small><b>{{index.user.name}} </b></small></li>
                            <li v-else  class="list-group-item col-6  offset-md-6"  style="background-color: #ccc;  text-align: end;">{{index.text}} <small><b>{{index.user_name}} </b></small></li>
                        </ul>

                    </div>
                    <div class="card-footer text-muted">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" v-model="text"  @keyup.enter="sendMessage" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" @click="sendMessage" type="button">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card card-default">
                    <div class="card-header">Users in Room</div>
                    <div class="card-body">
                        <ul class="list-group" >
                            <li  v-for="index in users" class="list-group-item"  >{{index.name}} </li>
                        </ul>
                    </div>
                    <div class="card-footer text-muted">
                        <a :href="redirect_rooms" class="btn btn-danger btn-lg btn-block" role="button" aria-pressed="true">Exit</a>
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
                users: [
                    {name:'sdfsdfdsfds'},
                    {name:'sdfsdfdsfds'},
                    {name:'sdfsdfdsfds'}
                ],
                chatRooms: [
                ],
            }
        },
        props:['room_id','user','redirect_rooms'],
        methods:{
            sendMessage(){
                // push messages to massages list
                this.messages.push({text:this.text,user:{id:this.user.id,name:this.user.name}});

                // send message
                axios.post('/addPrivateMessage',{roomId:this.room_id,userId:this.user.id, text:this.text}).then(response => {
                });
                this.text = '';
            },

        },
        mounted() {
            axios.get('/room/messages/'+this.room_id).then(response => {
                this.messages = response.data
                console.log(response.data);
                console.log('-----');
            });


            Echo.private('private-chat')
                .listen('.privateMessage', (e) => {
                    console.log(e);
                    this.messages.push(
                        {text:e.text, user_id:e.user_id,user_name:e.user_name, user:this.user,room_id:this.room_id }
                        );
                    console.log(this.messages);;
                });


        }
    }
</script>

<style lang="css">
    .list-group-item{
        border-radius: 9px;
        margin-top: 5px;
    }

    .card-body{
        height: 300px;
        overflow-y: scroll;
    }
    .card-footer{
        padding: 15px 10px 0  10px;
    }

</style>
