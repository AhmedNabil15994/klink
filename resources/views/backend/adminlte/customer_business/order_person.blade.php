@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.order_person')}}
@endsection
@section('styles')
<style type="text/css">
button.add.btn-success{
	visibility: visible !important;
}
</style>
@endsection

@section('table')

<div id="add-shipping" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">New Order Person</h4>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>
			<div class="modal-body">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.name') }} : </strong>
						</div>
						<div class="col-sm-4">
							<input class="form-control first_name" type="text" placeholder="{{ trans('backend/customer_business.first_name') }}" />
						</div>
						<div class="col-sm-4">
							<input class="form-control last_name" type="text" placeholder="{{ trans('backend/customer_business.last_name') }}" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.company') }} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control company" type="text" placeholder="{{ trans('backend/customer_business.company') }}" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.email') }} </strong>
						</div>
						<div class="col-sm-8">
							<input type="email" class="form-control email" placeholder="{{ trans('backend/customer_business.email') }}">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.mobile_number') }} </strong>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control mobile_number" placeholder="{{ trans('backend/customer_business.mobile_number') }}">
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.address') }} </strong>
						</div>
						<div class="col-sm-8">
							<div class="map-input"> 
								<i class="fa fa-check"></i>
								<input type="text" id="address" class="form-control address" placeholder="{{ trans('backend/customer_business.address') }}">
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				
				<button type="submit" class="btn btn-success ladda-button" data-style="expand-right"> <i class="fa fa-save"></i> <span class="ladda-label">{{ trans('main.save') }}</span></button>

				<button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>

			</div>

		</div>
		<input type="hidden" id="home">
		<input type="hidden" id="street">
		<input type="hidden" id="city">
		<input type="hidden" id="postal_code">
		<input type="hidden" id="country">
		<input type="hidden" id="lat_lng">

	</div>
</div>

<div id="edit-shipping" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Edit Order Person</h4>
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>
			<div class="modal-body">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.name') }} : </strong>
						</div>
						<div class="col-sm-4">
							<input class="form-control first_name" type="text"/>
						</div>
						<div class="col-sm-4">
							<input class="form-control last_name" type="text"/>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.company') }} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control company" type="text"/>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.email') }} </strong>
						</div>
						<div class="col-sm-8">
							<input type="email" class="form-control email">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.mobile_number') }} </strong>
						</div>
						<div class="col-sm-8">
							<input type="text" class="form-control mobile_number">
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.address') }} </strong>
						</div>
						<div class="col-sm-8">
							<div class="map-input"> 
								<i class="fa fa-check"></i>
								<input type="text" id="address2" class="form-control address">
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				
				<button type="submit" class="btn btn-success ladda-button" data-style="expand-right"> <i class="fa fa-save"></i> <span class="ladda-label">{{ trans('main.save') }}</span></button>

				<button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>

			</div>

		</div>
	</div>
</div>



<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
	<thead>
		<tr style="background-color: #EEE;">
			<th>{{ trans('main.no#') }}</th>
			<th>{{trans('backend/customer_business.name')}}</th>
			<th>{{trans('backend/customer_business.company')}}</th>
			<th>{{trans('backend/customer_business.mobile_number')}}</th>
			<th>{{trans('backend/customer_business.email')}}</th>
			<th>{{trans('backend/customer_business.address')}}</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		<?php $i = 0; ?>
		@foreach($data as $person)
		<tr class="tab-row{{$person->id}}">
			<td>{{++$i}}</td>
			<td class="person_name">{{$person->name()}}</td>
			<td class="company">{{$person->company}}</td>
			<td class="mobile_number">{{$person->number->mobile_number}}</td>
			<td class="email">{{$person->email->email}}</td>
			<td class="address">{!! $person->address->addressForm() !!}</td>
			<td>
				<button type="submit" class="btn btn-success btn-xs edit" value="{{$person->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$person->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
				<input type="hidden" class="first_name" value="{{$person->first_name}}">
				<input type="hidden" class="last_name" value="{{$person->last_name}}">
				<input type="hidden" class="company" value="{{$person->company}}">
				<input type="hidden" class="email" value="{{$person->email->email}}">
				<input type="hidden" class="mobile_number" value="{{$person->number->mobile_number}}">
				<input type="hidden" class="full_address" 
				value="{{$person->address->street.' '.$person->address->home.', '.$person->address->city.', '.$person->address->region}}">
				
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
@endsection

@section('scripts2')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
type="text/javascript"></script>	
<script type="text/javascript">
	$(function(){

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

								$('#add-shipping #lat_lng').attr('data-lat',latlng.lat);  
								$('#add-shipping #lat_lng').attr('data-lng',latlng.lng);
								if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
									$('#add-shipping #city').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
									$('#add-shipping #postal_code').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('route') > -1) {
									$('#add-shipping #street').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('country') > -1) {
									$('#add-shipping #country').val(results[0].address_components[i].short_name);
								}
								if(results[0].address_components[i].types.indexOf('street_number') > -1) {
									$('#add-shipping #home').val(results[0].address_components[i].long_name);
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

		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();

		

		$('#add-shipping').on('click', '.btn-success', function (e) {
			e.preventDefault();
			e.stopPropagation();
			$('.ladda-button').ladda('start');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			var latlng = [$('#add-shipping #lat_lng').data('lat') , $('#add-shipping #lat_lng').data('lng')];
			$.ajax({
				url: "{{route('customer_business.storeOrderPerson')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'first_name': $('#add-shipping .first_name').val(),
					'last_name': $('#add-shipping .last_name').val(),
					'company': $('#add-shipping .company').val(),
					'mobile_number': $('#add-shipping .mobile_number').val(),
					'email': $('#add-shipping .email').val(),
					'street': $('#add-shipping #street').val(),
					'home': $('#add-shipping #home').val(),
					'city': $('#add-shipping #city').val(),
					'postal_code': $('#add-shipping #postal_code').val(),
					'country': $('#add-shipping #country').val(),
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
						$.notify("Saved successfully \n Order Person Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-shipping').modal('hide');
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

		$(document).on('click', '.edit', function (e) {
			
			$('#edit-shipping').modal('show');
			$('#edit-shipping .first_name').val($(this).siblings('.first_name').val());
			$('#edit-shipping .last_name').val($(this).siblings('.last_name').val());
			$('#edit-shipping .company').val($(this).siblings('.company').val());
			$('#edit-shipping .email').val($(this).siblings('.email').val());
			$('#edit-shipping .mobile_number').val($(this).siblings('.mobile_number').val());
			$('#edit-shipping .address').val($(this).siblings('.full_address').val());
			var id = $(this).attr('value');

			$('#edit-shipping').on('click','.btn-success',function(e){

				e.preventDefault();
				e.stopPropagation();	
				$('.ladda-button').ladda('start');
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var latlng = [$('#add-shipping #lat_lng').data('lat') , $('#add-shipping #lat_lng').data('lng')];
				$.ajax({
					url: "{{route('customer_business.editOrderPerson')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'first_name': $('#edit-shipping .first_name').val(),
						'last_name': $('#edit-shipping .last_name').val(),
						'company': $('#edit-shipping .company').val(),
						'mobile_number': $('#edit-shipping .mobile_number').val(),
						'email': $('#edit-shipping .email').val(),
						'street': $('#add-shipping #street').val(),
						'home': $('#add-shipping #home').val(),
						'city': $('#add-shipping #city').val(),
						'postal_code': $('#add-shipping #postal_code').val(),
						'country': $('#add-shipping #country').val(),
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
							$.notify("Updated successfully \n Order Person Updated Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#add-shipping').modal('hide');
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
					url: "{{route('customer_business.destroyOrderPerson')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Order Person Deleted Successfully", {
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

@endsection