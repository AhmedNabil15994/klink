<!--profile view side-->
<div class="profile-side rale">

    <!--user profile-->     
    <div class="sideUser clearfix">
       <div class="sideImg" style="padding: 0 2rem;">
            
            <img src="{{asset('images/avatar.png')}}" alt="userPhoto" style="height: 5rem;width: 5rem;border-radius: 50%;margin-right: .5rem">
           <a href="#" style="color: #FFF;">{{$sender->first_name.' '.$sender->nick_name}}</a>
       </div>
    </div>
    <!--user profile-->






    <!--sidebar nav-->
    <ul class="sideList">

        
       
        <li class="sideList__item">
            <a  href="#" class="active">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.pending_orders')}} 
                </div>
            </a>
        </li>

        
        <li class="sideList__item">
            <a href="#">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.active_orders')}}
                </div>
            </a>
        </li>

        <li class="sideList__item">
            <a href="#">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.finished_orders')}}
                </div>
            </a>
        </li>

        <li class="sideList__item">
            <a href="#">
                <div class="sideIcon">
                    <span class="listIcon fas fa-tasks"></span>
                </div>
                <div>
                    {{trans('frontend/dashboard.cancelled_orders')}}
                </div>
            </a>
        </li>
                            
        
    </ul>
    <!--sidebar nav-->



</div>
<!--profile view side-->