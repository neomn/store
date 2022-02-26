import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import Vue from 'vue';
import VueRouter from "vue-router";
//import adminRouter from "../router/admin/adminRouter";


import App from "../components/admin/App";
import Panel from "../components/admin/Panel";
import Products from "../components/admin/Products";
import Users from "../components/admin/Users";
import Analytics from "../components/admin/Analytics";
import Settings from "../components/admin/Settings";


require('../bootstrap');
Vue.use(VueRouter)

library.add(fas)
library.add(fab)
library.add(far)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

Vue.component('App', require('../components/admin/App').default);


const routes=[
        { path: '/admin/App', name: 'app', component: App},
        { path: '/admin/panel', name: 'panel', component: Panel},
        { path: '/admin/products', name: 'products', component: Products},
        { path: '/admin/users', name: 'users', component: Users},
        { path: '/admin/analytics', name: 'analytics', component: Analytics},
        { path: '/admin/settings', name: 'settings', component: Settings},]

const router = new VueRouter({
    mode:'history',
    routes,
})

const app = new Vue({
    //mode:"history",
    router,
    el:'#app'
})

