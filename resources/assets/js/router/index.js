import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../components/Home'
import Custom from '../components/Custom'
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/custom',
            name: 'custom',
            component: Custom
        }
    ],
});


export default router