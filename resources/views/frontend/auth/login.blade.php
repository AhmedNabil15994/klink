@include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/login_style.css">
<style type="text/css">
    .alert-danger {
        width: 100%;
        margin: 0;
        margin-top:1rem;
        padding: 2.5rem 0 !important;
        background-color: #d9534f;
        color: #FFF;
        border-radius: .5rem;
        border-color: #d43f3a;
        font-size:1.5rem;
    }

    /* login service Ahmed Ali 15-07-2018 */

    .login-service-wrapper {
        width: 100%;
        border-top: .1rem solid #ebebeb;
        display: flex;
        padding: .5rem 0;
        flex-wrap: wrap;
        /* justify-content: space-between; */
    }

    .login-service-message {
        color: #afafaf;
        font-size: 1.2rem;
        text-transform: uppercase;
        min-width: 100%;
        flex: 1 0 100%;
        text-align:center;
        margin-top:1rem;
        margin-bottom:1rem;
    }

    .login-service-item {
        min-width: 100px;
        height: 45px;
    
        min-width: 10rem;
        height: 4.5rem;
        border: 1px solid #dbe2e8 !important;
        padding: 0.75em 1em;
        margin-top: .5rem;
        margin-right: .5rem;
        cursor: pointer;
        flex: 1;
        text-decoration: none;

    }

    .login-service-item:hover,
    .login-service-item:focus {
        text-decoration: none;
    }

    .login-service-item-inner {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #757c81;
        font-size:1.4rem;
    }

    .login-service-item i.fab,
    .login-service-item i.fas {
        font-size: 1.5rem;
        margin-right: .5rem;

    }

    section {
    }
</style>
<!--login forget space-->
<section class="log-section">
    <div class="black-overlay">
        <div class="container">


            <div class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3  col-xs-10 col-xs-offset-1">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('backend/message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="log_space rale">

                    <div class="slide-item active">

                        <form action="{{route('postLogin')}}" class="login-form" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <div class="site-logo">
                                    <img src="images/logo3.png" alt="logo">
                                </div>
                            </div>
                            <!--form group-->

                            <div class="form-group">
                                <span class="icon glyphicon glyphicon-user
                                    "></span>
                                <input type="email" id="emailadd" name="email" required>
                                <label for="emailadd" class="special">{{trans('frontend/auth.email')}}</label>
                            </div>
                            <!--form group-->

                            <div class="form-group">
                                <span class="icon glyphicon glyphicon-lock

                                    "></span>
                                <input type="password" name="password" id="password" required>
                                <label for="password" class="special">{{trans('frontend/auth.password')}}</label>
                            </div>
                            <!--form group-->

                            <div class="form-group">
                                <label for="remember" class="custom-label">
                                        <input type="checkbox" class="custom-check" value ="remember" id="remember">
                                        <span class="custom-span">{{trans('frontend/auth.remember')}}</span>
                                    </label>
                            </div>
                            <!--form group-->

                            <div class="form-group center-text">
                                <a href="{{route('reset')}}" class="forget">{{trans('frontend/auth.reset')}}</a>
                            </div>
                            <!--form group-->

                            <div class="form-group center-text">
                                <input type="submit" id="login" value="{{trans('frontend/auth.login')}}">
                            </div>
                            <!--form group-->

                            <div class="form-group center-text">
                                <a href="{{route('register')}}" class="register">{{trans('frontend/auth.create')}}</a>
                            </div>
                            <!--form group-->
                            <div class="login-service-wrapper">
                                <div class="login-service-message">{{trans('frontend/login.Message')}}</div>
                                <a href="{{route('loginCredintial',['service'=>'twitter'])}}" class="login-service-item">
                                    <div class="login-service-item-inner">
                                        <i class="fab fa-twitter" style="color:#1da1f2;"></i> {{trans('frontend/login.twitter')}}
                                    </div>
                                </a>
                                <a class="login-service-item" href="{{route('loginCredintial',['service'=>'google'])}}">
                                    <div class="login-service-item-inner">
                                        <i class="fab fa-google-plus" style="color:#d34836;"></i> {{trans('frontend/login.google+')}}
                                    </div>
                                </a>
                                <a href="{{route('loginCredintial',['service'=>'microsoft'])}}" class="login-service-item">
                                    <div class="login-service-item-inner">
                                        <i class="fas fa-cloud" style="color:#007FFF;"></i> {{trans('frontend/login.Mircosoft')}}
                                    </div>
                                </a>

                            </div>

                        </form>

                    </div>
                    <!--slide item-->
                </div>
                <!--log space-->


            </div>


        </div>
        <!--container-->
    </div>
</section>
<!--section-->
<!--login forget space-->
    @include('frontend.layouts.partials.footer')
<script type="text/javascript" src="js/login_script.js"></script>
