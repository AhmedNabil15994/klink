<template>
    <div class="stop-row">
        <div class="stop-row-top">
    
            <div class="input-parent location">
                <span class="label-span">
                                                                                                    <label :for="'stopLocation'+index">{{trans('front.buissness.stopLocation')}}</label>
                                                                                                </span>
                <div class="input-child">
                    <gmap-autocomplete :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setStopPlace" :id="'stopLocation'+index" autofocus></gmap-autocomplete>
                </div>
            </div>
            <input-parent v-bind="inputs[0].props" v-model="stop.stopName">
            </input-parent>
            <!-- <input-parent v-bind="inputs[1].props" v-model="stop.numberOfPackets">
            </input-parent> -->
            <input-parent v-bind="inputs[2].props" v-model="stop.loadTime">
            </input-parent>
            
    
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
            weightInput() {
                return {
                    props: {
                        name: trans('front.create.weightName'),
                        placeholder: 'KG',
    
                        validate: 'required|decimal:3|min_value:1',
                        id: 'weightInput',
                        newclasses: {
                            'half-width': true,
                            'odd': true
                        },
                        numeric: true,
    
    
                    },
                    model: 'weight',
                }
            },
            activeType() {
                var actived = this.$parent.packageTypes.filter(type => {
                    return type.id === this.stop.packageType
                });
                return actived[0];
            },
            widthLengthHeight() {
                return {
                    props: {
                        mulitiple: true,
                        title: trans('front.create.totalSize'),
                        id: 'coordinates' + this.stopIndex + this.personIndex + this.packageIndex,
                        name: 'coordinates',
    
                    },
                    inputs: [{
                            props: {
                                name: trans('front.create.width'),
                                placeholder: trans('front.create.width'),
                                validate: 'required|decimal:3|min_value:1'
                            },
                            model: 'width',
                        },
                        {
                            props: {
                                name: trans('front.create.length'),
                                placeholder: trans('front.create.length'),
                                validate: 'required|decimal:3|min_value:1'
                            },
                            model: 'length',
                        },
                        {
                            props: {
                                name: trans('front.create.height'),
                                placeholder: trans('front.create.height'),
                                validate: 'required|decimal:3|min_value:1'
                            },
                            model: 'height',
                        },
                    ],
                }
            },
            inputs() {
                var index = this.index
                return [{
                    props: {
                        name: 'stop' + trans('front.buissness.stopName') + index,
                        placeholder: trans('front.buissness.stopName'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'stopName' + index,
    
    
    
                    },
                },
                {
                    props: {
                        name: 'stop' + trans('front.buissness.numberOfItems') + index,
                        placeholder: trans('front.buissness.numberOfItems'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'numberOfItems' + index,
                        numeric:true,
    
    
    
                    },
                },
                {
                    props: {
                        name: trans('front.buissness.StopTime') + index,
                        placeholder: trans('front.buissness.StopTime'),
                        newclasses: {
                            'stopTime': true,
                        },
                        validate: 'required|decimal:3|min_value:1',
                        id: 'StopsTime' + index,
    
                        numeric: true,
    
                    },
                }]
            }
        },
        props: {
            stop: {
                required: true
            },
            index: {
                required: true,
            }
        },
        methods: {
            validatePlace(place) {
                if (!place || !place.address_components) {
                    return false;
                }
                var HasStreetArray = place.address_components.some((component) => {
                    return component.types.indexOf('street_number') !== -1;
                });
                if (!HasStreetArray) {
                    this.$snotify.warning(trans('front.main.placeError'), trans('front.main.placeErrorHead'), {
                        timeout: 3500,
                        // showProgressBar:false,
                        pauseOnHover: true,
                    });
                }
                return HasStreetArray;
            },
            setStopPlace(place) {
                if (!this.validatePlace(place)) {
                    return false;
                }
                this.stop.location.address = place.address_components;
                this.stop.location.geometry = place.geometry.location;
                if (this.index === 0 && this.$parent.allowPackages === true && this.$parent.packages.length === 0) {
                    this.$parent.makeNewPackage();
                }
                if (this.$parent.allowPackages) {
                    this.stop.shown = true;
                }
                this.$emit('stopChangedLocation', this.stop, this.index);
            }
        },
        created() {
    
    
        },
        mounted() {
    
    
        },
        watch: {
            'stop.allowPackages': function(newval) {
                this.stop.shown = newval;
            },
    
        },
        components: {
            'person-information': require('./row/personInformation.vue'),
            'packages-information': require('./row/packagesInformation.vue')
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