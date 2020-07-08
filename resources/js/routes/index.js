import Vue from 'vue'
import VueRouter from "vue-router"


Vue.use(VueRouter)



const routes = [
    {
        path: '/',
        component: () => import('../components/Home')
    },
    {
        path: '/about',
        component: () => import('../components/About')
    }
]


const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
