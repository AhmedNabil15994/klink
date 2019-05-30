<template>
    <div class="card" :class={dNone:isActive}>
        <div class="card-header">
    
            <slot name="header"></slot>
            <slot name="header-2"></slot>
            <span class="float-right">
                    <i class="fa fa-fw ti-angle-up" v-if="showSlideUp" :class={rotate:!show} @click="show = !show"></i>
                </span>
        </div>
        <div class="card-body" v-show="show">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'card',
        data() {
            return {
                show: true,
                isActive: false,
            }
        },
        methods: {
            hide() {
                this.isActive = true
            }
        },
        mounted: function() {},
        props: {
            title: {
                required: false
            },
            showSlideUp: {
                required: false,
                default: true,
            }
        },
        destroy: function() {
    
        }
    }
</script>

<style scoped>
    .ti-angle-up {
        cursor: pointer;
    }
    
    .dNone {
        display: none;
    }
    
    .rotate {
        transform: rotate(180deg);
    }
</style>