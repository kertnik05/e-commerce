<template>
    <div>
        <v-alert :type="type" :width="width" class="mx-auto mt-5" dismissible>
            {{ msg }}
        </v-alert>
    </div>
</template>
<script>
export default {
    name : 'Alert',
    props : {
        type : {
            type : String,
            required : true,
        },
        msg : {
            type : String,
            required : true,
        },
        width : {
            type : Number,
            default : 700
        }
    }
}
</script>