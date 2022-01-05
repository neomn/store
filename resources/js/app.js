import Vue from "vue";

require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const app = new Vue({
    el: '#app',
    data() {
        return {}
    }
});

Vue.createApp(app).mount('#app');
