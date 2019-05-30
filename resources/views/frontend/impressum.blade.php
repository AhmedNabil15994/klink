@include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/impressum.css">
<style type="text/css">
    .test:after,
    .test:before{
        display: none !important; 
    }
    .test{
        padding-left:  0 !important;
        padding-bottom:  0 !important;
        margin-bottom:  0 !important;
    }
</style>
<section class="impressum-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="impressum">

                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="roboto-reg text-center">
                                    {{trans('frontend/impressum.title')}}
                                </h1>
                            </div>
                        </div>
                        <!--row-->


                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="provider">
                                    <p class="roboto-bold">
                                    {{trans('frontend/impressum.title2')}}
                                    </p>
                                    <span class="roboto-reg">
                                       Codruta Corbei 
                                    </span>
                                    <span class="roboto-reg">
                                        Anna-Ebermann-Str 6
                                    </span>
                                    <span class="roboto-reg">
                                        13053 Berlin 
                                    </span>
                                 </div>
                            </div>
                        </div>
                        <!--row-->


                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                    {{trans('frontend/impressum.title3')}} :
                                    </h3>
                                    <p class="roboto-reg">
                                        <span>
                                        Name :
                                        </span>
                                        Codruta Corbei
                                    </p>

                                    <p class="roboto-reg">
                                        <span>
                                        {{trans('frontend/impressum.phone')}} :
                                        </span>
                                        01515100558-01515100558

                                    </p>

                                    <p class="roboto-reg">
                                        <span>
                                        E-Mail :
                                        </span>
                                        service@kurier-link.com

                                    </p>

                                    
                    
                                </div>
                            </div>
                        </div>
                        <!--row-->


                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg test">
                                        {{trans('frontend/impressum.title4')}} : 
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--row-->


                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                        {{trans('frontend/impressum.title5')}}
                                    </h3>
                                    <p class="roboto-reg">
                                        {{trans('frontend/impressum.p5')}}
                                    </p>
                                    <br>
                                   
                                </div>
                            </div>
                        </div>
                        <!--row-->


                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                        {{trans('frontend/impressum.title6')}}
                                    </h3>
                                    <p class="roboto-reg contact-impress">
                                        {{trans('frontend/impressum.p6')}}
                                    </p>
                             
                                   
                                </div>
                            </div>
                        </div>
                        <!--row-->


                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                        {{trans('frontend/impressum.title7')}}
                                    </h3>
                                    <p class="roboto-reg">
                                        {{trans('frontend/impressum.p7')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--row-->

                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                        {{trans('frontend/impressum.title8')}}
                                    </h3>
                                    <p class="roboto-reg">
                                        {{trans('frontend/impressum.p8')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--row-->

                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                        {{trans('frontend/impressum.title9')}}
                                    </h3>
                                    <p class="roboto-reg">
                                        {{trans('frontend/impressum.p9')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--row-->

                        <!--row-->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="company-info">
                                    <h3 class="main-heading-impress roboto-reg">
                                        {{trans('frontend/impressum.title10')}}
                                        
                                    </h3>
                                    <p class="roboto-reg">
                                        {{trans('frontend/impressum.p10')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--row-->


                       
                    </div>
                 </div>
            </div>
        </div>
</section>
 


   
   

@include('frontend.layouts.partials.footer')