window.axios = require('axios');
axios.defaults.baseURL = 'http://api.e-commerce.test/api';

import Vue from 'vue';
import '@mdi/font/css/materialdesignicons.css'
import vuetify from './plugins/vuetify';
import router from './plugins/router';
import App from '../js/App.vue';
import store from './plugins/store';
import App from './components/App';

new Vue({
    el : "#root",
    router,
    vuetify,
    store,
    render : h => h(App)
})
