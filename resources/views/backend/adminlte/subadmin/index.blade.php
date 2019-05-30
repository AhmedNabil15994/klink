@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/subadmin.title') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/subadmin.title') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/subadmin.title')
}}
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb') {{ trans('backend/subadmin.title') }}
@endsection
 
@section('main-content')

<style type="text/css">
	textarea{
	    max-width: 100%;
	    min-width: 100%;
	    min-height: 150px;
	    max-height: 150px;
	  }  

	 textarea.question{
	 	min-height: 75px;
	    max-height: 75px;
	 } 

	table tbody tr td:last-of-type .btn {
		padding: 0 5px;
	}

</style>

<div id="add-shipping" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">{{ trans('backend/subadmin.create_new') }}</h4>
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
							<strong>{{trans('backend/subadmin.company')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input type="text" name="company" class="company form-control" placeholder="{{trans('backend/subadmin.company')}}">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/subadmin.domain')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input type="text" name="domain" class="domain form-control" placeholder="{{trans('backend/subadmin.domain')}}">
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/subadmin.user')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input type="email" name="email" class="email form-control" placeholder="{{trans('backend/subadmin.email')}}">
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/subadmin.password')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input type="password" name="password" class="password form-control" placeholder="{{trans('backend/subadmin.password')}}">
						</div>
					</div>
				</div>
			

			</div>
			<div class="modal-footer" style="margin-top: 250px;">
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
			<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
			 id="users-table">
				<thead>
					<tr style="background-color: #EEE;">
						<th>{{ trans('main.no#') }}</th>
						<th>{{trans('backend/subadmin.user')}}</th>
						<th>{{trans('backend/subadmin.company')}}</th>
						<th>{{trans('backend/subadmin.domain')}}</th>
						<th>{{trans('main.action')}}</th>
					</tr>
				</thead>

				<tbody>
					<?php $i = 0; ?>
					@foreach($data as $one)
					
					<tr class="tab-row{{$one->id}}">
						<td>{{++$i}}</td>
						<td class="user" style="width:20% ">{{$one->email}}</td>
						<td class="company" style="width:20% ">{{$one->profile->company}}</td>
						<td class="user" style="width:20% ">{{@$one->links->website}}</td>
						
						<td>
							<a class="btn btn-success edit" href="#" value="{{$one->id}}" target="_blank"><i class="fa fa-sign-in-alt"></i> {{trans('backend/subadmin.view')}}</a>

							<button type="submit" class="btn btn-danger delete" value="{{$one->id}}"><i class="fa fa-trash"></i> {{trans('main.delete')}}</button>
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

@section('scripts')

	@include('backend.adminlte.layouts.modals.confirm_delete')
<script type="text/javascript">
	$(function(){
	
		$(document).on('click','.add',function(){
			$('#add-shipping').modal('toggle');
		});

		$('#add-shipping').on('click','.btn-success',function(e){
	        e.preventDefault();
	        e.stopPropagation();
	        $formData = new FormData();
	        $formData.append('company',$('#add-shipping .company').val());
	        $formData.append('domain',$('#add-shipping .domain').val());
	        $formData.append('email',$('#add-shipping .email').val());
	        $formData.append('password',$('#add-shipping .password').val());

	        
	        $.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });
	        $.ajax({
	           url: "{{route('subadmin.store')}}",
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
	              $.notify("Saved successfully \n Sub-admin Saved Successfully",{ position:"top right" ,className:"success"});
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
		           url: "{{route('subadmin.destroy')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Sub-admin Deleted Successfully",{ position:"top right" ,className:"success"});
		              $('#confirm-delete').modal('toggle');
		              $('.tab-row'+id).remove();
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