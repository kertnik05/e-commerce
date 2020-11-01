<template>
    <v-card width="500" class="mx-auto mt-10">
        <v-card-title>{{ showForm ? 'Login User' : 'Logout User' }}</v-card-title>
        <v-card-text class="pt-4">
            <v-form @submit.prevent="login" ref="form" v-if="showForm">
                <v-text-field
                    label="Email"
                    v-model="user.email"
                    prepend-icon="mdi-account-circle" 
                />
                <v-text-field
                    label="Password"
                    :type="showPassword ? 'text' : 'password'"
                    v-model="user.password"
                    prepend-icon="mdi-lock"
                    :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                    @click:append="showPassword = !showPassword"
                />
                <v-divider class="mb-3"></v-divider>
                <v-layout justify-space-between>
                    <v-btn color="info" type="submit" v-if="showForm">Login</v-btn>
                </v-layout>
            </v-form>
            <v-btn color="info" type="button" @click="logout" v-else>Logout</v-btn>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        name: 'LoginForm',
        data() {
            return {
                showPassword: false,
                showForm: true,
                user: {
                    email: null,
                    password: null
                },
                config: {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('access_token')}`
                    }
                }
            }
        },
        created() {
            const userInfo = localStorage.getItem('user');
            if (userInfo) {
                const userData = JSON.parse(userInfo);
                this.showForm = false;
                this.$store.commit('current_user/setUser', userData);
            }
        },
        methods: {
            login() {
                this.$store.dispatch('current_user/loginUser', this.user).then(() => {
                    this.showForm = !this.showForm;
                    this.user.email = null;
                    this.user.password = null;
                    // this.config.headers.Authorization = `Bearer ${localStorage.getItem('access_token')}`;
                    // alert('User logged in!');
                    // this.$emit('config');
                });
            },
            logout() {
                this.$store.dispatch('current_user/logoutUser').then(() => {
                    this.showForm = !this.showForm;
                });
            }
        }
    }
</script>