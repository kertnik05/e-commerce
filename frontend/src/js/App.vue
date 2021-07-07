<template>
    <!-- <v-app>
        <Navbar></Navbar>
        <Sidebar></Sidebar>

        <router-view/>
    </v-app> -->
    <div>
        <Navigation />
        <router-view />
    </div>
</template>

<script>
// import Navbar from './components/Navbar.vue'
// import Sidebar from './components/Sidebar.vue'
import Navigation from './components/Navigation';

export default {
    name: 'App',
    components: {
        // Navbar,
        // Sidebar
        Navigation
    },
}
</script>
