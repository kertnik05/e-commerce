import Vue from 'vue';
import vuetify from './plugins/vuetify';
import store from './plugins/store';
import App from './components/App';

new Vue({
    el: '#root',
    vuetify,
    store,
    components: {
        App
    }
});