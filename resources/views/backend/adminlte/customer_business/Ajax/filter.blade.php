<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
	<thead>
		<tr style="background-color: #EEE;">
			<th>{{ trans('main.no#') }}</th>
			<th>{{trans('backend/customer_business.tour_number')}}</th>
			<th>Tour Type</th>
			<th>Tour Name</th>
			<th>Tour Company</th>
			<th>{{trans('backend/customer_business.price')}}</th>
			<th>{{trans('backend/customer_business.company')}}</th>
			<th>{{trans('backend/customer_business.driver')}}</th>
			<th>Company Offer</th>
			<th>{{trans('backend/customer_business.notes')}}</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		<?php $i = 0; ?>
		@foreach($data as $tour)
		<tr class="tab-row{{$tour->id}}">
			<td>{{++$i}}</td>
			<td class="tour_number"></td>
			@php
			$tour_type = '';
			if($tour->tour_type === '0'){
				$tour_type = 'Tour Per Stop';
			}elseif ($tour->tour_type == 1) {
				$tour_type = 'Tour Per Min';
			}elseif ($tour->tour_type == 3) {
				$tour_type = 'Tour Per Day';
			}elseif ($tour->tour_type == 6) {
				$tour_type = 'Tour Per Packet';
			}

			@endphp
			<td class="tour_type">{{@$tour_type}}</td>
			<td class="tour_type">{{$tour->tour_name}}</td>
			<td class="tour_type">

				@if($tour->detPerson()[0] != null)
				{{@$tour->detPerson()[0]->company != null ? @$tour->detPerson()[0]->company : @$tour->detPerson()[0]->name()}}
				@endif


				
			</td>
			<td class="price">{{$tour->price}}</td>

			<td class="company">
				@if($tour->accepted_offer != null)
				{{@$tour->accepted_offer->tour_company->company != null ? @$tour->accepted_offer->tour_company->company : @$tour->accepted_offer->tour_company->name() }}
				@endif
				
			</td>

			<td class="driver">{{@$tour->accepted_offer->tour_driver->first_name.' '.@$tour->accepted_offer->tour_driver->last_name}}</td>
			<td class="offer">{{@$tour->accepted_offer->company_offer .' €'}}</td>
			<td class="notes">{{$tour->notes}}</td>
			<td>
				<!--<button class="btn btn-success btn-xs edit" value="{{$tour->id}}"><i class="fa fa-eye"></i>{{trans('backend/question.view')}}</button>	-->
				<button type="submit" class="btn btn-info btn-xs dates" value="{{$tour->id}}"><i class="fa fa-calendar"></i>Dates</button>
				<button type="submit" class="btn btn-warning btn-xs details" value="{{$tour->id}}"><i class="fa fa-info"></i>Details</button>
				<button type="submit" class="btn btn-primary btn-xs assign" value="{{$tour->id}}"><i class="fa fa-info"></i>Assign Person</button>
				<button type="submit" class="btn btn-success btn-xs show_tour" value="{{$tour->id}}"><i class="fa fa-eye"></i>Show</button>
				<button type="submit" class="btn btn-info btn-xs docs" value="{{$tour->id}}"><i class="fa fa-file-alt"></i>Documents</button>
				<button type="submit" class="btn btn-warning btn-xs cancel" value="{{$tour->id}}"><i class="fa fa-ban"></i>{{trans('main.cancel')}}</button>
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$tour->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
			</td>
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

