@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
Pages
@endsection
 
@section('contentheader_title')
Pages
@endsection
 
@section('contentheader_description') 
	@yield('customer_business_title')
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
Pages
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
                        <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
                            id="emails-table">
                            <thead>
                                <th>No#</th>
                                <th>Title</th>
                                <th>Route</th>
                                <th>Layout</th>
                                <th>Actions</th>
                            </thead>

                            <tbody>
                                <?php $count = 0; ?> 
                                @foreach($data as $page)
                                <tr class="selected{{$page->id}}">
                                    <td>{{++$count}}</td>

                                    <td class="title">{{$page->title}}</td>
                                   
                                    
                                    <td class="route">{{$page->route}}</td>
                                    <td class="layout" data-layout="{{$page->layout}}" >------</td>
                                    <td class="action">
                                        <button class="btn btn-success btn-xs edit" value="{{$page->id}}"><i class="fa fa-edit"></i> Edit</button>
                                        
                                        <button type="submit" class="btn btn-danger btn-xs delete" value="{{$page->id}}"><i class="fa fa-close"></i> Delete</button>
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

@include('Pages.Views.Modals.add_route')
@include('Pages.Views.Modals.edit_route')
@include('backend.adminlte.layouts.modals.confirm_delete')
@endsection

@section('scripts')
	<script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>

	<script type="text/javascript">
		function initTiny(element){
			tinyMCE.init({
	            'formats' : {
	                
	                'alignright' : {'selector' : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', attributes: {"align":  'right'}},
	                
	            }
	        });
	        tinymce.init({
	                selector: element,
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
		}
	</script>
	<script type="text/javascript">
		$(function(){

			var l = $('.ladda-button').ladda();

			$(document).on('click', '.add', function () {
				initTiny('#add-route textarea.layout');
				setTimeout(function () {
	            	$('#add-route').modal('toggle');
				}, 1000);
	        });

			$(document).on('click','#add-route .btn-success',function(){
		        $('.ladda-button').ladda('start');

				$.ajax({
					url: "{{URL::to('/backend/pages/storePage')}}",
					type: 'POST',
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						'title': $('input.title').val(),
						'route': $('input.route').val(),
						'layout': tinyMCE.activeEditor.getContent(),
					},
					success: function (data) {
						$.notify("Saved successfully \n Page Saved Successfully", {
							position: "top right",
							className: "success"
						});
                    	$('.ladda-button').ladda('stop');
                    	$('#add-route').modal('hide');
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
	            var id = $(this).attr('value');
	            var title = $(this).parents('td').siblings('td.title').text();
	            var route = $(this).parents('td').siblings('td.route').text();
	            var layout = $(this).parents('td').siblings('td.layout').data('layout');

	            $('#edit-route input.title').val(title);
	            $('#edit-route input.route').val(route);
	            $('#edit-route .btn-success').attr('data-id',id);

	            $('#edit-route .layout').html(layout);
				initTiny('#edit-route textarea.layout');

	            setTimeout(function () {
	            	$('#edit-route').modal('toggle');
				}, 1000);


	        });

	        $(document).on('click','#edit-route .btn-success',function(){
		        $('.ladda-button').ladda('start');

				$.ajax({
					url: "{{URL::to('/backend/pages/editPage')}}",
					type: 'POST',
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						'id' : $(this).data('id'),
						'title': $('#edit-route input.title').val(),
						'route': $('#edit-route input.route').val(),
						'layout': tinyMCE.activeEditor.getContent(),
					},
					success: function (data) {
						$.notify("Updated successfully \n Page Updated Successfully", {
							position: "top right",
							className: "success"
						});
                    	$('.ladda-button').ladda('stop');
                    	$('#edit-route').modal('hide');
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

				$.ajax({
					url: "{{URL::to('/backend/pages/destroyPage')}}",
					type: 'POST',
					data: {
						'_token': $('meta[name="csrf-token"]').attr('content'),
						'id' : $(this).data('id'),
					},
					success: function (data) {
						$.notify("Deleted successfully \n Page Deleted Successfully", {
							position: "top right",
							className: "success"
						});
                    	$('.ladda-button').ladda('stop');
						$('#confirm-delete').modal("hide");
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

