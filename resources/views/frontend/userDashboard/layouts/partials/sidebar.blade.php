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
            <a href="{{route('user2.dashboard')}}">
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
                <li class="first"><a href="{{route(Helper::type($profile->status).'.howToUse')}}">{{trans('frontend/dashboard.howToUse')}}</a></li>
                <li><a href="#" data-toggle="modal" data-target="#myData">{{trans('frontend/dashboard.myData')}}</a></li>
                <li><a href="#">{{trans('frontend/dashboard.support')}}</a></li>
                <li><a href="{{route(Helper::type($profile->status).'.user_faq')}}">faq</a></li>
            </ul>


        </li>
        <li class="user-navi_list big">
            <span class="fas fa-user-circle"></span>

            <ul class="user-navi_sub">
                <li>{{auth()->user()->name}}</li>
                <?php 
                    $class = '';
                    if($profile->status == 'Driver'){
                        $class = 'hidden';
                    }
                ?>
                
                
                <li><a href="{{route(Helper::type($profile->status).'.profile')}}">{{trans('frontend/dashboard.view_profile')}}</a></li>
                <li><a href="{{route(Helper::type($profile->status).'.logout')}}">{{trans('frontend/dashboard.logout')}}</a></li>



            </ul>
        </li>
    </ul>
    <!--user nav-->


    <!--end side menu-->


</aside>
<!--end side menu-->
<style type="text/css">
    input[type="password"]{
        position: relative;
    }
    span.password,
    span.pin{
        position: absolute;
        right: 2rem;
        top: 1rem;
        color: #2d5877;
        cursor: pointer;
    }

</style>
<div class="modal fade rale" tabindex="-1" role="dialog" id="myData">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-image"></span>{{trans('frontend/dashboard.myData')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="email">{{trans('frontend/dashboard.email')}}</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
                        </div>
                    </div>
                </div>

                
                @if(Hash::check('user123456',Auth::user()->password))
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="password">{{trans('frontend/dashboard.driverPassword')}}</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="password" class="form-control password" name="email" value="user123456" readonly>
                            <span class="password"><i class="fa fa-eye"></i></span>

                        </div>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="pin">{{trans('frontend/dashboard.pin')}}</label>
                        </div>
                        <div class="col-xs-8">
                            <input type="password" class="form-control pin" name="pin" value="{{$profile->pin}}" readonly>
                            <span class="pin"><i class="fa fa-eye"></i></span>
                        </div>
                    </div>
                </div>


            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.save')}}</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
