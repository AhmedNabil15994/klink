<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" id="myTours" data-form="deleteForm">
	<thead>
		<tr style="background-color: #EEE;">
			<td></td>
			<th>{{trans('backend/customer_business.tour_name')}}</th>
			<th>{{trans('backend/customer_business.tour_number')}}</th>
		</tr>
	</thead>

	<tbody>
		@foreach($data as $tour)
		<tr class="tab-row{{$tour->id}}" data-tester="{{$tour}}">
			<td class="details-control first"></td>
			<td class="tour_name">{{$tour->tour_name}}</td>
			<td class="tour_number">{{$tour->tour_number}}</td>
		</tr>

		@endforeach
					
	</tbody>

</table>

@if(!count($data))
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