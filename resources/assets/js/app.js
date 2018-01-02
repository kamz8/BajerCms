
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Procfile applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import DataTable from './components/DataTable.vue';
import FacebookEvents from './components/FacbookEvents.vue';
import BootstrapVue from 'bootstrap-vue';
import VueResource from 'vue-resource';
import store from './store';
import lodash from 'lodash'

Vue.use(BootstrapVue);
Vue.use(VueResource,lodash);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('data-table', require('./components/DataTable.vue'));
Vue.component('fb-events', require('./components/FacbookEvents.vue'));
Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });
const app = new Vue({
    el: '#app',
    store,
    components: {
        DataTable,
        FacebookEvents
    }
});
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');