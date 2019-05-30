
<div id="add-tour" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">New Tour</h4>
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
							<input class="form-control tour_name" type="text" placeholder="Tour Name" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Price : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control price" type="text" placeholder="Price" />
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Ship : </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control ships">
								@foreach ($ships as $ship)
								<option data-id="{{$ship->id}}">{{$ship->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Tour Type : </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control types">
								<option data-value="0">Tour Per Stop</option>
								<option data-value="1">Tour Per Min</option>
								<option data-value="3">Tour Per Day</option>
								<option data-value="6">Tour Per Packet</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Notes : </strong>
						</div>
						<div class="col-sm-8">
							<textarea class="form-control notes" placeholder="Notes"></textarea>
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