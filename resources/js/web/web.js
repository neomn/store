
import Alpine from 'alpinejs';
import Vue from 'vue'
import VueRouter from "vue-router";

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import App from "../components/web/App";
import Welcome from "../components/web/Welcome";
import Products from "../components/web/Products";
import {fab} from "@fortawesome/free-brands-svg-icons";
import {far} from "@fortawesome/free-regular-svg-icons";


require('./bootstrap');
window.Vue=require('vue');
Vue.use(VueRouter);
window.Alpine = Alpine;
Alpine.start();
library.add(fas)
library.add(fab)
library.add(far)


Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('App', require('../components/web/App').default);
Vue.config.productionTip = false

const routes=[
    { path: '/app', name: 'app', component: App},
    { path: '/', name: 'welcome', component: Welcome},
    { path: '/categories', name: 'categories', component: Products}]

const router = new VueRouter({
    mode:'history',
    routes,
})

const web = new Vue({
        el: '#app',
        router
    });
