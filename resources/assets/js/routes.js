import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
window._ = require('lodash');
window.trans = (string) => _.get(window.i18n, string);
var router = new VueRouter({
    routes: [

        {
            path: '/',
            component: resolve => require(['./components/layout/main.vue'], resolve),
            meta: {
                title: 'main',

            },
            children: [{
                    path: '/',
                    component: resolve => require(['./components/pages/mainPage.vue'], resolve),
                    meta: {
                        title: 'Main ',
                    }
                },
                {
                    path: '/order/create_order/:orderId',
                    component: resolve => require(['./components/pages/orders/neworder/neworder.vue'], resolve),
                    meta: {
                        title: 'new order'
                    }
                }, {
                    path: '/order/make_order/:orderEncrypted'
                },
                {
                    path: '/login',
                    component: resolve => require(['./components/auth/login.vue'], resolve),
                    meta: {
                        title: trans('front.main.login'),
                        forAuth: false,
                        forVisitors: true,
                    }
                },
                {
                    path: '/geschaeftskundenportal',
                    component: resolve => require(['./components/pages/buissness-customer/main.vue'], resolve),
                    meta: {
                        title: trans('front.buissness.title'),
                        forAuth: false,
                        forVisitors: true,
                    }
                },
                {
                    path:'/geschaeftskundenportal/package',
                    component:resolve=>require(['./components/pages/package/main.vue'], resolve),
                    meta:{
                        title:trans('front.package.title'),
                        forAuth: false,
                        forVisitors: true,
                    }
                },
                // {
                //     path: '/geschaeftskundenportal/tour/:tourId',
                //     component: resolve => require(['./components/pages/buissness-customer/pages/secondpage/main.vue'], resolve),
                //     meta: {
                //         title: trans('front.buissness.title'),
                //         forAuth: false,
                //         forVisitors: true,
                //     }
                // },
                {
                    path: '/geschaeftskundenportal/tour/laststep/:tourId',
                    component: resolve => require(['././components/pages/buissness-customer/pages/laststep/main.vue'], resolve),
                    meta: {
                        title: trans('front.buissness.title'),
                        forAuth: false,
                        forVisitors: true,
                    }
                },
                {
                    path: '/testdates',
                    component: require('./components/pages/buissness-customer-old/testDates.vue'),
                    meta: {
                        title: 'test',
                    }
                }
            ],
        }
    ],
    linkActiveClass: "active-parent",
    linkExactActiveClass: "active",
    mode: "history",
});
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.forVisitors)) {
        if (Vue.auth.isAuth()) {
            Vue.auth.logout();
            next({
                path: '/login'
            })
            return ''
        } else {
            next()
        }
    }

    next()
})
export default router;