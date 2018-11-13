/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Procfile applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue';
import VueResource from 'vue-resource';

import store from './store/index';
import lodash from 'lodash'
import router from './router/index.js'
import {HTTP} from "./http-comon";
import middleware from './middleware/middleware'
import * as VueGoogleMaps from "vue2-google-maps";
import VeeValidate from 'vee-validate';

/*components import */
import VueScrollTo from 'vue-scrollto'
import MyApp from './MyApp';

middleware(router)

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyBKviyzsDgBYVf36WonAM3uRBiPbuuMFkA",
    callback: "x",
    // libraries: "places" // necessary for places input
  }
});
Vue.use(router,HTTP);
Vue.use(BootstrapVue);
Vue.use(VueResource, lodash, VueScrollTo);
Vue.use(VeeValidate);

Vue.use(VueScrollTo, {
  container: "body",
  duration: 500,
  easing: "ease-in",
  offset: 0,
  cancelable: true,
  onStart: false,
  onDone: false,
  onCancel: false,
  x: false,
  y: true
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/**/
Object.defineProperty(Vue.prototype, '$lodash', {value: lodash});
const app = new Vue({
  el: '#app',
  template: '<my-app/>',
  components: {MyApp},
  router,
  store,
});

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const token = localStorage.getItem('token')

if (token && token !== undefined && token !== 'undefined') {
  axios.defaults.headers.common['Authorization'] = token
  store.commit('LOGGED')
  store.dispatch('dispatchToken',token)
}
