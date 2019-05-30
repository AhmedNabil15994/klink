 <!--header-->
<header class="header rale">
<style type="text/css">
    .label.label-success{
        position: absolute;
        top: 9px;
        right: 7px;
        text-align: center;
        font-size: 12px;
        padding: 2px 3px;
        line-height: .9;
    }
    .header .topnav__list .listItem .dropDown .dropDown__list .downlink{
        width: 100%;
    }
</style>
<!--start nav-->
<nav class="dashnav">
    <!--dashNav Header-->
    <div class="dashnav__header">
        <!--logo-->
        <div class="logo">
            <a href="#">
                <img src="{{asset('images/logo3.png')}}" alt="logo">
            </a>
        </div>
        <!--logo-->
        <!--navButton-->
        <div class="navButton">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!--navButton-->
    </div>
    <!--dashNav Header-->

    <!--main navigation-->
    <div class="topnav">
        <ul class="topnav__list">
            <?php 
                $langs = DB::table('language_files')->get();
            ?>
            <!--language switcher-->
            <select class="selectpicker" data-width="fit" id="select_lang">
            @foreach($langs as $lang)
                @if (App::isLocale($lang->shortcut))  
                 <option value="{{$lang->shortcut}}" data-content='<img src="{{asset('images/flags')}}/{{$lang->shortcut}}.png"/>{{$lang->name}}' selected></option>      
                @else
                 <option value="{{$lang->shortcut}}" data-content='<img src="{{asset('images/flags')}}/{{$lang->shortcut}}.png"/>{{$lang->name}}'></option>           
                @endif
            @endforeach
            
            </select>
            <!--language switcher-->

            <?php 
                $count = \DB::table('faqs')->where('is_seen',1)->where('user_id',Auth::user()->id)->where('is_read',0)->count();
                $questions = \DB::table('faqs')->where('is_seen',1)->orderBy('id','DESC')->where('user_id','=',Auth::user()->id)->take(10)->get();
            ?>


            <li class="listItem route">
                <a href="{{route(Helper::type($profile->status).'.dashboard')}}" class="list-link" style="position: relative;">
                    <span class="fas fa-tachometer-alt
                    "></span>
                   
                </a>
            </li>    
          
            <!--notification-->
            <li class="listItem  notification">
                <a href="#" class="list-link" style="position: relative;">
                    <span class="fas fa-bell
                    "></span>
                    @if($count != 0)
                        <label class="label label-success">{{$count}}</label>
                    @endif
                </a>


                <!--notification control-->
                <ul class="dropDown notification-control">
                    <li class="dropDown__list">
                        <div class="notification-heading">
                            <h4>{{trans('frontend/dashboard.you_have')}} {{$count}} {{trans('frontend/dashboard.new_noti')}}</h4>
                        </div>
                    </li>
                   
                    <!--notification container-->
                    <div class="notification-container">
                        
                        @foreach($questions as $one)
                        <?php 
                            $color = '';
                            if($one->is_read == 0){
                                $color = '#EEE';
                            }else{
                                $color = 'transparent';
                            }
                            $diff ='';
                            if($one->replied_at != ''){
                                $date = \Carbon::parse($one->replied_at);
                                $now = \Carbon::now();
                                $diff = $date->diffForHumans($now);
                            }
                        ?>
                        <li class="dropDown__list">
                            <div class="notification-img">
                                <span class="fas fa-bell
                                " style="width: 50px;">
                                </span>
                            </div>
                            <div class="notification-info">
                                <p class="notification-name">{{trans('frontend/dashboard.answered')}}</p>
                                <p class="notification-text" style="white-space: nowrap;">{{$one->reply}}</p>
                                <p class="notification-time">{{$diff}}</p>
                            </div>
                        </li>

                        @endforeach
                        

                    </div>
                    <!--notification container-->
                    <a href="{{route(Helper::type($profile->status).'.user_faq')}}" class="seeall">{{trans('frontend/dashboard.see_all')}}</a>
                </ul>
                <!--notification control-->
            </li>
            <!--notification-->

            <!--message-->
            <li class="listItem message">
                <a href="#" class="list-link">
                    <span class="fas fa-envelope
                    "></span>
                </a>

                <!--message control-->
                <ul class="dropDown message-control">

                    <li class="dropDown__list">
                        <div class="message_number">
                            <h3>{{trans('frontend/dashboard.you_have')}} <span>3</span> {{trans('frontend/dashboard.new_msg')}}</h3>
                        </div>
                    </li>

                    <!--message-control-->
                    <div class="message-container">
                        <li class="dropDown__list">
                            <div class="sender-img">
                                <img src="{{asset('images/user.jpg')}}" alt="sender">
                            </div>
                            <div class="sender-info">
                                <p class="sender-name">Ahmed Nabil</p>
                                <p class="sender-text">Hello, Mohamed</p>
                                <p class="sender-time">9:45 AM</p>
                            </div>
                        </li>
                    </div>
                    <!--message container-->

                    <a href="#" class="seeall">{{trans('frontend/dashboard.see_all2')}}</a>
                   

                </ul>
                <!--message control-->

            </li>
            <!--message-->
            
            
            
        </ul>
    </div><!--mainNav-->
    <!--main navigation-->

</nav><!--nav-->
<!--end nav-->

</header><!--header-->
<!--header-->
