@extends('frontend.dashboard.index') 
@section('sidebar2')
@include('frontend.dashboard.layouts.partials.profile-sidebar')
@endsection
<style>

    .custom-button{
        padding:1rem 1rem !important;
    }

    .editableform .form-control{
        width:15rem !important;
    }

    .driver-page .driver-result .driver-item .driver-name-box p a{
        text-decoration:none;
        color:#6c757d;
    }

    .editable-buttons .editable-cancel{
        background-color:#6c757d;
        color:#FFF;
    }
    .editable-buttons .editable-cancel:hover{
        color:#FFF;
        background:#6c757d;
        border-color:#6c757d;
    }

    @media (max-width:1200px){
        .editable-buttons
        {
            display: block !important;
            margin-top: .5rem !important;
            margin-bottom: .5rem !important;
            margin-left: 0 !important;
        }
    }

    @media (max-width:500px){
       .driver-item .col-xs-6,
       .driver-item .col-xs-4,
       .driver-item .col-xs-2{
            width:75%;
        }
        
        .custom-margin-boot{
            margin-left:19%;
        }
        
    }
    .driver-item img{
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: block;
        margin: auto;
    }
</style>



@section('page-content')


<div class="pageContent rale">
    <div class="container-fluid">

        <!--driver page-->
        <div class="driver-page">

            <div class="modal fade rale" tabindex="-1" role="dialog" id="addEmailModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="fas fa-trash-alt"></span>{{trans('frontend/dashboard.email')}}</h4>
                        </div>
                        <!--modal body-->
                        <div class="modal-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <label for="email">{{trans('frontend/dashboard.email')}}</label>
                                    </div>
                                    <div class="col-xs-6 col-md-8">
                                        <input class="form-control" type="email" placeholder="{{trans('frontend/dashboard.email')}}" />
                                    </div>        
                                </div>
                            </div>

                        </div>
                        <!--modal body-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                            <button type="button" class="btn btn-primary ladda-button" data-style="expand-right" id="save">{{trans('frontend/dashboard.save')}}</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!--delete modal-->
            @include('frontend.dashboard.drivers.deleteModal')
            <!-- /.modal -->
            <!--Delete modal-->

            <!--add Vehcile modal-->
            @include('frontend.dashboard.helpers.newDriverModal')
            <!-- /.modal -->
            <!--add Vehcile modal-->

            <!--search row-->
            <div class="driver-search">
                <div class="row">

                    <!--search box-->
                    <div class="col-lg-4 col-md-6">
                        <div class="driver-search__box">
                            <input type="text" id="searchDrivers" placeholder="{{trans('frontend/dashboard.search')}} .....">
                            <button>
                                <span class="fas fa-search"></span>
                            </button>
                        </div>
                    </div>
                    <!--search box-->

                    <!--sorted by box-->
                    <div class="col-lg-4 col-md-6">
                        <div class="driver-search__sort">
                            <span class="sort-title">
                                {{trans('frontend/dashboard.sorted_by')}} : 
                            </span>

                            <ul class="sort-type">
                                <li>{{trans('frontend/dashboard.status')}}</li>
                                <li>{{trans('frontend/dashboard.type')}}</li>
                                <li>{{trans('frontend/dashboard.name')}}</li>
                            </ul>
                        </div>
                    </div>
                    <!--sorted by box-->

                    <!--add button-->
                    <div class="col-lg-4 col-md-12">
                        <div class="add-driver">
                            <button class="add-driver custom-button custom-button--blue">
                                <span class="icon fas fa-plus"></span> {{trans('frontend/dashboard.newDriver')}}
                            </button>
                        </div>
                    </div>
                    <!--add button-->

                </div>
            </div>
            <!--search row-->

            <!--public row-->
            <div class="driver-result">
                <div class="row">

                    <!--driver item column-->
                    <div class="col-md-8">
                        <!--driver item result-->
                        <div class="row">
                            <div class="col-xs-12">

                                <!--driver item-->
                                @foreach($drivers as $driver)
                                <div class="driver-item" data-id="{{$driver->id}}">
                                    
                                    <div class="row">

                                        <!--frist column-->
                                        <div class="col-lg-6 col-xs-6">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    @if($driver->user_id == '' || $driver->user_id == null)
                                                    <div class="form-group">
                                                        <label for="DriverControl{{$driver->id}}" class="custom-label">
                                                                <input type="checkbox" class="custom-check" data-id="{{$driver->id}}" id="DriverControl{{$driver->id}}" data-profile="{{$driver->profile_id}}">
                                                                <span class="custom-span" data-toggle="tooltip" title="{{trans('frontend/dashboard.enableDriverControl')}}"></span>
                                                            </label>
                                                    </div>
                                                    @else
                                                        @if($driver->image)
                                                        <img src="{{asset('images/profiles')}}/{{$driver->image}}">
                                                        @else
                                                        <img src="{{asset('images/avatar.png')}}">
                                                        @endif
                                                    @endif
                                                    <!--form group-->
                                                    <?php 
                                                        $ship_ids = \DB::table('drivers')->where('profile_id','=',$driver->profile_id)->where('company_id','=',Auth::user()->id)->get();

                                                    ?>
                                                </div>
                                                <div class="col-xs-9">
                                                    <div class="driver-name-box">
                                                        <p class="driver-name">
                                                            
                                                          

                                                             <a href="#"  class="driverEdit drivername" data-id="{{$driver->id}}" id="drivername{{$driver->id}}" data-type="text" data-pk="1" data-val="{{$driver->profile_id}}">    
                                                                {{$driver->first_name.' '.$driver->last_name}}
                                                             </a>

                                                        </p>
                                                        <p class="driver-cars">
                                                            <span>cars</span> :
                                                                
                                                                @foreach($ship_ids as $ship)
                                                                <?php 
                                                                    $vehicle = \DB::table('vehicles')->where('id','=',$ship->vehichle_id)->first();
                                                                ?>
                                                                @if(isset($vehicle))
                                                                {{$vehicle->ship_name}},
                                                                @endif 
                                                                @endforeach

                                                        </p>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--frist column-->

                                        <!--second column-->
                                        <div class="col-lg-5 col-xs-4 custom-margin-boot">
                                            <div class="driver-contact">
                                                <div class="driver-name-box">
                                                    <p class="driver-cars">
                                                       
                                                        <span>Email :</span> 
                                                        
                                                        <?php 
                                                            $profiles = \DB::table('user_profiles')->where('id','=',$driver->profile_id)->first();
                                                            $user = \DB::table('users')->where('id','=',$profiles->user_id)->first();

                                                        ?>
                                                        @if(isset($user))
                                                        <a href="#"  class="driverEdit driveremail" data-id="{{$driver->id}}" data-val="{{$driver->profile_id}}" id="driveremail{{$driver->id}}" data-type="text" data-pk="1">
                                                            {{$user->email}}
                                                        </a>
                                                        @endif
                                                       
                                                                               
                                                    </p>
                                                    <p class="driver-active">
                                                        <span>{{trans('frontend/dashboard.phone')}} : </span> 
                                                        <a href="#"  class="driverEdit driverphone" data-id="{{$driver->id}}" data-val="{{$driver->profile_id}}" id="driverphone{{$driver->id}}" data-type="text" data-pk="1">    
                                                            {{$driver->phone}}
                                                        </a>
                                                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--second column-->

                                        <!--third column-->
                                        <div class="col-lg-1 col-xs-2">
                                            @if(auth()->user()->profile->id!=$driver->profile_id)
                                            <div class="delete">
                                                <button class="delete-driver" data-id="{{$driver->id}}">
                                                <span class="fas fa-times"></span>
                                            </button>
                                            </div>
                                            @endif
                                        </div>
                                        <!--third column-->

                                    </div>

                                </div>
                                @endforeach
                                <!--driver item-->

                            </div>
                        </div>
                        <!--driver item result-->
                    </div>
                    <!--driver item column-->

                    <!--driver item column-->
                    <div class="col-md-4">
                        <div class="drivers-map">
                            
                        </div>
                    </div>
                    <!--driver item column-->

                </div>
            </div>
            <!--public row-->

        </div>
        <!--driver page-->

    </div>
</div>


<!--edit Vehcile modal-->
<div class="modal fade rale" role="dialog" id="add_driver">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-truck"></span> {{trans('frontend/dashboard.newDriver')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <div class="add-group form-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="selectpicker201">{{trans('frontend/dashboard.name')}}</label>
                            </div>
                            <div class="col-xs-3">
                                <input type="text" id="first_name" class="add-input form-control" placeholder="{{trans('frontend/dashboard.fname')}} " required>
                            </div>
                            <div class="col-xs-3">
                                <input type="text" id="last_name" class="add-input form-control" placeholder="{{trans('frontend/dashboard.lname')}} " required>
                            </div>
                        </div>
                </div>

                <div class="add-group form-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="vehcileweight">{{trans('frontend/dashboard.phone')}}</label>
                            </div>
                            <div class="col-xs-6">
                                <input type="number" id="driver_phone" class="add-input form-control" placeholder="{{trans('frontend/dashboard.phone')}}" required>
                            </div>
                        </div>
                </div>

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary ladda-button" data-style="expand-right"><span class="ladda-label">{{trans('frontend/dashboard.save')}}</span></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--edit Vehcile modal-->


<style>
    #newDriverModal .add-vehcile-content .add-group {
      margin-bottom: 1rem;
    }

    #addNewVehcileModal .add-vehcile-content .add-input ,
    #newDriverModal .add-vehcile-content .add-input {
      width: 100%;
      padding: .5rem 1rem;
      border-radius: .3rem;
      border: 0.1rem solid rgba(0, 0, 0, 0.2);
      transition: all .5s;
      font-size: 1.4rem;
    }

    #addNewVehcileModal .add-vehcile-content .add-input:focus ,
    #newDriverModal .add-vehcile-content .add-input:focus {
      outline: none;
      border: 0.1rem solid #398bf7;
    }
</style>
@endsection
 
@section('scripts')
<script src="/plugins/easing/jquery.easing.min.js"></script>
<script>



   

$(function(){

    var l = $('.ladda-button').ladda();

    window.drivers = {!!json_encode($drivers)!!}
    $('[data-toggle="tooltip"]').tooltip();
    $('#searchDrivers').change(function(e){
        var searchValue = $(this).val();
        window.drivers.forEach(function(element){
            if(element.name.toLowerCase().indexOf(searchValue.toLowerCase())!==-1){
                $('.driver-item[data-id='+element.id+']').show();
            }else{
                $('.driver-item[data-id='+element.id+']').hide();
            }
        });
    })



    $('.custom-check').change(function(e){
        
        if($('.custom-check').is(':checked')){
            var profile_id = $(this).data('profile');
            $('#addEmailModal').modal('toggle');
            $('#addEmailModal .btn-primary').attr('val',profile_id);
        }else{
            console.log('no');
        }

    });

    $('#addEmailModal .btn-primary').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.ladda-button').ladda('start');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('drivers.newUser')}}",
            type: 'POST',
            data:{
                '_token': $('input[name="_token"]').val(),
                'email': $('#addEmailModal input[type="email"]').val(), 
                'profile_id': $(this).attr('val'), 
            },
            success:function(data){
                if (isNaN(data)){
                    $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                    }); 
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000)           
                }else if(data==1){
                    $.notify("Saved successfully \n Email Saved Successfully \n Password Sent To Driver Mail",{ position:"top right" ,className:"success"});
                    $('#addEmailModal').modal('toggle');
                    setTimeout(function () {
                        location.reload();
                    },2000);
                } 
                
            },
            error:function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                setTimeout(function () {
                    $('.ladda-button').ladda('stop');
                },2000)
            }
        }); 
    });

    //show delete vehcile modal
    $('.driver-page .delete-driver').on('click', function () {
        window.toBeDeleted = $(this).data('id');
        $('#deleteDriverModal').modal({
            show:true
        });
    });

    $('#deleteDriverModal #Delete').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{route('drivers.DeleteDriver',['driver'=>'toBeDeleted'])}}".replace('toBeDeleted',window.toBeDeleted),
                type: 'POST',
                contentType: false,
                processData: false,
                success:function(data){
                    $.notify('Deleted Successfully \n {{trans('frontend/dashboard.driverDeleted')}}',{ position:"top right" ,className:"success"});
                    window.location.reload();
                },
                error:function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }
            })
    });

    $('.driver-search .add-driver.custom-button').on('click', function () {
        $('#add_driver').modal({
            show:true
        });
    });

    $('#add_driver').on('click','.btn-primary',function(e){

        e.preventDefault();
        e.stopPropagation();
        $('.ladda-button').ladda('start');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('drivers.newDriver')}}",
            type: 'POST',
            data:{
                '_token': $('input[name="_token"]').val(),
                'first_name': $('#add_driver #first_name').val(), 
                'last_name': $('#add_driver #last_name').val(), 
                'phone': $('#add_driver #driver_phone').val(), 
            },
            success:function(data){
                if (isNaN(data)){
                    $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                    }); 
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000)           
                }else if(data==1){
                    $.notify("Saved successfully \n Driver Saved Successfully",{ position:"top right" ,className:"success"});
                    $('#add_driver').modal('toggle');
                    setTimeout(function () {
                        location.reload();
                    },2000);
                } 
                
            },
            error:function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                setTimeout(function () {
                    $('.ladda-button').ladda('stop');
                },2000)
            }
        });    

    });


    /*editable fields*/

        $('.drivername').editable({
            mode : 'inline',
            success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('drivers.edit_name')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': $(this).data('val'),
                        'newValue': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Driver Name Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
            
        });
        
        $('.driverphone').editable({
            mode : 'inline',
            success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('drivers.edit_phone')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': $(this).data('val'),
                        'newValue': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Driver Phone Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
                
        });

        $('.driveremail').editable({
            mode : 'inline',
            success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('drivers.edit_email')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': $(this).data('val'),
                        'newValue': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Driver Email Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
                
        });
       

    
    


})
</script>
@endsection