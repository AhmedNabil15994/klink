@extends('backend.adminlte.layouts.app')
@section('htmlheader_title')
{{ trans('backend/shipping.title') }}
@endsection

@section('contentheader_title')
{{ trans('backend/shipping.title') }}
@endsection

@section('contentheader_description')
{{ trans('backend/shippingDiscount.spec') }}
@endsection


<!--breadcrumb current page-->
@section('current_breadcrumb')
{{ trans('backend/shippingDiscount.spec') }}
@endsection



@section('main-content')

<div id="add-shipping-spec" class="modal fade">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title" >{{ trans('backend/shippingDiscount.create_spec') }}</h4>
			</div>    
			<div class="modal-body">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.title')}} : </strong>
						</div>
						<div class="col-sm-8">
							<select id="addTypes" class="select2 form-control types">
								@foreach($types as $type)
								<option value="{{$type->id}}">{{$type->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.min_time')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control min_time" type="number" placeholder="{{trans('backend/shippingDiscount.min_time')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.max_time')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control max_time" type="number" placeholder="{{trans('backend/shippingDiscount.max_time')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.cost_per')}} (1 Min) : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control cost_per_unit" type="number" placeholder="{{trans('backend/shippingDiscount.cost_per')}} (1 Min)" min="0" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.min_person')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control min_person" type="number" placeholder="{{trans('backend/shippingDiscount.min_person')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.max_person')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control max_person" type="number" placeholder="{{trans('backend/shippingDiscount.max_person')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.cost_per_person')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control cost_per_person" type="number" placeholder="{{trans('backend/shippingDiscount.cost_per_person')}}" min="0" />
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success ladda-button" data-style="expand-right"><span class="ladda-label"> <i class="fa fa-save"></i> {{ trans('main.save') }}</span></button>
				<button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
			</div>

		</div>
	</div>
</div>
<div id="edit-shipping-spec" class="modal fade">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title" >{{ trans('backend/shipping.editone2') }}</h4>
			</div>    
			<div class="modal-body">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shipping.title')}} : </strong>
						</div>
						<div class="col-sm-8">
							<select class="select2 form-control types">
								@foreach($types as $type)
								<option value="{{$type->id}}">{{$type->title}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.min_time')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control min_time" type="number" placeholder="{{trans('backend/shippingDiscount.min_time')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.max_time')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control max_time" type="number" placeholder="{{trans('backend/shippingDiscount.max_time')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.cost_per')}} (1 Min) : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control cost_per_unit" type="number" placeholder="{{trans('backend/shippingDiscount.cost_per')}} (1 Min)" min="0" />
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.min_person')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control min_person" type="number" placeholder="{{trans('backend/shippingDiscount.min_person')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.max_person')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control max_person" type="number" placeholder="{{trans('backend/shippingDiscount.max_person')}}" min="0" />
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/shippingDiscount.cost_per_person')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control cost_per_person" type="number" placeholder="{{trans('backend/shippingDiscount.cost_per_person')}}" min="0" />
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success ladda-button ladda-button2" data-style="expand-right">
					<span class="ladda-label"><i class="fa fa-save"></i> {{trans('main.save')}}</span>
				</button>
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
			<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
				<thead>
					<tr style="background-color: #EEE;">
						<th>{{ trans('main.no#') }}</th>
						<th>{{trans('backend/shipping.title')}}</th>
						<th>{{trans('backend/shippingDiscount.min_time')}}</th>
						<th>{{trans('backend/shippingDiscount.max_time')}}</th>
						<th>{{trans('backend/shippingDiscount.cost_per')}} (1 Min)</th>
						<th>{{trans('backend/shippingDiscount.cost_per_person')}}</th>
						<th>{{trans('backend/shipping.is_active')}}</th>
						<th>{{trans('main.action')}}</th>
					</tr>
				</thead>

				<tbody>
					<?php $i=0; ?>
					@foreach($data as $row)
					<?php 
					$ship = \App\Models\Backend\Shipping::find($row->ship_id);
					?>
					<tr class="selected{{$row->id}}">
						<td>{{++$i}}</td>

						<td class="ship_id" data-val="{{$row->ship_id}}"><img src="{{ asset('images/shippings') }}/{{$ship->img}}" alt="{{$ship->title}}">{{$ship->title}}</td>
						<td class="min_load_time" data-val="{{$row->min_load_time}}">{{$row->min_load_time}} Min</td>

						<td class="max_load_time" data-val="{{$row->max_load_time}}">{{$row->max_load_time}} Min</td>

						<td class="cost_per_unit" data-val="{{$row->cost_per_unit}}">{{$row->cost_per_unit}} €</td>
						
						<input type="hidden" name="min_person" class="min_person" data-val="{{$row->min_person}}">
						<input type="hidden" name="max_person" class="max_person" data-val="{{$row->max_person}}">

						

						<td class="cost_per_person" data-val="{{$row->cost_per_person}}">{{$row->cost_per_person}} €</td>

						<td>
							@if($row->is_active == 1)
							<i class="fa fa-check"></i>
							@else
							<i class="fa fa-times"></i>
							@endif
						</td>

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
				.dataTables_wrapper .row:first-of-type{
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
@section('scripts')
<style type="text/css">
	table tbody tr td:last-of-type .btn{
		padding: 0 5px;
	}
	table tbody tr td:last-of-type .btn:first-of-type{
		padding: 0 10px;
	}
	table tbody tr td:last-of-type{
		width: 200px !important;
	}
	.select2{
		width: 100% !important;
	}
	
	td img{
		height: 35px;
		width: 35px;
		border-radius: 50%;
	}	
</style>
@include('backend.adminlte.layouts.modals.confirm_delete')  
@include('backend.adminlte.layouts.partials.scripts')
<script type="text/javascript">
	$(function(){
		var l = $('.ladda-button').ladda();
		var l2 = $('.ladda-button.ladda-button2').ladda();

		

		$('.select2').prop('selectedIndex',-1);
		$('.select2.form-control').select2({
			placeholder:  {
                    id: '-1', // the value of the option
                    text: '{{trans('backend/shipping.title')}}'
                }
            })

		$(document).on('click','.add',function(){
			$('#add-shipping-spec').modal('toggle');
		});

		$('#add-shipping-spec').on('click','.btn-success',function(e){
			e.preventDefault();
			e.stopPropagation();
			$('.ladda-button').ladda('start');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('shipping.storeSpec')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'ship_id': $('#add-shipping-spec #addTypes option:selected').val(),
					'min_time': $('#add-shipping-spec .min_time').val(),
					'max_time': $('#add-shipping-spec .max_time').val(),
					'cost_per_unit': $('#add-shipping-spec .cost_per_unit').val(),
					'min_person': $('#add-shipping-spec .min_person').val(),
					'max_person': $('#add-shipping-spec .max_person').val(),
					'cost_per_person': $('#add-shipping-spec .cost_per_person').val(),
				} ,
				success: function (data) {
					if (isNaN(data)){
						$.each(data['errors'], function(i, item) { 
							$.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
						});       
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						},2000);     
					}else if(data==1){
						$.notify("Saved successfully \n Shipping Specifications Saved Successfully",{ position:"top right" ,className:"success"});
						$('#add-shipping-spec').modal('hide');
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
					}	 
				},        
				error: function(data){
					$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					setTimeout(function () {
						$('.ladda-button').ladda('stop');
					}, 2000)
				}

			});
		});



		$(document).on('click','.edit',function(){
			$('#edit-shipping-spec').modal('toggle');

			var id = $(this).attr('value');
			parent = $('tr.selected'+id);

			$('#edit-shipping-spec .min_time').val(parent.children('td.min_load_time').data('val'));
			$('#edit-shipping-spec .max_time').val(parent.children('td.max_load_time').data('val'));
			$('#edit-shipping-spec .cost_per_unit').val(parent.children('td.cost_per_unit').data('val'));
			$('#edit-shipping-spec .min_person').val(parent.children('input.min_person').data('val'));
			$('#edit-shipping-spec .max_person').val(parent.children('input.max_person').data('val'));
			$('#edit-shipping-spec .cost_per_person').val(parent.children('td.cost_per_person').data('val'));
			$('#edit-shipping-spec .select2').val(parent.children('td.ship_id').data('val')).trigger('change');

			$('#edit-shipping-spec .btn-success').on('click',function(e){
				$('.ladda-button2').ladda('start');

				e.preventDefault();
				e.stopPropagation();

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('shipping.editSpec')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'ship_id': $('#edit-shipping-spec .select2 option:selected').val(),
						'min_load_time': $('#edit-shipping-spec .min_time').val(),
						'max_load_time': $('#edit-shipping-spec .max_time').val(),
						'cost_per_unit': $('#edit-shipping-spec .cost_per_unit').val(),
						'min_person': $('#edit-shipping-spec .min_person').val(),
						'max_person': $('#edit-shipping-spec .max_person').val(),
						'cost_per_person': $('#edit-shipping-spec .cost_per_person').val(),
					} ,
					success: function (data) {
						if (isNaN(data)){
							$.each(data['errors'], function(i, item) { 
								$.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
							});        
							setTimeout(function () {
								$('.ladda-button2').ladda('stop');
							},2000);     
						}else if(data==1){
							$.notify("Updated successfully \n Shipping Specifications Updated Successfully",{ position:"top right" ,className:"success"});
							$('#edit-shipping-spec').modal('hide');
							setTimeout(function () {
								$('.ladda-button2').ladda('stop');
								location.reload();
							}, 2000);
						} 
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
						setTimeout(function () {
							$('.ladda-button2').ladda('stop');
						}, 2000)
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
					url: "{{route('shipping.destroySpec')}}",
					type: 'POST',
					data: {
						'_token' : $('input[name="_token"]').val(),
						'id'	: id,
					} ,
					success: function (data) {

						$.notify("Deleted successfully \n Shipping Specifications Deleted Successfully",{ position:"top right" ,className:"success"});
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
