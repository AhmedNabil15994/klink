<template>
    <header class="app-header">
        <div class="sub-navs">
            <div class="subs-container container">
                <div class="sub-left">
                    <div class="test">
                        {{trans('front.main.testRight')}}
                    </div>
                </div>
                <div class="sub-right">
    
                    <div class="contact-info">
                        <a :href="'/login'" class="login-head" v-if="!$auth.isAuth()">
                            <a >{{trans('front.main.login')}}</a>
                        </a>
                        <a :href="'/logout'" class="login-head" v-else>
                            <a >{{trans('front.main.logout')}}</a>
                        </a>
                        <div class="contacts">
                            <span class="phonenum">
                                &#160;0049(0)15151000558
                            </span>
                            <span class="callus">{{trans('front.main.callUs')}}</span>
                            <img src="/images/call-answer.svg" alt="Call us">
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <div class="navigation">
            <big-navigation></big-navigation>
            <small-navigation></small-navigation>
        </div>
    </header>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        components:{
            'big-navigation':require('./bigNav.vue'),
            'small-navigation':require('./smallNav.vue')
        }
    
    
    }
</script>

<style lang="scss">
    
</style>