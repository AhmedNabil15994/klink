


<div class="special-wrapper">
  @include('frontend.layouts.partials.nav')


    


  <style type="text/css">

    /*align pickup text*/
    .form-control{
      letter-spacing:.05rem;
      font-size:1.4rem;
    }
    .slider-wrapper{
      position: relative;
      max-width: 100%; 
      overflow-x: hidden;
      display: flex;

    }
    .slider-wrapper .slider-element{
      position: relative;
      flex: 1 0 auto;
      width:100%;
      right: 0;
      transition: 1.5s;
      
    }
    
    @font-face {
      font-family: myNumberFont;
      src: url({{asset('fonts/CalibreTest-Bold.woff')}});
    }

    .myNumberFont {
      font-family: myNumberFont;
      font-size: 16px !important;
      color: #999;
      letter-spacing: 1px;
    }

    @media ( min-width : 768px ) {

      #googlemaps.left{
        left:45rem;
        width: calc(100% - 45rem);
      }
    }

    @media(max-width: 767px){
      #alls2{
        background-color: rgba(255,255,255,.6);
      }
      .option-template-menu{
        width: 100% !important;
      }
    }

    @media (min-width: 768px) and (max-width: 991px){
      #googlemaps{
        /*margin-left: 50%;*/
        /*width: 50%;*/
      }
      .option-template-menu{

      }
    }


    .det_icons{
          display: inline-block;
          width: 5rem;
          height: 5rem;
          border-radius: 50%;
          margin:auto;
          border:.1rem solid #f6ab36;
          padding: 1rem;
          -webkit-transition: all ease-in-out .25s;
          -moz-transition: all ease-in-out .25s;
          -o-transition: all ease-in-out .25s;
          transition: all ease-in-out .25s;
          text-align: center;
          background-color:#f6ab36;
          color: #FFF;
      }
      
      .row .col-md-4:last-of-type .det_icons{
          padding-left: .8rem;
      }
      .det_det{
          position: absolute;
          margin-top: 1.5rem;
          margin-left: 1rem;
          font-weight: 600;
          color: #777;
          font-size: 1.5rem;
      }
      .glyphicon{
        top: .6rem;
      }
      .choose .details .alls .data_det span{
        margin-bottom: 0 !important;
      }

      @keyframes pulse {
        0% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.05);
        }
        100% {
          transform: scale(1);
        }
      }


      .map-input .fa-check{
        display:none;
      }

      .map-input.valid-location .fa-check{
        display:block;
        color:#98b71b !important;
      }

      .map-input.valid-location .fa-home,
      .map-input.valid-location .fa-location-arrow{
        display:none;
      }
      .map-input.valid-location input
      {
        border-color:#98b71b;
      }

      .operation-form{
        margin-bottom:1rem;
      }
      
      .operation-form .fa{
        position: static !important;
        color: #f6ab36;
        font-size: 1.5rem;
      }
      .heade{
          position: relative;
      }
      .test{
          display: none;
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: #FFF;
          opacity: .7;
      }
      .test img{
          width: 8rem;
          height: 8rem;
          display: block;
          margin: auto;
          margin-top: 20%;
      }


      /*slick style*/
      .slick-slide{
        height:22px;
      }

      .text-slider{
        overflow:hidden;
        height:22px;
      }

      .text-slider div{
          font-size:14px;
          font-weight:600;
          height:22px;
      }
  </style>

  <div class="heade col-xs-12">
    <div id="googlemaps"></div>
    <div id="infowindow-content">
        <img src="" width="16" height="16" id="place-icon">
        <span id="place-name"  class="title"></span><br>
        <span id="place-address"></span>
    </div>
    <div id="overlay" class="overlay"> 
        <div class="contaniner">
          <div class="panel" style="background: transparent;">
                <div class="col-md-4 col-sm-6 col-xs-12 col-sm-offset-4 choose">
                  <div class="col-sm-12 details">
                    <div class="alls text-center" id="alls">
                                <h1 class="head rale" style="font-size:18px; margin-top:0;">{{trans('frontend/main.make')}}</h1>

                                <!--text slider-->

                                <div class="text-slider rale">
                                  <div>{{trans('frontend/main.p1')}}</div>
                                  <div>{{trans('frontend/main.p2')}}</div>
                                  <div>{{trans('frontend/main.p3')}}</div>
                                  <div>{{trans('frontend/main.p4')}}</div>
                                </div>

                                <!--text slider-->


                                <form   class="product-form" method="post" action="{{route('order')}}" style="margin-top: 1.5rem">
                                  {{ csrf_field() }}
                                  <div class="row">


                                    <div class="operation-form">
                                    
                                       
                            
                                    </div>

                                   
                                    
                                    <div class="map-input col-md-12 form-group col-12 padding-zero rale"> 
                                      <i class="fa fa-home"></i>
                                      <i class="fa fa-check"></i>
                                      <input class="form-control" type="text" name="from" id="from" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt">
                                    </div>
                                    
                                    <div class="map-input col-md-12 form-group col-12 padding-zero rale"> 
                                      <i class="fa fa-location-arrow"></i>
                                      <i class="fa fa-check"></i>

                                      <input class="form-control" type="text" name="to" id="to" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt">
                                    </div>
                                    
                                    <div class="col-md-12 form-group col-12 padding-zero">
                                      <!-- <input type="submit" class="form-control button submit" name="Go" > -->
                                      
                                      
                                    </div>
                                  </div>
                                </form>
                              </div>
                  </div>
                </div>
          </div>
          <!-- end panel -->



          </div>
          <!-- end conitainer -->
        </div>

    <aside class="option-template-menu" style="left:-73.5rem;">
      <div class="menu-content">
          <div class="apps-option-group">
              <div class=" col-xs-12 choose">
                  <div class="col-xs-12 details">
                    <div class="alls text-center" id="alls2" style="margin-top: 2rem;">
                      <div class="min_max">
                        <div class="row data_det" style="margin: 0;margin-bottom: 1.5rem;">
                            <div class="row text-center" style="margin: 0;padding: 1.5rem;">
                                <div class="col-xs-12 det_details rale" style="padding: 0;">
                                    <span class="det_icons" style="animation : pulse .5s infinite">
                                        <span class="glyphicon glyphicon-euro"></span>
                                    </span> 
                                    <div class="row" style="margin-top: 1rem">
                                      <span style="display: inline-block;">min : <span class="cost_min myNumberFont"></span></span><br>
                                      <span style="display: inline-block;">max : <span class="cost_max myNumberFont"></span></span>
                                    </div>
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                        </div>         
                      </div>

                      <div class="row form" style="border: .1rem solid #DDD;border-radius: .5rem;margin-right: 0;margin-left: 0;padding: 1.5rem;">
                        <h3 class="head rale">{{trans('frontend/main.make')}} </h3>
                                <span class="rale">{{trans('frontend/main.move')}} </span>
                                <form   id="product-form" method="post" action="{{route('order')}}">
                                  {{ csrf_field() }}
                                  <div class="row">

                                   
                                    
                                    <div class="map-input col-md-12 form-group col-12 padding-zero rale"> 
                                      <i class="fa fa-home"></i>
                                      <i class="fa fa-check"></i>
                                      <input class="form-control" type="text" name="from" id="from2" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt" >
                                    </div>
                                    
                                    <div class="map-input col-md-12 form-group col-12 padding-zero rale"> 
                                      <i class="fa fa-location-arrow"></i>
                                      <i class="fa fa-check"></i>
                                      <input class="form-control" type="text" name="to" id="to2" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt" >
                                    </div>
                                    
                                    <div class="col-md-12 form-group col-12 padding-zero">
                                      <!-- <input type="submit" class="form-control button submit" name="Go" > -->
                                      <input type="hidden" name="distance" id="distance">
                                      <input type="hidden" name="duration" id="duration">
                                      <input type="hidden" name="from_lat" id="from_lat">
                                      <input type="hidden" name="from_lng" id="from_lng">
                                      <input type="hidden" name="to_lat" id="to_lat">
                                      <input type="hidden" name="to_lng" id="to_lng">
                                      <button class="btn submit submit-btn hidden" id="submit2" type="button">{{trans('frontend/main.calc')}}</button>
                                    </div>
                                  </div>
                                </form>
                      </div>
                                
                    </div>
                  </div>
                </div>
          </div>
          
      </div>

  </aside>
    </div>
  <div class="clearfix"></div>

  <div class="test">
    <img src="{{asset('images/ajax-loader.gif')}}">
  </div>



  @include('frontend.layouts.partials.footer')
</div>
{{-- <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places&callback=getLocation"
  type="text/javascript"></script>

 
 
 
 <script>

    //alert('hey');
    function getLocation() {

      

        var mapOptions = {
            zoom: 17, // initialize zoom level - the max value is 21
            streetViewControl: true, // hide the yellow Street View pegman
            scaleControl: true, // allow users to zoom the Google Map
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        };

        map = new google.maps.Map(document.getElementById('googlemaps'),mapOptions);      
        
       // navigator.geolocation.watchPosition(function(position) {
          var input1 = document.getElementById('from');
          var input12 = document.getElementById('from2');
          var input2 = document.getElementById('to');
          var input22 = document.getElementById('to2');

          function com_address(input){
            var card = document.getElementById('alls');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
              map: map,
              anchorPoint: new google.maps.Point(0, -29)
            });
            
            autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              place = autocomplete.getPlace();
              if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
              }

              if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
              } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17);  // Why 17? Because it looks good.
              }
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);

              var address = '';
              if (place.address_components) {
                address = [
                      (place.address_components[0] && place.address_components[0].short_name || ''),
                      (place.address_components[1] && place.address_components[1].short_name || ''),
                      (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
              }

              infowindowContent.children['place-icon'].src = place.icon;
              infowindowContent.children['place-name'].textContent = place.name;
              infowindowContent.children['place-address'].textContent = address;
              infowindow.open(map, marker);
              //input.value=address;
              geocoder = new google.maps.Geocoder();
              geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == 'OK') {
                input.setAttribute('lat', results[0].geometry.location.lat());
                input.setAttribute('lng', results[0].geometry.location.lng());
                input.parentNode.classList.add("valid-location");
                if(input == input2){
                  input2.blur();
                  setTimeout(function(){
                      $('.test').toggle();
                  },3500);
                  $('.test').toggle();   
                }

                if(input == input12){
                  input1.setAttribute('lat', results[0].geometry.location.lat());
                  input1.setAttribute('lng', results[0].geometry.location.lng());
                }

                if(input == input22){
                  input2.setAttribute('lat', results[0].geometry.location.lat());
                  input2.setAttribute('lng', results[0].geometry.location.lng());
                }


                //console.log(results[0].address_components);
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });

              
            });
          }

          com_address(input1);
          com_address(input2);
          com_address(input12);
          com_address(input22); 
          
   /* },
    function (error) { 
      if (error.code == error.PERMISSION_DENIED)
          alert('Please allow access to your location. ');  
          
    });*/

        function mapLocation() {
            var directionsDisplay;
            var directionsService = new google.maps.DirectionsService();
            var map;

            function initialize() {
              directionsDisplay = new google.maps.DirectionsRenderer();
              var berlin = new google.maps.LatLng(52.52000659999999, 13.404953999999975);
              var mapOptions = {
                zoom: 7,
                center: berlin
              };
              map = new google.maps.Map(document.getElementById('googlemaps'), mapOptions);
              directionsDisplay.setMap(map);
              google.maps.event.addDomListener(document.getElementById('to'), 'blur', calcRoute);
            }

            function calcRoute() {
              if($('#to').val()== ''){

              }else{
              setTimeout(function(){
                var from1 = $('#from').attr('lat');
                var from2 = $('#from').attr('lng');
                var to1 = $('#to').attr('lat');
                var to2 = $('#to').attr('lng');
                var start = new google.maps.LatLng(from1, from2);
                var end = new google.maps.LatLng(to1, to2);
                var request = {
                  origin: start,
                  destination: end,
                  travelMode: google.maps.TravelMode.DRIVING,
                  provideRouteAlternatives: true,
                  unitSystem: google.maps.UnitSystem.METRIC,
                };
                setTimeout(function(){
                  directionsService.route(request, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                    
                      var route = response.routes;
                      
                      var selected_duration=[];
                      var selected_distance=[];
                    
                      for (var i = 0; i < route.length; i++) {
                        for (var x = 0; x < route[i].legs.length; x++) {
                           selected_duration.push(route[i].legs[x].duration.value);
                           selected_distance.push(route[i].legs[x].distance.value);
                        }
                      }

                      var routesSteps = [];
                      var routes = response.routes;
                          new google.maps.DirectionsRenderer({
                              map: map,
                              directions: response,
                              routeIndex: 0,
                       
                          });
                      
                      var optimum = routes[Math.floor(response.routes.length/2)];

                      var distance = optimum.legs[0].distance.value;         
                      var duration= optimum.legs[0].duration.value;

                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      $.ajax({
                          url: "{{route('min_max')}}",
                          type: 'POST',
                          data: {
                              '_token': $('input[name="_token"]').val(),
                              'distance': distance,
                          } ,
                          success: function (data) {
                              $('.cost_max').html(data[1] + " €");
                              $('.cost_min').html(data[0] + " €");

                          },        
                          error: function(data){
                            
                          }

                      });

                      $('#distance').val(Math.round(distance));
                      $('#duration').val(duration);
                      flag = true;
                      check();
                      $('button.submit').removeClass('hidden');
                      $('#alls').hide();
                      $('.option-template-menu').animate({left:0});
                      $('#googlemaps').toggleClass('left');
                      $('.option-template-menu #from2').val($('#alls #from').val());
                      $('.option-template-menu #to2').val($('#alls #to').val());
                    }  else {
                      if (status == 'ZERO_RESULTS') {
                        $.notify("Whoops \n No route could be found between the origin and destination.",{ position:"top right" ,className:"error"});
                      } else if (status == 'UNKNOWN_ERROR') {
                        $.notify("Whoops \n A directions request could not be processed due to a server error. The request may succeed if you try again.",{ position:"top right" ,className:"error"});
                      } else if (status == 'REQUEST_DENIED') {
                        $.notify("Whoops \n This webpage is not allowed to use the directions service.",{ position:"top right" ,className:"error"});
                      } else if (status == 'OVER_QUERY_LIMIT') {
                        $.notify("Whoops \n The webpage has gone over the requests limit in too short a period of time.",{ position:"top right" ,className:"error"});
                      } else if (status == 'NOT_FOUND') {
                        $.notify("Whoops \n At least one of the origin, destination, or waypoints could not be geocoded.",{ position:"top right" ,className:"error"});
                      } else if (status == 'INVALID_REQUEST') {
                        $.notify("Whoops \n The DirectionsRequest provided was invalid.",{ position:"top right" ,className:"error"});
                      } else {
                        $.notify("Whoops \n There was an unknown error in your request. Requeststatus: nn"+status,{ position:"top right" ,className:"error"});
                      }
                    }
                  });
                },1250);  

              },1250);
              }
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        }
        mapLocation();
             
    
    }
    
    
    // function to get User lat and lang 
    

    var flag='';
    function check(e){


        flag = true;

        if (flag) {
          $('#overlay').removeClass('overlay');
          $('#myform').addClass('box2 ');
          $('.form-group').removeClass('col-md-4');
          $('.newContent').addClass('overlay3 col-md-3 col-7');
          $('.info').addClass('hidden');    
            
          $('#myform').append('<p id="done" class="alert alert-success" role="alert"> done </p>').delay(1000);
          $('#done').fadeOut(3000);
            
          
          $('#myform').append('<a  class="alert calc" href="/order"> Calc weight  </a>');

          // MakeMarker("30.768989399999997", "31.093306499999997");

          return true;
          
        }
        else {
          $('#myform').append('<p class="alert alert-danger" role="alert" > Error </p>');
          return false; 
        }
      }
    $(function(){
      var activeIndex = 0;
      // var touched = false;
      setInterval(function(){
        var length = $('.slider-element').length;
        $('.slider-element').each(function(index,slide){
          $($('.slider-element')[index]).css('z-index',-1);
          if(index===activeIndex){
            $($('.slider-element')[index]).css('z-index',0);
          }
          var lastIndex = (activeIndex-1+length)%length;
          $($('.slider-element')[lastIndex]).css('right',(1+lastIndex)*100+'%');
          if( index >= activeIndex){
            if(index===lastIndex){
              $($('.slider-element')[index]).css('right',(1+lastIndex)*100+'%');
              
            }else{

              $($('.slider-element')[index]).css('right',activeIndex*100+'%');
              
            }
          }else if( index < activeIndex ){
            
            $($('.slider-element')[index]).css('right',(-length+activeIndex-index)*100+'%');
            
          }
          
        })
        // var touched = true;
        
        activeIndex +=1;
        activeIndex = activeIndex % $('.slider-element').length;
        
      },3000)
      @if($errors->any())
        $.notify("Success \n Payment Success",{ position:"top right" ,className:"success"});

        @endif  

  
      $(document).on('click','.submit-btn',function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#from_lat').val($('#from').attr('lat'));
        $('#from_lng').val($('#from').attr('lng'));
        $('#to_lat').val($('#to').attr('lat'));
        $('#to_lng').val($('#to').attr('lng'));
        $('#product-form').submit();
      });

      /*$('button.submit').on('click',function(){
        route = $(this).attr('href');
        window.location.href=route;
      });*/

  });


</script>