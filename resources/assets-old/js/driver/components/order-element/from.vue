<template>
    <div class="from-card-wrapper">
        <card>
            <h3 class="card-title" slot="header">
                from
            </h3>
            <a v-show-but-keep-inner="somecondition" href="#">
                <span  @click="somecondition=!somecondition">This is always rendered no matter what</span>
            </a>
        </card>
    
    </div>
</template>


<script>
    export default {
        data() {
            return {
                somecondition: false,
    
            }
        },
        created() {
    
    
        },
        mounted() {
    
    
        },
        computed: {
    
        },
        components: {
            'card': require('../../card/card.vue'),
        }
    
    }
</script>

<style lang="scss">
    
</style>
// Ahmed Ali Thabet