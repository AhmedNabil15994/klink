@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
<div class="profile-side white rale">

    <!--user profile-->
    <div class="profile-user clearfix">
        <div class="profile-pic">
            @if(!empty($profile['image']))
            <img src="{{asset('images/profiles')}}/{{$profile['image']}}" alt="avatar"> @else
            <img src="{{asset('images/avatar.png')}}" alt="avatar"> @endif
        </div>
        <div class="user-name">
            {{$profile['first_name'].' '.$profile['last_name']}}
        </div>
    </div>
    <!--user profile-->






    <!--sidebar nav-->
    <ul class="sideList">

        <li class="sideList__item">
            <a href="{{route('user.profile')}}" class="{{Active('user.profile')}}">
                <div class="sideIcon">
                    <span class="listIcon fas fa-cog"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.profile_setting')}}
                </div>
            </a>
        </li>

        <li class="sideList__item">
            <a href="{{route('drivers')}}" class="{{Active('drivers')}}">
                <div class="sideIcon">
                    <span class="listIcon  fas fa-users"></span>
                </div>
                <div>
                     {{trans('frontend/dashboard.drivers')}}
                </div>
            </a>
        </li>


        <li class="sideList__item">
            <a href="{{route('vehicles')}}" class="{{Active('vehicles')}}">  
                <div class="sideIcon">
                    <span class="listIcon fas fa-car"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.vehicles')}}
                </div>
            </a>
        </li>

    </ul>
    <!--sidebar nav-->



</div>
<!--profile view side-->
@endsection
 
@section('page-content')
<style type="text/css">
    div.bhoechie-tab-container {
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: .4rem;
        -moz-border-radius: .4rem;
        border: .1rem solid #ddd;
        margin-top: 2rem;
        margin-left: 5rem;
        -webkit-box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, .175);
        box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, .175);
        -moz-box-shadow: 0 .6rem 1.2rem rgba(0, 0, 0, .175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
        margin-left: 0;
    }

    div.bhoechie-tab-menu {
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }

    div.bhoechie-tab-menu div.list-group {
        margin-bottom: 0;
    }

    div.bhoechie-tab-menu div.list-group>a {
        margin-bottom: 0;
    }

    div.bhoechie-tab-menu div.list-group>a .glyphicon,
    div.bhoechie-tab-menu div.list-group>a .fa {
        color: #f6ab36;
    }

    div.bhoechie-tab-menu div.list-group>a:first-child {
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
    }

    div.bhoechie-tab-menu div.list-group>a:last-child {
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
    }

    div.bhoechie-tab-menu div.list-group>a.active,
    div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
    div.bhoechie-tab-menu div.list-group>a.active .fa {
        background-color: #f6ab36;
        background-image: #f6ab36;
        color: #ffffff;
    }

    div.bhoechie-tab-menu div.list-group>a.active:after {
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -1.3rem;
        border-left: 0;
        border-bottom: 1.3rem solid transparent;
        border-top: 1.3rem solid transparent;
        border-left: 1rem solid #f6ab36;
    }

    div.bhoechie-tab-content {
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding-left: 2rem;
        padding-top: 1rem;
    }

    div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
        display: none;
    }

    .list-group-item.active,
    .list-group-item.active:hover,
    .list-group-item.active:focus {
        border-color: #f6ab36;
    }

    .main-wrapper .pageContent {
        height: unset;
        min-height: 100vh !important;
    }

    @media(max-width: 767px) {
        div.bhoechie-tab-menu div.list-group>a.active:after {
            display: none;
        }
    }

    fieldset {
        border: .1rem solid #DDD;
        border-radius: .5rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    legend {
        font-size: 1.4rem;
    }

    label {
        font-size: 1.4rem;
    }

    .box-title {
        font-size: 2rem;
    }

    div.bhoechie-tab-menu div.list-group {
        font-size: 1.4rem;
    }

    div.bhoechie-tab-menu div.list-group>a {
        margin-bottom: 0;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }


    div.bhoechie-tab-menu div.list-group>a .glyphicon,
    div.bhoechie-tab-menu div.list-group>a .fa {
        font-size: 1.8rem;
    }

    .order-space .orderCard .table thead tr th {
        width: 25% !important;
    }
</style>
    @include('frontend.dashboard.layouts.modals.upload_img')
    @include('frontend.dashboard.layouts.modals.edit_profile')
<!--upload file modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="uploadFileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-file"></span>{{trans('frontend/dashboard.upload_doc')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <!--custom upload-->
                <div class="custom-upload">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="vehcileweight">{{trans('frontend/dashboard.name')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="name" class="form-control" placeholder="{{trans('frontend/dashboard.name')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="uploaded-view">
                        <textarea placeholder="{{trans('frontend/dashboard.doc_desc')}}" required style="min-height: 150px;"></textarea>
                    </div>
                    <input type="file" id="img-upload" hidden="hidden">
                    <div class="file-info">
                        {{trans('frontend/dashboard.no_file')}}
                    </div>
                    <button class="choose-button">{{trans('frontend/dashboard.choose_file')}}</button>


                </div>
                <!--custom upload-->


            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.upload')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--upload file modal-->

<!--Delete modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="deleteDocModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-trash-alt"></span>{{trans('frontend/dashboard.del_doc')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                {{trans('frontend/dashboard.del_doc_p')}}

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.update')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Delete modal-->


<!--pageContent-->
<div class="pageContent rale">
    @if ($errors->has('IncompletedValues'))
    @include('frontend.dashboard.profile.IncompletedModal')

    <script>
        window.addEventListener('load',function(){
                
                var errorsInputs = {!!json_encode(array_keys($errors->getMessages()),true)!!}
                var incompletedTranslate = {!! json_encode(
                    require resource_path('lang/'.\App::getLocale().'/frontend/completed.php')
                )  !!}
                $('#IncomPletedValues #ValidateAndContinue').click(function(e){
                    e.preventDefault();
                        e.stopPropagation();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                        var requiredData = {
                                '_token': $('input[name=_token]').val(),
                        }
                        errorsInputs.forEach(function(errorinput){
                            requiredData[errorinput]=($('#IncomPletedValues #'+errorinput).val())
                        })
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('requiredUpdate') }}",
                            data: requiredData,
                            success: function(data) {
                                if (isNaN(data)){
                                    $.each(data['errors'], function(i, item) {
                                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                                    });   
                                }else if(data==1){
                                    $.notify("Updated successfully \n Account Setting Updated successfully",{ position:"top right" ,className:"success"});
                                    setTimeout(function () {
                                        window.location = '{{route('user.dashboard')}}'
                                      },2000)
                                }  

                            },
                            error: function(data){
                                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                            }

                        });  
                })
                errorsInputs.forEach(function(element){
                    if(element=='IncompletedValues'){
                        return 'e';
                    }
                    var elementHtml = `
                        <div class="update-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="${element}">${incompletedTranslate[element]}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" id="${element}" class="update-input" placeholder="${incompletedTranslate[element]}" required="" value="">
                                </div>
                            </div>
                        </div>
                    `;
                    $('#inCompletedFieldSet').html($('#inCompletedFieldSet').html()+elementHtml);
                })
                $('#IncomPletedValues').modal('toggle');
                @foreach ($errors->all() as $error)
                    $.notify("Whoops \n"+"{{$error}}",{ position:"top right" ,className:"error"});
                @endforeach
            })
    </script>

    @endif
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')



        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container pull-left">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bhoechie-tab-menu pull-left">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            <h4 class="glyphicon glyphicon-user"></h4><br/>{{trans('frontend/dashboard.profile_setting')}}
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-user-circle fa-2x" style="background-color: transparent; "></h4><br/> {{trans('frontend/dashboard.account_setting')}}
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-file fa-2x"></h4><br/> {{trans('frontend/dashboard.docs')}}
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-envelope fa-2x"></h4><br/> {{trans('frontend/dashboard.notif')}}
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-university fa-2x"></h4><br/> {{trans('frontend/dashboard.payment_setting')}}
                        </a>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 bhoechie-tab">
                    <div class="bhoechie-tab-content active">
                        <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{trans('frontend/dashboard.profile_setting')}}</h4>
                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <!--user profile-->
                                <div class="user-profile">
                                    <!--img info edit row-->
                                    <div class="row">
                                        <!-- img col-->
                                        <div class="col-sm-5">
                                            <div class="profile-photo">
                                                <div class="profile-operation">
                                                    <span class="fas fa-images"></span>
                                                </div>
                                                @if(!empty($profile['image'])) @if(filter_var($profile['image'], FILTER_VALIDATE_URL))
                                                <img src="{{$profile['image']}}" alt="user"> @else
                                                <img src="{{asset('images/profiles')}}/{{$profile['image']}}" alt="user">                                                @endif @else
                                                <img src="{{asset('images/user.jpeg')}}" alt="user"> @endif
                                            </div>
                                        </div>
                                        <!--col-->

                                        <!--info column-->
                                        <div class="col-sm-7">

                                            <!--user full name and edit button-->
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="profile-name-edit">
                                                        <div class="userFullName">
                                                            {{$profile['first_name']}} {{$profile['last_name']}}
                                                        </div>
                                                        <div class="edit">
                                                            <button class="profile-edit">{{trans('frontend/dashboard.edit')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--user full name and edit button-->

                                            <!--user info -->
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="user-profile-info">
                                                        <!--internal row-->
                                                        <div class="row">
                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.fname')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['first_name']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.lname')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['last_name']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.birth_date')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['birth_date']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.birth_place')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['birth_place']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.driver_license')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['license_no']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.created_at')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{Carbon::parse($profile['created_at'])->format('Y-m-d')}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.email')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{\Auth::user()->email}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.phone_num')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['phone']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.address')}} / {{trans('frontend/dashboard.home')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['address']}} / {{$profile['home']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.add_address')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['address2']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.postal_code')}} / {{trans('frontend/dashboard.city')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels"> {{$profile['district']}} / {{$profile['postal_code']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.country')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['country']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.tax_no')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['tax_no']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.secure_no')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['secure_no']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.add_info')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$profile['info']}}</span>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-6 user-profile-info-labels">
                                                                    <span class="info-labels">{{trans('frontend/dashboard.add_link')}} :</span>
                                                                </div>
                                                                <div class="col-xs-6 user-profile-info-values">
                                                                    <span class="info-labels">{{$links['facebook']}}</span>
                                                                    <span class="info-labels">{{$links['twitter']}}</span>
                                                                    <span class="info-labels">{{$links['linkedin']}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--internal row-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--user info -->

                                        </div>
                                        <!--info column-->
                                    </div>
                                    <!--img info edit row-->

                                    <!--about row-->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="profile-about">
                                                <h4>{{trans('frontend/dashboard.about_you')}}</h4>
                                                <p>{{$profile['about']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--about row-->

                                </div>
                                <!--user profile-->
                            </div>
                        </div>

                    </div>

                    <div class="bhoechie-tab-content">
                        <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{trans('frontend/dashboard.account_setting')}}</h4>

                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <!--user profile-->
                                <div class="user-profile">
                                    <!--img info edit row-->
                                    <div class="row">

                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.change_email')}}</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.email')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="email" class="form-control" placeholder="{{trans('frontend/dashboard.email')}}" required value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.change_pw')}}</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.new_pw')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="password" id="password" class="form-control" placeholder="{{trans('frontend/dashboard.new_pw')}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.renew_pw')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="password" id="password_confirmation" class="form-control" placeholder="{{trans('frontend/dashboard.renew_pw')}}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <button class="btn btn-primary btn-md pull-right edit-user" style="margin-bottom: 10px;">{{trans('frontend/dashboard.edit')}}</button>
                                        <div class="clearfix"></div>
                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.delete_acc')}}</legend>
                                            <button class="btn btn-md btn-danger pull-right deactivate">{{trans('frontend/dashboard.deactivate')}}</button>
                                        </fieldset>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="bhoechie-tab-content">
                        <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{trans('frontend/dashboard.docs')}}</h4>

                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <!--documents-->
                                <div class="documents">


                                    <!--control row-->
                                    <div class="table-search">
                                        <div class="row">


                                            <!--col-->
                                            <div class="col-xs-12 custom-align">
                                                <button class="add-doc custom-button custom-button--blue">
                                                {{trans('frontend/dashboard.add_doc')}} <span class="fas fa-file-alt"></span>
                                            </button>
                                            </div>
                                            <!--col-->


                                        </div>
                                        <!--row-->
                                    </div>
                                    <!--table search-->

                                    <!--control row-->

                                    <!--table row-->
                                    <!--row-->
                                    <div class="row">
                                        <!--order space-->
                                        <div class="order-space">

                                            <!--col-->
                                            <div class="col-xs-12">
                                                <!--order card-->
                                                <div class="orderCard">

                                                    <!--order head-->
                                                    <div class="order-head">
                                                        <h3 class="order-heading">{{trans('frontend/dashboard.your_docs')}}</h3>
                                                        <p class="order-paragraph">{{trans('frontend/dashboard.here_docs')}} </p>
                                                    </div>

                                                    <!--order data-->
                                                    <div class="order-data">



                                                        <!--table head-->
                                                        <table class="table table-hover  daTatable dataTable demo-foo-filtering" id="demo-foo-filtering">

                                                            <!--table head-->
                                                            <thead class="table__header">
                                                                <tr class="table__header--row">
                                                                    <th>{{trans('frontend/dashboard.name')}}</th>
                                                                    <th>{{trans('frontend/dashboard.doc_desc')}}</th>
                                                                    <th>{{trans('frontend/dashboard.upload_date')}}</th>

                                                                    <th>{{trans('frontend/dashboard.actions')}}</th>
                                                                </tr>
                                                            </thead>
                                                            <!--table head-->


                                                            <!--table body-->
                                                            <tbody class="table__body">
                                                                @foreach($data as $doc)
                                                                <tr class="table__body--row tab-row{{$doc->id}}">

                                                                    <td class="car-head">
                                                                        <span class="fas fa-file-alt">

                                                                    </span>                                                                        {{$doc->name}}
                                                                    </td>
                                                                    <td>{{$doc->description}}</td>
                                                                    <td>{{Carbon::parse($doc->created_at)->format('Y-m-d')}}</td>
                                                                    <td class="operation">
                                                                        <button class="btn btn-danger btn-xs delete-doc" value="{{$doc->id}}">
                                                                        {{trans('frontend/dashboard.delete')}} <span class="fas fa-trash-alt"></span>
                                                                    </button>
                                                                        <button class="btn btn-success download-doc btn-xs" value="{{$doc->id}}">
                                                                        {{trans('frontend/dashboard.download')}} <span class="fas fa-file-download"></span>
                                                                    </button>
                                                                    </td>

                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <!--table body-->

                                                        </table>
                                                        <!--table head-->




                                                    </div>

                                                </div>
                                                <!--order card-->

                                            </div>
                                            <!--col-->






                                        </div>
                                        <!--order space-->
                                    </div>
                                    <!--row-->
                                    <!--table row-->



                                </div>

                                <!--documents-->
                            </div>
                        </div>

                    </div>

                    <div class="bhoechie-tab-content">
                        <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{trans('frontend/dashboard.notif_setting')}}</h4>

                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <!--user profile-->
                                <div class="user-profile">
                                    <!--img info edit row-->
                                    <div class="row">

                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.sms')}}</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.phone')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="phone3" class="form-control" placeholder="{{trans('frontend/dashboard.phone')}}" required value="{{$profile['phone']}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.email_setting')}}</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.email')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="email3" class="form-control" placeholder="{{trans('frontend/dashboard.email')}}" required value="{{Auth::user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">Facebook :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="facebook3" class="form-control" placeholder="Facebook" required value="{{$links['facebook']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">Twitter :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="twitter3" class="form-control" placeholder="Twitter" required value="{{$links['twitter']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">LinkedIn :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="linkedin3" class="form-control" placeholder="LinkedIn" required value="{{$links['linkedin']}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <button class="btn btn-primary btn-md pull-right noti-user" style="margin-bottom: 10px;">{{trans('frontend/dashboard.edit')}}</button>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="bhoechie-tab-content">
                        <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{trans('frontend/dashboard.bank_setting')}}</h4>

                        <div class="box-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <!--user profile-->
                                <div class="user-profile">
                                    <!--img info edit row-->
                                    <div class="row">

                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.bank_info')}}</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.acc_owner')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="owner" class="form-control" placeholder="{{trans('frontend/dashboard.acc_owner')}}" required value="{{$banks['owner']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">IBAN :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="iban" class="form-control" placeholder="IBAN" required value="{{$banks['iban']}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend>{{trans('frontend/dashboard.billing_info')}}</legend>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.fname')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="first_name4" class="form-control" placeholder="{{trans('frontend/dashboard.fname')}}" required value="{{$profile['first_name']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.lname')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="last_name4" class="form-control" placeholder="{{trans('frontend/dashboard.lname')}}" required value="{{$profile['last_name']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.birth_date')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="birth_date4" class="form-control" placeholder="{{trans('frontend/dashboard.birth_date')}}" required
                                                            value="{{$profile['birth_date']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/order.company')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="company" class="form-control" placeholder="{{trans('frontend/order.company')}}" required value="{{$profile['company']}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.address')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="address4" class="form-control" placeholder="{{trans('frontend/dashboard.address')}}" required value="{{$profile['address']}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.add_address')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="address42" class="form-control" placeholder="{{trans('frontend/dashboard.add_address')}}" required
                                                            value="{{$profile['address2']}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.postal_code')}} / {{trans('frontend/dashboard.city')}} :</label>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <input type="text" id="postal_code4" class="form-control" placeholder="{{trans('frontend/dashboard.postal_code')}}" required
                                                            value="{{$profile['postal_code']}}">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <input type="text" id="district4" class="form-control" placeholder="{{trans('frontend/dashboard.city')}}" required value="{{$profile['district']}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label for="license_no">{{trans('frontend/dashboard.country')}} :</label>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <input type="text" id="country4" class="form-control" placeholder="{{trans('frontend/dashboard.country')}}" required value="{{$profile['country']}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <button class="btn btn-primary btn-md pull-right paym-user" style="margin-bottom: 10px;">{{trans('frontend/dashboard.edit')}}</button>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>


    </div>

</div>

<!--pageContent-->
@endsection
 
@section('scripts')

<link rel="stylesheet" type="text/css" href="{{asset('plugins/datepicker/datepicker3.css')}}">
<script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
    $(function(){

        $('#birth_date,#birth_date4').datepicker({
            format:'yyyy-mm-dd',
            autoclose: true,
        });

        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });

        $('#imgEditModal').on('click','.btn-primary',function(e){
            e.preventDefault();
            e.stopPropagation();
            var $file = document.getElementById('img-upload');
            $formData = new FormData();
            if ($file.files.length > 0) {
               for (var i = 0; i < $file.files.length; i++) {
                  $formData.append('image', $file.files[i]);
               }
             }
            
        
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
               url: "{{route('profile_upload')}}",
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
                  $.notify("Updated successfully \n Profile Picture Updated Successfully",{ position:"top right" ,className:"success"});
                  $('#imgEditModal').modal('toggle');
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

        $('#infoEditModal').on('click','.btn-primary',function(e){

                        e.preventDefault();
                        e.stopPropagation();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('profile_edit') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),

                                'first_name': $('#infoEditModal #firstname').val(),
                                'last_name': $('#infoEditModal #lastname').val(),
                                'about' : $('#infoEditModal #about').val(),
                                'birth_date' : $('#infoEditModal #birth_date').val(),
                                'birth_place' : $('#infoEditModal #birth_place').val(),
                                'country' : $('#infoEditModal #country').val(),
                                'district' : $('#infoEditModal #district').val(),
                                'address' : $('#infoEditModal #address').val(),
                                'address2' : $('#infoEditModal #address2').val(),
                                'home' : $('#infoEditModal #home').val(),
                                'postal_code' : $('#infoEditModal #postal_code').val(),
                                'license_no' : $('#infoEditModal #license_no').val(),
                                'phone' : $('#infoEditModal #phone').val(),
                                'info' : $('#infoEditModal #info').val(),
                                'tax_no' : $('#infoEditModal #tax_no').val(),
                                'secure_no' : $('#infoEditModal #secure_no').val(),
                                'facebook' : $('#infoEditModal #facebook').val(),
                                'twitter' : $('#infoEditModal #twitter').val(),
                                'linkedin' : $('#infoEditModal #linkedin').val(),
                            },
                            success: function(data) {
                                if (isNaN(data)){
                                    $.each(data['errors'], function(i, item) {
                                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                                    });   
                                }else if(data==1){
                                    $.notify("Saved successfully \n Profile Details Saved successfully",{ position:"top right" ,className:"success"});
                                    $('#infoEditModal').modal('toggle');
                                    setTimeout(function () {
                                        location.reload();
                                      },2000);
                                }  

                            },
                            error: function(data){
                                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                            }

                        });           
        });


        $(document).on('click','.edit-user',function(e){

                        e.preventDefault();
                        e.stopPropagation();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('user_edit') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),

                                'email': $('#email').val(),
                                'password': $('#password').val(),
                                'password_confirmation': $('#password_confirmation').val(),
                            },
                            success: function(data) {
                                if (isNaN(data)){
                                    $.each(data['errors'], function(i, item) {
                                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                                    });   
                                }else if(data==1){
                                    $.notify("Updated successfully \n Account Setting Updated successfully",{ position:"top right" ,className:"success"});
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

        $(document).on('click','.deactivate',function(e){

                        e.preventDefault();
                        e.stopPropagation();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('deactivate') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                            },
                            success: function(data) {
                                if (isNaN(data)){
                                    $.each(data['errors'], function(i, item) {
                                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                                    });   
                                }else if(data==1){
                                    $.notify("Deactivated successfully \n Account Deactivated successfully",{ position:"top right" ,className:"success"});
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

        $(document).on('click','.noti-user',function(e){

                        e.preventDefault();
                        e.stopPropagation();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('noti_user') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'phone' : $('#phone3').val(),
                                'email' : $('#email3').val(),
                                'facebook' : $('#facebook3').val(),
                                'twitter' : $('#twitter3').val(),
                                'linkedin' : $('#linkedin3').val(),
                            },
                            success: function(data) {
                                if (isNaN(data)){
                                    $.each(data['errors'], function(i, item) {
                                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                                    });   
                                }else if(data==1){
                                    $.notify("Updated successfully \n Notifications Setting Updated successfully",{ position:"top right" ,className:"success"});
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

        $(document).on('click','.paym-user',function(e){

                        e.preventDefault();
                        e.stopPropagation();
                        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('paym_user') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'owner' : $('#owner').val(),
                                'iban' : $('#iban').val(),
                                'first_name' : $('#first_name4').val(),
                                'last_name' : $('#last_name4').val(),
                                'birth_date' : $('#birth_date4').val(),
                                'address' : $('#address4').val(),
                                'address2' : $('#address42').val(),
                                'postal_code' : $('#postal_code4').val(),
                                'district' : $('#district4').val(),
                                'country' : $('#country4').val(),
                                'company' : $('#company').val(),
                            },
                            success: function(data) {
                                if (isNaN(data)){
                                    $.each(data['errors'], function(i, item) {
                                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                                    });   
                                }else if(data==1){
                                    $.notify("Updated successfully \n Payment Setting Updated successfully",{ position:"top right" ,className:"success"});
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


    $(function(){
        $('#uploadFileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var $file = document.getElementById('img-upload');
                $formData = new FormData();
                if ($file.files.length > 0) {
                   for (var i = 0; i < $file.files.length; i++) {
                      $formData.append('image', $file.files[i]);
                   }
                 }
                
                $formData.append('name', $('#uploadFileModal #name').val());
                $formData.append('description', $('#uploadFileModal textarea').val());
            
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('documents_add')}}",
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
                      $.notify("Saved successfully \n Document Saved Successfully",{ position:"top right" ,className:"success"});
                      $('#uploadFileModal').modal('toggle');
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

        $('#deleteDocModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).attr('value');
               
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('documents_delete')}}",
                   type: 'POST',
                   data: {
                        '_token': $('input[name="_token"]').val(),
                        'id':id,
                   },
                   success: function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Deleted successfully \n Document Deleted Successfully",{ position:"top right" ,className:"success"});
                      $('#deleteDocModal').modal('toggle');
                      $('.tab-row'+id).remove();
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }

                 });
            });


            $(document).on('click','.download-doc',function(e){
                var id = $(this).attr('value');
                var route = "{{route('download_attach',['id' => 'uid'])}}";
                route = route.replace('uid', id);
                window.location.href = route;

            });
    });

</script>
@endsection