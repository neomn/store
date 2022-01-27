
console.log('this is admin js file')

require('../bootstrap');
import Vue from 'vue';

window.Vue=require('vue');
Vue.component('panel', require('../components/admin/Panel').default);
const app =new Vue().$mount('#app');
