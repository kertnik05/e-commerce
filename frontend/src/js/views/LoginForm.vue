<template>
    <div>
        <Alert :type="type" :msg="message" v-if="message" />
        <v-card width="500" class="mx-auto mt-5">
            <v-card-title>Login User</v-card-title>
            <v-card-text class="pt-4">
                <v-form @submit.prevent="login" ref="form">
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
                        <v-btn color="info" type="submit">Login</v-btn>
                    </v-layout>
                </v-form>
            </v-card-text>
        </v-card>
    </div>

</template>

<script>
    import Alert from '../components/Alert.vue';
    import { mapActions } from 'vuex';

    export default {
        name: 'LoginForm',
        components : {
            Alert
        },
        data() {
            return {
                showPassword: false,
                user: {
                    email: null,
                    password: null
                },
                message : '',
                type : '',
                error_validations : []
                
            }
        },
        methods: {
            ...mapActions({
                loginAction: 'auth/login'
            }),
            login() {
                this.loginAction(this.user).then(() => {
                    this.$router.replace({ name: 'dashboard' });
                })
            }
        }
    }
</script>