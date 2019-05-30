@extends('backend.adminlte.layouts.app')
@section('htmlheader_title')
    {{ trans('backend/shipping.title') }}
@endsection

@section('contentheader_title')
{{ trans('backend/shipping.title') }}
@endsection

@section('contentheader_description')
 {{ trans('backend/shipping.title') }}
@endsection


@section('previous_breadcrumb')
{{ trans('backend/shipping.title') }}
@endsection

<!--breadcrumb current page-->
@section('current_breadcrumb')
{{ trans('backend/shipping.distance') }}
@endsection



@section('main-content')

<div id="add-shipping-distance" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" >{{ trans('backend/shipping.create_distance') }}</h4>
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
	                            <strong>{{trans('backend/shipping.min')}} : </strong>
	                        </div>
	                        <div class="col-sm-8">
	                        	<input class="form-control min" type="number" placeholder="{{trans('backend/shipping.min')}}" min="0" />
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <div class="col-sm-4">
	                            <strong>{{trans('backend/shipping.max')}} : </strong>
	                        </div>
	                        <div class="col-sm-8">
	                        	<input class="form-control max" type="number" placeholder="{{trans('backend/shipping.max')}}" min="0" />
	                        </div>
	                    </div>
	                </div>
	           	</div>
	           	<div class="modal-footer" style="margin-top: 100px;">
	                <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"><span class="ladda-label"> <i class="fa fa-save"></i> {{ trans('main.save') }}</span></button>
	                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
	            </div>
    		
    	</div>
    </div>
</div>
<div id="edit-shipping-distance" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" >{{ trans('backend/shipping.editone2') }}</h4>
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
	                            <strong>{{trans('backend/shipping.min')}} : </strong>
	                        </div>
	                        <div class="col-sm-8">
	                        	<input class="form-control min" type="number" placeholder="{{trans('backend/shipping.min')}}" min="0" />
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                        <div class="col-sm-4">
	                            <strong>{{trans('backend/shipping.max')}} : </strong>
	                        </div>
	                        <div class="col-sm-8">
	                        	<input class="form-control max" type="number" placeholder="{{trans('backend/shipping.max')}}" min="0" />
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
	           	<div class="modal-footer" style="margin-top: 160px;">
	                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ trans('main.save') }}</button>
	                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
	            </div>
    		
    	</div>
    </div>
</div>


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
	                <th>{{trans('backend/shipping.min')}}</th>
	                <th>{{trans('backend/shipping.max')}}</th>
	                <th>{{trans('backend/shipping.is_active')}}</th>
	                <th>{{trans('main.action')}}</th>
	            </tr>
            </thead>

            <tbody>
            	<?php $i=0; ?>
            	@foreach($data as $row)
            	<tr class="selected{{$row->id}}">
            		<td>{{++$i}}</td>
            		<td class="min">{{$row->min}}</td>
            		<td class="max">{{$row->max}}</td>
            		<?php $class= ''; ?>
            		@if($row->is_active == 1)
            		<?php $class= 'check'; ?>
            		@else
            		<?php $class= 'times'; ?>
            		@endif
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
</style>
@include('backend.adminlte.layouts.modals.confirm_delete')  
@include('backend.adminlte.layouts.partials.scripts')
<script type="text/javascript">
	$(function(){
		var l = $('.ladda-button').ladda();

		$('.prev').toggle();
		$('.prev a').attr('href','{{route('shipping.index')}}')


		$('.select2').prop('selectedIndex',-1);
		$('.select2.form-control').select2({
			placeholder:  {
                    id: '-1', // the value of the option
                    text: '{{trans('backend/shipping.status')}}'
                  }
		})

		$(document).on('click','.add',function(){
			$('#add-shipping-distance').modal('toggle');
		});

		$('#add-shipping-distance').on('click','.btn-success',function(e){
	        e.preventDefault();
	        e.stopPropagation();
	        $('.ladda-button').ladda('start');
	    	
	        $.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });
	        $.ajax({
	           url: "{{route('shipping.storeDist')}}",
	           type: 'POST',
	           data: {
	           		'_token': $('input[name="_token"]').val(),
	           		'min': $('#add-shipping-distance .min').val(),
	           		'max': $('#add-shipping-distance .max').val(),
	           		'is_active': 1,
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
	              	$.notify("Saved successfully \n Shipping Distance Saved Successfully",{ position:"top right" ,className:"success"});
	              	setTimeout(function () {
                    	$('.ladda-button').ladda('stop');
                    		location.reload();
					}, 2000);
					$('#add-shipping-distance').modal('hide');
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
			$('#edit-shipping-distance').modal('toggle');
			var id = $(this).attr('value');
			parent = $('tr.selected'+id);

			$('#edit-shipping-distance .min').val(parent.children('td.min').text());
			$('#edit-shipping-distance .max').val(parent.children('td.max').text());
			$('#edit-shipping-distance .select2').val(parent.children('td.is_active').attr('value')).trigger('change');

			$('#edit-shipping-distance .btn-success').on('click',function(e){

				e.preventDefault();
				e.stopPropagation();

		        $.ajaxSetup({
		          headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		          }
		        });
		        $.ajax({
		           url: "{{route('shipping.editDist')}}",
		           type: 'POST',
		           data: {
		           		'_token': $('input[name="_token"]').val(),
		           		'id': id,
		           		'min': $('#edit-shipping-distance .min').val(),
		           		'max': $('#edit-shipping-distance .max').val(),
		           		'is_active': $('#edit-shipping-distance select option:selected').val(),
		           } ,
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
		           url: "{{route('shipping.destroyDist')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Shipping Distance Deleted Successfully",{ position:"top right" ,className:"success"});
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
