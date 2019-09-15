import Vue from 'vue';
import VueRouter from 'vue-router';
import MainTemplate from '../components/MainTemplate';
import Custom from '../components/pages/Custom';
import Home from '../components/pages/home';
import About from '../components/pages/About';
import People from '../components/pages/People';
import Offer from '../components/pages/Offer';
import Booking from '../components/pages/Booking';
import Contact from '../components/pages/Contact';

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history',
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    }
    return { x: 0, y: 0 };
  },
  routes: [
    {
      path: '/',
      component: MainTemplate,
      children: [
        {
          path: '/',
          name: 'home',
          component: Home,
        },
        {
          path: '/o-klubie',
          name: 'about',
          component: About,
        },
        {
          path: '/ekipa',
          name: 'people',
          component: People,
        },
        {
          path: '/oferta',
          name: 'offer',
          component: Offer,
        },
        {
          path: '/wynajmy',
          name: 'booking-info',
          component: Booking,
        },
        {
          path: '/kontakt',
          name: 'contact',
          component: Contact,
        },
        {
          path: '/szablon',
          name: 'custom',
          component: Custom,
        },
      ],
    },
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
    } */
  ],
});


export default router;
