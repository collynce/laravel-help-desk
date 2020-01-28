import Vue from 'vue'
Vue.component('example-component', require('../views/ExampleComponent.vue').default);
Vue.component('admin-view', require('../views/admin/app').default);
Vue.component('ticketview', require('../views/client/ticketshome').default);
Vue.component('engineers', require('../views/eng/engtickets').default);
