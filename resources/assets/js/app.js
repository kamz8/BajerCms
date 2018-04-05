
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Procfile applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue';
import VueResource from 'vue-resource';

import store from './store';
import lodash from 'lodash'
import router from './router/index.js'

/*components import */
import VueScrollTo from 'vue-scrollto'
import App from './components/App';

Vue.use(BootstrapVue,router);
Vue.use(VueResource,lodash,VueScrollTo, App);

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

Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });
const app = new Vue({
    el: '#app',
    store,
    components: {
        App,
    },
    router
});
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');