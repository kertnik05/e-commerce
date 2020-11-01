import Vue from 'vue';
import '@mdi/font/css/materialdesignicons.css'
import vuetify from './plugins/vuetify';
import router from './plugins/router';
import App from '../js/App.vue';

new Vue({
    el : "#root",
    router,
    vuetify,
    render : h => h(App)
})