import {createRouter, createWebHistory} from 'vue-router'
import Main from '../pages/Main.vue'
import User from "../pages/Auth/User.vue";
import Customer from "../pages/Core/Customer.vue";
import Account from "../pages/Core/Account.vue";
import Staff from "../pages/Staff/Staff.vue";
import Credit from "../pages/Credit/Credit.vue";
import Rate from "../pages/Credit/Rate.vue";

const routes = [
    {
        path: '/',
        component: Main
    },
    {
        path: '/users',
        component: User
    },
    {
        path: '/customers',
        component: Customer
    },
    {
        path: '/accounts',
        component: Account
    },
    {
        path: '/credits',
        component: Credit
    },
    {
        path: '/staffs',
        component: Staff
    },
    {
        path: '/rates',
        component: Rate
    },
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router;
