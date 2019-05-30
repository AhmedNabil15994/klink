<template>
    <div class="main-page-div">
        <div :class="{'main-page-overlay':true,'checked':false}">
            <form action="#" @submit.prevent="saveNewOrder" ref="newOrderForm" class="main-page-form">
                <div class="form-head">
                    <h1>{{trans('frontend.main.make')}}</h1>
                    <slick ref="slick" :options="slickOptions" class="text-slider">
                        <div>{{trans('frontend.main.p1')}}</div>
                        <div>{{trans('frontend.main.p2')}}</div>
                        <div>{{trans('frontend.main.p3')}}</div>
                        <div>{{trans('frontend.main.p4')}}</div>
                    </slick>
    
                    <!-- <span>{{trans('front.main.trackSide')}}</span> -->
                </div>
                <div class="form-container">
                    <div :class="{'main-form-input':true,'focused':fromFocused}">
                        <div class="main-from-span">
                            <span class="icon" v-if="from.icon"><img class="svg" :src="from.icon"   :alt="trans('from.main.from')"></span>
                            <label for="FromGeoAdress">{{trans('front.main.senderAdress')}}</label>
    
    
                        </div>
                        
                        <gmap-autocomplete style="padding-right:61.5px;"  :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setFromPlace" id="FromGeoAdress" ref="fromAdress" autofocus></gmap-autocomplete>
                        <div class="icons-wrapper">
    
                            <span data-placement="right" data-toggle="tooltip" role="button"><label for="FromGeoAdress"><img src="/images/search.svg" class="right-image svg"  :alt="trans('front.main.gpsusage')"></label></span>
                            <span data-placement="right" data-toggle="tooltip" @click="getLocationToFrom" role="button" :title="trans('front.main.gpsusage')"><img src="/images/gps-fixed-indicator.svg" class="right-image svg" v-if="isThereLocation"  :alt="trans('front.main.gpsusage')"></span>
                        </div>
                    </div>
                    <div :class="{'main-form-input':true,'focused':toFocused}">
                        <div class="main-from-span">
                            <span class="icon" v-if="to.icon"><img :src="to.icon" class="svg" :alt="trans('from.main.to')"></span>
                            <label for="ToGeoAdress">{{trans('front.main.receiverAdress')}}</label>
                        </div>
                        <gmap-autocomplete style="padding-right:30px;" :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setToPlace" id="ToGeoAdress" ref="ToAdress"></gmap-autocomplete>
                        <div class="icons-wrapper">
    
                            <span data-placement="right" data-toggle="tooltip" role="button"><label for="ToGeoAdress"><img src="/images/search.svg" class="right-image svg"  :alt="trans('front.main.gpsusage')"></label></span>
                            <!-- <span data-placement="right" data-toggle="tooltip" @click="getLocationToFrom" role="button" :title="trans('front.main.gpsusage')"><img src="/images/gps-fixed-indicator.svg" class="right-image svg" v-if="isThereLocation"  :alt="trans('front.main.gpsusage')"></span> -->
                        </div>
                    </div>
                    <!-- <div class="main-form-input main-submit">
                            <input type="submit" :disabled="loading" id="SubmitFormButton" :value="trans('front.main.submit')" class="submit">
                            <img src="/images/loading.svg" alt="" v-if="loading===false">
                            <img src="/images/loading2.svg" alt="" v-if="loading===true">
                        </div> -->
                    <!-- <div class="main-form-input main-submit">
                                                                                                                                                                                                                                                                                                                                        <input type="submit" :disabled="loading" id="SubmitFormButton" :value="trans('front.main.submit')" class="submit">
                                                                                                                                                                                                                                                                                                                                        <img src="/images/loading.svg" alt="">
                                                                                                                                                                                                                                                                                                                                    </div> -->
                </div>
            </form>
            <app-orders @slide-change="slideChange" @activateOrder="changeActiveOrder" :orders="allOrders" v-if="allOrders&&allOrders.length!==0"></app-orders>
            <app-other-orders :orders="otherOrders" v-else></app-other-orders>
        </div>
        <div class="main-page-maps">
            <gmap-map :center="{lat:51.165691, lng:10.451526}" :zoom="6" map-type-id="roadmap" style="width:100%; height: 100%" ref="map">
                <gmap-marker data-toggle="tooltip" :icon="'/images/marker-to.svg'" @dragend="setToPlaceViaMarker" :position="to.marker" v-if="isNumeric(to.marker.lng)&&isNumeric(to.marker.lat)" :title="'to'" :animation="2" :draggable="true">
                </gmap-marker>
                <gmap-marker data-toggle="tooltip" :icon="'/images/home-marker.svg'" @dragend="setFromPlaceViaMarker" v-if="isNumeric(from.marker.lng)&&isNumeric(from.marker.lat)" :position="from.marker" :title="'from'" :animation="2" :draggable="true">
    
                </gmap-marker>
            </gmap-map>
        </div>
    
    
    
    </div>
</template>


<script>
    import Slick from 'vue-slick';
    

    export default {
    
        data() {
            return {
                slickOptions: {
                    arrows: false,
                    autoplay: true
                    // Any other options that can be got from plugin documentation
                },
                fromFocused:false,
                toFocused:false,
                loading: false,
                activatedOrder: false,
                activatedOrderId: {},
                activatedOrderIndex: '',
                otherOrders: '',
                from: {
                    adress: '',
                    marker: {
                        lat: 51.165691,
                        lng: 10.451526
                    },
                    icon: 'images/home.svg',
                },
                to: {
                    adress: '',
                    marker: {
                        lat: 51.165691,
                        lng: 10.451526
                    },
                    icon: 'images/send.svg',
                },
                allOrders: this.$orders.getOrders(),
                isChecked: false,
                tempRouteResult: {},
            }
        },
        components: {
            'app-orders': require('./main/AppOrders.vue'),
            'app-other-orders': require('./main/AppOtherOrders.vue'),
            Slick,
        },
        mounted() {
            $('#FromGeoAdress').focus(()=>{
                this.fromFocused = true;
            })
            $('#FromGeoAdress').blur(()=>{
               
                this.fromFocused = false;
            })
            $('#ToGeoAdress').focus(()=>{
                this.toFocused = true;
            })
            $('#ToGeoAdress').blur(()=>{
               
                this.toFocused = false;
            })
            this.$genF.svg();
            $('[data-toggle="tooltip"]').tooltip();
            $('.deleteImage').tooltip();
            $('.fullSize').tooltip();
            $('#FromGeoAdress').change(() => {
                this.setFromPlace({});
            })
            $('#ToGeoAdress').change(() => {
                this.setToPlace({});
            })
    
            this.getOrders();
    
    
    
        },
        computed: {
            isThereLocation() {
                if (window.navigator && window.navigator.geolocation) {
                    return true;
                }
                return false;
            },
        },
    
        methods: {
            focused(type){
                alert(type)
            },
            slideChange(e) {
                if (this.activatedOrder) {
                    this.changeActiveOrder(this.allOrders[e].id)
                }
            },
            getOrders() {
                this.$http.get('/api/orders/other')
                    .then(response => {
                        if (response.body && response.body[1] === 'adv') {
                            if (!this.allOrders || this.allOrders.length === 0) {
                                this.otherOrders = response.body[0];
                            }
                        } else if (response.body && response.body[1] === 'owner') {
                            this.allOrders = this.allOrders.concat(response.body[0].map((e) => {
                                e.id = e.encrypted;
                                return e;
                            }));
                        }
                    })
            },
            isNumeric(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            },
            getLocationToFrom() {
                navigator.geolocation.getCurrentPosition(myposition => {
    
                    this.from.marker = {
                        lat: myposition.coords.latitude,
                        lng: myposition.coords.longitude
                    }
                    var geocoder = new google.maps.Geocoder;
                    var latlng = {
                        lat: Number(myposition.coords.latitude),
                        lng: Number(myposition.coords.longitude)
                    };
    
                    geocoder.geocode({
                        'location': latlng
                    }, (results, status) => {
                        if (status === 'OK') {
                            if (results[0]) {
                                this.from.icon = ''
                                $('#FromGeoAdress').val(results[0].formatted_address)
                                // alert(results[1].formatted_address);
                                this.from.adress = results[0].formatted_address;
                                this.$nextTick(() => {
                                    this.from.icon = '/images/checked.svg';
                                })
                                if (this.activatedOrder) {
                                    this.ShowRoute();
    
    
                                }
                            } else {
                                alert('No results found');
                            }
                        }
                    })
                }, (error) => {
    
                    this.$swal({
                        title: error.message,
                        text: error.message,
                        type: "error",
                        confirmButtonText: trans('front.main.ok'),
                        onOpen() {
                            $('.swal2-icon.swal2-error').html('');
    
                            $('.swal2-icon.swal2-error').html('<img src="/images/warming.svg"/>');
    
                        }
                    })
                }, {
                    maximumAge: 600000,
                    timeout: 5000,
                    enableHighAccuracy: true
                });
            },
            changeActiveOrder(id) {
    
                this.activatedOrder = true
                this.$orders.getOrder(id)
                    .then(response => {
    
                        this.activatedOrderId = response;
                        $('#FromGeoAdress').val(this.activatedOrderId.from)
                        $('#ToGeoAdress').val(this.activatedOrderId.to)
                        this.from.adress = response.from
                        this.to.adress = response.to
    
                        this.from.marker = this.getMarker(response.from_map)
                        this.to.marker = this.getMarker(response.to_map)
                        var directionsService = new window.google.maps.DirectionsService();
                        if (this.directionsDisplay) {
                            this.directionsDisplay.setDirections({
                                routes: []
                            });
                            this.directionsDisplay = null;
                        }
                        this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                            suppressMarkers: true
                        });
                        this.directionsDisplay.setMap(null);
                        this.directionsDisplay.setMap(this.$refs.map.$mapObject);
                        this.directionsDisplay.setDirections(response.orderRoute);
    
                    })
    
            },
            getMarker(text) {
                return {
                    lat: Number(text.split(',')[0]),
                    lng: Number(text.split(',')[1])
                }
            },
            ShowRoute() {
                var directionsService = new window.google.maps.DirectionsService();
                if (this.directionsDisplay) {
    
                    this.directionsDisplay.setDirections({
                        routes: []
                    });
                    this.directionsDisplay = null;
                }
                this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                    suppressMarkers: true
                });
                this.directionsDisplay.setMap(null);
    
                this.directionsDisplay.setMap(this.$refs.map.$mapObject);
    
                var start = new window.google.maps.LatLng(this.from.marker.lat, this.from.marker.lng);
                var end = new window.google.maps.LatLng(this.to.marker.lat, this.to.marker.lng);
    
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode['DRIVING']
                };
    
                directionsService.route(request, (result, status) => {
                    if (status == 'OK') {
                        this.tempRouteResult = result
                        this.activatedOrderId.orderRoute = result;
                        this.directionsDisplay.setDirections(result);
                        var data = {
                            from: this.from.adress,
                            to: this.to.adress,
                            from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                            to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                            orderRoute: this.tempRouteResult,
                        }
                        if (!this.activatedOrderIndex || this.allOrders[this.activatedOrderIndex].id !== this.activatedOrderId.id) {
                            this.allOrders.map((element, index) => {
                                if (element.id === this.activatedOrderId.id) {
                                    this.activatedOrderIndex = index;
                                }
                            })
                        }
                        for (var key in data) {
                            this.allOrders[this.activatedOrderIndex][key] = data[key]
                        }
                        this.$orders.updateOrder(this.activatedOrderId.id, data);
    
    
    
                    }
                });
            },
            check(e) {
                this.loading = true;
                var data = {
                    from: this.from.adress,
                    to: this.to.adress,
                    from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                    to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                    userId: this.$orders.OrdersUserId(),
                }
                this.orderValidate(data)
                    .then(response => {
                        this.gotto();
    
                    }, error => {
                        this.gotto();
                        // this.loading = false;
                    })
    
    
    
    
    
    
                return true;
    
            },
            orderValidate(NewOrder) {
                var result = false;
                if (NewOrder.from && NewOrder.to && NewOrder.from_map && NewOrder.to_map && NewOrder.from_map !== NewOrder.to_map) {
                    result = true;
                }
                return new Promise((resolve, reject) => {
                    if (result) {
                        // if (this.$orders.IsFound(NewOrder)) {
                        //     return reject({
                        //         title: trans('front.main.repeatedOrder'),
                        //         text: trans('front.main.repeatedOrderText')
                        //     })
                        // }
                        return resolve(result);
                    } else {
                        return reject({
                            title: trans('front.main.wrongData'),
                            text: trans('front.main.wrongDataMessage'),
                        });
                    }
                })
            },
            validateFromPlace() {
    
                if (this.from.marker.lat && this.from.marker.lng && this.from.adress && $('#FromGeoAdress').val()) {
                    this.from.icon = ''
                    this.$nextTick(() => {
                        this.from.icon = '/images/checked.svg'
                    })
                } else {
                    this.from.icon = ''
                    this.$nextTick(() => {
                        this.from.icon = '/images/warning.svg'
                    })
                }
            },
            validateToPlace() {
    
                if (this.to.marker.lat && this.to.marker.lng && this.to.adress && $('#ToGeoAdress').val()) {
                    this.to.icon = ''
                    this.$nextTick(() => {
                        this.to.icon = '/images/checked.svg'
                    })
                } else {
                    this.to.icon = ''
                    this.$nextTick(() => {
                        this.to.icon = '/images/warning.svg'
                    })
                }
            },
            validatePlace(place){
                if(!place||!place.address_components){
                    return false;
                }
                var HasStreetArray = place.address_components.some((component)=>{
                    return component.types.indexOf('street_number')!==-1;
                });
                if(!HasStreetArray){
                    this.$snotify.warning(trans('front.main.placeError'),trans('front.main.placeErrorHead'),{
                        timeout:3500,
                        // showProgressBar:false,
                        pauseOnHover:true,
                    });
                }
                return HasStreetArray;
            },
            setFromPlace(place) {
                this.from.adress = place.formatted_address;
                
                if (!place.geometry||!this.validatePlace(place)) {
                    
                    this.from.marker = {
                        lat: '',
                        lng: ''
                    }
                    this.validateFromPlace();
                    return ''
                } else {
                    $('#ToGeoAdress').focus();
                    this.from.marker = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng()
                    }
    
                }
                if (this.activatedOrder) {
                    this.ShowRoute();
    
                } else if (this.from.adress &&
                    this.from.marker &&
                    this.to.marker &&
                    this.from.marker.lat &&
                    this.from.marker.lng &&
                    this.to.adress &&
                    this.to.marker.lng &&
                    this.to.marker.lat) {
                    this.check();
                }
                this.validateFromPlace();
            },
            setToPlace(place) {
                this.to.adress = place.formatted_address;
                if (!place.geometry||!this.validatePlace(place)) {
    
                    this.to.marker = {
                        lat: '',
                        lng: ''
                    }
                    this.validateToPlace()
                    return ''
                } else {
                    $('#SubmitFormButton').focus();
                    this.to.marker = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng()
                    }
                }
                this.validateToPlace();
                if (this.activatedOrder) {
                    this.ShowRoute();
    
    
                } else if (this.from.adress &&
                    this.from.marker.lat &&
                    this.from.marker.lng &&
                    this.to.adress &&
                    this.to.marker.lng &&
                    this.to.marker.lat) {
                    this.check();
                }
                this.$nextTick(() => {
                    this.saveNewOrder();
                })
            },
            setFromPlaceViaMarker(event) {
    
                this.from.marker = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                }
                var geocoder = new google.maps.Geocoder;
                var latlng = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                };
                geocoder.geocode({
                    'location': latlng
                }, (results, status) => {
                    if (status === 'OK') {
                        if (results[1]) {
                            $('#FromGeoAdress').val(results[1].formatted_address)
                            // alert(results[1].formatted_address);
                            this.from.adress = results[1].formatted_address;
                            if (this.activatedOrder) {
                                this.ShowRoute();
    
                            }
                        } else {
                            alert('No results found');
                        }
                    }
                })
    
            },
    
            setToPlaceViaMarker(event) {
    
                this.to.marker = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng(),
                }
                // this.gotto()
                var geocoder = new google.maps.Geocoder;
                var latlng = {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                };
                geocoder.geocode({
                    'location': latlng
                }, (results, status) => {
                    if (status === 'OK') {
                        if (results[1]) {
                            $('#ToGeoAdress').val(results[1].formatted_address)
                            this.to.adress = results[1].formatted_address;
                            if (this.activatedOrder) {
                                this.ShowRoute();
    
                            }
                            // alert(results[1].formatted_address);
                        } else {
                            alert('No results found');
                        }
                    }
                })
    
            },
            gotto(save = false) {
    
                var directionsService = new window.google.maps.DirectionsService();
                if (this.directionsDisplay) {
                    this.directionsDisplay.setDirections({
                        routes: []
                    });
                    this.directionsDisplay = null;
                }
                this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                    suppressMarkers: true
                });
                this.directionsDisplay.setMap(null);
                this.directionsDisplay.setMap(this.$refs.map.$mapObject);
    
                var start = new window.google.maps.LatLng(this.from.marker.lat, this.from.marker.lng);
                var end = new window.google.maps.LatLng(this.to.marker.lat, this.to.marker.lng);
    
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode['DRIVING']
                };
                directionsService.route(request, (result, status) => {
                    if (status == 'OK') {
                        this.tempRouteResult = result;
                        var data = {
                            from: this.from.adress,
                            to: this.to.adress,
                            from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                            to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                            orderRoute: this.tempRouteResult,
                        }
                        if (save === true) {
    
    
                            this.$orders.NewOrder(data)
                                .then(response => {
    
    
                                    this.allOrders = response;
    
                                    this.isChecked = true;
                                    this.tempRouteResult = {};
                                    // this.changeActiveOrder(response[response.length - 1].id);
                                    this.$nextTick(() => {
                                        this.loading = false;
                                        this.$router.push('/order/create_order/' + response[response.length - 1].id);
                                    })
    
                                })
    
                        }
    
                        this.directionsDisplay.setDirections(result);
                        this.loading = false;
    
    
                    }
                });
    
    
    
    
            },
            saveNewOrder() {
                this.loading = true;
                var data = {
                    from: this.from.adress,
                    to: this.to.adress,
                    from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                    to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                    orderRoute: this.tempRouteResult,
                }
                this.orderValidate(data)
                    .then(result => {
    
                        this.gotto(true)
                    }, error => {
                        if (!this.from.marker || !this.from.adress || !this.from.marker.lat || !this.from.marker.lng) {
                            this.from.icon = '';
                            this.$nextTick(() => {
                                this.from.icon = '/images/warning.svg';
                            })
                        }
                        if (!this.to.marker || !this.to.adress || !this.to.marker.lat || !this.to.marker.lng) {
                            this.to.icon = '';
                            this.$nextTick(() => {
                                this.to.icon = '/images/warning.svg';
                            })
                        }
    
                        this.loading = false;
                    })
    
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