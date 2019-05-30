    @include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/contact-style.css">

 <!--contact us section -->
 <section class="contact-us">
<div class="black-overlay">
    
    <!--container-->
    <div class="container">

        <!--first row-->
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <!--information row-->
                <div class="row">
                    <!--contact information-->
                    <div class="contact-information">

                        <!--info block-->
                        <div class="col-sm-4">

                            <div class="info-block">

                                <div class="info-icon">
                                    <span class="icon fas fa-home"></span>
                                </div>

                                <div class="info-text">
                                    <?php 
                                        $address = $user->profile->address;
                                    ?>
                            
                                    <p class="text-para">{{trans('frontend/about.address')}}</p>
                                    <span class="text-sub">{!! $address->addressForm()!!}</span>
                                    {{-- <span class="text-sub">{{trans('frontend/about.adressLine2')}}</span> --}}
                                </div>


                            </div>

                        </div>
                        <!--info block-->

                        <!--info block-->
                        <div class="col-sm-4">

                            <div class="info-block">

                                <div class="info-icon">
                                    <span class="icon fas fa-envelope"></span>
                                </div>

                                <div class="info-text">
                                    <p class="text-para">{{trans('frontend/about.email')}}
                                        </p>
                                    <span class="text-sub">

                                        </span>
                                    <span class="text-sub">{{$user->email}}

                                    </span>
                                </div>


                            </div>

                        </div>
                        <!--info block-->

                        <!--info block-->
                        <div class="col-sm-4">

                            <div class="info-block">

                                <div class="info-icon">
                                    <span class="icon fas fa-phone"></span>
                                </div>

                                <div class="info-text">
                                    <p class="text-para">{{trans('frontend/about.phone')}}
                                        </p>
                                    <span class="text-sub">{{trans('frontend/about.phone_num')}} : 
                                        </span>
                                    <span class="text-sub">{{$user->profile->number->mobile_number}}
                                    </span>
                                </div>


                            </div>

                        </div>
                        <!--info block-->

                


                    </div>
                    <!--contact information-->
                </div>
                <!--information row-->



                <!--contact form-->
                <div class="row">
                    <div class="contact-form">
                        <h3>{{trans('frontend/about.contact')}}</h3>
                        <form action="">

                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" placeholder="{{trans('frontend/about.name')}}" required>
                                    </div>
                                </div>

                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" placeholder="{{trans('frontend/about.email2')}}" required>
                                    </div>
                                </div>


                            </div>
                            <!--row-->

                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea name="" id="" required placeholder="{{trans('frontend/about.message')}}"></textarea>
                                    </div>
                                </div>

                                

                            </div>
                            <!--row-->

                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <input type="submit" value="{{trans('frontend/about.send')}}">
                                    </div>
                                </div>

                                

                            </div>
                            <!--row-->






                        </form>
                    </div>
                </div><!--row-->
                <!--contact form-->



            </div>

        </div>
        <!--first row-->


    </div>
    <!--container-->

</div>


</section>
<!--contact us section -->


   
   

@include('frontend.layouts.partials.footer')