window.axios = require('axios');
axios.defaults.baseURL = 'http://api.e-commerce.test/api';

import Vue from 'vue';
import vuetify from './plugins/vuetify';
import router from './plugins/router';
import store from './plugins/store';
import App from './App.vue';

axios.interceptors.request.use(req => {
    const userInfo = localStorage.getItem('user');
    const userData = JSON.parse(userInfo);
    if(userData){
        const token = userData.access_token;
        req.headers.Authorization = `Bearer ${token}`
    }
    return req;
});

new Vue({
    el : "#root",
    router,
    vuetify,
    store,
    render : h => h(App)
})
