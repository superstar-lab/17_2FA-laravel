<template>
    <div id="messagev" style="height: 400px;overflow-y: scroll" v-chat-scroll>
        <v-list
            class="px-2 align-center"
            style="display: flex"
            v-for="(message, index) in allMessages"
            :key="index"
        >

            <div v-if="!message.isAdmin && !admin" class="ml-auto">
                <v-flex>
                    <span class="small font-italic">you</span>
                </v-flex>
                <div v-if="message.message" class="text-message-container">
                    <v-banner style="border-radius: 25px" elevation="10" :color="(!message.isAdmin)?'#00BCD4':'#E91E63'">
                        <div style="color:#fff; padding: 7px 15px; line-height: 1.5em">{{message.message}}</div>
                    </v-banner>
                </div>
                <div class="image-container">
                    <a v-if="message.image" :href="'/'+message.image" target="blank">
                        <img :src="'/'+message.image" alt="">
                    </a>
                </div>
                <v-flex class="caption font-italic pt-1" style="font-size:10px">
                    {{message.created_at}}
                </v-flex>
            </div>


            <div v-if="message.isAdmin && !admin" class="mr-auto">
                <v-flex>
                    <span class="small font-italic">Admin</span>
                </v-flex>
                <div v-if="message.message" class="text-message-container">
                    <v-banner style="border-radius: 25px" elevation="10" :color="(!message.isAdmin)?'#00BCD4':'#E91E63'">
                        <div style="color:#fff; padding: 7px 15px; line-height: 1.5em">{{message.message}}</div>
                    </v-banner>
                </div>
                <div class="image-container">
                    <a v-if="message.image" :href="'/'+message.image" target="blank">
                        <img :src="'/'+message.image" alt="">
                    </a>
                </div>
                <v-flex class="caption font-italic pt-1" style="font-size:10px">
                    {{message.created_at}}
                </v-flex>
            </div>

            <div v-if="message.isAdmin && admin" class="ml-auto">
                <v-flex>
                    <span class="small font-italic">you</span>
                </v-flex>
                <div v-if="message.message"  class="text-message-container">
                    <v-banner style="border-radius: 25px" elevation="10" :color="(!message.isAdmin)?'#00BCD4':'#E91E63'">
                        <div style="color:#fff; padding: 7px 15px; line-height: 1.5em">{{message.message}}</div>
                    </v-banner>
                </div>
                <div class="image-container">
                    <a v-if="message.image" :href="'/'+message.image" target="blank">
                        <img :src="'/'+message.image" alt="">
                    </a>
                </div>
                <v-flex class="caption font-italic pt-1" style="font-size:10px">
                    {{message.created_at}}
                </v-flex>
            </div>


            <div v-if="!message.isAdmin && admin" class="mr-auto">
                <v-flex>
                    <span class="small font-italic">{{message.user.name}}</span>
                </v-flex>
                <div v-if="message.message" class="text-message-container">
                    <v-banner style="border-radius: 25px" elevation="10" :color="(!message.isAdmin)?'#00BCD4':'#E91E63'">
                        <div style="color:#fff; padding: 7px 15px; line-height: 1.5em">{{message.message}}</div>
                    </v-banner>
                </div>
                <div class="image-container">
                    <a v-if="message.image" :href="'/'+message.image" target="blank">
                        <img :src="'/'+message.image" alt="">
                    </a>

                </div>
                <v-flex class="caption font-italic pt-1" style="font-size:10px">
                    {{message.created_at}}
                </v-flex>
            </div>

        </v-list>

    </div>
</template>

<script>
export default {
    props:['user','allMessages','admin'],
}
</script>

<style scoped>
.chat-card{
    margin-bottom:140px;
}
.floating-div{
    position: fixed;
}
.chat-card img {
    max-width: 300px;
    max-height: 200px;
}
</style>
