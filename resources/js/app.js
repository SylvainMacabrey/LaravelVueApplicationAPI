require('./bootstrap');

import Alpine from 'alpinejs';

import { createApp } from 'vue';

import CustomerIndex from './components/CustumerIndex.vue';

import router from './router'

createApp({
    components: {
        CustomerIndex
    }
}).use(router).mount('#app');

window.Alpine = Alpine;

Alpine.start();
