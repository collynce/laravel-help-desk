import Vue from 'vue'
import Vuex from 'vuex'
// import router from "../router";
// import axios from 'axios'
import category from "./tickets/category";
import tickets from "./tickets/tickets";
Vue.use(Vuex);
export default new Vuex.Store({
    modules:{
        category,
        tickets
    }
})
