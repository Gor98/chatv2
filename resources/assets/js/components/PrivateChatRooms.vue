<template>
    <div class="container">
        <div class="row ">
           <div class="col-md-4">
               <div class="card mb-4 shadow-sm">
                   <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_166fcff6628%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_166fcff6628%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.234375%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                   <div class="card-body">
                       <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                       <div class="row align-items-center">
                           <div class="col-md-8">
                               <button type="button" class="btn btn-success btn-lg btn-block">Join</button>
                           </div>
                           <div class="col-md-4">
                               <div class="d-flex justify-content-between align-items-center">
                                   <small class="text-muted">XXX members</small>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <div class="row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#createRoom">
                Create Room
            </button>

            <!-- Modal -->
            <div class="modal fade" id="createRoom" tabindex="-1" role="dialog" aria-labelledby="createRoom" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Create Room</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Name</label>
                                <input type="text" v-model="room.name" name="name" v-validate="'required'" :class="{ 'is-invalid': submitted && errors.has('name') }" class="form-control" id="formGroupExampleInput" placeholder="name">
                                <div v-if="submitted && errors.has('name')" class="invalid-feedback">{{ errors.first('name') }}</div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Description</label>
                                <input type="text" v-model="room.description" name="description" v-validate="'required'" :class="{ 'is-invalid': submitted && errors.has('description') }" class="form-control" id="formGroupExampleInput2" placeholder="description">
                                <div v-if="submitted && errors.has('description')" class="invalid-feedback">{{ errors.first('description') }}</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" @click='createRoom' :data-dismiss="dismissModal" class="btn btn-primary">Save changes</button>
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
                dismissModal:'',
                room:{
                    name:'',
                    description:''
                },
                submitted: false,
                messages: [
                ],
                chatRooms: [
                ],
            }
        },
        methods:{
            sendMessage(){
                // push messages to massages list
                this.messages.push({text:this.text});

                // send message
                axios.post('/addPrivateMessage',{text:this.text}).then(response => {
                });
                this.text = '';
            },

            createRoom(){
                this.submitted = true;

                this.$validator.validate().then(valid => {
                    if (valid) {
                        this.dismissModal = 'modal'
                    }
                });


            },

        },
        mounted() {

            // Echo.join('privateChat')
            //     .listen('.newPrivateMessage', (e) => {
            //         // this.messages.push(e);
            //         console.log(e);
            //     });

        }
    }
</script>

<style lang="css">


</style>
