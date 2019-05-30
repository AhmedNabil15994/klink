<template>
    <header class="app-header">
        <div class="cookies" v-if="showCookies">
            <div class="container">
                <p>
                    {{trans('frontend.main.cookie') }}<span @click="setCookies()" class="accept-cookies">{{trans('frontend.main.accept')}}</span>
                </p>
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
        components: {
            'big-navigation': require('./bigNav.vue'),
            'small-navigation': require('./smallNav.vue')
        },
        methods: {
            setCookies() {
                this.$cookies.set('accepted-cookies', 'true');
                $('.cookies').slideUp();
            }
        },
        computed: {
            showCookies() {
                if (this.$cookies.get('accepted-cookies') === 'true') {
                    return false
                }
                return true;
            }
        }
    
    
    }
</script>

<style lang="scss">
    
</style>