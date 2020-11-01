const state = {
    user: null
};
const mutations = {
    setUser(state, user) {
        state.user = user;
        localStorage.setItem('user', JSON.stringify(user));
        axios.defaults.headers.common.Authorization = `Bearer ${user.access_token}`;
    },
    clearUser(state) {
        axios.post('users/logout').then(response => {
            localStorage.removeItem('user');
            state.user = null;
            alert('User logged out');
        }).catch(error => console.log(error));
    }
};
const actions = {
    loginUser({commit}, user) {
        axios.post('users/login', user).then(response => {
            alert('User logged in');
            commit('setUser', response.data);
        }).catch(error => console.log(error));
    },
    logoutUser({commit}) {
        commit('clearUser');
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