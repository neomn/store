
import Alpine from 'alpinejs';
import Vue from 'vue'
import VueRouter from "vue-router";

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false

require('./bootstrap');

window.Alpine = Alpine;
Alpine.start();

window.Vue=require('vue');
Vue.component('root', require('../components/web/Welcome').default);
Vue.use(VueRouter);
const web = new Vue({
        el: '#app',
    });
