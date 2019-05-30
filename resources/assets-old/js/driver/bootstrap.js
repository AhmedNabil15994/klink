window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
// translation
// const _ = import('lodash');
window.trans = (string) => _.get(window.i18n, string);

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import VueResource from 'vue-resource'
Vue.use(VueResource)

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = $('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    // Vue.http.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });


Vue.directive('showButKeepInner', {
    bind(el, bindings) {
        bindings.def.wrap = function (el) {
            // Find all next siblings with data-moved and move back into el
            while (el.nextElementSibling && el.nextElementSibling.dataset.moved) {
                el.appendChild(el.nextElementSibling).removeAttribute('data-moved')
            }
            el.hidden = false
        }

        bindings.def.unwrap = function (el) {
            // Move all children of el outside and mark them with data-moved attr
            Array.from(el.children).forEach(child => {
                el.insertAdjacentElement('afterend', child).setAttribute('data-moved', true)
            })
            el.hidden = true
        }
    },

    inserted(el, bindings) {
        bindings.def[bindings.value ? 'wrap' : 'unwrap'](el)
    },

    update(el, bindings) {
        bindings.def[bindings.value ? 'wrap' : 'unwrap'](el)
    }
})