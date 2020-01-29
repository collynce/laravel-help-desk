import Vue from 'vue'
import router from './router/index'
import store from './store/index'
require('./components/components');
require('./bootstrap');
import VueTailwind from 'vue-tailwind'

Vue.use(VueTailwind);

const app = new Vue({
    el: '#app',
    store,
    router
});
