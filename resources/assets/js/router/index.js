import Vue from 'vue'
import VueRouter from 'vue-router'
import MainTemplate from '../components/MainTemplate'
import Custom from '../components/pages/Custom'
import AuthMain from '../components/auth/AuthMain'
import store from '../store/index'
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  },
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
          component: require('../components/pages/About').default
        },
        {
          path: '/ekipa',
          name: 'people',
          component: require('../components/pages/Peaople').default
        },
        {
          path: '/oferta',
          name: 'offer',
          component: require('../components/pages/Offer').default
        },
        {
          path: '/wynajmy',
          name: 'booking-info',
          component: require('../components/pages/Booking').default
        },
        {
          path: '/kontakt',
          name: 'contact',
          component: require('../components/pages/Contact').default
        },
        {
          path: '/szablon',
          name: 'custom',
          component: Custom
        }
      ]
    }
/*    {
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
        {
          path: 'rejestracja',
          name: 'register',
          component: require('../components/auth/Register').default
        },
      ]
    },
    {
      path: '/auth/facebook/callback',
      name: 'socialAuth',
      component: require('../components/auth/popup').default
    }*/
  ],
});


export default router