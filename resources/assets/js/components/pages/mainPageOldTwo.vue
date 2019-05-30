<template>
    <div class="main-page-div">
        <div :class="{'main-page-overlay':true,'checked':false}">
            <form action="#" @submit.prevent="check" ref="newOrderForm" class="main-page-form">
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
                    <div class="main-form-input">
                        <gmap-autocomplete :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setFromPlace" id="FromGeoAdress" ref="fromAdress"></gmap-autocomplete>
                        <span class="icon" v-if="from.icon"><img class="svg" :src="from.icon"   :alt="trans('from.main.from')"></span>
                    </div>
                    <div class="main-form-input">
                        <gmap-autocomplete :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setToPlace" id="ToGeoAdress" ref="ToAdress"></gmap-autocomplete>
                        <span class="icon" v-if="to.icon"><img :src="to.icon" class="svg" :alt="trans('from.main.to')"></span>
                    </div>
                    <!-- <div class="main-form-input main-submit">
                                                                                                                    <input type="submit" :disabled="loading" id="SubmitFormButton" :value="trans('front.main.submit')" class="submit">
                                                                                                                    <img src="/images/loading.svg" alt="">
                                                                                                                </div> -->
                </div>
            </form>
            <app-orders @slide-change="slideChange" @activateOrder="changeActiveOrder" :orders="allOrders"></app-orders>
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
                loading: false,
                activatedOrder: false,
                activatedOrderId: {},
                activatedOrderIndex: '',
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
            Slick,
        },
        mounted() {
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
    
    
        },
    
        methods: {
            slideChange(e) {
                if (this.activatedOrder) {
                    this.changeActiveOrder(this.allOrders[e].id)
                }
            },
            isNumeric(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            },
            changeActiveOrder(id) {
    
                // this.activatedOrder = true
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
                        console.log(data)
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
    
                        this.loading = false;
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
                        if (this.$orders.IsFound(NewOrder)) {
                            return reject({
                                title: trans('front.main.repeatedOrder'),
                                text: trans('front.main.repeatedOrderText')
                            })
                        }
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
            setFromPlace(place) {
                this.from.adress = place.formatted_address;
                if (!place.geometry) {
    
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
                    this.to.maker.lat) {
                    this.check();
                }
                this.validateFromPlace();
            },
            setToPlace(place) {
                this.to.adress = place.formatted_address;
                if (!place.geometry) {
    
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
            gotto() {
    
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
                        this.$orders.NewOrder(data)
                            .then(response => {
    
                                this.allOrders = response;
                                this.loading = false;
                                this.isChecked = true;
                                this.tempRouteResult = {};
                                this.changeActiveOrder(response[response.length - 1].id)
                            });
    
                        this.directionsDisplay.setDirections(result);
    
    
                    }
                });
    
    
    
    
            },
    
    
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