<template>
    <transition name="fade">
        <div class="orders-small-wrapper" v-if="!loading">
            <!-- <h2>{{trans('front.main.yourOrders')}}</h2> -->
            <carousel-3d :autoplay="true" :autoplay-timeout="5000" :controls-visible="true" ref="othercarsouel" :height="200" :width="300">
                <slide v-for="(slide, i) in ordeers" :index="i" :key="'slide'+i">
                    <div class="small-order">
                        <div class="total" style="width:100%;background-color: #f8f9fa;height:50%;margin-top: -90px;display:flex;border-radius: 10px;">
                            <div class="totaladdress" style="width:70%;background-color: #f8f9fa;height:100%;flex-wrap:nowrap;/* border-radius: 10px; */border-top-left-radius: 10px;/* border-bottom-left-radius: 10px; */margin-top:5px ">
    
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