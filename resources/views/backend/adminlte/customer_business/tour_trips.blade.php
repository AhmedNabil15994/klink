@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.trips')}}
@endsection



@section('bigFilter')
<style type="text/css">
	#stops option{
		padding: 5px;
	}
	td.details-control {
        background: url("{{asset('images/details_open.png')}}") no-repeat center center;
        cursor: pointer;
        padding:10px !important;
    }
    tr.shown td.details-control {
        background: url("{{asset('images/details_close.png')}}") no-repeat center center;
    }
    .addition_stop{
    	font-size: 20px;
    	margin-bottom: 10px;
    }
    .addition_stop.stop{
		font-size: 18px !important;
		font-weight: bold;
    	color: #666;
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
</style>
@include('backend.adminlte.customer_business.modals.assign_trip_stops')
@include('backend.adminlte.customer_business.modals.edit_stop')


<div class="col-md-3" style="padding-top: 15px;padding-bottom: 15px;padding-right: 0">
	<div class="bigFilter">
		<ul class="main">
			<li><a class="all active" id="all" href="javascript:void(0)" link="{{route('customer_business.filterTrips',['type'=> 'all'])}}">All Trips</a></li>
			<li>Accounting Period Trips 
				<ul class="inner">
					<li><a class="today" id="today" href="javascript:void(0)" link="{{route('customer_business.filterTrips',['type'=> 'today'])}}">Today Trips</a></li>
					<li><a class="current_account_period" id="current_account_period" href="javascript:void(0)" link="{{route('customer_business.filterTrips',['type'=> 'current_account_period'])}}">Trips In Accounting Period</a></li>
					<!--<li><a class="next_account_period" id="next_account_period" href="javascript:void(0)" link="{{route('customer_business.filterTrips',['type'=> 'next_account_period'])}}">Next Period Trips</a></li>-->
				</ul>
			</li>
			<!--<li>Paid Trips 
				<ul class="inner">
					<li><a class="next_paid_period" id="next_paid_period" href="javascript:void(0)" link="{{route('customer_business.filterTrips',['type'=> 'next_paid_period'])}}">Next Trips To Be Paid</a></li>
					<li><a class="last_paid_period" id="last_paid_period" href="javascript:void(0)" link="{{route('customer_business.filterTrips',['type'=> 'last_paid_period'])}}">Last Paid Trips</a></li>
				</ul>
			</li>-->
		</ul>
	</div>
</div>
@endsection

@section('table')


@include('backend.adminlte.customer_business.Ajax.filterTrips')

@endsection

@section('scripts2')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
type="text/javascript"></script>	
<script type="text/javascript">
	document.getElementById('home').setAttribute('class','col-md-9');

	$(function(){

		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();


		$('#today , #current_account_period , #next_account_period , #next_paid_period , #last_paid_period , #all').click(function () {
                $('.pag #row-one').remove();
                if ($(this).hasClass('active')) {
                    return void (0);
                } else {
                    $('ul li a.active').removeClass('active');
                    $(this).addClass('active');
                    getData(null, $(this).attr('link'));
                }

        });

        function getData(page_number, url) {
                url = url || '?page=' + page_number
                var outerBox = '#home';
                var Box = '#home .pag .myTable';
                var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
                $(Box + ' #overlayPagination').remove();
                $(Box).append(loaging);
                $.ajax({
                    url: url,
                    data:{
                        'type':$('#checkType').val()
                    }
                }).done(function (data) {
                    $(Box).html(data);
					$('.demo-foo-filtering').DataTable();      
                    $('.pag #overlayPagination').remove();
                }).fail(function () {
                    $('.pag #overlayPagination').remove();
                    $('.pag #overlayError').remove();
                    var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                    $(Box).html(error);
                });
            }


		$(document).on('click','.assign',function(){
			var id = $(this).attr('value');
			$.ajax({
				url: "{{route('customer_business.tripTour')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id':id,
				},
				success: function (data) {
					$('#stops').empty();
					$('#tour_name').html(data[1]);
					$.each(data[0], function (i, item) {
						$('#stops').append('<option data-value="'+item['id']+'" '+item['status']+'>'+item['id']+" - "+item['name']+'</option>');
					});
					$('#add-trip-stops').modal('toggle');	
				},
			});

			$('#add-trip-stops').on('click', '.btn-success', function (e) {
				e.preventDefault();
				e.stopPropagation();
		        $('.ladda-button').ladda('start');
		        var stops=[];
	            $('#stops option:selected').each(function(){
	                stops.push($(this).val());
	            });
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.assignTripStops')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'trip_id':id,
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
							$.notify("Saved successfully \n Stops Assigned Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
	                    		$('.ladda-button').ladda('stop');
	                    		location.reload();
							}, 2000);
							$('#add-trip-stops').modal('hide');
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
						url: "{{route('customer_business.destroyTourTrips')}}",
						type: 'POST',
						data: {
							'_token': $('input[name="_token"]').val(),
							'id': id,
						},
						success: function (data) {

							$.notify("Deleted successfully \n Tour Trip Deleted Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
	                    		$('.ladda-button5').ladda('stop');
							}, 2000);
							$('#confirm-delete').modal('hide');
							$('.tab-row' + id).remove();
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
	});
</script>

<!-- Script For Attaching Stops To Every Trip -->
<script type="text/javascript">
	var stops;
	function formatTrips ( d ) {
	    // `d` is the original data object for the row

	    d = JSON.parse(d);
	   	var rows = '';
		$.each(d.trips,function(i,item){
			
			

	   	 	rows += '<tr style= class="trip" data-tester="'+encodeURIComponent(JSON.stringify(item))+'">'+
					'<td class="details-control second" value="'+d.id+'"></td>'+
		            '<td>'+item.id+'</td>'+
		            '<td>'+item.is_done_dates.day+'</td>'+
		            '<td>'+
		            	'<button type="submit" class="btn btn-primary btn-xs assign" value="'+item.id+'"><i class="fa fa-info"></i>Assign Stops</button>'+
						'<button type="submit" class="btn btn-danger btn-xs delete" value="'+item.id+'"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>'+
		            '</td>'+
		        '</tr>';
	   	});    	

	   	return '<div class="addition_stop text-left">Tour '+d.id+' Trips :- </div><table class="table demo-foo-filtering table-hover daTatable trips dataTable text-center" id="trip-data-'+d.id+'"  cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
		    	'<thead>'+
		    	'<tr style="background-color: #EEE;">'+
		    	'<th></th>'+
		    	'<th>{{trans('backend/customer_business.trip_number')}}</th>'+
		    	
		    	'<th style="padding: 0;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{trans("backend/customer_business.trip_date")}}" id="search"></th>'+
		    	'<th>{{trans('main.action')}}</th>'+
		    	'</tr>'+
		    	'</thead>'+
		    	'<tbody>'+
		    	rows+
		    	'</tbody>'+

		    	'</table>';
	    	
	}
	function formatStops ( d ) {
	    // `d` is the original data object for the row

	    d = JSON.parse(decodeURIComponent(d))
	   	var rows = '';
		$.each(d.trip_stops,function(i,item){
			mobile ='';
			street ='';
			home ='';
			postal_code ='';
			city ='';
			country_name ='';
			description ='';
			duration ='';
			
			if(item.stops.number_id != null){
				if( item.stops.stop_number != null){
					mobile = item.stops.stop_number.mobile_number;
				}
			}else if(item.stops.number_id == null){
				mobile ='';
			}

			var address = item.stops.stop_address;
			if(address){
				street = address.street;
				home = address.home;
				postal_code = address.postal_code;
				city = address.city;
				country_name = address.country_name;
			}

			if(item.stops.stop_description ){
				description = item.stops.stop_description;
			}

			if(item.stops.duration){
				duration = item.stops.duration+' Min';
			}

	   	 	rows += '<tr class="stop">'+
		            '<td class="stop_name">'+item.stops.name+'</td>'+
		            '<td class="stopNumber">'+item.stops.stops_number+'</td>'+
		            '<td class="stop_description">'+description+'</td>'+
		            '<td class="stop_weight">'+item.stops.weight+'</td>'+
		            '<td>'+duration+'</td>'+
		            '<td class="stop_mobile_number">'+mobile+'</td>'+
		            '<td class="address" data-address="'+street +' '+home+', '+city+' '+country_name+'">'+street+" "+home+"<br>"+postal_code+" "+city+"<br>"+country_name+'</td>'+
		        	'<td><button type="submit" class="btn btn-success btn-xs edit" value="'+item.stops.id+'"><i class="fa fa-edit"></i>Edit</button><button type="submit" class="btn btn-danger btn-xs delete-stop" value="'+item.stops.id+'"><i class="fa fa-close"></i>{{trans('main.delete')}}</button></td>'+

		        '</tr>';
	   	});    	
	   	return '<div class="addition_stop stop text-left">Trip '+d.id+' Stops :- </div><button type="button" class="btn btn-success btn-circle pull-right add-stop" value="'+d.id+'"><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>'+
	   			'<table class="table demo-foo-filtering table-hover daTatable trip_stops dataTable text-center" id="stops-data-'+d.id+'"  cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
		    	'<thead>'+
		    	'<tr style="background-color: #EEE;">'+
		    	'<th>Stop Name</th>'+
		    	'<th>Stops Number</th>'+
		    	'<th>Description</th>'+
		    	'<th>Weight</th>'+
		    	'<th>Duration</th>'+
		    	'<th>Mobile</th>'+
		    	'<th>Address</th>'+
		    	'<th>Actions</th>'+
		    	'</tr>'+
		    	'</thead>'+
		    	'<tbody>'+
		    	rows+
		    	'</tbody>'+

		    	'</table>';
	    	
	}	

	$(function(){
			
		var i = 0;
		var done = [];

		// Activate And Show Tours Table inside Trip Row
		$(document).on('click', '#myTours tbody td.details-control.first', function () {
	        var tr = $(this).closest('tr');
	        var row = $('#myTours').DataTable().row( tr );
	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            $(document).find('#trip-data-'+tr.data('tester').id).DataTable().destroy();
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	           	
	            row.child( formatTrips(JSON.stringify(tr.data('tester'))) ).show();
	            var newTable = $('#trip-data-'+tr.data('tester').id).DataTable({
						"pageLength": 5,
						'language': {
							paginate: {
								next: '<span class="fas fa-angle-right"></span>',
								previous: '<span class="fas fa-angle-left"></span>'
							}
						}
					});
	            $('#search,#search2').on('keyup',function(){
		            newTable.search( this.value ).draw();
		        });
	            tr.addClass('shown');

	        }
	    } );


		// Activate And Show Stops Table inside Trip Row
		$(document).on('click', '.trips tbody td.details-control.second', function () {
	        var tr = $(this).closest('tr');
	        var id = $(this).attr('value');
	        var row = $('#trip-data-'+id).DataTable().row( tr );
	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            $(document).find('#stops-data-'+JSON.parse(decodeURIComponent(tr.data('tester'))).id).DataTable().destroy();
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	            row.child( formatStops(tr.data('tester')) ).show();
	            //tr.parents('table').parent('col-sm-12').append('<button>hey</button>');
	            var newTable2 = $('#stops-data-'+JSON.parse(decodeURIComponent(tr.data('tester'))).id).DataTable({
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


		$(document).on('click', ".appended .address",function () {
			var currentInp = $(this).attr("id");
			setAddress(document.getElementById(currentInp));
		});
		setAddress(document.getElementById('address2'));
		$(document).on('click','.delete_add .btn',function(e){
			e.preventDefault();
			e.stopPropagation();
			done.push($(this).data('id'));
			$(this).parents('.appended').remove();
			--i;
			$('#edit-stop .add_address').show();

		});

		$(document).on('blur','#edit-stop .stop_number',function(){
			if($(this).val() > 0 && $('#edit-stop a.add_address').css('display') == 'none'){
				$('#edit-stop a.add_address').show();
			}
		});

		var l = $('.ladda-button').ladda();

		$(document).on('click','.add-stop',function(){
			$('#edit-stop h4.modal-title').html('Add Stop');
			$('#edit-stop input.stop_number').val(1);
			$('#edit-stop').modal('toggle'); 

			var trip_id = $(this).val();
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
				var latlng = [$('#edit-stop #address2').data('lat') , $('#edit-stop #address2').data('lng')];
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.storeTripStop')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'name': $('#edit-stop .stop_name').val(),
						'description': $('#edit-stop .description').val(),
						'mobile_number': $('#edit-stop .mobile_number').val(),
						'street': $('#edit-stop #address2').data('street'),
						'home': $('#edit-stop #address2').data('home'),
						'city': $('#edit-stop #address2').data('city'),
						'trip_id': trip_id,
						'stops_number': $('#edit-stop .stop_number').val()?$('#edit-stop .stop_number').val():0,
						'postal_code': $('#edit-stop #address2').data('postal-code'),
						'country': $('#edit-stop #address2').data('country'),
						'weight': $('#edit-stop .weight').val(),
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
			
		});

		$(document).on('click','.edit',function(e){
			e.preventDefault();
			e.stopPropagation();
			var stop_id = $(this).attr('value');
			var parent = $(this).parent('td');
			var number_of_stops =  parent.siblings('td.stopNumber').text();
			if(number_of_stops == 0){
				$('#edit-stop a.add_address').hide();
			}else{
				$('#edit-stop a.add_address').show();
			}

			$('#edit-stop .stop_name').val(parent.siblings('td.stop_name').text());
			$('#edit-stop .mobile_number').val(parent.siblings('td.stop_mobile_number').text());
			$('#edit-stop .description').val(parent.siblings('td.stop_description').text());
			$('#edit-stop .weight').val(parent.siblings('td.stop_weight').text());
			$('#edit-stop .address').val(parent.siblings('td.address').data('address'));

			$('#edit-stop .stop_number').val(parent.siblings('td.stopNumber').text());

			$('#edit-stop').modal('toggle'); 


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
				var latlng = [$('#edit-stop #lat_lng').data('lat') , $('#edit-stop #lat_lng').data('lng')];
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
						'id': stop_id,
						'name': $('#edit-stop .stop_name').val(),
						'description': $('#edit-stop .description').val(),
						'mobile_number': $('#edit-stop .mobile_number').val(),
						'street': $('#edit-stop #address2').data('street'),
						'home': $('#edit-stop #address2').data('home'),
						'city': $('#edit-stop #address2').data('city'),
						'stops_number': $('#edit-stop .stop_number').val()?$('#edit-stop .stop_number').val():0,
						'postal_code': $('#edit-stop #address2').data('postal-code'),
						'country': $('#edit-stop #address2').data('country'),
						'weight': $('#edit-stop .weight').val(),
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


		$(document).on('click', '.delete-stop', function () {
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


	});


</script>


@endsection