@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('new-content')

        <h4 class="section-heading">
        {{trans('frontend/dashboard.contact_info')}}
        </h4>

        <div class="info-content">

                                                    <p class="custom-parag-content">
                                                        {{trans('frontend/dashboard.all_info')}} 
                                                    </p>

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="phone">{{trans('frontend/dashboard.phone_num')}}</label>
                                                        <a href="#" id="phone" data-king="phone" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->phone}}</a>
                                                    </div>
                                                    <!--data group-->

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="home_phone">{{trans('frontend/dashboard.home_phone')}}</label>
                                                        <a href="#" id="home_phone" data-king="home_phone" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->home_phone}}</a>
                                                    </div>
                                                    <!--data group-->


                                                    <p class="custom-parag-content">
                                                        {{trans('frontend/dashboard.social_media')}} :
                                                    </p>


                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="facebook"><span class="icon fab fa-facebook-square"></span> Facebook</label>
                                                        <a href="#" id="facebook" data-king="facebook" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$links->facebook}}</a>
                                                    </div>
                                                    <!--data group-->

                                                     <!--data group-->
                                                     <div class="data-group">
                                                        <label for="twitter"><span class="icon fab fa-twitter"></span> Twitter</label>
                                                        <a href="#" id="twitter" data-king="twitter" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$links->twitter}}</a>
                                                    </div>
                                                    <!--data group-->


                                                     <!--data group-->
                                                     <div class="data-group">
                                                        <label for="linked"><span class="icon fab fa-linkedin"></span> linked</label>
                                                        <a href="#" id="linked" data-king="linkedin" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$links->linkedin}}</a>
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
    function send(newValue,element){
      var type = element.data('king');
      var url;
      if(type == 'phone' || type == 'home_phone'){
        url = "{{route(Helper::type($profile->status).'.profile_edit')}}";
      }else{
        url ="{{route(Helper::type($profile->status).'.links_edit')}}";
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          '_token': $('input[name="_token"]').val(),
          'newValue': newValue,
          'type': type,
        },
        success: function (data) {
          $.notify("Success \n "+type+" Updated Successfully",{ position:"top right" ,className:"success"});
        },        
        error: function(data){
          $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
        }

      });
    }

    $('#phone').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    });


    $('#home_phone').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    });
    
    $('#facebook').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    });

    $('#twitter').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    });

    $('#linked').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        }
    });



});
</script>
@endsection