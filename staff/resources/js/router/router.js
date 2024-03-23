import {createRouter, createWebHistory} from 'vue-router'
import Main from '../pages/Main.vue'
import User from "../pages/Auth/User.vue";
import Customer from "../pages/Core/Customer.vue";
import CustomerInfo from "../pages/Core/CustomerInfo.vue";
import Ban from "../pages/Core/Ban.vue";
import Staff from "../pages/Staff/Staff.vue";
import StaffInfo from "../pages/Staff/StaffInfo.vue";
import Credit from "../pages/Credit/Credit.vue";
import CreditInfo from "../pages/Credit/CreditInfo.vue";
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
        path: '/customers/:id',
        component: CustomerInfo
    },
    {
        path: '/bans',
        component: Ban
    },
    {
        path: '/credits',
        component: Credit
    },
    {
        path: '/credits/:id',
        component: CreditInfo
    },
    {
        path: '/staffs',
        component: Staff
    },
    {
        path: '/staffs/:id',
        component: StaffInfo
    },
    {
        path: '/rates',
        component: Rate
    },
    {
        path: '/logout',
        component: Main
    },
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router;
