<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ucwords($data->title)}}</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="{{trans('frontend/seo.description')}}">
      <meta name="keywords" content="{{trans('frontend/seo.keywords')}}">
      <meta name="google-site-verification" content="C23mwtHjJ67SdQnWEAM_mhJg4tKDTCSsZleWw_1Ovog" />

      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125439739-1"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-125439739-1');
      </script>

      {{-- <meta name="author" content="{{trans('frontend/seo.author')}}"> --}}

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Raleway:300,500" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
      <!--fonts-->
      <link href="{{asset('css/bootstrap2.min.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
      <link href="{{asset('css/slick.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/number.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/nav.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/nav_style.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/main2.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('css/main_Color.css')}}" rel="stylesheet"  data-type="themes" type="text/css">
      <link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('plugins/ladda-buttons/css/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css">


      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/faq-style.css')}}">
      <link href="{{asset('css/footer-style.css')}}" rel="stylesheet" type="text/css">
      

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->


      <style> 
          html{
              font-size:62.5%  !important;
          }
          @font-face {
            font-family: myNumberFont;
            src: url({{asset('fonts/CalibreTest-Bold.woff')}});
          }
          .myNumberFont {
              font-family: myNumberFont;
              font-weight: bold;
              letter-spacing: 1px;
          }
          .faq-page{
              padding-top: 20px;
              padding-bottom: 20px;
          }
      </style>
      @yield('styles')

  </head>

  <body>    
    <!--cookies popup-->
    <div class="cookies">
        <div class="container rale">
            <div class="row">

                <div class="col-xs-12">
                    <div class="cookies-popup">
                        <p>
                            {{trans('frontend/main.cookie') }}<span class="accept-cookies">{{trans('frontend/main.accept')}}</span>
                        </p>
                    </div><!--cookies popup-->
                </div><!--col-->

            </div>
        </div><!--container-->
    </div>
    <!--cookies popup-->

    <header class="header rale">
        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{route('main')}}">
                  <img src="{{asset('images/logo3.png')}}" class="img-responsive" alt="logo" draggable="false">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li ><a href="{{URL::to('/login')}}" class="{{Active('login')}}">{{trans('frontend/main.login')}}</a></li>
                <li ><a href="{{route('business_customer.index')}}" class="{{Active('business_customer.*')}}">{{trans('backend/customer_business.title')}}</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
            

          </div><!-- /.container-fluid -->
        </nav>
    </header>
    
    @yield('content')

    <!--footer-->
    <section class="footer rale">
      <div class="container">
        <div class="row">

          <div class="col-md-3 col-sm-4">
            <div class="footer__info">
              <div class="footer-logo">
                <img src="{{asset('images/logoFooter.png')}}" alt="mylogo" draggable="false">
              </div>

              <a href="https://www.facebook.com/kurierlink" target="_blank" id="link">
                Follow us on <span class="fab fa-facebook-f"></span>acebook</a>
              </a>
              <p>
                © 2018 Kurier link, {{trans('frontend/main.rights')}}.
              </p>
            </div>
          </div>

          <div class="col-md-2 col-sm-4">
            <div class="footer__company">
              <h4 class="footer__heading">{{trans('frontend/order.company')}}</h4>

              <ul class="company__list">
                <li class="company__list--item"><a href="{{route('main')}}" class="company__list--link">{{trans('frontend/main.home')}}</a></li>
                <li class="company__list--item"><a href="{{route('register')}}" class="company__list--link">{{trans('frontend/main.register')}}
                </a></li>
                <li class="company__list--item"><a href="{{route('about')}}" class="company__list--link">{{trans('frontend/main.about')}}</a></li>
                <li class="company__list--item"><a href="{{route('service')}}" class="company__list--link">{{trans('frontend/main.service')}}
                </a></li>

              </ul>

            </div>
          </div><!--col-->

          <div class="col-md-2 col-sm-4">
            <div class="footer__map">
              <h4 class="footer__heading">{{trans('frontend/main.support')}}
              </h4>
              <ul class="map__list">
                <li class="map__list--item"><a href="{{route('contact')}}" class="map__list--link">{{trans('frontend/main.contact')}}</a></li>
                <li class="map__list--item"><a href="{{route('faq')}}" class="map__list--link">FAQ</a></li>
                <li class="map__list--item"><a href="{{route('terms')}}" class="map__list--link">{{trans('frontend/main.terms')}}</a></li>
                <li class="map__list--item"><a href="{{route('terms')}}" class="map__list--link">{{trans('frontend/main.privacy')}}</a></li>
                <li class="map__list--item"><a href="{{route('imp')}}" class="map__list--link">{{trans('frontend/main.imp')}}</a></li>
              </ul>
            </div>
          </div><!--col-->

          <div class="col-md-5 col-sm-4">
            <div class="footer__subscribe container-fluid">
              <div class="row">
                <div class="social">
                  <h4 class="footer__heading" >zahlungsarten  :</h4>
                  <ul class="social__list clearfix" style="display:flex;flex-wrap:wrap;align-items:center;">
                    <li class="social__list--item2">
                      <img src="{{asset('images/visa.svg')}}" alt="visa">
                    </li>
                    <li class="social__list--item2">
                      <img src="{{asset('images/master.svg')}}" alt="master">
                    </li>
                    <li class="social__list--item2 ">
                      <img class="custom-margin" src="{{asset('images/pay.png')}}" alt="pay">
                    </li>
                    <li class="social__list--item2">
                      <img src="{{asset('images/paypal.svg')}}" alt="paypal">
                    </li>
                    <li class="social__list--item2">
                      <img class="" src="{{asset('images/sepa.svg')}}" alt="paypal">
                    </li>
                    <li class="social__list--item2">
                      <img class="" src="{{asset('images/vorkasse.svg')}}" alt="paypal" style="height: 35px;margin-top: 0 !important;">
                    </li>
                  </ul>
                </div><!--social-->
              </div>

              <div class="row">
                <div class="subscribe__form">

                  <form action="" class="sub-form">
                    <input type="email" placeholder="{{trans('frontend/main.enter_email')}}" required>
                    <button class="subscribe-button">
                      <span class="fab fa-telegram-plane"></span>
                    </button>
                  </form>
                </div><!--form-->
              </div>
            </div>
          </div>
        </div>
        <!--row-->
      </div>
      <!--container-->
    </section>
    <!--footer-->

    <!-- <script src="jquery.nicescroll-master/jquery.nicescroll.min.js"></script> -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/js.cookie.js')}}"></script>
    <script src="{{asset('js/cookies.js')}}"></script>
    <script src="{{asset('plugins/notifyjs/js/notify.js')}}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!--script src="{{asset('js/detect.js')}}"></script>-->
    <script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/spin.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/ladda.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/ladda.jquery.min.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/number.js')}}"></script>
    
    <script>
      @if(Session::has('success'))
          $.notify("Saved successfully \n Information Saved Successfully", {position: "top right",className: "success"});
      @endif
      @if(Session::has('errors'))
        @foreach(Session::get('errors') as $err)
          $.notify("Whoops \n" + "{{ $err[0] }}", {position: "top right",className: "error"});
        @endforeach
      @endif
    </script>

    @yield('scripts')

  </body>  
</html>