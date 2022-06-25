import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
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
]

const router = new VueRouter({
    routes
})

export default router