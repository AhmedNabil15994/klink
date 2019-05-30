@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/shipping.title') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/shipping.title') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/shipping.title')
}}
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb') {{ trans('backend/shipping.title') }}
@endsection

@section('main-content')
<div id="add-shipping-cost" class="modal fade">
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title" >{{ trans('backend/shipping.create_cost') }}</h4>
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
						<div class="col-xs-12 col-sm-12 col-md-12" style="display:none;">
							<div class="form-group">
								<div class="col-sm-4">
									<strong>{{trans('backend/shipping.type')}} : </strong>
								</div>
								<div class="col-sm-8">
									<select hidden id="addTypes" class=" form-control types">
										@foreach($data as $type)
										<option value="{{$type->id}}">{{$type->title}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<div class="col-sm-4">
									<strong>{{trans('backend/shipping.distance')}} : </strong>
								</div>
								<div class="col-sm-8">
									<select class="select2 form-control distances">
										@foreach($ships   as $distance)
										<option value="{{$distance->id}}">{{$distance->min}} - {{$distance->max}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<div class="col-sm-4">
									<strong>{{trans('backend/shipping.cost_per_kilo')}} : </strong>
								</div>
								<div class="col-sm-8">
									<input type="number" class="form-control cost_per_kilo" placeholder="{{trans('backend/shipping.cost_per_kilo')}}" min="0">
								</div>
								
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<div class="col-sm-4">
									<strong>{{trans('backend/shipping.min_cost')}} : </strong>
								</div>
								<div class="col-sm-8">
									<input type="number" class="form-control min_cost" placeholder="{{trans('backend/shipping.min_cost')}}" min="0">
								</div>
								
							</div>
						</div>
						
					   </div>
						<div class="clearfix"></div>
					   <div class="modal-footer">
						<button type="submit" class="btn btn-success ladda-button ladda-button2" data-style="expand-right"><span class="ladda-label"> <i class="fa fa-save"></i> {{ trans('main.save') }}</span></button>
						<button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
					</div>
				
			</div>
		</div>
	</div>
<div id="add-shipping" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">{{ trans('backend/shipping.create_new') }}</h4>
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
							<strong>{{trans('backend/shipping.ship_title')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control title" type="text" placeholder="{{trans('backend/shipping.ship_title')}}" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-3">
							<strong>{{trans('backend/shipping.ship_size')}} : </strong>
						</div>
						<div class="col-sm-3">
							<input class="form-control height" type="text" placeholder="{{trans('backend/shipping.height')}} (mm)" />
						</div>
						<div class="col-sm-3">
							<input class="form-control width" type="text" placeholder="{{trans('backend/shipping.width')}} (mm)" />
						</div>
						<div class="col-sm-3">
							<input class="form-control length" type="text" placeholder="{{trans('backend/shipping.length')}} (mm)" />
						</div>

					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.ship_pay')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control payload" type="number" placeholder="{{trans('backend/shipping.ship_pay')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.ship_pal')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control pallet" type="number" placeholder="{{trans('backend/shipping.ship_pal')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.min_packets')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control min_packets" type="number" placeholder="{{trans('backend/shipping.min_packets')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.img')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="file" type="file" name="file" id="image" />
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
<div id="edit-shipping" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">{{ trans('backend/shipping.editone') }}</h4>
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
							<strong>{{trans('backend/shipping.ship_title')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control title" type="text" placeholder="{{trans('backend/shipping.ship_title')}}" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-3">
							<strong>{{trans('backend/shipping.ship_size')}} : </strong>
						</div>
						<div class="col-sm-3">
							<input class="form-control height" type="text" placeholder="{{trans('backend/shipping.height')}}" (mm)/>
						</div>
						<div class="col-sm-3">
							<input class="form-control width" type="text" placeholder="{{trans('backend/shipping.width')}} (mm)" />
						</div>
						<div class="col-sm-3">
							<input class="form-control length" type="text" placeholder="{{trans('backend/shipping.length')}} (mm)" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.ship_pay')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control payload" type="number" placeholder="{{trans('backend/shipping.ship_pay')}} (Kg)" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.ship_pal')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control pallet" type="number" placeholder="{{trans('backend/shipping.ship_pal')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.min_packets')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control min_packets" type="number" placeholder="{{trans('backend/shipping.min_packets')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.img')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="file" type="file" name="file" id="image2" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.is_active')}} : </strong>
						</div>
						<div class="col-sm-8">
							<select class="select2 form-control">
	                        		<option value="1">Yes</option>
	                        		<option value="0">No</option>
	                        	</select>
						</div>

					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ trans('main.save') }}</button>
				<button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
			</div>

		</div>
	</div>
</div>
	@include('backend.adminlte.shipping.inc.nav')

<div class="tab-content">
	<div id="home" class="tab-pane active in">
		<div class="pag">
			<div class="row" style="margin-bottom: -35px;margin-right: 2px;">
				<button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
			</div>
			<table id="vehiclesTable" class="table table-hover daTatable dataTable deleteFormModal text-center" data-form="deleteForm"
			 id="users-table">
				<thead>
					<tr style="background-color: #EEE;">
						<th>{{ trans('main.no#') }}</th>
						<th>{{trans('backend/shipping.img')}}</th>
						<th>{{trans('backend/shipping.ship_title')}}</th>
						<th>{{trans('backend/shipping.height')}}</th>
						<th>{{trans('backend/shipping.width')}}</th>
						<th>{{trans('backend/shipping.length')}}</th>
						<th>{{trans('backend/shipping.ship_pay')}}</th>
						<th>{{trans('backend/shipping.ship_pal')}}</th>
						<th>{{trans('backend/shippingDiscount.min_person')}}</th>
						<th>{{trans('backend/shippingDiscount.max_person')}}</th>
						<th>{{trans('backend/shipping.min_packets')}}</th>
						<th>{{trans('backend/shipping.is_active')}}</th>
						<th>{{trans('main.action')}}</th>
					</tr>
				</thead>

				<tbody>
					<script>
						window.costs = {}
							
					</script>
					<?php $i=0; ?> @foreach($data as $row)
					<tr class="selected{{$row->id}}" data-id="{{$row->id}}">
						<td>{{++$i}}</td>
						<script>
							window.costs[{{$row->id}}] = {!!json_encode($row->costs)!!};
						</script>
						<?php 
							$relation = \App\Models\Backend\ShippingSpec::where('ship_id',$row->id)->first();
						?>

						<td class="image"><img src="{{asset('images/shippings')."/".$row->img}}" style="height: 75px ;width: 75px;"></td>
						<td class="title">{{$row->title}}</td>
						<td class="height">{{$row->height}}</td>
						<td class="width">{{$row->width}}</td>
						<td class="length">{{$row->length}}</td>
						<td class="payload">{{$row->pay_load_max}}</td>
						<td class="pallet">{{$row->palletspaces}}</td>
						
						@if(isset($relation))
						<td class="min_person" data-val="{{$relation->min_person}}">
							@for ($i = 0; $i < $relation->min_person ; $i++)
							<span class="back"></span>
							@endfor
						</td>

						<td class="max_person" data-val="{{$relation->max_person}}">
							@for ($i = 0; $i < $relation->max_person ; $i++)
							<span class="back"></span>
							@endfor
						</td>
						@else
						<td></td>
						<td></td>
						@endif
						
						<td class="min_packets">{{$row->min_packets}}</td>
						<?php $class= ''; ?> @if($row->is_active == 1)
						<?php $class= 'check'; ?> @else
						<?php $class= 'times'; ?> @endif
						<td class="is_active" value="{{$row->is_active}}"><i class="fa fa-{{$class}}"></i></td>
						<td>
							<button class="btn btn-success edit" value="{{$row->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>

							<button type="submit" class="btn btn-danger delete" value="{{$row->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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
		</div>
	</div>
</div>
<div id="hidden-table" style="display:none">
		<div class="row" style="margin-bottom: -35px;margin-right: 2px;">
                <button type="button" style="margin-top:10px;height:30px;line-height:30px;" class="btn btn-success btn-circle pull-right addNewCost" value="CostIdForAdding"><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
        </div>
		<table class="table table-hover daTatable dataTable deleteFormModal text-center " data-form="deleteForm" id="costs-table-CostIdForAddingg">
				<thead>
					<tr style="background-color: #EEE;">
						<th>{{ trans('main.no#') }}</th>
						<th>
							{{trans('backend/shipping.distance')}}
							<a class="btn btn-primary btn-xs" href="{{ route('shipping.distance') }}">
								<i class="fa fa-pencil-alt"></i>
							</a>
						</th>
						<th>{{trans('backend/shipping.cost_per_kilo')}}</th>
						<th>{{trans('backend/shipping.min_cost')}}</th>
						<th>{{trans('backend/shipping.is_active')}}</th>
						<th>{{trans('main.action')}}</th>
					</tr>
				</thead>
	
				<tbody>
					
				</tbody>    
				
			</table>
</div>
@section('styles')
<style type="text/css">
	#vehiclesTable.table >tbody> tr>td {
		padding-top: 35px;
	}

	table#vehiclesTable > tbody> tr> td:nth-of-type(2) {
		padding-top: 10px;
	}

	table#vehiclesTable > tbody> tr> td:last-of-type .btn {
		padding: 0 5px;
	}

	table#vehiclesTable > tbody> tr> td:last-of-type .btn:first-of-type {
		padding: 0 10px;
	}
	tr.slight-padding td.slight-padding{
		padding: 0 10px !important;
	}
	.select2{
		width: 100% !important;
	}
	span.back {
		background:  url("{{ asset('/img/box.png') }}");
		background-size: 20px 20px;
		background-repeat: no-repeat;
		width: 20px;
		height: 20px;
		display: inline-block;
	}
</style>
	@include('backend.adminlte.layouts.modals.confirm_delete')
<script type="text/javascript">
	$(function(){
		var l = $('.ladda-button').ladda();
		var l2 = $('.ladda-button.ladda-button2').ladda();

		var table = $('#vehiclesTable').DataTable({
			"pageLength": 5,
			'language': {
				paginate: {
					next: '<span class="fas fa-angle-right"></span>',
					previous: '<span class="fas fa-angle-left"></span>'
				}
			}
		});
		$('#vehiclesTable tbody').on('click', 'tr', function (e) {
			var tr = $(this)
			
			var row = table.row(tr);
			if (tr.data('id')) {



				if (row.child.isShown()) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				} else {
					// Open this row
					row.child(format(tr.data('id')), 'no-padding slight-padding').show();
					tr.addClass('shown');
					activateLisenters()
					tableListnerst();
					var newTable = $('#costs-table-' + tr.data('id')).DataTable({
						"pageLength": 5,
						'language': {
							paginate: {
								next: '<span class="fas fa-angle-right"></span>',
								previous: '<span class="fas fa-angle-left"></span>'
							}
						}
					});
					
				}
			}
		});
		function format(data){
			var html = $('#hidden-table').html();
			var html = html.replace('CostIdForAdding',data)
			var html = html.replace('CostIdForAddingg',data)
			htmlArray = html.split('<tbody>');
				html = htmlArray[0] +'<tbody>';
				var i=0;
			window.costs[data].forEach(function(row){
				i+=1;
				var isActiveClass= ''; 
				if(row['is_active'] == 1)
				isActiveClass= 'check'; 
				else
				isActiveClass= 'times'; 
				html+='<tr data-costid="'+row['id']+'" class="selectedShipping selectedShipping'+row['id']+'">'+
					'<td>'+i+'</td>'+
					'<td data-costid="'+row['id']+'" data-inputname="shipid" value="'+row['shipping_distance']['id']+'">'+row['shipping_distance']['min']+' - '+row['shipping_distance']['max']+'</td>'+
					'<td data-costid="'+row['id']+'" data-inputname="costPerKilo" value="'+row['cost_per_kilo']+'">'+row['cost_per_kilo']+'</td>'+
					'<td data-costid="'+row['id']+'" data-inputname="minCost" value="'+row['min_cost']+'">'+row['min_cost']+'</td>'+
					'<td data-costid="'+row['id']+'" class="is_active" data-inputname="isActive" value="'+row['is_active']+'"><i class="fa fa-'+isActiveClass+'"></i></td>'+
					'<td ><button type="submit" class="btn btn-danger deleteCost" value="'+row['id']+'"><i class="fa fa-close"></i>{{trans('main.delete')}}</button></td>'
					'</tr>'
			})
			html += htmlArray[1];
			return html;
		}
		function activateLisenters(){
			$('.selectedShipping td').dblclick(function(){
				var td = $(this)
				if($(this).html().indexOf('edit-button-active')!==-1){
					return false;
				}
				var edit = {
					shipid:shipid,
					costPerKilo:costPerKilo,
					minCost:minCost,
					isActive:isActive,
				}
				if(edit[td.data('inputname')]){
					edit[td.data('inputname')](td);
				}
			})
		}
		window.shipsDistances = {!!json_encode($ships)!!};
		function isActive(td){
			var checked = td.attr('value')==="1"?'checked':'';
			var active ='<div class="checkbox">'+
				'<label><input type="checkbox" '+checked+' id="isActive'+td.data('costid')+'" value="'+td.attr('value')+'" >{{trans('backend/shipping.is_active')}}</label>'
				+'</div>'+getButtonSave('isActive'+td.data('costid'))
				td.html(active)
				$('#'+'isActive'+td.data('costid')).change(function(e){
					
					$(this).attr('value',$(this).is(':checked')?1:0);
				})
				watchForChanges('isActive'+td.data('costid')+'Button','isActive'+td.data('costid'),'is_active',td.data('costid'))
				$('#isActive'+td.data('costid')+'Button').on('savedToDataBase',function(e){
					td.attr('value',$('#isActive'+td.data('costid')).val())
					var className = $('#isActive'+td.data('costid')).val()==='1' ? 'check':'times'
					td.html('<i class="fa fa-'+className+'"></i>')
					// td.text()
				})
			}
		function minCost(td){
			var cost = '<input type="text" id="minCost'+td.data('costid')+'" class="form-control" value="'+td.attr('value')+'">'
			+getButtonSave('minCost'+td.data('costid'));
			td.html(cost);
			watchForChanges('minCost'+td.data('costid')+'Button','minCost'+td.data('costid'),'min_cost',td.data('costid'))
			$('#minCost'+td.data('costid')+'Button').on('savedToDataBase',function(e){
				td.attr('value',$('#minCost'+td.data('costid')).val())
				td.text($('#minCost'+td.data('costid')).val())
			})
		}
		function costPerKilo(td){
			var cost = '<input type="text" id="costPerKilo'+td.data('costid')+'" class="form-control" value="'+td.attr('value')+'">'
			+getButtonSave('costPerKilo'+td.data('costid'));
			td.html(cost);
			watchForChanges('costPerKilo'+td.data('costid')+'Button','costPerKilo'+td.data('costid'),'cost_per_kilo',td.data('costid'))
			$('#costPerKilo'+td.data('costid')+'Button').on('savedToDataBase',function(e){
				td.attr('value',$('#costPerKilo'+td.data('costid')).val())
				td.text($('#costPerKilo'+td.data('costid')).val())
			})
		}
		function shipid(td){
			var ships = '<select id="selectShip'+td.data('costid')+'">'
						@foreach($ships as $ship)
						+'<option value="{{$ship->id}}">{{$ship->min}} - {{$ship->max}}</option>'
						@endforeach
						+'</select>'+getButtonSave('selectShip'+td.data('costid'));
			td.html(ships);
			var select2 = $('#selectShip'+td.data('costid')).select2({
				placeholder:  {
                    id: '-1', // the value of the option
                    text: '{{trans('backend/shipping.status')}}'
                  }
			});
			$('#selectShip'+td.data('costid')).val(td.attr('value')).trigger('change');
			watchForChanges('selectShip'+td.data('costid')+'Button','selectShip'+td.data('costid'),'distance_id',td.data('costid'))
			
			$('#'+'selectShip'+td.data('costid')+'Button').on('savedToDataBase',function(e){
				td.attr('value',$('#selectShip'+td.data('costid')).val())
				var shipping_distance = {}
				
				shipsDistances.forEach(function(e){
					if(e.id===parseInt( $('#selectShip'+td.data('costid')).val()) ){
						shipping_distance = e;
					}
				})
				td.html(shipping_distance['min']+' - '+shipping_distance['max'])
			})
		}
		function getButtonSave(id){
			return '<button id="'+id+'Button" class="btn edit-button-active btn-xs btn-primary" style="margin-left:5px;"><i class="fa fa-save" style="color:#ffffff;margin-right:0"></button>'
		}
		function tableListnerst(){
			$(document).on('click', '.deleteCost', function () {
				$('#confirm-delete').modal('show');
				var id = $(this).attr('value');

				$(document).on('click', '#confirm-delete .btn-danger', function (e) {

					e.preventDefault();
					e.stopPropagation();
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: "{{route('shipping.destroyCost')}}",
						type: 'POST',
						data: {
							'_token': $('input[name="_token"]').val(),
							'id': id,
						},
						success: function (data) {

							$.notify("Deleted successfully \n Shipping Cost Deleted Successfully", {
								position: "top right",
								className: "success"
							});
							$('#confirm-delete').modal('hide');
							$('.selectedShipping' + id).remove();
							close();
						},
						error: function (data) {
							$.notify("Whoops \n Error may be in connection to server", {
								position: "top right",
								className: "error"
							});
						}

					});

				});

			});
			$(document).on('click','.addNewCost',function(){
				console.log($(this).val());
				$('#add-shipping-cost #addTypes').val($(this).val());
				console.log($('#add-shipping-cost #addTypes option:selected').val())
				$('#add-shipping-cost').modal('show');
			});
		}

		$('#add-shipping-cost').on('click', '.btn-success', function (e) {
			e.preventDefault();
			e.stopPropagation();
	        $('.ladda-button2').ladda('start');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('shipping.storeCost')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'type_id': $('#add-shipping-cost #addTypes option:selected').val(),
					'distance_id': $('#add-shipping-cost .distances option:selected').val(),
					'cost_per_kilo': $('#add-shipping-cost .cost_per_kilo').val(),
					'min_cost': $('#add-shipping-cost .min_cost').val(),
					'is_active': 1,
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
                    		$('.ladda-button2').ladda('stop');
                  		},2000);
					} else if (data == 1) {
						$.notify("Saved successfully \n Shipping Cost Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
                    		$('.ladda-button2').ladda('stop');
                    		location.reload();
						}, 2000);
						$('#add-shipping-cost').modal('hide');
					}
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					setTimeout(function () {
                    	$('.ladda-button2').ladda('stop');
					}, 2000)
	 
				}

			});
		});
		function watchForChanges(id,inputId,query,costid){
			$('#'+id).click(function(e){
				$(this).attr('disabled',true);
				saveDataAndReturn(id,inputId,query,costid)
			})
		}
		function saveDataAndReturn(id,inputId,query,costid){
			var $formData = new FormData();
			$formData.append(query,$('#'+inputId).val());
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				url:"{{route('shipping.millistone',['ship'=>'ShipToBeEditedWithMillistone'])}}"
					.replace('ShipToBeEditedWithMillistone',costid),
				type: 'POST',
				data: $formData,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (data) {
					if (isNaN(data)) {
						$.each(data['errors'], function (i, item) {
							$.notify("Whoops \n" + item, {
								position: "top right",
								className: "error"
							});
							$('#'+id).removeAttr('disabled');
						});
					} else if (data == 1) {
						$.notify("Saved successfully \n Shipping Type Saved Successfully", {
							position: "top right",
							className: "success"
						});
						$('#'+id).removeAttr('disabled');
						$('#'+id).trigger('savedToDataBase')
					}
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					$('#'+id).removeAttr('disabled');
				}

			});
		}
		$('.select2').prop('selectedIndex',-1);
		$('.select2.form-control').select2({
			placeholder:  {
                    id: '-1', // the value of the option
                    text: '{{trans('backend/shipping.distances')}}'
                  }
		})

		$(document).on('click','.add',function(){
			$('#add-shipping').modal('toggle');
		});

		$('#add-shipping').on('click','.btn-success',function(e){
	        e.preventDefault();
	        e.stopPropagation();
	        $('.ladda-button').ladda('start');

	        var $file = document.getElementById('image'),
	        $formData = new FormData();

	        if ($file.files.length > 0) {
	           for (var i = 0; i < $file.files.length; i++) {
	              $formData.append('image', $file.files[i]);
	           }
	        }
	        $formData.append('title',$('#add-shipping .title').val());
	        $formData.append('height',$('#add-shipping .height').val());
	        $formData.append('width',$('#add-shipping .width').val());
	        $formData.append('length',$('#add-shipping .length').val());
	        $formData.append('payload',$('#add-shipping .payload').val());
	        $formData.append('pallet',$('#add-shipping .pallet').val());
	        $formData.append('min_packets',$('#add-shipping .min_packets').val());
	        $formData.append('is_active',1);

	        $.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });

	        $.ajax({
	           url: "{{route('shipping.store')}}",
	           type: 'POST',
	           data: $formData ,
	           dataType: 'json',
	           contentType: false,
	           processData: false,
	           success: function (data) {
	            if (isNaN(data)){
	              $.each(data['errors'], function(i, item) { 
	                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});	                
	              });            
	              setTimeout(function () {
                    	$('.ladda-button').ladda('stop');
                  	},2000);
	            }else if(data==1){
	              	$.notify("Saved successfully \n Shipping Type Saved Successfully",{ position:"top right" ,className:"success"});
	             	setTimeout(function () {
                    	$('.ladda-button').ladda('stop');
                  	},2000);
	            	$('#add-shipping').modal('hide');	
	            } 
	           },        
	           error: function(data){
	            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
	            setTimeout(function () {
                    $('.ladda-button').ladda('stop');
                },2000);
	          }

	         });
	    });



		$(document).on('click','.edit',function(){
			$('#edit-shipping').modal('toggle');
			var id = $(this).attr('value');
			parent = $('tr.selected'+id);

			$('#edit-shipping .title').val(parent.children('td.title').text());
			$('#edit-shipping .height').val(parent.children('td.height').text());
			$('#edit-shipping .width').val(parent.children('td.width').text());
			$('#edit-shipping .length').val(parent.children('td.length').text());
			$('#edit-shipping .payload').val(parent.children('td.payload').text());
			$('#edit-shipping .pallet').val(parent.children('td.pallet').text());
			$('#edit-shipping .min_packets').val(parent.children('td.min_packets').text());
			$('#edit-shipping .select2').val(parent.children('td.is_active').attr('value')).trigger('change');

			$('#edit-shipping .btn-success').on('click',function(e){

				e.preventDefault();
				e.stopPropagation();
				
				var $file = document.getElementById('image2'),
		        $formData = new FormData();

		        if ($file.files.length > 0) {
		           for (var i = 0; i < $file.files.length; i++) {
		              $formData.append('image', $file.files[i]);
		           }
		        }
		        $formData.append('id',id);
		        $formData.append('title',$('#edit-shipping .title').val());
		        $formData.append('height',$('#edit-shipping .height').val());
		        $formData.append('width',$('#edit-shipping .width').val());
		        $formData.append('length',$('#edit-shipping .length').val());
		        $formData.append('payload',$('#edit-shipping .payload').val());
		        $formData.append('pallet',$('#edit-shipping .pallet').val());
		        $formData.append('pallet',$('#edit-shipping .min_packets').val());
		        $formData.append('is_active',$('#edit-shipping select option:selected').val());

		        $.ajaxSetup({
		          headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		          }
		        });
		        $.ajax({
		           url: "{{route('shipping.edit')}}",
		           type: 'POST',
		           data: $formData ,
		           dataType: 'json',
		           contentType: false,
		           processData: false,
		           success: function (data) {
		            if (isNaN(data)){
		              $.each(data['errors'], function(i, item) { 
		                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
		              });            
		            }else if(data==1){
		              $.notify("Updated successfully \n Shipping Type Updated Successfully",{ position:"top right" ,className:"success"});
		              setTimeout(function () {
		                  location.reload();
		              },2000)
		            } 
		           },        
		           error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		          }

		         });

			});

		});


		$(document).on('click','.delete',function(){
			$('#confirm-delete').modal('toggle');
			var id = $(this).attr('value');

			$(document).on('click','#confirm-delete .btn-danger' ,function(e){

				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
		          headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		          }
		        });
		        $.ajax({
		           url: "{{route('shipping.destroy')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Shipping Type Deleted Successfully",{ position:"top right" ,className:"success"});
		              $('#confirm-delete').modal('toggle');
		              $('.selected'+id).remove();
		              close();
		           },        
		           error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		          }

		         });

			});

		});

		



		

		


		

	});

</script>
@endsection

@endsection