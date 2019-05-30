<template>
    <div class="main-page-div">
        <div class="main-page-maps">
            <gmap-map :center="{lat:51.165691, lng:10.451526}" :zoom="6" map-type-id="roadmap" style="width:100%; height: 100%" ref="map">
                <gmap-marker data-toggle="tooltip" @dragend="setToPlaceViaMarker" :position="to.marker" :title="'to'" :animation="2" :draggable="true">
    
                </gmap-marker>
                <gmap-marker data-toggle="tooltip" @dragend="setFromPlaceViaMarker" :position="from.marker" :title="'from'" :animation="2" :draggable="true">
    
                </gmap-marker>
            </gmap-map>
        </div>
        <div :class="{'main-page-overlay':true,'checked':isChecked}">
            <form action="#" @submit.prevent="check" class="main-page-form">
                <div class="form-head">
                    <div>{{trans('frontend.main.make')}}</div>
                    <span>{{trans('front.main.trackSide')}}</span>
                </div>
                <div class="form-container">
                    <div class="main-form-input">
                        <gmap-autocomplete :placeholder="trans('front.main.from')" @place_changed="setFromPlace" id="FromGeoAdress" ref="fromAdress"></gmap-autocomplete>
                        <span class="icon"><img src="/images/home.svg" class="svg" :alt="trans('from.main.from')"></span>
                    </div>
                    <div class="main-form-input">
                        <gmap-autocomplete :placeholder="trans('front.main.to')" @place_changed="setToPlace" id="ToGeoAdress" ref="ToAdress"></gmap-autocomplete>
                        <span class="icon"><img src="/images/send.svg" :alt="trans('from.main.to')"></span>
                    </div>
                    <div class="main-form-input main-submit">
                        <input type="submit" :disabled="loading" id="SubmitFormButton" :value="trans('front.main.submit')" class="submit">
                        <img src="/images/loading.svg" alt="">
                    </div>
                </div>
            </form>
            <app-orders :orders="allOrders"></app-orders>
        </div>
    </div>
</template>


<script>
    export default {
    
        data() {
            return {
                loading: false,
                from: {
                    adress: '',
                    marker: {
                        lat: 51.165691,
                        lng: 10.451526
                    }
                },
                to: {
                    adress: '',
                    marker: {
                        lat: 51.165691,
                        lng: 10.451526
                    }
                },
                allOrders: this.$orders.getOrders(),
                isChecked: false,
                tempRouteResult: {},
            }
        },
        components: {
            'app-orders': require('./main/AppOrders.vue'),
        },
        mounted() {
            this.$genF.svg();
            $('[data-toggle="tooltip"]').tooltip();
            $('.deleteImage').tooltip();
    
        },
        methods: {
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
                        this.$swal({
                            title: error.title,
                            text: error.text,
                            type: "error",
                            confirmButtonText: trans('front.main.ok'),
                            onOpen() {
    
                                $('.swal2-icon.swal2-error').html('');
                                $('.swal2-icon.swal2-error').html('<img src="/images/warming.svg"/>');
                            }
                        })
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
            setFromPlace(place) {
                this.from.adress = place.formatted_address;
                if (!place.geometry) {
    
                    this.from.marker = {
                        lat: '',
                        lng: ''
                    }
                    return ''
                } else {
                    $('#ToGeoAdress').focus();
                    this.from.marker = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng()
                    }
                }
            },
            setToPlace(place) {
                this.to.adress = place.formatted_address;
                if (!place.geometry) {
    
                    this.to.marker = {
                        lat: '',
                        lng: ''
                    }
                    return ''
                } else {
                    $('#SubmitFormButton').focus();
                    this.to.marker = {
                        lat: place.geometry.location.lat(),
                        lng: place.geometry.location.lng()
                    }
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
                            // alert(results[1].formatted_address);
                        } else {
                            alert('No results found');
                        }
                    }
                })
            },
            gotto() {
                // alert(window.navigator.geolocation.getCurrentPosition)
    
                var directionsService = new window.google.maps.DirectionsService();
                if (this.directionsDisplay) {
                    this.directionsDisplay.setDirections({
                        routes: []
                    });
                    // this.directionsDisplay.setMap(null);
                    this.directionsDisplay = null;
                }
                this.directionsDisplay = new window.google.maps.DirectionsRenderer({
                    suppressMarkers: true
                });
                // this.directionsDisplay.setPanel(document.getElementById('ahmed'));
                this.directionsDisplay.setMap(null);
                this.directionsDisplay.setMap(this.$refs.map.$mapObject);
    
                var start = new window.google.maps.LatLng(this.from.marker.lat, this.from.marker.lng);
                var end = new window.google.maps.LatLng(this.to.marker.lat, this.to.marker.lng);
                // this.position = position.coords
                // start = new window.google.maps.LatLng(this.position.latitude, this.position.longitude);
                // console.log(start,end)
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode['DRIVING']
                };
                directionsService.route(request, (result, status) => {
                    if (status == 'OK') {
                        // this.tempRouteResult = result;
                        var data = {
                            from: this.from.adress,
                            to: this.to.adress,
                            from_map: this.from.marker.lat + ',' + this.from.marker.lng,
                            to_map: this.to.marker.lat + ',' + this.to.marker.lng,
                            userId: this.$orders.OrdersUserId(),
                        }
                        this.$http.post('/api/user/neworder/', data)
                            .then(response => {
                                response.body.orderRoute = this.tempRouteResult;
                                console.log(this.tempRouteResult)
                                this.$orders.NewOrder(response.body)
                                    .then(response => {
    
                                        this.allOrders = response;
                                        this.loading = false;
                                        this.isChecked = true;
                                        this.tempRouteResult = {};
                                    });
    
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