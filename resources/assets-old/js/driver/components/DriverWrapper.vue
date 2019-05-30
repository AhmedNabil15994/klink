<template>
    <!-- <default-wrap> -->
    
    <div class="driver-order-wrapper">
        <loading :loading="loading"></loading>
        <order-element v-for="order in orders" :order='order' :key="'orderNum'+order.id"></order-element>
    </div>
    <!-- </default-wrap> -->
</template>

<script>
    export default {
        data() {
            return {
                loading: true,
                orders: []
            }
        },
        created() {
            this.getOrders();
        },
        methods: {
            getOrders() {
                axios.get('/driver/dashboard/getorders')
                    .then((response) => {
    
                        this.loading = false;
    
                        this.orders = response.data;
                    })
            }
        },
        components: {
            'order-element': require('./order-element'),
            'default-wrap': require('./layout/default')
    
        }
    }
</script>

<style src="./assets/css/custom_css/metisMenu.css">
    
</style>

<style src="./assets/css/buttons.css">
    
</style>

<style lang="scss" src="./assets/sass/dark/custom.scss">
    
</style>

<style lang="scss" src="./assets/sass/bootstrap/bootstrap.scss">
    
</style>

<style src="font-awesome/css/font-awesome.min.css">
    
</style>

<style src="themify-icons/css/themify-icons.css">
    
</style>

<style>
    body.fixed-header #app .navbar {
        position: relative;
    }
    
    body.fixed-header #app .header {
        margin-bottom: 0;
    }
    
    @media(max-width: 320px) {
        .message_dropdown .dropdown-menu.show {
            left: 20px !important;
        }
    }
</style>


