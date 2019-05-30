<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">   

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,500" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
        <!--fonts-->
        <link href="{{asset('css/bootstrap2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('datetime/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type="text/css">


        <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
        <link href="{{asset('css/nav.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/nav_style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/main2.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/main_Color.css')}}" rel="stylesheet"  data-type="themes" type="text/css">
        <link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css">

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


        <style>
           

            /*
            @media (min-width:2881px) and (max-width:3120px){
                html{
                    font-size:160% !important;
                }
            }

            @media (min-width:2881px) and (max-width:3120px){
                html{
                    font-size:140% !important;
                }
            }

            @media (min-width:2560px) and (max-width:2880px){
                html{
                    font-size:120% !important;
                }
            }


            @media (min-width:2161px) and (max-width:2559px){
                html{
                    font-size:105% !important;
                }
            }


            @media (min-width:1921px) and (max-width:2160px){
                html{
                    font-size:95% !important;
                }
            }

            @media (min-width:1681px) and (max-width:1920px){
                html{
                    font-size:85% !important;
                }
            }


            @media (min-width:1441px) and (max-width:1680px){
                html{
                    font-size:75% !important;
                }
            }
            */

            
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
        </style>


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
                <!--cookies popup-->
    </div>





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
              <!--<li ><a href="{{route('main')}}" class="{{Active('main')}}">{{trans('frontend/main.home')}}</a></li>
              <li ><a href="{{route('about')}}" class="{{Active('about')}}">{{trans('frontend/main.about')}}</a></li>
              <li ><a href="{{route('service')}}" class="{{Active('service')}}">{{trans('frontend/main.service')}}</a></li>
              <li ><a href="{{route('faq')}}" class="{{Active('faq')}}">FAQ</a></li>
              <li ><a href="{{route('contact')}}" class="{{Active('contact')}}">{{trans('frontend/main.contact')}}</a></li>
              -->
              <li ><a href="{{URL::to('/login')}}" class="{{Active('login')}}">{{trans('frontend/main.login')}}</a></li>
            </ul>
            
          </div><!-- /.navbar-collapse -->
          

        </div><!-- /.container-fluid -->
      </nav>
    </header>

    
 

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/js.cookie.js')}}"></script>
<script src="{{asset('js/cookies.js')}}"></script>






<script>



    /* / window.onscroll = function() {sticky();}
    
    // let navbar = document.getElementById("navbar");
    // let nav_offset = navbar.offsetTop;
    // console.log(nav_offset);

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        // function sticky() {
        // if (window.pageYOffset >= nav_offset) {
        //     navbar.classList.add("sticky")
        // } else {
        //     navbar.classList.remove("sticky");
        // }
        // }*/


  $('#toolbox').click(function(){
   // $('.option-template-menu').toggleClass('right');
  });
        // When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    
    if($(window).width() >= 767){
        if (document.body.scrollTop > 170 || document.documentElement.scrollTop > 170) {
            $('.option-template-menu').css({left : "-73.5rem"});
            $('#googlemaps').removeClass('left');
        } else {
          
            if($('.option-template-menu #from2').val() != '' ||$('.option-template-menu #to2').val() != ''){
                $('.option-template-menu').css({left : "0"});
                $('#googlemaps').addClass('left');
            }else{
              $('#googlemaps').removeClass('left');
            }
        }
    }

}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    $('html, body').animate({scrollTop : 0},600);
    
    // document.body.scrollTop = 0; // For Safari
    // document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}



//to change site_Color
$('.color-list li a').click(function (){
  // console.log( $('link[href="main.css"]')); 

  $("link[data-type=themes]").attr({href :$(this).attr('themes')} );
});


</script>