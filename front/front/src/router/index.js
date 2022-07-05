import Vue from 'vue'
import VueRouter from 'vue-router'

import LoginView from '../views/LoginView.vue'
import HomeView from '../views/HomeView.vue'
import RegisterView from '../views/RegisterView.vue'
Vue.use(VueRouter)


const routes = [{
        path: '/',
        name: 'login',
        component: LoginView
    },
    {
        path: '/about',
        name: 'about',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "about" */ '../views/AboutView.vue')
    },
    {
        path: '/home',
        name: 'home',
        component: HomeView
    },
    {
        path: '/busqueda',
        name: 'busqueda',
        component: () =>
            import ('../views/BusquedaView.vue')
    },
    {
        path: '/carrito',
        name: 'carrito',
        component: () =>
            import ('../views/CarritoView.vue')
    },
    {
        path: '/register',
        name: 'register',
        component: () =>
            import ('../views/RegisterView.vue')
    },


]

const router = new VueRouter({
    routes
})

export default router