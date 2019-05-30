@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/question.title') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/question.title') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/question.title')
}}
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb') {{ trans('backend/question.title') }}
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
				<h4 class="modal-title">{{ trans('backend/question.create_new') }}</h4>
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
							<strong>{{trans('backend/question.question')}} : </strong>
						</div>
						<div class="col-sm-8">
							<textarea class="question form-control" placeholder="{{trans('backend/question.question')}}"></textarea>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/question.reply')}} : </strong>
						</div>
						<div class="col-sm-8">
							<textarea class="reply form-control" placeholder="{{trans('backend/question.reply')}}"></textarea>
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
<div id="edit-shipping" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">{{ trans('backend/question.view_question') }}</h4>
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
							<strong>{{trans('backend/question.user')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control user" type="text" placeholder="{{trans('backend/question.user')}}" disabled/>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/question.question')}} : </strong>
						</div>
						<div class="col-sm-8">
							<input class="form-control question" type="text" placeholder="{{trans('backend/question.question')}}" disabled/>
						</div>
					</div>
				</div>
				
				
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-4">
							<strong>{{trans('backend/question.reply')}} : </strong>
						</div>
						<div class="col-sm-8">
							<textarea placeholder="{{trans('backend/question.reply')}}" class="form-control reply"></textarea>
						</div>
					</div>
				</div>
				
			</div>
			<div class="modal-footer" style="margin-top: 270px;">
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
						<th>{{trans('backend/question.user')}}</th>
						<th>{{trans('backend/question.question')}}</th>
						<th>{{trans('backend/question.reply')}}</th>
						<th>{{trans('main.action')}}</th>
					</tr>
				</thead>

				<tbody>
					<?php $i = 0; ?>
					@foreach($data as $one)
					<?php 
						$name ='';
						if($one->user_id != 0){
							$profile = \DB::table('user_profiles')->where('user_id','=',$one->user_id)->first();
							$name = $profile->first_name.' '.$profile->last_name;
						}elseif($one->user_id == 0 && $one->name == ''){
                            $name ='Admin';
                        }elseif($one->user_id == 0 && $one->name != '') {
                            $name = $one->name."<br>"."< ".$one->email." >";
                        }
						
						$reply = '';
						if($one->reply == ''){
							$reply = trans('backend/question.not');
						}else{
							$reply = $one->reply;
						}
					?>
					<tr class="tab-row{{$one->id}}">
						<td>{{++$i}}</td>
						<td class="user" style="width:20% "><?php echo $name; ?></td>
						<td class="question" style="width:20% ">{{$one->question}}</td>
						<td class="reply" style="width: 30%">{{$reply}}</td>
						<td>
							<button class="btn btn-success edit" value="{{$one->id}}"><i class="fa fa-eye"></i>{{trans('backend/question.view')}}</button>

							<button type="submit" class="btn btn-danger delete" value="{{$one->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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

	        
	        $formData.append('question',$('#add-shipping .question').val());
	        $formData.append('reply',$('#add-shipping .reply').val());
	        
	        $.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	        });
	        $.ajax({
	           url: "{{route('questions.store')}}",
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
	              $.notify("Saved successfully \n Question Saved Successfully",{ position:"top right" ,className:"success"});
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



		$(document).on('click','.edit',function(){
			$('#edit-shipping').modal('toggle');
			var id = $(this).attr('value');
			parent = $('tr.tab-row'+id);

			$('#edit-shipping .user').val(parent.children('td.user').text());
			$('#edit-shipping .question').val(parent.children('td.question').text());
			if(parent.children('td.reply').text() != "{{trans('backend/question.not')}}"){
				$('#edit-shipping .reply').val(parent.children('td.reply').text());
			}
			
			
			$('#edit-shipping .btn-success').on('click',function(e){

				e.preventDefault();
				e.stopPropagation();

				$formData = new FormData();

		        $formData.append('id',id);
		        $formData.append('question',$('#edit-shipping .question').val());
		        $formData.append('reply',$('#edit-shipping .reply').val());
		        

		        $.ajaxSetup({
		          headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		          }
		        });
		        $.ajax({
		           url: "{{route('questions.edit')}}",
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
		              $.notify("Updated successfully \n Question Replied Successfully",{ position:"top right" ,className:"success"});
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
		           url: "{{route('questions.destroy')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Question Deleted Successfully",{ position:"top right" ,className:"success"});
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