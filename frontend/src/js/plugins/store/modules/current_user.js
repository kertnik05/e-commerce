const state = {
    user: null
};
const mutations = {
    setUser(state, user) {
        state.user = user;
        localStorage.setItem('user', JSON.stringify(user));

    },
     clearUser(state) {
        localStorage.removeItem('user');
        state.user = null;
    }
};
const actions = {
    async loginUser({commit}, user) {
          await axios.post('users/login', user).then(response => {
            // alert('User logged in');
            commit('setUser', response.data);
        })
    },
     async logoutUser({commit}) {
        return await axios.post('users/logout').then(response => {
            commit('clearUser');
            return response;
        })
    }
};
const getters = {
    isLogged: state => !!state.user
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}