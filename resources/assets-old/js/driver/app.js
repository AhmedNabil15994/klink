
window.Vue = require('vue');
require('./bootstrap');
import store from './store/store';
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('loading',require('./components/general/loading.vue'));
Vue.component('driver-wrapper', require('./components/DriverWrapper.vue'));

const app = new Vue({
    store,
    el: '#app'
});