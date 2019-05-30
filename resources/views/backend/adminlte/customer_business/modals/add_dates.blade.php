<div id="add-dates" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">New Tour Dates</h4>
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
							<strong>Start Date : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control start_date" name="dates" type="text" placeholder="Start Date" value="{{Carbon::parse(Carbon::now())->format('Y-m-d')}}" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Finish Date : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control finish_date" name="dates" type="text" placeholder="Finish Date" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Start Time : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control start_time timepicker" name="times" type="text" placeholder="Start Time" value="{{Carbon::parse(Carbon::now())->format('H:i')}}" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Finish Time : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control finish_time timepicker" name="times" type="text" placeholder="Finish Time" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-xs-4">
							<strong>Payment Time/Period : </strong>
						</div>
						<div class="col-xs-4 padd-right">
							<div class="col-xs-5 padd-left padder-right">
								<input type="number" class="form-control count" placeholder="Count" value="1">
							</div>
							<div class="col-xs-7 padder-left padder-right">
								<select class="form-control time">
				            		<option value="0">days</option>
				            		<option value="1">weeks</option>
				            		<option value="2"  selected>months</option>
				            	</select>
							</div>
						</div>
						<div class="col-xs-4 padd-left">
							<select class="form-control payment_period">
								<option value="0">same day</option>
				            	<option value="2">end of week</option>
				            	<option value="4">end of month</option>
				            	<option value="5" selected>to 15 of month, or end of month</option>
				            </select>
						</div>
					</div>
				</div>
		
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Cancellation Time/Period : </strong>
						</div>
						<div class="col-xs-4 padd-right">
							<div class="col-xs-5 padd-left padder-right">
								<input type="number" class="form-control count3" placeholder="Count" value="2">
							</div>
							<div class="col-xs-7 padder-left padder-right">
								<select class="form-control time3">
				            		<option value="0">days</option>
				            		<option value="1" selected>weeks</option>
				            		<option value="2">months</option>
				            	</select>
							</div>
						</div>
						<div class="col-xs-4 padd-left">
							<select class="form-control cancellation_period">
								<option value="0">same day</option>
				            	<option value="2">end of week</option>
				            	<option value="4">end of month</option>
				            	<option value="5" selected>to 15 of month, or end of month</option>
				            	<option value="6">end of quarter</option>
				            	<option value="7">half year</option>
				            	<option value="8">end of year</option>
							</select>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Test Time/Period : </strong>
						</div>
						<div class="col-xs-4 padd-right">
							<div class="col-xs-5 padd-left padder-right">
								<input type="number" class="form-control count4" placeholder="Count" value="2">
							</div>
							<div class="col-xs-7 padder-left padder-right">
								<select class="form-control time4">
				            		<option value="0">days</option>
				            		<option value="1" selected>weeks</option>
				            		<option value="2">months</option>
				            	</select>
							</div>
						</div>
						<div class="col-xs-4 padd-left">
							<select class="form-control test_period">
								<option value="0">same day</option>
				            	<option value="2">end of week</option>
				            	<option value="4">end of month</option>
				            	<option value="5" selected>to 15 of month, or end of month</option>
				            	<option value="6">end of quarter</option>
				            	<option value="7">half year</option>
				            	<option value="8">end of year</option>
							</select>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-xs-4">
							<strong>Account Time/Period : </strong>
						</div>
						<div class="col-xs-4 padd-right">
							<div class="col-xs-12 padd-left padder-right">
								<select class="form-control time2">
				            		<option value="0">days</option>
				            		<option value="1">weeks</option>
				            		<option value="2" selected>months</option>
				            	</select>
							</div>
						</div>
						<div class="col-xs-4 padd-left">
							<select class="form-control account_period">
								<option value="0">same day</option>
				            	<option value="2">end of week</option>
				            	<option value="4" selected>end of month</option>
				            	<option value="5">to 15 of month, or end of month</option>
							</select>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Days : </strong>
						</div>
						<div class="col-sm-8">
							<ul class="unstyled-list days">
								<li>Mo</li>
								<li>Di</li>
								<li>Mi</li>
								<li>Do</li>
								<li>Fr</li>
								<li>Sa</li>
								<li>So</li>
							</ul>
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