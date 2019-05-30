<div class="profile-side rale">

        <!--user profile-->
        <div class="profile-user clearfix">
            <div class="logo-img">
                <img src="{{asset('images/logoFooter.png')}}" alt="logo">
            </div>
        </div>
        <!--user profile-->
    
    
    
    
    
    
        <!--sidebar nav-->
        <ul class="sideList">
    
            <li class="sideList__item">
                <a href="{{route(Helper::type($profile->status).'.orders')}}" class="{{Active(Helper::type($profile->status).'.orders')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-shipping-fast"></span>
                    </div>
                    <div>
                        {{trans('frontend/dashboard.my_orders')}}
                    </div>
                </a>
            </li>
            @if($profile->status == "Driver" || $profile->status == "Company")
            <li class="sideList__item">
                <a href="{{route(Helper::type($profile->status).'.assign')}}" class="{{Active(Helper::type($profile->status).'.assign')}} {{Active(Helper::type($profile->status).'.pending')}} {{Active(Helper::type($profile->status).'.cancelled')}} {{Active(Helper::type($profile->status).'.finished')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-tasks"></span>
                    </div>
                    <div>
                        {{trans('frontend/dashboard.assign')}}
                    </div>
                </a>
            </li>
            @endif
            <li class="sideList__item">
                <a href="{{route(Helper::type($profile->status).'.activeorders')}}" class="{{Active(Helper::type($profile->status).'.activeorders')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-shopping-cart"></span>
                    </div>
                    <div>
                        {{trans('frontend/dashboard.active_orders')}}
                    </div>
                </a>
            </li>
    
            @if($profile->status == "Company")

            <li class="sideList__item">
                <a href="{{route('user.business_customer.index')}}" class="{{Active('user.business_customer.*')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-file-alt"></span>
                    </div>
                    <div>
                        {{trans('frontend/customer_business.title')}}
                    </div>
                </a>
            </li>
            @endif

            @if($profile->status == "Driver")
            <li class="sideList__item">
                <a href="{{route('user3.business_customer.index')}}" class="{{Active('user3.business_customer.index')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-file-alt"></span>
                    </div>
                    <div>
                        All Trips
                    </div>
                </a>
            </li>
            <li class="sideList__item">
                <a href="{{route('user3.business_customer.filterTrips','today')}}" class="{{Active('driver/dashboard/today_trips')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-file-alt"></span>
                    </div>
                    <div>
                        Today Trips
                    </div>
                </a>
            </li>
            <li class="sideList__item">
                <a href="{{route('user3.business_customer.filterTrips','tomorrow')}}" class="{{Active('driver/dashboard/tomorrow_trips')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-file-alt"></span>
                    </div>
                    <div>
                        Tomorrow Trips
                    </div>
                </a>
            </li>
            <li class="sideList__item">
                <a href="{{route('user3.business_customer.filterTrips','yesterday')}}" class="{{Active('driver/dashboard/yesterday_trips')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-file-alt"></span>
                    </div>
                    <div>
                        Yesterday Trips
                    </div>
                </a>
            </li>
            @endif
            
            @if($profile->status == "Company" )
            <li class="sideList__item">
                <a href="{{route('abstracts')}}" class="{{Active('abstracts')}} {{Active('order_abstract')}}">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-file-alt"></span>
                    </div>
                    <div>
                        {{trans('frontend/dashboard.payments')}}
                    </div>
                </a>
            </li>
            @endif
    
            
    
    
        </ul>
        <!--sidebar nav-->
    
    
    
    </div>