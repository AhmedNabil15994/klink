@include('frontend.layouts.partials.nav')

<link href="{{asset('css/number.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/main_order.css">
<link rel="stylesheet" href="css/login_style.css">
<link rel="stylesheet" href="css/plugins/date/jquery.datetimepicker.min.css">
<style type="text/css">
    .det_icons .glyphicon{
        left: .09rem;
        color:#FFF;
    }
    .row.select_test{
        width: 80%;
        display: block;
        margin: auto;
        margin-top: 10px;
    }
    .myNumberFont{
        font-size: 1.8rem;
    }   

    .notifyjs-corner{
        padding:1rem;
        font-size:1.5rem;
    }
    body{
        background-color: #FFF; 
    }
    #weight,#items{
        width: 107% !important;
    }

    .rating{
        float: right;
        font-size: 20px !important;
        height: 30px !important;
        position:relative;

       
    }

    @media (min-width:1200px){
       .rating{
           left:-105px;
       }

    }

    @media(max-width:991px){
        .rating{
            margin-bottom:20px;
        }
    }

    .rating .first-rate{
        background:#e3e3e3;
        position:absolute;
        background:transparent;
        width:3rem;
        height:3.5rem;
        z-index:55555;
    }

    .rating .information-box{
        width: 21.5rem;
        height: 4rem;
        position: absolute;
        top: -5.5rem;
        left: 0rem;
        background: rgba(58, 58, 58, .7);
        border-radius: .3rem;
        font-size: .8rem;
        padding: .5rem;
        color: #FFF;
    }

   

    .rating .information-box:after{
        content: "";
        width: 0;
        height: 0;
        border: 1rem solid transparent;
        border-top: 1rem solid rgba(58, 58, 58, .7);
        position: absolute;
        top: 4rem;
        left: .7rem;
    }
    .rating .information-box-note
    {
        position: absolute;
        top: -3rem;
        left: -6rem;
        font-size:.8rem;
        text-align:initial;
        margin-top:.5rem;
        display:none;
    }

    .rating .information-box span{
        font-size:1rem;
        color:#1da1f2;
        margin-right:.5rem;
    }

    .rating .all-pop{
        display:none;
    }

    /*slide content*/

    .slidecontainer .first-rate{
        background:#e3e3e3;
        position:absolute;
        background:transparent;
        width:3rem;
        height:3.5rem;
        z-index:55555;
    }

    .slidecontainer .information-box span{
        font-size:1rem;
        margin-right:.5rem;
        color:#1da1f2;
    }

    .slidecontainer .information-box{
        width: 21.5rem;
        height: 4rem;
        position: absolute;
        top: -10.5rem;
        left: 0;
        background: rgba(58, 58, 58, .7);
        border-radius: .3rem;
        font-size: .8rem;
        padding: .5rem;
        color: #FFF;
    }

    .slidecontainer .information-box:after{
        content: "";
        width: 0;
        height: 0;
        border: 1rem solid transparent;
        border-top: 1rem solid rgba(58, 58, 58, .7);
        position: absolute;
        top: 4rem;
        left: 1rem;
    }
    .slidecontainer .information-box-note
    {
        position: absolute;
        top: -10rem;
        left: 15.5rem;
        font-size:.8rem;
        text-align:initial;
        margin-top:.5rem;
        display:none;
    }

    .slidecontainer .information-box-note span{
        font-size:1rem;
        color:#1da1f2;
    }

    .slidecontainer .all-pop{
        display:none;
    }


    @media(max-width:1199px){
        .slidecontainer .information-box{
            width: 21.5rem;
            height: 4rem;
            position: absolute;
            top: -6.5rem;
            left: 2rem;
            background: rgba(58, 58, 58, .7);
            border-radius: .3rem;
            font-size: .8rem;
            padding: .5rem;
            color: #FFF;
        }
    }

    @media (min-width:768px) and (max-width:991px){
        .rating{
            left:-155px;
        }
    }

  


    .rating .rate-base-layer{
        height: 100% !important;
    }
    .rating .rate-base-layer span{
        opacity: 0.3 ;
    }
    .im{
        background: url('{{asset('img/box.png')}}');
        background-size: 32px 32px;
        background-repeat: no-repeat;
        width: 32px;
        height: 32px;
        display: inline-block;
    }
    span:first-of-type .im{
        background: url('{{asset('img/box-2.png')}}');
        background-size: 32px 32px;
        background-repeat: no-repeat;
        width: 32px;
        height: 32px;
        display: inline-block;
    }


    .car-loads h4{
        font-size: 1.6rem !important;
    }

    .slidecontainer{

        position:relative !important;

    }




    @media (min-width:992px) and (max-width:1200px){
        #weight, #items{
            width:100% !important;
        }

        .rating{
            float:none;

        }

        .content .step__one .custom-input-order.filled .icon{
            left:3.5rem;
        }

        .content .step__one .custom-input-order.filled input, 
        .content .step__one .custom-input-order.filled textarea{

        }

        .slidecontainer{
            width:100% !important;
            float:none !important;
        }
        .slidecontainer p{
            padding-left:1rem;
        }

        .rating{
            margin-bottom: 1.5rem;
            padding-left: .5rem;
        }
    }



     @media(max-width:767px){
        .rating .information-box{
            left:3rem;
            background:#000;
        }

        .slidecontainer .information-box{
            left:5rem;
            background:#000;

        }
    }


     @media (max-width:767px){
        #weight, #items{
            width:100% !important;
        }

        .rating{
            float:none;

        }

        

        .content .step__one .custom-input-order.filled input, 
        .content .step__one .custom-input-order.filled textarea{

        }

        .slidecontainer{
            width:100% !important;
            float:none !important;
        }
        .slidecontainer p{
        }

        .rating{
            margin-bottom: 1.5rem;
        }
    }


    @media (max-width:500px){
        .loc_det{
            margin-bottom:1rem;
        }
    }




</style>
<style>
    .slidecontainer {
        width: 100%;
        margin-right: 10%;
    }

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 10px;
        border-radius: 3px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
        padding: 0 !important;
        margin-bottom: 8px !important;
    }

    .slider:hover {
        opacity: 1;
    }

    #rangeSlid{
        width:80%;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #f6ab36;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
    }
   
    
</style>

<style type="text/css">

    .content{
        position: relative;
        margin-bottom: 5rem;
    }
    .test{
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #FFF;
        opacity: .7;
    }
    .test img{
        width: 8rem;
        height: 8rem;
        display: block;
        margin: auto;
        margin-top: 20%;
    }
    .loc{
        list-style-type: none;
        padding: 0;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .loc_list{
        padding: 0;
        margin-top: 1rem;
    }
    .glyphicon-map-marker:before,
    .glyphicon-send:before,
    .glyphicon-road:before,
    .icon_time.glyphicon-time:before,
    .glyphicon-euro:before{
        font-size: 2.8rem;
        color: #FFF;
    }

    .glyphicon-map-marker:before, .glyphicon-send:before{
        color:#a0a0a0;
    }
    .loc_det{
        position: absolute;
        margin-top: .5rem;
        margin-left: .5rem;
        display: inline-block;
        color: #888;
        font-weight: bold;
        font-size:1.4rem;
    }
    .det_icons{
        display: inline-block;
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        border:.1rem solid #FFF;
        margin-bottom: 1.5rem;
        padding: 1rem;
        -webkit-transition: all ease-in-out .25s;
        -moz-transition: all ease-in-out .25s;
        -o-transition: all ease-in-out .25s;
        transition: all ease-in-out .25s;
    }
    .det_icons:hover{
        background-color:#FFF;
        border:.1rem solid #DDD; 
    }
    .det_icons:hover .glyphicon:before{
        color: #98b71b;
    }
    .row .col-md-4:last-of-type .det_icons{
        padding-left: .8rem;
    }
    .det_det{
        position: absolute;
        margin-top: 1.5rem;
        margin-left: 1rem;
        font-weight: 600;
        color: #777;
        font-size: 1.5rem;
        color:#FFF;
    }
    .cargo{
        width: 22rem !important;
    }
    .accept.active{
        border-bottom: .1rem solid #f6ab36
    }
    .log_space .form-group .custom-span::before{
        top: -2.4rem;
        left: -2.7rem;
        font-size: 2rem;
    }
    .content .step__five .compelete-button:disabled{
        background-color: #838383;
    }
    @media ( min-width: 300px) and ( max-width: 580px ){
        .row .det_details{
            text-align: center;
        }
        .det_icons{
            display: block;
            margin: auto;
            margin-bottom: .5rem;
        }
        .det_det{
            position: unset;
            display: block;
            margin-top: 0;
            margin-bottom: 1rem;
        }
    }
    @media ( min-width: 580px ) and ( max-width: 767px ){
        .row .det_details{
            width: 50%;
            float: left;
        }
        .loc_list{
            width: 50%;
            float: left;
        }
    }
    @media ( min-width: 768px) and ( max-width: 991px ){
        .image-delv img{
            width: 30%;
            display: block;
            margin: auto;
        }
    }
    @media ( min-width: 991px ){
        #cal{
            margin-top: 8rem !important;
        }
    }
    @media ( min-width: 300px) and ( max-width: 561px ){
        .content .step__one h3.car.car1:after{
            top: 120%;
        }
    }

</style>
<style type="text/css">
    .StripeElement {
      background-color: white;
      height: 4rem;
      padding: 1rem 1.2rem;
      border-radius: .4rem;
      border: .1rem solid transparent;
      box-shadow: 0 .1rem .3rem 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
      box-shadow: 0 .1rem .3rem 0 #cfd7df;
    }

    .StripeElement--invalid {
      border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
      background-color: #fefde5 !important;
    }
    .step__three .icheckbox_square-orange{
        margin-top: .8rem !important;
    }
</style>

<div class="container">

    <div class="fullHeight">
        <!--step list-->
        <div class="steplist">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="step">
                        <li class="active" id="step_list_1">
                            <span class="glyphicon glyphicon-scale
                            "></span>
                        </li>
                        <li class="" id="step_list_2">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </li>
                        <li class="" id="step_list_3">
                            <span class="glyphicon glyphicon-edit"></span>
                        </li>
                        <li class="" id="step_list_4">
                            <span class="glyphicon glyphicon-heart-empty"></span>
                        </li>
                        <li class="" id="step_list_5">
                            <span class="glyphicon glyphicon-usd"></span>
                        </li>
                </div>
            </div>
        </div>

        <!--steplist-->
            
        <div class="content rale">

            <div class="step__one step_item first active" data-list="step_list_1">

                <div class="row">

                    <div class="col-md-3">
                        <div class="image-delv">
                            <img src="./images/delivery-img.png" alt="delivery">
                        </div>
                    </div><!--col-->

                    <div class="col-md-9">
                        <div class="calc_space"> 


                                <div class="row" style="padding: 1.5rem;">
                                    <h3 class="car car1">{{trans('frontend/order.cal')}}</h3>
                                    <ul class="loc">
                                        <li class="loc_list col-md-6 col-xs-12 col-sm-6"><span class="glyphicon glyphicon-map-marker"></span><span class="loc_det" id="from_value">{{$from}}</span></li>
                                        <li class="loc_list col-md-6 col-xs-12 col-sm-6"><span class="glyphicon glyphicon-send"></span><span class="loc_det">{{$to}}</span></li>
                                    </ul>
                                </div>

                                <!--information block-->
                                <div class="row">
                                    <div class="col-xs-12 hidden-xs">
                                        <div class="data_det" style="display: none;margin: 0;border-radius: 5px;margin-bottom: r15px;margin-top:1rem;">
                                            <div class="row" style="margin: 0;padding: 15px;padding-bottom: 0;background:#98b71b;">
                                                <div class="col-sm-4 det_details" style="padding: 0;">
                                                    <span class="det_icons">
                                                        <span class="glyphicon glyphicon-road"></span>
                                                    </span>
                                                    <span class="det_det myNumberFont">{{round($distance/1000)}} Km</span>
                                                </div>
                                                <div class="col-sm-4 det_details " style="padding: 0;">
                                                    <span class="det_icons">
                                                        <span class="glyphicon glyphicon-time icon_time"></span>
                                                    </span> 
                                                    <span class="det_det myNumberFont">{{$duration}}</span>
                                                    <input type="hidden" name="duration" id="duration" value="{{$duration2}}">
                                                </div>
                                                <div class="col-sm-4 det_details" style="padding: 0;">
                                                    <span class="det_icons">
                                                        <span class="glyphicon glyphicon-euro"></span>
                                                    </span> 
                                                    <span class="det_det cost myNumberFont"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--information block-->


                                <div class="row" style="margin: 0;">
                                    <hr style="margin-top: 0;">
                                </div>

                                <!--information block-->


                                <div class="row">
                                    <input type="hidden" id="distance" value="{{$distance}}">
                                    <input type="hidden" id="from" value="{{$from}}">
                                    <input type="hidden" id="to" value="{{$to}}">
                                    <input type="hidden" id="cost" value="">


                                <div class="col-md-8">
                                    
                                            <div class="input__group weight-container">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="width">{{trans('frontend/order.weight')}} (Kg) :</label>          
                                                    </div>
                                                    <div class="col-sm-9 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input type="text" min="0" id="weight" id="weight"  placeholder="{{trans('frontend/order.weight')}} (Kg)" required>
                                                        <div class="rating" data-rate-value=1>
                                                            <div class="first-rate">
                                                            </div>
                                                            <div class="all-pop">
                                                                <div class="information-box">
                                                                     <span class="fas fa-star"></span> Der Transportfahrer ist kein Umzugshilfe, nun kann er bis zu 5 Minuten mithelfen
                                                                </div>
                                                                <div class="information-box-note">
                                                                <span class="fas fa-star"></span> Der Transportfahrer ist kein Umzugshilfe, nun kann er bis zu 5 Minuten mithelfen
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--input group-->

                                            <div class="input__group items-container">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="NUM">{{trans('frontend/order.items')}} :</label>          
                                                    </div>
                                                    <div class="col-sm-9 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input min="0" type="text" id="items" name="items" placeholder="{{trans('frontend/order.items')}}" required>
                                                        <div class="slidecontainer" style="width: 50%; float: right;">
                                                            <input type="range" min="1" max="60" value="5" class="slider" id="myRange">
                                                            <p>{{trans('frontend/order.value')}} : <span id="demo" class="myNumberFont"></span> Mins</p>
                                                            <!--
                                                            <div class="first-rate">
                                                            </div>-->
                                                            <div class="all-pop">
                                                                <div class="information-box">
                                                                    <span class="fas fa-star"></span>Gebühren von 5 Euro werden für 10 Minuten berechnet. für Zeit plus Lade- und Entladezeit. Ohne Geschäftskunden.


                                                                </div>
                                                                <div class="information-box-note">
                                                                <span class="fas fa-star"></span>  die Gesamtwartezeit von Be- und Entladen wird wie angegeben eingehalten, sollten Sie mehr als die Zeiten, sollte Mehrzeit entstehen, wird gebühren von 5 Euro ja 10 Minuten angerechent. Ausgenommen Geschäftskunden.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--input group-->


                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="width2">{{trans('frontend/order.total')}} (cm):</label>          
                                                    </div>
                                                    <div class="col-sm-3 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input min="0" type="text" id="length" name="length" placeholder="{{trans('frontend/order.length')}}" required>
                                                    </div>
                                                    <div class="col-sm-3 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input min="0" type="text" id="width" name="width" placeholder="{{trans('frontend/order.width')}}" required>
                                                    </div>
                                                    <div class="col-sm-3 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input min="0" type="text" id="height" name="height" placeholder="{{trans('frontend/order.height')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->

                                            <div class="input__group">

                                                <!--information block-->
                                                <div class="row">
                                                    <div class="col-xs-12 visible-xs">
                                                        <div class="data_det" style="display: none;margin: 0;border-radius: 5px;margin-bottom: r15px;margin-top:1rem;margin-bottom:1rem;">
                                                            <div class="row" style="margin: 0;padding: 15px;padding-bottom: 0;background:#98b71b;">
                                                                <div class="col-sm-4 det_details" style="padding: 0;">
                                                                    <span class="det_icons">
                                                                        <span class="glyphicon glyphicon-road"></span>
                                                                    </span>
                                                                    <span class="det_det">{{round($distance/1000)}} Km</span>
                                                                </div>
                                                                <div class="col-sm-4 det_details" style="padding: 0;">
                                                                    <span class="det_icons">
                                                                        <span class="glyphicon glyphicon-time icon_time"></span>
                                                                    </span> 
                                                                    <span class="det_det">{{$duration}}</span>
                                                                    <input type="hidden" name="duration" id="duration" value="{{$duration2}}">
                                                                </div>
                                                                <div class="col-sm-4 det_details" style="padding: 0;">
                                                                    <span class="det_icons">
                                                                        <span class="glyphicon glyphicon-euro"></span>
                                                                    </span> 
                                                                    <span class="det_det cost"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--information block-->
                                            
                                            
                                            </div>
                                            

                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <label for="description">{{trans('frontend/order.desc')}} :</label>          
                                                    </div>
                                                    <div class="col-sm-9 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <textarea name="description" id="description" required placeholder="{{trans('frontend/order.desc')}}"></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                            
                                            
                                </div><!--form col-->

                                <div class="col-md-4 car-loads">

                                        
                                </div>

                                </div><!--internal row-->
                        </div><!--calc space-->


                    </div><!--col-->




                </div><!--row-->
                

            </div><!--step one-->

            <div class="step__two step_item" data-list="step_list_2 ">
                        <form action="">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="sender">
                                        <h3 class="type-heading">{{trans('frontend/order.sender')}}</h3>

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="country">{{trans('frontend/order.country')}}</label>          
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="country" placeholder="{{trans('frontend/order.country')}}" required disabled>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="postcode">{{trans('frontend/order.postal_code')}} / {{trans('frontend/order.town')}}</label>          
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="postcode" placeholder="12345" required disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" id="town" placeholder="{{trans('frontend/order.town')}}" required disabled>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="street">{{trans('frontend/order.street')}} / {{trans('frontend/order.home')}}</label>          
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" id="street" placeholder="{{trans('frontend/order.street')}}" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="home" placeholder="{{trans('frontend/order.home')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="firstname">{{trans('frontend/order.name')}}</label>          
                                                </div>
                                                <div class="col-sm-5 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="firstname" placeholder="{{trans('frontend/order.fname')}}" required>
                                                </div>
                                                <div class="col-sm-4 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="nickname" placeholder="{{trans('frontend/order.lname')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="selectpicker">{{trans('frontend/order.gender')}}</label>          
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="selectpicker" id="selectpicker">
                                                        <option value="{{trans('frontend/order.mr')}}">{{trans('frontend/order.mr')}}</option>
                                                        <option value="{{trans('frontend/order.mrs')}}">{{trans('frontend/order.mrs')}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="Company">{{trans('frontend/order.company')}} ?</label>          
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="selectpicker8" id="selectpicker8"
                                                    data-company-sender="true">
                                                        <option value="{{trans('frontend/order.company')}}">{{trans('frontend/order.company')}}</option>
                                                        <option value="{{trans('frontend/order.personal')}}" selected>{{trans('frontend/order.personal')}}</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div><!--input group-->

                                        

                                    

                                        <div class="input__group comp_input">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="company">{{trans('frontend/order.company')}}</label>          
                                                </div>
                                                <div class="col-sm-9 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="company" placeholder="{{trans('frontend/order.company')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->


                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="phone">{{trans('frontend/order.phone')}}</label>          
                                                </div>
                                                <div class="col-sm-9 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="phone" placeholder="{{trans('frontend/order.phone')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="email">{{trans('frontend/order.email')}}</label>          
                                                </div>
                                                <div class="col-sm-9 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="email" id="email" placeholder="{{trans('frontend/order.email')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                    </div><!--sender-->

                                </div><!--col-->


                                <div class="col-md-6">

                                    <div class="reciever">
                                        <h3 class="type-heading">{{trans('frontend/order.receiver')}}</h3>

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="country2">{{trans('frontend/order.country')}}</label>          
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" id="country2" placeholder="{{trans('frontend/order.country')}}" required disabled>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="postcode2">{{trans('frontend/order.postal_code')}} / {{trans('frontend/order.town')}}</label>          
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="postcode2" placeholder="12345" required disabled>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" id="town2" placeholder="{{trans('frontend/order.town')}}" required disabled>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="street2">{{trans('frontend/order.street')}} / {{trans('frontend/order.home')}}</label>          
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" id="street2" placeholder="{{trans('frontend/order.street')}}" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" id="home2" placeholder="{{trans('frontend/order.home')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="firstname2">{{trans('frontend/order.name')}}</label>          
                                                </div>
                                                <div class="col-sm-5 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="firstname2" placeholder="{{trans('frontend/order.fname')}}" required>
                                                </div>
                                                <div class="col-sm-4 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="nickname2" placeholder="{{trans('frontend/order.lname')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="selectpicker2">{{trans('frontend/order.gender')}}</label>          
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="selectpicker2" id="selectpicker2">
                                                        <option value="{{trans('frontend/order.mr')}}">{{trans('frontend/order.mr')}}</option>
                                                        <option value="{{trans('frontend/order.mrs')}}">{{trans('frontend/order.mrs')}}</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="Company">{{trans('frontend/order.company')}} ?</label>          
                                                </div>
                                                <div class="col-sm-3">
                                                    <select class="selectpicker9" id="selectpicker9"
                                                        data-company-reciever="true">
                                                            <option value="{{trans('frontend/order.company')}}">{{trans('frontend/order.company')}}</option>
                                                            <option value="{{trans('frontend/order.personal')}}" selected>{{trans('frontend/order.personal')}}</option>
                                                        </select>
                                                    </div>
                                            </div>
                                        </div><!--input group-->

                                        

                                    

                                        <div class="input__group comp_input2">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="company2">{{trans('frontend/order.company')}}</label>          
                                                </div>
                                                <div class="col-sm-9 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="company2" placeholder="{{trans('frontend/order.company')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->


                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="phone2">{{trans('frontend/order.phone')}}</label>          
                                                </div>
                                                <div class="col-sm-9 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="text" id="phone2" placeholder="{{trans('frontend/order.phone')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->
                                        <input type="hidden" name="from_lat" id="from_lat" value="{{$from_lat}}">
                                        <input type="hidden" name="from_lng" id="from_lng" value="{{$from_lng}}">
                                        <input type="hidden" name="to_lat" id="to_lat" value="{{$to_lat}}">
                                        <input type="hidden" name="to_lng" id="to_lng" value="{{$to_lng}}">
                                            

                                        <div class="input__group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="email2">{{trans('frontend/order.email')}}</label>          
                                                </div>
                                                <div class="col-sm-9 custom-input-order">
                                                    <span class="icon fa fa-check">
                                                    </span>
                                                    <input type="email" id="email2" placeholder="{{trans('frontend/order.email')}}" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                    </div><!--reciever-->
                                </div><!--row-->
                            </div><!--First row-->

                            <div class="row">
                                <div class="billing">
                                    <div class="col-xs-12">
                                        <h3 class="type-heading">{{trans('frontend/order.billing')}}</h3>
                                        <div class="col-sm-12">
                                            <select class="selectpicker3 cargo" data-other="false">
                                                <option val='sender'>{{trans('frontend/order.sender')}}</option>
                                                <option val='receiver'>{{trans('frontend/order.receiver')}}</option>
                                                <option val='other'>{{trans('frontend/order.other')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><!--billing-->
                            </div>

                            <div class="row">
                                    <div class="other-details">
                                        <p class="other-para" style="margin-left: 1rem;">{{trans('frontend/order.other_buyer')}}</p>

                                        <div class="col-md-6">
                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="country">{{trans('frontend/order.country')}}</label>          
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="country3" placeholder="{{trans('frontend/order.country')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->
                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="street3">{{trans('frontend/order.street')}} / {{trans('frontend/order.home')}}</label>          
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" id="street3" placeholder="{{trans('frontend/order.street')}}" required>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="text" id="home3" placeholder="{{trans('frontend/order.home')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->

                                            <div class="input__group">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="postcode3">{{trans('frontend/order.postal_code')}} / {{trans('frontend/order.town')}}</label>          
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="postcode3" placeholder="12345" required>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <input type="text" id="town3" placeholder="{{trans('frontend/order.town')}}" required>
                                                        </div>
                                                    </div>
                                            </div><!--input group-->

                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="firstname3">{{trans('frontend/order.name')}}</label>          
                                                    </div>
                                                    <div class="col-sm-4 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input type="text" id="firstname3" placeholder="{{trans('frontend/order.fname')}}" required>
                                                    </div>
                                                    <div class="col-sm-4 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input type="text" id="nickname3" placeholder="{{trans('frontend/order.lname')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->
                                            
                                        </div><!--col-->

                                        <div class="col-md-6">
                                            
                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="selectpicker4">{{trans('frontend/order.gender')}}</label>          
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="selectpicker4" id="selectpicker4">
                                                            <option value="{{trans('frontend/order.mr')}}">{{trans('frontend/order.mr')}}</option>
                                                            <option value="{{trans('frontend/order.mrs')}}">{{trans('frontend/order.mrs')}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="Company">{{trans('frontend/order.company')}}?</label>          
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <select class="selectpicker10" id="selectpicker10"
                                                        data-company-other="true">
                                                            <option value="{{trans('frontend/order.company')}}">{{trans('frontend/order.company')}}</option>
                                                            <option value="{{trans('frontend/order.personal')}}" selected>{{trans('frontend/order.personal')}}</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div><!--input group-->
                                            

                                            <div class="input__group comp_input3">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="company3">{{trans('frontend/order.company')}}</label>          
                                                    </div>
                                                    <div class="col-sm-8 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input type="text" id="company3" placeholder="{{trans('frontend/order.company')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->

                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="phone3">{{trans('frontend/order.phone')}}</label>          
                                                    </div>
                                                    <div class="col-sm-8 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input type="text" id="phone3" placeholder="{{trans('frontend/order.phone')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->

                                            <div class="input__group">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="email3">{{trans('frontend/order.email')}}</label>          
                                                    </div>
                                                    <div class="col-sm-8 custom-input-order">
                                                        <span class="icon fa fa-check">
                                                        </span>
                                                        <input type="email" id="email3" placeholder="{{trans('frontend/order.email')}}" required>
                                                    </div>
                                                </div>
                                            </div><!--input group-->


                                        </div><!--col-->
                                        
                                    </div><!--other details-->
                            </div>

                        </form>

                        <input type="button" class="submit_button next" value="{{trans('frontend/order.next')}}" disabled="true">
                        <input type="submit" class="submit_button prev" value="{{trans('frontend/order.prev')}}">

            </div><!--step two-->


            <div class="step__three step_item" data-list="step_list_3">

                <div class="row">


                    <div class="col-sm-6">

                        <div class="pick-up">
                            <h3 class="type-heading">{{trans('frontend/order.pick')}}</h3>
                            
                            <div class="input__group">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="one">{{trans('frontend/order.load_from')}}</label>          
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1' class="datetimepicker">
                                                <?php 
                                                    $now  = \Carbon::now()->format('Y-m-d H:i');
                                                    $two  = \Carbon::parse($now)->addHours(2)->format('Y-m-d H:00');
                                                    $eight = \Carbon::parse($now)->addHours(8)->format('Y-m-d H:00');

                                                    $task = \Carbon::parse($eight)->addSeconds($duration2)->format('Y-m-d H:i');
                                                    $first_deliver = \Carbon::parse($task)->addSeconds(900)->format('Y-m-d H:i');

                                                    $second_deliver = \Carbon::parse($first_deliver)->addSeconds(900)->format('Y-m-d H:i');

                                                ?>    
                                                <input  id="one" type='text' class="margin-cancel" placeholder="{{trans('frontend/order.load_from')}}
                                                " value="{{$two}}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!--input group-->

                            <div class="input__group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="two">{{trans('frontend/order.load_up')}}</label>          
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker2' class="datetimepicker">
                                                <input id="two" type='text' class="margin-cancel" placeholder="{{trans('frontend/order.load_up')}}
                                                "  value="{{$eight}}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!--input group-->
                        </div>
                    </div><!--col-->



                    <div class="col-sm-6">

                        <div class="deliver">
                            <h3 class="type-heading">{{trans('frontend/order.delivery')}}</h3>
                            
                            <div class="input__group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="three"> {{trans('frontend/order.from')}}</label>          
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker3' class="datetimepicker">
                                                <input id="three" type='text' class="margin-cancel" placeholder="{{trans('frontend/order.delivery_from')}}
                                                "  value="{{$first_deliver}}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!--input group-->

                            <div class="input__group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="four"> {{trans('frontend/order.until')}}
                                        </label>          
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker4' class="datetimepicker">
                                                <input id="four" type='text' class="margin-cancel" placeholder="{{trans('frontend/order.delivery_until')}}

                                                "  value="{{$second_deliver}}" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!--input group-->
                        </div>
                    </div><!--col-->



                </div><!--row-->
                <div class="row">
                    <div class="col-sm-2">
                        <label>{{trans('frontend/order.valid_until')}}</label>
                    </div>    
                    <?php 
                        $fifteen = ['id'=>'15','value'=>'15 '.trans('frontend/order.minutes')];
                        $thirty = ['id'=>'30','value'=>'30 '.trans('frontend/order.minutes')];
                        $one = ['id'=>'1','value'=>'1 '.trans('frontend/order.hours')];
                        $twelve = ['id'=>'12','value'=>'12 '.trans('frontend/order.hours')];
                        $twentyFour = ['id'=>'24','value'=>'24 '.trans('frontend/order.hours')];

                        $valids = [$fifteen,$thirty,$one,$twelve,$twentyFour];
                        $class='';
                    ?>

                    <div class="col-sm-10">
                        @foreach($valids as $valid)
                            <div class="row col-sm-2" style="margin-bottom: 1rem;">   
                                <div class="col-sm-9" style="display: inline-block;width: 6rem;padding: 0;">
                                    <label style="display: block;width: 100%;">{{$valid['value']}}</label>
                                </div>    
                                @if($valid['id'] == 30)
                                    <?php $class='checked'; ?>
                                @else    
                                    <?php $class=''; ?>
                                @endif
                                <input type="checkbox" name="type" class="icheckbox_flat" value="{{$valid['id']}}" {{$class}}>
                            </div>  
                        @endforeach
                    </div>
                </div>
                <input type="button" class="submit_button next" value="{{trans('frontend/order.next')}}" >
                <input type="submit" class="submit_button prev" value="{{trans('frontend/order.prev')}}">

            </div><!--step three-->




        <div class="step_item step__four" data-list="step_list_4">

        </div><!--step four-->  
        


        <div class="step_item step__five" data-list="step_list_5">


                <div class="row">
                        <h3 class="step_five_heading">{{trans('frontend/order.payment_cash')}}</h3>                    
                </div><!--row-->

                <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="billing-heading">{{trans('frontend/order.billing')}}</h4>
                                    <div class="billing-content">
                                        <div class="row" style="margin: 0;margin-top: 1.5rem;line-height: 1.5;">
                                        
                                        </div>
                                    </div>
                                </div>  
                                <!--col-->

                                <div class="col-md-6">
                                        <h4 class="custom-heading">{{trans('frontend/order.transfer_adv')}}</h4>
                                        <p class="transfer-para">
                                            {{trans('frontend/order.transfer_p')}}
                                        </p>
                                        <button class="compelete-button" disabled data-toggle="modal" data-target="#payments">
                                            {{trans('frontend/order.complete')}}
                                        </button>

                                </div><!--col-->
                            </div>
                        </div>
                        
                </div><!--row-->


                <div class="row">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-sm-1 col-xs-1" style="width: 7%;">
                                    <div class="confirm-order first">
                                        <div class="confirm-icon" style="border: 0;">
                                            <div class="log_space" style="box-shadow: unset;border:0;max-height: 2rem;background-color: transparent;min-height: 2rem;">
                                                <div class="form-group">
                                                    <label for="remember" class="custom-label">
                                                        <input type="checkbox" class="custom-check" name="order" value="remember" id="remember">
                                                        <span class="custom-span"></span>
                                                    </label>
                                                </div><!--form group-->
                                            </div>  
                                        </div>
                                    </div>                        
                                </div>
                                <div class="col-sm-11 col-xs-11">
                                    <div class="confirm-message">
                                        <span class="confirm-head">
                                            {{trans('frontend/order.confirm_order')}}
                                        </span>
                                        <p>{{trans('frontend/order.accept1')}} : <a href="{{URL::to('/terms')}}">{{trans('frontend/order.please_read')}}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="negative-margin">

                    <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-sm-1 col-xs-1" style="width: 7%;">
                                        <div class="confirm-order">
                                            <div class="confirm-icon" style="border: 0;">
                                                <div class="log_space" style="box-shadow: unset;border:0;max-height: 2rem;background-color: transparent;min-height: 2rem;">
                                                    <div class="form-group">
                                                        <label for="remember2" class="custom-label">
                                                            <input type="checkbox" class="custom-check" value="remember2" id="remember2" name="data">
                                                            <span class="custom-span"></span>
                                                        </label>
                                                    </div><!--form group-->
                                                </div>  
                                            </div>
                                        </div>                        
                                    </div>
                                    <div class="col-sm-11 col-xs-11">
                                        <div class="confirm-message">
                                            <span class="confirm-head">
                                                {{trans('frontend/order.confirm_order')}}
                                            </span>
                                            <p>{{trans('frontend/order.data_confirm')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>



                <!--control-->
                <input type="submit" class="submit_button prev" value="{{trans('frontend/order.prev')}}">
                <input type="submit" class="submit_button invoice pull-right hidden" value="{{trans('frontend/order.invoice')}}" disabled>
                <!--controls-->

        </div><!--step five-->

    </div>    






    <div id="payments" class="modal fade">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" >{{ trans('frontend/order.payment') }}</h4>
                    
                </div>    
                    <div class="modal-body">
                        <form action="/payment" method="post" id="payment-form">
                            {{csrf_field()}}
                        <div class="form-row">
                            <h4 for="card-element">
                            {{trans('frontend/order.credit_or')}}
                            </h4>
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <input type="hidden" name="order_id" id="order_id" class="order_id">
                            <input type="hidden" name="encrypted" id="encrypted" class="encrypted">
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert" class="alert-danger" style="background-color: transparent;margin-top:.7rem;"></div>
                        </div>
                        <div class="content text-center" style="position: unset;margin-bottom: 0;margin-top: 0;">
                            <input type="submit" name="finish" id="finish" class="submit_button" value="{{trans('frontend/order.submit')}} {{trans('frontend/order.payment')}}" style="padding: 1rem 2rem;">
                        </div>
                        </form>
                    </div>
                    
            </div>
        </div>
    </div>  


<div class="test">
    <img src="{{asset('images/ajax-loader.gif')}}">
</div>
</div><!--content-->










</div><!--container-->
@include('frontend.layouts.partials.footer')
<link rel="stylesheet" type="text/css" href="plugins/iCheck/all.css">
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/main_order.js"></script>
<script type="text/javascript" src="css/plugins/date/jquery.datetimepicker.full.min.js"></script>
{{-- <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=geometry"
  type="text/javascript"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('js/rater.js')}}" charset="utf-8"></script>

<script type="text/javascript">
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
</script>

<script type="text/javascript">

$(function(){


   $('.rating .first-rate').hover(function(){
       $('.rating').children('.all-pop').fadeIn();
   },function (){
    $('.rating').children('.all-pop').fadeOut();
   });

   $('.slidecontainer').hover(function(){
       $(this).children('.all-pop').fadeIn();
   },function (){
    $(this).children('.all-pop').fadeOut();
   });



   
    $(".rating").rate({
                selected_symbol_type: 'image',
                max_value: 4,
                step_size: 1,
                cursor: 'pointer',
                symbols: {
                    image: {
                        base: '<div class="im">&nbsp;</div>',
                        hover: '<div class="im">&nbsp;</div>',
                        selected: '<div class="im">&nbsp;</div>',
                    },
                }
    });

    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('%D days %H:%M:%S'));
      });
    });

    $(document).on('keyup','input',function(){
        saveValue(this);
    });

    $(document).on('click','.step__five .invoice',function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $('.step__four .encrypted').val();
        var route = "{{route('invoice',['id' => 'uid'])}}";
        route = route.replace('uid', id);

        //$('.form'+id).submit();
        window.location.href = route;
    });


    
    $(".step__three input[type=checkbox]").iCheck({
        checkboxClass: 'icheckbox_square-orange',
        radioClass: 'iradio_minimal-orange'
    }); 

    $(document).on('ifChecked','.step__three input[type=checkbox]', function(event){
      $('.step__three input[type=checkbox]').not(this).iCheck('uncheck');
      $('.step__three input[type=checkbox]').not(this).iCheck('update');
    });
    
    var x = '' ;
    var y = [] ;

    var a = '' ;
    var b = [] ;

    var w = '' ;
    var z = [] ;

    var u = '' ;
    var t = [] ;

    var time = '' ;
    var time2 = '' ;
    var time3 = '' ;

    var te = $('#one').val();
    var test = te.split(" ");
    var myDay = test[0];
    
    jQuery('#one').datetimepicker({
      format:'Y-m-d H:i',
      onSelectDate:function(dp,$input){
        x = $input.val();
        y = x.split(" ");
        var day = y[0]; 
        time2 = y[1];
        if(day == myDay){
            time = y[1];
            $('#one').datetimepicker('show');
        }else{
            time = '00:00';
            $('#one').datetimepicker('show');
        }
        $('#two').val(x);
      },
      onShow:function( ct ){

        this.setOptions({
            minDate:0,
            minTime:time,
            defaultTime:time,
        });
      },
      onChangeDateTime:function(dp,$input){
        x = $input.val();
        y = x.split(" ");
        time = y[1];
        $("#two,#three,#four").val('');
        $('#two').val(x);
        this.setOptions({
            minDate:y[1],
        });
      }
    });



    jQuery('#two').datetimepicker({
      format:'Y-m-d H:i',
      onSelectDate:function(dp,$input){
        a = $input.val();
        b = a.split(" ");
        var day = b[0]; 
        time2 = b[1];
        if(day == y[0]){
            time = y[1];
            $('#two').datetimepicker('show');
        }else{
            time = '00:00';
            $('#two').datetimepicker('show');
        }
        $('#three').val(a);
      },
      onShow:function( ct ){
        this.setOptions({
        minDate:x,
        minTime:time,
        defaultTime:time,
       });
        $('#three').val(a);
      },
      onChangeDateTime:function(dp,$input){
        a = $input.val();
        b = a.split(" ");
        $('#three').val(a);
        time2 = b[1];
      }
    });



    jQuery('#three').datetimepicker({
      format:'Y-m-d H:i',
      onSelectDate:function(dp,$input){
        r = $input.val();
        q = r.split(" ");
        var day = q[0]; 
        time3 = q[1];
        if(day == b[0]){
            time2 = b[1];
            $('#three').datetimepicker('show');
        }else{
            time2 = '00:00';
            $('#three').datetimepicker('show');
        }
      },
      onShow:function( ct ){
       this.setOptions({
        minDate:a,
        minTime:time2,
        defaultTime:time2,
        });
      },
      onChangeDateTime:function(dp,$input){
        w = $input.val();
        z = w.split(" ");
        time2 = z[1];
        $('#four').val(w);

      }
    });


    jQuery('#four').datetimepicker({
      format:'Y-m-d H:i',
      onSelectDate:function(dp,$input){
        t = $input.val();
        u = t.split(" ");
        day2 = u[0]; 
        timez2 = u[1];
        if(day2 == z[0]){
            time2 = z[1];
            $('#four').datetimepicker('show');
        }else{
            time2 = '00:00';
            $('#four').datetimepicker('show');
        }
      },
      onShow:function( ct ){
        this.setOptions({
        minDate:jQuery('#three').val()?jQuery('#three').val():false,
        minTime:time2,
        defaultTime:time2,
       })
      },

     

    });
   

    var from_lat = $('#from_lat').val();
    var from_lng = $('#from_lng').val();
    var to_lat = $('#to_lat').val();
    var to_lng = $('#to_lng').val();

    var geocoder  = new google.maps.Geocoder();

    var latlng = new google.maps.LatLng(from_lat, from_lng);
    var latlng2 = new google.maps.LatLng(to_lat, to_lng);

    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {

                for (var i=0; i<results[0].address_components.length; i++) {
                    for (var b=0;b<results[0].address_components[i].types.length;b++) {

                        if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                            $('#town').val(results[0].address_components[i].long_name);
                            $('#town3').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                            $('#postcode').val(results[0].address_components[i].long_name);
                            $('#postcode3').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('route') > -1) {
                            $('#street').val(results[0].address_components[i].long_name);
                            $('#street3').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('country') > -1) {
                            $('#country').val(results[0].address_components[i].long_name);
                            $('#country3').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('street_number') > -1) {
                            $('#home').val(results[0].address_components[i].long_name);
                            $('#home3').val(results[0].address_components[i].long_name);
                        }
                    }
                }
            }
        }
    }); 

    geocoder.geocode({'latLng': latlng2}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {

                for (var i=0; i<results[0].address_components.length; i++) {
                    for (var b=0;b<results[0].address_components[i].types.length;b++) {

                        if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                            $('#town2').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                            $('#postcode2').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('route') > -1) {
                            $('#street2').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('country') > -1) {
                            $('#country2').val(results[0].address_components[i].long_name);
                        }
                        if(results[0].address_components[i].types.indexOf('street_number') > -1) {
                            $('#home2').val(results[0].address_components[i].long_name);
                        }
                    }
                }
            }
        }
    });    


    var latitudes = '';
    var longitudes = '';
    var geocoders;
    var gmarkers = [];
    var company_array = [];
    var company_ids = [];
    function getLang(address , id ){
        geocoders = new google.maps.Geocoder();
        var address = address ;
        geocoders.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                latitudes = results[0].geometry.location.lat();
                longitudes = results[0].geometry.location.lng();
            
                company_array.push([id,latitudes,longitudes]);   
            }
        });
    }   

    @foreach($companies as $one)

    var addresses = "{{$one->address .' '.$one->home.' '.$one->postal_code .' '.$one->district .' '.$one->country}}";
    getLang(addresses,"{{$one->id}}");
    @endforeach  

    
    function codeAddress() {
        for (i = 0; i < company_array.length; i++) {
            coords = company_array[i];
            var pt = new google.maps.LatLng(parseFloat(coords[1]), parseFloat(coords[2]));
            marker = new google.maps.Marker({
              position: pt,
              id: company_array[i][0],
            });
            gmarkers.push(marker);
        }
        var addr = $("span#from_value").text();
        geocoder.geocode( { 'address': addr}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            closest = findClosestN(results[0].geometry.location,10);
            closest = closest.splice(0,3);
            calculateDistances(results[0].geometry.location, closest,10);
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

    function findClosestN(pt,numberOfResults) {
       var closest = [];
       for (var i=0; i<gmarkers.length;i++) {
         distance = google.maps.geometry.spherical.computeDistanceBetween(pt,gmarkers[i].getPosition());
         gmarkers[i].distance = distance;
         if(distance <= 50000){
            closest.push(gmarkers[i]);
         }
       }

       closest.sort(sortByDist);
       return closest;
    }

    function sortByDist(a,b) {
       return (a.distance- b.distance)
    }


    function calculateDistances(pt,closest,numberOfResults) {
      var service = new google.maps.DistanceMatrixService();
      var request =    {
          origins: [pt],
          destinations: [],
          travelMode: google.maps.TravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        };
      for (var i=0; i<closest.length; i++) request.destinations.push(closest[i].getPosition());
      service.getDistanceMatrix(request, function (response, status) {
        if (status != google.maps.DistanceMatrixStatus.OK) {
          alert('Error was: ' + status);
        } else {
          var origins = response.originAddresses;
          var destinations = response.destinationAddresses;
          
          var results = response.rows[0].elements;
          if(closest.length >= numberOfResults){
            for (var i = 0; i < numberOfResults; i++) {
                company_ids.push(closest[i].id);
            }
          }else{
            for (var i = 0; i < closest.length; i++) {
                company_ids.push(closest[i].id);
            }
          }
          
        }
      });
    

    }


    setTimeout(function(){
        codeAddress();
        //console.log(company_ids);

    },3000);    

    $('.step__three .submit_button.next').unbind('click');
    $('.step__three .submit_button.next').on('click',function(e){
        e.preventDefault();
        e.stopPropagation();
        var valid_until = '';
        var encrypted = $('#encrypted').val();
        $.each($(".step__three input[name='type']:checked"), function(){
            valid_until = $(this).attr('value');
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/order/storeDates",
            type: 'POST',
            data: {
                '_token': $('input[name="_token"]').val(),
                'load_from': $('#one').val(),
                'load_up': $('#two').val(),
                'delivery_from': $('#three').val(),
                'delivery_until': $('#four').val(),
                'valid_until' : valid_until,
                'order_id': $('.step__one .order_id').html(),
                'company_ids': company_ids,
            } ,
            success: function (data) {
                
                if (isNaN(data)){
                    $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                    });      
                }else{  
                    setTimeout(function(){
                        $('.test').toggle();
                    },1000);
                    $('.test').toggle();
                    $.notify("Success \n Order Dates Details Stored Successfully",{ position:"top right" ,className:"success"});
                    var route = "{{route('lastSteps', ['id'=>'order_id'])}}";
                    route = route.replace('order_id', encrypted);
                    window.location.href = route;
                    
                }

            },        
            error: function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
            }

         });
        
    });



    $('.custom-check#remember').on('click',function(){
        if($('.custom-check#remember').is(':checked')){
            $('.compelete-button').removeAttr('disabled');
        }else{
            $('.compelete-button').attr('disabled','true');

        }
    });


    function check_valid(element){
        if(!element.val().length == 0){
            element.parents('.custom-input-order').addClass('filled');
        }else if(element.val().length == 0){
            element.parents('.custom-input-order').removeClass('filled');
        }
    }

    $('input[type=text]').each(function(){
        check_valid($(this));
    });

    $('input , textarea').on('blur',function(){
        check_valid($(this));
    });
        
});
</script>

<script type="text/javascript">
    $(document).ready(function () {
    //for sender
     $('#first').bootstrapToggle();
     $('#second').bootstrapToggle();

    $('.selectpicker').selectpicker();
    //for reciver
    $('.selectpicker2').selectpicker();
    //for billing
    $('.selectpicker3').selectpicker();
    //for other details
    $('.selectpicker4').selectpicker();
    $('.selectpicker5').selectpicker();
    //company select box
    $('.selectpicker8').selectpicker();
    $('.selectpicker9').selectpicker();
    $('.selectpicker10').selectpicker();
    //date and time picker

   /* var date = new Date();
    date.setDate(date.getDate()-1);
    $('#datetimepicker1,#datetimepicker2,#datetimepicker3,#datetimepicker4').datetimepicker({
         sideBySide:false,
         showClose:true,
         showClear:true,
         format:'yyyy-mm-dd    h:i',    
         autoclose: true,
         setStartDate: new Date(),
         startDate: date,
         pickSeconds: false,
    });*/

    //accordion slide data
    $('.data-button').on('click',function() {
        $(this).children('.icon').toggleClass('active');
        $(this).next('.slide_data').slideToggle();
    });


    //multistep automation

    /* make sure all fields not empty
    var ahmed = $('.content').children('.step_item');
    console.log(ahmed.eq(0));*/

    // prev button on first child
   if(($('.step__one').is(':first-child'))) {
       $('.step__one .prev').attr('disabled','true');
   } else {
      $('.step__one .prev').removeAttr('disabled');      
   }

   //function for empty fields
   
   //step one 
   $('.step__one  input,.step__one  textarea').each(function (){
        $(this).on('keyup',function (){

            if($('.step__one').children().not('input[type=hidden]').val() == '' && $('.step__one textarea').val()==''){
                $('.step__one .next').attr('disabled','true');
            }else{
                $('.step__one .next').removeAttr('disabled');
            }

        });
   });

   //step two
   //console.log($('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]'));
   //without other and true company sender and true company reciver
    function validSecondStep(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }

    //without other and false company sender and false company reciver
    function validSecondStepDoubleFalse(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() ==''  || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }
    //without other and true company sender and false company reciver
    function validSecondStepSendertrue(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() ==''  || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }

    //without other and false company sender and true company reciver
    function validSecondStepReceivertrue(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(17).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() ==''  || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }
  


    //with other and true company sender and true company reciver and true other reciever
    function validSecondStepOther(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() =='' || elements.eq(27).val() =='' || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other and true for all company
    function validSecondStepOtherAllTrue(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() =='' || elements.eq(27).val() =='' || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other and true for all company
    function validSecondStepOtherAllTrueNotOther(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() =='' || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other and reciever ture and false for sender
    function validSecondStepOtherAllTrueNotSender(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(27).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other and reciever ture and false for sender
    function validSecondStepOtherAllTrueNotReciever(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(7).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(27).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other ture  reciever false and false for sender
    function validSecondStepOtherAllFalseNotOther(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(27).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

     //with other ture  reciever false and false for sender
     function validSecondStepOtherAllFalseNotReciever(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(17).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

     //with other ture  reciever false and false for sender
     function validSecondStepOtherAllFalseNotSender(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(7).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

     //with other ture  reciever false and false for sender
     function validSecondStepOtherAllFalse(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }




    //change data attribute when choose other
    $(".selectpicker3").on('change',function(){
            var pickerValue = $(this[this.selectedIndex]).val();
            if (pickerValue == "{{trans('frontend/order.other')}}"){
                $(this).attr('data-other','true');
                $('.step__two .next').attr('disabled','true');            
            } else {
                $(this).attr('data-other','false');      
            }
    });
    //change data attribute of sender company 
    $(".selectpicker8").on('change',function(){
        var pickerValue = $(this[this.selectedIndex]).val();

        if (pickerValue == "{{trans('frontend/order.personal')}}"){

            $(this).attr('data-company-sender','false');
            $(this).parents('.input__group').next().slideUp();

        } else if (pickerValue == "{{trans('frontend/order.company')}}") {

            if($('#company').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $(this).parents('.input__group').next().slideDown();
            } else {
                $(this).attr('data-company-sender','true');
                $(this).parents('.input__group').next().slideDown();
            }
        }
    });
    //change data attribute of reciever company 
    $(".selectpicker9").on('change',function(){
        var pickerValue = $(this[this.selectedIndex]).val();

        if (pickerValue == "{{trans('frontend/order.personal')}}"){

            $(this).attr('data-company-reciever','false');
            $(this).parents('.input__group').next().slideUp();

        } else if (pickerValue == "{{trans('frontend/order.company')}}") {

            if($('#company2').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $(this).parents('.input__group').next().slideDown();
            } else {
                $(this).attr('data-company-reciever','true');
                $(this).parents('.input__group').next().slideDown();
            }
        }
    });

     //change data attribute of other company 
    $(".selectpicker10").on('change',function(){
        var pickerValue = $(this[this.selectedIndex]).val();
        if (pickerValue == "{{trans('frontend/order.personal')}}"){
            $(this).attr('data-company-other','false');
            $(this).parents('.input__group').next().slideUp();

        } else if (pickerValue == "{{trans('frontend/order.company')}}") {

            if($('#company3').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $(this).parents('.input__group').next().slideDown();
            } else {
                $(this).attr('data-company-other','true');
                $(this).parents('.input__group').next().slideDown();
            }
        }
    });
    //
    var picker = $(".selectpicker3");
    var senderCompany = $(".selectpicker8");
    var recieverCompany = $(".selectpicker9");
    var otherCompany = $(".selectpicker10");

    var pickerValue1 = $('.selectpicker8 option:selected').val();
    var pickerValue2 = $('.selectpicker9 option:selected').val();
    var pickerValue3 = $('.selectpicker10 option:selected').val();


    if (pickerValue1 == "{{trans('frontend/order.personal')}}"){

            $('.selectpicker8').attr('data-company-sender','false');
            $('.selectpicker8').parents('.input__group').next().slideUp();

        } else if (pickerValue1 == "{{trans('frontend/order.company')}}") {

            if($('#company').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $('.selectpicker8').parents('.input__group').next().slideDown();
            } else {
                $('.selectpicker8').attr('data-company-sender','true');
                $('.selectpicker8').parents('.input__group').next().slideDown();
            }
        }

     if (pickerValue2 == "{{trans('frontend/order.personal')}}"){

            $('.selectpicker9').attr('data-company-reciever','false');
            $('.selectpicker9').parents('.input__group').next().slideUp();

        } else if (pickerValue2 == "{{trans('frontend/order.company')}}") {

            if($('#company2').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $('.selectpicker9').parents('.input__group').next().slideDown();
            } else {
                $('.selectpicker9').attr('data-company-reciever','true');
                $('.selectpicker9').parents('.input__group').next().slideDown();
            }
        }   
     if (pickerValue3 == "{{trans('frontend/order.personal')}}"){
            $('.selectpicker10').attr('data-company-other','false');
            $('.selectpicker10').parents('.input__group').next().slideUp();

        } else if (pickerValue3 == "{{trans('frontend/order.company')}}") {

            if($('#company3').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $('.selectpicker10').parents('.input__group').next().slideDown();
            } else {
                $('.selectpicker10').attr('data-company-other','true');
                $('.selectpicker10').parents('.input__group').next().slideDown();
            }
        }    

    //when fill any input make a vaildation 
    $('.step__two input[type="text"] ,.step__two input[type="email"]').on('keyup blur',function () {

        
        if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'true'){
            
            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOther()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        //no other and sender and reciver company is false
        } else if (picker.attr('data-other') == 'false' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepDoubleFalse()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        

        //no other and sender  true and reciver company is false
        } else if (picker.attr('data-other') == 'false' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepSendertrue()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        //no other and sender  false and reciver company is true
        } else if (picker.attr('data-other') == 'false' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepReceivertrue()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        //with other false and all companies true
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllTrueNotOther()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        //with other true and reciever true and false sender
        }  else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllTrueNotSender()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
         //with other true and reciever false and true sender
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllTrueNotReciever()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        // other true ( and sender , reciever false )
        }  else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalseNotOther()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        // for sender and other are false > reciever is true
        }  else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalseNotReciever()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        // sender true and all false       
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalseNotSender()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalse()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        
        }             
   

        else {


            if (validSecondStep()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }    
        }

    });


    //step three

   $('.step__three  input[type="text"]').each(function (){

        var telements = $('.step__three  input[type="text"]').not('input[type="hidden"]');

        $(this).on('blur',function (){

            if(telements.eq(0).val() == "" || telements.eq(1).val() == "" ||
            telements.eq(2).val() == "" || telements.eq(3).val() == "" 
                                                                         ){
                $('.step__three .next').attr('disabled','true');
            }else{
                $('.step__three .next').removeAttr('disabled');
            }

        });
        
    });


    $('.prev').on('click', function (){

            $('.step_item.active').fadeOut(500, function (){
                
                $('#'+$(this).attr('data-list')).removeClass('active').prev().removeClass('compelete').addClass('active');
                $(this).removeClass('active').prev('.step_item').addClass('active').fadeIn(500);
    
            });


    });

    //sliding in content with select picker
    $(".selectpicker3").change(function(){
        var pickerValue = $(this[this.selectedIndex]).val();
        if (pickerValue == "{{trans('frontend/order.other')}}"){
            $('.other-details').slideDown();
            
        } else {


            $('.other-details').slideUp(function (){

                if (validSecondStep()){
                    $('.step__two .next').removeAttr('disabled');
                } else if (validSecondStepDoubleFalse()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepSendertrue()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepReceivertrue()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOther()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrue()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrueNotOther()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrueNotSender()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrueNotReciever()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalseNotOther()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalseNotReciever()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalseNotSender()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalse()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } 
                
                else {
                    $('.step__two .next').attr('disabled','true');
                }


            });
           
                       
        }
    });


    



});

</script>



<script type="text/javascript">
        document.getElementById("weight").value = getSavedValue("weight"); // set the value to this input
        document.getElementById("items").value = getSavedValue("items"); // set the value to this input
        document.getElementById("length").value = getSavedValue("length"); // set the value to this input
        document.getElementById("width").value = getSavedValue("width"); // set the value to this input
        document.getElementById("height").value = getSavedValue("height"); // set the value to this input
        document.getElementById("description").innerHTML = getSavedValue("description");// set the value to this input
        document.getElementById("firstname").innerHTML = getSavedValue("firstname"); // set the value to this input
        document.getElementById("nickname").innerHTML = getSavedValue("nickname"); // set the value to this input
        document.getElementById("phone").innerHTML = getSavedValue("phone"); // set the value to this input
        document.getElementById("email").innerHTML = getSavedValue("email"); // set the value to this input
        document.getElementById("company").innerHTML = getSavedValue("company"); // set the value to this input

        document.getElementById("firstname2").innerHTML = getSavedValue("firstname2"); // set the value to this input
        document.getElementById("nickname2").innerHTML = getSavedValue("nickname2");   // set the value to this input
        document.getElementById("phone2").innerHTML = getSavedValue("phone2");   // set the value to this input
        document.getElementById("email2").innerHTML = getSavedValue("email2");   // set the value to this input
        document.getElementById("company2").innerHTML = getSavedValue("company2");   // set the value to this input

        document.getElementById("firstname3").innerHTML = getSavedValue("firstname3"); // set the value to this input
        document.getElementById("nickname3").innerHTML = getSavedValue("nickname3");   // set the value to this input
        document.getElementById("phone3").innerHTML = getSavedValue("phone3");   // set the value to this input
        document.getElementById("email3").innerHTML = getSavedValue("email3");   // set the value to this input
        document.getElementById("company3").innerHTML = getSavedValue("company3");  // set the value to this input
        
        document.getElementById("one").innerHTML = getSavedValue("one");   // set the value to this input
        document.getElementById("two").innerHTML = getSavedValue("two");   // set the value to this input
        document.getElementById("three").innerHTML = getSavedValue("three");   // set the value to this input
        document.getElementById("four").innerHTML = getSavedValue("four");   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (localStorage.getItem(v) === null) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>


