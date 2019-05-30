<template>
    <div class="wizard-wrapper">
        <div @click="changeCurrentShow('goods')" :class="{'wizard-box':true,'active':currentShow==='goods'}">
            <div class="wizard-image">
                <img src="/images/pickup.svg">
            </div>
            <span>{{trans('front.create.orderInformation')}}</span>
        </div>
        <div @click="changeCurrentShow('senderReceiver')" :class="{'wizard-box':true,'active':currentShow==='senderReceiver'}">
            <div class="wizard-image">
                <img src="/images/customer-service.svg">
            </div>
            <span>{{trans('front.create.senderReceiverInfromation')}}</span>
        </div>
        <!-- <div @click="changeCurrentShow('offers')" :class="{'wizard-box':true,'active':currentShow==='offers'}">
            <div class="wizard-image">
    
            </div>
            <span>{{trans('front.create.offersReceiving')}}</span>
        </div> -->
    </div>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        computed: {
    
        },
        props: {
            currentShow:{
                required:true,
                default:'goods',
            },
            
        },
        methods: {
            changeCurrentShow(currentShow){
                this.$emit('currentShowChange',currentShow);
            }
        },
        created() {
    
    
        },
        mounted() {
    
    
        },
    
    }
</script>

<style lang="scss">
    
</style>
/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/