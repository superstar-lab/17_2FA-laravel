require('./bootstrap');

window.Vue = require('vue');


import vuetify from './src/plugins/vuetify.js' // path to vuetify export

import VueChatScroll from "vue-chat-scroll";

Vue.use(VueChatScroll);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const VueUploadComponent = require('vue-upload-component')

Vue.component('file-upload', VueUploadComponent).default

Vue.component('Chat', require('./components/Chat.vue').default);



new Vue({
    vuetify
}).$mount('#app')
