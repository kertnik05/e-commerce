<template>
    <div>
        <v-app-bar
        dense
        >
        <v-app-bar-nav-icon @click.stop="drawerStateChanged"></v-app-bar-nav-icon>

        <v-toolbar-title @click="$router.push('/')" style="cursor:pointer">
               E-Commerce
        </v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
            <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn icon>
            <v-icon>mdi-magnify</v-icon>
        </v-btn>

        <v-menu
            left
            bottom
        >
            <template v-slot:activator="{ on, attrs }">
            <v-btn
                icon
                v-bind="attrs"
                v-on="on"
            >
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
            </template>

            <v-list>
            <v-list-item>
                <v-list-item-title @click="$router.push('/login')" style="cursor:pointer">
                    <v-icon>mdi-account-circle</v-icon>
                        Login
                </v-list-item-title>
            </v-list-item>
            </v-list>
        </v-menu>
        </v-app-bar>
    </div>

</template>
<script>
export default {
    name : 'Nav',
    methods : {
        drawerStateChanged(){
            this.$root.$emit('drawerState');
        }
    }
}
</script>