@extends('frontend.Single.index')

@section('styles')
<style type="text/css">
    .btn-danger{
    	margin-right: 10px;
    }
</style>
@endsection

@section('content')
<!--page-->
<div class="faq-page single fullHeight">
  	<div class="container">           
    	<div class="row">
			<div class="col-xs-12">
				<h2 class="heading text-center">Application</h2>
				<form class="well form-horizontal" method="post" action="{{ URL::to($data->back.'/application') }}">
		          	@csrf
		          	<fieldset>
			            <div class="form-group">
			                <label class="col-md-4 control-label">Full Name</label>
			                <div class="col-md-8 inputGroupContainer">
			                   	<div class="input-group">
			                   		<span class="input-group-addon">
			                   			<i class="glyphicon glyphicon-user"></i>
			                   		</span>
			                   		<input id="name" name="name" placeholder="Full Name" class="form-control" required="true" value="{{ old('name') }}" type="text">
			                   	</div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-md-4 control-label">Address</label>
			                <div class="col-md-8 inputGroupContainer">
			                   	<div class="input-group">
				                   	<span class="input-group-addon">
				                   		<i class="glyphicon glyphicon-home"></i>
				                   	</span>
				                   	<input id="addressInput" name="addressInput" placeholder="Address" class="form-control" required="true" value="{{ old('address') }}" type="text">
			                   	</div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-md-4 control-label">Email</label>
			                <div class="col-md-8 inputGroupContainer">
			                   	<div class="input-group">
			                   		<span class="input-group-addon">
			                   			<i class="glyphicon glyphicon-envelope"></i>
			                   		</span>
			                   		<input id="email" name="email" placeholder="Email" class="form-control" required="true" value="{{ old('email') }}" type="email">
			                   	</div>
			                </div>
			            </div>
			            <div class="form-group">
			                <label class="col-md-4 control-label">Phone Number</label>
			                <div class="col-md-8 inputGroupContainer">
			                   	<div class="input-group">
			                   		<span class="input-group-addon">
			                   			<i class="glyphicon glyphicon-earphone"></i>
			                   		</span>
			                   		<input id="mobile_number" name="mobile_number" placeholder="Phone Number" class="form-control" required="true" value="{{ old('mobile_number') }}" type="text">
			                   	</div>
			                </div>
			            </div>
		        		<button type="submit" class="btn btn-xs btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
			            <a class="btn btn-danger btn-xs pull-right" href="{{$data->back}}"><i class="fa fa-home"></i> Back</a>
		        		<div class="clearfix"></div>
		        	</fieldset>
		        	<input type="hidden" name="lat" id="lat">
		        	<input type="hidden" name="lng" id="lng">
		        	<input type="hidden" name="home" id="home" id="home">
		        	<input type="hidden" name="street" id="street">
		        	<input type="hidden" name="city" id="city">
		        	<input type="hidden" name="postal_code" id="postal_code">
		        	<input type="hidden" name="country" id="country" value="">
		    	</form>
			</div>
		</div>
    </div>
</div>
<!--page--> 
@endsection


@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places" type="text/javascript"></script>	
<script>
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
						for (var i=0; i<results[0].address_components.length; i++) {
						
							for (var b=0;b<results[0].address_components[i].types.length;b++) {

								$('#lat').val(latlng.lat);  
								$('#lng').val(latlng.lng);
								if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
									$('#city').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
									$('#postal_code').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('route') > -1) {
									$('#street').val(results[0].address_components[i].long_name);
								}
								if(results[0].address_components[i].types.indexOf('country') > -1) {
									$('#country').val(results[0].address_components[i].short_name);
								}
								if(results[0].address_components[i].types.indexOf('street_number') > -1) {
									$('#home').val(results[0].address_components[i].long_name);
								}
							}
						} 
					}else {
						alert('Geocode was not successful for the following reason: ' + status);
					}
				});

			});
			
		}
		initialize(document.getElementById('addressInput'));
	});
</script>

@endsection