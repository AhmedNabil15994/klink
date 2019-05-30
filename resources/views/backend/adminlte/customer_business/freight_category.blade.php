@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.order_person')}}
@endsection

@section('styles')
<style type="text/css">
button.add.btn-success{
	visibility: visible !important;
}
</style>
@endsection


@section('table')
@include('backend.adminlte.customer_business.modals.add_category')
@include('backend.adminlte.customer_business.modals.edit_category')

<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
	<thead>
		<tr style="background-color: #EEE;">
			<th>{{ trans('main.no#') }}</th>
			<th>Category Name</th>
			<th>Weight</th>
			<th>Width</th>
			<th>Height</th>
			<th>Length</th>
			<th>Price</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		<?php $i = 0; ?>
		@foreach($data as $category)
		<tr class="tab-row{{$category->id}}">
			<td>{{++$i}}</td>
			<td class="category">{{$category->category}}</td>
			<td class="weight">{{$category->weight}}</td>
			<td class="width">{{$category->width}}</td>
			<td class="height">{{$category->height}}</td>
			<td class="length">{{$category->length}}</td>
			<td class="price">{{$category->cat_price}}</td>
			<td>
				<button type="submit" class="btn btn-success btn-xs edit" value="{{$category->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$category->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
				
			</td>
		</tr>

		@endforeach
		
	</tbody>

</table>
@if(!count($data))
<style type="text/css">
tbody,
.dataTables_wrapper .row:last-of-type,
.dataTables_wrapper .row:first-of-type {
	display: none;
}
</style>
<div id="overlayError">
	<div class="row" style="margin-top: 10px;">
		<div class="col-xs-6 text-left pull-right">
			<img style="width: 120px;" src="{{asset('images/filter.svg')}}">
		</div>
		<div class="col-xs-3"></div>
		<div class="col-xs-3 pull-left text-right">
			<div class="callout" style="margin-top: 50px;border-left: 0;">
				<h4>{{trans('main.no_res')}}<i class="fa fa-exclamation fa-fw"></i></h4>
				<p>{{trans('main.no_res2')}}</p>
			</div>
		</div>
	</div>
</div>
@endif
@endsection


@section('scripts2')
<script type="text/javascript">
	$(function(){

		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();

		$(document).on('click','.add',function(){
			$('#add-category').modal('toggle');
		});

		$('#add-category').on('click', '.btn-success', function (e) {
			e.preventDefault();
			e.stopPropagation();
			$('.ladda-button').ladda('start');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('customer_business.storeCategory')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'category': $('#add-category .category').val(),
					'weight': $('#add-category .weight').val(),
					'width': $('#add-category .width').val(),
					'height': $('#add-category .height').val(),
					'length': $('#add-category .length').val(),
					'cat_price': $('#add-category .price').val(),
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
						$.notify("Saved successfully \n Category Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-category').modal('hide');
					}
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					setTimeout(function () {
						$('.ladda-button').ladda('stop');
					}, 2000)
					
				}

			});
		});

		$(document).on('click','.edit',function(){
			var parent = $(this).parents('td');
			var id = $(this).val();
			$('#edit-category .category').val(parent.siblings('td.category').text());
			$('#edit-category .weight').val(parent.siblings('td.weight').text());
			$('#edit-category .width').val(parent.siblings('td.width').text());
			$('#edit-category .height').val(parent.siblings('td.height').text());
			$('#edit-category .length').val(parent.siblings('td.length').text());
			$('#edit-category .price').val(parent.siblings('td.price').text());

			$('#edit-category').modal('toggle');

			$('#edit-category').on('click','.btn-success',function(){
				$('.ladda-button').ladda('start');
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.editCategory')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'category': $('#edit-category .category').val(),
						'weight': $('#edit-category .weight').val(),
						'width': $('#edit-category .width').val(),
						'height': $('#edit-category .height').val(),
						'length': $('#edit-category .length').val(),
						'cat_price': $('#edit-category .price').val(),
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
							$.notify("Updated successfully \n Category Updated Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#edit-category').modal('hide');
						}
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						}, 2000)
						
					}

				});
			});

		});

		$(document).on('click', '.delete', function () {
			$('#confirm-delete').modal('show');
			var id = $(this).attr('value');

			$(document).on('click', '#confirm-delete .btn-danger', function (e) {
				
				$('.ladda-button5').ladda('start');
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.destroyCategory')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Category Deleted Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000);
						$('#confirm-delete').modal('hide');
						location.reload();
						close();
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

		});


	});
</script>
@endsection
