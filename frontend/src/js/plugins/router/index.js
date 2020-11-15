import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import Home from '../../views/Home';
import LoginForm from '../../views/LoginForm';
import Dashboard from '../../views/Dashboard';

const guest = (to, from, next) => {
    if (!localStorage.getItem('access_token')) {
        return next();
    } else {
        return next('/');
    }
};

const auth = (to, from, next) => {
    if (localStorage.getItem('access_token')) {
        return next();
    } else {
        return next('/login');
    }
};

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: LoginForm,
        beforeEnter: guest
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        beforeEnter: auth
    },
];

export default new VueRouter({
    mode: 'history',
    routes
});
