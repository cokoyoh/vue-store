
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Auth from './packages/auth/auth';
import router from './router';

require('./bootstrap');

window.Vue = require('vue');

Vue.use(Auth);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/Home.vue'));
// Vue.component('items', require('./components/Items.vue'));
// Vue.component('add-item', require('./components/AddItem.vue'));
// Vue.component('item-card', require('./components/ItemCard.vue'));



/**
 * Auth guards here
 */
router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.forGuests))
    {
        if(Vue.auth.isAuthenticated())
        {
            console.log("You are not authenticated");
            next({
                path: '/items'
            })
        }
        else next()
    }

    if(to.matched.some(record => record.meta.requiresAuth))
    {
        if(! Vue.auth.isAuthenticated())
        {
            console.log("You are authenticated");
            next({
                path: '/login'
            })
        }
        else next()
    }
    else next()
});


const app = new Vue({
    el: '#app',
    router,
});
