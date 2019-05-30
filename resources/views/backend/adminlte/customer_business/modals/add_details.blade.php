<div id="add-details" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">New Tour Details</h4>
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
							<strong>Min Day Hour : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control timepicker min_day_hour" type="text" placeholder="Min Day Hour" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Max Day Hour : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control timepicker max_day_hour" type="text" placeholder="Max Day Hour" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Additional Days : </strong>
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

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Additional Price : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control additional_price" type="text" placeholder="Additional Price" />
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