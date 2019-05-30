<div id="edit-freight" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Edit Freight</h4>
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
							<strong>Freight Name: </strong>
						</div>
						<div class="col-sm-8">
							<input type="text" class="name form-control" placeholder="Freight Name">
						</div>

					</div>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Freight Category: </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control categories">
								<option value="other">Other</option>
								@foreach($cats as $one)
								<option value="{{$one->id}}" data-weight="{{$one->weight}}" data-width="{{$one->width}}" data-height="{{$one->height}}" data-length="{{$one->length}}">{{$one->category}}</option>
								@endforeach
							</select>
						</div>

					</div>
				</div>		
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Weight / Width: </strong>
						</div>
						<div class="col-sm-4" style="padding-right: 7.5px;">
							<input type="number" class="weight form-control" placeholder="Weight">
						</div>
						<div class="col-sm-4" style="padding-left: 7.5px;">
							<input type="number" class="width form-control" placeholder="Width">
						</div>

					</div>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Height / Length: </strong>
						</div>
						<div class="col-sm-4" style="padding-right: 7.5px;">
							<input type="number" class="height form-control" placeholder="Height">
						</div>
						<div class="col-sm-4" style="padding-left: 7.5px;">
							<input type="number" class="length form-control" placeholder="Length">
						</div>

					</div>
				</div>	
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Receiver: </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control persons">
								@foreach($persons as $person)
								<option value="{{$person->id}}">{{$person->name()}}</option>
								@endforeach
							</select>
						</div>

					</div>
				</div>
		
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Number Of Items: </strong>
						</div>
						<div class="col-sm-8">
							<input type="number" class="form-control number_of_items" placeholder="Number Of Items">
						</div>

					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Status : </strong>
						</div>
						<div class="col-sm-8">
							<input type="checkbox" name="type" class="icheckbox_flat drop">&nbsp;Drop
							<input type="checkbox" name="type" class="icheckbox_flat pick">
							&nbsp;Pick Up
						</div>

					</div>
				</div>		

				<div class="col-xs-12 col-sm-12 col-md-12 pick-period">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>Pick Up Period: </strong>
						</div>
						<div class="col-sm-8">
							<input type="number" class="period form-control" placeholder="Pick Up Period">
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
