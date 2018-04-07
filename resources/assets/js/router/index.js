import Vue from 'vue'
import VueRouter from 'vue-router'
import MainTemplate from '../components/MainTemplate'
import Home from '../components/pages/Home'
import Custom from '../components/pages/Custom'
import Login from '../components/auth/login'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: MainTemplate,
            name: 'home',
            children: [
                {
                    path: '/',
                    component: Home
                },
                {
                    path: '/szablon',
                    name: 'custom',
                    component: Custom
                }
            ]
        },
        {
            path: '/login',
            name: 'booking',
            component: Login
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        }
    ],
});


export default router