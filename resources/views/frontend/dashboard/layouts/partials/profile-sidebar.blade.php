<style type="text/css">
     .profile-pic img{
        border-radius: 50% ;
        margin-top: -1rem ;
    }
    div.user-name{
        margin-top: 0 !important;
    }
</style>
<!--profile view side-->
<div class="profile-side white rale">

    <!--user profile-->
    <div class="profile-user clearfix">
        <div class="profile-pic">
            @if(!empty($profile['image']))
            <img src="{{asset('images/profiles')}}/{{$profile['image']}}" alt="avatar"> 
            @else
            <img src="{{asset('images/avatar.png')}}" alt="avatar"> 
            @endif
        </div>
        <div class="user-name">
            {{$profile['first_name'].' '.$profile['last_name']}}
        </div>
    </div>
<!--user profile-->






<!--sidebar nav-->
<ul class="sideList">

    <li class="sideList__item">
        <a href="{{route(Helper::type($profile->status).'.profile')}}" class="{{Active(Helper::type($profile->status).'.profile')}} {{Active(Helper::type($profile->status).'.account_setting')}} {{Active(Helper::type($profile->status).'.contact_info')}} {{Active(Helper::type($profile->status).'.payment_info')}} {{Active(Helper::type($profile->status).'.document')}} {{Active(Helper::type($profile->status).'.my_deactivate')}} {{Active(Helper::type($profile->status).'.employment')}}">
            <div class="sideIcon">
                <span class="listIcon fas fa-cog"></span>
            </div>
            <div>
                {{trans('frontend/dashboard.profile_setting')}}
            </div>
        </a>
    </li>

    @if($profile->status == "Driver" || $profile->status == "Company")
    <?php 
        $class = '';
        if($profile->status == 'Driver'){
            $class = 'hidden';
        }
    ?>
    <li class="sideList__item {{$class}}">
        <a href="{{route(Helper::type($profile->status).'.drivers')}}" class="{{Active(Helper::type($profile->status).'.drivers')}}">
            <div class="sideIcon">
                <span class="listIcon  fas fa-users"></span>
            </div>
            <div>
                 {{trans('frontend/dashboard.drivers')}}
            </div>
        </a>
    </li>


    <li class="sideList__item">
        <a href="{{route(Helper::type($profile->status).'.vehicles')}}" class="{{Active(Helper::type($profile->status).'.vehicles')}}">  
            <div class="sideIcon">
                <span class="listIcon fas fa-car"></span>
            </div>
            <div>
                {{trans('frontend/dashboard.vehicles')}}
            </div>
        </a>
    </li>
    @endif
    

</ul>
<!--sidebar nav-->



</div>
<!--profile view side-->
