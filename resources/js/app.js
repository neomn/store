
import Alpine from 'alpinejs';
import Vue from 'vue'

require('./bootstrap');

window.Alpine = Alpine;
Alpine.start();

window.Vue=require('vue');
Vue.component('root', require('./components/Root').default);
const app = new Vue({
        el: '#app',
    });
