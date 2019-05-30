@extends('backend.adminlte.layouts.app')
@section('htmlheader_title')
Documents
@endsection
 
@section('contentheader_title')
Documents
@endsection
 
@section('contentheader_description') 
@endsection


<!--breadcrumb current page-->
@section('previous_breadcrumb')
Documents
@endsection

@section('current_breadcrumb')
Document Types
@endsection



@section('main-content')

<div id="add-type" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">New Document Type</h4>
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
                            <strong>Name : </strong>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control name" type="text" placeholder="Name" />
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Description : </strong>
                        </div>
                        <div class="col-sm-8">
                            <textarea class="form-control description" placeholder="Description"></textarea>
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
<style type="text/css">
    button a,button a:hover,
    button a:active,button a.active{
        color: #FFF;
        display: block;
        text-decoration: none;
        width: 100%;
        height: 100%;
    }
    textarea{
        min-height: 150px;
        max-height: 150px;
        min-width: 100%;
        max-width: 100%;
    }
</style>
<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">
            <div class="first_row pull-right">
                <button type="button" class="btn btn-success btn-circle pull-right add" value="">
                    <i class="fa fa-plus"></i>
                    <span>{{trans('backend/email.new')}}</span>
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
                                <th>{{trans('backend/email.no')}}</th>
                                <th>{{trans('backend/email.name')}}</th>
                                <th>{{trans('frontend/order.desc')}}</th>
                                <th>{{trans('backend/email.action')}}</th>
                            </thead>

                            <tbody>
                                <?php $count = 0; ?> 
                                @foreach($data as $doc)
                                <tr class="selected{{$doc->id}}">
                                    <td>{{++$count}}</td>

                                    <td class="title"><a href="#" class="editable" data-type="text" data-doc-type="name" data-id="{{$doc->id}}">{{$doc->name}}</a></td>      
                                                            
                                    <td><a href="#" class="editable" data-type="text" data-doc-type="description" data-id="{{$doc->id}}">{{$doc->description}}</a></td>

                                    <td class="action">
                                        <button class="btn btn-success btn-xs edit" value="{{$doc->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>
            
                                        <button type="submit"class="btn btn-danger btn-xs delete" value="{{$doc->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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
                        <img style="width: 120px;" src="http://127.0.0.1:8000/images/filter.svg">
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


@endsection


@section('scripts')
@include('backend.adminlte.layouts.modals.confirm_delete')
<script type="text/javascript">
    $(function () {

        $('.breadcrumb .prev').toggle();
        $('.breadcrumb .prev a').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = "{{route('documents.index')}}";
        });
        
        var l = $('.ladda-button').ladda();
        var l5 = $('.ladda-button5').ladda();

        $('a.editable').editable({
            mode: 'inline',
            success: function(response,newValue){
                var prop = $(this).data('doc-type');
                var id = $(this).data('id');
                $.ajax({
                    url: "{{route('documents.editType')}}",
                    type: 'POST',
                    data: {
                    '_token' : $('input[name="_token"]').val(),
                        'id'    : id,
                        'value'    : newValue,
                        'prop' : prop,
                    } ,
                    success: function (data) {
                       
                        $.notify("Updated successfully \n Type "+prop+" Updated Successfully", {
                            position: "top right",
                            className: "success"
                        });
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            },
        });

        $(document).on('click','.add',function(){
            $('#add-type').modal('toggle');
        });

        $('#add-type').on('click','.btn-success',function(){
            $('.ladda-button').ladda('start');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('documents.storeType')}}",
                type: 'POST',
                data: {
                '_token' : $('input[name="_token"]').val(),
                    'name'    : $('#add-type .name').val(),
                    'description'    : $('#add-type .description').val(),

                } ,
                success: function (data) {
                   
                    $.notify("Saved successfully \n Type Saved Successfully", {
                        position: "top right",
                        className: "success"
                    });
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                        $('#add-type').modal('hide');
                        location.reload();
                    }, 2000);
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
		           url: "{{route('documents.destroyType')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Type Deleted Successfully",{ position:"top right" ,className:"success"});
		              $('#confirm-delete').modal('toggle');
                      location.reload();
		           },        
		           error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		          }

		        });

			});

		});
    })

</script>
@endsection

