<div id="docs" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Documents</h4>
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
							<strong>Document : </strong>
						</div>
						<div class="col-sm-8">
							<select class="form-control documents">
								<option value="0">Select Document</option>
								@foreach($docs as $doc)	
								<option value="{{$doc->id}}" data-content="{{$doc->layout}}">{{$doc->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<textarea class="first-div" id="first-div">

       		 		</textarea>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="vars" id="vars">

       		 		</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				
				<button type="submit" class="btn btn-success ladda-button edit-doc" id="edit-doc" data-style="expand-right"> <i class="fa fa-edit"></i> <span class="ladda-label">{{ trans('main.edit') }}</span></button>

				<button type="submit" class="btn btn-info ladda-button2 print-doc" id="print-doc" data-style="expand-right"> <i class="fa fa-print"></i> <span class="ladda-label">Print</span></button>

				<button type="submit" class="btn btn-primary ladda-button3 download-doc" id="download-doc" data-style="expand-right"> <i class="fa fa-save"></i> <span class="ladda-label">Download</span></button>

				<button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>

			</div>
			<input type="hidden" id="tour_id">
		</div>
	</div>
</div>