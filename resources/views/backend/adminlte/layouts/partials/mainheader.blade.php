<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{config('app.name')}}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown">
                    <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                <?php 
                                    $langs = DB::table('language_files')->get();

                                ?>
                                
                                @foreach($langs as $lang)
                                    @if (App::isLocale($lang->shortcut))  
                                     <img width="16" src="{{$lang->image}}"/>{{$lang->name}}  
                                    @endif
                                @endforeach
                                
                               


                
                                     <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu menu1" aria-labelledby="navbarDropdown1">
                                    @foreach($langs as $lang)
                                        <a class="lang" href="#" value="{{$lang->shortcut}}"><img width="16" src="{{$lang->image}}"/>{{$lang->name}} </a>
                                    @endforeach
                                </div>
                </li>
                <li class="dropdown messages-menu">
                    <?php 
                        $count = \DB::table('faqs')->where('is_seen',0)->count();
                        $questions = \DB::table('faqs')->orderBy('id','DESC')->where('user_id','!=',0)->orWhere('user_id','=',0)->where('email','!=','')->take(10)->get();

                    ?>


                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-question-circle"></i>
                        @if($count != 0)
                        <span class="label label-success">{{$count}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{$count}} New Questions</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                @foreach($questions as $one)
                                <?php

                                    $name ='';
                                    $source = '';
                                    if($one->user_id != 0){
                                        $profile = \DB::table('user_profiles')->where('user_id','=',$one->user_id)->first();
                                        $name = $profile->first_name.' '.$profile->last_name;
                                        $source = asset('images/profiles')."/".$profile->image;
                                    }elseif($one->user_id == 0 && $one->name == ''){
                                        $source = asset('images/user.jpeg');
                                        $name ='Admin';
                                    }elseif($one->user_id == 0 && $one->name != '') {
                                        $source = asset('images/user.jpeg');
                                        $name = $one->name;
                                    }
                                
                                    $color = '';
                                    if($one->is_seen == 0){
                                        $color = '#EEE';
                                    }else{
                                        $color = 'transparent';
                                    }

                                    $date = \Carbon::parse($one->created_at);
                                    $now = \Carbon::now();
                                    $diff = $date->diffForHumans($now);
                                ?>

                                <li style="background: {{$color}};"><!-- start message -->
                                    <a href="{{route('questions.index')}}">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{$source}}" class="img-circle" alt="User Image"/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            {{$name}}
                                            <small><i class="fa fa-clock-o"></i> {{$diff}}</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>{{$one->question}}</p>
                                    </a>
                                </li><!-- end message -->
                                @endforeach
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="{{route('questions.index')}}">See All Questions</a></li>
                    </ul>
                </li><!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.notifications') }}</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> {{ trans('adminlte_lang::message.newmembers') }}
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">{{ trans('adminlte_lang::message.viewall') }}</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ trans('adminlte_lang::message.tasks') }}</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            {{ trans('adminlte_lang::message.tasks') }}
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% {{ trans('adminlte_lang::message.complete') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">{{ trans('adminlte_lang::message.alltasks') }}</a>
                        </li>
                    </ul>
                </li>
                @if (!\Auth::guard('webadmin')->check())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset('img/user1-128x128.jpg')}}" class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::guard('webadmin')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ asset('img/user1-128x128.jpg')}}" class="img-circle" alt="User Image" />
                                <p>
                                    {{ Auth::guard('webadmin')->user()->name }}
                                    <small>{{ trans('adminlte_lang::message.login') }} Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.followers') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.sales') }}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{ trans('adminlte_lang::message.friends') }}</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/settings') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ trans('adminlte_lang::message.signout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="logout" style="display: none;">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
