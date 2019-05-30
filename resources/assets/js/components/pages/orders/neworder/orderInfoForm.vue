<template>
    <div id="mapMoveHere" :class="{'order-info-form':true,'full-screen-shown':isFullScreen}" ref="orderInfoForm">
        <div class="show-map">
            <img src="/images/map.svg" @click="changeFullScreenMode" alt="Show Map.">
        </div>
        <div class="show-map md">
            <img src="/images/edit.svg" @click="changeFullScreenMode" alt="Edit">
        </div>
        <div class="from-to-info">
            <div class="from-info-box">
                <img class="svg" src="/images/map-marker.svg" alt="">
                <div class="from-info-box-data" v-show="!isFullScreen">
                    {{order.from}}
                </div>
                <gmap-autocomplete v-show="isFullScreen" :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setPlaceViaAutoComplete(...arguments,'from')" id="OrderfromGeoAddress" ref="fromAdress"></gmap-autocomplete>
            </div>
            <div class="from-info-box">
                <img class="svg" src="/images/slating-flag.svg" alt="">
                <div class="from-info-box-data" v-show="!isFullScreen">
                    {{order.to}}
                </div>
                <gmap-autocomplete v-show="isFullScreen" :placeholder="trans('front.main.addressPlaceHolder')" @place_changed="setPlaceViaAutoComplete(...arguments,'to')" id="OrdertoGeoAddress" ref="toAdress"></gmap-autocomplete>
            </div>
            <div class="order-pricing-full-screen" data-toggle="tooltip" :title="trans('front.create.cost')" v-show="isFullScreen">
                <img src="/images/euro.svg" class="svg" alt=""> {{this.order.cost}}
            </div>
        </div>
        <div class="map-element">
            <img role="button" @click="changeFullScreenMode" :src="fullScreenSource" alt="" class="full-screen">
            <gmap-map :center="mapCenter" :options="sideMapOptions" :zoom="mapZoom" map-type-id="roadmap" style="width:100%; height: 100%" ref="map">
                <gmap-marker data-toggle="tooltip" :icon="'/images/map-marker-red.svg'" :position="$parent.getMapPosition(order.from_map)" :title="'from'" :animation="markerAnimation" :clickable="true" @click="changeMapCenter" @dragend="setPlaceViaMarker(...arguments,'from')"
                    :draggable="true">
    
                </gmap-marker>
                <gmap-marker data-toggle="tooltip" :icon="'/images/slating-flag-map.svg'" :position="$parent.getMapPosition(order.to_map)" :title="'to'" :animation="markerAnimation" :clickable="true" @click="changeMapCenter" @dragend="setPlaceViaMarker(...arguments,'to')"
                    :draggable="true">
    
                </gmap-marker>
            </gmap-map>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                sideMapOptions: {
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    fullscreenControl: false,
    
    
                },
                mapCenter: {
                    lat: 51.165691,
                    lng: 10.451526
                },
                mapZoom: 6,
                markerAnimation: 1,
                isFullScreen: false
    
            }
        },
        computed: {
            fullScreenSource() {
                if (!this.isFullScreen) {
    
                    return '/images/switch-to-full-screen-button.svg';
                }
                return '/images/full-screen-exit.svg'
            }
        },
        props: {
            order: {
                required: true,
    
            }
        },
        methods: {
            setAutoCompleteInFullScreen() {
                if ($(".pac-container").length === 0) {
                    setTimeout(() => {
                        this.setAutoCompleteInFullScreen()
                    }, 500)
                } else {
                    $(".pac-container").prependTo("#mapMoveHere");
    
                }
                if ($('.snotify').parent().length !== 0) {
                    $('.snotify').parent().prependTo('#mapMoveHere');
                }
            },
            setPlaceViaAutoComplete(place, placeToBeChanged) {
    
                if (!this.validatePlace(place)) {
                    return false;
                }
    
                if (place && place.geometry) {
                    this.order[placeToBeChanged] = place.formatted_address;
                    this.order[placeToBeChanged + '_map'] = place.geometry.location.lat() + ',' + place.geometry.location.lng();
                    this.goto()
                }
            },
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
            setPlaceViaMarker(event, placeToBeChanged) {
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
                            // $('#ToGeoAdress').val(results[1].formatted_address)
                            this.order[placeToBeChanged] = results[1].formatted_address;
                            $('#Order' + placeToBeChanged + 'GeoAddress').val(this.order[placeToBeChanged])
                            this.order[placeToBeChanged + '_map'] = event.latLng.lat() + ',' + event.latLng.lng()
                            this.$nextTick(() => {
                                this.goto();
                            })
                            // alert(results[1].formatted_address);
                        } else {
                            alert('No results found');
                        }
                    }
                })
            },
            changeMapCenter(e) {
    
    
                this.mapCenter = {
                    lat: 51.165691,
                    lng: 10.451526
                }
                this.mapZoom = 6;
                this.$nextTick(() => {
                    this.mapCenter = e.latLng;
                    this.mapZoom = 18;
                })
    
    
    
            },
    
    
            changeFullScreenMode() {
    
                if (this.isFullScreen === false) {
                    var fullScreenElement = this.$refs.orderInfoForm;
    
    
                    var fullScren = fullScreenElement.requestFullscreen || fullScreenElement.msRequestFullscreen || fullScreenElement.mozRequestFullScreen || fullScreenElement.webkitRequestFullscreen;
    
                    // console.log(fullScreenElement[fullScren])
                    fullScren.call(fullScreenElement);
                } else {
                    var exitFull = document.exitFullscreen || document.msExitFullscreen || document.mozExitFullscreen || document.webkitExitFullscreen;
                    exitFull.call(document);
                }
            },
            exitHandler(e) {
                if (document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement !== null) {
                    if (this.isFullScreen === false) {
    
                        $('.kurier-link-main-container').addClass('max-height');
                    } else {
                        $('.kurier-link-main-container').removeClass('max-height');
                    }
                    this.isFullScreen = !this.isFullScreen;
                }
            },
            goto() {
                if (!(window.google && window.google.maps && this.$refs.map && this.$refs.map.$mapObject)) {
    
                    setTimeout((
    
                    ) => {
    
                        return this.goto();
                    }, 250);
                } else {
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
                    this.directionsDisplay.setMap(this.$refs.map.$mapObject);
                    var from = this.$parent.getMapPosition(this.order.from_map);
                    var to = this.$parent.getMapPosition(this.order.to_map);
                    var start = new window.google.maps.LatLng(from.lat, from.lng);
                    var end = new window.google.maps.LatLng(to.lat, to.lng);
                    var request = {
                        origin: start,
                        destination: end,
                        travelMode: google.maps.TravelMode['DRIVING']
                    };
    
                    directionsService.route(request, (result, status) => {
                        if (status == 'OK') {
                            this.order.orderRoute = {};
                            this.$nextTick(() => {
    
                                this.order.orderRoute = result;
                                this.$parent.isChanged = false;
                            })
    
                            this.directionsDisplay.setDirections(result);
                            setTimeout(() => {
                                this.markerAnimation = 4;
                            }, 7500)
                        }
                    })
    
    
                    return true;
                }
            },
        },
        created() {
    
    
        },
        mounted() {
            this.$nextTick(() => {
                this.setAutoCompleteInFullScreen();
            })
            if (document.addEventListener) {
                document.addEventListener('webkitfullscreenchange', this.exitHandler, false);
                document.addEventListener('mozfullscreenchange', this.exitHandler, false);
                document.addEventListener('fullscreenchange', this.exitHandler, false);
                document.addEventListener('MSFullscreenChange', this.exitHandler, false);
            }
        },
        watch: {
            isFullScreen(newval) {
                if (newval === true) {
                    $('#OrderfromGeoAddress').val(this.order.from)
                    $('#OrdertoGeoAddress').val(this.order.to)
                    this.setAutoCompleteInFullScreen();
                } else {
                    
                    if ($('.snotify').parent().length !== 0) {
                        $('.snotify').parent().prependTo('.kurier-link-main-container');
                    }
                }
            }
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