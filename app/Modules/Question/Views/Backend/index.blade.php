@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
{{trans('backend/adversal.title')}}
@endsection
 
@section('contentheader_title')
{{trans('backend/adversal.title')}}
@endsection
 
@section('contentheader_description') 
{{trans('backend/adversal.title')}}
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
{{trans('backend/adversal.title')}}
@endsection


@section('main-content')

<style type="text/css">
		textarea{
			min-height: 150px;
			max-height: 150px;
			min-width: 100%;
			max-width: 100%;
		}
		
		.dataTables_wrapper .row:first-of-type{
			margin-bottom: 0 !important;
		}
		.delete_answer{
			padding-left: 0;
		}
		.delete_answer .btn-danger{
			width: 100%;
			height: 34px;
		}
		.delete_answer .btn-danger i{
			margin-right: 0 !important;
		}
		.appended .col-sm-offset-4 .col-sm-6{
			padding: 0;
			margin-top:5px;
		}
		.appended .col-sm-offset-4 .col-sm-6:first-of-type{
			padding-right: 10px;
		}
		.bigFilter{
	        border: 1px solid #DDD;
	        padding: 20px 20px;
	        background-color: #FFF;
	        border-radius: 5px;
	        box-shadow: 1px 1px 10px #999;
	    }
	    .bigFilter ul.main{
	        margin: 0;
	        margin-left:5px; 
	        padding: 0;
	    }
	    .bigFilter ul.main>li,
	    .bigFilter ul.main>li a{
	        font-size: 15px;
	        color: #666;
	        margin-bottom: 10px;
	        text-decoration: none;
	    }
	    .bigFilter ul.main li ul.inner li{
	        margin-top: 5px;
	    }
	    .bigFilter ul.main li ul.inner li a{
	        color: #777;
	        font: 14px;
	        display: block;
	        width: 100%;
	        text-decoration: none;
	        font-weight: 400;
	    }
	    .bigFilter ul li a.active{
	        font-weight: bold !important;
	        color: #333 !important;
	    }
</style>

<div class="col-md-3" style="padding-top: 15px;padding-bottom: 15px;padding-right: 0">
    <div class="bigFilter">
        <ul class="main">
            <li><a class="type active" id="all" href="javascript:void(0)" link="{{URL::to('backend/Question')}}">All Questions</a></li>
            <li>Question By Document 
                <ul class="inner">
                    @foreach($docs as $doc)
                    <li><a class="type" data-id="{{$doc->id}}" href="javascript:void(0)" link="{{URL::to('backend/Question/filterByDocument/'.$doc->id)}}">{{$doc->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="tab-content col-md-9">
	<div id="home" class="tab-pane active in">
		<div class="pag">
			<div class="row" style="margin-bottom: -35px;margin-right: 2px;">
				<button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
				<div class="clearfix"></div>
			</div>
			<div class="myTable">
			@include('Question.Views.Backend.Ajax.filter')
			</div>
			
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
@endsection

@section('scripts')
	@include('backend.adminlte.layouts.modals.confirm_delete')
	@include('Question.Views.Backend.Modals.add_question')
	@include('Question.Views.Backend.Modals.edit_relatives')
	@yield('scripts2')

<script type="text/javascript">
	$(function(){

		var i = 1;
		var done = [];
		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();

		function initTable(){
			$('#questions-table').dataTable({
				"fnRowCallback": function( nRow, mData, iDisplayIndex ,iDisplayIndexFull ) {
	   				$('a.editable.answers').editable({
						mode:'inline',
						type: 'text',
						success: function(response, newValue){
							var id = $(this).data('id');
							var question_id = $(this).data('question');
							$.ajax({
								url: "{{URL::to('/backend/Question/editAnswer')}}",
								type: 'POST',
								data: {
									'_token': $('input[name="_token"]').val(),
									'id': id,
									'text': newValue,
									'question_id': question_id,
								},
								success: function (data) {
									$.notify("Updated successfully \n Answer Updated Successfully", {
										position: "top right",
										className: "success"
									});
									location.reload();
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

					$('a.editable.question').editable({
						mode:'inline',
						type: 'text',
						success: function(response, newValue){
							var id = $(this).data('id');
							$.ajax({
								url: "{{URL::to('/backend/Question/editQuestion')}}",
								type: 'POST',
								data: {
									'_token': $('input[name="_token"]').val(),
									'id': id,
									'question': newValue,
								},
								success: function (data) {
									$.notify("Updated successfully \n Question Updated Successfully", {
										position: "top right",
										className: "success"
									});
									location.reload();
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

					var values = [];

					@foreach($docs as $doc)
					values.push({
						value: "{{$doc->id}}",
						text: "{{$doc->name}}",
					});
					@endforeach

					$('a.document').editable({

							mode:'inline',
							type:'select',
							source: values,
							success:function(response,newValue){
								var id = $(this).data('id');
								$.ajax({
									url: "{{URL::to('/backend/Question/editQuestionDocument')}}",
									type: 'POST',
									data: {
										'_token': $('input[name="_token"]').val(),
										'id': id,
										'document_id': newValue,
									},
									success: function (data) {
										$.notify("Updated successfully \n Question Document Updated Successfully", {
											position: "top right",
											className: "success"
										});
										//location.reload();
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
		
		$('.bigFilter ul.main li a.type').click(function () {
            if ($(this).hasClass('active')) {
                return void (0);
            } else {
                $('ul li a.active').removeClass('active');
                $(this).addClass('active');
                getData(null, $(this).attr('link'));
            }
        });

        function getData(page_number, url) {
            url = url || '?page=' + page_number
            var outerBox = '#home';
            var Box = '#home .pag .myTable';
            var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
            $(Box + ' #overlayPagination').remove();
            $(Box).append(loaging);
            $.ajax({
                url: url,
            }).done(function (data) {
                setTimeout(function(){
                    $(Box).html(data);
                    initTable();
                    $('.pag #overlayPagination').remove();
                },2500);
            }).fail(function () {
                $('.pag #overlayPagination').remove();
                $('.pag #overlayError').remove();
                var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                $(Box).html(error);
            });
       }

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$("input[type=checkbox]").iCheck({
			checkboxClass: 'icheckbox_square-blue',
		}); 

		
		$(document).on('click','.add_answer',function(e){
			e.preventDefault();
			e.stopPropagation();
			++i;
			var h = 0 ;
			if(done.length>0){
				for (var y = 0; y < done.length; y++) {
					h = done[y];
					done.splice(done.indexOf(h), 1);
					break;
				}
			}else{
				h = i;
			}
			var x = '<div class="col-xs-12 col-sm-12 col-md-12 appended">'+
						'<div class="form-group">'+
							'<div class="col-sm-4">'+
								'<strong>Answer '+h+'</strong>'+
							'</div>'+
							'<div class="col-sm-7">'+
								'<input type="text" id="answer-'+ h +'" class="form-control answer" placeholder="Answer '+h+'">'+
							'</div>'+
							'<div class="col-sm-1 delete_answer">'+
								'<button class="btn btn-xs btn-danger" data-id='+h+'><i class="fas fa-trash fa-x"></i></button>'+
							'</div>'+
				
						'</div>'+
					'</div>';
			$('#add-question #answers').append(x);
		});
	
		$(document).on('click','.add',function(){
			i = 1;
			done = [];
			$('#add-question').modal('toggle');
		});

		$('#add-question .btn-success').on('click',function(){
			var answers = [];

			answers.push({
				id: 1,
				text:$('#answer-1').val(),
			});

			$.each($('.delete_answer .btn'),function(i){
				var parent = $(this).parents('.delete_answer');
				var input_answer = parent.siblings('.col-sm-7').children('input.answer');
				answer = {
					id: $(this).data('id'),
					text: input_answer.val()
				};
				answers.push(answer);
			});
			$('.ladda-button').ladda('start');

			$.ajax({
				url: "{{URL::to('/backend/Question/addQuestion')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'question': $('#add-question input.question').val(),
					'is_main': $('#add-question input[type="checkbox"]').is(':checked') ? 1 : 0,
					'answers': answers,	
					'document_id': $('#add-question select.docs option:selected').val(),
					'notes': $('#add-question textarea').val(),	
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
						$.notify("Saved successfully \n Question Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-question').modal('hide');
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


		$(document).on('click','.delete_answer .btn',function(e){
			e.preventDefault();
			e.stopPropagation();
			--i;
			done.push($(this).data('id'));
			done.sort();
			$(this).parents('.appended').remove();
			$('#add-question .add_answer').show();

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
				url: "{{URL::to('/backend/Question/destroyQuestion')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id': id,
				},
				success: function (data) {
					$.notify("Deleted successfully \n Question Deleted Successfully", {
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
			$('#edit-relatives').modal('show');
			var id = $(this).val();
			$.ajax({
				url: "{{URL::to('/backend/Question/loadQuestion')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id': id,
				},
				success: function (data) {
					$('#edit-relatives .btn-success').attr('value',id);
					$('#edit-relatives .modal-body').html(data);
				},
				error: function (data) {
					$.notify("Whoops \n Error may be in connection to server", {
						position: "top right",
						className: "error"
					});
					
				}

			});
		});

		$(document).on('click','#edit-relatives .btn-success',function(){
			var questions = [];
			var id = $(this).val();
			$('#edit-relatives select.questions option:selected').each(function(index,value){
				question = {
					question_id: $(this).val(),
				};
				questions.push(question);
			});
			$('.ladda-button').ladda('start');
			$.ajax({
				url: "{{URL::to('/backend/Question/assignQuestion')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'answer_id': $('#edit-relatives select.answers option:selected').val(),
					'questions': questions,
					'question_id': id,
				},
				success: function (data) {
					$.notify("Saved successfully \n Question Saved Successfully", {
						position: "top right",
						className: "success"
					});
					setTimeout(function () {
						$('.ladda-button').ladda('stop');
						location.reload();
					}, 2000);
					$('#edit-relatives').modal('hide');
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

		


	});

</script>
@endsection

