@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
Packages
@endsection
 
@section('contentheader_title')
Packages
@endsection
 
@section('contentheader_description') 
Packages
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
Packages
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
							<th>Price (€)</th>
							<th>Monthly Price (€)</th>
							<th>Coupon (%)</th>
							<th>Discount (%)</th>
							<th>Feature</th>
							<th>Feature Type</th>
							<th>Feature Value</th>
							<th>Active</th>
							<th>{{trans('main.action')}}</th>
						</tr>
					</thead>

					<tbody>
						<?php $i = 0; ?>
						@foreach($data as  $package)

						<tr class="tab-row{{$package->id}}">
							<td>{{++$i}}</td>
							<td class="title">{{$package->title}}</td>
							<td class="price">{{$package->price}}</td>
							<td class="monthly_price">{{$package->monthly_price}}</td>
							<td class="coupon">{{$package->coupon}}</td>
							<td class="discount">{{$package->discount}}</td>
							<td>
								@foreach($package->features as $feature)
								{{$feature->title}} <br>
								@endforeach
							</td>
							<td>
								@foreach($package->features as $feature)
								{{$feature->type}} <br>
								@endforeach
							</td>
							<td>
								@foreach($package->features as $feature)
								{{$feature->value}} <br>
								@endforeach
							</td>
							<td class="is_active">{{$package->is_active}}</td>
							<td>
								<button type="submit" class="btn btn-success btn-xs edit" value="{{$package->id}}"><i class="fa fa-close"></i>{{trans('main.edit')}}</button>
								<button type="submit" class="btn btn-danger btn-xs delete" value="{{$package->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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
	@include('Package.Views.Packages.Modals.feature_value')
	@include('backend.adminlte.layouts.modals.confirm_delete')
	@include('Package.Views.Packages.Modals.add_package')
	@include('Package.Views.Packages.Modals.edit_package')
	@yield('scripts2')

<script type="text/javascript">
	$(function(){

		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();

		$("input[type=checkbox]").iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_minimal-blue'
		}); 

		$('.searchable').multiSelect({
	        selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
	        selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
	        afterInit: function(ms){
	            var that = this,
	                $selectableSearch = that.$selectableUl.prev(),
	                $selectionSearch = that.$selectionUl.prev(),
	                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
	                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';
	            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
	                .on('keydown', function(e){
	                    if (e.which === 40){
	                        that.$selectableUl.focus();
	                        return false;
	                    }
	                });

	            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
	                .on('keydown', function(e){
	                    if (e.which == 40){
	                        that.$selectionUl.focus();
	                        return false;
	                    }
	                });
	        },
	        afterSelect: function(values){
				$('#feature-value .btn-success').attr("value",values);
	            this.qs1.cache();
	            this.qs2.cache();
	        },
	        afterDeselect: function(){
	            this.qs1.cache();
	            this.qs2.cache();
	        }
	    });

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$(document).on('click','.add',function(){
			$('#add-package').modal('toggle');
		});

		$('#add-package .btn-success').on('click',function(){
			$('.ladda-button').ladda('start');
			var list = [];
			$('#add-package select.searchable option:selected').each(function(){
				var one = [$(this).val(),$(this).data('value'),$(this).data('type')];
				list.push(one);
			});

			$.ajax({
				url: "{{URL::to('/backend/packages/addPackage')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'title': $('#add-package input.title').val(),
					'price': $('#add-package input.price').val(),
					'monthly_price': $('#add-package input.monthly_price').val(),
					'coupon': $('#add-package input.coupon').val(),
					'discount': $('#add-package input.discount').val(),
					'features': list,
					'is_active': $('#add-package input.is_active').is(":checked") ? 1 : 0,
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
						$.notify("Saved successfully \n Package Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-package').modal('hide');
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
				url: "{{URL::to('/backend/packages/destroyPackage')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id': id,
				},
				success: function (data) {
					$.notify("Deleted successfully \n Package deleted Successfully", {
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

		$(document).on('click', '.edit', function () {
			var id = $(this).val();	
			var parent = $(this).parents('td');
			$('#edit-package .title').val(parent.siblings('td.title').text());
			$('#edit-package .price').val(parent.siblings('td.price').text());
			$('#edit-package .monthly_price').val(parent.siblings('td.monthly_price').text());
			$('#edit-package .coupon').val(parent.siblings('td.coupon').text());
			$('#edit-package .discount').val(parent.siblings('td.discount').text());
			var is_active = parent.siblings('td.is_active').text();
			if(is_active == 'Yes'){
				$('#edit-package .is_active').iCheck('check');
			}else{
				$('#edit-package .is_active').iCheck('uncheck');
			}

			$('#edit-package .btn-success').attr('value',id);
			$('#edit-package').modal('show');
		});

		$(document).on('click','li.ms-elem-selectable',function(){
			$("#feature-value input.value").hide();
			$('#feature-value').modal('toggle');
			$('#feature-value').css('zIndex',9999);
		});

		$(document).on('change','#feature-value select.feature_value',function(){
			var val = $(this).val();
			if(val == 2){
				$('#feature-value input.value').show(250);
			}else{
				$('#feature-value input.value').hide(250);
			}
		});

		$(document).on('click','#feature-value .btn-success' ,function(){
			var val = $('#feature-value select.feature_value option:selected').val();
			var id = $(this).val();
			var type = '';
			var feature_value = '';
			if(val == 2){
				feature_value = $('#feature-value input.value').val();
				type = 'text';
			}else{
				feature_value = val;
				type = 'bool';
			}
			$('#add-package select.searchable option[value="'+id+'"]').attr('data-value',feature_value);
			$('#add-package select.searchable option[value="'+id+'"]').attr('data-type',type);
			$('#feature-value').modal('hide');
		});

	});

</script>
@endsection

