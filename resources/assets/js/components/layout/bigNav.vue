<template>
    <div class="big-nav container hidden-sm-down">
        <router-link :to="'/'">
            <img src="/images/logo3.png" class="logo" alt="Logo">
        </router-link>
        <div class="big-nav-menu">
            <div class="big-nav-item"><a href="/login">{{trans('front.main.login')}}</a></div>
            <div class="big-nav-item"><a href="/geschaeftskundenportal">{{trans('backend.customer_business.title')}}</a></div>
    
    
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
    
    }
</script>

<style lang="scss">
    
</style>
/***********************
 ***********************
 ***********************
 ** Ahmed Ali Thabet ***
 **** Sohag, Egypt *****
 ***** 01158977205 *****
 ***********************
 ***********************
 ***********************
 ***********************
************************/