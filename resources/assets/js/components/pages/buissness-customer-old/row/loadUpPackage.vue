<template>
    <div class="load-up-package">
    
        <div class="package-name-show">
            {{upPackage.name}}
        </div>
        <input-parent v-bind="numberOfItemsInput.props" v-model="upPackageHere.numberOfItems"></input-parent>
    
    
    </div>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        computed: {
    
            numberOfItemsInput() {
                return {
                    props: {
                        name: trans('front.create.number'),
                        validate: 'required|decimal:3|min_value:0',
                        placeholder: trans('front.create.number'),
                        id: "NumberOfItems" + this.stopIndex + this.personIndex + this.packageIndex,
                        img: "/images/boxes.svg",
                        newclasses: {
                            
                        },
                        numeric: true,
    
                    },
    
                }
            },
    
        },
        props: {
            upPackage: {
                required: true,
    
            },
            packageIndex: {
                required: true,
            },
            upPackageHere: {
                required: true,
            }
        },
        methods: {},
        created() {
    
    
        },
        mounted() {
    
    
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