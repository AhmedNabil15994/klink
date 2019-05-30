@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('new-content')
    <h4 class="section-heading">
        {{trans('frontend/dashboard.account_setting')}}
    </h4>

    <div class="info-content">

                                                    <p class="custom-parag-content">
                                                        {{trans('frontend/dashboard.manage_emails')}} 
                                                    </p>

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="email">{{trans('frontend/dashboard.email')}}</label>
                                                        <a href="#" id="email" data-emid="0" data-king="email" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{Auth::user()->email}}</a><br>
                                                        <div class="row">
                                                            <div class="col-xs-6 text-right">
                                                                @foreach($emails as $email)
                                                                <a href="#" class="user_emails" data-king="user_emails" data-emid="{{$email->id}}" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$email->email}}</a><br>
                                                                @endforeach
                                                                <div id="new_emails" class="pull-right text-center">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-6">
                                                                <div class="pull-right">
                                                                    <a href="#" id="more">More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--data group-->
                                                    
                                                    <p class="custom-parag-content">
                                                        {{trans('frontend/dashboard.change_pw')}} :
                                                    </p>


                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="oldPass">{{trans('frontend/dashboard.old_password')}}</label>
                                                        <input id="oldPass" type="password" placeholder="{{trans('frontend/dashboard.old_password')}}">
                                                    </div>
                                                    <!--data group-->

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="newPass">{{trans('frontend/dashboard.new_pw')}}</label>
                                                        <input id="newPass" type="password" placeholder="{{trans('frontend/dashboard.new_pw')}}">
                                                    </div>
                                                    <!--data group-->

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="retypePass">{{trans('frontend/dashboard.renew_pw')}}</label>
                                                        <input id="retypePass" type="password" placeholder="{{trans('frontend/dashboard.renew_pw')}}">
                                                    </div>
                                                    <!--data group-->



                                                    <!--data group-->
                                                    <div class="data-group">
                                                       <button class="data-button">
                                                           {{trans('frontend/dashboard.save')}}
                                                       </button>
                                                    </div>
                                                    <!--data group-->







    </div>
@endsection 

@section('scripts')
<script>

$(function () {

    
   
    $('#more').on('click',function(){
        $('#new_emails').append("<a href='#' class='new_email editable editable-click' data-king='new_email' data-type='text' data-pk='1' data-url=''  data-title='Enter New Email'>Enter New Email</a><br>");

        $('div#new_emails a.new_email.editable').editable({
            mode: 'inline',
            success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                $.ajax({
                    url: "{{route(Helper::type($profile->status).'.new_emails')}}",
                    type: 'POST',
                    data: {
                      '_token': $('input[name="_token"]').val(),
                      "email": newValue,
                    },
                    success: function (data) {
                        if (isNaN(data)){
                            $.each(data['errors'], function(i, item) { 
                                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                            });         
                        }else if(data==1){
                            $.notify("Success \n New Email Saved Successfully",{ position:"top right" ,className:"success"});
                            setTimeout(function () {
                                location.reload();
                            },2000);
                        } 
                    },        
                    error: function(data){
                      $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }
                });
            }
        });
    });


    
    

    $('#email,.user_emails').editable({
        mode: 'inline',
        success: function(response,newValue){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.user_edit')}}",
                type: 'POST',
                data: {
                  '_token': $('input[name="_token"]').val(),
                  "email": newValue,
                  'type': $(this).data('king'),
                  'id': $(this).data('emid'),
                },
                success: function (data) {
                    if (isNaN(data)){
                        $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                        });         
                    }else if(data==1){
                        $.notify("Success \n Email Updated Successfully",{ position:"top right" ,className:"success"});
                        setTimeout(function () {
                            location.reload();
                        },2000);
                    } 
                },        
                error: function(data){
                  $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }
            });
        }
      
    });
    

    $('.data-button').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route(Helper::type($profile->status).'.pwChange')}}",
            type: 'POST',
            data: {
              '_token': $('input[name="_token"]').val(),
              "old_password": $('#oldPass').val(),
              "password": $('#newPass').val(),
              "password_confirmation": $('#retypePass').val(),
            },
            success: function (data) {
                if (isNaN(data)){
                    $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                    });         
                }else if(data==1){
                    $.notify("Success \n Password Updated Successfully",{ position:"top right" ,className:"success"});
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


});
</script>
@endsection