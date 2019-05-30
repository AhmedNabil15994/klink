<template>
    <transition name="fade">
        <div class="orders-small-wrapper" v-if="!loading">
            <!-- <h2>{{trans('front.main.yourOrders')}}</h2> -->
            <carousel-3d :controls-visible="true" @before-slide-change="slideChange" ref="carsouel" :height="200" :width="300">
                <slide v-for="(slide, i) in ordeers" :index="i" :key="'slide'+i">
                    <div class="small-order">
                        <img src="/images/delete-order.svg" :title="trans('front.main.delete')" @click="deleteOrder(slide)" class="deleteImage" :alt="trans('front.main.delete')">
                        <img src="/images/full-size.svg" :title="trans('front.main.fullSize')" @click="activateOrder(slide)" class="fullSize" :alt="trans('front.main.fullSize')">
                        <div class="small-order-cell order-from">
                            <img src="/images/home.svg" class="svg" alt="From" :title="trans('front.main.from')" data-toggle="tooltip">
                            <span class="small-order-cell-adress">
                                                                    <b>{{trans('front.main.from')}}</b><span>&nbsp;:&nbsp;{{slide.from}}</span>
                            </span>
                        </div>
                        <div class="small-order-cell order-to">
                            <img src="/images/send.svg" class="svg" :alt="trans('front.main.to')" :title="trans('front.main.to')" data-toggle="tooltip">
                            <span class="small-order-cell-adress">
                                                                    <b>{{trans('front.main.to')}}</b><span>&nbsp;:&nbsp;{{slide.to}}</span>
                            </span>
                        </div>
    
                        <div class="small-order-cell completeIt">
                            <router-link tag="button" :to="$auth.isAuth() ? `/order/create_order/${slide.id}` :`/order/create_order/${slide.id}`" class="letsComplete btn">{{trans('front.main.letsComplete')}}</router-link>
                        </div>
                        <img src="/images/warning.svg" class="warning-order" alt="warning">
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
            userId() {
                if (this.$auth.isAuth) {
                    return 'user';
                } else {
                    if (localStorage.getItem('tempid')) {
                        return localStorage.getItem('tempid')
                    } else {
                        return 'new';
                    }
                }
            }
        },
        mounted() {
            this.$genF.svg();
        },
        props: [
            'orders'
        ],
        watch: {
            'orders' (newval) {
    
                this.loading = true;
                this.$nextTick(() => {
    
                    this.loading = false;
                    this.ordeers = this.orders;
                    this.$nextTick(() => {
                        if (this.$refs.carsouel) {
    
                            this.$refs.carsouel.goSlide(newval.length - 1)
    
                            this.$genF.svg();
                        }
                    })
                })
    
    
            }
        },
        methods: {
            slideChange(e) {
                this.$emit('slide-change', e)
            },
            activateOrder(slide) {
                this.$orders.setActiveOrder(slide.id)
                this.$emit('activateOrder', slide.id);
            },
            deleteOrder(order) {
                var vm = this;
                $('.deleteImage').tooltip('hide');
                Vue.orders.removeOrder(order)
                    .then(response => {
                        // Vue.orders = response;
                        $('.deleteImage').tooltip('hide');
                        this.loading = true;
                        this.ordeers = response;
    
                        this.$nextTick(() => {
                            $('.deleteImage').tooltip('hide');
                            this.loading = false;
                        })
    
                    })
                // this.$swal({
                //     type: 'question',
                //     title: '',
                //     text: trans('front.main.deleteConfirm'),
                //     showCancelButton: true,
                //     cancelButtonColor: '#d33',
                //     cancelButtonText: trans('front.main.cancel'),
                //     confirmButtonText: trans('front.main.deleteIt'),
                //     onOpen() {
                //         $('.swal2-icon.swal2-question').html('<img src="/images/question.svg"/>');
                //     }
    
                // }).then(result => {
                //     if (result.value === true) {
                //         this.$swal({
                //             text: trans('front.main.deleting'),
                //             onOpen() {
                //                 Vue.swal.showLoading();
    
                //             }
                //         })
                //     }
                // })
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