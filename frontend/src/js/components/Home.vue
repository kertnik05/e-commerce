<template>
    <v-app>
        <v-main>
            <v-container>
                Hello world
                <LoginForm />
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
    import LoginForm from './LoginForm';

    export default {
        name: 'App',
        components: {
            LoginForm
        }
    }
</script>