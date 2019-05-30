@extends('backend.adminlte.layouts.app')

@section('htmlheader_title')
{{ trans('backend/user.list') }}
@endsection

@section('contentheader_title')
{{ trans('backend/user.profile_details') }}
@endsection

@section('contentheader_description')


@endsection


<!--breadcrumb current page-->
@section('previous_breadcrumb')
{{ trans('backend/user.list') }}
@endsection

@section('current_breadcrumb')
{{ trans('backend/user.profile_details') }}
@endsection

@section('main-content')


@if ($message = Session::get('success'))
<div  class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div  class="alert alert-success" hidden>
    <p class="message"></p>
</div>



@foreach($data as $user)
@endforeach
<input type="hidden" name="user_id" class="user_id" value="{{$user->id}}">
<div class="col-sm-3 user-info">
	<div class="info">

		<div class="text-center" style="font-weight: bold;font-size: 15px;margin-bottom: 5px;">
			{{ $profile['first_name'] }}  {{ $profile['last_name']}}
		</div>

		<div class="text-center" style="margin-bottom: 10px;">{{ $user->profile->company }}</div>

		<div class="row">
			<span style="width: 50px;">{{trans('backend/user.email')}}</span>
			<span>{{$user->email}}</span>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<span>{{trans('backend/user.user_status')}}</span>
				<?php $status = '';
					$user_status = $profile['user_status_id'];
						if($user_status == 1){
							$status = 'Active';
						}else if($user_status == 2){
							$status = 'In Active';
						}else if($user_status ==3){
                            $status = 'Pending';
                        }else if($user_status ==4){
                            $status = 'Suspended';
                        }else{
                            $status = 'Check Database :)';
                        }
				?>
			<span><?php echo $status; ?></span>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="roles">
		<h4>Roles</h4>
		<div class="row">
           
			@if(!empty($user_roles))
                @foreach($user_roles as $v)
                    <span class="label label-primary" style="background-color: #4e7b68 !important;width: auto;">{{ $v->display_name }}</span>
                @endforeach
            @endif
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="col-sm-9 user-details">
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" href="#home">{{ trans('backend/user.user_account_details') }}</a></li>
	  <li><a data-toggle="tab" href="#menu1" style="padding-left:10px; padding-right:10px;">{{ trans('backend/user.user_profile_details') }}</a></li>
	  <li><a data-toggle="tab" href="#menu2" style="padding-left:10px; padding-right:10px;">{{ trans('backend/user.user_address_details') }}</a></li>
	  

	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			{!! Form::close() !!}   {!! Form::model($user, ['method' => 'PATCH']) !!}
		        <div class="row" style="padding: 0;margin: 0;">
		            <div class="col-xs-12 col-sm-12 col-md-12">
		                <div class="box box-solid">

		                    <div class="box-header with-border">
		                        <h3 class="box-title">{{ trans('backend/user.edit_form') }}</h3>
		                    </div>
		                    <div class="box-body">
		                        <div class="col-xs-12 col-sm-12 col-md-12">
		                            <div class="form-group">
		                            	<div class="col-sm-3">
		                                	<strong>{{ trans('backend/user.email') }}:</strong>
		                                </div>
		                                {!! Form::text('email', null, array('placeholder' => trans('backend/user.email'),'class' => 'form-control','disabled'=>'disabled')) !!}
		                            </div>
		                        </div>
		                        <div class="col-xs-12 col-sm-12 col-md-12">
		                            <div class="form-group">
		                            	<div class="col-sm-3">
		                                	<strong>Password:</strong>
		                                </div>
		                                {!! Form::password('password', array('placeholder' => trans('backend/user.password'),'class' => 'form-control')) !!}
		                            </div>
		                        </div>
		                        <div class="col-xs-12 col-sm-12 col-md-12">
		                            <div class="form-group">
		                            	<div class="col-sm-3">
		                                	<strong>Confirm Password:</strong>
		                                </div>
		                                {!! Form::password('confirm-password', array('placeholder' => trans('backend/user.password_confirmation'),'class' => 'form-control confirm_password')) !!}
		                            </div>
		                        </div>
		                        <div class="col-xs-12 col-sm-12 col-md-12">
		                            <div class="form-group">
		                            	<div class="col-sm-3">
		                                	<strong>{{ trans('backend/user.roles') }}:</strong>
		                                </div>
		                                <select class="form-control" multiple id="roles" name="roles[]" tabindex="1">
                                            <?php
                                                $id = $user->id;
                                                $user_roles = \DB::table('user_roles')->where('user_id' , '=' , $id)->get();
                                            ?>
                                            
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}" attre='<?php echo $id; ?>' style="padding: 5px;">{{$role->display_name}}</option>

                                            @endforeach

                                            @foreach($user_roles as $row)
                                                <input type="hidden" name="test" class="test" value="{{$row->role_id}}">
                                            @endforeach

				                        </select>
		                            </div>
		                        </div>
		                    </div>


		                    <div class="box-footer">
		                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		                            <button type="button" class="btn btn-success pull-right user-acc-edit"><i class="fa fa-save"></i> {{ trans('backend/user.save') }}</button>
		                        </div>
		                    </div>

		                </div>

		            </div>
		     </div>
		</div>
		<div id="menu1" class="tab-pane fade">
		    {!! Form::model($user->profile) !!}
            <div class="row" style="padding: 0;margin: 0;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('backend/user.user_profile_edit') }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>{{ trans('backend/user.first_name') }}:</strong>
                                    </div>
                                    {!! Form::text('first_name', null, array('placeholder' => trans('backend/user.first_name'),'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>{{ trans('backend/user.last_name') }}:</strong>
                                    </div>
                                    {!! Form::text('last_name', null, array('placeholder' => trans('backend/user.last_name'),'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>{{ trans('backend/user.company') }}:</strong>
                                    </div>
                                    {!! Form::text('company', null, array('placeholder' =>trans('backend/user.company'),'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>{{ trans('backend/user.phone') }}:</strong>
                                    </div>
                                    {!! Form::text('phone', null, array('placeholder' =>trans('backend/user.phone'),'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>{{ trans('backend/user.fax') }}:</strong>
                                    </div>
                                    {!! Form::text('fax', null, array('placeholder' => trans('backend/user.fax'),'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>Url:</strong>
                                    </div>
                                    {!! Form::text('url', null, array('placeholder' =>'url','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
    	                                <strong>{{ trans('backend/user.expire_date') }}:</strong>
    	                            </div>
    	                                {!! Form::text('expire_date', null, array('placeholder' =>trans('backend/user.expire_date'),'class' => 'form-control DatePicker')) !!}

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                	<div class="col-sm-3">
                                    	<strong>{{ trans('backend/user.user_status') }}:</strong>
                                    </div>
                                    <select class="select2 form-control" name="user_status_id">
                                    	<option>{{trans('backend/user.select_item_from_list')}}</option>
                                    	<?php   $status=    \DB::table('user_statues')->get();
                                        ?>
                                        @foreach($status as $key)
                                            @if($key->id == $profile['user_status_id'])
                                            <option value="{{$key->id}}" selected>{{$key->name}}</option>
                                            @else
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                            @endif
                                            
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="box-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="button" class="btn btn-success pull-right user-profile-edit"><i class="fa fa-save"></i> {{ trans('backend/user.save') }}</button>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            {!! Form::close() !!}
		</div>
		<div id="menu2" class="tab-pane fade">
            {!! Form::model($user->profile) !!}
            <div class="row" style="padding: 0;margin: 0;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('backend/user.address_edit') }}</h3>
                      
                        </div>
                        
                        <div class="box-body">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <strong>{{ trans('backend/user.country') }}:</strong>
                                    </div>
                                    <input type="text" name="country" id="country" class="form-control" placeholder="{{trans('backend/user.country')}}" value="{{$profile['country']}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <strong>{{ trans('backend/user.address') }}:</strong>
                                    </div>
                                    <input class="form-control" type="text" name="address" placeholder="{{trans('backend/user.address')}}" value="{{$profile['address']}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <strong>{{ trans('backend/user.district') }}:</strong>
                                    </div>
                                    <input class="form-control" type="text" name="district" placeholder="{{trans('backend/user.district')}}" value="{{$profile['district']}}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <strong>{{ trans('backend/user.postal_code') }}:</strong>
                                    </div>
                                    <input class="form-control" type="number" name="postal_code" placeholder="{{trans('backend/user.postal_code')}}" min="0" value="{{$profile['postal_code']}}">
                                </div>
                            </div>


                        </div>
                        <div class="box-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="button" class="btn btn-success pull-right user-acc-edit"><i class="fa fa-save"></i> {{ trans('backend/user.save') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

		</div>

		

@endsection

@section('styles')

<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: #666;
    }
    .user-info>div{
    	background-color: #EEE;
    	padding: 10px;
    	border-radius: 5px;
    	border-top: 4px solid #3C8DBC;
    	margin-bottom: 20px;
    }
    .user-info .row {
    	padding: 0;
    	margin: 0;
    	border-top: 1px dashed #777;
    }
    .user-info .row span{
    	padding: 10px 0;
    	display: inline-block;
    }
    .user-info .row span:first-of-type{
    	font-weight: bold;
    	width: 78px;
    }
    .user-info .row span:nth-of-type(2){
    	color:#044e22;
    	float: right;
    }
    .user-info .row:last-of-type{
    	border-bottom: 1px dashed #777;
    	margin-bottom: 15px;
    }
    .roles{
    	padding-top: 5px !important;
    }
    .roles h4{
    	border-bottom: 1px dashed #777;
    	padding-bottom: 5px;
    }
    .roles .row{
    	border: 0 !important;
    	margin-bottom: 0 !important;
    }
    .roles .row span{
    	padding: 3px;
    	display: inline-block;
    	float: left;
    	margin-bottom: 5px;
    }
    .content-wrapper, .right-side , .wrapper{
        background-color: #FFF !important;
    }
    .label{
        background-color: #358eda;
        padding: 5px;
        margin-bottom: 10px;
        display: inline-block;
    }
  	.content{
  		min-height: 670px;
  	}
    .row{
        padding-right: 50px;
        margin-bottom: 20px;
    }
    button i{
        font-size: 13px;
        margin-right: 5px;
    }
    .table{
        color: #495060;
    }
    .table thead tr > th{
        text-align: center;
        padding: 12px 5px;
    }
    .table tbody tr > td{
        text-align: center;
        padding: 10px 7px;
        font-size: 14px;
    }
    .table tbody tr:hover{
        cursor: pointer;
        -webkit-transition: all ease-in-out .3s;
        -moz-transition: all ease-in-out .3s;
        -o-transition: all ease-in-out .3s;
        transition: all ease-in-out .3s;
        background-color: #EBF7FF;
    }
    .table tbody .tab-row.active,.table tbody tr:active{
        background-color: #DDD;
    }
    .btn-warning{
        background-color: #FFAD33;
        padding: 6px 5px;
        padding-left: 10px;
        display: inline-block;
        font-size: 12px;
    }
    .btn-warning:hover{
        opacity: .8;
    }
    .tax-delete{
        padding: 0;
        font-size: 12px;
        padding: 2px 7px;
        background-color: #ed3f14;
    }
    .taxs .text{
        border: 1px solid #e9eaec;
        background-color: #f7f7f7;
        padding: 5px;
        display: block;
        width: fit-content;
        margin: auto;
        margin-bottom: 10px;
    }
    .taxs .rate{
        min-width: 40px;
    }
    th.edit{
        position: relative;
    }
    th.edit div{
        position: absolute;
        top: 0;
        left: 0;
        padding: 5px 15px;
        display: block;
        width: 100%;
        text-align: center;
    }
    td .btn{
        margin-bottom: 5px;
    }
    .tab-pane{
        padding: 15px;
        border: 1px solid #DDD;
        border-top: 0;
    }
    .select2,.form-control{
        width: 50% !important;
        display: inline-block;
    }
</style>
@endsection

@section('scripts')

@include('backend.adminlte.layouts.modals.confirm_delete')



<script type="text/javascript">
    $(function(){

/***********************************************************************************************************/
        $(".select2").select2();
        $("#menu1 .select2").val("{{$profile['user_status_id']}}").trigger('change');
        var selected=[];
        $('#home .test').each(function(){
            selected.push($(this).val());
        });
        option = document.getElementById("roles").options;
        for (var i = 0; i < selected.length; i++) {
            option[selected[i]-1].setAttribute('selected', 'selected');
        }

        $("input[type=checkbox]").iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_minimal-blue'
        });

        function close(){
            $('.modal input').val('');
            $('select').prop('selectedIndex',-1);
            $('.modal .alert').addClass('hidden');
            $('input[type=checkbox]').each(function(){
                    $(this).iCheck('uncheck');
            });
        }
        $('.modal .btn-danger , .modal .close').on('click',function(){
                close();
           });
        

        $("#home .roles").select2({
            placeholder: "Select Roles"
        });

        $("#menu1 .select2").select2({
            placeholder: "Select Status"
        });

        $('.breadcrumb .prev').toggle();
        $('.breadcrumb .prev a').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = "{{URL::to('backend/users_view')}}";
        });
/***********************************************Account Details**************************************************/
		$('#home').on('click','.user-acc-edit',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$('.user_id').val();
            var email = $('input[name=email]').val();
            var password = $('input[name=password]').val();
            var confirm_password = $('.confirm_password').val();
            var roles=[];
            $('#home #roles option:selected').each(function(){
                roles.push($(this).val());
            });

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                type: 'post',
                url: '{{route('users.editUserAcc')}}',
                data: {
                    '_token': $('#modal input[name=_token]').val(),
                    'id':id,
                    'email':email,
                    'password':password,
                    'password_confirmation':confirm_password,
                    'roles':roles
                    },
                success: function(data) {
                        if (isNaN(data)){
                          $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                          });            
                        }else if(data==1){
                          $.notify("Updated successfully \n User Account Details Updated Successfully",{ position:"top right" ,className:"success"});
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
/***********************************************Profile Details***************************************************/
        $('#menu1').on('click','.user-profile-edit',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$('.user_id').val(),
                fname = $('input[name="first_name"]').val(),
                lname = $('input[name="last_name"]').val(),
                company = $('input[name="company"]').val(),
                phone = $('input[name="phone"]').val(),
                fax = $('input[name="fax"]').val(),
                url = $('input[name="url"]').val(),
                expire_date = $('input[name="expire_date"]').val(),
                user_status_id = $('#menu1 .select2 option:selected').val();

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                type: 'post',
                url: '{{ route('users.editUserProfile')}}',
                data: {
                    '_token': $('#modal input[name=_token]').val(),
                    'id':id,
                    'first_name':fname,
                    'last_name':lname,
                    'company':company,
                    'phone':phone,
                    'fax':fax,
                    'url':url,
                    'expire_date':expire_date,
                    'user_status_id':user_status_id

                    },
                success: function(data) {
                        if (isNaN(data)){
                          $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                          });            
                        }else if(data==1){
                          $.notify("Updated successfully \n User Profile Details Updated Successfully",{ position:"top right" ,className:"success"});
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
/**********************************************Address Edit*****************************************************/
        $('#menu2').on('click','.user-acc-edit',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$('.user_id').val();
            country = $('input[name="country"]').val();
            address = $('input[name="address"]').val();
            district = $('input[name="district"]').val();
            postal_code = $('input[name="postal_code"]').val();
                    
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                    type: 'post',
                    url: '{{ route('users.editUserAddress') }}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'id':id,
                        'country':country,
                        'address':address,
                        'district':district,
                        'postal_code':postal_code,
                        },
                    success: function(data) {
                        if (isNaN(data)){
                          $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                          });            
                        }else if(data==1){
                          $.notify("Updated successfully \n User Address Details Updated Successfully",{ position:"top right" ,className:"success"});
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
/***************************************************************************************************************/


    });
</script>

@endsection
