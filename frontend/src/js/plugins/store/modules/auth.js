export default {
    namespaced: true,
    state: {
        access_token: null,
        user: null
    },
    mutations: {
        SET_TOKEN(state, access_token) {
            state.access_token = access_token;
        },
        SET_USER(state, user) {
            state.user = user;
        }
    },
    getters: {
        isAuthenticated(state) {
            return (state.access_token && state.user) ? true : false;
        },
        user(state) {
            return state.user;
        }
    },
    actions: {
        login({ dispatch }, credentials) {
            axios.post('users/login', credentials).then(response => {
                dispatch('attempt', response.data.access_token);
            }).catch(error => {
                console.log(error);
            });
        },
        attempt({ commit, state }, access_token) {
            if (access_token) commit('SET_TOKEN', access_token);

            if (!state.access_token) return;

            axios.get('users/current-user').then(response => {
                commit('SET_USER', response.data);
            }).catch(() => {
                commit('SET_TOKEN', null);
                commit('SET_USER', null);
            });
        },
        logout({ commit }) {
            axios.post('users/logout').then(() => {
                commit('SET_TOKEN', null);
                commit('SET_USER', null);
                localStorage.removeItem('access_token');
            })
        }
    }
}