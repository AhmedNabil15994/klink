
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

<div class="map-wrapper">
    <div class="map-side-lg map-side" >
        @include('backend.adminlte.homeSide.mapside')
    </div>
    <div id="googlemaps" class="map-wrapper">
    
    </div>
</div>
@endsection
 
@section('scripts')

<style>
    #googlemaps{
        min-height: 80vh;
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
        padding-right: 10px;
        overflow-x: hidden;
    }
    .map-side-lg.shown{
        width: 300px;
        box-shadow: 5px 3px 10px 0 #ededed;
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
        max-width: 120px;
        max-height: 120px;
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

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places&callback=initialize"
  type="text/javascript"></script>
  
  <script src="/plugins/axios/axios.js"></script>
<script>
    window.markers = [];
    window.markersCounter = 0;
    window.savedUsers = [];
    window.savedOrders = '';
    function initialize() {
        var berlin = new google.maps.LatLng(51.165691, 10.451526);
        var mapOptions = {
            zoom: 6,
            center: berlin
        };
        map = new google.maps.Map(document.getElementById('googlemaps'), mapOptions);
        window.usersMap = map;
        $(function () {
            getMapData();
        })
    }

    function getMapData() {
        axios.get('{{route("backend.AllUserApi")}}')
            .then(function (response) {
                window.savedUsers = response.data.users;
                window.savedOrders = response.data.orders;
                saveUsers(response.data.users);
                saveUsers(response.data.orders,"order");
                
                
            })
    }

    function saveUsers(data,type="user") {
        if(type==='user'){
            
            window.savedUsers.forEach(function (user) {

                getAdressLatLng(user)
            });
        }
        if(type==='order'){
           
            console.log(window.savedOrders==='','ahmed')
            window.savedOrders.forEach(function(order){
                getOrderAdressLatLng(order);
            })
        }
        
        
    }

    function replaceEmptyStringToNull(string) {
        if (string && string !== 'null') {
            return string;
        }
        return '';
    }
    function getOrderAdressLatLng(order){
        if(!order.source_location){
            var geocoder = new google.maps.Geocoder();
            var address = order.source;

        }else{
            window.markersCounter+=1;
            var latitude = order.source_location.split(',')[0];
            var longitude = order.source_location.split(',')[1];
            // console.log(latitude,longitude)
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            showMarker(order, myLatlng,'order');
        }
    }
    function getAdressLatLng(user) {
        
        if (!user.profile.location) {
            var geocoder = new google.maps.Geocoder();
            var address = replaceEmptyStringToNull(user.profile.address) + ' ' + replaceEmptyStringToNull(user.profile.home) + ' ' + replaceEmptyStringToNull(user.profile.postal_code) + ' ' + replaceEmptyStringToNull(user.profile.district) + ' ' + replaceEmptyStringToNull(user.profile.region) + ' ' + replaceEmptyStringToNull(user.profile.country);
            geocoder.geocode({
                'address': address
            }, function (results, status) {
                window.markersCounter += 1;
                if (status === google.maps.GeocoderStatus.OK) {

                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    var myLatlng = new google.maps.LatLng(latitude, longitude);
                    showMarker(user, myLatlng);

                } else {

                    showMarker(user);
                    console.log(status, results)
                }
            })
        }else{
            window.markersCounter += 1;
            var latitude = user.profile.location.split(',')[0];
            var longitude = user.profile.location.split(',')[1];
            console.log(latitude,longitude)
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            showMarker(user, myLatlng);
        }
    }

    function showMarker(user, position=null, type = "user") {
        if (position !== null) {
            var title = {
                'user': 'name',
                'order': 'source'
            };
            var VueFunction = {
                'user': 'currentUser',
                'order': 'currentOrder'
            }
            if (type === 'user') {
                var icon = '/images/company-marker.svg'
            } else {
                var icon = "/order/icon/" + user.id
            }
            var marker = new google.maps.Marker({
                position: position,
                icon: icon,
                title: user[title[type]],
                userId: user.id,

            });
            marker.addListener('click', function (e) {
                showMapSide();
                VueApp[VueFunction[type]] = this.userId
            })
            window.markers.push(marker);
        }

        if (window.savedOrders !== '' && window.markersCounter === window.savedUsers.length + window.savedOrders.length) {
            console.log(window.markersCounter, (window.savedUsers.length + window.savedOrders.length))
            var markerCluster = new MarkerClusterer(window.usersMap, window.markers, {
                imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
            });

        }
    }

    //side map functions 
    function showMapSide(id){
        $('.map-side-lg').addClass('shown');
        VueApp[VueFunction[type]] = id
    }
    
    function hideMapSide(){
        $('.map-side-lg').removeClass('shown');
    }
    
</script>

@endsection
