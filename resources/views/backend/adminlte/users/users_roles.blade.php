@extends('backend.adminlte.layouts.app')


@section('htmlheader_title')
{{ trans('backend/user.role_list') }}
@endsection

@section('contentheader_title')
{{ trans('backend/user.role_list') }}
@endsection

@section('contentheader_description')
 

@endsection

<!--breadcrumb current page-->
@section('previous_breadcrumb')
{{ trans('backend/user.list') }}
@endsection

@section('current_breadcrumb')
{{ trans('backend/user.role_list') }}
@endsection

@section('main-content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div id="add-role" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{ trans('backend/user.create_new_role') }}</h4>
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
                <div class="box-body">    
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.name')}} :</strong>
	                        </div>	
	                        {!! Form::text('name', null, array('placeholder' =>trans('backend/user.name'),'class' => 'form-control')) !!}
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.display_name')}}:</strong>
	                        </div>	
	                        {!! Form::text('display_name', null, array('placeholder' =>trans('backend/user.display_name'),'class' => 'form-control')) !!}
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.description')}}:</strong>
	                        </div>	
	                        {!! Form::textarea('description', null, array('placeholder' => trans('backend/user.description'),'class' => 'form-control','style'=>'height:100px')) !!}
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.permission')}}:</strong>
	                       	</div>
	                       	<div class="col-sm-8">
	                        @foreach($permission as $value)
	                        <label style="width: 220px;">
	                        	<input type="checkbox" class="icheckbox_flat" name="permission" value="{{$value->id}}"> {{ $value->display_name }}
	                        </label>
	                        
	                        @endforeach
	                        </div>
	                    </div>
	                </div>
	            </div>

                <div class="box-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-home"></i>  {{ trans('backend/user.cancel') }}</button>       
                        <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-save"></i> {{ trans('backend/user.create') }}</button>
                    </div>
                </div> 
            </div>    
        </div>
    </div>
</div>

<div id="edit-role" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{ trans('backend/user.edit') }}</h4>
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
                <div class="box-body">    
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.name')}} :</strong>
	                        </div>	
	                        {!! Form::text('name', null, array('placeholder' =>trans('backend/user.name'),'class' => 'form-control' , 'disabled' => 'disabled')) !!}
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.display_name')}}:</strong>
	                        </div>	
	                        {!! Form::text('display_name', null, array('placeholder' =>trans('backend/user.display_name'),'class' => 'form-control')) !!}
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.description')}}:</strong>
	                        </div>	
	                        {!! Form::textarea('description', null, array('placeholder' => trans('backend/user.description'),'class' => 'form-control','style'=>'height:100px')) !!}
	                    </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12">
	                    <div class="form-group">
	                    	<div class="col-sm-4">
	                        	<strong>{{ trans('backend/user.permission')}}:</strong>
	                       	</div>
	                       	<div class="col-sm-8">
	                        @foreach($permission as $value)
	                        <label style="width: 220px;">
	                        	<input type="checkbox" class="icheckbox_flat" name="permission" value="{{$value->id}}"> {{ $value->display_name }}
	                        </label>
	                        
	                        @endforeach
	                        </div>
	                    </div>
	                </div>
	            </div>

                <div class="box-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><i class="fa fa-home"></i>  {{ trans('backend/user.cancel') }}</button>       
                        <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-save"></i> {{ trans('backend/user.save') }}</button>
                    </div>
                </div> 
            </div>    
        </div>
    </div>
</div>




  <div id="home">

    <div class="pag">
        <div class="row" style="margin-right: 2px;margin-bottom: 0;">
            @foreach($roles as $role)

            @endforeach

            <button type="button" class="btn btn-success btn-circle pull-right role-add" value="{{$role->id}}"><i class="fa fa-plus"></i> <span>{{ trans('backend/user.new_one') }}</span></button>
        </div>

        <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
            <thead>
                <tr style="background-color: #EEE;".selected_record>
                    <th>{{ trans('backend/user.no#') }}</th>
                    <th>{{ trans('backend/user.name') }}</th>
                    <th class="col-sm-4">{{ trans('backend/user.description') }}</th>
                    <th>{{ trans('backend/user.action') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($roles as $key => $role)
                    <tr class="tab-row{{$role->id}} selected_record">
                        <input type="hidden" class="role_id" name="role_id" value="{{$role->id}}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>    
                            <?php 
                                  $permission_role = \DB::table("permission_role")->where('role_id',$role->id)->pluck('permission_id');
                                  $permission = array();
                                  foreach ($permission_role as $key => $value) {
                                    $permission = \DB::table('permissions')->where('id',$value)->get();
                                    foreach($permission as $key){?> 
                                        <input type="hidden" name="permission_id" class="permission_id" id="{{$key->id}}">
                                    <?php }
                                  }
                                  
                            ?>      
                            

                                                           
                            <button type="button" class="btn btn-primary btn-xs  role-edit" alt=" {{trans('backend/user.edit')}}" value="{{$role->id}}" name="{{$role->name}}" display="{{$role->display_name}}" description="{{$role->description}}"><i class="fa fa-pencil"></i> {{ trans('backend/user.edit') }}</button>    

                            <button type="button" name="delete" class="btn btn-danger btn-xs  role-delete" alt=" {{trans('backend/user.delete')}}" value="{{$role->id}}"><i class="fa fa-trash"></i> {{ trans('backend/user.delete') }}</button>                
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    

  </div>

@endsection

@section('styles')

@endsection

@section('scripts')


@include('backend.adminlte.layouts.modals.confirm_delete')

@include('backend.adminlte.layouts.partials.scripts')
<script type="text/javascript">
    $(function(){

/*********************************************** Pagination Code***********************************************/
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var page = $(this).attr('href');
            getItems(page);
            window.history.pushState("", "", page);
        });                

        function getItems(page){
            $.ajax({
                url:page
            }).done(function(data){
                $('#home').html($(data).find(".pag"));
            });
        }

        $(".select2").select2();

        $("input[type=checkbox]").iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_minimal-blue'
        });

        function close(){
            $('.modal input[type="text"] , .modal input[type="number"]').val('');
            $('select').prop('selectedIndex',-1);
            $('.modal .alert').addClass('hidden');
            $('input[type=checkbox]').each(function(){
                    $(this).iCheck('uncheck');
            });
        }

        $('.modal .btn-danger , .modal .close').on('click',function(){
                close();
        });

        $('.breadcrumb .prev').show();
        $('.breadcrumb .prev a').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = "{{route('user.index')}}";
        });
/*************************************************Add Role********************************************************/
		$(document).on('click','.role-add',function(){
			$('#add-role').modal({ backdrop: 'static', keyboard: false });
            $('#add-role .btn-success').unbind('click');    
            $('#add-role .btn-success').on('click',function(e){
            	var perm=[];
                $.each($("input[name='permission']:checked"), function(){
                        perm.push($(this).val());
                });
                var name = $('#add-role input[name="name"]').val(),
                	display_name = $('#add-role input[name="display_name"]').val(),
                	description  = $('#add-role textarea').val();
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('users.addRole') }}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'name':name,
                        'display_name':display_name,
                        'description':description,
                        'permission':perm   
                    },
                    success: function(data) {
                        
                        if (isNaN(data)){
                          $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                          });            
                        }else if(data==1){
                            /*$('#add-user-modal').modal('toggle');
                            close();
                            id++;*/
                          $.notify("Saved successfully \n Role Saved Successfully",{ position:"top right" ,className:"success"});
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
/*************************************************Remove Role*****************************************************/
		$(document).on('click','.role-delete',function(){
			var id = $(this).val();
			$('#confirm-delete').modal({ backdrop: 'static', keyboard: false });
            $('#confirm-delete .btn-danger').unbind('click');    
            $('#confirm-delete .btn-danger').on('click',function(e){
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('users.removeRole')}}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'id':id
                    },
                    success: function(data) {   
                        $.notify("Deleted successfully \n Role Deleted Successfully",{ position:"top right" ,className:"success"});
                        $('#confirm-delete').modal('toggle');   
                        $('.tab-row'+id).remove();
                    },
                    
                });

            });
		});

/**************************************************Edit Role******************************************************/
		$(document).on('click','.role-edit',function(){
			var id = $(this).val(),
				name = $(this).attr('name'),
				display_name = $(this).attr('display'),
				description = $(this).attr('description');
				var IDs = [];
                var parent =$(this).parent();
                parent.find(".permission_id").each(function(){ IDs.push(this.id); });
                for (var i = IDs.length - 1; i >= 0; i--) {
                    $('#edit-role input[type=checkbox]').each(function(){
                        if($(this).val() == IDs[i]){
                            $(this).iCheck('check');
                        }
                    });
                }

			$('#edit-role input[name="name"]').val(name);
			$('#edit-role input[name="display_name"]').val(display_name);
			$('#edit-role textarea').val(description);	

			$('#edit-role').modal({ backdrop: 'static', keyboard: false });
            $('#edit-role .btn-success').unbind('click');    
            $('#edit-role .btn-success').on('click',function(e){
            	
            var name = $('#edit-role input[name="name"]').val(),
            	display_name = $('#edit-role input[name="display_name"]').val(),	
            	description  = $('#edit-role textarea').val()
            	perm=[];
                $.each($("#edit-role input[name='permission']:checked"), function(){
                        perm.push($(this).val());
                });

                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('users.editRole') }}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'role_id':id,
                        'permission' :perm,
                        'name' : name,
                        'display_name' : display_name,
                        'description'  : description
                    },
                    success: function(data) {
                        
                        if (isNaN(data)){
                          $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                          });            
                        }else if(data==1){
                            /*$('#add-user-modal').modal('toggle');
                            close();
                            id++;*/
                          $.notify("Updated successfully \n Role Updated Successfully",{ position:"top right" ,className:"success"});
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
/*****************************************************************************************************************/
    });
</script>
 
@endsection
