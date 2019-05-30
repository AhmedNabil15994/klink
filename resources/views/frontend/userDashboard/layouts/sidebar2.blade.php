<!--profile view side-->
<div class="profile-side rale">

    <!--user profile-->     
    <div class="sideUser clearfix">
       <div class="sideImg" style="padding: 0 2rem;">
            @if(!empty($profile['image']))
                <img src="{{asset('images/profiles')}}/{{$profile['image']}}" alt="userPhoto" draggable="false" style="height: 5rem;width: 5rem;border-radius: 50%;margin-right: .5rem">
            @else
                <img src="{{asset('images/user.jpeg')}}" alt="userPhoto" style="height: 5rem;width: 5rem;border-radius: 50%;margin-right: .5rem">
            @endif
           <a href="{{route('user2.profile')}}" style="color: #FFF;">{{$profile->name()}}</a>
       </div>
    </div>
    <!--user profile-->






    <!--sidebar nav-->
    <ul class="sideList">

        
       
        <li class="sideList__item">
            <a  href="{{route(Helper::type($profile->status).'.pending')}}" class="{{Active(Helper::type($profile->status).'.pending')}} {{Active(Helper::type($profile->status).'.uncompleted')}}">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.pending_orders')}} 
                </div>
            </a>
        </li>

        
        <li class="sideList__item">
            <a href="{{route(Helper::type($profile->status).'.activeorders')}}" class="{{Active(Helper::type($profile->status).'.activeorders')}}">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.active_orders')}}
                </div>
            </a>
        </li>

        <li class="sideList__item">
            <a href="{{route(Helper::type($profile->status).'.finished')}}" class="{{Active(Helper::type($profile->status).'.finished')}}">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.finished_orders')}}
                </div>
            </a>
        </li>

        <li class="sideList__item">
            <a href="{{route(Helper::type($profile->status).'.cancelled')}}" class="{{Active(Helper::type($profile->status).'.cancelled')}}">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.cancelled_orders')}}
                </div>
            </a>
        </li>


        {{--@if($profile->status == "User")
        <li class="sideList__item">
            <a href="{{route(Helper::type($profile->status).'.invoices')}}" class="{{Active(Helper::type($profile->status).'.invoices')}} {{Active(Helper::type($profile->status).'.paid')}} {{Active(Helper::type($profile->status).'.unpaid')}} {{Active(Helper::type($profile->status).'.invoice')}}">
                <div class="sideIcon">
                    <span class="listIcon fas fa-shipping-fast"></span>
                </div>
                <div>
                    {{trans('backend/bills.invoices')}}
                </div>
            </a>
        </li>
        @endif--}}
        
       

        
                            
        
    </ul>
    <!--sidebar nav-->



</div>
<!--profile view side-->