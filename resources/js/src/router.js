import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import CategoryIndex from './views/Category/Index.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/category',
        name: 'category',
        component: CategoryIndex
    }
]

const router = createRouter({
    history: createWebHistory('/'),
    routes
})

export default router
