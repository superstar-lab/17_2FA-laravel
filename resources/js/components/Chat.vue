<template>
    <v-layout row>
        <v-flex xs12 offset-sm3>
            <v-card class="chat-card">
                <v-list>
                    <v-subheader
                    >
                        Chat
                    </v-subheader>
                    <v-divider></v-divider>
                    <message-list :user="user" :all-messages="allMessages" :admin="this.admin"></message-list>
                </v-list>
            </v-card>
        </v-flex>

        <div class="floating-div">
            <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />
        </div>

        <v-footer style="width:100%"
                  color="grey"
        >
            <v-layout row>
<!--                <v-flex class="ml-2 text-right" xs1>-->
<!--                    <v-btn @click="toggleEmo" fab dark small color="pink">-->
<!--                        <v-icon>insert_emoticon </v-icon>-->
<!--                    </v-btn>-->
<!--                </v-flex>-->

                <v-flex xs1 class="text-center">
                    <file-upload
                        v-if="admin"
                        :post-action="`/messages?user=${user.id}`"
                        ref='upload'
                        @input-file="$refs.upload.active = true"
                        :headers="{'X-CSRF-TOKEN': token}"
                    >
                        <v-icon class="mt-3">attach_file</v-icon>
                    </file-upload>
                    <file-upload
                        v-if="!admin"
                        post-action="/messages"
                        ref='upload'
                        @input-file="$refs.upload.active = true"
                        :headers="{'X-CSRF-TOKEN': token}"
                    >
                        <v-icon class="mt-3">attach_file</v-icon>
                    </file-upload>

                </v-flex>
                <v-flex xs9 >
                    <v-text-field
                        rows=2
                        v-model="message"
                        label="Enter Message"
                        single-line
                        @keyup.enter="sendMessage"
                    ></v-text-field>
                </v-flex>

                <v-flex xs1>
                    <v-btn
                        @click="sendMessage"
                        dark class="mt-3 ml-2 white--text" small color="green">send</v-btn>
                </v-flex>
            </v-layout>
        </v-footer>
    </v-layout>
</template>

<script>
import { Picker } from 'emoji-mart-vue'
import MessageList from './_message-list.vue'
export default {
    props:['user','admin'],
    components:{
        Picker,
        MessageList
    },

    data () {
        return {
            message:null,
            emoStatus: false,
            myText:null,
            allMessages:[],
            token:document.head.querySelector('meta[name="csrf-token"]').content
        }
    },
    methods:{
        sendMessage(){
            //check if there message
            if(!this.message){
                return alert('Please enter message');
            }
            if(this.admin){
                axios.post('/messages', {message: this.message, user: this.user}).then(response => {
                    this.message=null;
                    this.emoStatus=false;
                    // this.allMessages.push(response.data.message)
                    setTimeout(this.scrollToEnd,100);
                });
            }else{
                axios.post('/messages', {message: this.message}).then(response => {
                    this.message=null;
                    this.emoStatus=false;
                    // this.allMessages.push(response.data.message)
                    setTimeout(this.scrollToEnd,100);
                });
            }

        },
        fetchMessages() {
            if(this.admin){
                axios.get(`/messages?user=${this.user.id}`).then(response => {
                    this.allMessages = response.data;
                });
            }else{
                axios.get('/messages').then(response => {
                    this.allMessages = response.data;
                });
            }

        },
        onInput(e){
            if(!e){
                return false;
            }
            if(!this.message){
                this.message=e.native;
            }else{
                this.message=this.message + e.native;
            }
        },
        toggleEmo(){
            this.emoStatus= !this.emoStatus;
        }
    },
    mounted(){

    },
    created(){
        this.fetchMessages();
        // Echo.private('chat')
        //     .listen('MessageSent',(e)=>{
        //         this.allMessages.push(e.message)
        //         // setTimeout(this.scrollToEnd,100);
        //     });

        Echo.listen(`chat.${this.user.id}`,'MessageSent',(e) => {
            this.allMessages.push(e.message);
        });
    }

}
</script>

<style scoped>
.chat-card{
    margin-bottom:10px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}
</style>
