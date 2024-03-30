import {createRouter, createWebHashHistory} from 'vue-router'
import Main from '../pages/Main.vue'
import Register from '../pages/Register.vue'

const routes = [
    {
        path: '/:id',
        component: Main
    },
    {
        path: '/register/:id',
        component: Register
    },
]

const router = createRouter({
    routes,
    history: createWebHashHistory()
})

export default router;
