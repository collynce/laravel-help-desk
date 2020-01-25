import Vue from "vue";
import VueRouter from "vue-router";
import tickets from "../views/admin/tickets";
import roles from "../views/admin/roles";
import permissions from "../views/admin/permissions";

Vue.use(VueRouter);
const router = new VueRouter({
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/tickets',
            name: 'tickets',
            component: tickets
        },
        {
            path: '/roles',
            name: 'roles',
            component: roles
        },
        {
            path: '/permissions',
            name: 'permissions',
            component: permissions
        },
    ]
});

export default router;
