import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from '../../views/Home';
import LoginForm from '../../views/LoginForm';

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: LoginForm
    }
];

export default new VueRouter({
    mode: 'history',
    routes
});
