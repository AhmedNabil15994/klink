<!--side menu-->
<aside class="sideMenu rale">


    <!--side menu-->
<aside class="sideMenu rale">


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










<!--sidebar nav-->
<ul class="sideList">



<li class="sideList__item big">
<a href="{{route('user.dashboard')}}">
 <div class="sideIcon">
     <span class="listIcon fab fa-kickstarter-k negative-margin"></span>
 </div>
</a>
</li>

<li class="sideList__item ">
<a href="" data-pop="searchGlobalPopUp" class="hover-effect popup-list">
 <div class="sideIcon">
     <span class="listIcon fas fa-search"></span>
 </div>
</a>
</li>




<li class="sideList__item popup-list">
<a href="" data-pop="addGlobalPopUp"  class="hover-effect popup-list">
 <div class="sideIcon">
     <span class="listIcon fas fa-plus"></span>
 </div>
</a>
</li>












</ul>
<!--sidebar nav-->


<!--user nav-->
<ul class="user-navi">
<li class="user-navi_list">
<span class="fas fa-question-circle"></span>

<ul class="user-navi_sub faq">
 <li>{{trans('frontend/dashboard.help')}}</li>
 <li class="first"><a href="{{route('howToUse')}}">{{trans('frontend/dashboard.howToUse')}}</a></li>
 <li><a href="#">{{trans('frontend/dashboard.support')}}</a></li>
 <li><a href="{{route('user_faq')}}">{{trans('frontend/driver-dashboard/header.faq')}}</a></li>
</ul>


</li>
<li class="user-navi_list big">
<span class="fas fa-user-circle"></span>

<ul class="user-navi_sub">
 <li>{{auth()->user()->name}}</li>
 <li><a href="{{route('drivers')}}">{{trans('frontend/dashboard.drivers')}} </a></li>
 <li><a href="{{route('vehicles')}}">{{trans('frontend/dashboard.vehicle')}}</a></li>
 <li><a href="{{route('user.profile')}}">{{trans('frontend/dashboard.view_profile')}}</a></li>
 <li><a href="{{route('company.logout')}}">{{trans('frontend/dashboard.logout')}}</a></li>



</ul>
</li>
</ul>
<!--user nav-->


</aside>
<!--end side menu-->


</aside>
<!--end side menu-->