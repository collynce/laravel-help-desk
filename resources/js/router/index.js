import Vue from "vue";
import VueRouter from "vue-router";
import tickets from "../views/admin/tickets";
import rolesView from "../views/admin/rolesView";
import permissions from "../views/admin/userRoles";
import ticketdetails from "../views/client/ticketdetails";
import ticketview from "../views/client/ticketview";
import details from "../views/eng/details";
import engtickets from "../views/eng/engtickets";
Vue.use(VueRouter);
const router = new VueRouter({
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'ticketsview',
            component: ticketview
        },
        {
            path: '/tickets',
            name: 'tickets',
            component: tickets
        },
        {
            path: '/details/:id',
            name: 'ticketdetails',
            component: ticketdetails
        },
        {
            path: '/assigned/:id',
            name: 'details',
            component: details
        },
        {
            path: '/engineers',
            name: 'engtickets',
            component: engtickets
        },
        {
            path: '/roles',
            name: 'roles',
            component: rolesView
        },
        {
            path: '/permissions',
            name: 'permissions',
            component: permissions
        },
    ]
});

export default router;
