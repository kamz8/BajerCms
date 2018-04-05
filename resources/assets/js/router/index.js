import Vue from 'vue'
import VueRouter from 'vue-router'
import MainTemplate from '../components/MainTemplate'
import Home from '../components/Home'
import Custom from '../components/Custom'
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
                    path: '/custom',
                    name: 'custom',
                    component: Custom
                }
            ]
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        }
    ],
});


export default router