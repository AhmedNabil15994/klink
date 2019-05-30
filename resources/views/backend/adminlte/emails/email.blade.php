@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/email.list') }}
@endsection
<script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>
 
@section('contentheader_title')
{{ trans('backend/email.list') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/email.list') }}
@endsection


@section('current_breadcrumb') {{ trans('backend/email.list') }}
@endsection




@section('main-content')
    @include('backend.adminlte.emails.addingModal')
    @include('backend.adminlte.emails.editingModal')

<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">
            <div class="row" style="margin-bottom: -35px;margin-right: 2px;">
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
                                <th>{{trans('backend/email.subject')}}</th>
                                <th>{{trans('backend/email.layout')}}</th>
                                <th>{{trans('backend/email.action')}}</th>
                            </thead>

                            <tbody>
                                <?php $count = 0; ?> @foreach($emails as $email)
                                <tr class="selected{{$email->id}}">
                                    <td>{{++$count}}</td>

                                    <td class="title">{{$email['title']}}</td>
                                    <?php $subject = json_decode($email['subject'],true); ?>
                                    
                                    <td class="Subject">{{$subject[$languages[0]['shortcut']]}}</td>
                                    <td class="layout">------</td>
                                    <td class="action">
                                        <button class="btn btn-success btn-xs edit" value="{{$email->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>
                                        <?php $disabled = $email->is_main ? 'disabled': ''?>
                                        <button type="submit" {{$disabled}} class="btn btn-danger btn-xs delete" value="{{$email->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
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
            @if(count($emails)==0)
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




@section('scripts')
    @include('backend.adminlte.layouts.modals.confirm_delete')

<script type="text/javascript">
    $(function () {
        
        $(document).on('click', '.add', function () {
            $('#add-email').modal('toggle');
        });
        $(document).on('click','.edit',function(){
            $('#edit-email').modal('toggle');
            window.emails = {!! json_encode($emails->toArray()) !!};
            var currentId = $(this).val();
            window.emails = window.emails.filter(function(email){
                
                return Number(email.id)===Number(currentId);
            })
            window.emails = window.emails[0];
            window.emails.subject = JSON.parse(window.emails.subject);
            window.emails.layout = JSON.parse(window.emails.layout);
            if(!window.emails&&!window.emails.id){
                return false;
            }
            tinyMCE.get('EditEmailLayout').setContent(window.emails.layout['{{$languages[0]['shortcut']}}'])
            $('#edit-email .title').val(window.emails.title)
            $('#edit-email .subject').val(window.emails.subject['{{$languages[0]['shortcut']}}'])
            $('#edit-email .emailId').val(window.emails.id)
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
		           url: "{{route('email.destroy')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Shipping Type Deleted Successfully",{ position:"top right" ,className:"success"});
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
    })

</script>
@endsection

@endsection