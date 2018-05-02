import Vue from 'vue'
import VueRouter from 'vue-router'
import MainTemplate from '../components/MainTemplate'
import Custom from '../components/pages/Custom'
import AuthMain from '../components/auth/AuthMain'
import store from '../store/index'
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: MainTemplate,
      children: [
        {
          path: '/',
          name: 'home',
          component: require('../components/pages/Home').default
        },
        {
          path: '/o-klubie',
          name: 'about',
          component: require('../components/pages/about').default
        },
        {
          path: '/ekipa',
          name: 'people',
          component: require('../components/pages/Peaople').default
        },

        {
          path: '/szablon',
          name: 'custom',
          component: Custom
        }
      ]
    },
    {
      path: '/zarezerwuj-sale',
      name: 'booking',
      component: require('../components/pages/BookingMain').default
    },
    {
      path: '/szklo',
      component: require('../components/pages/draggeble').default
    },
    {
      path: '/',
      component: AuthMain,
      children: [
        {
          path: 'login',
          name: 'login',
          component: require('../components/auth/Login').default
        },
        {
          path: '/logout',
          name: 'logout',
          beforeEnter(to, from, next) {
            store.dispatch('logout')
            next({
              path: '/'
            })
          }
        },
        {
          path: 'resetowanie-hasla',
          name: 'passwordReset',
          component: require('../components/auth/PasswordReset').default
        },
      ]
    }
  ],
});


export default router