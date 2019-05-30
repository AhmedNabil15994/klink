@extends('frontend.dashboard.index') 
@section('sidebar2')
@include('frontend.dashboard.layouts.partials.profile-sidebar')

@endsection


<link rel="stylesheet" href="{{asset('css/new-vehcile.css')}}"> 
@section('page-content')


<style>

.datepicker > div{
  display:block;
}
.datepicker-dropdown:after{
  top:unset;
}

.datepicker-dropdown:before{
  top:unset;
}
.pac-container {
  z-index: 1054 !important;
}


	
</style>


<!--pageContent-->
<!--add Vehcile modal-->
    @include('frontend.dashboard.helpers.addNewVehicel')
<!--add Vehcile modal-->


<!--edit Vehcile modal-->
<div class="modal fade rale" role="dialog" id="editNewVehcileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-truck"></span> {{trans('frontend/dashboard.edit_vec')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <div class="add-vehcile-content">

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="selectpicker201">{{trans('frontend/dashboard.car_type')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <select class="selectpicker" id="selectpicker201">
                                    @foreach($shippings as $ship)
                                        <option value="{{$ship->id}}">{{$ship->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="vehcileweight">{{trans('frontend/dashboard.weight')}} (Kg)</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="weight_edit" class="add-input" placeholder="{{trans('frontend/dashboard.weight')}} (Kg)" required>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="vehcilemodel_edit">{{trans('frontend/dashboard.vec_model')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="vehcilemodel_edit" class="add-input" placeholder="{{trans('frontend/dashboard.vec_model')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="vehcilenum_edit">{{trans('frontend/dashboard.vec_no')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="vehcilenum_edit" class="add-input" placeholder="{{trans('frontend/dashboard.vec_no')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="first_edit">{{trans('frontend/dashboard.first_reg')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="first_edit" class="add-input" placeholder="{{trans('frontend/dashboard.first_reg')}}" required value="{{Carbon::now()->format('Y-m-d')}}">
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="driver_edit">{{trans('frontend/dashboard.driver_name')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <select id="driverSelectorEdit" class="selectDriver select2 form-control ">
                                            @foreach($drivers as $driver)
                                                <option value="{{$driver->id}}">{{$driver->name}}</option>
                                                
                                            @endforeach
                                        </select> {{-- <input type="text" id="driver_edit"
                                    class="add-input" placeholder="{{trans('frontend/dashboard.driver_name')}}" required> --}}
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="address">{{trans('frontend/dashboard.address')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="add-input" name="address" id="address_edit" class="address" placeholder="{{trans('frontend/dashboard.address')}}">
                                    </div>
                                    
                            </div>
                        </div>
                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="from_to">{{trans('frontend/dashboard.postal_code')}} / {{trans('frontend/dashboard.city')}}</label>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="add-input" name="postal_code" id="postal_code_edit" class="postal_code" placeholder="{{trans('frontend/dashboard.postal_code')}}">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="add-input" name="city" class="city" id="city_edit" placeholder="{{trans('frontend/dashboard.city')}}">
                                    </div>
                                    
                            </div>
                        </div>
                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="country">{{trans('frontend/dashboard.country')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="add-input" name="country" id="country_edit" class="country" placeholder="{{trans('frontend/dashboard.country')}}">
                                    </div>
                                    
                            </div>
                        </div>



                </div>

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.update')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--edit Vehcile modal-->


<!--delete modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="deleteNewvehcileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-trash-alt"></span>{{trans('frontend/dashboard.del_vec')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                {{trans('frontend/dashboard.delete_p')}}

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.delete')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Delete modal-->



<div class="pageContent rale">

    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')



        <!--new vehcile-->
        <div class="new-vehcile">




            
            <!--match result row-->
            <div class="row" style="">
                <div class="col-xs-12">
                    <div class="match-result">
                        <span>{{$count}} </span> {{trans('frontend/dashboard.matching')}}
                    </div>
                </div>
            </div>
            <!--match result row-->

            <div class="row" style="">
                <!--col-->
                <div class="col-xs-12 custom-align">
                    <button class="add-new-vehcile custom-button custom-button--blue">
                            {{trans('frontend/dashboard.add_vec')}} <span class="fas fa-truck"></span>
                        </button>
                </div>
                <!--col-->
            </div>

            <div class="clearfix"></div>

            

            <!--main row-->
            <div class="row">
                <!--main col-->
                <div class="col-xs-12">

                    <!--results-->
                    <div class="results">

                        @foreach($data as $vehicle)
                        <div class="id-place id-places{{$vehicle->id}}">
                            <span class="fas fa-database"></span>
                            id : {{$vehicle->id}}
                        </div>
                        <!--vehcile item-->
                        <div class="vehcile-item tab-row{{$vehicle->id}}">

                            <!--content row-->
                            <div class="row">

                                <div class="col-xs-12">

                                    <!--vehcile content-->
                                    <div class="vehcile-content">

                                        <!--row-->
                                        <div class="row">


                                       


                                           

                                            <!--first col-->
                                            <div class="col-md-9">

                                                <div class="row">
                                                    <!--car image-->
                                                    <div class="col-sm-4">
                                                        <div class="map-info">
                                                            <div id="googlemaps{{$vehicle->id}}" class="map"></div>
                                                        </div>
                                                    </div>
                                                    <!--car image-->

                                                    <!--car details-->
                                                    <div class="col-sm-8">
                                                        <div class="col-sm-6">
                                                            <div class="car-details">
                                                                <h3>{{$vehicle->ship_name}} (<a href="#" class=" eitable-number" id="number{{$vehicle->id}}" data-type="text" data-pk="1" data-kind='number' data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.vec_no')}}">{{$vehicle->number}}</a>)</h3>
                                                                <p>
                                                                    <a href="#" class=" eitable-address" id="address{{$vehicle->id}}" data-kind='address' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.address')}}">{{$vehicle->address}}</a>
                                                                    <a href="#" class=" eitable-home" id="home{{$vehicle->id}}" data-kind='home' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.home')}}">{{$vehicle->home}}</a>
                                                                    <br> 
                                                                    <a href="#" class=" eitable-postal_code" id="postal_code{{$vehicle->id}}" data-kind='postal_code' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.postal_code')}}">{{$vehicle->postal_code}}</a>
                                                                    <a href="#" class=" eitable-city" id="city{{$vehicle->id}}" data-kind='city' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.city')}}">{{$vehicle->city}}</a><br>
                                                                    <a href="#" class=" eitable-region" id="region{{$vehicle->id}}" data-kind='region' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.region')}}">{{$vehicle->region}}</a><br>
                                                                <a href="#" class=" eitable-country" id="country{{$vehicle->id}}" data-kind='country' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.country')}}">{{$vehicle->country}}</a>
                                                                </p>
                                                                <?php 
                                                                    $ship = \DB::table('shippings')->where('id','=',$vehicle->ship_id)->first();
                                                                    // dd($vehicle->ship_id);
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <div class="distance-info">
                                                                            <ul class="distance-list clearfix">
                                                                                <li><a href="#" class=" eitable-weights" id="weights{{$vehicle->id}}" data-kind='weight' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.weight')}}">{{$vehicle->weight}}</a> Kg</li>
                                                                                <li>{{$ship->title}}</li>
                                                                                <li style="border-right: 0;margin-left: .5rem;"><i class="fas fa-calendar" style="margin-right: .5rem;"></i><a href="#" id="first_reg" data-kind='first_reg' data-type="text" data-pk="1" data-val="{{$vehicle->id}}" data-url="" data-title="{{trans('frontend/dashboard.first_reg')}}">{{$vehicle->first_reg}}</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                        <?php 
                                                            $driver = \DB::table('drivers')->where('vehichle_id','=',$vehicle->id)->where('company_id','=',Auth::user()->id)->first();
                                                            $driver_ids = '';
                                                        ?>

                                                        <div class="col-sm-6 driver-info">
                                                            <select class="js-data-example-ajax" id="drivers_select{{$vehicle->id}}" val="{{$vehicle->id}}">
                                                                @if(isset($driver))
                                                                <?php 
                                                               
                                                                $selected_profile = \DB::table('user_profiles')->where('id','=',$driver->profile_id)->first();
                                                                $driver_ids = $driver->user_id;
                                                                 
                                                                ?>
                                                                <option selected value="{{$driver->profile_id}}">{{$selected_profile->first_name.' '.$selected_profile->last_name}}</option>
                                                                @else
                                                                <?php 
                                                                    $driver_ids = '';
                                                                ?>
                                                                <option class="hidden" disabled selected>{{trans('frontend/dashboard.search')}}</option>
                                                                @endif
                                                                
                                                            </select>
                                                            @if(isset($driver))
                                                            <p style="margin-top: 1rem;">
                                                                <label for="driver_name">
                                                                {{trans('frontend/dashboard.name')}} : 
                                                                </label>
                                                                <span><a href="#" id="driver_name" data-kind="name" class="name{{$vehicle->id}}"  data-type="text" data-pk="1" data-val="{{$driver->profile_id}}" data-url="">{{$selected_profile->first_name.' '.$selected_profile->last_name}}</a></span>
                                                            </p>

                                                            <p>
                                                                <label for="driver_phone">
                                                                 {{trans('frontend/dashboard.phone')}} : 
                                                                </label>
                                                                <span><a href="#" id="driver_phone" data-kind="phone" class="phone{{$vehicle->id}}"  data-type="text" data-pk="1" data-val="{{$driver->profile_id}}" data-url="">{{$selected_profile->phone}}</a></span>
                                                            </p>
                                                               
                                                            @else
                                                            <div class="hidden det{{$vehicle->id}}">
                                                                <p style="margin-top: 1rem;"><span>
                                                                {{trans('frontend/dashboard.name')}} :
                                                                </span> 
                                                                    <span><a href="#" id="driver_name" data-kind="name" class="name{{$vehicle->id}}"  data-type="text" data-pk="1" data-val="" data-url=""></a></span>
                                                                </p>

                                                                <p>{{trans('frontend/dashboard.phone')}} : 
                                                                    <span><a href="#" id="driver_phone" data-kind="phone" class="phone{{$vehicle->id}}"  data-type="text" data-pk="1" data-val="" data-url=""></a></span>
                                                                </p>

                                                                
                                                            </div>
                                                            @endif
                                                            <?php 
                                                                $class = '';

                                                            ?>
                                                            @if($vehicle->status == 1)
                                                                <?php 
                                                                    $class = 'checked';

                                                                ?>
                                                           

                                                            @endif

                                                            <div class="row" style="margin:0;">
                                                                <div class="form-group" st>
                                                                    <label>{{trans('frontend/dashboard.status')}} : </label>
                                                                    <label for="DriverControl{{$vehicle->id}}" class="custom-label">
                                                                            <input type="checkbox" {{$class}} class="custom-check" data-val="{{$vehicle->id}}" id="DriverControl{{$vehicle->id}}" value ="DriverControl{{$vehicle->id}}">
                                                                            <span class="custom-span" ></span>
                                                                        </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                    </div>
                                                    <!--car details-->

                                                </div>
                                            </div>
                                            <!--first col-->

                                            <!--second col-->
                                            <div class="col-md-3">

                                                <div class="">
                                                    <div class="">
                                                        <div class="car-availablity available">
                                                            @if($vehicle->status == 1)
                                                            <p style="margin-right: 40px;">
                                                                <span class="dot"></span> {{trans('frontend/dashboard.avail')}}
                                                            </p>
                                                            @else
                                                            <p>
                                                                <span class="dot" style="background: #bd0303"></span> {{trans('frontend/dashboard.not_avail')}}
                                                            </p>
                                                            @endif
                                                            <div class="operations">
                                                                <div class="points">
                                                                  <span class="span">.</span>
                                                                  <span class="span">.</span>
                                                                  <span class="span">.</span>
                                                                </div>

                                                                <ul class="actions">
                                                                  <li><a href="#" value="{{$vehicle->id}}" class="edit-vec"><i class="fas fa-pencil-alt "></i> {{trans('frontend/dashboard.edit')}}</a></li>
                                                                  <li><a href="#" value="{{$vehicle->id}}" class="delete-vec" data-toggle="#deleteNewvehcileModal"><i class="fas fa-trash-alt"></i> {{trans('frontend/dashboard.delete')}}</a></li>

                                                                  <input type="hidden" name="ship_id" class="ship_id" value="{{$vehicle->ship_id}}">
                                                                  <input type="hidden" name="weight" class="weight" value="{{$vehicle->weight}}">
                                                                  <input type="hidden" name="model" class="model" value="{{$vehicle->model}}">
                                                                  <input type="hidden" name="number" class="number" value="{{$vehicle->number}}">
                                                                  <input type="hidden" name="first_reg" class="first_reg" value="{{$vehicle->first_reg}}">
                                                                  <input type="hidden" name="address" class="address" value="{{$vehicle->address}}">
                                                                  <input type="hidden" name="city" class="city" value="{{$vehicle->city}}">
                                                                  <input type="hidden" name="postal_code" class="postal_code" value="{{$vehicle->postal_code}}">
                                                                  <input type="hidden" name="country" class="country" value="{{$vehicle->country}}">
                                                                  <input type="hidden" name="driver" class="driver" value="{{$driver_ids}}">

                                                                  
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                

                                            </div>
                                            <!--second col-->




                                        </div>
                                        <!--row-->




                                    </div>
                                    <!--vehcile content-->



                                </div>

                            </div>
                            <!--content row-->


                        </div>
                        <!--vehcile item-->
                        @endforeach

                    </div>
                    <!--results-->



                </div>
                <!--main col-->
            </div>
            <!--main row-->




        </div>
        <!--new vehcile-->





    </div>
</div>
@include('frontend.dashboard.layouts.modals.driver_modal')

<!--pageContent-->


@section('scripts')

<script src="/plugins/easing/jquery.easing.min.js"></script>
<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
 type="text/javascript"></script>
<script type="text/javascript">
    function initialize() {

        var input = document.getElementById('address2');
        var autocomplete = new google.maps.places.Autocomplete(input);
        
        autocomplete.addListener('place_changed', function() {
              place = autocomplete.getPlace();
              if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
              }

            //   var address = '';
            //   if (place.address_components) {
            //     address = [
            //           (place.address_components[0] && place.address_components[0].short_name || ''),
            //           (place.address_components[1] && place.address_components[1].short_name || ''),
            //           (place.address_components[2] && place.address_components[2].short_name || '')
            //         ].join(' ');
            //   }
            var latlng = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            }
              
            geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'location': latlng}, function(results, status) {
                if (status == 'OK') {   
                    console.log(results[0]);

                        for (var i=0; i<results[0].address_components.length; i++) {

                                if (results[0].address_components[i].types.indexOf("administrative_area_level_1") > -1) {
                                    $('#government2').val(results[0].address_components[i].long_name);

                                }
                                if (results[0].address_components[i].types.indexOf("locality") > -1) {
                                    $('#city2').val(results[0].address_components[i].long_name);

                                }
                                if (results[0].address_components[i].types.indexOf("administrative_area_level_2") > -1) {
                                    $('#city2').val(results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                    $('#postal_code2').val(results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('route') > -1) {
                                    input.setAttribute('data-street',results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('country') > -1) {
                                    $('#country2').val(results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('street_number') > -1) {
                                    input.setAttribute('data-home',results[0].address_components[i].long_name);
                                }
                        }
                }else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });


        });
      
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script type="text/javascript">
    $(function(){
        var id ;
        $('[data-toggle="tooltip"]').tooltip();

        var l = $('.ladda-button').ladda();
        var l2 = $('.ladda-button.ladda-button2').ladda();

        $('.custom-check').on('change',function(){

            var status ;

            if($(this).is(':checked')){
                status = 1 ;
            }else{
                status = 0 ;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('vehicles.edit_status')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': $(this).attr('data-val'),
                    'status': status,
                },
                success: function (data) {
                    $.notify("Success \n Vehicle Status Updated Successfully",{ position:"top right" ,className:"success"});
                    setTimeout(function () {
                        location.reload();
                    },2000)
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });

        });

        $(document).on('click','.vehcile-item a#first_reg',function(){
            var date = $(this).text();
            $('input.form-control.input-sm').val(date);
            $('input.form-control.input-sm').datepicker({
                format: 'yyyy-mm-dd',
                autoclose : true,
                defaultDate: date,
            });

        });
        
        var modechange;

        if($(window).width() < 550){
            modechange = 'inline';
        } else {
            modechange = 'popup';
        }
        
        $(window).resize(function (){


            if($(window).width() < 550){
                modechange = 'inline';
            } else {
                modechange = 'popup';
            }

        });


        $('.vehcile-item a#first_reg').editable({
            type:'date',
            mode:modechange,
            format: 'yyyy-mm-dd',
            viewformat: 'yyyy-mm-dd',
            placement: 'right',
            datetimepicker: {
                todayHighlight: true,
                showMeridian: true,
                minuteStep: 1,
                pickerPosition: "bottom-left",
                format: 'yyyy-mm-dd',

            },
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('vehicles.edit_first_reg')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': $(this).attr('data-val'),
                        'newValue': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Vehicle First Registeration Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });
        $('.eitable-number,.eitable-address,.eitable-city,.eitable-postal_code,.eitable-country,.eitable-weights,.eitable-home,.eitable-region').editable({
            mode : 'inline',
             success: function(response,newValue){
                type = $(this).attr('data-kind');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('vehicles.edit_type')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': $(this).attr('data-val'),
                        'type': type,
                        'newValue': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Vehicle "+type+" Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });


        $('#driver_name,#driver_phone').editable({
            mode : 'inline',
             success: function(response,newValue){
                type = $(this).attr('data-kind');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('vehicles.edit_driver')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': $(this).attr('data-val'),
                        'type': type,
                        'newValue': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Driver "+type+" Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });





        var opts = {
            language: {
                
                inputTooLong: function() {
                    return "{{trans('frontend/dashboard.too_much')}}";
                },
                errorLoading: function() {
                    return "{{trans('frontend/dashboard.error')}}";
                },
                loadingMore: function() {
                    return "{{trans('frontend/dashboard.load_more')}}";
                },
                noResults: function() {

                    var element = document.getElementById("select2-drivers_select"+id+"-results");
                    var element2 = document.getElementById("select2-driverSelector-results");
                    var element3= document.getElementById("select2-driverSelectorEdit-results");
                    
                    if (element != null){
                        
                        element.innerHTML = document.createElement("div").innerHTML = '<h5 class="new"><i class="fas fa-plus-square"></i> {{trans('frontend/dashboard.newDriver')}}</h5>';
                    
                    }else if (element2 != null) {
                        element2.innerHTML = document.createElement("div").innerHTML = '<h5 class="new"><i class="fas fa-plus-square"></i> {{trans('frontend/dashboard.newDriver')}}</h5>';
                    }
                    else if (element3 != null) {
                        element3.innerHTML = document.createElement("div").innerHTML = '<h5 class="new"><i class="fas fa-plus-square"></i> {{trans('frontend/dashboard.newDriver')}}</h5>';
                    }
               },
                searching: function() {
                    return "{{trans('frontend/dashboard.searching')}}";
                },
                maximumSelected: function() {
                    return "{{trans('frontend/dashboard.error_load')}}";
                }
            }
        };
        var opt = {
            language: opts.language ,
            tags: false,
            dir: "ltr",
            multiple: false,
            tokenSeparators: [',', ''],
            minimumResultsForSearch: 1,

            ajax: {
                delay: 250 ,
                url: "{{route('vehicles.getDrivers') }}" ,
                dataType: "json",
                type: "GET",
                data: function (params) {

                    var queryParameters = {
                        text: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data,params) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.first_name+' '+item.last_name,
                                id: item.id
                            };
                            
                        })
                    };
                    /*var optionhtml = "<option value=''></option>";
                    for (var i = 0; i < data.length; i++) {
                        optionhtml += "<option value='" + data[i].id + "'>" + data[i].name + "</option>";
                    }
                    $("#drivers_select"+id).html(optionhtml);
                    $("#drivers_select"+id).select2({
                        allowClear: true
                    });

                    $("#drivers_select"+id).select2('open');
                    $("#drivers_select"+id).select2('refresh');*/
                    
                }

            }
        }

        var postalCodes = [];

        @foreach($data as $one)

            postalCodes.push("{{$one->postal_code}}");
            $('#drivers_select{{$one->id}}').select2(opt);

        @endforeach
        
        //show add vehcile  modal
        $('.new-vehcile .add-new-vehcile').on('click', function () {
            $('#addNewVehcileModal').modal({
                show:true
            });
            $('#driverSelector').select2(opt);
        });



        $(".js-data-example-ajax,#driverSelector,#driverSelectorEdit").on("select2:open", function() {
            $('html , body').css('overflow-x','hidden');
            $(".select2-search__field").attr("placeholder", "{{trans('frontend/dashboard.search')}}");
            id = $(this).attr('val');
        });


        $(document).on('click','.select2-results__options h5',function(){
            $('#add_driver').modal('toggle');
            $("#drivers_select"+id).select2("close");
            $("#driverSelector").select2("close");
        });

        $('#addNewVehcileModal #driverSelector').select2({
            placeholder:{
                id: -1,
                text: '{{trans('frontend/dashboard.select_driver')}}',
            }
        });


        $('#add_driver').on('click','.btn-primary',function(e){

            e.preventDefault();
            e.stopPropagation();
            $('.ladda-button').ladda('start');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('drivers.newDriver')}}",
                type: 'POST',
                data:{
                    '_token': $('input[name="_token"]').val(),
                    'first_name': $('#add_driver #first_name').val(), 
                    'last_name': $('#add_driver #last_name').val(), 
                    'phone': $('#add_driver #driver_phones').val(), 
                },
                success:function(data){
                    if (isNaN(data)){
                        $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                        });         
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                        },2000)       
                    }else if(data==1){
                        $.notify("Saved successfully \n Driver Saved Successfully",{ position:"top right" ,className:"success"});
                            $('.ladda-button').ladda('stop');

                        $('#add_driver').modal('toggle');
                        /*setTimeout(function () {
                            location.reload();
                        },2000)*/
                    } 
                    
                },
                error:function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000)    
                }
            });    

        });



        var latitude;
        var longitude;
        var geocoder;
        function getLatLngByZipcode(address , id) {
            
            geocoder = new google.maps.Geocoder();
            var address = address ;
            geocoder.geocode({ 'address': address }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    latitude = results[0].geometry.location.lat();
                    longitude = results[0].geometry.location.lng();
                    //alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                    var myLatlng = new google.maps.LatLng(latitude,longitude);
                    var mapOptions = {
                      minZoom: 9,
                      zoom:10,
                      center: myLatlng,
                      mapTypeControl:false,
                    }
                    var map = new google.maps.Map(document.getElementById(id), mapOptions);

                    var marker = new google.maps.Marker({
                        position: myLatlng,
                    });

                    marker.setMap(map);
                }
            });
        }
        @foreach($data as $one)
        var ids = "googlemaps{{$one->id}}";
        var addresses = "{{$one->address .' '. $one->postal_code .' '.$one->city .' '.$one->country}}";
        getLatLngByZipcode(addresses , ids);
        @endforeach
        
        
        $(document).on('click','.points',function(e){
            selector = $(this).parent().children('.actions');
            selector.fadeToggle(500);
            $('.actions').not(selector).fadeOut(500);
        });

        $(document).on('click', function (e) {
            var clickOver = $(e.target);
            var dropDown = $('.actions');
            if (!clickOver.closest('.vehcile-item').length ) {
                dropDown.fadeOut();
            }
        });

        $(document).on('click','#newDriverModal #newDriverSave',function(e){
            e.preventDefault();
            e.stopPropagation();
            $('.ladda-button').ladda('start');

                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('vehicles.newDriver')}}",
                   type: 'POST',
                   data: {
                        '_token': $('input[name="_token"]').val(),
                        'email':$('#newDriverModal #driveremail').val(),
                        'password':$('#newDriverModal #driverPassword').val(),
                        'first_name':$('#newDriverModal #driverFirstName').val(),
                        'last_name':$('#newDriverModal #driverSecondName').val(),
                        'address':$('#newDriverModal #address').val(),
                        'home':$('#newDriverModal #home').val(),
                        'city':$('#newDriverModal #city').val(),
                        'postal_code':$('#newDriverModal #postal_code').val(),
                        'country':$('#newDriverModal #country').val(),
                        'phone':$('#newDriverModal #phone').val(),
                        'home_phone':$('#newDriverModal #home_phone').val(),
                   },
                   success: function (data) {
                        $.notify("Inserted successfully \n Driver Inserted Successfully",{ position:"top right" ,className:"success"});
                        $('#newDriverModal').modal('toggle');
                        
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000)    
                  }

                });

        });

        $(".js-data-example-ajax").on("change", function() {
    
            id = $(this).attr('val');
            var driver_id = $(this).val();
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('vehicles.editDriver')}}",
                   type: 'POST',
                   data: {
                        '_token': $('input[name="_token"]').val(),
                        'car_id': id,
                        'driver_id': driver_id,
                        
                   },
                   success: function (data) {
                        $.notify("Updated successfully \n Driver Updated Successfully",{ position:"top right" ,className:"success"});

                        if($('.det'+id).hasClass('hidden')){
                            $('.det'+id).toggleClass('hidden');
                            $('p span a.name'+id).text(data.first_name+' '+data.last_name);
                            $('p span a.phone'+id).text(data.phone);
                           

                        }else{
                            $('p span a.name'+id).text(data.first_name+' '+data.last_name);
                            $('p span a.phone'+id).text(data.phone);
                        }

                        setTimeout(function () {
                            location.reload();
                        },2000)
                        
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }

                });
        });

        $('#addNewVehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                $('.ladda-button2').ladda('start');
                $formData = new FormData();
                
                $formData.append('ship_id', $('#addNewVehcileModal .selectpicker option:selected').val());
                $formData.append('ship_name', $('#addNewVehcileModal .selectpicker option:selected').text());
                $formData.append('weight', $('#addNewVehcileModal #weight').val());
                $formData.append('model', $('#addNewVehcileModal #vehcilemodel').val());
                $formData.append('number', $('#addNewVehcileModal #vehcilenum').val());
                $formData.append('first_reg', $('#addNewVehcileModal #first').val());
                $formData.append('driver', $('#addNewVehcileModal #driverSelector option:selected').val());
                $formData.append('country', $('#addNewVehcileModal #country2').val());
                $formData.append('city', $('#addNewVehcileModal #city2').val());
                $formData.append('government', $('#addNewVehcileModal #government2').val());
                $formData.append('postal_code', $('#addNewVehcileModal #postal_code2').val());
                $formData.append('address', $('#addNewVehcileModal #address2').data('street'));
                $formData.append('home', $('#addNewVehcileModal #address2').data('home'));
            
                
                if($('#addNewVehcileModal #driverSelector option:selected').val() == -1){
                    $.notify("Whoops \n Invalid Driver",{ position:"top right" ,className:"error"});
                }else{
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                
                    $.ajax({
                       url: "{{route(Helper::type($profile->status).'.vehicles_add')}}",
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
                          setTimeout(function () {
                             $('.ladda-button2').ladda('stop');
                          },2000)           
                        }else if(data==1){
                          $.notify("Saved successfully \n Vehcile Saved Successfully",{ position:"top right" ,className:"success"});
                          setTimeout(function () {
                             $('.ladda-button2').ladda('stop');
                              location.reload();
                              
                          },2000)
                          $('#addNewVehcileModal').modal('toggle');

                        } 
                       },        
                       error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                        // setTimeout(function () {
                        //       location.reload();
                        //   },2000)
                      }

                    });
                }

            });


            $(document).on('click','.edit-vec',function(e){
                e.preventDefault();
                e.stopPropagation();
                id = $(this).attr('value');
                $('#editNewVehcileModal .btn-primary').attr('value',id);
                $('#editNewVehcileModal .selectpicker').val($(this).parent('li').siblings('.ship_id').val());
                $('#editNewVehcileModal .selectpicker').selectpicker('refresh');
                $('#editNewVehcileModal #weight_edit').val($(this).parent('li').siblings('.weight').val());
                $('#editNewVehcileModal #vehcilemodel_edit').val($(this).parent('li').siblings('.model').val());
                $('#editNewVehcileModal #vehcilenum_edit').val($(this).parent('li').siblings('.number').val());
                $('#editNewVehcileModal #first_reg_edit').val($(this).parent('li').siblings('.first_reg').val());
                $('#editNewVehcileModal #address_edit').val($(this).parent('li').siblings('.address').val());
                $('#editNewVehcileModal #city_edit').val($(this).parent('li').siblings('.city').val());
                $('#editNewVehcileModal #country_edit').val($(this).parent('li').siblings('.country').val());
                $('#editNewVehcileModal #postal_code_edit').val($(this).parent('li').siblings('.postal_code').val());
                $('#editNewVehcileModal #driverSelectorEdit').val($(this).parent('li').siblings('.driver').val()).trigger('change');;
                
                $('#editNewVehcileModal').modal('toggle');
                $('#driverSelectorEdit').select2(opt);
            });

            $('#editNewVehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                $formData = new FormData();
                var id = $(this).attr('value');
                $formData.append('id', id);
                $formData.append('ship_id', $('#editNewVehcileModal .selectpicker option:selected').val());
                $formData.append('ship_name', $('#editNewVehcileModal .selectpicker option:selected').text());
                $formData.append('weight', $('#editNewVehcileModal #weight_edit').val());
                $formData.append('model', $('#editNewVehcileModal #vehcilemodel_edit').val());
                $formData.append('number', $('#editNewVehcileModal #vehcilenum_edit').val());
                $formData.append('first_reg', $('#editNewVehcileModal #first_edit').val());
                $formData.append('driver', $('#editNewVehcileModal #driverSelectorEdit').val());
                $formData.append('address', $('#editNewVehcileModal #address_edit').val());
                $formData.append('country', $('#editNewVehcileModal #country_edit').val());
                $formData.append('city', $('#editNewVehcileModal #city_edit').val());
                $formData.append('postal_code', $('#editNewVehcileModal #postal_code_edit').val());
                
            
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route(Helper::type($profile->status).'.vehicles_update')}}",
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
                      $.notify("Updated successfully \n Vehcile Updated Successfully",{ position:"top right" ,className:"success"});
                      $('#editNewVehcileModal').modal('toggle');
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

            $(document).on('click','.delete-vec',function(e){
                e.preventDefault();
                e.stopPropagation();
                id = $(this).attr('value');
                $('#deleteNewvehcileModal .btn-primary').attr('value',id);
                $('#deleteNewvehcileModal').modal('toggle');
            });

            $('#deleteNewvehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).attr('value');
               
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route(Helper::type($profile->status).'.vehicles_delete')}}",
                   type: 'POST',
                   data: {
                        '_token': $('input[name="_token"]').val(),
                        'id':id,
                   },
                   success: function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Deleted successfully \n Vehcile Deleted Successfully",{ position:"top right" ,className:"success"});
                      $('.tab-row'+id).remove();
                      $('.id-places'+id).remove();
                      var count = $('.match-result span').text();
                      new_count = count - 1;
                      $('.match-result span').text(new_count);
                      $('#deleteNewvehcileModal').modal('toggle');

                      /*setTimeout(function () {
                          location.reload();
                      },2000)*/
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }

                 });
            });

    });

</script>
@endsection

@endsection