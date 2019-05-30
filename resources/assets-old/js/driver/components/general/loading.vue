<template>
    <div class="loading" v-if="loading">
        <img src="/images/ajax-loader.svg" width="100" height="100"  alt="">
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
        props:['loading']
    
    }
</script>

<style lang="scss" scoped>
    img{
        display: block;
        margin: 0 auto;
    }
</style>
// Ahmed Ali Thabet