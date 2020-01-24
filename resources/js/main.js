import router from './router/index'

require('./components/components');
require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    router
});
