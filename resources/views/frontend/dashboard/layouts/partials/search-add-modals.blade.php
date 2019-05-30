<!-- add pop up-->

            <div class="pop-up" id="addGlobalPopUp">

<!--pop container-->
<div class="pop-up__container">


    <!--side menu-->
    <div class="sideMenu rale">

        <!--sidebar nav-->
        <ul class="sideList">

            <li class="sideList__item big">
                <a href="#home">
                    <div class="sideIcon">
                        <span class="listIcon fab fa-kickstarter-k"></span>
                    </div>
                </a>
            </li>

            <li class="sideList__item popup-list ">
                <a href="" class="closePop">
                    <div class="sideIcon">
                        <span class="listIcon fas fa-arrow-left"></span>
                    </div>
                </a>
            </li>
        

            

            
        </ul>
        <!--sidebar nav-->


    



    </div>
    <!--end side menu-->





    <!--profile view side-->
    <div class="profile-side rale">

            <!--user profile-->     
            <div class="profile-user clearfix">
            <div class="logo-img">
                <img src="{{asset('images/logo3.png')}}" alt="logo">
            </div>
            </div>
            <!--user profile-->
            
            
            <h4 class="operation-heading">
                add
            </h4>
            
            @if($profile->status == "Driver" || $profile->status == "Company")

            <?php 
                $class = '';
                if($profile->status == 'Driver'){
                    $class = 'hidden';
                }
            ?>    
            
            <!--sidebar nav-->
            <ul class="sideList">
            
                <li class="sideList__item {{$class}}">
                    <a href="{{route(Helper::type($profile->status).'.drivers')}}" class="{{Active(Helper::type($profile->status).'.drivers')}}">
                        <div class="sideIcon">
                            <span class="listIcon fas fa-user-plus"></span>
                        </div>
                        <div>
                        Fahrer
                        </div>
                    </a>
                </li>


                <li class="sideList__item">
                    <a href="{{route(Helper::type($profile->status).'.vehicles')}}" class="{{Active(Helper::type($profile->status).'.vehicles')}}">
                        <div class="sideIcon">
                            <span class="listIcon fas fa-car"></span>
                        </div>
                        <div>
                             {{trans('frontend/dashboard.vehicle')}}
                        </div>
                    </a>
                </li>
            
              
                
            </ul>
            <!--sidebar nav-->
            
            @endif
            
    </div>
    <!--profile view side-->






</div>
<!--pop container-->


</div>


<!-- add pop up-->



<!-- search pop up-->

<div class="pop-up" id="searchGlobalPopUp">

    <!--pop container-->
    <div class="pop-up__container">


        <!--side menu-->
        <div class="sideMenu rale">

            <!--sidebar nav-->
            <ul class="sideList">

                <li class="sideList__item big">
                    <a href="#home">
                        <div class="sideIcon">
                            <span class="listIcon fab fa-kickstarter-k"></span>
                        </div>
                    </a>
                </li>

                <li class="sideList__item popup-list ">
                    <a href="" class="closePop">
                        <div class="sideIcon">
                            <span class="listIcon fas fa-arrow-left"></span>
                        </div>
                    </a>
                </li>
            

                

                
            </ul>
            <!--sidebar nav-->


        



        </div>
        <!--end side menu-->





        <!--profile view side-->
        <div class="profile-side rale">

                <!--user profile-->     
                <div class="profile-user clearfix">
                <div class="logo-img">
                    <img src="{{asset('images/logo3.png')}}" alt="logo">
                </div>
                </div>
                <!--user profile-->
                
                
                <h4 class="operation-heading">
                    search
                </h4>
                
                
                
                <!--sidebar nav-->
                <ul class="sideList">



                    <form action="" class="search-form">
                        <input type="text" placeholder="Search ....">
                        <button>
                            <span class="fas fa-search"></span> search
                        </button>
                    </form>
                
                    

                
                  
                    
                </ul>
                <!--sidebar nav-->
                
                
                
        </div>
        <!--profile view side-->






    </div>
    <!--pop container-->


</div>


<!-- search pop up-->
