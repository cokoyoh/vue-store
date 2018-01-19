<template>
    <div>
        <div class = "top-bar" v-show="this.$auth.isAuthenticated()">
            <div class = "top-bar-left">
                <ul class = "dropdown menu" data-dropdown-menu>
                    <li class = "menu-text">Vue Store</li>
                </ul>
            </div>
            <div class = "top-bar-right">
                <ul class = "menu dropdown" data-dropdown-menu>
                    <li><a href = "/"> <i class="fa fa-home"></i> Home</a></li>
                    <li><a href = "/"> <i class="fa fa-home"></i> About</a></li>
                    <li><a href = "/"> <i class="fa fa-envelope-o"></i> Contact</a></li>
                    <li><a href = "#"><i class="fa fa-sign-out" aria-hidden="true" @click="logout"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    import {get_header} from "../global/config";

    export default {
        data() {
            return {

            }
        },
         methods: {
            logout()
            {
                console.log("Logging out");

                this.$auth.destroyToken();

                this.$router.push('/login')
            },

             setAuthenticatedUser()
             {
                 axios.get('/api/user', {headers:get_header()})
                     .then(response => {
                         console.log('Response', response.data);
                     })
             }
         },
        mounted()
        {
            this.setAuthenticatedUser();
            console.log("You are logged in");
        }
    }
</script>
