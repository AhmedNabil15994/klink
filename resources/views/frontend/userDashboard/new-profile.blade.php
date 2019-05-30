@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
<div class="profile-side rale">

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
                        <a href="#">Mohamed Emad</a>
                    </div>
                </div>
                <!--user name block-->


                <!--user status place-->
                <div class="col-xs-12">
                    <div class="user-status-space">
                        <h3>Settings</h3>
                        <select class="selectpicker" id="selectpicker500" data-live-search="true">
                            <option data-content="<img class='custom-image' src='{{asset('images/avatar.png')}}'/>  Mohamed Emad">
                            </option>
                        </select>
                    </div>
                </div>
                <!--user status place-->


                <!--secondary row-->
                <div class="col-xs-12">
                    <div class="information-space">
                        <div class="row">

                            <!--first col-->
                            <div class="col-sm-3">
                                <div class="side-data">

                                    <ul class="side-list">
                                        <li><strong>General</strong></li>
                                        <li><a href="#" class="active">Account Setting</a></li>
                                        <li><a href="#">Email aliases </a></li>
                                        <li><a href="#">contact information</a></li>
                                    </ul>

                                    <ul class="side-list">
                                        <li><strong>Payment setting</strong></li>
                                        <li><a href="#">Bank information </a></li>
                                        <li><a href="#">Billing information</a></li>
                                    </ul>
                                    
                                    <ul class="side-list">
                                        <li><strong>Document and Notification</strong></li>
                                        <li><a href="#"> Document</a></li>
                                        <li><a href="#"> Notification</a></li>
                                    </ul>

                                    <ul class="side-list">
                                        <li><strong>Security setting</strong></li>
                                        <li><a href="#">Password</a></li>
                                        <li><a href="#">Deactive Account</a></li>
                                        <li><a href="#">Account Log</a></li>
                                    </ul>

                                    

                                </div>
                            </div>
                            <!--first col-->

                            <!--second col-->
                            <div class="col-sm-9">
                                <div class="side-information">

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
 