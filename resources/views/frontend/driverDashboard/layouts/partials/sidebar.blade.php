<!--side menu-->
<aside class="sideMenu rale nicescroll-box">


                <!--user information-->
                <div class="sideUser clearfix">
                    <div class="sideImg">
                        @if(!empty($profile['image']))
                            <img src="{{asset('images/profiles')}}/{{$profile['image']}}" alt="userPhoto" draggable="false">
                        @else
                            <img src="{{asset('images/user.jpeg')}}" alt="userPhoto">
                        @endif
                    </div><!--user img-->
                    <div class="userName">
                        <p class="sideUname">{{\Auth::user()->name}}</p>
                        <p class="sideUemail">{{\Auth::user()->email}}</p>
                    </div><!--user name-->
                </div><!--side user-->
                <!--user information-->
                
                <div class="wrap">
                    <!--sidebar nav-->
                    <ul class="sideList">
                        <li class="sideList__item">
                        <a href="{{route('user.dashboard')}}" class="{{Active('user.dashboard')}}">
                                <div class="sideIcon">
                                    <span class="listIcon fas fa-tachometer-alt"></span>
                                </div>
                                <div>
                                    {{trans('frontend/dashboard.dashboard')}}
                                </div>
                            </a>
                        </li>

                        <li class="sideList__item">
                            <a href="{{route('user.profile')}}" class="{{Active('user.profile')}}">
                                <div class="sideIcon">
                                    <span class="listIcon fas fa-id-card"></span>
                                </div>
                                <div>
                                    {{trans('frontend/dashboard.profile')}}
                                </div>
                            </a>
                        </li>

                        <li class="sideList__item">
                            <a href="{{route('user_faq')}}" class="{{Active('user_faq')}}">
                                <div class="sideIcon">
                                    <span class="listIcon fas fa-question-circle"></span>
                                </div>
                            <div>
                                    {{trans('frontend/dashboard.faq')}}
                            </div>
                            </a>
                        </li>

                        <li class="sideList__item">
                            <a href="{{route('vehicles')}}" class="{{Active('vehicles')}}">
                            <div class="sideIcon">
                                    <span class="listIcon fas fa-car"></span>
                            </div>
                            <div>
                                    {{trans('frontend/dashboard.vehicle')}}
                            </div> 
                            </a>
                        </li>
                        
                        <li class="sideList__item">
                            <a href="{{route('orders')}}" class="{{Active('orders')}}">
                                <div class="sideIcon">
                                    <span class="listIcon fas fa-shipping-fast"></span>
                                </div>
                                <div>
                                    {{trans('frontend/dashboard.my_orders')}}
                                </div>
                            </a>
                        </li>

                        <li class="sideList__item">
                            <a href="{{route('assign')}}" class="{{Active('assign')}} {{Active('pending')}} {{Active('cancelled')}}">
                                <div class="sideIcon">
                                    <span class="listIcon fas fa-tasks"></span>
                                </div>
                                <div>
                                {{trans('frontend/dashboard.assign')}}
                                </div>
                            </a>
                        </li>

                        <li class="sideList__item">
                            <a href="{{route('abstracts')}}" class="{{Active('abstracts')}} {{Active('order_abstract')}}">
                                <div class="sideIcon">
                                    <span class="listIcon fas fa-file-alt"></span>
                                </div>
                                <div>
                                {{trans('frontend/dashboard.abstracts')}}
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <!--sidebar nav-->
                </div>


</aside>
<!--end side menu-->