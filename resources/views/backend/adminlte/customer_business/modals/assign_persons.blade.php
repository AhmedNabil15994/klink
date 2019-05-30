<div id="add-person" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Assing Order Perosn</h4>
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
							<strong>Tour Person Type: </strong>
						</div>
						<div class="col-sm-8">
							<input type="checkbox" name="type" class="icheckbox_flat users" checked>&nbsp;Users
							<input type="checkbox" name="type" class="icheckbox_flat person">
							&nbsp;Order Person
						</div>

					</div>
				</div>		
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Tour Person : </strong>
						</div>
						<div class="col-sm-8 tour_person">
							<select class="form-control users active" >
								<option data-id="" disabled selected>Select User</option>

								@foreach ($users as $user)
									<option data-id="{{$user->id}}">{{$user->company?$user->company:$user->name()}}</option>
								@endforeach
							</select>

							<select class="form-control persons" style="display: none">
								<option data-id="" disabled selected>Select Order Person</option>
								@foreach ($order_persons as $order_person)
									<option data-id="{{$order_person->id}}">{{$order_person->company?$order_person->company:$order_person->name()}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>		
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Tour Company : </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control companies">
								<option data-id="" disabled selected>Select Company</option>
								@foreach ($companies as $company)
								<option data-id="{{$company->user_id}}">{{$company->company?$company->company:$company->name()}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>		
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Tour Driver : </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control drivers">
						
							</select>
						</div>
					</div>
				</div>		

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Tour Offer : </strong>
						</div>
						<div class="col-sm-8">
							<input type="number" class="form-control company_offer" placeholder="Tour Offer">
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
