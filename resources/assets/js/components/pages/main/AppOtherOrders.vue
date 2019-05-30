<template>
    <transition name="fade">
        <div class="orders-small-wrapper" v-if="!loading">
            <!-- <h2>{{trans('front.main.yourOrders')}}</h2> -->
            <carousel-3d :autoplay="true" :dir="'ltr'" :autoplay-timeout="5000" :controls-visible="true" ref="othercarsouel" :height="200" :width="300">
                <slide v-for="(slide, i) in ordeers" :index="i" :key="'slide'+i">
                    <div class="small-order">
                        <div class="advertise-order">
                            <div class="advertise-row">
                                <div class="advertise-address">
                                    <div class="small-order-cell order-from">
                                        <img src="/images/home.svg" class="svg" alt="From" :title="trans('front.main.from')" data-toggle="tooltip">
                                        <span class="small-order-cell-adress">
                                                <span>{{slide.from}}</span>
                                        </span>
                                    </div>
                                    <div class="small-order-cell order-to">
                                        <img src="/images/send.svg" class="svg" :alt="trans('front.main.to')" :title="trans('front.main.to')" data-toggle="tooltip">
                                        <span class="small-order-cell-adress">
                                                <span>{{slide.to}}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="advertise-pricing">
                                    <img :src="'/api/orders/images/icon?price='+slide.price+'&distance='+slide.distance"  alt="">
                                </div>
                            </div>
                            <div class="advertise-row">
                                <div class="advertise-address shipping" v-if="slide.ship">
                                    <img :src="'/images/shippings/'+slide.ship.img" :alt="slide.ship.title">
                                    <span style="width:100%;">{{slide.ship.title}}</span>
                                </div>
                                <div class="advertise-pricing"></div>
                            </div>
    
                        </div>
                    </div>
                </slide>
            </carousel-3d>
    
        </div>
    </transition>
</template>


<script>
    export default {
        data() {
            return {
                loading: false,
                ordeers: this.orders,
            }
        },
        computed: {
    
        },
        props: {
            'orders': {
                required: true,
            }
        },
        methods: {},
        created() {
    
    
        },
        mounted() {
            this.$nextTick(() => {
    
                this.$genF.svg();
            })
    
        },
        watch: {
            'orders' (newval) {
    
                this.loading = true;
                this.$nextTick(() => {
    
                    this.loading = false;
                    this.ordeers = this.orders;
                    console.log(this.ordeers)
                    this.$nextTick(() => {
                        if (this.$refs.othercarsouel) {
    
                            this.$genF.svg();
                            this.$refs.othercarsouel.goSlide(newval.length - 1)
    
                        }
                    })
                })
    
    
            }
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