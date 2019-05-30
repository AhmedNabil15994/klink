@extends('frontend.userDashboard.index')
@section('sidebar2')
    @include('frontend.userDashboard.layouts.sidebar2')
@endsection


@section('page-content')

<link rel="stylesheet" href="/css/css/all.min.css">

<style type="text/css">

    @media (max-width:400px){
         /* Full-screen display */
         .datetimepicker.datetimepicker-dropdown-bottom-left {
            left: 25px !important;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .container-fluid{
            padding-left:.5rem;
            padding-right:.5rem;
        }
    }

    


    .main-item-content.active {
        background: #F6AB36;
    }
    .ship-info{
        margin-top: 15px;
    }
    .ship-info img{
        width: 50px;
        max-height: 100px;
        margin-right: 10px;
        margin-left: 10px;
    }
    .main-item-content {
        transition: .3s linear;
    }

    .mybtn {
        display: inline-block;
        margin-bottom: 0;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .vehicle-name {
        font-size: 12px;
        width: 100%;
        text-align: center;
    }

    .ship-info-wrapper {
        margin-left: 15px;
        display: flex;
        flex-wrap: wrap;
    }

    .order-offer .results .order-item__content .order-operation .button .offer-number {
        background: #FFF !important;
        color: #000 !important;
    }

    .comment {
        color: #FFF;
        background-color: #F6AB36;
        cursor: pointer;
        -webkit-transition: all ease-in-out .25s;
        -moz-transition: all ease-in-out .25s;
        -o-transition: all ease-in-out .25s;
        transition: all ease-in-out .25s;
        padding: .5rem 1rem !important;
    }

    .countdown {
        width: 100%;
        text-align: center;
        display: block;
        font-size: 18px;
        font-weight: bold;
        color: rgba(0, 0, 0, 0.4);
        margin-bottom: 1rem;
    }

    body {
        overflow-x: hidden;
    }

    span.back {
        background: url('/img/box.png');
        background-size: 20px 20px;
        background-repeat: no-repeat;
        width: 20px;
        height: 20px;
        display: inline-block;
    }

    #OrdersOnMap {
        height: 300px;
        margin-bottom: 2rem;
    }

    .head-order-item {
        background: #FFF;
        padding: 1rem;
        padding-left: 1rem;
        border-right: .3rem solid #f6ab36;
        box-shadow: 0 0.1rem 0.5rem rgba(0, 0, 0, 0.1);
        border-radius: .3rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0;
        cursor: pointer;
    }

    @media (min-width:1680px){
        .order-operation .custom-date-field span{
            right:20% !important;
        } 
    }


    @media (max-width:1920px){
        .editable-container.editable-inline{
         width: 70%;
     }
    }

    @media (max-width:1440px){
        .editable-container.editable-inline{
         width: 65%;
     }
    }

    .editable-input{
        position:relative;
    } 
    .editable-input .icon-th{
        position: absolute;
        top: .6rem;
        left: .5rem;
    }
    .editable-input .input-append.date{
    }
    .editable-input input{
        padding:.5rem 1rem;
        border:.1rem solid #e3e3e3;
        border-radius:.3rem;
        padding-left:2.5rem;
        width:100%;
    }
    .editable-input input:focus{
       outline:none;
    }

    .editable-buttons button{
        padding:.85rem 1rem !important;
    }
</style>
<style type="text/css">
    .map {
        position: unset !important;
    }
    
    .pagination-wrapper {
        font-size: 1.4rem;
    }
    .top-squares-menue {
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        /* justify-content: flex-start; */
        margin-bottom: 0;
        position: absolute;
        top: 0rem;
        width: 100%;
        left: 0;
        height: 3rem;
    }
    .top-squares-menue .top-square{
        padding: 5px;
        flex-grow: 1;
        text-align: center;
        background: #ededed;
    }
    .top-squares-menue .top-square.active{
        background:#fff;
    }
    .button-input-wrapper{
        position: relative;
    }
    .button-input-wrapper i{
        position: absolute;
        top: 51%;
        right: 6px;
        font-size: 20px;
        /* width: 100px; */
        /* height: 100px; */
        color: rgba(0, 0, 0, 0.4);
        transform: translateY(-50%);
    }

    .assignment-tabs,
    .assignment-tabs .show-assign-filter{
        background: #2D5877;
    }
    .assignment-tabs .assign-navigation li.active a{
        color: #FFF;
    }
    .assignment-tabs .assign-navigation li.active{
        color: #FFF;
        background: #133248;
    }
    a.button.button--blue,
    a.button.button--blue:hover,
    a.button.button--blue:active,
    a.button.button--blue.active{
        text-decoration: none;
        text-align: center;
    }
    .assignment-tabs .assign-navigation li a{
        display: block;
        width: 100%;
        height: 100%;
        text-align: center;
        padding: 1rem 1.5rem;
    }
    .assignment-tabs .assign-navigation li{
        padding: 0;
    }
    .assignment-tabs .assign-navigation li:first-child{
        padding-left: 0;
    }
    
</style>
   <!--pageContent-->
    <div class="pageContent rale">
        <div class="container-fluid">
            <!--order offer-->
            <div class="order-offer">

                <!--match result row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="match-result">
                            <span> {{count($data)}} </span> matching Result
                        </div>
                    </div>
                </div>
                <!--match result row-->


                <!--results row-->
                <div class="row">
                    <div class="col-sm-12">

                        <!--here all results-->
                        <div class="results">



                            @include('frontend.userDashboard.layouts.orders')



                            




                        </div>
                        <!--here all results-->
                        <div class="row">
                            <div class="box-footer">
                            <div class="pagination-wrapper">{!! $data->render() !!} </div>
                        </div> 
                    </div>

                </div>
                <!--results row-->

            </div>
            <!--order offer-->
        </div>
    </div>        
@endsection

@section('scripts')



{{-- <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('datetime/bootstrap-datetimepicker.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places&callback=init"
    type="text/javascript"></script>

<script type="text/javascript">
    function init(){
        
        // console.log('google loaded')
        
           
            
            
            
            
    
            $('[data-countdown]').each(function() {
              var $this = $(this), finalDate = $(this).data('countdown');
              $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%H:%M:%S'));
              });
            });
            
            var geocoder;
            var geocoder2;
            //var directionsDisplay = new google.maps.DirectionsRenderer();
            var directionDisplay;
            var directionsService = new google.maps.DirectionsService();   
            var IDs = [];
    
            town = '';
            town2 = '';
            postal_code = '';
            postal_code2 = '';
            country = '';
            country2 = '';
    
            function getAdd(address , address2 , my_id){
                
                geocoder = new google.maps.Geocoder();
                      geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == 'OK') {
                            for (var i=0; i<results[0].address_components.length; i++) {
                                for (var b=0;b<results[0].address_components[i].types.length;b++) {
    
                                    if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                        town = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                        postal_code = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('country') > -1) {
                                        country = results[0].address_components[i].short_name;
                                    }
                                    
                                }
                            }   
                            $('#from'+my_id).text(country +' ' + postal_code + ' ' + town);
                            $('#froms'+my_id).text(country +' | ' + postal_code + ' ' + town);
    
                          } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                          }
                      });
    
                geocoder2 = new google.maps.Geocoder();
                      geocoder2.geocode( { 'address': address2}, function(results, status) {
                          if (status == 'OK') {
                            for (var i=0; i<results[0].address_components.length; i++) {
                                for (var b=0;b<results[0].address_components[i].types.length;b++) {
    
                                    if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                        town2 = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                        postal_code2 = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('country') > -1) {
                                        country2 = results[0].address_components[i].short_name;
                                    }
                                }
                            }   
                            $('#to'+my_id).text(country2 +' ' + postal_code2 + ' ' + town2);
                            $('#tos'+my_id).text(country2 +' | ' + postal_code2 + ' ' + town2);
                          } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                          }
                      }); 
    
            }
    
    
            @foreach($data as $order)
            
            <?php  $send_receive = \DB::table('order_send_receives')->where('order_id','=',$order->order_id)->first(); ?>
                @if(empty($send_receive))
                    id = '{{$order->order_id}}';
                    item = [id,'{{$order->source}}','{{$order->destination}}'];
                    IDs.push(item);
                @endif         
            @endforeach
            address = '';
            address2 = '';
            my_id = '';
    
            for (var i = 0; i < IDs.length; i++) {
                var id = IDs[i];
                for (var x = 0; x < id.length; x++) {
                    address = id[1];
                    address2 = id[2];
                    my_id = id[0];
                }
                
                getAdd(address , address2 , my_id);
            }
    
    
            $('.show-details').on('click', function (){
                $(this).toggleClass('active');
                $(this).parents('.order-item').find('.order-item__slide').slideToggle();
                $(this).parents('.order-item').siblings().find('.order-item__slide').slideUp();
                
                $(this).parents('.one_order').siblings('.one_order').find('.order-item__slide').slideUp()
    
                var source = $(this).siblings('.source').val();
                var destination = $(this).siblings('.destination').val();
                var id = $(this).siblings('.id').val();
                var place = 1;
                getLocation(id,source,destination,place);
            });
        
            @foreach($data as $order)
            getLocation("{{$order->order_id}}","{{$order->source}}","{{$order->destination}}",0);   
            @endforeach
    
            function getLocation(id,source,destination){
                
                    var latlng = new google.maps.LatLng(52.52000659999999, 13.404953999999975);
                    var myOptions = {
                        // minZoom: 3,
                        center:latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        disableDefaultUI: false,
                        mapTypeControl: false,
                        streetViewControl: false,
                        zoomControl:false,
                        minZoom: 9,
                        zoom:9,
                    };
                    /*var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    geocoder = new google.maps.Geocoder;
                    directionsDisplay.setMap(map);
                    calcRoute(source,destination);*/
                  
                    var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    
                    calcRoute(source,destination,map,id);
            }

            
            function calcRoute(start, end, map, id,type="order",options={},fit=false) {
                
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode.DRIVING,
                    
                };
                directionsService.route(request, function (response, status) {

                    if (status == google.maps.DirectionsStatus.OK) {
                        //directionsDisplay.setDirections(response);
                        var directionsRenderer = new google.maps.DirectionsRenderer(options);
                        directionsRenderer.setMap(map);
                        directionsRenderer.setDirections(response);
                        

                    } else {
                        switch (status) {
                            case "NOT_FOUND":
                                {
                                    alert("Either the start location or destination were not recognised");
                                    break;
                                };
                            case "ZERO_RESULTS":
                                {
                                    alert("No route could be found between the start location and destination");
                                    break;
                                };
                            case "MAX_WAYPOINTS_EXCEEDED":
                                {
                                    alert("Maximum waypoints exceeded. Maximum of 8 allowed");
                                    break;
                                };
                            case "INVALID_REQUEST":
                                {
                                    alert("Invalid request made for obtaining directions");
                                    break;
                                };
                            case "OVER_QUERY_LIMIT":
                                {
                                    alert("This webpage has sent too many requests recently. Please try again later");
                                    break;
                                };
                            case "REQUEST_DENIED":
                                {
                                    alert("This webpage is not allowed to request directions");
                                    break;
                                };
                            case "UNKNOWN_ERROR":
                                {
                                    alert("Unknown error with the server. Please try again later");
                                    break;
                                };
                        }
                    }
                });
            }
    
    
            $('.button.button--blue').on('click','.form-control.offer-number',function(e){
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
            });
    
    
            $(document).on('keyup','.form-control.offer-number',function(){
                parent = $(this).parents('.one_order');
                value = $(this).val();
                second = parent.find('.order-item__slide').find('.total-offer').val(value);
    
            });
            
            $(document).on('keyup','.total-offer',function(){
                parent = $(this).parents('.one_order');
                value = $(this).val();
                second = parent.find('.order-item__content').find('.form-control.offer-number').val(value);
    
            });
    
            
            


            jQuery('.pickup').datetimepicker();


            /* button animate */


            $('.new-button-offer').on('click', function (){

                $(this).children('span').toggleClass('animate');
                $(this).parents('.order-item').siblings().find('span.animate').removeClass('animate');

            });

            

            $('.mainContent').on('click', function (m) {
                var clickOver = $(m.target);
                if (!clickOver.closest('.order-item').length) {
                    $('.new-button-offer span').removeClass('animate');
                }
            });


            
    
        };
   


    
</script>
@endsection