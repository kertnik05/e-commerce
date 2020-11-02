window.axios = require('axios');
axios.defaults.baseURL = 'http://api.e-commerce.test/api';

import Vue from 'vue';
import vuetify from './plugins/vuetify';
import router from './plugins/router';
import store from './plugins/store';
import App from './App';

new Vue({
    el : "#root",
    router,
    vuetify,
    store,
    render : h => h(App)
})
