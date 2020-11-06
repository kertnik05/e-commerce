<template>
    <div>
        <Alert :type="type" :msg="message" v-if="message" />
        <v-card width="500" class="mx-auto mt-5">
            <v-card-title>{{ showForm ? 'Login User' : 'Logout User' }}</v-card-title>
            <v-card-text class="pt-4">
                <v-form @submit.prevent="login" ref="form" v-if="showForm">
                    <v-text-field
                        label="Email"
                        v-model="user.email"
                        prepend-icon="mdi-account-circle" 
                        :error-messages="error_validations && error_validations.email ? error_validations.email : '' "
                    />
                    <v-text-field
                        label="Password"
                        :type="showPassword ? 'text' : 'password'"
                        v-model="user.password"
                        prepend-icon="mdi-lock"
                        :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                        @click:append="showPassword = !showPassword"
                        :error-messages="error_validations && error_validations.password ? error_validations.password : ''"
                    />
                    <v-divider class="mb-3"></v-divider>
                    <v-layout justify-space-between>
                        <v-btn color="info" type="submit" v-if="showForm">Login</v-btn>
                    </v-layout>
                </v-form>
                <v-btn color="info" type="button" @click="logout" v-else>Logout</v-btn>
            </v-card-text>
        </v-card>
    </div>

</template>

<script>
    import Alert from '../components/Alert.vue'
    export default {
        name: 'LoginForm',
        components : {
            Alert
        },
        data() {
            return {
                showPassword: false,
                showForm: true,
                user: {
                    email: null,
                    password: null
                },
                message : '',
                type : '',
                error_validations : []
                
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
                        this.message = '';
                        this.error_validations = [];
                        // this.config.headers.Authorization = `Bearer ${localStorage.getItem('access_token')}`;
                        // alert('User logged in!');
                        // this.$emit('config');
                    }).catch(error => {
                        this.type = 'error';
                        this.message = error.response.data.message;
                        this.error_validations = error.response.data.errors;
                        // console.log(error.response.data.errors)
                    });

            },
             logout() {
                 this.$store.dispatch('current_user/logoutUser').then(response => {
                    this.type = 'success';
                    this.message = response.data.message;
                    this.showForm = !this.showForm;
                });
            }
        }
    }
</script>