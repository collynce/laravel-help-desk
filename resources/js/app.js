import router from './router/index'
import store from './store/index'
require('./components/components');
require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    store,
    router
});
