@extends('mobile.index')

@section('page-content')
 <!--new order-->
 <div class="new-order-page mont">

<!--frist row-->
<div class="order-card-container">


    <div class="new-order-card">

            <div class="card-main-content">

                <div class="card-head">
                    <div class="order-card-id">
                        150
                    </div>

                    <div class="valid-time">
                        <span class="head">valid time</span>
                        <span>45 : 15 : 12</span>
                    </div>
                </div>


                <div class="order-location">

                    <div class="order-heading">
                        Order Details
                    </div>

                    <div class="order-pickup">
                        <span>pickup details</span>

                        <div class="order-info-block">
                            <i class="icon-me fas fa-map-marker-alt"></i>
                            <span class="from">from : </span>
                            <span>DE 13589 Berlin - </span>
                            <span>23-10-2018 18:00</span>


                        </div>

                    </div>

                    <div class="order-deliver">
                        <span>delivery details</span>

                        <div class="order-info-block">
                            <i class="icon-me fas fa-map-marker-alt"></i>
                            <span class="to">to : </span>
                            <span>DE 10249 Berlin - </span>
                            <span>24-10-2018 01:01</span>


                        </div>

                    </div>

                    <div class="custom-block">

                       

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-clock"></i></span>
                            <span>5 min</span>
                        </div>

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-road"></i></span>
                            <span>100KM</span>
                        </div>

                        <div class="valid-time">
                            <span class="head">~idm</span>
                            <span>10</span>
                        </div>

                        <div class="valid-time">
                            <span class="head"><i class="fas fa-weight"></i></span>
                            <span>100Kg</span>
                        </div>

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-users"></i></span>
                            <i class="fas fa-male"></i>
                            <i class="fas fa-male"></i>
                            <i class="fas fa-male"></i>
                        </div>

                    </div>

                    <div class="custom-block">

                        

                        

                    </div>

                    <div class="custom-block">

                        <div class="valid-time car">
                            <span class="head">car type</span>
                            <div class="car-block">
                                <div class="car-img">
                                    <img src="{{asset('phone/images/car-type.jpg')}}" alt="car">
                                </div>
                                <div class="car-name">
                                    Rapid Lieferwagen
                                </div>
                            </div>
                        </div>

                        <a href="#" class="more-button">more <i class="fas fa-long-arrow-alt-right"></i></a>


                        

                    </div>



                </div>

                <div class="button-space">
                    <button class="new-offer-butt">
                        <input type="text" placeholder="&euro;">
                        send offer
                    </button>
                </div>

            </div>


            <div class="card-sec-content">

                    <div class="card-main-content">

                            <div class="custom-block">


                             <a href="#" class="back-button"><i class="fas fa-long-arrow-alt-left"></i> back </i></a>


                        

                            </div>

                            <div class="order-location">

                                <div class="order-heading">
                                    Other Details
                                </div>

                                <div class="order-pickup">
                                    <span>Description</span>

                                    <div class="order-info-block">
                                       
                                        <span>Here goods description</span>

                                    </div>

                                </div>

                                <div class="order-pickup">
                                    <span>items number</span>

                                    <div class="order-info-block">
                                       
                                        <span>15</span>

                                    </div>

                                </div>

                              

                                <div class="order-deliver">
                                    <span>items Dimensions            </span>
                                </div>

                                <div class="custom-block">

                                    <div class="valid-time">
                                        <span class="head">Length</span>
                                        <span>15</span>
                                    </div>

                                    <div class="wait-time">
                                        <span class="head">Width</span>
                                        <span>20</span>
                                    </div>

                                    <div class="wait-time">
                                        <span class="head">Height</span>
                                        <span>25</span>
                                    </div>

                                </div>


                                <div class="order-pickup" style="margin-bottom:5px;">
                                    <span>change car</span>

                                    <div class="order-info-block">
                                       
                                        <select class="selectpicker" id="selectpicker8900" >
                                             <option>Rapid Lieferwagen</option>
                                             <option>Koffer transport</option>
                                         </select>

                                        



                                    </div>

                                </div>

                                <div class="slide-driver">
                                    <div class="custom-block driver-info">

    
                                            <div class="wait-time">
                                                <span class="head">Ahmed nabil</span>
                                            </div>

                                            <div class="wait-time">
                                                <span class="head">01025478565</span>
                                            </div>

                                    </div>
                                </div>



                                <div class="order-deliver">
                                    <span>order map</span>
                                </div>

                             


                            </div>

                           

                    </div>


            </div>

            

    </div>

    <div class="new-order-card">

            <div class="card-main-content">

                <div class="card-head">
                    <div class="order-card-id">
                        150
                    </div>

                    <div class="valid-time">
                        <span class="head">valid time</span>
                        <span>45 : 15 : 12</span>
                    </div>
                </div>


                <div class="order-location">

                    <div class="order-heading">
                        Order Details
                    </div>

                    <div class="order-pickup">
                        <span>pickup details</span>

                        <div class="order-info-block">
                            <i class="icon-me fas fa-map-marker-alt"></i>
                            <span class="from">from : </span>
                            <span>DE 13589 Berlin - </span>
                            <span>23-10-2018 18:00</span>


                        </div>

                    </div>

                    <div class="order-deliver">
                        <span>delivery details</span>

                        <div class="order-info-block">
                            <i class="icon-me fas fa-map-marker-alt"></i>
                            <span class="to">to : </span>
                            <span>DE 10249 Berlin - </span>
                            <span>24-10-2018 01:01</span>


                        </div>

                    </div>

                    <div class="custom-block">

                       

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-clock"></i></span>
                            <span>5 min</span>
                        </div>

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-road"></i></span>
                            <span>100KM</span>
                        </div>

                        <div class="valid-time">
                            <span class="head">~idm</span>
                            <span>10</span>
                        </div>

                        <div class="valid-time">
                            <span class="head"><i class="fas fa-weight"></i></span>
                            <span>100Kg</span>
                        </div>

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-users"></i></span>
                            <i class="fas fa-male"></i>
                            <i class="fas fa-male"></i>
                            <i class="fas fa-male"></i>
                        </div>

                    </div>

                    <div class="custom-block">

                        

                        

                    </div>

                    <div class="custom-block">

                        <div class="valid-time car">
                            <span class="head">car type</span>
                            <div class="car-block">
                                <div class="car-img">
                                    <img src="{{asset('phone/images/car-type.jpg')}}" alt="car">
                                </div>
                                <div class="car-name">
                                    Rapid Lieferwagen
                                </div>
                            </div>
                        </div>

                        <a href="#" class="more-button">more <i class="fas fa-long-arrow-alt-right"></i></a>


                        

                    </div>



                </div>

                <div class="button-space">
                    <button class="new-offer-butt">
                        <input type="text" placeholder="&euro;">
                        send offer
                    </button>
                </div>

            </div>


            <div class="card-sec-content">

                    <div class="card-main-content">

                            <div class="custom-block">


                             <a href="#" class="back-button"><i class="fas fa-long-arrow-alt-left"></i> back </i></a>


                        

                            </div>

                            <div class="order-location">

                                <div class="order-heading">
                                    Other Details
                                </div>

                                <div class="order-pickup">
                                    <span>Description</span>

                                    <div class="order-info-block">
                                       
                                        <span>Here goods description</span>

                                    </div>

                                </div>

                                <div class="order-pickup">
                                    <span>items number</span>

                                    <div class="order-info-block">
                                       
                                        <span>15</span>

                                    </div>

                                </div>

                              

                                <div class="order-deliver">
                                    <span>items Dimensions            </span>
                                </div>

                                <div class="custom-block">

                                    <div class="valid-time">
                                        <span class="head">Length</span>
                                        <span>15</span>
                                    </div>

                                    <div class="wait-time">
                                        <span class="head">Width</span>
                                        <span>20</span>
                                    </div>

                                    <div class="wait-time">
                                        <span class="head">Height</span>
                                        <span>25</span>
                                    </div>

                                </div>


                                <div class="order-pickup" style="margin-bottom:5px;">
                                    <span>change car</span>

                                    <div class="order-info-block">
                                       
                                        <select class="selectpicker" id="selectpicker8900" >
                                             <option>Rapid Lieferwagen</option>
                                             <option>Koffer transport</option>
                                         </select>

                                        



                                    </div>

                                </div>

                                <div class="slide-driver">
                                    <div class="custom-block driver-info">

    
                                            <div class="wait-time">
                                                <span class="head">Ahmed nabil</span>
                                            </div>

                                            <div class="wait-time">
                                                <span class="head">01025478565</span>
                                            </div>

                                    </div>
                                </div>



                                <div class="order-deliver">
                                    <span>order map</span>
                                </div>

                             


                            </div>

                           

                    </div>


            </div>

            

    </div>


    <div class="new-order-card">

            <div class="card-main-content">

                <div class="card-head">
                    <div class="order-card-id">
                        150
                    </div>

                    <div class="valid-time">
                        <span class="head">valid time</span>
                        <span>45 : 15 : 12</span>
                    </div>
                </div>


                <div class="order-location">

                    <div class="order-heading">
                        Order Details
                    </div>

                    <div class="order-pickup">
                        <span>pickup details</span>

                        <div class="order-info-block">
                            <i class="icon-me fas fa-map-marker-alt"></i>
                            <span class="from">from : </span>
                            <span>DE 13589 Berlin - </span>
                            <span>23-10-2018 18:00</span>


                        </div>

                    </div>

                    <div class="order-deliver">
                        <span>delivery details</span>

                        <div class="order-info-block">
                            <i class="icon-me fas fa-map-marker-alt"></i>
                            <span class="to">to : </span>
                            <span>DE 10249 Berlin - </span>
                            <span>24-10-2018 01:01</span>


                        </div>

                    </div>

                    <div class="custom-block">

                       

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-clock"></i></span>
                            <span>5 min</span>
                        </div>

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-road"></i></span>
                            <span>100KM</span>
                        </div>

                        <div class="valid-time">
                            <span class="head">~idm</span>
                            <span>10</span>
                        </div>

                        <div class="valid-time">
                            <span class="head"><i class="fas fa-weight"></i></span>
                            <span>100Kg</span>
                        </div>

                        <div class="wait-time">
                            <span class="head"><i class="fas fa-users"></i></span>
                            <i class="fas fa-male"></i>
                            <i class="fas fa-male"></i>
                            <i class="fas fa-male"></i>
                        </div>

                    </div>

                    <div class="custom-block">

                        

                        

                    </div>

                    <div class="custom-block">

                        <div class="valid-time car">
                            <span class="head">car type</span>
                            <div class="car-block">
                                <div class="car-img">
                                    <img src="{{asset('phone/images/car-type.jpg')}}" alt="car">
                                </div>
                                <div class="car-name">
                                    Rapid Lieferwagen
                                </div>
                            </div>
                        </div>

                        <a href="#" class="more-button">more <i class="fas fa-long-arrow-alt-right"></i></a>


                        

                    </div>



                </div>

                <div class="button-space">
                    <button class="new-offer-butt">
                        <input type="text" placeholder="&euro;">
                        send offer
                    </button>
                </div>

            </div>


            <div class="card-sec-content">

                    <div class="card-main-content">

                            <div class="custom-block">


                             <a href="#" class="back-button"><i class="fas fa-long-arrow-alt-left"></i> back </i></a>


                        

                            </div>

                            <div class="order-location">

                                <div class="order-heading">
                                    Other Details
                                </div>

                                <div class="order-pickup">
                                    <span>Description</span>

                                    <div class="order-info-block">
                                       
                                        <span>Here goods description</span>

                                    </div>

                                </div>

                                <div class="order-pickup">
                                    <span>items number</span>

                                    <div class="order-info-block">
                                       
                                        <span>15</span>

                                    </div>

                                </div>

                              

                                <div class="order-deliver">
                                    <span>items Dimensions            </span>
                                </div>

                                <div class="custom-block">

                                    <div class="valid-time">
                                        <span class="head">Length</span>
                                        <span>15</span>
                                    </div>

                                    <div class="wait-time">
                                        <span class="head">Width</span>
                                        <span>20</span>
                                    </div>

                                    <div class="wait-time">
                                        <span class="head">Height</span>
                                        <span>25</span>
                                    </div>

                                </div>


                                <div class="order-pickup" style="margin-bottom:5px;">
                                    <span>change car</span>

                                    <div class="order-info-block">
                                       
                                        <select class="selectpicker" id="selectpicker8900" >
                                             <option>Rapid Lieferwagen</option>
                                             <option>Koffer transport</option>
                                         </select>

                                        



                                    </div>

                                </div>

                                <div class="slide-driver">
                                    <div class="custom-block driver-info">

    
                                            <div class="wait-time">
                                                <span class="head">Ahmed nabil</span>
                                            </div>

                                            <div class="wait-time">
                                                <span class="head">01025478565</span>
                                            </div>

                                    </div>
                                </div>



                                <div class="order-deliver">
                                    <span>order map</span>
                                </div>

                             


                            </div>

                           

                    </div>


            </div>

            

    </div>




   


</div>
<!--frist row-->




</div>
<!--new order-->
@endsection


@section('scripts')


@endsection
