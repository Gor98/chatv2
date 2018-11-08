<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Open Chat</div>
                    <div class="card-body" >
                        <ul class="list-group" >
                            <li class="list-group-item" v-for="index in messages">{{index.text}} <small><b>{{index.name}}</b></small></li>
                        </ul>
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

                this.messages.push({text:this.text, name:'hhhhh'});
                this.text = '';
            },

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="css">
    .card-body li:nth-child(even){
        background-color: #ccc;
        text-align: end;
    }
    .card-body{
        height: 400px;
        overflow-y: scroll;
    }
    .card-footer{
        padding: 15px 0px 0px  0px;
    }

</style>
