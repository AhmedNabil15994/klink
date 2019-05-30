@extends('backend.adminlte.customer_business.index')

@section('customer_business_title')
{{trans('backend/customer_business.tour')}}
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('/phone/css/style.css')}}">

<style type="text/css">
button.add.btn-success{
	visibility: visible !important;
}
#confirm-delete .modal-content{
	padding: 0;
}
#confirm-delete h4.modal-title{
	color: #FFF;
}
fieldset span.pull-right.period{
	width: 45% !important;
	text-align: right !important;
}
iframe{
    min-height: 400px;
}

</style>
@endsection

@section('filter')
@include('backend.adminlte.customer_business.modals.add_tour')
@include('backend.adminlte.customer_business.modals.cancel_date')
@include('backend.adminlte.customer_business.modals.docs')
@include('backend.adminlte.customer_business.modals.add_dates')
@include('backend.adminlte.customer_business.modals.add_details')
@include('backend.adminlte.customer_business.modals.assign_persons')
@include('backend.adminlte.customer_business.modals.tour_data')
<div class="row ul-row">
	<ul class="panel-nav pull-left">
		<li><a class="active al" id="all" href="javascript:void(0)" link="{{route('customer_business.filterTours',['type'=> 'all'])}}">{{trans('backend/user.all')}}</a></li>
		<li><a class="al" id="per_stop" href="javascript:void(0)" link="{{route('customer_business.filterTours',['type'=>0])}}">Tour Per Stop</a></li>
		<li><a class="al" id="per_min" href="javascript:void(0)" link="{{route('customer_business.filterTours',['type'=>1])}}">Tour Per Min</a></li>
		<li><a class="al" id="per_day" href="javascript:void(0)" link="{{route('customer_business.filterTours',['type'=>3])}}">Tour Per Day</a></li>
		<li><a class="al" id="per_packet" href="javascript:void(0)" link="{{route('customer_business.filterTours',['type'=>6])}}">Tour Per Packet</a></li>
	</ul>
	<div class="clearfix"></div>
</div>
@endsection

@section('table')
@include('backend.adminlte.customer_business.Ajax.filter')
@endsection

@section('scripts2')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
type="text/javascript"></script>
<script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>

<script type="text/javascript">
	tinyMCE.init({
		'formats' : {

		'alignright' : {'selector' : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', attributes: {"align":  'right'}},

		}
	});
	tinymce.init({
		selector: "textarea#first-div",
		theme: "modern",
		height:100,
		menubar: true,
		statusbar: true,
		plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons  paste textcolor"
		],
		toolbar: "rtl | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
		style_formats: [
		{title: 'Bold text', inline: 'b'},
		{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		{title: 'Example 1', inline: 'span', classes: 'example1'},
		{title: 'Example 2', inline: 'span', classes: 'example2'},
		{title: 'Table styles'},
		{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		]
	});	
	$(function(){
		var myData;
		var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();
		var l2 = $('.ladda-button2').ladda();
		var l3 = $('.ladda-button3').ladda();

		$(document).on('change','#docs select.documents',function(){
			var layout = $(this).children('option:selected').data('content');
			var id = $(this).children('option:selected').val();
			var tour_id = $('#docs.in #tour_id').val();
			$('#docs button.btn').attr('data-id',id);
			$.ajax({
                url: "{{route('documents.getVars')}}",
                type: 'GET',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': id,
                    'tour_id': tour_id,	
                },
                success:function(data){
                	myData = data;
            		tinyMCE.get('first-div').setContent(layout);
                },
                error:function(){
            		tinyMCE.get('first-div').setContent('');
                }
            });         
		})

		$('#docs #edit-doc').on('click',function(){
                $('.ladda-button').ladda('start');

                var id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('documents.editTemplate')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': id,
                        'layout': tinyMCE.activeEditor.getContent(),
                    },
                    success: function (data) {
                        $.notify("Update successfully \n Template Update Successfully", {
                            position: "top right",
                            className: "success"
                        });
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
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

        $('#docs #print-doc').on('click',function(){
                $('.ladda-button2').ladda('start');

                var id = $(this).data('id');
                var newWin= window.open('','Print-Window');
                var style = '<head>'+
                            '<style type="text/css">'+
                                'p{margin:0 !important;}'+
                                'body{padding:30px;border:1px solid #DDD;}'+
                            '</style>'+
                            '</head>';
                $.ajax({
                    url: "{{route('documents.convertTemplate')}}",
                    type: 'GET',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'myVars': myData,
                        'id': id,
                    },
                    success:function(data){
                        $('.ladda-button2').ladda('stop');

                        newWin.document.open();

                        newWin.document.write('<html>'+style+'<body onload="window.print()">'+data+'</body></html>');

                        newWin.document.close();

                        setTimeout(function(){newWin.close();},10);
                    },
                    
                });            
        });

        $('#docs #download-doc').on('click',function(){
            $('.ladda-button3').ladda('start');

            var id = $(this).data('id');
            $.ajax({
                url: "{{route('documents.downloadTemplate')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'data': tinyMCE.activeEditor.getContent(),
                    'name': $('#docs select option:selected').text(),
                    'myVars': myData,
                    'id': id,
                },
                success:function(data){
                    $('.ladda-button3').ladda('stop');
                },
                    
            });    
        });

        $(document).on('click', '#download', function (e) {
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).data('val');
                

        });

		$(document).on('click','.add',function(){
			$('#add-tour').modal('toggle'); 	
		});

		

		$('#add-dates input[name="dates"],#cancel_date input[name="date"]').datepicker({
			autoclose : 'true',
			format: 'yyyy-mm-dd',
		});

		function close(){
			$('.modal input[type="text"],.modal input[type="number"]').val('');

			$('#add-person input[type=checkbox].person').iCheck('uncheck');
			$('#add-person input[type=checkbox].person').removeAttr('checked');
			$('#add-person input[type=checkbox].users').attr('checked',true);
			$('#add-person input[type=checkbox].users').iCheck('check');
			$('#add-person .users').iCheck('update');

			$('select.persons').fadeOut(250);
			$('select.persons').removeClass('active');
			$('select.users').fadeIn(250);
			$('select.users').addClass('active');

			$('#add-dates .count').val(1);
			$('#add-dates .time').val(2);
			$('#add-dates .payment_period').val(5);

			$('#add-dates .count3').val(2);
			$('#add-dates .time3').val(1);
			$('#add-dates .cancellation_period').val(5);

			$('#add-dates .count4').val(2);
			$('#add-dates .time4').val(1);
			$('#add-dates .test_period').val(5);

			$('#add-dates .time2').val(2);
			$('#add-dates .account_period').val(4);

			$('.tour_person select option').removeAttr('selected');
			$('.tour_person select.active').prop('selectedIndex',0);
			$('.tour_person select option:disabled').attr('selected',true);

			$('ul.days li.active').removeClass('active');
		}

		$('.modal .form-group ul li').on('click',function(){
			$(this).toggleClass('active');
		});

		$('.timepicker').hunterTimePicker();

		$("input[type=checkbox]").iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_minimal-blue'
		}); 

		$(document).on('ifChecked','input[type=checkbox]', function(event){
			$('input[type=checkbox]').not(this).iCheck('uncheck');
			if($(this).hasClass('users') ){
				$('select.persons').fadeOut(250);
				$('select.persons').removeClass('active');
				$('select.users').fadeIn(250);
				$('select.users').addClass('active');
				$('select.persons option:selected').removeAttr('selected');
			}else{
				$('select.users').fadeOut(250);
				$('select.users').removeClass('active');
				$('select.persons').fadeIn(250);
				$('select.persons').addClass('active');
				$('select.users option:selected').removeAttr('selected');

			}

			$('input[type=checkbox]').not(this).iCheck('update');
		});

		$('#add-tour').on('click', '.btn-success', function (e) {
			e.preventDefault();
			e.stopPropagation();
			$('.ladda-button').ladda('start');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('customer_business.storeTour')}}",
				type: 'POST',
				data: {
					'_token': $('input[name="_token"]').val(),
					'tour_name': $('#add-tour .tour_name').val(),
					'notes': $('#add-tour .notes').val(),
					'price': $('#add-tour .price').val(),
					'ship_id': $('#add-tour select.ships option:selected').data('id'),
					'tour_type': $('#add-tour select.types option:selected').data('value'),
					
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
						$.notify("Saved successfully \n Tour Saved Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
							location.reload();
						}, 2000);
						$('#add-tour').modal('hide');
					}
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

		$(document).on('click', '.cancel', function () {
			$('#cancel_date').modal('show');
			var id = $(this).attr('value');

			$(document).on('click', '#cancel_date .btn-success', function (e) {

				$('.ladda-button').ladda('start');
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.cancelTour')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'date': $('#cancel_date input').val(),
					},
					success: function (data) {

						$.notify("Updated successfully \n Tour Cancellation Day Updated Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						}, 2000);
						$('#cancel_date').modal('hide');
						location.reload();
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

		$(document).on('click', '.docs', function () {
			$('#docs').modal('show');
			var id = $(this).attr('value');
			$('#docs #tour_id').val(id);
			$(document).on('click', '#docs .btn-success', function (e) {

				$('.ladda-button').ladda('start');
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.cancelTour')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
						'date': $('#cancel_date input').val(),
					},
					success: function (data) {

						$.notify("Updated successfully \n Tour Cancellation Day Updated Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button').ladda('stop');
						}, 2000);
						$('#cancel_date').modal('hide');
						location.reload();
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

		$(document).on('click', '.delete', function () {
			$('#confirm-delete').modal('show');
			var id = $(this).attr('value');

			$(document).on('click', '#confirm-delete .btn-danger', function (e) {

				$('.ladda-button5').ladda('start');
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.destroyTour')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id': id,
					},
					success: function (data) {

						$.notify("Deleted successfully \n Tour Deleted Successfully", {
							position: "top right",
							className: "success"
						});
						setTimeout(function () {
							$('.ladda-button5').ladda('stop');
						}, 2000);
						$('#confirm-delete').modal('hide');
						$('.tab-row' + id).remove();
						close();
						location.reload();

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

		});

		$(document).on('click','.dates',function(){
			close();
			var id = $(this).attr('value');
			$.ajax({
				url: "{{route('customer_business.getTourDates')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id':id,
				},
				success: function (data) {
					$('#add-dates').modal('toggle');

					if (data == 0) {

					} else if(typeof(data) == 'object'){
						$('#add-dates .start_date').val(data.tour_start_date);
						$('#add-dates .finish_date').val(data.tour_finish_date);
						$('#add-dates .start_time').val(data.tour_start_time);
						$('#add-dates .finish_time').val(data.tour_finish_time);

						// Payment Details
						$('#add-dates .count').val(data.payment.every);
						$('#add-dates .time').val(data.payment.time);
						$('#add-dates .payment_period').val(data.payment.period);

						// Account Details
						$('#add-dates .time2').val(data.account.time);
						$('#add-dates .account_period').val(data.account.period);

						// Cancellation Details
						$('#add-dates .count3').val(data.cancellation.every);
						$('#add-dates .time3').val(data.cancellation.time);
						$('#add-dates .cancellation_period').val(data.cancellation.period);

						// Cancellation Details
						$('#add-dates .count4').val(data.test.every);
						$('#add-dates .time4').val(data.test.time);
						$('#add-dates .test_period').val(data.test.period);

						


						$.each(data.days, function (i, day) {
							$.each($('#add-dates ul.days li'), function (i, item) {
								if($(this).text() == day){
									$(this).addClass('active');
								}
							});
						});
					}
				},
			});

			$('#add-dates').on('click', '.btn-success', function (e) {
				e.preventDefault();
				e.stopPropagation();
				$('.ladda-button').ladda('start');
				var days = {};
				$('.modal#add-dates .form-group ul li.active').each(function(index){
					days[index] = $(this).text();
				});

				var payment = [$('#add-dates .count').val(),$('#add-dates .time option:selected').val(),$('#add-dates .payment_period option:selected').val()];

				var account = [0,$('#add-dates .time2 option:selected').val(),$('#add-dates .account_period option:selected').val()];

				var cancellation = [$('#add-dates .count3').val(),$('#add-dates .time3 option:selected').val(),$('#add-dates .cancellation_period option:selected').val()];

				var test = [$('#add-dates .count4').val(),$('#add-dates .time4 option:selected').val(),$('#add-dates .test_period option:selected').val()];

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.storeTourDates')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id':id,
						'tour_start_date': $('#add-dates .start_date').val(),
						'tour_finish_date': $('#add-dates .finish_date').val(),
						'tour_start_time': $('#add-dates .start_time').val(),
						'tour_finish_time': $('#add-dates .finish_time').val(),
						'payment': payment,
						'account': account,
						'cancellation': cancellation,
						'test': test,
						'days': days,
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
							$.notify("Saved successfully \n Tour Dates Saved Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#add-dates').modal('hide');
						}
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

		$(document).on('click','.details',function(){
			close();
			var id = $(this).attr('value');
			$.ajax({
				url: "{{route('customer_business.getTourDetails')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id':id,
				},
				success: function (data) {
					$('#add-details').modal('toggle');

					if (data == 0) {

					} else if(typeof(data) == 'object'){
						$('#add-details .min_day_hour').val(data.min_day_hour);
						$('#add-details .max_day_hour').val(data.max_day_hour);
						$('#add-details .additional_price').val(data.additional_price);

						$.each(data.additional_days, function (i, day) {
							$.each($('#add-details ul.days li'), function (i, item) {
								if($(this).text() == day){
									$(this).addClass('active');
								}
							});
						});
					}
				},
			});
			$('#add-details').on('click', '.btn-success', function (e) {
				e.preventDefault();
				e.stopPropagation();
				$('.ladda-button').ladda('start');
				var additional_days = {};
				$('.modal#add-details .form-group ul li.active').each(function(index){
					additional_days[index] = $(this).text();

				});


				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.storeTourDetails')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id':id,
						'min_day_hour': $('#add-details .min_day_hour').val(),
						'max_day_hour': $('#add-details .max_day_hour').val(),
						'additional_price': $('#add-details .additional_price').val(),
						'additional_days': additional_days,
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
							$.notify("Saved successfully \n Tour Details Saved Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								$('.ladda-button').ladda('stop');
								location.reload();
							}, 2000);
							$('#add-details').modal('hide');
						}
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

		$(document).on('click','.assign',function(){
			var id = $(this).attr('value');
			var selected = '';
			$.ajax({
				url: "{{route('customer_business.getTourPersons')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id':id,
				},
				success: function (data) {
					close();
					if(typeof(data) == 'object'){
						if(data.type == 'order_person'){
							if(data.person == ''){
								$('select.persons option').removeAttr('selected');
								$('select.persons').prop('selectedIndex',0);
								$('select.persons option:disabled').attr('selected',true);
							}
							$('#add-person input[type=checkbox].users').iCheck('uncheck');
							$('#add-person input[type=checkbox].users').removeAttr('checked');
							$('#add-person input[type=checkbox].person').attr('checked',true);
							$('#add-person input[type=checkbox].person').iCheck('check');
							$('#add-person .person').iCheck('update');
							$('select.users').fadeOut(5);
							$('select.users').removeClass('active');
							$('select.persons').fadeIn(5);
							$('select.persons').addClass('active');
							$('select.persons option[data-id="'+data.person+'"]').attr('selected',true);

						}else if(data.type == 'person'){
							if(data.person == ''){
								$('select.persons option').removeAttr('selected');
								$('select.persons').prop('selectedIndex',0);
								$('select.persons option:disabled').attr('selected',true);
							}

							$('#add-person input[type=checkbox].person').iCheck('uncheck');
							$('#add-person input[type=checkbox].person').removeAttr('checked');
							$('#add-person input[type=checkbox].users').attr('checked',true);
							$('#add-person input[type=checkbox].users').iCheck('check');
							$('#add-person .users').iCheck('update');
							$('select.persons').fadeOut(5);
							$('select.persons').removeClass('active');
							$('select.users').fadeIn(5);
							$('select.users').addClass('active');
							$('select.users option[data-id="'+data.person+'"]').attr('selected',true);
						}
						if(data.company != ''){
							$('select.companies option[data-id="'+data.company+'"]').attr('selected',true);
							$('select.drivers').empty();
							$.each(data['company_drivers'], function (i, item) {
								if(item.profile_id == data.driver){
									selected = 'selected';
								}else{
									selected = '';
								}
								$('select.drivers').append("<option data-id='"+item.profile_id+"' data-vec='"+item.vehichle_id+"'"+selected+">"+item.profile.first_name+" "+item.profile.last_name+"</option>");
							});
						}else{
							$('select.companies option').removeAttr('selected');
							$('select.companies').prop('selectedIndex',0);
							$('select.companies option:disabled').attr('selected',true);
							$('select.drivers').empty();
						}



						$('#add-person').modal('toggle');


					}
				},
			});
			$('#add-person').on('click', '.btn-success', function (e) {
				e.preventDefault();
				e.stopPropagation();
				$('.ladda-button').ladda('start');
				var type = '';
				if($('#add-person .tour_person select.active').hasClass('users')){
					type = 'user';
				}else{
					type = 'order_person';
				}
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('customer_business.assignPerson')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'id':id,
						'type': type,
						'person': $('#add-person select.active option:selected').data('id'),
						'company_profile_id': $('#add-person select.companies option:selected').data('id'),
						'driver_profile_id': $('#add-person select.drivers option:selected').data('id'),
						'vehicle_id': $('#add-person select.drivers option:selected').data('vec'),
						'company_offer': $("#add-person input.company_offer").val(),
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
							$.notify("Saved successfully \n Persons Assigned Successfully", {
								position: "top right",
								className: "success"
							});
							setTimeout(function () {
								location.reload();
							}, 2000);
							$('.ladda-button').ladda('stop');

							$('#add-person').modal('hide');
						}
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

		$(document).on('change','select.companies',function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{route('customer_business.getDrivers')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id':$('#add-person select.companies option:selected').data('id'),
				},
				success: function (data) {
					$('select.drivers').empty();
					$.each(data, function (i, item) {
						$('select.drivers').append("<option data-id='"+item.profile.id+"' data-vec='"+item.vehichle_id+"'>"+item.profile.first_name+" "+item.profile.last_name+"</option>");
					});

				},

			});
		});


		$('#all , #per_stop , #per_min , #per_day , #per_packet').click(function () {
			$('.pag #row-one').remove();
			if ($(this).hasClass('active')) {
				return void (0);
			} else {
				$('.panel-nav a.active').removeClass('active');
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
				data:{
					'type':$('#checkType').val()
				}
			}).done(function (data) {
				$(Box).html(data);
				$('.demo-foo-filtering').DataTable();      
				$('.pag #overlayPagination').remove();
			}).fail(function () {
				$('.pag #overlayPagination').remove();
				$('.pag #overlayError').remove();
				var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
				$(Box).html(error);
			});
		}


	});
</script>

<script type="text/javascript">
	var stops;
	var offers;
	function format ( d ) {
	    // `d` is the original data object for the row

	    d = JSON.parse(d);
	    var rows = '';
	    $.each(d,function(i,item){
	    	mobile ='';

	    	if(item.stops.number_id != null){
	    		if( item.stops.stop_number != null){
	    			mobile = item.stops.stop_number.mobile_number;
	    		}
	    	}else if(item.stops.number_id == null){
	    		mobile ='';
	    	}


	    	var selectedStop = stops.filter(obj => {
	    		return obj.id === item.stops.id;
	    	});
	    	var address = selectedStop[0].stop_address;
	    	rows += '<tr>'+
	    	'<td>'+item.stops.name+'</td>'+
	    	'<td>'+item.stops.stops_number+'</td>'+
	    	'<td>'+item.stops.stop_description+'</td>'+
	    	'<td>'+item.stops.weight+" Kg"+'</td>'+
	    	'<td>'+mobile+'</td>'+
	    	'<td>'+address.street+" "+address.home+"<br>"+address.postal_code+" "+address.city+"<br>"+address.country_name+'</td>'+
	    	'</tr>';
	    });    	

	    return '<table class="table table-hover daTatable dataTable text-center"  cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
	    '<thead>'+
	    '<tr>'+
	    '<th>Stop Name</th>'+
	    '<th>Stops Number</th>'+
	    '<th>Description</th>'+
	    '<th>Weight</th>'+
	    '<th>Mobile</th>'+
	    '<th>Address</th>'+
	    '</tr>'+
	    '</thead>'+
	    '<tbody>'+
	    rows+
	    '</tbody>'+

	    '</table>';

	}	
	$(function(){


		$('#trips tbody').on('click', 'td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = $('#trips').DataTable().row( tr );
			if ( row.child.isShown() ) {
	            // This row is already open - close it
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	            row.child( format(JSON.stringify(tr.data('tester'))) ).show();
	            tr.addClass('shown');
	        }
	    } );

		$('.order-location .more-button').on('click', function (e){
			e.preventDefault();
			$(this).parents('.new-order-card').children('.new-order-card .card-sec-content').addClass('active');
		});
		$('.card-sec-content .back-button').on('click', function (e){
			e.preventDefault();
			$(this).parents('.new-order-card').children('.new-order-card .card-sec-content').removeClass('active');
		});


		function setTrips(data){

			$('#trips tbody').empty();
			$.each(data.trips, function (i, item) {
				var x = "<tr data-tester='"+JSON.stringify(item.trip_stops)+"'>"+
				"<td class='details-control'></td>"+
				"<td>"+item.id+"</td>"+
				"<td>"+item.is_done_dates.day+"</td>"+
				"<td>"+data.id+"</td>"+
				"<td>"+data.tour_name+"</td>"+
				"</tr>";

				$('#trips tbody').append(x);
			});
			table = $('#trips').DataTable( {
				"columnDefs": [
				{
					"className":      'details-control',
					"orderable":      false,
					"data":           null,
					"defaultContent": ''
				},
				],
				"order": [[1, 'asc']]
			});
		}

		function setOffers(data){
			$('#offers tbody').empty();
			offers = data.tour_offer;
			
			var company = '';
			var driver = '';
			var vec_name  = '';
			var vec_img  = '';

			if(data.accepted_offer != null){
				var selectedOffer = offers.filter(obj => {
					return obj.id === data.accepted_offer.id;
				});
				if(selectedOffer[0].tour_company.company != null ){
					company = selectedOffer[0].tour_company.company;
				}else{
					company = selectedOffer[0].tour_company.first_name+" "+selectedOffer[0].tour_company.last_name;
				}
				driver = selectedOffer[0].tour_driver.first_name+" "+selectedOffer[0].tour_driver.last_name;
				
				vec_name = selectedOffer[0].tour_vehicle.ship_name;
				vec_img = selectedOffer[0].tour_vehicle.ship.img;

				var x = "<tr>"+
				"<td>"+company+"</td>"+
				"<td>"+selectedOffer[0].company_offer+" €"+"</td>"+
				"<td>"+driver+"</td>"+
				"<td><img src='{{asset('images/shippings')}}/"+vec_img+"' alt='vehicle'>"+vec_name+"</td>"+
				"<td><i class='fas fa-check'></i></td>"+
				"</tr>";
				$('#offers tbody').append(x);
			}

			var refusedOffers = offers.filter(obj => {
				return obj.customer_accepted === 0;
			});


			if (refusedOffers.length > 0) {
				$.each(refusedOffers ,function(i,item){

					if(item.tour_company.company != null ){
						company = item.tour_company.company;
					}else{
						company = item.tour_company.first_name+" "+item.tour_company.last_name;
					}
					driver = item.tour_driver.first_name+" "+item.tour_driver.last_name;
					
					vec_name = item.tour_vehicle.ship_name;
					vec_img = item.tour_vehicle.ship.img;

					var x = "<tr>"+
					"<td>"+company+"</td>"+
					"<td>"+item.company_offer+" €"+"</td>"+
					"<td>"+driver+"</td>"+
					"<td><img src='{{asset('images/shippings')}}/"+vec_img+"' alt='vehicle'>"+vec_name+"</td>"+
					"<td><i class='fas fa-times'></i></td>"+
					"</tr>";
					$('#offers tbody').append(x);
				});
			}


			$('#offers').DataTable({
				pageLength:3
			});
		}

		function setTourData(data){

			var type = '';
			var person_type = '';
			var person_name = '';

			if(data.tour_type  == 0){
				type = 	"Tour Per Stop";
			}else if(data.tour_type  == 1){
				type = 'Tour Per Min';
			}else if(data.tour_type  == 3){
				type = 'Tour Per Day';
			}else if(data.tour_type  == 6){
				type = 'Tour Per Packet';   		
			}


			if(data.profile_id_company != null){
				person_type = "(User)";

				if(data.company_profile.company){
					person_name = data.company_profile.company ;
				}else {
					person_name = data.company_profile.first_name+" "+data.company_profile.last_name;
				}

			}else if(data.tour_details != null){
				if(data.tour_details.order_person_id != null){
					person_type = '(Order Person)';

					if(data.tour_details.tour_person.company){
						person_name = data.tour_details.tour_person.company ;
					}else{
						person_name = data.tour_details.tour_person.first_name+" "+data.tour_details.tour_person.last_name;
					}

				}
			}

			$('.card-main-content .tour_name').empty().html(data.tour_name);
			$('.card-main-content .tour_price').empty().html(data.price+" €");
			$('.card-main-content .tour_type').empty().html(type);
			$('.card-main-content .tour_person').empty().html( person_name+" "+person_type);
			$('.card-main-content .car-name').empty().html( data.tour_ship.title);
			$('.card-main-content .car-img .image').attr('src',"{{asset('images/shippings')}}/"+data.tour_ship.img);
			$('.card-main-content .tour_desc').empty().html(data.notes);


			if(data.tour_details && data.tour_details.additional_days){

				$('.card-main-content .min_max_day').empty().html(data.tour_details.min_day_hour.slice(0,-3)+" - "+data.tour_details.max_day_hour.slice(0,-3));
				$('.card-main-content .additional_price').empty().html(data.tour_details.additional_price+" €");
				$('.card-main-content ul.additional_days').empty();
				$.each(JSON.parse(data.tour_details.additional_days) ,function(i,item){
					$('.card-main-content ul.additional_days').append("<li>"+item+"</li>");
				});
				$('#tour-data #tour_details').show();

			}else{
				$('#tour-data #tour_details').hide();
			}


			if(data.tour_dates){
				$('.card-main-content ul.tour_days').empty();
				$.each(JSON.parse(data.tour_dates.days) ,function(i,item){
					$('.card-main-content ul.tour_days').append("<li>"+item+"</li>");
				});

				$('.card-main-content .start_finish_date').empty().html(data.tour_dates.tour_start_date+" - "+data.tour_dates.tour_finish_date);
				$('.card-main-content .start_finish_time').empty().html(data.tour_dates.tour_start_time.slice(0,-3)+" - "+data.tour_dates.tour_finish_time.slice(0,-3));

				$('#tour-data #tour_dates').show();
			}else{
				$('#tour-data #tour_dates').hide();
			}


		}

		function setDays(data,type,dayDate){

			var calculation = data.filter(obj => {
				return obj.type === type;
			});


			var every = calculation[0]['every'];
			var time = '';
			var period = '';
			var day = '';
			var myType = '';


			if(type == 0){
				myType = 'account';
			}else if(type == 1){
				myType = 'payment';
			}else if(type == 2){
				myType = 'test';
			}else if(type == 3){
				myType = 'cancellation';
			}

			var myField = $('#tour-data fieldset.'+myType);

			if(calculation[0]['time'] == 0){
				time = 'days';
			}else if(calculation[0]['time'] == 1){
				time = 'weeks';
			}else if(calculation[0]['time'] == 2){
				time = 'months';
			}
			time = every+' '+time;

			if(calculation[0]['period'] == 0){
				period = 'same day';
			}else if(calculation[0]['period'] == 1){
				period = 'start of week';
			}else if(calculation[0]['period'] == 2){
				period = 'end of week';
			}else if(calculation[0]['period'] == 3){
				period = 'start of month';
			}else if(calculation[0]['period'] == 4){
				period = 'end of month';
			}else if(calculation[0]['period'] == 5){
				period = 'to 15 of month, or end of month';
			}else if(calculation[0]['period'] == 6){
				period = 'end of quarter';
			}else if(calculation[0]['period'] == 7){
				period = 'half year';
			}else if(calculation[0]['period'] == 8){
				period = 'end of year';
			}

			myField.children('.order-pickup').children('span.time').html(time);
			myField.children('.order-pickup').children('span.period').html(period);
			myField.children('.order-pickup').children('span.day.pull-right').html(dayDate);

		}

		$(document).on('click','.show_tour',function(e){
			e.preventDefault();
			e.stopPropagation();
			var id = $(this).attr('value');
			$('#trips').DataTable().destroy();
			$('#offers').DataTable().destroy();

			$.ajax({
				url: "{{route('customer_business.getTourData')}}",
				type: 'GET',
				data: {
					'_token': $('input[name="_token"]').val(),
					'id':id,
				},
				success: function (data) {
					$('#tour-data .order-card-id.tour_number').html(data.id);
					$('#tour-data .card-sec-content.active').removeClass('active');
					setTrips(data);
					setOffers(data);
					setTourData(data);

					if(data.tour_dates != null && data.tour_dates.payment_speak_day){
						setDays(data.calculations,1,data.tour_dates.payment_speak_day);
					}else{
						$('#tour-data fieldset.payment').hide();
					}

					if(data.tour_dates != null && data.tour_dates.account_speak_day){
						setDays(data.calculations,0,data.tour_dates.account_speak_day);
					}else{
						$('#tour-data fieldset.account').hide();
					}

					if(data.tour_dates != null && data.tour_dates.cancellation_speak_day){
						setDays(data.calculations,3,data.tour_dates.cancellation_speak_day);
					}else{
						$('#tour-data fieldset.cancellation').hide();
					}

					if(data.tour_dates != null && data.tour_dates.test_speak_day){
						setDays(data.calculations,2,data.tour_dates.test_speak_day);
					}else{
						$('#tour-data fieldset.test').hide();
					}

					stops = data.stops;

					$('#tour-data').modal('toggle');
				},
			});




		});

	});
</script>


@endsection