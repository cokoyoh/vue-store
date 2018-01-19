import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Login from '../components/authentication/Login.vue';
import Register from '../components/authentication/Register.vue';
import Items from '../components/Items.vue';

const router  = new VueRouter({
    routes: [
        {
          path: "/",
          component: Items,
          meta:  {
          }
        },
        {
            path: "/login",
            component: Login,
            meta: {
                forGuests: true,
            }
        },
        {
            path: "/register",
            component: Register,
            meta:  {
                forGuests: true,
            }
        },
        {
            path: "/items",
            component: Items,
            meta:  {
                requiresAuth: false,
            }
        },
    ],
    // mode: 'history'
});

export default router
