import Alpine from 'alpinejs';
import Vue from 'vue'
import VueRouter from "vue-router";

import {library} from '@fortawesome/fontawesome-svg-core'
import {fas} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import {fab} from "@fortawesome/free-brands-svg-icons";
import {far} from "@fortawesome/free-regular-svg-icons";

import Welcome from "../components/web/Welcome";
import Product from "../components/web/Product";
import NotFound from "../components/web/NotFound";
import Login from "../components/web/Login";
import Dashboard from "../components/web/Dashboard";
import Categories from "../components/web/Categories";
import AboutUs from "../components/web/AboutUs";
import ShoppingCart from "../components/web/ShoppingCart";
import Register from "../components/web/Register";

require('./bootstrap');
window.Vue = require('vue');
Vue.use(VueRouter);
window.Alpine = Alpine;
Alpine.start();
library.add(fas)
library.add(fab)
library.add(far)


Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('App', require('../components/web/App').default);
Vue.config.productionTip = false

const routes = [
    {path: '/', name: 'welcome', component: Welcome},
    {path: '/categories/:category?', name: 'categories', component: Categories , props: true },
    {path: '/product/:product_number', name: 'product', component: Product},
    {path: '/shopping-cart', name: 'shoppingCart', component: ShoppingCart},
    {path: '/about-us' , name: 'aboutUs' , component: AboutUs },
    {path: '/login', name: 'login', component: Login},
    {path: '/register', name: 'register', component: Register},
    {path: '/dashboard', name: 'dashboard', component: Dashboard},
    {path: '/:catchAll(.*)', name: '404' , component: NotFound},
];

const router = new VueRouter({
    mode: 'history',
    routes,

})

const web = new Vue({
    el: '#app',
    router
});
