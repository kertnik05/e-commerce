<template>
    <v-app>
        <Navbar></Navbar>
        <Sidebar></Sidebar>
        <router-view/>
    </v-app>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Sidebar from './components/Sidebar.vue'

export default {
    name: 'App',
    components: {
        Navbar,
        Sidebar
    },
}
</script>
