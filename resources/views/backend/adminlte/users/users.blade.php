@extends('backend.adminlte.layouts.app')

@section('htmlheader_title')
{{ trans('backend/user.list') }}
@endsection

@section('contentheader_title')
{{ trans('backend/user.list') }}
@endsection

@section('contentheader_description')
    @if($type)
        {{ trans('backend/user.list_'.$type) }}
    @else
        {{ trans('backend/user.list') }}
    @endif
@endsection



<!--breadcrumb current page-->
@section('current_breadcrumb')
    @if($type)
        <a href="{{route('user.index')}}">
        <i class="fa fa-user"></i>
        {{trans('backend/user.title')}}
    </a>
</li>
<li>
    
    {{trans('backend/user.type_'.$type)}}
    @else
    <i class="fa fa-user"></i>
    {{trans('backend/user.title')}}
    @endif
@endsection

@section('main-content')
<style type="text/css">
    td div.row{
        display: block;
        width: fit-content;
        margin: auto;
        margin-top: 3px;
    }
    td span.text-left{
        color: #716f6f;
        display: block;
    }
    td span i{
        margin-right: 2px;
        color: #999;
        width: 15px;
    }
    .ul-row{
        border-bottom: 1px solid #DDD;
        margin-left: 0px;
        margin-right: 5px;
    }
    .row.ul-row{
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    ul.panel-nav {
        display: inline-block;
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: transparent;
    }
    ul.panel-nav li {
        float: left;
    }
    ul.panel-nav li a.active {
        border-bottom: 2px solid #5fbeaa;
        color: #111;
    }
    ul.panel-nav li a:hover {
        color: #111;
    }
    ul.panel-nav li a {
        display: block;
        color: silver;
        text-align: center;
        padding: 10px!important;
        margin-bottom: 0;
        text-decoration: none;
        font-weight: bold;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: #666;
    }
    table td{
        text-align: left !important;
    }
    .table tbody tr > td:first-of-type,
    .table tbody tr > td:last-of-type{
        text-align: center !important;
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
    #form_search input.form-control{
        display: block;
        width: 100% !important;
        position: relative;
    }
    #form_search .input-group-btn{
        position: absolute;
        right: 0;
    }
    .row{
        margin-bottom: 20px;
    }
    button i{
        font-size: 13px;
        margin-right: 5px;
    }
    .table{
        color: #495060;
        border: 1px solid #DDD;
    }
    .table thead tr > th{
        text-align: center;
        padding: 12px 5px;
    }
    .table tbody tr > td{
        /*text-align: center;*/
        padding: 10px 7px;
        font-size: 14px;
    }
    .table tbody .selected_record:hover{
        cursor: pointer;
        -webkit-transition: all ease-in-out .3s;
        -moz-transition: all ease-in-out .3s;
        -o-transition: all ease-in-out .3s;
        transition: all ease-in-out .3s;
        background-color: #EBF7FF;
    }
    .table tbody .tab-row.active,.table tbody .selected_record:active{
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
    #datatable_paginate{
        text-align: left;
    }
    .dataTables_wrapper .row:first-of-type .col-sm-6:first-of-type{
        float: left;
    }
    #datatable_wrapper .row:last-of-type{
        margin-top: 30px;
    }
    .dataTables_filter{
        display: none;
    }
    .dataTables_length,
    .pagination{
        float: left;
    }
    .dataTables_wrapper .row .col-sm-5{
        float: right;
    }
    .dataTables_wrapper .row .col-sm-5 .dataTables_info{
        float: right;
    }
    #search{
        float: none;
    }
    .pag{
        min-height: 300px;
    }
    .tab-content{
        border: 1px solid #DDD;
        box-shadow: 5px 5px 5px #999;
    }
</style>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div id="add-user-modal" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{ trans('backend/user.create_new') }}</h4>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input. <br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
        {!! Form::open(array('route' => 'users.create','method'=>'POST')) !!}
            <div class="box-body">


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Name :</strong>
                        </div>
                        {!! Form::text('text', null, array('placeholder' => trans('backend/user.first_name') ,'class' => 'form-control fname' , 'style' => 'width:24.5% !important')) !!}
                        {!! Form::text('text', null, array('placeholder' => trans('backend/user.last_name') ,'class' => 'form-control lname' , 'style' => 'width:24.5% !important')) !!} 
                        

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.phone')}} / {{trans('backend/user.home_phone')}} :</strong>
                        </div>
                        {!! Form::number('number', null, array('placeholder' => trans('backend/user.phone') ,'class' => 'form-control phone', 'style' => 'width:24.5% !important' )) !!}
                        {!! Form::number('number', null, array('placeholder' => trans('backend/user.home_phone') ,'class' => 'form-control home_phone', 'style' => 'width:24.5% !important' )) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.address')}} / {{trans('backend/user.home')}} :</strong>
                        </div>
                        {!! Form::text('text', null, array('placeholder' => trans('backend/user.address') ,'class' => 'form-control street' , 'style' => 'width:24.5% !important')) !!}
                        {!! Form::number('number', null, array('placeholder' => trans('backend/user.home') ,'class' => 'form-control home' , 'style' => 'width:24.5% !important')) !!} 
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.postal_code')}} / {{trans('backend/user.district')}} :</strong>
                        </div>
                        {!! Form::number('number', null, array('placeholder' => trans('backend/user.postal_code') ,'class' => 'form-control postal_code' , 'style' => 'width:24.5% !important')) !!}
                        {!! Form::text('text', null, array('placeholder' => trans('backend/user.district') ,'class' => 'form-control district' , 'style' => 'width:24.5% !important')) !!} 
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.country')}} / {{trans('backend/user.company')}} :</strong>
                        </div>
                        {!! Form::text('text', null, array('placeholder' => trans('backend/user.country') ,'class' => 'form-control country' , 'style' => 'width:24.5% !important')) !!}
                        {!! Form::text('text', null, array('placeholder' => trans('backend/user.company') ,'class' => 'form-control company' , 'style' => 'width:24.5% !important')) !!}
                        
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.email')}} :</strong>
                        </div>
                        {!! Form::email('email', null, array('placeholder' => trans('backend/user.email'),'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.password')}} :</strong>
                        </div>
                        {!! Form::password('password', array('placeholder' => trans('backend/user.password'),'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.password_confirmation')}} :</strong>
                        </div>
                        {!! Form::password('password_confirmation', array('placeholder' => trans('backend/user.password_confirmation'),'class' => 'form-control')) !!}
                    </div>
                </div>
            
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding-bottom: 20px;border-bottom: 1px solid #DDD;">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{ trans('backend/user.roles') }}:</strong>
                        </div>
                        <select class="roles form-control select2" multiple id="roles" tabindex="1">
                        @foreach($roles as $role)
                            

                            <option value="{{$role->id}}" value1="{{$role->name}}">{{$role->display_name}}</option>

                        @endforeach
                        </select>
                    </div>
                </div>
           </div>
           <div class="box-footer pull-right" style="border-top: 0">
                <button type="submit" class="btn btn-success" style="background-color: #449d44"><i class="fa fa-save"></i> {{ trans('backend/user.create') }}</button>
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('backend/user.cancel') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>
</div>

<div id="add-admin-modal" class="modal fade">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{ trans('backend/user.create_new_admin') }}</h4>
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
        {!! Form::open(array('route' => 'admins.addAdmin','method'=>'POST')) !!}
              <div class="box-body">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.name')}} :</strong>
                        </div>
                        {!! Form::text('name', null, array('placeholder' => trans('backend/user.name'),'class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.email')}} :</strong>
                        </div>
                        {!! Form::text('email', null, array('placeholder' => trans('backend/user.email'),'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.password')}} :</strong>
                        </div>
                        {!! Form::password('password', array('placeholder' => trans('backend/user.password'),'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/user.password_confirmation')}} :</strong>
                        </div>
                        {!! Form::password('password_confirmation', array('placeholder' => trans('backend/user.password_confirmation'),'class' => 'form-control')) !!}
                    </div>
                </div>
            
                
           </div>
           <div class="box-footer pull-right" style="border-top: 0">
                <button type="submit" class="btn btn-success" style="background-color: #449d44"><i class="fa fa-save"></i> {{ trans('backend/user.create') }}</button>
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('backend/user.cancel') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>
</div>

@include('backend.adminlte.users.editAdminModal')
@if(isset($hidden)&&$hidden==true)
    <style>
        .al{
            display: none !important;
        }
    </style>
@endif

<div class="tab-content">
  <div id="home" class="tab-pane active in">
    <div class="row ul-row">
        <ul class="panel-nav pull-left">
            <li><a class="active al" id="state-all" href="javascript:void(0)" link="{{route('users.users_view')}}">{{trans('backend/user.all')}}</a></li>
            <li><a class="al" id="inact" href="javascript:void(0)" link="{{route('users.inactivated')}}">{{trans('backend/user.notact')}}</a></li>
            <li><a class="al" id="new" href="javascript:void(0)" link="{{route('users.new')}}">{{trans('backend/user.new')}}</a></li>
            <li><a class="al" id="pend" href="javascript:void(0)" link="{{route('users.pend')}}">{{trans('backend/user.pend')}}</a></li>
            <li><a class="al" id="susp" href="javascript:void(0)" link="{{route('users.susp')}}">{{trans('backend/user.susp')}}</a></li>
            <li><a class="al" id="expire" href="javascript:void(0)" link="{{route('users.expire')}}">{{trans('backend/user.expire')}}</a></li>
            {{-- <li><a class="al" id="plan" href="javascript:void(0)" link="{{route('users.admin')}}">{{trans('backend/user.admin')}}</a></li> --}}
            {{-- <li><a class="al" id="roles" href="javascript:void(0)" link="{{route('users.rolesUser')}}{{$type ? '?type='.$type : ''}}">{{trans('backend/user.role')}}</a></li> --}}

        </ul>
        <select class="form-control pull-right types" style="width: auto !important">
            <option>{{trans('backend/user.all')}}</option>
            <option value="User">{{trans('backend/user.type_user')}}</option>
            <option value="Company">{{trans('backend/user.type_company')}}</option>
            <option value="Driver">{{trans('backend/user.type_driver')}}</option>
        </select>
        <input type="hidden" name="checkType" id="checkType">
    </div>
    <div class="pag">
        
         <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm" id="users-table">
            <thead>
                <tr style="background-color: #EEE;">
                <th>{{ trans('backend/user.no#') }}</th>
                <th style="padding: 0;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.email') }}" id="search"></th>
                <th class="col-sm-4" style="padding: 0;"><input type="text" style="margin-bottom: 5px;margin-right: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.roles') }}" id="search2"><a class="btn btn-primary btn-xs" href="{{ route('users.users_roles') }}"><i class="fa fa-pencil"></i></a></th>
                <th>{{ trans('backend/user.action') }}</th>
            </tr>
            </thead>

            <tbody>
                <?php $i = 0; ?>
                @foreach ($data as $key => $users)
                <form class="form{{$users->id}}" action="{{route('users.editUser',$users->id)}}" method="get">
                    <tr class="tab-row{{$users->id}} selected_record">
                        <input type="hidden" class="user_id" name="user_id" value="{{$users->id}}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $users->email }}<br>
                            <div class="row">
                                <span class="text-left">
                                @if(!empty($users->name))
                                <i class="fa fa-user"></i> {{$users->name}}
                                @elseif(!empty($users->profile->name() )) 
                                <i class="fa fa-user"></i> {{$users->profile->name()}}
                                @endif
                                </span>
                                <span class="text-left">
                                    @if(!empty($users->profile->postal_code))
                                    <i class="fa fa-home"></i> {{$users->profile->postal_code}}
                                    @endif
                                </span>
                                <span class="text-left">
                                    @if(!empty($users->profile->phone))
                                    <i class="fa fa-phone"></i> {{$users->profile->phone}}
                                    @endif 
                                </span>
                            </div>
                        </td>
                        <td>
                            <?php 
                                $rolea  = [];
                                $user_roles = \DB::table('user_roles')->where('user_id','=',$users->id)->get();
                                foreach ($user_roles as $key => $value) {
                                    $rolea[] = \DB::table('roles')->where('id','=',$value->role_id)->first(); ?>
                                
                                <?php }

                            ?>

                            @foreach($rolea as $one => $values)
                            <label class="label">{{$values->display_name }}</label>
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-success btn-xs stop" target="_blank" href="/loginasAdmin/{{$users->id}}" > <i class="fa fa-sign-in-alt" style="margin-right:5px;"></i> login</a>
                            <button type="button" name="delete" class="btn btn-danger btn-xs  delete" alt=" {{trans('backend/user.delete')}}" value="{{$users->id}}"><i class="fa fa-trash"></i> {{ trans('backend/user.delete') }}</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>

        </table>
        @if(!count($data))
                    <style type="text/css">
                        tbody,
                        .dataTables_wrapper .row:last-of-type,
                        .dataTables_wrapper .row:first-of-type{
                            display: none;
                        }
                    </style>
                    <div id="overlayError">
                        <div class="row" style="margin-top: 20px;display: block;">
                            <div class="col-xs-6 text-left pull-right">
                                <img style="width: 120px;" src="{{asset('img/filter.svg')}}">
                            </div>
                            <div class="col-xs-6 text-right">
                                <div class="callout callout-info" style="margin-top: 50px;">
                                    <h4>{{trans('backend/user.no_result')}}<i class="fa fa-exclamation fa-fw"></i></h4>
                                    <p>{{trans('backend/user.no_result_now')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
        @endif

    </div>

  </div>
</div>



@endsection

@section('styles')

@endsection

@section('scripts')

@include('backend.adminlte.layouts.modals.confirm_delete')

<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">



<script type="text/javascript">
    $(function(){

        $(document).on('change','.types',function(){
            $('#state-all').addClass('active').parents('li').siblings().children('a').removeClass('active');
            var value = $(this).val();
            if(value == "All"){
                $('#checkType').removeAttr('value');
            }else{
                $('#checkType').val(value);
            }
            

            var outerBox = '#home';
            var Box = '#home .pag';
            var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
            $(Box + ' #overlayPagination').remove();
            $(Box).append(loaging);
            if(value != '' || value != null){
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                    $.ajax({
                        type: 'post',
                        url: '{{ route('users.getData') }}',
                        data: {
                            '_token': $('#modal input[name=_token]').val(),
                            'type':value,
                        },
                        success: function(data) {
                            $('.pag').empty();
                            $('.pag').html(data);
                       },        
                       error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                      }

                    });    
                }
        });

        @if(isset($specialLoad))
            getData(null, '{{$specialLoad}}');
        @endif
        $('#state-all , #inact , #plan , #expire , #new , #susp , #pend , #roles').click(function () {
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
                var Box = '#home .pag';
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
                    $('.pag #overlayPagination').remove();
                }).fail(function () {
                    $('.pag #overlayPagination').remove();
                    $('.pag #overlayError').remove();
                    var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                    $(Box).html(error);
                });
            }


        $(".select2").select2();
        $("#add-user-modal .roles").select2({
            placeholder: "Select Roles"
        });
        $("input[type=checkbox]").iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_minimal-blue'
        });

        $('#search,#search2').on('keyup',function(){
            $('.demo-foo-filtering').DataTable().search( this.value ).draw();
        });
        function close(){
            $('.modal input').val('');
            $('#add-user-modal select').prop('selectedIndex',-1);
            $('.modal .alert').addClass('hidden');
            $('input[type=checkbox]').each(function(){
                    $(this).iCheck('uncheck');
            });
        }

        $('.modal .btn-danger , .modal .close').on('click',function(){
                close();
        });

        $(document).on('click','table tr.selected_record',function(e){
            if (!$(e.target).hasClass('stop')) {
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).children('.user_id').val();
                var route = "{{route('users.editUser',['user_id' => 'uid'])}}";
                route = route.replace('uid', id);

                //$('.form'+id).submit();
                window.location.href = route;
            }
            
        });


/************************************Add New User***************************************************************/
        $(document).on('click','.user-add',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$(this).val();
            id = ++id;
            var type = $('#checkType').val();

            if(type == 'User'){
                $('.select2 option').each(function(){
                    if($(this).attr('value1') === 'driver' || $(this).attr('value1') === 'company'){
                        $(this).attr('disabled','disabled');
                    }else{
                        $(this).removeAttr('disabled');
                        $(".select2").select2("destroy");
                        $(".select2").select2({
                            placeholder:"{{trans('backend/user.select_item_from_list')}}",
                        });
                    }
                });
                
            }else if(type == 'Driver'){
                $('.select2 option').each(function(){
                    if($(this).attr('value1') == 'user' || $(this).attr('value1') == 'company'){
                        $(this).attr('disabled','disabled');
                    }else{
                        $(this).removeAttr('disabled');
                        $(".select2").select2("destroy");
                        $(".select2").select2({
                            placeholder:"{{trans('backend/user.select_item_from_list')}}",
                        });
                    }
                });
                
            }else if(type == 'Company'){
                $('.select2 option').each(function(){
                    if($(this).attr('value1') == 'user' || $(this).attr('value1') == 'driver'){
                        $(this).attr('disabled','disabled');
                    }else{
                        $(this).removeAttr('disabled');
                        $(".select2").select2("destroy");
                        $(".select2").select2({
                            placeholder:"{{trans('backend/user.select_item_from_list')}}",
                        });
                    }
                });
                
            }


            $('#add-user-modal').modal({ backdrop: 'static', keyboard: false });
            $('#add-user-modal .btn-success').unbind('click');
            $('#add-user-modal .btn-success').on('click',function(e){

                e.preventDefault();
                e.stopPropagation();

                var email = $('input[name=email]').val();
                var password = $('input[name=password]').val();
                var password_confirmation = $('input[name=password_confirmation]').val();
                var type = $('input#checkType').val();
                var roles=[];
                $('.select2 option:selected').each(function(){
                     roles.push($(this).val());
                });

                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('users.addUser') }}',
                    data: {
                        '_token': $('#add-user-modal input[name=_token]').val(),
                        'first_name': $('#add-user-modal .fname').val(),
                        'last_name': $('#add-user-modal .lname').val(),
                        'street': $('#add-user-modal .street').val(),
                        'home': $('#add-user-modal .home').val(),
                        'home_pohne': $('#add-user-modal .home_pohne').val(),
                        'postal_code': $('#add-user-modal .postal_code').val(),
                        'district': $('#add-user-modal .district').val(),
                        'country': $('#add-user-modal .country').val(),
                        'company': $('#add-user-modal .company').val(),
                        'phone': $('#add-user-modal .phone').val(),
                        'email':email,
                        'password':password,
                        'password_confirmation':password_confirmation,
                        'roles':roles,
                        'type':type,
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
                          $.notify("Saved successfully \n User Saved Successfully",{ position:"top right" ,className:"success"});
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
/*****************************************Delete User***********************************************************/
        $(document).on('click','.delete',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$(this).attr('value');
            var profile_id = $(this).data('profile')
            $('#confirm-delete').modal({ backdrop: 'static', keyboard: false });
            $('#confirm-delete .btn-danger').unbind('click');
            $('#confirm-delete .btn-danger').on('click',function(e){

                e.preventDefault();
                e.stopPropagation();
                if(profile_id > 0 && id == 0 ){
                    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                    $.ajax({
                        type: 'post',
                        url: '{{ route('users.removeDriver') }}',
                        data: {
                            '_token': $('#modal input[name=_token]').val(),
                            'profile_id':profile_id

                        },
                        success: function(data) {
                            $.notify("Deleted successfully \n User Deleted Successfully",{ position:"top right" ,className:"success"});
                            $('#confirm-delete').modal('toggle');
                            $('.tab-row'+id).remove();
                        },

                    });
                }else{
                    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                    $.ajax({
                        type: 'post',
                        url: '{{ route('users.removeUser') }}',
                        data: {
                            '_token': $('#modal input[name=_token]').val(),
                            'id':id

                        },
                        success: function(data) {
                            $.notify("Deleted successfully \n User Deleted Successfully",{ position:"top right" ,className:"success"});
                            $('#confirm-delete').modal('toggle');
                            $('.tab-row'+id).remove();
                        },

                    });
                }
                

            });


        });
/***************************************************************************************************************/
/************************************Add New Admin***************************************************************/
        $(document).on('click','.admin-add',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$(this).val();
            id = ++id;
            $('#add-admin-modal').modal({ backdrop: 'static', keyboard: false });
            $('#add-admin-modal .btn-success').unbind('click');
            $('#add-admin-modal .btn-success').on('click',function(e){

                e.preventDefault();
                e.stopPropagation();

                var email = $('#add-admin-modal input[name=email]').val();
                var name = $('#add-admin-modal input[name=name]').val();
                var password = $('#add-admin-modal input[name=password]').val();
                var password_confirmation = $('#add-admin-modal input[name=password_confirmation]').val();

                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('admins.addAdmin') }}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'name':name,
                        'email':email,
                        'password':password,
                        'password_confirmation':password_confirmation,
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
                          $.notify("Saved successfully \n Admin Saved Successfully",{ position:"top right" ,className:"success"});
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
/*****************************************Delete User***********************************************************/
        /*$(document).on('click','.delete',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$(this).val();

            $('#confirm-delete').modal({ backdrop: 'static', keyboard: false });
            $('#confirm-delete .btn-danger').unbind('click');
            $('#confirm-delete .btn-danger').on('click',function(e){

                e.preventDefault();
                e.stopPropagation();

                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('admins.removeAdmin') }}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'id':id

                    },
                    success: function(data) {
                        $.notify("Deleted successfully \n Admin Deleted Successfully",{ position:"top right" ,className:"success"});
                        $('#confirm-delete').modal('toggle');
                        $('.tab-row'+id).remove();
                    },

                });

            });


        });*/
/***************************************************************************************************************/
        $(document).on('click','.edit-admin',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id =$(this).val();
        
            $('#edit-admin-modal input[name="name"]').val($(this).parents().children('.admin_name').val());
            $('#edit-admin-modal input[name="email"]').val($(this).parents().siblings('.admin_email').text());
            $('#edit-admin-modal input[name="profileEmail"]').val($(this).parents().siblings('.admin_profile_email').text());
            $('#edit-admin-modal input[name="phone"]').val($(this).parents().siblings('.admin_profile_phone').text());
            $('#edit-admin-modal input[name="adress"]').val($(this).parents().siblings('.admin_profile_adress').text());
            $('#edit-admin-modal').modal({ backdrop: 'static', keyboard: false });
            $('#edit-admin-modal .btn-success').unbind('click');
            $('#edit-admin-modal .btn-success').on('click',function(e){
                
                e.preventDefault();
                e.stopPropagation();

                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                $.ajax({
                    type: 'post',
                    url: '{{ route('admins.editAdmin') }}',
                    data: {
                        '_token': $('#modal input[name=_token]').val(),
                        'id':id,
                        'name':$('#edit-admin-modal input[name="name"]').val(),
                        // 'a':'b',
                        'admin_phone':$('#edit-admin-modal input[name="phone"]').val(),
                        'admin_email':$('#edit-admin-modal input[name="profileEmail"]').val(),
                        'admin_adress':$('#edit-admin-modal input[name="adress"]').val(),
                        'password':$('#edit-admin-modal input[name="password"]').val(),
                        'password_confirmation':$('#edit-admin-modal input[name="password_confirmation"]').val(),
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
                          $.notify("Updated successfully \n Admin Updated Successfully",{ position:"top right" ,className:"success"});
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

    });
</script>

@endsection
