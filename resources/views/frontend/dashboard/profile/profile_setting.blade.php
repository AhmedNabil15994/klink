@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('new-content')
<h4 class="section-heading">
    {{trans('frontend/dashboard.profile_setting')}}
</h4>

<div class="info-content">
    @include('frontend.dashboard.layouts.modals.upload_img')
    <!--avatar box-->
    <div class="avatar-box">
        <label for="avatar">{{trans('frontend/dashboard.avatar')}}</label>
        <div id="avatar" class="avatar-container">

            <div class="blue-overlay">
                {!! trans('frontend/dashboard.change_avatar') !!}
            </div>

            <div>
                @if(isset($profile->image))
                <img src="{{asset('images/profiles')}}/{{$profile['image']}}" alt="avatar"> @else
                <img src="{{asset('images/avatar.png')}}" alt="avatar"> @endif
            </div>


        </div>
    </div>

    <!--avatar box-->

    <!--data group-->
    <div class="data-group">
        <label for="firstName">{{trans('frontend/dashboard.name')}}</label>
        <a href="#" id="firstName" data-king="name" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->name()}}</a>
    </div>
    <!--data group-->


    <!--data group-->
    <div class="data-group">
        <label for="birthdate">{{trans('frontend/dashboard.birth_date')}} </label>
        <a href="#" id="birthdate" data-king='birth_date' data-type="date" data-pk="1" data-url="" data-title="Enter username">{{$profile->birth_date}}</a>
    </div>
    <!--data group-->

    <!--data group-->
    {{--
    <div class="data-group">
        <label for="create">{{trans('frontend/dashboard.created_at')}}</label>
        <span id="create">{!! Helper::convert($profile->created_at) !!}</span>
    </div> --}}
    <!--data group-->


    <!--data group-->
    <div class="data-group flex">
        <label for="address">{{trans('frontend/dashboard.address')}}  
        </label>

        <div>
            <input type="text" id="AddressAutoComplete" class="form-control" style="min-width:266px;" placeholder="Straße Hausnummer Postleitzahl">
            <a href="#" id="address" data-king="address" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->address}}
            <a href="#" id="home" style="margin-left:5px;" data-king="home" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->home}}
            </a>

            <br>

            <a href="#" id="postal_code" data-king="postal_code" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->postal_code}}
            </a>

            <a href="#" id="town" data-king="district" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->district}}
            </a>

            <br>

            <a href="#" id="region" data-king="region" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->region}}
            </a>
            <br>
            <a href="#" id="country" data-king="country" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->country}}
            </a>

        </div>

    </div>
    <!--data group-->


    @if($profile->status != 'User')
    <!--data group-->
    {{--
    <div class="data-group">
        <label for="Social">{{trans('frontend/dashboard.secure_no')}}
            </label>
        <a href="#" id="Social" data-type="text" data-king="secure_no" data-pk="1" data-url="" data-title="Enter username">{{$profile->secure_no}}</a>
    </div> --}}
    <!--data group-->

    <!--data group-->
    {{--
    <div class="data-group">
        <label for="Tax">{{trans('frontend/dashboard.tax_no')}}

            </label>
        <a href="#" id="Tax" data-type="text" data-king="tax_no" data-pk="1" data-url="" data-title="Enter username">{{$profile->tax_no}}</a>
    </div> --}}
    <!--data group-->



    <!--data group-->
    {{--
    <div class="data-group">
        <label for="license">{{trans('frontend/dashboard.driver_license')}}
            </label>
        <a href="#" id="license" data-type="text" data-king="license_no" data-pk="1" data-url="" data-title="Enter username">{{$profile->license_no}}</a>
    </div> --}}
    <!--data group-->
    @endif


    <!--data group-->
    <div class="data-group">
        <button class="data-button">
            {{trans('frontend/dashboard.save')}}
        </button>
    </div>
    <!--data group-->



</div>
@endsection

@section('scripts')
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
  type="text/javascript"></script>
<script>
        window.address = '{{$profile->address}}'
        window.streetNum = '{{$profile->home}}'
        window.postalCode = '{{$profile->postal_code}}'
        window.city = '{{$profile->district}}'
        window.region = '{{$profile->region}}'
        window.country = '{{$profile->country}}'
        var input = document.getElementById('AddressAutoComplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
            
            var valid = false;
            place.address_components.forEach(function(com){
                if(com.types[0]==='postal_code'){
                    valid = true;
                }
            })
            if (!valid) {
                var geocoder = new google.maps.Geocoder;
                var latlng = {
                    lat: place.geometry.location.lat(),
                    lng: place.geometry.location.lng()
                }
                geocoder.geocode({
                    'location': latlng
                }, function (results, status) {

                    if (status === 'OK') {
                        if (results[0]) {
                            place = results[0];
                            updatePlace(place);
                            
                        }
                    }
                })
            }else{
                updatePlace(place);
            }
            
        })
        function updatePlace(place) {
            var placeLocation = place.geometry.location.lat()+','+place.geometry.location.lng();
            place.address_components.forEach(function (element) {
                if (element.types[0] === 'postal_code') {
                    $('#postal_code').html(element.long_name)
                    send(element.long_name, null, 'postal_code', false,placeLocation)
                }
                if (element.types[0] === 'administrative_area_level_1') {
                    $('#region').html(element.long_name)
                    send(element.long_name, null, 'region', false,placeLocation)
                }
                if (element.types[0] === 'locality') {
                    $('#town').html(element.long_name)
                    send(element.long_name, null, 'district', false,placeLocation)
                }
                if (element.types[0] === 'administrative_area_level_2') {
                    $('#town').html(element.long_name)
                    send(element.long_name, null, 'district', false,placeLocation)
                }
                if (element.types[0] === 'country') {
                    $('#country').html(element.long_name)
                    send(element.long_name, null, 'country', false,placeLocation)
                }
                if (element.types[0] === 'route') {
                    $('#address').html(element.long_name)
                    send(element.long_name, null, 'address', false,placeLocation)
                }
                if (element.types[0] === 'street_number') {
                    $('#home').html(element.long_name)
                    send(element.long_name, null, 'home', false,placeLocation)

                }
            })
            $.notify("Success \n  Updated Successfully", {
                position: "top right",
                className: "success"
            });
        }

    function send(newValue,element,type=null,notifyme=true,place=null){
      type = type ? type :  element.data('king');
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{route(Helper::type($profile->status).'.profile_edit')}}",
        type: 'POST',
        data: {
          '_token': $('input[name="_token"]').val(),
          'newValue': newValue,
          'type': type,
          'location':place,
        },
        success: function (data) {
          if(notifyme){
            $.notify("Success \n "+type+" Updated Successfully",{ position:"top right" ,className:"success"});
          }
        },        
        error: function(data){
          if(notifyme){
            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
          }
        }

      });
    }
$(function () {
    

    
    $('#userAvatarModal').on('click','.btn-primary',function(e){
            e.preventDefault();
            e.stopPropagation();
            var $file = document.getElementById('img-upload');
            $formData = new FormData();
            if ($file.files.length > 0) {
               for (var i = 0; i < $file.files.length; i++) {
                  $formData.append('image', $file.files[i]);
               }
             }
            
        
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
               url: "{{route(Helper::type($profile->status).'.profile_upload')}}",
               type: 'POST',
               data: $formData ,
               dataType: 'json',
               contentType: false,
               processData: false,
               success: function (data) {
                if (isNaN(data)){
                  $.each(data['errors'], function(i, item) { 
                    $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                  });            
                }else if(data==1){
                  $.notify("Updated successfully \n Profile Picture Updated Successfully",{ position:"top right" ,className:"success"});
                  $('#imgEditModal').modal('toggle');
                  setTimeout(function () {
                      location.reload();
                  },2000)
                } 
               },        
               error: function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
              }

             });
        });


    $('#birthdate').editable({
        mode: 'inline',
        type: 'date',
        format  :'yyyy-mm-dd',
        viewformat: 'yyyy-mm-dd',
        datepicker  :{
            container : '#birthdate',
            autoclose : 'true',
            format: 'yyyy-mm-dd'
        },
        success: function(response,newValue){
            send(newValue,$(this));
        },
    
    });

    $('#firstName').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    
    });

    $('#address').editable({
        mode: 'inline',
        success: function(response,newValue){
            window.address = newValue;
            
            send(newValue,$(this),null,true,null);
        }
    
    });
    $('#region').editable({
        mode: 'inline',
        success: function(response,newValue){
            window.region = newValue;
            
            send(newValue,$(this),null,true,null);
        }
    
    });
    $('#home').editable({
        mode: 'inline',
        success: function(response,newValue){
            window.streetNum = newValue;
            
            send(newValue,$(this),null,true,null);
        }
    
    });

    $('#postal_code').editable({
        mode: 'inline',
        success: function(response,newValue){
            window.postalCode = newValue;
            
            send(newValue,$(this),null,true,null);
        }
    
    });


     $('#town').editable({
        mode: 'inline',
        success: function(response,newValue){
            window.city = newValue;
            
            send(newValue,$(this),null,true,null);
        }
      
    });

    $('#country').editable({
        mode: 'inline',
        success: function(response,newValue){
            window.country = newValue;
            
            send(newValue,$(this),null,true,null);
        }
      
    });

    $('#license').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    
    });

  


    $('#Social').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    
    });

    $('#Tax').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    
    });


});
</script>
@endsection