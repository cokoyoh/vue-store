<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {

            }
        },
        components: {
//            'login': Login,
        },
        mounted()
        {
            console.log("You are logged in");
        }
    }
</script>
