/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'babel-polyfill';
// import 'whatwg-fetch';
require('es6-promise').polyfill();

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
import VeeValidate, {
    Validator
} from 'vee-validate';
// import markerCheck from './validateMap';
// import de from 'vee-validate/dist/locale/de';
var de = require('vee-validate/dist/locale/' + lang);
// Validator.extend('markerCheck',markerCheck);
// console.log(Validator,markerCheck)

import moment from 'moment';
window.moment = moment;
// window.moment().format('l')
moment.locale(lang)
if (lang !== 'de') {
    moment.locale(lang, {
        week: {
            dow: 1 // Monday is the first day of the week.
        }
    })
}
const phoneRole = {
    getMessage(field, args) {
        return `The ${field} must be either a valid phone number`;
    },
    validate(value, args) {

        // Custom regex for a phone number 
        const MOBILEREG = /^(((((((00|\+)49[ \-/]?)|0)[1-9][0-9]{1,4})[ \-/]?)|((((00|\+)49\()|\(0)[1-9][0-9]{1,4}\)[ \-/]?))[0-9]{1,7}([ \-/]?[0-9]{1,5})?)$/;

        // Check for either of these to return true
        return MOBILEREG.test(value);
    }
};

Validator.extend('phone', phoneRole);
Vue.use(VeeValidate);
Validator.localize(lang, de);
// console.log(Laravel)
//sweet alert
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);

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

//Carousel
import Carousel3d from 'vue-carousel-3d';

Vue.use(Carousel3d);
//vue-sinature
import vueSignature from "vue-signature"
Vue.use(vueSignature)

//vuex
// import Vuex from 'vuex';
// Vue.use(Vuex);

// import storee from './store/index'
// const store = new Vuex.Store(storee);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//circle slider for vuejs
import VueCircleSlider from 'vue-circle-slider-admica'

Vue.use(VueCircleSlider)
import generalComponents from './generalComponents/generalComponents.js';
Vue.use(generalComponents)
import {
    ImageRating
} from 'vue-rate-it';
Vue.component('image-rating', ImageRating);
import router from './routes.js'
import App from './App.vue'
// import VueIdb from 'vue-idb'

// Vue.use(VueIdb)
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

// const idb = new VueIdb({
//     version: 1,
//     database: 'kurier-link',
//     schemas: [{
//             orders: '++id,from, to,from_map, to_map, orderRoute'
//         },

//     ]
// })
//ordres pakcage;
import Orders from './store/orders.js';
Vue.use(Orders);
import Snotify, {
    SnotifyPosition
} from 'vue-snotify'

const options = {
    toast: {
        position: SnotifyPosition.rightTop
    }
}

Vue.use(Snotify, options)
import Vss from './packages/vss';
Vue.use(Vss);
import VueSlideoutPanel from 'vue2-slideout-panel';

Vue.use(VueSlideoutPanel);

import CheckboxRadio from 'vue-checkbox-radio';

Vue.use(CheckboxRadio);


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,

    // store
});