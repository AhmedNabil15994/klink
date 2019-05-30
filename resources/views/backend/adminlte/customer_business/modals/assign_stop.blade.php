<div id="add-to-tour" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Assign Stop To Tour</h4>
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
							<strong>Tour Name : </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control tours">
								<option data-id="" disabled selected>Select Tour</option>
								@foreach($tours as $tour)
								<option data-id="{{$tour->id}}">{{$tour->tour_name}}</option>
								@endforeach
							</select>
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