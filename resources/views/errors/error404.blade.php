@include('frontend.layouts.partials.nav')
<link rel="stylesheet" type="text/css" href="{{asset('css/error404.css')}}">
<!--404 page-->
<div class="error-page rale">
        <div class="container">


            <div class="row">

                <div class="col-xs-12">


                    <div class="page-content">

                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                                <div class="error-image">
                                    <img src="{{asset('images/error404.png')}}" alt="error" draggable="false">
                                </div>
                            </div>

                            
                        </div>



                        <div class="row">


                            <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                                <div class="error-text">
                                    <h4>
                                        {{trans('frontend/main.oh')}}
                                    </h4>
                                    <p>
                                        {{trans('frontend/main.page')}}
                                    </p>

                                   
                                </div>
                            </div>

                            
                        </div>

                        <a href="{{route('main')}}">
                            <button class="go-home">
                                    {{trans('frontend/main.go_home')}}
                            </button>
                         </a>









                    </div>



                </div>


            </div>


        </div>
</div>
<!--404 page-->  

@include('frontend.layouts.partials.footer')
