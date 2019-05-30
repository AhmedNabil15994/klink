<div id="edit-stop" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Edit Stop</h4>
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
							<strong>Stop Name : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control stop_name" type="text" placeholder="Stop Name" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Stop Number : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control stop_number" type="number" placeholder="Stop Number" />
							<a href="#" class="pull-right add_address">Add Address</a>
						</div>
					</div>
				</div>

				<div id="addresses">
					
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Stop Weight : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control weight" type="number" placeholder="Stop Weight(KG)" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{ trans('backend/customer_business.mobile_number') }} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control mobile_number" type="text" placeholder="{{ trans('backend\customer_business.mobile_number') }}" />
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
	                            <input type="text" id="address2" class="form-control address" placeholder="{{ trans('backend/customer_business.address') }}">
	                        </div>
							
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Description : </strong>
						</div>
						<div class="col-sm-8">
							<textarea class="form-control description" placeholder="Description"></textarea>
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