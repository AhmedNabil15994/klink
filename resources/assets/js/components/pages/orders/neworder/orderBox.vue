<template>
    <div class="order-data">
        <div class="order-data-box">
            <img src="/images/distance.svg" alt="">
            <div class="order-data-info">
                <div class="order-info-head">{{trans('front.create.distance')}}</div>
                <div class="order-info-value" v-if="order.orderRoute&&order.orderRoute.routes">{{order.orderRoute.routes[0].legs[0].distance.text}}</div>
                <div class="order-info-value" v-else-if="order.distance">{{order.distance}}</div>
            </div>
    
        </div>
        <div class="order-data-box">
            <img src="/images/stopwatch.svg" alt="">
            <div class="order-data-info">
                <div class="order-info-head">{{trans('front.create.duration')}}</div>
                <div class="order-info-value" v-if="order.orderRoute&&order.orderRoute.routes">{{order.orderRoute.routes[0].legs[0].duration.text}}</div>
            </div>
    
        </div>
        <div class="order-data-box">
            <img src="/images/euro.svg" class="svg" alt="">
            <div class="order-data-info">
                <div class="order-info-head">{{trans('front.create.cost')}}</div>
                <div class="order-info-value">{{order.cost}}</div>
            </div>
    
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                
    
            }
        },
        created() {
    
    
        },
        mounted() {
    
    
        },
        computed: {
    
        },
        props: {
            order: {
                required: true,
    
            }
        },
        watch:{
            'order.cost':(newval,oldval)=>{
                if(newval!==oldval&&document.getElementsByClassName('ani-circle')[0]){
                    for(var element of document.getElementsByClassName('ani-circle')){
                        element.beginElement();
                    }
                }
            }
        }
    
    }
</script>

<style lang="scss">
    
</style>
// Ahmed Ali Thabet