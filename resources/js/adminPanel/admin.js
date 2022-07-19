import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import Vue from 'vue';
import VueRouter from "vue-router";
//import adminRouter from "../router/admin/adminRouter";


import App from "../components/adminPanel/App";
import Panel from "../components/adminPanel/Panel";
import Products from "../components/adminPanel/Products";
import Users from "../components/adminPanel/Users";
import Analytics from "../components/adminPanel/Analytics";
import Settings from "../components/adminPanel/Settings";
import NotFound from "../components/adminPanel/NotFound";
import Categories from "../components/adminPanel/Categories";
import Admins from "../components/adminPanel/Admins";


require('../web/bootstrap');
Vue.use(VueRouter)

library.add(fas)
library.add(fab)
library.add(far)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

Vue.component('App', require('../components/adminPanel/App').default);

const routes=[
        { path: '/panel', name: 'panel', component: Panel},
        { path: '/panel/products', name: 'products', component: Products},
        { path: '/panel/categories', name: 'categories', component: Categories},
        { path: '/panel/users', name: 'users', component: Users},
        { path: '/panel/admins', name: 'admins', component: Admins},
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

