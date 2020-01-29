import Vue from 'vue'
import Vuex from 'vuex'
import category from "./tickets/category";
import tickets from "./tickets/tickets";
import roles from "./roles/roles";
import permissions from "./permissions/permissions";
import users from "./users/users";
Vue.use(Vuex);
export default new Vuex.Store({
    modules: {
        category,
        tickets,
        roles,
        permissions,
        users
    }
})
