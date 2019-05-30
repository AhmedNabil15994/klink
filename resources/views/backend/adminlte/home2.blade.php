@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/main.dashboard') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/main.dashboard') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/main.dashboard')
}}
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb') {{ trans('backend/main.dashboard') }}
@endsection
 
@section('main-content')

<div class="map-wrapper" >
    <div class="map-side-lg map-side" >
       
        @include('backend.adminlte.homeSide.mapside')
    </div>
    <div id="googlemaps" class="map-wrapper">
        <div class="checkboxes"  style="padding:10px;">
            <label class="checkbox-inline"><input type="checkbox" v-model="ShowOptions" :value="'Companies'">{{trans('backend/home.companies')}}</label>
            <label class="checkbox-inline"><input type="checkbox" v-model="ShowOptions" :value="'orders'">{{trans('backend/home.orders')}}</label>
            <label class="checkbox-inline"><input type="checkbox" v-model="ShowOptions" :value="'vehicles'">{{trans('backend/home.vehicles')}}</label>
        </div>
        <gmap-map ref="mapRef" id="GoogleMapView"  :center="GoogleMapCenter" :options="GoogleMapsOptions" :zoom="6"  style="width: 100%; height: 500px">
            <gmap-cluster @click="ClusterClicked"  :grid-size="50" :zoom-on-click="true">
                <gmap-marker @click="showMapSide(marker.type,marker.id)" v-for="marker in markers" v-if="ShowOptions.includes(marker.markerType)"  :icon="marker.icon" :key="'marker_'+marker.key"  :position="marker.position"></gmap-marker>

              </gmap-cluster>
        </gmap-map>
    </div>
</div>
@endsection
 
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="/js/driver/markerclusterer.js"></script>
<script src="/js/driver/vue-google-maps.js"></script>
<script src="/plugins/axios/axios.js"></script>
<style>
    #googlemaps{
        min-height: 80vh;
    }
    #googlemaps.withShown{
        width: calc(100% - 300px) !important;
        left: 300px;
        
    }
    #googlemaps{
        transition: .3s;
    }
    .map-wrapper{
        position: relative;

    }
    .map-side-lg{
        position: absolute;
        background: #fff;
        top: 0;
        left: 0;
        height: 100%;
        width: 0;
        max-width: 100%;
        z-index: 10;
        transition: .5s;
        
        overflow-x: hidden;
    }
    .close-map-side{
        position: relative;
        height: 2rem;
    }
    .close-map-side i.fa{
        font-size: 2rem;
        color: #ef0505;
        right: 10px;
        position: absolute;
        cursor: pointer;
    }
    .map-side-lg.shown{
        width: 300px;
        box-shadow: 5px 3px 10px 0 #ededed;
        padding-right: 10px;
    }
    .map-side-main-wrapper{
        display: flex;
        flex-direction: column;
    }
    .user-map-head-wrapper{
        display: flex;
        /* flex-wrap: wrap; */
        align-items: center;
    }
    .user-map-head-wrapper img{
        max-width: 100px;
        max-height: 100px;
    }
    .user-map-head-info{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .order-descriptioin-wrapper{
        display: flex;
        flex-direction: column;
    }
    .order-descriptioin-wrapper .order-part-info i.fa{
        color: #f6ab36;
        margin-right: 5px;
    }
    .order-descriptioin-wrapper .order-part-info{
        flex: 1 0 auto;
        display: flex;
        flex-wrap: wrap;
        border-top: 1px solid #f6ab36;
        border-bottom: 1px solid #f6ab36;
        padding: 5px 2.5px;
    }
    .order-menu{
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }
    .order-menu .order-menu-item{
        flex: 1 0 auto;
        text-align: center;
        background: #ededed;
        padding: 2.5px;
        cursor: pointer;
    }
    .order-part-item.offers .offer-item.head-item{
        background: #f6ab36;
        color: #ededed;
        padding: 2px 0px;
        margin-top: 5px;
        text-align: center;

    }
    .order-part-item.offers .offer-item{
        display: flex;
        width: 100%;
        flex-wrap: nowrap;
        overflow-x: auto;
        padding: 2px;
        cursor: pointer;
        transition: .3s;
    }
    .order-part-item.offers .offer-item:hover{
        background: #ffce81;
        color: #ffffff;
    }
    .no-items{
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .no-items img{
        display: block;
        margin: 0 auto;
    }
    .tablee{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        border: 2px solid #f6ab36;
        border-radius: 10px;
        width: 100%;
        overflow: hidden;
        margin-top: 10px;
    }
    .tablee .table-row {
        width: 100%;
        display: flex;
        flex-wrap: nowrap;
        padding: 0 2.5px;
        padding-left: 0;
        /* height: 30px; */
        border-bottom: 1px solid #f6ab36;
        box-sizing: border-box;
        line-height: 30px;
        max-height: 150px;
    }
    .tablee .table-head {
        width: 40%;
        border-right: 1px solid #f6ab36;
        font-weight: 300;
        text-align: center;
        font-size: 12px;
        font-family: 'Galada', cursive;
        color: #000;
        /* color: #111; */
    }
    .tablee .table-cell {
        text-align: center;
        font-size: 14px;
        width: 60%;
        overflow-y: auto;
    }
    .order-part-item{
        display: flex;
        width: 100%;
    }
    .order-part-item.offers .offer-item .offer-desc{
        flex: 1 0 auto;
    }
    .order-part-item.offers .offer-desc i.fa.fa-check-circle{
        color: lightgreen;
    }
    .order-part-item.offers .offer-desc i.fa.fa-times-circle{
        color: #ef0505;
    }
    .order-part-item.offers{
        display: flex;
        flex-wrap: wrap;
        transition: .3s;
    }
    .order-menu .order-menu-item.active{
        background: #f6ab36;
        color: #ededed;
        transition: .3s;
    }
    
    .modal, .modal-backdrop {
        position: absolute !important;
        padding:0 !important;
    }
    .modal-dialog{
        width: 100% !important;
    }

</style>

<script>
    Vue.use(VueGoogleMaps,{
        load:{
            key: 'AIzaSyD06pFMPpfuA37fB3JJQ_K85GaRG45CFv8',
            libraries: 'places',
            language: '{{\App::getLocale()}}'
        }
        
    });
    Vue.component('gmap-cluster',VueGoogleMaps.Cluster)
    Vue.component('gmap-marker',VueGoogleMaps.Marker)
    window.VueHome = new Vue({
        el:'#googlemaps',
        data:{
            GoogleMapCenter:{
                lat:51.165691,
                lng:10.451526
            },
            GoogleMapsOptions:{
                
                //  maxZoom: 12
            },
            ShowOptions:[
                'Companies',
                'orders',
                'vehicles'
            ],
            savedOrders:[],
            savedUsers:[],
            savedVehicles:[]
        },
        methods:{
            ClusterClicked:function(cluster){
                // console.log(cluster.getMarkers()[1]['position'].lat(),cluster.getMarkers()[1]['position'].lng())
                // console.log(cluster.getCenter().lat(),cluster.getCenter().lng())
                var center = cluster.getCenter().lat()+','+cluster.getCenter().lng();
                // var index = cluster.
                var mycenter = cluster.getMarkers()[1].position.lat()+','+cluster.getMarkers()[1].position.lng();
                console.log(center,mycenter);
                console.log(center===mycenter);
            },
            showMapSide:function(type,id){
                $('.map-side-lg').addClass('shown');
                $('#googlemaps').addClass('withShown');
                VueApp[type] = id
            },
            closeMapSide:function(){
                $('.map-side-lg').removeClass('shown');
                $('#googlemaps').removeClass('withShown');
                console.log('ahmed')
            },
            getMapData: function () {
                axios.get('{{route("backend.AllUserApi")}}')
                    .then(function (response) {
                        this.savedUsers = response.data.users;
                        this.savedOrders = response.data.orders;
                        this.savedVehicles = response.data.vehicles;
                    }.bind(this));
            },
            replaceEmptyStringToNull: function (string) {
                if (string && string !== 'null') {
                    return string;
                }
                return '';
            },
            getOrderMarker:function(order){
                if (!order.source_location) {
                    this.$refs.mapRef.$mapPromise.then(function (response) {
                        var geocoder = new window.google.maps.Geocoder();
                        var address = order.source;
                        geocoder.geocode({
                            'address': address
                        }, function (results, status) {

                            if (status === window.google.maps.GeocoderStatus.OK) {

                                latitude = results[0].geometry.location.lat();
                                longitude = results[0].geometry.location.lng();
                                order.source_location = latitude+','+longitude;
                                
                            }
                        }.bind(this))
                    }.bind(this))
                } else {
                    var latitude = order.source_location.split(',')[0];
                    var longitude = order.source_location.split(',')[1];
                                     
                }
                return{
                    lat:Number(latitude),
                    lng:Number(longitude),
                }
            },
            getVehicleMarker:function(vehicle){
                if(!vehicle.location){
                    this.$refs.mapRef.$mapPromise.then(function (response) {
                        var geocoder = new window.google.maps.Geocoder();
                        var address = this.replaceEmptyStringToNull(vehicle.address)+', '+
                        this.replaceEmptyStringToNull(vehicle.home)+', '+
                        this.replaceEmptyStringToNull(vehicle.postal_code)+', '+
                        this.replaceEmptyStringToNull(vehicle.city)+', '+
                        this.replaceEmptyStringToNull(vehicle.region)+', '+
                        this.replaceEmptyStringToNull(vehicle.country);
                        // console.log(address.replace(',',''))
                        geocoder.geocode({
                            'address': address.replace(',','')
                        }, function (results, status) {
                            
                            if (status === window.google.maps.GeocoderStatus.OK) {

                                latitude = results[0].geometry.location.lat();
                                longitude = results[0].geometry.location.lng();
                                vehicle.location = latitude+','+longitude;
                                
                            }
                        }.bind(this))
                    }.bind(this))
                }else{
                    var latitude = vehicle.location.split(',')[0];
                    var longitude = vehicle.location.split(',')[1];
                }
                return{
                    lat:Number(latitude),
                    lng:Number(longitude),
                }
            },
            getUserMarker: function(user) {
                var latitude = 0
                var longitude = 0
                if (!user.profile.location) {
                    
                    this.$refs.mapRef.$mapPromise.then(function (response) {
                        var geocoder = new window.google.maps.Geocoder();
                        var address = this.replaceEmptyStringToNull(user.profile.address) + ' ' + this.replaceEmptyStringToNull(user.profile.home) + ' ' + this.replaceEmptyStringToNull(user.profile.postal_code) + ' ' + this.replaceEmptyStringToNull(user.profile.district) + ' ' + this.replaceEmptyStringToNull(user.profile.region) + ' ' + this.replaceEmptyStringToNull(user.profile.country);
                        geocoder.geocode({
                            'address': address
                        }, function (results, status) {

                            if (status === window.google.maps.GeocoderStatus.OK) {

                                latitude = results[0].geometry.location.lat();
                                longitude = results[0].geometry.location.lng();
                                user.profile.location = latitude+','+longitude;
                                

                            }
                        }.bind(this))
                    }.bind(this))
                } else {
                   
                    latitude = user.profile.location.split(',')[0];
                    longitude = user.profile.location.split(',')[1];
                    
                }
                return {
                        lat:Number(latitude),
                        lng:Number(longitude)
                    }
                
            }
        },
        mounted:function() {
            this.getMapData();
        },
        computed:{
            markers:function(){
                var markers = [];
                this.savedUsers.forEach(function(user){
                    markers.push({
                        position:this.getUserMarker(user),
                        icon:'/images/company-marker.svg',
                        key:'marker-company'+user.id,
                        type:'currentUser',
                        markerType:'Companies',
                        id:user.id
                    });
                }.bind(this));
                this.savedOrders.forEach(function(user){
                    markers.push({
                        position:this.getOrderMarker(user),
                        icon:"/order/icon/" + user.id,
                        key:'marker-order'+user.id,
                        type:'currentOrder',
                        markerType:'orders',
                        id:user.id
                    });
                }.bind(this));
                this.savedVehicles.forEach(function(vehicle){
                    markers.push({
                        position:this.getVehicleMarker(vehicle),
                        icon:"/images/delivery-truck.svg",
                        key:'marker-vehicle'+vehicle.id,
                        type:'currentVehicle',
                        markerType:'vehicles',
                        id:vehicle.id
                    });
                }.bind(this))
                return markers;
            }
        },
        watch:{
            'ShowOptions':function(newval,oldval){

            }
        }
    });
</script>
@endsection