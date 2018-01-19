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
                    <li><a href = "#"><i class="fa fa-shopping-cart" aria-hidden="true" data-open="cart"></i></a></li>
                    <li><a href = "#"  @click="logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <router-view></router-view>
        <cart></cart>
    </div>
</template>

<script>
    import {get_header} from "../global/config";
    import {mapState} from 'vuex';
    import Cart from './Cart.vue';

    export default {
        data() {
            return {

            }
        },

        components: {
            'cart': Cart,
        },

        computed: {
            ...mapState({
                userStore:state => state.userStore,
            })
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

                         this.$auth.setAuthenticatedUser(response.data);

                         console.log("Authenticated - ",this.$auth.getAuthenticatedUser());

                         this.$store.dispatch('setUserObject',this.$auth.getAuthenticatedUser());
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
