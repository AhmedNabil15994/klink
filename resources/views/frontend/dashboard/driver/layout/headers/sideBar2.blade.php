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
            <a href="{{route('user3.profileSetting')}}" class="{{Active('user3.profileSetting')}} {{Active('account_setting')}} {{Active('contact_info')}} {{Active('payment_info')}} {{Active('document')}} {{Active('my_deactivate')}} {{Active('employment')}}">
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