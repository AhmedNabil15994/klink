<!--side menu-->
<aside class="sideMenu rale">




    <!--user information-->
    <div class="sideUser clearfix">
        <div class="sideImg">
            <img src="{{asset('images/user.jpeg')}}" alt="userPhoto">
        </div><!--user img-->
        <div class="userName">
            <p class="sideUname">{{$sender->first_name}}</p>
            <p class="sideUemail">{{$sender->nick_name}}</p>
        </div><!--user name-->
    </div><!--side user-->
    <!--user information-->










    <!--sidebar nav-->
    <ul class="sideList">



        <li class="sideList__item big">
            <a href="#">
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
                <li class="first"><a href="#">{{trans('frontend/dashboard.howToUse')}}</a></li>
                <li><a href="#">{{trans('frontend/dashboard.support')}}</a></li>
                <li><a href="#">faq</a></li>
            </ul>


        </li>
        <li class="user-navi_list big">
            <span class="fas fa-user-circle"></span>

            <ul class="user-navi_sub">
                

            </ul>
        </li>
    </ul>
    <!--user nav-->


    <!--end side menu-->


</aside>
<!--end side menu-->

