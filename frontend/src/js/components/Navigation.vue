<template>
    <ul>
        <li>
            <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <template v-if="isAuthenticated">
            <li>
                {{ user.user_detail.first_name }} {{ user.user_detail.last_name }}
            </li>
            <li>
                <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
            </li>
            <li>
                <button type="button" @click="logout">Logout</button>
            </li>
        </template>
        <template v-else>
            <li>
                <router-link :to="{ name: 'login' }">Login</router-link>
            </li>
        </template>
    </ul>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: 'Navigation',
    computed: {
        ...mapGetters({
            isAuthenticated: 'auth/isAuthenticated',
            user: 'auth/user'
        })
    },
    methods: {
        ...mapActions({
            logoutAction: 'auth/logout'
        }),
        logout() {
            this.logoutAction();
            this.$router.replace({ name: 'home' });
        }
    }
}
</script>