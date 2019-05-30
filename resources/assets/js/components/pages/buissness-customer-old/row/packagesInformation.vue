<template>
    <div class="packages-information">
        <div class="head-information">
            <img src="/images/commercial-delivery.svg" alt="persons">
            <span>{{trans('front.buissness.packages')}}</span>
        </div>
        <!-- <load-down-packakes></load-down-packakes> -->
        <div class="load-up-packages">
            <div class="load-up-package-person" :key="'packageSet'+PacakgeSetIndex+index" v-for="(PacakgeSet, PacakgeSetIndex) in stop.uploads">
                <load-up-package v-for="(uppackage , packageIndex) in upPackages" :upPackageHere="PacakgeSet[packageIndex]" :upPackage="uppackage" :packageIndex="packageIndex" v-bind:key="'uppackage'+index+packageIndex+PacakgeSetIndex"></load-up-package>
            </div>
            <div class="add-new-package">
                <button @click="addNewPackage" class="btn btn-success btn-xs">
                                                                        
                            <img src="/images/add-new.svg" :alt="trans('front.buissness.addNewPackage')">
                            <span>{{trans('front.buissness.addNewPackage')}}</span>
                        </button>
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
        computed: {
            downPackages() {
                var downPackagesArray = new Array(this.packages.length).fill(0);
                for (var counter = 0; counter < this.stopIndex; counter += 1) {
    
                }
                return downPackagesArray;
    
            },
            upPackages() {
    
                return this.$parent.$parent.packages;
            }
        },
        props: {
            stop: {
                required: true
            },
            index: {
                required: true,
            },
    
        },
        methods: {
            addNewPackage() {
                this.$parent.$parent.makeNewPackage()
            }
        },
        created() {
    
        },
        mounted() {
    
    
        },
        components: {
            'load-up-package': require('./loadUpPackage.vue')
        }
    
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