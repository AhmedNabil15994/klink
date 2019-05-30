<template>
    <div class="order-item-new">
        <card class="order-item-card">
            <h3 class="card-title" slot="header">
                <i class="fa fa-fw ti-list"></i> {{order.id}}
            </h3>
            <div class="order-item-cards-wrapper">
                <from-card :order="order"></from-card>
                <to-card :order="order"></to-card>
                <map-card :order="order"></map-card>
    
                <lets-go-card :order="order"></lets-go-card>
            </div>
        </card>
    </div>
</template>


<script>
    import card from "../card/card.vue"
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
        methods: {},
        props: ['order'],
        components: {
            card,
            'from-card':require('./order-element/from'),
            'to-card':require('./order-element/tocard'),
            'map-card':require('./order-element/mapcard'),
            'lets-go-card':require('./order-element/letsgocard'),
        }
    
    }
</script>

<style lang="scss" src="./assets/sass/driver/driver-item.scss">
    
</style>
    


<style lang="scss">
    
</style>
// Ahmed Ali Thabet