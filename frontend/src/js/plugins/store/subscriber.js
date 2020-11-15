import store from './index';

store.subscribe(mutation => {
    switch(mutation.type) {
        case 'auth/SET_TOKEN':
            if (mutation.payload) {
                axios.defaults.headers.common.Authorization = `Bearer ${mutation.payload}`;
                localStorage.setItem('access_token', mutation.payload);
            } else {
                axios.defaults.headers.common.Authorization = null;                
                localStorage.removeItem('access_token');
            }
            break;
    }
});