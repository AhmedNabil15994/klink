@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.tour_dates')}}
@endsection

@section('table')

<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
	<thead>
		<tr style="background-color: #EEE;">
			<th>{{trans('backend/customer_business.tour_number')}}</th>
			<th>{{trans('backend/customer_business.start_date')}}</th>
			<th>{{trans('backend/customer_business.finish_date')}}</th>
			<th>{{trans('backend/customer_business.start_time')}}</th>
			<th>{{trans('backend/customer_business.finish_time')}}</th>
			<th>{{trans('backend/customer_business.payment_date')}}</th>
			<th>{{trans('backend/customer_business.cancellation_speak_day')}}</th>
			<th>{{trans('backend/customer_business.payment_speak_day')}}</th>
			<th>{{trans('backend/customer_business.days')}}</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		@foreach($data as $date)
		<tr class="tab-row{{$date->id}}">
			<td class="tour_number">{{$date->tour_id}}</td>
			<td class="created">{{$date->tour_start_date}}</td>
			<td class="finished">{{$date->tour_finish_date}}</td>
			<td class="printed">{{$date->tour_start_time}}</td>
			<td class="updated">{{$date->tour_finish_time}}</td>
			<td class="updated">{{$date->payment_date}}</td>
			<td class="updated">{{$date->cancellation_speak_day}}</td>
			<td class="updated">{{$date->payment_speak_day}}</td>
			
			<td>
				<ul class="unstyled-list days">
					@foreach(json_decode($date->days) as $day)
					<li>{{$day}}</li>
					@endforeach
				</ul>
			</td>
			<td>	
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$date->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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
					url: "{{route('customer_business.destroyTourDates')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Tour Dates Deleted Successfully", {
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