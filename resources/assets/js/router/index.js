import Vue from 'vue'
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Login from '../components/authentication/Login.vue';
import Register from '../components/authentication/Register.vue';

const router  = new VueRouter({
    routes: [
        {
            path: "/login",
            component: Login,
        },
        {
            path: "/register",
            component: Register,
        }
    ],
    mode: 'history'
});

export default router
