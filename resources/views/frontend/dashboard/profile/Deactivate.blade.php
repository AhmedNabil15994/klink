@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('new-content')

         <h4 class="section-heading">
            {{trans('frontend/dashboard.deactivate')}}
         </h4>

                                              

        <div class="info-content">

                                                  

                                                   <p class="custom-parag-content">
                                                       {{trans('frontend/dashboard.deactivate_p')}} <a href="#" id="deactivate">{{trans('frontend/dashboard.deact')}}</a>.
                                                    </p>
        </div>    
                                                    

        
@endsection 

@section('scripts')
<script>

$(function () {


    $(document).on('click','#deactivate',function(e){

        e.preventDefault();
        e.stopPropagation();

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.ajax({
            type: 'POST',
            url: "{{ route(Helper::type($profile->status).'.deactivate') }}",
            data: {
                '_token': $('input[name=_token]').val(),
            },
          	success: function(data) {
               
                $.notify("Deactivated successfully \n Account Deactivated successfully",{ position:"top right" ,className:"success"});
                setTimeout(function () {
                    location.reload();
                },2000)
            },
            error: function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
            }

        });           
    }); 




});
</script>
@endsection