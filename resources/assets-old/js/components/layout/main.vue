<template>
    <div class="min-height">
        <app-header></app-header>
        <button @click="topFunction()" id="myBtn" title="Go to top">
          <i id="arrow" class="fa fa-angle-up animated"></i>
        </button>
        <app-asside></app-asside>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        components: {
            'app-header': require('./AppHeader.vue'),
            'app-footer': require('./AppFooter.vue'),
            'app-asside': require('./AppAsside.vue')
        },
        methods:{
            topFunction(){
                $('html, body').animate({scrollTop : 0},600);
            }
        }
    
    }
</script>

<style lang="scss">
    .min-height{
        min-height: 100%;
        min-height: 100vh;
    }
</style>