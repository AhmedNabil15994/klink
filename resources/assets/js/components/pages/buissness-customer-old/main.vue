<template>
    <div class="container create-order-container">
    
        <div class="form-map-container" style="margin-top:20px;">
            <div class="order-form-wrapper" style="padding-bottom: 20px;">
                <slider-slick-tour :tour="tour">
    
                </slider-slick-tour>
                <div class="row tour-type-row">
                    <div :class="{ 'tourtype':true,'active':tour.mainType===tourtype.type}" v-for="tourtype in tourtypes" :key="tourtype.type+'tourtype'">
                        <span @click="changeTourType(tourtype)">{{trans('front.buissness.tourtype'+tourtype.type)}}</span>
                    </div>
    
                </div>
                <div class="row tour-type-row left" v-if="tourtype.type===tour.mainType" v-for="tourtype in tourtypes" :key="tourtype.type+'tourtypeOther'">
                    <div :class="{ 'tourtype':true,'active':tour.type===othertype.type}" v-for="othertype in tourtype.otherTypes" :key="'otherTypes'+othertype.type">
                        <span @click="tour.type=othertype.type">{{trans('front.buissness.tourtype'+othertype.type)}}</span>
                    </div>
                </div>
    
    
                <new-package-modal :upPackage="getnerateNewPackage()"></new-package-modal>
            </div>
            <div class="order-info-form">
                <div class="map-element" style="max-height:100vh;">
                    <gmap-map :center="mapCenter" :options="sideMapOptions" :zoom="mapZoom" map-type-id="roadmap" style="width:100%; height: 100%" ref="map">
                    </gmap-map>
                </div>
            </div>
    
        </div>
        <slideout-panel>
    
    
        </slideout-panel>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                packageTypes: [{
    
                        id: 0,
                        shortcut: 'S',
                        title: "small",
                        details: {
                            weight: 5,
                            width: 10,
                            length: 10,
                            height: 10,
                        },
                    },
                    {
                        id: 1,
                        shortcut: 'M',
                        title: "medium",
                        details: {
                            weight: 5,
                            width: 20,
                            length: 20,
                            height: 20,
                        },
                    },
                    {
                        id: 2,
                        shortcut: 'L',
                        title: "large",
                        details: {
                            weight: 5,
                            width: 30,
                            length: 30,
                            height: 30,
                        },
                    },
                    {
                        id: 3,
                        shortcut: 'EP',
                        title: "Europalette",
                        details: {
                            weight: 50,
                            width: 50,
                            length: 50,
                            height: 50,
                        },
                    },
    
                ],
                stops: [],
                sideMapOptions: {
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    fullscreenControl: false,
    
    
                },
                tour: {
                    type: 'dynamic',
                    mainType: 'stops',
                    days: [false, false, false, false, false, false, false]
                },
                tourtypes: [{
                        type: 'stops',
                        // otherTypes: [{
                        //         type: 'dynamic'
                        //     },
                        //     {
                        //         type: 'static'
                        //     },
                        // ]
                    },
                    {
                        type: 'time',
                        otherTypes: [{
                                type: 'minutes'
                            },
                            {
                                type: 'hours'
                            },
                        ]
                    },
    
                    {
                        type: 'dates',
                        otherTypes: [{
                                type: 'days'
                            },
                            {
                                type: 'week'
                            },
                            {
                                type: 'month'
                            },
                        ]
                    },
                    {
                        type: 'packets',
    
                    }
                ],
                packages: [],
                mapCenter: {
                    lat: 51.165691,
                    lng: 10.451526
                },
                mapZoom: 6,
                allowPackages: true
    
            }
        },
        computed: {
    
        },
        watch: {
            allowPackages(newval) {
                this.stops.forEach((stop) => {
                    stop.allowPackages = newval;
                })
            },
        },
        props: {},
        methods: {
            changeTourType(type) {
                this.tour.mainType = type.type;
                this.tour.type = type.otherTypes ? type.otherTypes[0].type : type.type
            },
            showPanel() {
                const panel = this.$showPanel({
                    component: "stop-panel",
                    cssClass: "panel-1",
                    props: {}
                });
            },
            stopChangedLocation(stop, index) {
                console.log(stop, index);
            },
            addNewStop(newStop) {
                this.stops.push(newStop);
            },
            generateNewStop(packageCreatedHere = false, time = "") {
                return {
                    location: {
                        address: [],
                        geometry: {},
                    },
    
                    persons: [
                        // this.generateNewPerson(packageCreatedHere)
                    ],
                    uploads: this.getStopUploads(),
                    downloads: this.getStopDownloads(),
                    startTime: window.moment(new Date().setHours(0, 0, 0, 0)),
                    loadTime: 3,
                    packageType: 0,
                    numberOfPackets: 1,
                    stopName: '',
                    shown: false,
                    allowPackages: false
                }
            },
            getStopUploads() {
                var uploadPackages = []
                this.packages.forEach((mypackage, index) => {
                    uploadPackages.push({
                        createdHere: false,
                        packageIndex: index,
                        numberOfItems: 0
    
                    })
                })
                return [uploadPackages];
    
            },
            getStopDownloads() {
                var downloadPackages = []
                this.packages.forEach((mypackage, index) => {
                    downloadPackages.push({
                        packageIndex: index,
                        numberOfItesms: 0
                    })
                })
                return [downloadPackages];
    
            },
            isPackaging() {
                return this.allowPackages;
            },
            generateNewPerson(packageCreatedHere = false) {
                return {
                    information: {
                        firs_name: '',
                        last_name: '',
                        email: '',
                    },
    
    
                }
            },
            getnerateNewPackage() {
                return {
                    width: 0,
                    length: 0,
                    height: 0,
                    weight: 0,
                    name: ''
                }
            },
            addNewPackage(frieght) {
                this.packages.push(frieght)
                var index = this.packages.length - 1;
                var uploadPackage = {
                    createdHere: false,
                    packageIndex: index,
                    numberOfItems: 0
    
                }
                var downloadPackage = {
                    packageIndex: index,
                    numberOfItems: 0
                }
                this.stops.forEach((stop, myStopIndex) => {
    
    
                    stop.uploads.forEach((uploadSet) => {
                        uploadSet.push(uploadPackage)
                    })
                    stop.downloads.forEach((downloadSet) => {
                        downloadSet.push(downloadPackage)
                    })
    
                })
            },
            makeNewPackage() {
                // $('#newPackageModal').modal('show')
            },
            NewPackage() {
                var mypackage = this.getnerateNewPackage();
                this.addNewPackage(mypackage)
                var index = this.packages.length - 1;
    
    
                return index;
            },
        },
        created() {
    
    
        },
        mounted() {
            Vue.component('stop-panel', require('./StopPanel.vue'));
            this.addNewStop(this.generateNewStop(true));
            // this.addNewPackage(this.getnerateNewPackage());
    
        },
        components: {
            'stop-row': require('./stopRow.vue'),
            'slider-slick-tour': require('./SliderSlickTour.vue'),
            'new-package-modal': require('./packages/newPackageModal.vue'),
    
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