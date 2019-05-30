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
        <div class="main-page-overlay">
            <form action="#" @submit.prevent="check" class="main-page-form">
                <div class="form-head">
                    {{trans('front.main.track')}}
                    <span>{{trans('front.main.trackSide')}}</span>
                </div>
                <div class="form-container">
                    <div class="main-form-input">
    
    
                        <gmap-autocomplete :placeholder="trans('front.main.from')" @place_changed="setFromPlace" id="FromGeoAdress" ref="fromAdress"></gmap-autocomplete>
                        <span class="icon">
                                            <img src="/images/home.svg" :alt="trans('from.main.from')">
                                        </span>
                    </div>
                    <div class="main-form-input">
                        <gmap-autocomplete :placeholder="trans('front.main.to')" @place_changed="setToPlace" id="ToGeoAdress" ref="ToAdress"></gmap-autocomplete>
                        <span class="icon">
                                            <img src="/images/send.svg" :alt="trans('from.main.to')">
                                        </span>
                    </div>
                    <div class="main-form-input">
                        <input type="submit" id="SubmitFormButton" :value="trans('front.main.submit')" class="submit">
                    </div>
    
                </div>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
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
                }
            }
        },
        methods: {
            check(e) {
    
                this.gotto();
                // alert('sdfasdf')
                $('#overlay').removeClass('overlay');
                $('#myform').addClass('box2');
                $('.form-group').removeClass('col-md-4');
                $('.newContent').addClass('overlay3 col-md-3 col-7');
                $('.info').addClass('hidden');
    
                $('#myform').append('<p id="done" class="alert alert-success" role="alert"> done </p>').delay(1000);
                $('#done').fadeOut(3000);
    
                $('#myform').append('<a  class="alert calc" href="/order"> Calc weight  </a>');
    
                // MakeMarker("30.768989399999997", "31.093306499999997");
    
                return true;
    
            },
            setFromPlace(place) {
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
                }, function(results, status) {
                    if (status === 'OK') {
                        if (results[1]) {
                            $('#FromGeoAdress').val(results[1].formatted_address)
                            // alert(results[1].formatted_address);
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
                }, function(results, status) {
                    if (status === 'OK') {
                        if (results[1]) {
                            $('#ToGeoAdress').val(results[1].formatted_address)
    
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
                        this.directionsDisplay.setDirections(result);
                        // console.log(result)
    
    
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