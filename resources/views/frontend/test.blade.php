<div class="special-wrapper">
    @include('frontend.layouts.partials.nav')
    <div class="heade col-xs-12">
        <div class="container">
        	<div class="row">
        		<div class="col-xs-3">
        			<label for="start">Start</label>
	            	<input type="text" class="form-control start" value="{{Carbon::parse(Carbon::now())->format('Y-m-d')}}">	
        		</div>
	            <div class="col-xs-3">
					<div class="col-xs-12">
        				<label for="account_time">Account Time</label>
					</div>
					<div class="col-xs-6">
	            		<input type="text" class="form-control every" value="1">	
					</div>
	            	<div class="col-xs-6">
	            		<select class="form-control time">
		            		<option value="0">days</option>
		            		<option value="1">weeks</option>
		            		<option value="2">months</option>
		            	</select>
	            	</div>
        		</div>
        		<div class="col-xs-3">
        			<label for="payment_period">Payment Period</label>
        			<select class="form-control payment_period">
		            		<option value="0">same day</option>
		            		<option value="1">start of week</option>
		            		<option value="2">end of week</option>
		            		<option value="3">start of month</option>
		            		<option value="4">end of month</option>
		            		<option value="5">to 15 of month, or end of month</option>
		            		<option value="6">end of quarter</option>
		            		<option value="7">half year</option>
		            		<option value="8">end of year</option>
		            </select>
        		</div>
        		<div class="col-xs-3">
        			<label for="payment_date">Next Payment Day</label>
	            	<input type="text" class="form-control payment_date" placeholder="Next Payment Day">	
        		</div>
	        </div>
	        <div class="row text-right" style="margin-top: 15px;margin-right: 0;">
	        	<button class="btn btn-xs btn-primary get_data"><i class="fas fa-check"></i> Get Data</button>
	        </div>
        </div>
    </div>
    @include('frontend.layouts.partials.footer')
</div>

<script type="text/javascript">
	
	$(function(){

		$('.get_data').on('click',function(e){

			e.preventDefault();
			e.stopPropagation();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('getDates')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'start': $('input.start').val(),
					'every': $('input.every').val(),
					'time': $('select.time option:selected').val(),
					'payment_period': $('select.payment_period option:selected').val(),
				},
				success: function (data) {
					$('input.payment_date').val(data);
				},
				

			});


		});

	});
	

</script>