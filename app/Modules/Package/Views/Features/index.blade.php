@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
Features
@endsection
 
@section('contentheader_title')
Features
@endsection
 
@section('contentheader_description') 
Features
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
Features
@endsection



@section('main-content')

<style type="text/css">
	.dataTables_wrapper .row:first-of-type{
		margin-bottom: 0 !important;
	}
</style>

<div class="tab-content">
	<div id="home" class="tab-pane active in">
		<div class="pag">
			<div class="row" style="margin-bottom: -35px;margin-right: 2px;">
				<button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
				<div class="clearfix"></div>
			</div>
			<div class="myTable">
				<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
					<thead>
						<tr style="background-color: #EEE;">
							<th>{{ trans('main.no#') }}</th>
							<th>Title</th>
							<th>Type</th>
							<th>{{trans('main.action')}}</th>
						</tr>
					</thead>

					<tbody>
						<?php $i = 0; ?>
						@foreach($data as  $feature)

						<tr class="tab-row{{$feature->id}}">
							<td>{{++$i}}</td>
							<td><a href="#" class="editable title" data-id="{{$feature->id}}">{{$feature->title}}</a></td>
							<td><a href="#" class="editable type" data-id="{{$feature->id}}">{{$feature->type}}</a></td>
							<td>
								<button type="submit" class="btn btn-danger btn-xs delete" value="{{$feature->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
							</td>
						</tr>

						@endforeach

					</tbody>

				</table>
				@if(!count((array)$data) > 0)
				<style type="text/css">
				tbody,
				.dataTables_wrapper .row:last-of-type,
				.dataTables_wrapper .row:first-of-type{
					display: none;
				}

				</style>
				<div id="overlayError">
					<div class="row" style="margin-top: 20px;display: block;">
						<div class="col-xs-6 text-left pull-right">
							<img style="width: 120px;" src="{{asset('img/filter.svg')}}">
						</div>
						<div class="col-xs-6 text-right">
							<div class="callout callout-info" style="margin-top: 50px;">
								<h4>{{trans('backend/user.no_result')}}<i class="fa fa-exclamation fa-fw"></i></h4>
								<p>{{trans('backend/user.no_result_now')}}</p>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

@endsection

@section('scripts')
	@include('backend.adminlte.layouts.modals.confirm_delete')
	@include('Package.Views.Features.Modals.add_feature')
	@yield('scripts2')

<script type="text/javascript">
	$(function(){
		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();


		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).on('click','.add',function(){
			$('#add-feature').modal('toggle');
		});

		$('#add-feature .btn-success').on('click',function(){
			$('.ladda-button').ladda('start');
			$.ajax({
				url: "{{URL::to('/backend/features/addFeature')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'title': $('#add-feature input.title').val(),
					'type': $('#add-feature input.type').val(),
				},
				success: function (data) {
					if (isNaN(data)) {
						$.each(data['errors'], function (i, item) {
							$.notify("Whoops \n" + item, {
								position: "top right",
								className: "error"
							});
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						},2000);
					} else if (data == 1) {
						$.notify("Saved successfully \n Feature Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-feature').modal('hide');
					}
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					setTimeout(function () {
						$('.ladda-button').ladda('stop');
					}, 2000);
				}

			});
		});

		$(document).on('click', '.delete', function () {
			$('#confirm-delete').modal('show');
			var id = $(this).attr('value');
			$('#confirm-delete .btn-danger').attr('value',id);
		});

		$(document).on('click', '#confirm-delete .btn-danger', function (e) {
			var id = $(this).attr('value');
			$('.ladda-button5').ladda('start');
			e.preventDefault();
			e.stopPropagation();
			$.ajax({
				url: "{{URL::to('/backend/features/destroyFeature')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id': id,
				},
				success: function (data) {
					$.notify("Deleted successfully \n Feature deleted Successfully", {
						position: "top right",
						className: "success"
					});
					setTimeout(function () {
						$('.ladda-button5').ladda('stop');
					}, 2000);
					$('#confirm-delete').modal('hide');
					$('.tab-row'+id).remove();
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					setTimeout(function () {
						$('.ladda-button5').ladda('stop');
					}, 2000)
				}

			});

		});

		$('a.editable.title').editable({
			mode:'inline',
			type: 'text',
			success: function(response, newValue){
				var id = $(this).data('id');
				var title = $(this).data('title');
				$.ajax({
					url: "{{URL::to('/backend/features/editTitle')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'title': newValue,
					},
					success: function (data) {
						$.notify("Updated successfully \n Title Updated Successfully", {
							position: "top right",
							className: "success"
						});
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
					}

				});
			},
		});

		$('a.editable.type').editable({
			mode:'inline',
			type: 'text',
			success: function(response, newValue){
				var id = $(this).data('id');
				$.ajax({
					url: "{{URL::to('/backend/features/editType')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'type': newValue,
					},
					success: function (data) {
						$.notify("Updated successfully \n Type Updated Successfully", {
							position: "top right",
							className: "success"
						});
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
					}

				});
			},
		});

	});

</script>
@endsection

