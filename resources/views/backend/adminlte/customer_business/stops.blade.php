@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.stops')}}
@endsection


@section('styles')
<style type="text/css">
button.add.btn-success{
	visibility: visible !important;
}
.delete_add{
	padding-left: 0;
}
.delete_add .btn-danger{
	width: 100%;
	height: 34px;
}
.delete_add .btn-danger i{
	margin-right: 0 !important;
}
.appended .col-sm-offset-4 .col-sm-6{
	padding: 0;
	margin-top:5px;
}
.appended .col-sm-offset-4 .col-sm-6:first-of-type{
	padding-right: 10px;
}
div.pick-period{
	display:none;
}
td.details-control {
    background: url("{{asset('images/details_open.png')}}") no-repeat center center;
    cursor: pointer;
    padding:10px !important;
}
tr.shown td.details-control {
    background: url("{{asset('images/details_close.png')}}") no-repeat center center;
}
td p{
	margin-bottom: 0;
}
td.address{width:200px;}
.addition_stop{
   	font-size: 20px;
    margin-bottom: 10px;
}
.btn.edit-packet{margin-right: 5px;}
</style>
@endsection


@section('table')

@include('backend.adminlte.customer_business.modals.add_stop')
@include('backend.adminlte.customer_business.modals.edit_stop')
@include('backend.adminlte.customer_business.modals.assign_stop')
@include('backend.adminlte.customer_business.modals.add_freight')
@include('backend.adminlte.customer_business.modals.edit_freight')





<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="stops-table">
	<thead>
		<tr style="background-color: #EEE;">
			<td></td>
			<th>Stop ID</th>
			<th>Tour Name</th>
			<th>Stop Name</th>
			<th>Stops Number</th>
			<th>Stop Description</th>
			<th>Stop Weight</th>
			<th>{{trans('backend/customer_business.mobile_number')}}</th>
			<th>{{trans('backend/customer_business.address')}}</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		@php $i=0; @endphp
		@foreach($data as $stop)
		<tr class="tab-row{{$stop->id}}" data-tester="{{$stop}}"> 
			<td class="details-control"></td>
			<td>{{$stop->id}}</td>
			<td>{{@$stop->tour->tour_name}}</td>
			<td class="stop_name">{{$stop->name}}</td>
			<td class="stop_number">{{$stop->stops_number}}</td>
			<td class="stop_description">{{$stop->stop_description}}</td>
			<td class="stop_weight">{{$stop->weight}}</td>
			<td class="stop_mobile_number">{{@$stop->stop_number->mobile_number}}</td>
             @php
            $tour_address = '';
             @endphp
			@if($stop->tour->detPerson()[1] == 'profile')
			@php 
			$tour_address =  $stop->tour->detPerson()[0]->fullAddress();  @endphp
			@elseif($stop->tour->detPerson()[1] == 'order_person')
			@php 
			$tour_address =  $stop->tour->detPerson()[0]->address->fullAddress();  @endphp
			@endif

			<td class="address" data-tour-address="{{$tour_address}} "data-address="{{@$stop->address->fullAddress}}">
				@if(@$stop->stop_address)
				{!! $stop->stop_address->addressForm() !!}
				@endif
			</td>
			<td>
				<button type="submit" class="btn btn-primary btn-xs assign" data-tour-id="{{@$stop->tour_id}}" value="{{$stop->id}}"><i class="fa fa-info"></i>Assign Tour</button>
				<button type="submit" class="btn btn-success btn-xs edit" value="{{$stop->id}}"><i class="fa fa-edit"></i>Edit</button>
				<button type="submit" class="btn btn-info btn-xs freight-data" value="{{$stop->id}}"><i class="fa fa-file-alt"></i>Add Freight</button>
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$stop->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
			</td>
		</tr>

		@endforeach
		
	</tbody>

</table>
@if(!count($data))
<style type="text/css">
tbody,
.dataTables_wrapper .row:last-of-type,
.dataTables_wrapper .row:first-of-type {
	display: none;
}
</style>
<div id="overlayError">
	<div class="row" style="margin-top: 10px;">
		<div class="col-xs-6 text-left pull-right">
			<img style="width: 120px;" src="{{asset('images/filter.svg')}}">
		</div>
		<div class="col-xs-3"></div>
		<div class="col-xs-3 pull-left text-right">
			<div class="callout" style="margin-top: 50px;border-left: 0;">
				<h4>{{trans('main.no_res')}}<i class="fa fa-exclamation fa-fw"></i></h4>
				<p>{{trans('main.no_res2')}}</p>
			</div>
		</div>
	</div>
</div>
@endif
<input type="hidden" id="data-loc">
@endsection

@section('scripts2')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
type="text/javascript"></script>	
<script type="text/javascript">
	$(function(){
		var i = 0;
		var done = [];
		function initialize(input) {

			var autocomplete = new google.maps.places.Autocomplete(input);
			
			autocomplete.addListener('place_changed', function() {
				place = autocomplete.getPlace();
				if (!place.geometry) {
					window.alert("No details available for input: '" + place.name + "'");
					return;
				}
				var latlng = {
					lat: place.geometry.location.lat(),
					lng: place.geometry.location.lng()
				}
				
				geocoder = new google.maps.Geocoder();
				geocoder.geocode( { 'location': latlng}, function(results, status) {
					if (status == 'OK') {  

						input.parentNode.classList.add("valid-location");
						for (var i=0; i<results[0].address_components.length; i++) {
							
							for (var b=0;b<results[0].address_components[i].types.length;b++) {

								$('#add-stop #lat_lng').attr('data-lat',latlng.lat);  
								$('#add-stop #lat_lng').attr('data-lng',latlng.lng);
								if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
									$('#add-stop #city').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
									$('#add-stop #postal_code').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('route') > -1) {
									$('#add-stop #street').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('country') > -1) {
									$('#add-stop #country').val(results[0].address_components[i].short_name);
								}
								if(results[0].address_components[i].types.indexOf('street_number') > -1) {
									$('#add-stop #home').val(results[0].address_components[i].long_name);
								}
							}
						} 
					}else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});

			});
			
		}
		initialize(document.getElementById('address'));
		initialize(document.getElementById('address2'));

		$(document).on('click','.add_address',function(e){
			e.preventDefault();
			e.stopPropagation();
			++i;


			var max_address = $('#edit-stop .stop_number').val();

			if(i <= max_address){
				var h ;
				if(done.length>0){
					for (var y = 0; y < done.length; y++) {
						h = done[y];
						done = done.filter(item => item !== h)
					}
				}else{
					h = i;
				}


				var x = '<div class="col-xs-12 col-sm-12 col-md-12 appended">'+
				'<div class="form-group">'+
				'<div class="col-sm-4">'+
				'<strong>Stop '+h+' {{ trans('backend/customer_business.address') }}</strong>'+
				'</div>'+
				'<div class="col-sm-7">'+
				'<div class="map-input">'+
				'<i class="fa fa-check"></i>'+
				'<input type="text" id="stop-address-'+ h +'" class="form-control address" placeholder="{{ trans('backend/customer_business.address') }}">'+
				'</div>'+
				'</div>'+
				'<div class="col-sm-1 delete_add">'+
				'<button class="btn btn-xs btn-danger" data-id='+h+'><i class="fas fa-trash"></i></button>'+
				'</div>'+
				'<div class="col-sm-8 col-sm-offset-4">'+
				'<div class="col-sm-6">'+
				'<input type="number" class="form-control weight" placeholder="{{trans('backend/customer_business.weight')}} (Kg)">'+
				'</div>'+
				'<div class="col-sm-6">'+
				'<input type="number" class="form-control duration" placeholder="{{trans('backend/customer_business.duration')}} (Min)">'+
				'</div>'+
				'</div>'+

				'</div>'+
				'</div>';
				if(i == max_address){
					$('#edit-stop .add_address').hide();
				}
				$('#edit-stop #addresses').append(x);
			}else{
				$('#edit-stop .add_address').hide();
			}

		});


		function setAddress(input) {

			var autocomplete = new google.maps.places.Autocomplete(input);
			
			autocomplete.addListener('place_changed', function() {
				place = autocomplete.getPlace();
				if (!place.geometry) {
					window.alert("No details available for input: '" + place.name + "'");
					return;
				}
				var latlng = {
					lat: place.geometry.location.lat(),
					lng: place.geometry.location.lng()
				}
				
				geocoder = new google.maps.Geocoder();
				geocoder.geocode( { 'location': latlng}, function(results, status) {
					if (status == 'OK') {  

						input.parentNode.classList.add("valid-location");
						for (var i=0; i<results[0].address_components.length; i++) {
							
							for (var b=0;b<results[0].address_components[i].types.length;b++) {

								input.setAttribute('data-lat',latlng.lat);  
								input.setAttribute('data-lng',latlng.lng);
								if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
									input.setAttribute('data-city',results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
									input.setAttribute('data-postal-code',results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('route') > -1) {
									input.setAttribute('data-street',results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('country') > -1) {
									input.setAttribute('data-country',results[0].address_components[i].short_name);
								}
								if(results[0].address_components[i].types.indexOf('street_number') > -1) {
									input.setAttribute('data-home',results[0].address_components[i].long_name);
								}
							}
						} 
					}else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});

			});
			
		}

		$(document).on('click', ".appended .address",function () {
			var currentInp = $(this).attr("id");
			setAddress(document.getElementById(currentInp));
		});

		$(document).on('click','.delete_add .btn',function(e){
			e.preventDefault();
			e.stopPropagation();
			done.push($(this).data('id'));
			$(this).parents('.appended').remove();
			--i;
			$('#edit-stop .add_address').show();

		});

		$(document).on('click','.add',function(){
			$('#add-stop').modal('toggle'); 
			
		});


		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();

		$(document).on('click','.assign',function(){
			var id = $(this).attr('value');
			var tour_id = $(this).data('tour-id');
			if(tour_id > 0){
				var myElement = $('#add-to-tour select.tours option[data-id="'+tour_id+'"]').attr('selected',true).siblings('option').removeAttr('selected');
			}

			$('#add-to-tour').modal('toggle');

			$('#add-to-tour').on('click', '.btn-success', function (e) {
				e.preventDefault();
				e.stopPropagation();
				$('.ladda-button').ladda('start');
				
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.assignToTour')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id':id,
						'tour_id': $('#add-to-tour select.tours option:selected').data('id'),
					},
					success: function (data) {
						if (isNaN(data)) {
							$.each(data['errors'], function (i, item) {
								$.notify("Whoops \n" + item, {
									position: "top right",
									className: "error"
								});
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
							},2000);
						} else if (data == 1) {
							$.notify("Saved successfully \n Stop Assigned Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#add-person').modal('hide');
						}
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						}, 2000)
						
					}

				});
			});
		});	

		
		$('#add-stop').on('click', '.btn-success', function (e) {
			e.preventDefault();
			e.stopPropagation();
			$('.ladda-button').ladda('start');
			var latlng = [$('#add-stop #lat_lng').data('lat') , $('#add-stop #lat_lng').data('lng')];
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('customer_business.storeStops')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'name': $('#add-stop .stop_name').val(),
					'description': $('#add-stop .description').val(),
					'mobile_number': $('#add-stop .mobile_number').val(),
					'street': $('#add-stop #street').val(),
					'home': $('#add-stop #home').val(),
					'city': $('#add-stop #city').val(),
					'stops_number': $('#add-stop .stop_number').val()?$('#add-stop .stop_number').val():0,
					'postal_code': $('#add-stop #postal_code').val(),
					'country': $('#add-stop #country').val(),
					'weight': $('#add-stop .weight').val(),
					'lat_lng': latlng,
					
					
				},
				success: function (data) {
					if (isNaN(data)) {
						$.each(data['errors'], function (i, item) {
							$.notify("Whoops \n" + item, {
								position: "top right",
								className: "error"
							});
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						},2000);
					} else if (data == 1) {
						$.notify("Saved successfully \n Stop Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-stop').modal('hide');
					}
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					setTimeout(function () {
						$('.ladda-button').ladda('stop');
					}, 2000)
					
				}

			});
		});

		$(document).on('click', '.delete', function () {
			$('#confirm-delete').modal('show');
			var id = $(this).attr('value');

			$(document).on('click', '#confirm-delete .btn-danger', function (e) {
				
				$('.ladda-button5').ladda('start');
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.destroyStops')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Stop Deleted Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000);
						$('#confirm-delete').modal('hide');
						location.reload();
						close();
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000)
					}

				});

			});

		});


		$(document).on('click','.edit',function(){
			i = 0;
			done = [];
			$('#edit-stop .add_address').show();
			var id = $(this).attr('value');
			var parent = $(this).parents('td');

			$('#edit-stop .stop_name').val(parent.siblings('td.stop_name').text());
			$('#edit-stop .mobile_number').val(parent.siblings('td.stop_mobile_number').text());
			$('#edit-stop .description').val(parent.siblings('td.stop_description').text());
			$('#edit-stop .weight').val(parent.siblings('td.stop_weight').text());
			$('#edit-stop .address').val(parent.siblings('td.address').data('address'));

			$('#edit-stop .stop_number').val(parent.siblings('td.stop_number').text());
			
			$('#edit-stop').modal('show');


			$('#edit-stop').on('click', '.btn-success', function (e) {
				e.preventDefault();
				e.stopPropagation();
				var stops = [];
				$.each($('.delete_add .btn'),function(i){
					var parent = $(this).parents('.delete_add');
					var input_address = parent.siblings('.col-sm-7').children('.map-input').children('input.address');
					stop = {
						id: $(this).data('id'),
						weight: parent.siblings('.col-sm-8').children('.col-sm-6').children('input.weight').val(),
						duration: parent.siblings('.col-sm-8').children('.col-sm-6').children('input.duration').val(),
						address:{
							home: input_address.data('home'),
							street: input_address.data('street'),
							city: input_address.data('city'),
							postal_code: input_address.data('postal-code'),
							country: input_address.data('country'),
							lat_lng: [input_address.data('lat'),input_address.data('lng')],
						}
					};
					
					stops.push(stop);
					
				});
				$('.ladda-button').ladda('start');
				var latlng = [$('#add-stop #lat_lng').data('lat') , $('#add-stop #lat_lng').data('lng')];
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.editStops')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'name': $('#edit-stop .stop_name').val(),
						'description': $('#edit-stop .description').val(),
						'mobile_number': $('#edit-stop .mobile_number').val(),
						'street': $('#add-stop #street').val(),
						'home': $('#add-stop #home').val(),
						'city': $('#add-stop #city').val(),
						'postal_code': $('#add-stop #postal_code').val(),
						'country': $('#add-stop #country').val(),
						'weight': $('#edit-stop .weight').val(),
						'stops_number': $('#edit-stop .stop_number').val(),
						'lat_lng': latlng,
						'stops': stops,
						
					},
					success: function (data) {
						if (isNaN(data)) {
							$.each(data['errors'], function (i, item) {
								$.notify("Whoops \n" + item, {
									position: "top right",
									className: "error"
								});
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
							},2000);
						} else if (data == 1) {
							$.notify("Updated successfully \n Stop Updated Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#edit-stop').modal('hide');
						}
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						}, 2000)
						
					}

				});
			});	

		});

		$("input[type=checkbox]").iCheck({
	        checkboxClass: 'icheckbox_square-blue',
	        radioClass: 'iradio_minimal-blue'
	    }); 

	    $(document).on('ifChecked','input[type=checkbox]', function(event){
	      $('input[type=checkbox]').not(this).iCheck('uncheck');
	      if($(this).hasClass('pick') ){
	      		$('.pick-period').fadeIn(500);
	      }else{
	      		$('.pick-period').fadeOut(500);  		
	      }

	      $('input[type=checkbox]').not(this).iCheck('update');
	    });

	    $('#add-freight select.categories').on('change',function(){
	    	if($(this).val() != 'other'){
	    		$('#add-freight .weight').val($(this).children('option:selected').data('weight')).attr('disabled',true);
	    		$('#add-freight .width').val($(this).children('option:selected').data('width')).attr('disabled',true);
	    		$('#add-freight .height').val($(this).children('option:selected').data('height')).attr('disabled',true);
	    		$('#add-freight .length').val($(this).children('option:selected').data('length')).attr('disabled',true);
	    	}else if($(this).val() == 'other'){
	    		$('#add-freight .weight,#add-freight .width,#add-freight .height,#add-freight .length').val('').removeAttr('disabled');
	    	}
	    });


	    function getLatLng(address,index){

	    	input = document.getElementById('data-loc');

	    	geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'address': address}, function(results, status) {
              	if (status == 'OK') {
              		input.setAttribute('lat-'+index,results[0].geometry.location.lat());
              		input.setAttribute('lng-'+index,results[0].geometry.location.lng());
	            }
            });
	    }

	    function calcRoute() {
            setTimeout(function(){
                var from1 = $('#data-loc').attr('lat-0');
                var from2 = $('#data-loc').attr('lng-0');
                var to1 = $('#data-loc').attr('lat-1');
                var to2 = $('#data-loc').attr('lng-1');
                var start = new google.maps.LatLng(from1, from2);
                var end = new google.maps.LatLng(to1, to2);
                var request = {
                  origin: start,
                  destination: end,
                  travelMode: google.maps.TravelMode.DRIVING,
                  provideRouteAlternatives: true,
                  unitSystem: google.maps.UnitSystem.METRIC,
                };
                var directionsService = new google.maps.DirectionsService();
                directionsService.route(request, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                      	var route = response.routes;
                      	var selected_distance=[];
                      	for (var i = 0; i < route.length; i++) {
	                        for (var x = 0; x < route[i].legs.length; x++) {
	                           selected_distance.push(route[i].legs[x].distance.value);
	                        }
                      	}

                      	var routesSteps = [];
                      	var routes = response.routes;
	                    var optimum = routes[Math.floor(response.routes.length/2)];
	                    var distance = optimum.legs[0].distance.value;        
                      	$('#data-loc').attr('distance',Math.round(distance));
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
        }

		$(document).on('click','.freight-data',function(){
			var id = $(this).attr('value');
			$('#add-freight').modal('toggle'); 

			var source = getLatLng($(this).parents('td').siblings('td.address').data('tour-address') , 0);

			$('#add-freight').on('click','.btn-success',function(e){
				e.preventDefault();
				e.stopPropagation();

				var destination = getLatLng($('#add-freight .persons option:selected').data('address') , 1);
				calcRoute();

				var type = '';
				if($('#add-freight .pick-period').css('display') == 'none'){
					type = 'drop';
				}else{
					type = 'pick';
				}
				$('.ladda-button').ladda('start');
				setTimeout(function(){
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "{{route('customer_business.storeStopFreight')}}",
						type: 'POST',
						data: {
							'_token': $('input[name="_token"]').val(),
							'stop_id': id,
							'type': type,
							'distance': $('#data-loc').attr('distance'),
							'pick_period': $('#add-freight .period').val(),
							'name': $('#add-freight .name').val(),
							'category': $('#add-freight .categories option:selected').val(),
							'width': $('#add-freight .width').val(),
							'weight': $('#add-freight .weight').val(),
							'height': $('#add-freight .height').val(),
							'length': $('#add-freight .length').val(),
							'order_person_id': $('#add-freight .persons option:selected').val(),
							'number_of_items': $('#add-freight .number_of_items').val(),
							'description': $('#add-freight .description').val(),
						},
						success: function (data) {
							if (isNaN(data)) {
								$.each(data['errors'], function (i, item) {
									$.notify("Whoops \n" + item, {
										position: "top right",
										className: "error"
									});
								});
								setTimeout(function () {
									$('.ladda-button').ladda('stop');
								},2000);
							} else if (data == 1) {
								$.notify("Saved successfully \n Freight Saved Successfully", {
									position: "top right",
									className: "success"
								});
								setTimeout(function () {
									$('.ladda-button').ladda('stop');
									location.reload();
								}, 2000);
								$('#add-freight').modal('hide');
							}
						},
						error: function (data) {
							$.notify("Whoops \n Error may be in connection to server", {
								position: "top right",
								className: "error"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
							}, 2000)
							
						}

					});
				},1250);
			});
			
		});


	});
</script>

<script type="text/javascript">
	var stops;
	function formatFreights ( d ) {
	    // `d` is the original data object for the row

	    d = JSON.parse(d);
	   	var rows = '';
		$.each(d.stop_freights,function(i,item){
			
			var type = '';
			var type_class = '';
			var category = '';
			var weight = '';
			var width = '';
			var height = '';
			var length = '';
			var sizes = '';
			var cat = '';
			var period = '';
	
			if(item.freights.freight_details.type == 'pick'){
				type = 'Pick Up in '+item.freights.freight_details.pick_period+' Mins';
				type_class = 'pick';
				period = item.freights.freight_details.pick_period;
			}else if(item.freights.freight_details.type == 'drop'){
				type = 'Drop';
				type_class = 'drop';
				period = '';
			}


			if(item.freights.freight_details.freight_cat_id == null){
				category = 'Other';
				cat = 'other';
				weight = item.freights.freight_details.weight;
				length = item.freights.freight_details.length;
				width = item.freights.freight_details.width;
				height = item.freights.freight_details.height;
				sizes = '(weight: '+weight+'Kg l,w,h:'+length+'Cm ,'+width+'Cm ,'+height+'Cm)';
			}else{

				category =item.freights.freight_details.freight_category.category;
				cat = item.freights.freight_details.freight_category.id;
				weight = item.freights.freight_details.freight_category.weight;
				length = item.freights.freight_details.freight_category.length;
				width = item.freights.freight_details.freight_category.width;
				height = item.freights.freight_details.freight_category.height;
				sizes ='(weight: '+weight+'Kg l,w,h:'+length+'Cm ,'+width+'Cm ,'+height+'Cm)';
			}

	   	 	rows += '<tr style= class="trip" data-tester="'+encodeURIComponent(JSON.stringify(item))+'">'+
		            '<td class="freight_name">'+item.freights.name+'</td>'+
		            '<td class="type" data-type="'+type_class+'" data-period="'+period+'">'+type+'</td>'+
		            '<td class="sizes" data-type="'+cat+'" data-weight="'+weight+'" data-width="'+width+'" data-length="'+length+'" data-height="'+height+'"><p>'+category+'</p><p>'+sizes+'</p></td>'+
		            '<td class="number_of_packets">'+item.number_of_packets+'</td>'+
		            '<td class="price">'+item.freights.freight_details.price+' € </td>'+
		            '<td class="person" data-id="'+item.order_person.id+'">'+
		            	'<p>'+item.order_person.first_name+' '+item.order_person.last_name+'</p>'+
		            	'<p>'+item.order_person.number.mobile_number+'</p>'+
		            	'<p>'+item.order_person.address.street+' '+item.order_person.address.home+"<br>"+item.order_person.address.postal_code+' '+item.order_person.address.city+"<br>"+item.order_person.address.country_name+'</p>'+
		            '</td>'+
		            '<td class="actions" data-notes="'+item.notes+'">'+
		            	'<button type="submit" class="btn btn-success btn-xs edit-packet" value="'+item.freight_id+'" data-stop-id="'+d.id+'"><i class="fa fa-edit"></i>Edit</button>'+
						'<button type="submit" class="btn btn-danger btn-xs delete-packet" value="'+item.freight_id+'"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>'+
		            '</td>'+
		        '</tr>';
	   	});    	

	   	return '<div class="addition_stop text-left">Stop '+d.id+' Freights :- </div><table class="table demo-foo-filtering table-hover daTatable trips dataTable text-center" id="freight-data-'+d.id+'"  cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
		    	'<thead>'+
		    	'<tr style="background-color: #EEE;">'+
		    	'<th>Freight Name</th>'+
		    	'<th>Freight Type</th>'+
		    	'<th>Freight Category</th>'+
		    	'<th>Number Of Packets</th>'+
		    	'<th>Price</th>'+
		    	'<th>Receiver</th>'+
		    	'<th>{{trans('main.action')}}</th>'+
		    	'</tr>'+
		    	'</thead>'+
		    	'<tbody>'+
		    	rows+
		    	'</tbody>'+

		    	'</table>';
	    	
	}
	

	$(function(){
		
		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();
	
		// Activate And Show Freight Table inside Stop Row
		$(document).on('click', '#stops-table tbody td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = $('#stops-table').DataTable().row( tr );
	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            $(document).find('#freight-data-'+tr.data('tester').id).DataTable().destroy();
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	           	
	            row.child( formatFreights(JSON.stringify(tr.data('tester'))) ).show();
	            var newTable = $('#freight-data-'+tr.data('tester').id).DataTable({
						"pageLength": 5,
						'language': {
							paginate: {
								next: '<span class="fas fa-angle-right"></span>',
								previous: '<span class="fas fa-angle-left"></span>'
							}
						}
					});
	            tr.addClass('shown');

	        }
	    } );

	    $(document).on('click', '.delete-packet', function () {
			$('#confirm-delete').modal('show');
			var id = $(this).attr('value');

			$(document).on('click', '#confirm-delete .btn-danger', function (e) {
				
				$('.ladda-button5').ladda('start');
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.destroyFreight')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Freight Deleted Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000);
						$('#confirm-delete').modal('hide');
						location.reload();
						close();
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000)
					}

				});

			});

		});

		$(document).on('click','.edit-packet',function(){
			var id = $(this).val();
			var stop_id = $(this).data("stop-id");

			$('#edit-freight .name').val($('td.freight_name').text());
			$('#edit-freight select.categories').val($('td.sizes').data('type'));
			$('#edit-freight .weight').val($('td.sizes').data('weight'));
			$('#edit-freight .width').val($('td.sizes').data('width'));
			$('#edit-freight .height').val($('td.sizes').data('height'));
			$('#edit-freight .length').val($('td.sizes').data('length'));
			$('#edit-freight select.persons').val($('td.person').data('id'));
			$('#edit-freight .number_of_items').val($('td.number_of_packets').text());
			$('#edit-freight .description').val($('td.actions').data('notes'));
			var myClass = $('td.type').data('type');
			if(myClass=='pick'){
				$('#edit-freight .pick-period').show();
				$('#edit-freight .pick-period .period ').val($('td.type').data('period'));
			}else{
				$('#edit-freight .pick-period').hide();
				$('#edit-freight .pick-period .period ').val('');
			}
			$('#edit-freight .drop').attr('checked',true);
	      	$('#edit-freight input[type=checkbox].'+myClass).iCheck('check');
	      	$('#edit-freight input[type=checkbox].'+myClass).iCheck('update');


			$('#edit-freight').modal('toggle');

			$('#edit-freight').on('click','.btn-success',function(e){
				e.preventDefault();
				e.stopPropagation();
				var type = '';
				if($('#edit-freight .pick-period').css('display') == 'none'){
					type = 'drop';
				}else{
					type = 'pick';
				}
				$('.ladda-button').ladda('start');
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.editStopFreight')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'stop_id': stop_id,
						'type': type,
						'pick_period': $('#edit-freight .period').val(),
						'name': $('#edit-freight .name').val(),
						'category': $('#edit-freight .categories option:selected').val(),
						'width': $('#edit-freight .width').val(),
						'weight': $('#edit-freight .weight').val(),
						'height': $('#edit-freight .height').val(),
						'length': $('#edit-freight .length').val(),
						'order_person_id': $('#edit-freight .persons option:selected').val(),
						'number_of_items': $('#edit-freight .number_of_items').val(),
						'description': $('#edit-freight .description').val(),

					},
					success: function (data) {
						if (isNaN(data)) {
							$.each(data['errors'], function (i, item) {
								$.notify("Whoops \n" + item, {
									position: "top right",
									className: "error"
								});
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
							},2000);
						} else if (data == 1) {
							$.notify("Updated successfully \n Freight Updated Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#edit-freight').modal('hide');
						}
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						}, 2000)
						
					}

				});
			});
		});
		

	});


</script>

@endsection