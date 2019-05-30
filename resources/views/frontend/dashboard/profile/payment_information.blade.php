@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('new-content')

    <h4 class="section-heading">
        {{trans('frontend/dashboard.payment_setting')}}
    </h4>

    <div class="info-content">

                                                    <p class="custom-parag-content bold">
                                                        {{trans('frontend/dashboard.bank_info')}} :
                                                    </p>

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="owner">{{trans('frontend/dashboard.acc_owner')}}</label>
                                                        <a href="#" id="owner" data-king="owner" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$banks->owner}}</a>
                                                    </div>
                                                    <!--data group-->

                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="iban">IBAN </label>
                                                        <a href="#" id="iban" data-king="iban" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$banks->iban}}</a>
                                                    </div>
                                                    <!--data group-->


                                                    <p class="custom-parag-content bold">
                                                        {{trans('frontend/dashboard.billing_info')}} :
                                                    </p>


                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="ownername">{{trans('frontend/dashboard.name')}}</label>
                                                        <a href="#" id="ownername" data-king="name" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->name()}}</a>
                                                    </div>
                                                    <!--data group-->


                                                    <!--data group-->
                                                    <div class="data-group">
                                                        <label for="ownerbirthdate">{{trans('frontend/dashboard.birth_date')}}</label>
                                                        <a href="#" id="ownerbirthdate" data-king="birth_date" data-type="date" data-pk="1" data-url="" data-title="Enter username">{!! Helper::convert($profile->birth_date) !!}</a>
                                                    </div>
                                                    <!--data group-->

                                                     <!--data group-->
                                                     <div class="data-group">
                                                        <label for="company">{{trans('frontend/order.company')}} </label>
                                                        <a href="#" id="company" data-king="company" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->company}}</a>
                                                    </div>
                                                    <!--data group-->


                                                    <!--data group-->
                                                    <div class="data-group flex">
                                                        <label for="owneraddress">{{trans('frontend/dashboard.address')}} 
                                                        </label>

                                                        <div>

                                                            <a href="#" id="owneraddress" data-king="address" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->address}}
                                                            </a>

                                                            <br>

                                                            <a href="#" id="owneraddresspostal" data-king="postal_code" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->postal_code}}
                                                            </a>
                                                            <a href="#" id="owneraddressTown" data-king="district" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->district}}
                                                            </a>

                                                            <br>

                                                            <a href="#" id="owneraddressCountry" data-king="country" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$profile->country}}
                                                            </a>

                                                        </div>

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
      if(type == 'owner' || type == 'iban'){
        url = "{{route(Helper::type($profile->status).'.banks_edit')}}";
      }else{
        url ="{{route(Helper::type($profile->status).'.profile_edit')}}";
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


    $('#owner').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

    $('#iban').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

     $('#ownername').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

    
    $('#ownerbirthdate').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'yyyy-mm-dd',
        datepicker  :{
            container : '#ownerbirthdate',
            autoclose : 'true',
            format: 'yyyy-mm-dd',
        },
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });


    $('#owneraddressCountry').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

    $('#owneraddresspostal').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

    $('#owneraddressTown').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

    $('#owneraddress').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });

    $('#company').editable({
        mode: 'inline',
        success: function(response,newValue){
            send(newValue,$(this));
        },
      
    });


});
</script>
@endsection