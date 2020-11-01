import Vue from 'vue';
import Vuex from 'vuex';
import current_user from './modules/current_user';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        current_user
    }
});