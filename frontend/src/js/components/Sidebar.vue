<template>
    <div>
        <v-navigation-drawer
        v-model="drawer"
        absolute
        bottom
        temporary
        >
        <v-list
            nav
            dense
        >
            <v-list-item-group
            v-model="group"
            active-class="deep-purple--text text--accent-4"
            >
            <v-list-item>
                <v-list-item-title>Foo</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-title>Bar</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-title>Fizz</v-list-item-title>
            </v-list-item>

            <v-list-item>
                <v-list-item-title>Buzz</v-list-item-title>
            </v-list-item>
            </v-list-item-group>
        </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
import { bus } from '../app.js';
export default {
    data() {
      return {
        drawer : false,
        group : null
      }
    },
    watch :{
      group(){
        this.drawer = false
      }
    },
    created(){
        bus.$on('drawerState', () => {
            this.drawer = !this.drawer;
        })
    }
}
</script>