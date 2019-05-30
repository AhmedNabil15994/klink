/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');
require('./bootstrap');

//translation
Vue.prototype.trans = (string, args) => {
    let value = _.get(window.i18n, string);

    _.eachRight(args, (paramVal, paramKey) => {
        value = _.replace(value, `:${paramKey}`, paramVal);
    });
    return value;
};
//validation
var lang = document.head.querySelector('meta[http-equiv="content-language"]').content;
import VeeValidate, { Validator } from 'vee-validate';
// import de from 'vee-validate/dist/locale/de';
var de =  require('vee-validate/dist/locale/'+lang);
Validator.localize(lang, de);

Vue.use(VeeValidate);
// console.log(Laravel)
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyD06pFMPpfuA37fB3JJQ_K85GaRG45CFv8',
        libraries: 'places', // This is required cause of Autocomplete plugin
        language: document.head.querySelector('meta[http-equiv="content-language"]').content

    }
})
// console.log(Laravel);



//auth
import Auth from './packages/auth.js'
Vue.use(Auth)
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken()
var myHeaders = new Headers({
    'Content-Type': 'text/xml'
});


//general functions in vue.js
import generalFunctions from './packages/generalFunctions.js';
Vue.use(generalFunctions);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './routes.js'
import App from './App.vue'
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});