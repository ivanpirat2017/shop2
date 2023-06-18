import { createRouter, createWebHistory } from 'vue-router'
import Home from './routers/Home.vue'
import Search from './routers/Search.vue'
import About from './routers/About.vue'
import NotFound from './routers/NotFound.vue'
import Login from './routers/Login.vue'
import Registration from './routers/Registration.vue'
import Loader from '../components/Loader.vue'
import Categoris from './routers/Categoris.vue'
import Profile from './routers/Profile.vue'
import Cart from './routers/Cart.vue'

const routes = [
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound,
    },
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/search',
        name: 'Search',
        component: Search
    },
    {
        path: '/about',
        name: 'About',
        component: About
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/registration',
        name: 'Registration',
        component: Registration
    },
    {
        path: '/loader',
        name: 'Loader',
        component: Loader
    },
    {
        path: '/categoris',
        name: 'Categoris',
        component: Categoris
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/cart',
        name: 'Cart',
        component: Cart
    },
]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
