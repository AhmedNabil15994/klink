ahmedALI
<template>
    <div class="small-nav container hidden-md-up" style="min-height:70px;">
        <div class="small-nav-menu">
            <div class="small-nav-item"><a href="#">{{trans('front.main.startPage')}}</a></div>
            <div class="small-nav-item"><a href="#">{{trans('front.main.about')}}</a></div>
            <div class="small-nav-item"><a href="#">{{trans('front.main.service')}}</a></div>
            <div class="small-nav-item"><a href="#">{{trans('front.main.contact')}}</a></div>
    
        </div>
        <div class="small-nav-open">
            <div id="nav-icon2" @click="opennav" :class="{open:isOpen}">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <img src="/images/logo3.png" class="small-nav-logo" alt="LOGO">
    </div>
</template>


<script>
    export default {
        data() {
            return {
                isOpen: false,
            }
        },
        methods: {
            opennav() {
                this.isOpen = this.isOpen ? false : true;
                if (this.isOpen) {
                    $('.small-nav').css('min-height', '600px');
                    $('.small-nav').css('min-height', '100vh');
                    $('#nav-icon2').css('left', '5px');
    
                } else {
                    $('.small-nav').css('min-height', '70px');
                    $('.small-nav').css('min-height', '70px');
                    $('#nav-icon2').css('left', '0px');
                }
            }
        }
    
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