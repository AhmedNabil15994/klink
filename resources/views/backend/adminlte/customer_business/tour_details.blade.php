@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.tour_details')}}
@endsection

@section('table')



<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
	<thead>
		<tr style="background-color: #EEE;">
			<th>{{trans('backend/customer_business.tour_number')}}</th>
			<th>{{trans('backend/customer_business.min_day_hour')}}</th>
			<th>{{trans('backend/customer_business.min_day_hour')}}</th>
			<th>{{trans('backend/customer_business.additional_price')}}</th>
			<th>{{trans('backend/customer_business.additional_days')}}</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		@foreach($data as $details)
		<tr class="tab-row{{$details->id}}">
			<td class="tour_number">{{$details->tour_id}}</td>
			<td class="min_day_hour">{{$details->min_day_hour}}</td>
			<td class="max_day_hour">{{$details->max_day_hour}}</td>
			<td class="additional_price">{{$details->additional_price}}</td>
			<td class="additional_days">
				<ul class="unstyled-list days">
					@if($details->additional_days)
					@foreach(json_decode($details->additional_days) as $day)
					<li>{{$day}}</li>
					@endforeach
					@endif
					
				</ul>
			</td>
			<td>
				
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$details->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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

		var l5 = $('.ladda-button5').ladda();

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
					url: "{{route('customer_business.destroyTourDetails')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Tour Details Deleted Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000);
						$('#confirm-delete').modal('hide');
						$('.tab-row' + id).remove();
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