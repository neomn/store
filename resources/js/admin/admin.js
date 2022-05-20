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
import NotFound from "../components/admin/NotFound";


require('../web/bootstrap');
Vue.use(VueRouter)

library.add(fas)
library.add(fab)
library.add(far)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

Vue.component('App', require('../components/admin/App').default);

const routes=[
        { path: '/panel', name: 'panel', component: Panel},
        { path: '/panel/products', name: 'products', component: Products},
        { path: '/panel/users', name: 'users', component: Users},
        { path: '/panel/analytics', name: 'analytics', component: Analytics},
        { path: '/panel/settings', name: 'settings', component: Settings},
        { path: '/panel/:catchAll(.*)', name: '404', component: NotFound},
]

const router = new VueRouter({
    mode:'history',
    routes,
})

const app = new Vue({
    //mode:"history",
    router,
    el:'#app'
})

