@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
Models
@endsection
 
@section('contentheader_title')
Models
@endsection
 
@section('contentheader_description') 
	@yield('customer_business_title')
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
Models
@endsection

@section('styles')
<style type="text/css">
	iframe{
		min-height: 400px;
	}
	.pag{
		min-height: 700px;
	}
	.save{
		margin-bottom: 10px;
	}
	.btn-xs{
		display: inherit;
		margin-bottom: 5px;
	}
	.row{
		margin-bottom: 0;
	}
	select option{
		padding: 10px;
		border-bottom: 1px solid #DDD;
	}
	select option[selected="selected"]{
		background-color: #c8c8c8;
	}
	td.answers,
    th.answers{
        text-align: left !important;
        width: 40%;
    }
    td.answers p{
        text-align: left !important;
    }
</style>
@endsection

@section('main-content')


<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">
            <div class="row" style="margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right add" value="">
                    <i class="fa fa-plus"></i>
                    <span>Add</span>
                </button>
            </div>
            <div id="emails-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="row">


                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover daTatable dataTable deleteFormModal text-center" data-form="deleteForm" id="models-table">
                            <thead>
                                <th>No#</th>
                                <th>Title</th>
                                <th>URL</th>
                                <th class="answers">Answers</th>
                                <th>Default</th>
                                <th>Actions</th>
                            </thead>

                            <tbody>
                                <?php $count = 0; ?> 
                                @foreach($data as $model)
                                <tr class="selected{{$model->id}}">
                                    <td>{{++$count}}</td>
                                    <td class="title"><a href="#" class="editable" data-type="text" data-id="{{$model->id}}" data-kind="title">{{$model->title}}</a></td>
                                    <td class="url"><a href="#" class="editable" data-type="text" data-id="{{$model->id}}" data-kind="url">{{$model->url}}</a></td>
                                    <td class="answers text-left">
										@php $quests = []; @endphp
                                    	@if($model->answers != '')
										@foreach($model->answers as $key => $value)
											<p>Q{{$value->id}}: {{$value->question}} <br>
												Ans: <a href="#" class="question_answer{{$value->id}} answers" data-quest="{{$value->id}}" data-model="{{$model->id}}" data-type="select" data-value="{{$value->selected_answer != '' ? $value->selected_answer->id : ''}}" data-answers="{{json_encode($value->answers)}}">
													{{$value->selected_answer != '' ? $value->selected_answer->text : ''}}
												</a> 
											</p>
											@php $quests[$key] = $value->id; @endphp
                                    	@endforeach
                                    	@endif
                                    </td>
                                    <td>{{$model->default}}</td>
                                    <td class="action">       
                                        <button type="submit" class="btn btn-success btn-xs edit" value="{{$model->id}}" data-active="{{$model->is_default}}" data-quests="{{ json_encode($quests) }}"><i class="fa fa-edit"></i> Edit Questions</button>

                                        <button type="submit" class="btn btn-danger btn-xs delete" value="{{$model->id}}"><i class="fa fa-close"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
            @if(count($data)==0)
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
                            <h4>No Results
                                <i class="fa fa-exclamation fa-fw"></i>
                            </h4>
                            <p>No Results found for now </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@include('Pages.Views.Backend.Modals.add_model')
@include('Pages.Views.Backend.Modals.edit_questions')
@include('backend.adminlte.layouts.modals.confirm_delete')
@endsection

@section('scripts')

	<script type="text/javascript">
		$(function(){

			var l = $('.ladda-button').ladda();

			$("input[type=checkbox]").iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_minimal-blue'
			}); 
			
			function getInfo(id){
				var source = [];
				var items = $('a.question_answer'+id).data('answers');
				
				for (var i = 0; i < items.length; i++) {
					var item = {
						value: items[i].id,
						text: items[i].text,
					}
					source.push(item);
				}
				return source;
			}

			function getValue(id){
				var value = $('a.question_answer'+id).data('answ');
				console.log(id);
				return value;
			}

			function initTable(){
				$('#models-table').dataTable({
					"fnRowCallback": function( nRow, mData, iDisplayIndex ,iDisplayIndexFull ) {
		   				
		   				$('a.editable').editable({
							mode:'inline',
							type: 'text',
							success: function(response, newValue){
								var id = $(this).data('id');
								var type = $(this).data('kind');
								$.ajax({
									url: "{{URL::to('/backend/models/editModel')}}",
									type: 'POST',
									data: {
										'_token': $('input[name="_token"]').val(),
										'id': id,
										'value': newValue,
										'type': type,
									},
									success: function (data) {
										$.notify("Updated successfully \n Model Updated Successfully", {
											position: "top right",
											className: "success"
										});
										setTimeout(function(){
											location.reload();
										},2000);
									},
									error: function (data) {
										$.notify("Whoops \n Error may be in connection to server", {
											position: "top right",
											className: "error"
										});
									}

								});
							},
						});

						$('a.answers').editable({

							mode:'inline',
							type:'select',
							source: function(){
								return getInfo($(this).data('quest'));
							},
							success:function(response,newValue){
								$.ajax({
									url: "{{URL::to('/backend/models/updateAnswers')}}",
									type: 'POST',
									data: {
										'_token': $('meta[name="csrf-token"]').attr('content'),
										'id': $(this).data('model'),
										'question_id': $(this).data('quest'),
										'answer_id': newValue,
									},
									success: function (data) {
										$.notify("Updated successfully \n Answer Updated Successfully", {
											position: "top right",
											className: "success"
										});
									},
									error: function (data) {
										$.notify("Whoops \n Error may be in connection to server", {
											position: "top right",
											className: "error"
										});
									}
								});	
							},

						});

		   	 		},

				});
			}

			initTable();

			$(document).on('click', '.add', function () {
	            $('#add-model').modal('toggle');
	        });

			$(document).on('click','#add-model .btn-success',function(){
		        $('.ladda-button').ladda('start');

		        var questions = [];
	        	$('#add-model select#questions').each(function(){
	        		questions.push($(this).val());
	        	});

	        	var is_active = '';
	        	$('#add-model .icheckbox_square-blue').hasClass("checked") ? is_active = 1 : is_active = 0;

				$.ajax({
					url: "{{URL::to('/backend/models/storeModel')}}",
					type: 'POST',
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						'title': $('input.title').val(),
						'url': $('input.url').val(),
						'is_default' : is_active,
						'answers' : questions ,

					},
					success: function (data) {
						$.notify("Saved successfully \n Model Saved Successfully", {
							position: "top right",
							className: "success"
						});
                    	$('.ladda-button').ladda('stop');
                    	$('#add-model').modal('hide');
						setTimeout(function () {
	            				location.reload();
						}, 2000);
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
	                    	$('.ladda-button').ladda('stop');
						}, 2000)
					}
				});
	        });

	        $(document).on('click', '.edit', function () {
	        	var is_active = $(this).data('active');
	        	var id = $(this).val();
	        	var quests = $(this).data("quests");
	        	$('#edit-model .btn-success').val(id);
	        	$("#edit-model select#questions option:selected").attr('selected',false);
	        	if(is_active == 1){
					$('#edit-model input[type=checkbox].active').iCheck('check');
					$('#edit-model .active').iCheck('update');
	        	}else{
	        		$('#edit-model input[type=checkbox].active').iCheck('uncheck');
					$('#edit-model .active').iCheck('update');
	        	}

	        	for (var i = 0; i < quests.length; i++) {
	        		$('#edit-model select#questions option[value="'+quests[i]+'"]').attr('selected',true);
	        	}

	            $('#edit-model').modal('toggle');
	        });

	        $(document).on('click','#edit-model .btn-success',function(){
		        $('.ladda-button').ladda('start');

		        var questions = [];
	        	$('#edit-model select#questions').each(function(){
	        		questions.push($(this).val());
	        	});

	        	var is_active = '';
	        	$('#edit-model .icheckbox_square-blue').hasClass("checked") ? is_active = 1 : is_active = 0;

				$.ajax({
					url: "{{URL::to('/backend/models/updateQuestions')}}",
					type: 'POST',
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						'is_default' : is_active,
						'answers' : questions ,
						'id' : $(this).val(),
					},
					success: function (data) {
						$.notify("Updated successfully \n Questions Updated Successfully", {
							position: "top right",
							className: "success"
						});
                    	$('.ladda-button').ladda('stop');
                    	$('#edit-model').modal('hide');
						setTimeout(function () {
	            				location.reload();
						}, 2000);
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
	                    	$('.ladda-button').ladda('stop');
						}, 2000)
					}
				});
	        });

	        $(document).on('click', '.delete', function () {
				$('#confirm-delete').modal('toggle');
				$('#confirm-delete .btn-danger').attr('data-id',$(this).attr('value'));
	        });

	        $(document).on('click','#confirm-delete .btn-danger',function(){
		        $('.ladda-button').ladda('start');
		        var id = $(this).data('id');
				$.ajax({
					url: "{{URL::to('/backend/models/destroyModel')}}",
					type: 'POST',
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						'id' : id,
					},
					success: function (data) {
						$.notify("Deleted successfully \n Model Deleted Successfully", {
							position: "top right",
							className: "success"
						});
                    	$('.ladda-button').ladda('stop');
						$('#confirm-delete').modal("hide");
						$('.selected'+id).remove();
						setTimeout(function () {
	            				location.reload();
						}, 2000);
					},
					error: function (data) {
						$.notify("Whoops \n Error may be in connection to server", {
							position: "top right",
							className: "error"
						});
						setTimeout(function () {
	                    	$('.ladda-button').ladda('stop');
						}, 2000)
					}
				});
	        });

	        
	        
		});
	</script>
	@yield('scripts2')
@endsection

