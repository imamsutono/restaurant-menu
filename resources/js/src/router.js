import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import CategoryIndex from './views/Category/Index.vue'
import CategoryCreate from './views/Category/Create.vue'
import CategoryEdit from './views/Category/Edit.vue'

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
    },
    {
        path: '/category/create',
        name: 'category-create',
        component: CategoryCreate
    },
    {
        path: '/category/edit/:slug',
        name: 'category-edit',
        component: CategoryEdit
    },
]

const router = createRouter({
    history: createWebHistory('/'),
    routes
})

export default router
