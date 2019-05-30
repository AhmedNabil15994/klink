@extends('frontend.dashboard.index')

@section('sidebar2')
@include('frontend.dashboard.layouts.partials.profile-sidebar')
@endsection

@section('page-content')
<style type="text/css">
    textarea{
        min-height: 150px;
        max-height: 150px;
        min-width: 100%;
        max-width: 100%;
    }
   
</style>
<!--pageContent-->
<div class="pageContent rale">
                <div class="container-fluid">


                    <!--account Setting-->
                    <div class="user-account-setting">

                        
                
                        



                        <!--main row-->
                        <div class="row">
                            
                            <!--user name block-->
                            <div class="col-xs-12">
                                <div class="main-user-name">
                                    <a href="{{route('user.profile')}}">{{$profile->name()}}</a>
                                </div>
                            </div>
                            <!--user name block-->


                            <!--user status place-->
                            <div class="col-xs-12">
                                <div class="user-status-space">
                                    <h3>{{trans('frontend/dashboard.settings')}}</h3>
                                    <select class="selectpicker" id="selectpicker500" data-live-search="true">
                                        <option data-content='<img class="custom-image" src="{{asset("images/avatar.png")}}"/>  {{$profile->name()}}'>
                                        </option>
                                        @if( $drivers != null || $drivers != '' )
                                            @foreach($drivers as $driver)
                                            <option data-val="{{$driver->user_id}}" data-content='<img class="custom-image" src="{{asset("images/avatar.png")}}"/>  {{$driver->profile->name()}}'>
                                            </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!--user status place-->


                            <!--secondary row-->
                            <div class="col-xs-12">
                                <div class="information-space">
                                    <div class="row">

                                        <!--first col-->
                                        <div class="col-md-3 col-sm-4">
                                            <div class="side-data">

                                                <ul class="side-list">
                                                    <li><strong>{{trans('frontend/dashboard.general')}}</strong></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.profile')}}" class="{{Active(Helper::type($profile->status).'.profile')}}">{{trans('frontend/dashboard.profile_setting')}}</a></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.account_setting')}}" class="{{Active(Helper::type($profile->status).'.account_setting')}}">{{trans('frontend/dashboard.account_setting')}}</a></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.contact_info')}}" class="{{Active(Helper::type($profile->status).'.contact_info')}}">{{trans('frontend/dashboard.contact_info')}}</a></li>
                                                    @if($profile->status != 'User')
                                                    <li><a href="{{route(Helper::type($profile->status).'.employment')}}" class="{{Active(Helper::type($profile->status).'.employment')}}">{{trans('frontend/dashboard.employ')}}</a></li>
                                                    @endif
                                                </ul>

                                                <ul class="side-list">
                                                    <li><strong>{{trans('frontend/dashboard.payment_setting')}}</strong></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.profile_tax')}}" class="{{Active(Helper::type($profile->status).'.profile_tax')}}">{{trans('frontend/dashboard.tax')}}</a></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.payment_info')}}" class="{{Active(Helper::type($profile->status).'.payment_info')}}">{{trans('frontend/dashboard.payment_info')}}</a></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.document')}}" class="{{Active(Helper::type($profile->status).'.document')}}">{{trans('frontend/dashboard.your_docs')}}</a></li>
                                                </ul>
                                                
                                                {{-- <ul class="side-list">
                                                    <li><strong>{{trans('frontend/dashboard.docs')}}</strong></li>
                                                </ul> --}}

                                                <ul class="side-list">
                                                    <li><strong>{{trans('frontend/dashboard.security_setting')}}</strong></li>
                                                    <li><a href="{{route(Helper::type($profile->status).'.my_deactivate')}}" class="{{Active(Helper::type($profile->status).'.my_deactivate')}}">{{trans('frontend/dashboard.deactivate')}}</a></li>
                                                </ul>

                                                

                                            </div>
                                        </div>
                                        <!--first col-->

                                        <!--second col-->
                                        <div class="col-md-9 col-sm-8">
                                            <div class="side-information">
                                                
                                                @yield('new-content')


                                            </div>
                                        </div>
                                        <!--second col-->


                                    </div>
                                </div>
                            </div>
                            <!--secondary row-->




                        </div>
                        <!--main row-->




                    </div>
                    <!--account Setting-->

                   

                   
                </div>
</div>
<!--pageContent-->

@endsection

@section('scripts2')
<script type="text/javascript">
    $(function(){
        $('.selectpicker').on('change',function(){
            var id = $(this).children('option:selected').data('val');
            $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            url: "{{route('seeProfile',['user_id'=>'id'])}}".replace('id',id),
            type: 'GET',
            success: function (data) {
              window.location.href = "{{route('user3.profile')}}";
            },        
          });

        });
    })
</script>
@endsection

