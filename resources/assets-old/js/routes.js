import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
var router = new VueRouter({
    routes:[
        
        {
            path:'/driver/dashboard/orders',
            component:resolve=>require(['./components/layout/main.vue'],resolve),
            meta:{
                title:'main',

            },
            children:[
                {
                    path:'',
                    component:resolve=>require(['./components/pages/mainPage.vue'],resolve),
                    meta:{
                        title:'Main ',
                    }
                },
                {
                    path:'/login',
                    component:resolve=>require(['./components/auth/login.vue'],resolve)
                }
            ],
        }
    ],
    linkActiveClass: "active-parent",
    linkExactActiveClass: "active",
    mode: "history",
});
router.beforeEach((to, from, next) => {
    next()
})
export default router;