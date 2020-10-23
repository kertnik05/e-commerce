<template>
    <v-card width="500" class="mx-auto mt-10">
        <v-card-title>Login</v-card-title>
        <v-card-text class="pt-4">
            <v-form @submit.prevent="login" ref="form">
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
                    <v-btn color="info" type="submit">Login</v-btn>
                </v-layout>
            </v-form>
        </v-card-text>
    </v-card>
</template>

<script>
    export default {
        name: 'LoginForm',
        data() {
            return {
                showPassword: false,
                user: {
                    email: null,
                    password: null
                }
            }
        },
        methods: {
            login() {
                alert('test');
            }
        }
    }
</script>