@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
    @include('frontend.dashboard.layouts.sidebar2')
<!--profile view side-->
@endsection
 
@section('page-content')
<link rel="stylesheet" href="/css/css/all.min.css">
<link rel="stylesheet" href="/userdashboard/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css">
<style type="text/css">

    @media (max-width:400px){
         /* Full-screen display */
         .datetimepicker.datetimepicker-dropdown-bottom-left {
            left: 25px !important;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .container-fluid{
            padding-left:.5rem;
            padding-right:.5rem;
        }
    }

    


    .main-item-content.active {
        background: #F6AB36;
    }
    .ship-info{
        margin-top: 15px;
    }
    .ship-info img{
        width: 50px;
        max-height: 100px;
        margin-right: 10px;
        margin-left: 10px;
    }
    .main-item-content {
        transition: .3s linear;
    }

    .mybtn {
        display: inline-block;
        margin-bottom: 0;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .vehicle-name {
        font-size: 12px;
        width: 100%;
        text-align: center;
    }

    .ship-info-wrapper {
        margin-left: 15px;
        display: flex;
        flex-wrap: wrap;
    }

    .order-offer .results .order-item__content .order-operation .button .offer-number {
        background: #FFF !important;
        color: #000 !important;
    }

    .comment {
        color: #FFF;
        background-color: #F6AB36;
        cursor: pointer;
        -webkit-transition: all ease-in-out .25s;
        -moz-transition: all ease-in-out .25s;
        -o-transition: all ease-in-out .25s;
        transition: all ease-in-out .25s;
        padding: .5rem 1rem !important;
    }

    .countdown {
        width: 100%;
        text-align: center;
        display: block;
        font-size: 18px;
        font-weight: bold;
        color: rgba(0, 0, 0, 0.4);
        margin-bottom: 1rem;
    }

    body {
        overflow-x: hidden;
    }

    span.back {
        background: url('/img/box.png');
        background-size: 20px 20px;
        background-repeat: no-repeat;
        width: 20px;
        height: 20px;
        display: inline-block;
    }

    #OrdersOnMap {
        height: 300px;
        margin-bottom: 2rem;
    }

    .head-order-item {
        background: #FFF;
        padding: 1rem;
        padding-left: 1rem;
        border-right: .3rem solid #f6ab36;
        box-shadow: 0 0.1rem 0.5rem rgba(0, 0, 0, 0.1);
        border-radius: .3rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0;
        cursor: pointer;
    }

    @media (min-width:1680px){
        .order-operation .custom-date-field span{
            right:20% !important;
        } 
    }


    @media (max-width:1920px){
        .editable-container.editable-inline{
         width: 70%;
     }
    }

    @media (max-width:1440px){
        .editable-container.editable-inline{
            width: 65%;
        }
        .order-item .main-item-content {
            padding-bottom: 1rem !important;
        }
    }

    .editable-input{
        position:relative;
    } 
    .editable-input .icon-th{
        position: absolute;
        top: .6rem;
        left: .5rem;
    }
    .editable-input .input-append.date{
    }
    .editable-input input{
        padding:.5rem 1rem;
        border:.1rem solid #e3e3e3;
        border-radius:.3rem;
        padding-left:2.5rem;
        width:100%;
    }
    .editable-input input:focus{
       outline:none;
    }

    .editable-buttons button{
        padding:.85rem 1rem !important;
    }
    .order-offer .results .order-item__content .order-details .float-left.date{
        width: 11rem;
    }
    .select-car button{
        padding: .5rem 1rem;
        border: none;
        border-radius: .3rem;
        color: #505050;
        background: #dedede;
        font-size: 1.4rem;
    }
    .selectShipPicker{
        width: 100% !important;
        margin-top: 1rem;
    }
    .order-offer .results .order-item__content .load-info{
        border: 0;
        height: auto;
        padding-left: 0;
    }
    span.name,
    span.phone{
        font-size: 1rem;
        color: rgba(0, 0, 0, 0.4);
    }
    .load-items{
        text-align: left;
    }
 
    .order-offer .results .order-item__content{
        margin-bottom: 0;
    }  
    .custom-style55 .load-items p.load-para-sub-2{
        display: inline-block;
    }  
</style>
@include('frontend.dashboard.helpers.addNewVehicel')
@include('frontend.dashboard.layouts.modals.driver_modal')
<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')

        <!--order offer-->
        <div class="order-offer">

            <!--search row-->
            <div class="row">
                <!--order filter-->
                <div class="col-xs-12">
                    <div class="order-filter">
                        <!--internal row-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 col-xs-6">
                                        <button class="search-button">
                                            <span class="fas fa-filter"></span>
                                            {{trans('frontend/dashboard.search')}}
                                        </button>
                                    </div>
                                    

                                    <div class="col-md-8 col-sm-7 col-xs-6">
                                        <select class="selectpicker" id="selectpicker100" data-live-search="true">
                                            <option>From Berlin</option>
                                            <option>to Berlin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="search-box clearfix">
                                    <input type="text" placeholder="Search by id" required>
                                    <span class="fab fa-sistrix"></span>
                                </div>
                            </div>
                        </div>
                        <!--internal row-->
                    </div>
                </div>
                <!--order filter-->
            </div>
            <!--search row-->

            <!--main row-->
            <div class="row">

                <div class="col-xs-12">

                    <!--map row-->

                    <div class="col-xs-12">
                        <div id="OrdersOnMap">
                        </div>
                    </div>

                    <!--map row-->

                </div>


                <!--map and result row-->
                <div class="col-xs-12">

                    <!--match result row-->
                    <div class="col-xs-12">
                        <div class="match-result">
                            <span> {{$count}} </span> {{trans('frontend/dashboard.matching')}}
                        </div>
                    </div>
                    <!--match result row-->

                    <!--order row-->
                    <div class="row">

                        <div class="col-xs-12">

                            <!--here all results-->
                            <div class="results">

                                @foreach($data as $order)
                                <!--results row-->
                                <?php 
                                    $sender;
                                    $reciver;
                                    $dates = \DB::table('order_dates')->where('order_id','=',$order->order_id)->first();
                                    $send_receive = \DB::table('order_send_receives')->where('order_id','=',$order->order_id)->first();
                                    if(!empty($send_receive)){
                                        $receiver_id = $send_receive->receiver_id;
                                        $sender_id = $send_receive->sender_id;
                                        $sender = \DB::table('senders')->where('id','=',$sender_id)->first();
                                        $receiver = \DB::table('receivers')->where('id','=',$receiver_id)->first();
                                    }else{
                                        $sender ='';
                                        $receiver ='';
                                    }
                                    $ship = \DB::table('shippings')->where('id','=',$order->ship_id)->first();
                                    $discount = round($order->cost * $ship->discount/100 ,2);
                                    $after = $order->cost-$discount;
                                    $vat = round($after * 19/100 , 2);
                                    $total = round($after + $vat , 2);
                                    $load_from ='';
                                    if(empty($dates->load_from)){
                                        $load_from = '';
                                    }else{
                                        $load_from =  $dates->load_from;
                                    }

                                    $load_up ='';
                                    if(empty($dates->load_up)){
                                        $load_up = '';
                                    }else{
                                        $load_up =  $dates->load_up;
                                    }

                                    $delivery_from ='';
                                    if(empty($dates->delivery_from)){
                                        $delivery_from = '';
                                    }else{
                                        $delivery_from =  $dates->delivery_from;
                                    }

                                    $delivery_until ='';
                                    if(empty($dates->delivery_until)){
                                        $delivery_until = '';
                                    }else{
                                        $delivery_until =  $dates->delivery_until;
                                    }

                                    $valid_until ='';
                                    if(empty($dates->valid_until)){
                                        $valid_until = '';
                                    }else{
                                        $valid_until =  $dates->valid_until;
                                    }
                                ?>

                                <!--one result item-->
                                <!--order item-->
                                <div class="order-item two" id="order-item-{{$order->order_id}}">

                                    <div class="col-lg-9 col-md-12">
                                        <div class="id-place">
                                            <span class="fas fa-database"></span> id : {{$order->order_id}}
                                        </div>

                                        <div class="main-item-content">

                                            <!--first row-->
                                            <div class="row">
                                                <div class="col-xs-12">

                                                    <!--content-->
                                                    <div class="order-item__content clear-fix">
                                                        <!--internal row-->
                                                        <div class="row ">

                                                            <!--first column-->
                                                            <div class="col-md-4 col-sm-6">
                                                                <div class="row">
                                                                    <div class="row">
                                                                        <div class="col-xs-12">
                                                                            <!--source details-->
                                                                            <div class="order-details clearfix">
                                                                                <div class="float-left date">
                                                                                    <span class="template-loc load_from_editable" data-url="" data-id="{{$order->order_id}}"  data-type="datetime" data-name="start"  id="loadFrom{{$order->order_id}}">{{\Carbon::parse($order->load_from)->format('d-m-Y H:i')}}</span>
                                                                                </div>
                                                                                <div class="float-left icon">
                                                                                    <span class="fas fa-map-marker-alt"></span>
                                                                                </div>
                                                                                <div class="float-left address" id="from{{$order->order_id}}">
                                                                                    <?php 
                                                                                        $country ='';
                                                                                        $country2 ='';
                                                                                        $postal_code ='';
                                                                                        $postal_code2 ='';
                                                                                        $town ='';
                                                                                        $town2 ='';
                                                                                        if($sender == '') {
                                                                                            $country = '';
                                                                                            $postal_code = '';
                                                                                            $town = '';
                                                                                        }else if($sender->country == 'Germany' || $sender->country == 'Deutschland'){
                                                                                            $postal_code = $sender->postal_code;
                                                                                            $town = $sender->town;
                                                                                            $country = 'DE';
                                                                                        }else{
                                                                                            $country = $sender->country;
                                                                                            $postal_code = $sender->postal_code;
                                                                                            $town = $sender->town;
                                                                                        }
                                                                                        if($receiver == '') {
                                                                                            $country2 = '';
                                                                                            $postal_code2 = '';
                                                                                            $town2 = '';
                                                                                        }else if($receiver->country == 'Germany' || $receiver->country == 'Deutschland'){
                                                                                            $country2 = 'DE';
                                                                                            $postal_code2 = $receiver->postal_code;
                                                                                            $town2 = $receiver->town;
                                                                                        }else{
                                                                                            $country2 = $receiver->country;
                                                                                            $postal_code2 = $receiver->postal_code;
                                                                                            $town2 = $receiver->town;
                                                                                        }
                                                                                    ?> {{$country}} {{$postal_code}} {{$town}}
                                                                                </div>
                                                                            </div>
                                                                            <!--source details-->
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-xs-12">
                                                                            <!--destination details-->
                                                                            <div class="order-details clearfix">
                                                                                <div class="float-left date">
                                                                                    <span class="template-loc load_from_editable" data-id="{{$order->order_id}}" data-name="end"  data-type="datetime" data-url="">{{\Carbon::parse($delivery_from)->format('d-m-Y H:i')}}</span>
                                                                                </div>
                                                                                <div class="float-left icon">
                                                                                    <span class="fas fa-map-marker-alt"></span>
                                                                                </div>
                                                                                <div class="float-left address" id="to{{$order->order_id}}">
                                                                                    {{$country2}} {{$postal_code2}} {{$town2}}
                                                                                </div>
                                                                            </div>
                                                                            <!--destination details-->

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <div class="distance-info" style="margin-top:5px;">
                                                                            <ul class="distance-list clearfix" style="margin-bottom:0px;">
                                                                                <li><i class="icon-important fas fa-compass"></i>{{round($order->distance)}} km</li>
                                                                                <li><i class="icon-important fas fa-weight-hanging"></i>{{round($order->weight)}} kg</li>
                                                                                <li style="border-right: 0;">~{{round($order->length)}} idm</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="com-xs-12">
                                                                        <div class="ship-info">
                                                                            <?php 

                                                                            $ship = \App\Models\Backend\Shipping::find($order->ship_id);

                                                                            ?>

                                                                            @if($ship)
                                                                                <img src="/images/shippings/{{$ship->img}}" alt="{{$ship->title}}">
                                                                                {{$ship->title}}
                                                                            @endif
                                                                        <div class="col-xs-12">
                                                                            <div class="select-car">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12">
                                                                                        
                                                                                        <select class="selectpicker selectShipPicker" data-orderid="{{$order->order_id}}" id="selectpicker{{$order->order_id}}">
                                                                                            
                                                                                            <?php 
                                                                                                $driver_name = '';
                                                                                                $driver_phone = '';
                                                                                                $display = 'none';
                                                                                            ?>
                                                                                            @foreach($vehicles as $vehicle)
                                                                                            <?php 
                                                                                                $selected = '';
                                                                                                $company_order_vec= \App\Models\Frontend\CompanyOrderVehicles::where('user_id',Auth::user()->id)->where('order_id',$order->order_id)->first();
                                                                                                $newShip = '';
                                                                                                if(!empty($company_order_vec->vehicle_id)){
                                                                                                    $newShip = $company_order_vec->vehicle_id;
                                                                                                }else{
                                                                                                    $newShip = $order->ship_id;
                                                                                                }
                                                                                                $disabled = 'disabled';
                                                                                            ?>
                                                                                            
                                                                                            @if($vehicle->vehichle_id == $newShip)
                                                                                            
                                                                                            <?php 
                                                                                                $driver_name = $vehicle->first_name.' '.$vehicle->last_name;
                                                                                                $driver_phone = $vehicle->phone;
                                                                                                $selected = 'selected';
                                                                                                $display = 'block';
                                                                                            ?>
                                                                                            
                                                                                            @endif

                                                                                            @if($vehicle->weight >= $order->weight)
                                                                                            <?php $disabled = ''; ?>
                                                                                            <option value="{{$vehicle->vehichle_id}}" data-name="{{$vehicle->first_name.' '.$vehicle->last_name}}" data-phone="{{$vehicle->phone}}" {{$selected}}>{{$vehicle->number}}</option>
                                                                                            @endif

                                                                                            @endforeach
                                                                                            <option class="new_vec"><i class="fas fa-plus-square"></i> {{trans('frontend/dashboard.add_vec')}}</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xs-12" style="display:{{$display}};padding: 0;" id="DriverInfo{{$order->order_id}}">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12">
                                                                                        <div class="load-info custom-style55">
                                                                                            <div class="load-items">
                                                                            
                                                                                                @if(!empty($driver_name))
                                                                                                <p class="load-para-sub-2 pull-left">

                                                                                                    <i class="fas fa-user-tie"></i>
                                                                                                    <span class="name"> 
                                                                                                        {{$driver_name}}
                                                                                                    </span>
                                                                                                </p>

                                                                                                <p class="load-para-sub-2 pull-right">
                                                                                                    <i class="fas fa-phone"></i>
                                                                                                    <span class="phone">
                                                                                                        {{$driver_phone}} 
                                                                                                    </span>
                                                                                                </p>
                                                                                                @else
                                                                                                <p class="load-para-sub-2 pull-left">

                                                                                                    <i class="fas fa-user-tie"></i>
                                                                                                    <span class="name"> 
                                                                                                    
                                                                                                    </span>
                                                                                                </p>

                                                                                                <p class="load-para-sub-2 pull-right">
                                                                                                    <i class="fas fa-phone"></i>
                                                                                                    <span class="phone">
                                                                                                    
                                                                                                    </span>
                                                                                                </p>

                                                                                                @endif

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>    

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-xs-12">

                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <!--first column-->




                                                            <!--second column-->
                                                            <div class=" col-md-4 col-sm-6">

                                                                <!--important informaion-->
                                                                <div class="order-important-info">

                                                                    <p class="important-item">
                                                                        <i class="icon-important fas fa-people-carry"></i>
                                                                        <span>
                                                                        <span>{{trans('frontend/makeoffer.persons')}}</span>                                                                        
                                                                        @for($i=0 ; $i<$order->person ; $i++)
                                                                            <span class="back"></span> 
                                                                            @endfor
                                                                            </span>
                                                                    </p>

                                                                    <p class="important-item">
                                                                        <i class="icon-important fas fa-box-open"></i>
                                                                        <span>
                                                                            {{trans('frontend/makeoffer.items')}}
                                                                        </span> {{$order->items}}

                                                                        <span class="additional">
                                                                        </span>
                                                                    </p>

                                                                     <p class="important-item">
                                                                        <i class="icon-important"></i>
                                                                       

                                                                        <span class="additional">
                                                                            L : {{$order->length}} W : {{$order->width}} H :  {{$order->height}}
                                                                        </span>
                                                                    </p>


                                                                    <p class="important-item">
                                                                        <i class="icon-important fas fa-clock"></i>
                                                                        <span>
                                                                        <span>{{trans('frontend/makeoffer.loadTime')}}</span>
                                                                        <span class="load_up_editable" data-id="{{$order->order_id}}"  data-type="text" data-name="load_up"  id="loadFrom{{$order->order_id}}">{{$order->time}}</span> {{trans('frontend/makeoffer.minutes')}}
                                                                        </span>
                                                                    </p>


                                                                    <p class="important-item">
                                                                        <i class="icon-important fas fa-prescription-bottle"></i>

                                                                        {{trans('frontend/order.desc')}} : 
                                                                        <span>{{$order->description}}</span>
                                                                    </p>
                                                                    

                                                                </div>
                                                                <!--important informaion-->

                                                            </div>
                                                            <!--second column-->

                                                            <!--third column-->
                                                            <div class=" col-md-4 col-sm-6">
                                                                <div class="order-operation">
                                                                    <!--complete order-->
                                                                    <ul class="step-complete clearfix">
                                                                        <li><span class="fas fa-check"></span></li>
                                                                        <li><span class="fas fa-check"></span></li>
                                                                        <li><span class="fas fa-check"></span></li>
                                                                        <li><span class="fas fa-check"></span></li>
                                                                    </ul>
                                                                    <!--complete order-->

                                                                    <button data-id="{{$order->order_id}}" class="new-button-offer button button--blue new-make-offertop-square new-make-offer ">
                                                                        {{trans('frontend/makeoffer.ordercomplete')}}
                                                                        <span class="fas fa-long-arrow-alt-right"></span>  
                                                                    </button>
                                                                    <div>
                                                                        <input type="text" id="offer-number{{$order->order_id}}" data-id="{{$order->order_id}}" class="offer-number form-control touch-spin" value="{{$total}}" >
                                                                    </div>
                                                                    <button data-id="{{$order->order_id}}" class="submitoffer button button--blue-spin ladda-button" data-style="expand-right" {{$disabled}}>{{trans('frontend/dashboard.bind_offer')}}
                                                                    </button>
                                                                    <span class="countdown" data-countdown='{{\Carbon::parse($valid_until)->format(' Y-m-d - H:i:s ')}}'></span>


                                                                    <input type="hidden" name="source" class="source" value="{{$order->source}}">
                                                                    <input type="hidden" name="destination" class="destination" value="{{$order->destination}}">
                                                                    <input type="hidden" name="id" class="id" value="{{$order->order_id}}">
                                                                </div>
                                                            </div>
                                                            <!--third column-->



                                                        </div>
                                                        <!--internal row-->
                                                    </div>
                                                    <!--content-->



                                                </div>
                                            </div>
                                            <!--first row-->

                                        </div>

                                        <!--slide down -->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="order-item__slide">
                                                    <!--tab row-->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <ul class="tab-list clearfix">
                                                                <li data-content="details" id="li_details">{{trans('frontend/dashboard.details')}}</li>
                                                                <li class="active" data-content="enter-offer">{{trans('frontend/dashboard.enter_offer')}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--tab row-->

                                                    <!--content row-->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="tab-content">


                                                                <div class="tab-item enter-offer active" id="enter-offer">

                                                                    <!--second row-->
                                                                    <div class="row">
                                                                        <div class="pick-deliver clearfix">
                                                                            <div class="col-md-6">
                                                                                <div class="row">
                                                                                    <div class="pick">
                                                                                        <div class="col-md-3">
                                                                                            <p class="pick-para">
                                                                                                {{trans('frontend/dashboard.pickup')}}
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="col-md-9">

                                                                                            <input class="one" type='text' class="margin-cancel" placeholder="{{trans('frontend/order.load_from')}}">

                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="deliver">
                                                                                        <div class="col-md-3">
                                                                                            <p class="deliver-para">
                                                                                                {{trans('frontend/dashboard.delivery')}}
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="col-md-9">
                                                                                            <input class="one" type='text' class="margin-cancel" placeholder="{{trans('frontend/order.load_from')}}">
                                                                                        </div>
                                                                                       
                                                                                    </div>
                                                                                </div>
                                                                             
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="textarea">
                                                                                    <textarea required placeholder="{{trans('frontend/dashboard.your_comment')}}" id="comment-area"></textarea>
                                                                                </div>

                                                                                <div class="warn-message  custom-padding">
                                                                                    <span class="btn btn-xs comment pull-right"><i class="fas fa-comment"></i> {{trans('frontend/order.comment')}}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--second row-->

                                                                    <!--third row-->
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="offer-valid">
                                                                                <div class="valid">
                                                                                    <div class="col-md-6">
                                                                                        <p class="valid-para">{{trans('frontend/dashboard.off_valtill')}}</p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <span class="countdown" data-countdown='{{\Carbon::parse($valid_until)->format(' Y-m-d - H:i:s ')}}'></span>
                                                                                    </div>


                                                                                </div>

                                                                                <div class="valid" style="margin-bottom: 1rem">
                                                                                    <div class="col-md-6">
                                                                                        <p class="valid-para">{{trans('frontend/order.person')}}</p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        @for($i=0 ; $i<$order->person ; $i++)
                                                                                            <span class="pull-right back"></span> 
                                                                                        @endfor
                                                                                    </div>


                                                                                </div>

                                                                                <div class="valid" style="margin-bottom: 1rem">
                                                                                    <div class="col-md-6">
                                                                                        <p class="valid-para">{{trans('frontend/order.time')}}</p>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <span class="pull-right">{{$order->time}} Mins</span>
                                                                                    </div>

                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-6">
                                                                            <div class="select-car">
                                                                                <div class="row">
                                                                                    <div class="col-xs-6">
                                                                                        <select class="selectpicker selectShipPicker" data-orderid="{{$order->order_id}}" id="selectpicker{{$order->order_id}}">
                                                                                                <option value="0">{{trans('frontend/order.select_item')}}</option>
                                                                                                @foreach($vehicles as $vehicle)
                                                                                                <option value="{{$vehicle->vehichle_id}}">{{$vehicle->ship_name}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                    </div>
                                                                                    

                                                                                </div>

                                                                                <div class="warn-message">
                                                                                    <span class="fas fa-exclamation-circle"></span>
                                                                                    <span "text-warn">{{trans('frontend/dashboard.imp_p')}}</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--third row-->

                                                                </div>

                                                                <!--details-->
                                                                <div class="tab-item details" id="details">
                                                                    <!--row-->
                                                                    <div class="row">
                                                                        <!--first col-->
                                                                        <div class="col-md-4">
                                                                            <!--row-->
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <div class="info-block">
                                                                                        <div class="info-template">
                                                                                            <p class="template-para">{{trans('frontend/dashboard.pickup')}}</p>
                                                                                            <div class="location-info">
                                                                                                <span class="template-loc" id="froms{{$order->order_id}}">{{$country}} | {{$postal_code}} {{$town}}</span>
                                                                                                <span class="template-loc">{{Carbon::parse($load_from)->format('M d')}} <br>{{Carbon::parse($load_from)->format('H:i')}} - {{Carbon::parse($load_up)->format('H:i')}}</span>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--row-->

                                                                            <!--row-->
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <div class="info-block cancel-border">
                                                                                        <div class="info-template">
                                                                                            <p class="template-para">{{trans('frontend/dashboard.delivery')}}</p>
                                                                                            <div class="location-info">
                                                                                                <span class="template-loc" id="tos{{$order->order_id}}">{{$country2}} | {{$postal_code2}} {{$town2}}</span>
                                                                                                <span class="template-loc">{{Carbon::parse($delivery_from)->format('M d')}}<br>{{Carbon::parse($delivery_from)->format('H:i')}} - {{Carbon::parse($delivery_until)->format('H:i')}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--row-->

                                                                        </div>
                                                                        <!--first col-->

                                                                        <!--second col-->
                                                                        <div class="col-md-4">
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <div class="load-info">
                                                                                        <div class="load-items">
                                                                                            <p class="load-para">{{trans('frontend/dashboard.load')}}</p>
                                                                                            <p class="load-para-sub">{{$order->items}} {{trans('frontend/dashboard.items')}}</p>
                                                                                            <p class="load-para-sub-2">{{trans('frontend/dashboard.per_item')}}
                                                                                                : {{round(($order->weight/$order->items),2)}}
                                                                                                kg
                                                                                            </p>

                                                                                            <p class="load-para">
                                                                                                {{trans('frontend/order.desc')}}
                                                                                            </p>
                                                                                            <p class="load-para-sub-2">
                                                                                                {{$order->description}}
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="total">
                                                                                            <p class="total-head">{{trans('frontend/dashboard.total')}}</p>
                                                                                            <p class="total-value">~{{round($order->length)}}Idm
                                                                                                | {{round($order->weight)}}
                                                                                                kg
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--second col-->

                                                                    </div>
                                                                    <!--row-->
                                                                </div>
                                                                <!--details-->


                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--content row-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--slide down -->
                                    </div>

                                    <div class="col-lg-3 col-md-12">
                                        <!--new order content-->
                                        <div class="new-order-content" style="padding-top:3rem;width:100%;">
                                            <ul class="top-squares-menue">
                                                <li class="top-square new-make-offer">
                                                   {{trans('frontend/makeoffer.ordercomplete')}}
                                                </li>
                                            </ul>
                                            
                                            <div class="custom-class enter-offer">

                                                <!--second row-->
                                                    <div class="row">
                                                        <div class="col-xs-12">

                                                            <div class="pick-deliver">

                                                                <div class="slide-content first-slide active">
                                                                    
                                                                    <div class="col-xs-12" style="overflow:hidden;">
                                                                        <div class="pick-map" style="height:200px;width:21.5rem;">
                                                                            <div style="height:200px;width:100%;" id="googlemaps{{$order->order_id}}" class="map"></div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                <!--second row-->

                                            </div>

                                        </div>
                                        <!--new order content-->
                                    </div>


                                </div>
                                <!--order item-->
                                <!--one result item-->



                                @endforeach 
                            </div>
                            <!--here all results-->

                            <!--results row-->
                        </div>

                    </div>
                    <!--order row-->


                </div>





            </div>


            <!--main row-->


            @if(!empty($data))
            <div class="box-footer">
                <div class="pagination-wrapper">{!! $data->render() !!} </div>
            </div>
            @endif
        </div>
        <!--order offer-->


    </div>
</div>
<!--pageContent-->
@endsection
@section('scripts')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('datetime/bootstrap-datetimepicker.min.js')}}"></script>


{{--
<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}
<style type="text/css">
    .button--blue-spin{
        background: #4184b5;
        color: #FFF;
    }
    .touch-spin.form-control{
        border-right: 0;
    }
    .bootstrap-touchspin-up,
    .bootstrap-touchspin-down{
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .button.button--blue-spin{
        border-top-left-radius: 0 !important;
        border-top-right-radius: 0 !important;
    }
    .bootstrap-touchspin-postfix{
        background: transparent;
        border-left: 0;
        padding-left: 0;
    }
    .button--blue-spin:hover,
    .button--blue-spin:focus
    {
        background: #4184b5;
        color: #FFF;
    }
    .map {
        position: unset !important;
    }
    
    .pagination-wrapper {
        font-size: 1.4rem;
    }
    .top-squares-menue {
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        /* justify-content: flex-start; */
        margin-bottom: 0;
        position: absolute;
        top: 0rem;
        width: 100%;
        left: 0;
        height: 3rem;
    }
    .top-squares-menue .top-square{
        padding: 5px;
        flex-grow: 1;
        text-align: center;
        background: #ededed;
    }
    
    .button-input-wrapper{
        position: relative;
    }
    .button-input-wrapper i{
        position: absolute;
        top: 51%;
        right: 6px;
        font-size: 20px;
        /* width: 100px; */
        /* height: 100px; */
        color: rgba(0, 0, 0, 0.4);
        transform: translateY(-50%);
    }
</style>
<script src="/userdashboard/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

<script type="text/javascript">
    function init(){
        var input = document.getElementById('address2');
        var autocomplete = new google.maps.places.Autocomplete(input);
        
        autocomplete.addListener('place_changed', function() {
            place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            var latlng = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            }
              
            geocoder = new google.maps.Geocoder();
            geocoder.geocode( { 'location': latlng}, function(results, status) {
                if (status == 'OK') {   
                    console.log(results[0]);

                        for (var i=0; i<results[0].address_components.length; i++) {

                                if (results[0].address_components[i].types.indexOf("administrative_area_level_1") > -1) {
                                    $('#government2').val(results[0].address_components[i].long_name);

                                }
                                if (results[0].address_components[i].types.indexOf("locality") > -1) {
                                    $('#city2').val(results[0].address_components[i].long_name);

                                }
                                if (results[0].address_components[i].types.indexOf("administrative_area_level_2") > -1) {
                                    $('#city2').val(results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                    $('#postal_code2').val(results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('route') > -1) {
                                    input.setAttribute('data-street',results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('country') > -1) {
                                    $('#country2').val(results[0].address_components[i].long_name);

                                }
                                if(results[0].address_components[i].types.indexOf('street_number') > -1) {
                                    input.setAttribute('data-home',results[0].address_components[i].long_name);
                                }
                        }
                }else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });

        });


        // console.log('google loaded')

        function setRelation(order_id , vehicle_id,type){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.company_order_vec')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'order_id': order_id,
                    'vehicle_id': vehicle_id,
                },
                success: function (data) {
                    if(data == 1){
                        if(type == 'manual'){
                            $.notify("Success \n Order Load Up Time Updated Successfully",{ position:"top right" ,className:"success"});
                        }
                    }
                },        
            });
        }    

        $('.load_up_editable').editable({
            mode: 'inline',
            success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route(Helper::type($profile->status).'.company_order_dates')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': $(this).data('id'),
                        'newValue': newValue,
                        'type': $(this).data('name'),
                    },
                    success: function (data) {
                        if(data == 1){
                            $.notify("Success \n Order Load Up Time Updated Successfully",{ position:"top right" ,className:"success"});
                        }
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });    

        $('.load_from_editable').editable({
            type: 'datetime',
            mode: 'inline',
            format: 'dd-mm-yyyy hh:ii',
            viewformat: 'dd-mm-yyyy hh:ii',
            placement: 'right',
            datetimepicker: {
                todayHighlight: true,
                showMeridian: true,
                minuteStep: 10,
                pickerPosition: "bottom-left",
                format: 'dd-mm-yyyy hh:ii',
                

            },
            success: function(response,newValue){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route(Helper::type($profile->status).'.company_order_dates')}}",
                        type: 'POST',
                        data: {
                            '_token': $('input[name="_token"]').val(),
                            'order_id': $(this).data('id'),
                            'newValue': newValue,
                            'type': $(this).data('name'),
                        },
                        success: function (data) {
                            if (isNaN(data)) {
                                $.each(data['errors'], function (i, item) {
                                    $.notify("Whoops \n" + item, {position: "top right",className: "error"});
                                });
               
                            } else if(data == 1){
                                $.notify("Success \n Order Dates Updated Successfully",{ position:"top right" ,className:"success"});
                            }
                            if(!window.ordersOffers[$(this).data('id')]){
                                window.ordersOffers[$(this).data('id')] = {}
                            }
                            newValue = new Date(newValue);
                            var formattedDate = newValue.getFullYear() +'-'+newValue.getMonth()+"-"+newValue.getDay()+' '+newValue.getHours()+':'+newValue.getMinutes()
                            window.ordersOffers[$(this).data('id')][$(this).data('name')] = formattedDate;
                        },        
                        error: function(data){
                            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                        }

                    });
                }
        });

        window.ordersOffers = {}
        window.orders = {};
        window.vehicles = {}; 
        window.ordersMaps = {}  
        window.userOrderShownTruck = {}
        $(function () {
            $('.offer-total').change(function(e){
                $('#offer-number'+$(this).data('id')).val($(this).val())
            })
            $('.offer-number').change(function(e){
                $('#total'+$(this).data('id')).val($(this).val())
            })
            $('select').on('change', function (e) {
                if($(this).val() != 0){
                    var driverInfo = $('#DriverInfo'+$(this).data('orderid'))
                    driverInfo.hide().show(500);
                    $('#DriverInfo'+$(this).data('orderid')+' span.name').text($(this).children('option:selected').data('name'));
                    $('#DriverInfo'+$(this).data('orderid')+' span.phone').text($(this).children('option:selected').data('phone'));
                }else{
                    $('#DriverInfo'+$(this).data('orderid')).hide(750);
                }
                setRelation($(this).data('orderid'),$(this).val(),'manual');

            });
            
            window.directions = {};
            window.orderVehicleRoute = {};
            function showRouteBetweenVehicleAndRoute(orderId,vehicleId,deleteAll=false,map=OrdersMap){
                if(deleteAll){
                    resetTheMap();
                }
                if(window.orderVehicleRoute&&window.orderVehicleRoute[orderId+'-'+vehicleId]){
                    var directionsRendererOrdersMap = new google.maps.DirectionsRenderer({
                        preserveViewport: true,
                        suppressMarkers: true,
                        
                    });

                    directionsRendererOrdersMap.setMap(map); 

                        window.directionsOnMap.push(directionsRendererOrdersMap)
                    

                    directionsRendererOrdersMap.setDirections(window.orderVehicleRoute[orderId+'-'+vehicleId]);

                }else{
                    
                   
                    
                    var vehicle = {
                        lat:window.markers[vehicleId].position.lat(),
                        lng:window.markers[vehicleId].position.lng()
                    }
                    var order = {
                        lat:window.directions[orderId]["routes"][0]["legs"][0].start_location.lat(),
                        lng:window.directions[orderId]["routes"][0]["legs"][0].start_location.lng()
                    }
                    calcRoute(vehicle, order, map, orderId + '-' + vehicleId, 'vehicleOrder', {
                        preserveViewport: true,
                        suppressMarkers: true,
                        
                    })
                }
                
            }
            function clearInfoWindowOrders(except=0){
                window.infoWindowsShown.forEach(function(info){
                    if(info.infoOrder===true){
                        if(parseInt(except)!==parseInt(info.orderId)){

                            info.close();
                        }

                    }
                })
            }
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            function resetTheMap(){
                
                window.infoWindowsShown.forEach(function(info){
                    info.close();
                })
                window.infoWindowsShown = []
                window.markersShown.forEach(function(e){
                    e.setMap(null);
                })
                window.markersShown = []
                window.directionsOnMap.forEach(function(elemnt){
                    elemnt.setMap(null);
                })
                window.directionsOnMap =[];
            }
            function calculateDistance(lat1, lon1, lat2, lon2, unit) {
                var radlat1 = Math.PI * lat1 / 180;
                var radlat2 = Math.PI * lat2 / 180;
                var radlon1 = Math.PI * lon1 / 180;
                var radlon2 = Math.PI * lon2 / 180;
                var theta = lon1 - lon2
                var radtheta = Math.PI * theta / 180;
                var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                dist = Math.acos(dist)
                dist = dist * 180 / Math.PI
                dist = dist * 60 * 1.1515
                if (unit == "K") {
                    dist = dist * 1.609344
                }
                if (unit == "N") {
                    dist = dist * 0.8684
                }
                return dist
            }
            var OrdersMap = new google.maps.Map(document.getElementById('OrdersOnMap'), {
                        minZoom: 1,
                        zoom:9,
                        center: {lat:51.1657,lng:10.4515},
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        disableDefaultUI: false,
                        mapTypeControl: false,
            });
            var directionsRendererOrdersMap = new google.maps.DirectionsRenderer();
            var infowindow2 = new google.maps.InfoWindow();
 
            $('.head-order-item').click(function(e){
                e.preventDefault();
               if(window.directions[$(this).data('id')]){
                    directionsRendererOrdersMap.setMap(null)
                   var response = window.directions[$(this).data('id')];
                   directionsRendererOrdersMap.setMap(OrdersMap); 
                   directionsRendererOrdersMap.setDirections(window.directions[$(this).data('id')]);
                   var step = 0;
                    infowindow2.setContent(response.routes[0].legs[0].steps[step].distance.text + "<br>" + response.routes[0].legs[0].steps[step].duration.text + " ");
                    infowindow2.setPosition(response.routes[0].legs[0].steps[step].end_location);
                    infowindow2.open(OrdersMap);
                }
            })
            window.markers = {};
            var bounds = new google.maps.LatLngBounds();
            function getLatLngByZipcode(address , id,shipName,vid) {
            
                geocoder = new google.maps.Geocoder();
                var address = address ;
                geocoder.geocode({ 'address': address }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        latitude = results[0].geometry.location.lat();
                        longitude = results[0].geometry.location.lng();
                        //alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                        var myLatlng = new google.maps.LatLng(latitude,longitude);
                        var vehicle = window.vehicles[vid]
                        var driver = {
                            name:'{{trans('frontend/order.noDriver')}}',
                            profile:{
                                phone:'{{trans('frontend/order.noDriver')}}'
                            }
                        }
                        if(vehicle['drivere']!==null){
                            
                            driver = vehicle['drivere'];
                        }
                        
                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            icon:'/images/delivery-truck.svg',
                            title: shipName,
                            vid:vid
                        });
                        
                        marker.setMap(OrdersMap);
                        
                        window.markers[vid] = marker;
                        bounds.extend(marker.getPosition());    
                        OrdersMap.fitBounds(bounds);
                        window.directionsOnMap = [];  
                        window.infoWindowsShown = []
                        window.markersShown = []      
                        marker.addListener('click', function() {
                            console.log('marker');
                            resetTheMap();
                            var vid = this.vid;
                            var this_vec = window.vehicles[vid];
                            var contentString = `
                                <div class="ship-info-wrapper">
                                
                                    <h4 class="vehicle-name">`+this_vec['ship_name']+`</h4>
                                    <div class="driver-name">
                                        <b>{{trans('frontend/order.DriverName')}}</b>
                                        <span>`+this_vec['first_name']+' '+this_vec['last_name']+`</span>
                                    </div>
                                    <div class="driver-phone">
                                        <b>{{trans('frontend/order.DriverPhone')}}</b>
                                        <span>`+this_vec['phone']+`</span>
                                    </div>
                                </div>
                            `;
                            
                            var infowindow = new google.maps.InfoWindow({
                                content: contentString,
                                maxWidth: 200,
                                disableAutoPan:true
                            });


                            infowindow.open(OrdersMap, marker);
                            window.infoWindowsShown.push(infowindow)
                            var bounds2 = new google.maps.LatLngBounds();
                            bounds2.extend(this.getPosition());
                            var lat2 = this.position.lat()
                            var lng2 = this.position.lng()
                            
                            



                            for (var id in window.directions){
                                var lat1 = window.directions[id]["routes"][0]["legs"][0].start_location.lat();
                                var lng1 = window.directions[id]["routes"][0]["legs"][0].start_location.lng();
                                
                                var distance =  calculateDistance(lat1,lng1,lat2,lng2,"K")
                                if(distance<25){
                                    var response = window.directions[id];
                                    
                                    showRouteBetweenVehicleAndRoute(id,vid)
                                    var step = 0;
                                    var order = window.orders[id]
                                    // infowindow2.open(OrdersMap);
                                    bounds2.extend({lat:lat1,lng:lng1});
                                    var StartMarker = new google.maps.Marker({
                                        position: {lat:lat1,lng:lng1},
                                        icon:'/order/icon/'+order.cost,
                                        title: 'Order'+id+' this point is about '+distance.toFixed(2)+' km away from the vehicle ',
                                        url:'#order'+id,
                                        orderId:id
                                    });
                                    StartMarker.setMap(OrdersMap);
                                    
                                    StartMarker.addListener('mouseout',function(){
                                        this.setIcon('/order/icon/'+this.orderId);
                                        clearInfoWindowOrders(this.orderId)
                                    })
                                    StartMarker.addListener('mouseover', function () {
                                        this.setIcon('/order/icon/'+this.orderId+'?color=lightgreen');
                                        var order = window.orders[this.orderId]
                                        var InfoContent = `
                                        <div class="ship-info-wrapper">
                                            <div class="driver-name" style="margin-bottom:5px;">
                                                <span>
                                                    <i class="fa fa-home"></i> ${order.source}
                                                </span>
                                                <i><mark>${order.load_from}</mark></i>
                                            </div>
                                            <div class="driver-name">
                                                <span>
                                                    <i class="fa fa-location-arrow"></i> ${order.destination}
                                                <i><mark>${order.delivery_from}</mark></i>
                                                
                                                </span>
                                            </div>
                                            <a href="#order-item-${order.order_id}" class="mybtn btn-primary btn-xs">{{trans('frontend/order.show')}}</a>
                                        </div>
                                    `;
                                        var infowindow3 = new google.maps.InfoWindow({
                                            maxWidth: 200,
                                            content: InfoContent,
                                            infoOrder:true,
                                            orderId:order.order_id
                                        });
                                        
                                        window.infoWindowsShown.push(infowindow3)
                                        clearInfoWindowOrders();
                                        infowindow3.open(OrdersMap, this);
                                        
                                        
                                        $(document).unbind().on('click', 'a[href^="#"]', function (event) {
                                            
                                            event.preventDefault();
                                            event.stopPropagation();
                                            if (document.exitFullscreen) {
                                                document.exitFullscreen();
                                            } else if (document.mozCancelFullScreen) {
                                                document.mozCancelFullScreen();
                                            } else if (document.webkitCancelFullScreen) {
                                                document.webkitCancelFullScreen();
                                            }
                                            $('html, body').animate({
                                                scrollTop: $($.attr(this, 'href')).find('.main-item-content').offset().top - 90
                                            }, 500);
                                            $($.attr(this, 'href')).find('.main-item-content').addClass('active')
                                            var orderElement = $.attr(this, 'href');
                                            
                                            $(orderElement).find('.new-button-offer').click()
                                                
                                            
                                            setTimeout(function(){
                                                
                                                $(orderElement).find('.main-item-content').removeClass('active')

                                            },500)
                                            return 
                                        });

                                    })
                                    window.markersShown.push(StartMarker)
                                }
                            }
                            OrdersMap.fitBounds(bounds2,0); 
                        });
                                
                                
                            
                            // console.log(markers)
                            
                        
                    }
                });
            }
            


            @foreach($vehicles as $key=>$one)
                var ids = "OrdersOnMap";
                var vid = {{$one->vehichle_id}};
                var addresses = "{{$one->my_add .' '.$one->my_home.' '.$one->my_post .' '.$one->my_city .' '.$one->my_country}}";
                window.vehicles[{{$one->vehichle_id}}] = {!! json_encode($one) !!}
                getLatLngByZipcode(addresses , ids,'{{$one->ship_name}}',vid);
                

            @endforeach
            
            OrdersMap.addListener('click',function(e){
                console.log(e);
                
            })
            
    
            $('[data-countdown]').each(function() {
              var $this = $(this), finalDate = $(this).data('countdown');
              $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%H:%M:%S'));
              });
            });
            
            var geocoder;
            var geocoder2;
            //var directionsDisplay = new google.maps.DirectionsRenderer();
            var directionDisplay;
            var directionsService = new google.maps.DirectionsService();   
            var IDs = [];
    
            town = '';
            town2 = '';
            postal_code = '';
            postal_code2 = '';
            country = '';
            country2 = '';
    
            function getAdd(address , address2 , my_id){
                
                geocoder = new google.maps.Geocoder();
                      geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == 'OK') {
                            for (var i=0; i<results[0].address_components.length; i++) {
                                for (var b=0;b<results[0].address_components[i].types.length;b++) {
    
                                    if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                        town = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                        postal_code = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('country') > -1) {
                                        country = results[0].address_components[i].short_name;
                                    }
                                    
                                }
                            }   
                            $('#from'+my_id).text(country +' ' + postal_code + ' ' + town);
                            $('#froms'+my_id).text(country +' | ' + postal_code + ' ' + town);
    
                          } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                          }
                      });
    
                geocoder2 = new google.maps.Geocoder();
                      geocoder2.geocode( { 'address': address2}, function(results, status) {
                          if (status == 'OK') {
                            for (var i=0; i<results[0].address_components.length; i++) {
                                for (var b=0;b<results[0].address_components[i].types.length;b++) {
    
                                    if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                        town2 = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                        postal_code2 = results[0].address_components[i].long_name;
                                    }
                                    if(results[0].address_components[i].types.indexOf('country') > -1) {
                                        country2 = results[0].address_components[i].short_name;
                                    }
                                }
                            }   
                            $('#to'+my_id).text(country2 +' ' + postal_code2 + ' ' + town2);
                            $('#tos'+my_id).text(country2 +' | ' + postal_code2 + ' ' + town2);
                          } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                          }
                      }); 
    
            }
    
    
            @foreach($data as $order)
            
            <?php  $send_receive = \DB::table('order_send_receives')->where('order_id','=',$order->order_id)->first(); ?>
                @if(empty($send_receive))
                    id = '{{$order->order_id}}';
                    item = [id,'{{$order->source}}','{{$order->destination}}'];
                    IDs.push(item);
                @endif         
            @endforeach
            address = '';
            address2 = '';
            my_id = '';
    
            for (var i = 0; i < IDs.length; i++) {
                var id = IDs[i];
                for (var x = 0; x < id.length; x++) {
                    address = id[1];
                    address2 = id[2];
                    my_id = id[0];
                }
                
                getAdd(address , address2 , my_id);
            }
    
    
            
        
            @foreach($data as $order)
            window.orders[{{$order->order_id}}] = {!!json_encode($order)!!}
            getLocation("{{$order->order_id}}","{{$order->source}}","{{$order->destination}}",0);   
            @endforeach
    
            function getLocation(id,source,destination,place){
                
                    var latlng = new google.maps.LatLng(52.52000659999999, 13.404953999999975);
                    var myOptions = {
                        // minZoom: 3,
                        center:latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        disableDefaultUI: false,
                        mapTypeControl: false,
                        streetViewControl: false,
                        zoomControl:false,
                    };
                    /*var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    geocoder = new google.maps.Geocoder;
                    directionsDisplay.setMap(map);
                    calcRoute(source,destination);*/
                    if(place == 1){
                        var map = new google.maps.Map(document.getElementById('googlemap'+id), myOptions);
                    }else{
                        var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    }
                    window.ordersMaps[id] = map
                    calcRoute(source,destination,map,id,"order",{},true);
            }

            
            function calcRoute(start, end, map, id,type="order",options={},fit=false) {
                
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode.DRIVING
                };
                directionsService.route(request, function (response, status) {

                    if (status == google.maps.DirectionsStatus.OK) {
                        //directionsDisplay.setDirections(response);
                        var directionsRenderer = new google.maps.DirectionsRenderer(options);
                        directionsRenderer.setMap(map);
                        directionsRenderer.setDirections(response);
                        if(type==="order"){
                            window.directions[id] = response;
                        }else if(type==="vehicleOrder"){
                            window.orderVehicleRoute[id] = response;
                            window.directionsOnMap.push(directionsRenderer)
                        }
                        if(fit===true){
                            var start = {
                                lat:response.routes[0]['legs'][0]['start_location'].lat(),
                                lng:response.routes[0]['legs'][0]['start_location'].lng(),
                            }
                            var end = {
                                lat:response.routes[0]['legs'][0]['end_location'].lat(),
                                lng:response.routes[0]['legs'][0]['end_location'].lng(),
                            }
                            var fitBounds = new google.maps.LatLngBounds();
                            fitBounds.extend(start)
                            fitBounds.extend(end)
                            $('.slide-button.prev').click(function(e){
                                map.fitBounds(fitBounds)
                            })
                            $('.new-button-offer').click(function(e){
                                map.fitBounds(fitBounds)
                            })
                            $('.new-make-offer').click(function(e){
                                map.fitBounds(fitBounds)
                            })
                        }

                    } else {
                        switch (status) {
                            case "NOT_FOUND":
                                {
                                    alert("Either the start location or destination were not recognised");
                                    break;
                                };
                            case "ZERO_RESULTS":
                                {
                                    alert("No route could be found between the start location and destination");
                                    break;
                                };
                            case "MAX_WAYPOINTS_EXCEEDED":
                                {
                                    alert("Maximum waypoints exceeded. Maximum of 8 allowed");
                                    break;
                                };
                            case "INVALID_REQUEST":
                                {
                                    alert("Invalid request made for obtaining directions");
                                    break;
                                };
                            case "OVER_QUERY_LIMIT":
                                {
                                    alert("This webpage has sent too many requests recently. Please try again later");
                                    break;
                                };
                            case "REQUEST_DENIED":
                                {
                                    alert("This webpage is not allowed to request directions");
                                    break;
                                };
                            case "UNKNOWN_ERROR":
                                {
                                    alert("Unknown error with the server. Please try again later");
                                    break;
                                };
                        }
                    }
                });
            }
    
    
            $('.button.button--blue').on('click','.form-control.offer-number',function(e){
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
            });
    
    
    
            var l = $('.ladda-button').ladda();
            
            $('.submitoffer').click(function(e){
                $('.ladda-button').ladda('start');
                if(!$(e.target).hasClass('form-control')){
                    var offerData = {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': $(this).data('id'),
                        'user_id': '{{auth()->user()->id}}',
                        'total': $('#offer-number'+$(this).data('id')).val().replace(',','.'),
                    };
                    if(window.ordersOffers[$(this).data('id')]){
                        for(var key in window.ordersOffers[$(this).data('id')]){
                            offerData[key] = window.ordersOffers[$(this).data('id')][key]
                        }
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route(Helper::type($profile->status).'.new_offer')}}",
                        type: 'POST',
                        data: offerData,
                        success: function (data) {
                            if (isNaN(data)) {
                                $.each(data['errors'], function (i, item) {
                                    $.notify("Whoops \n" + item, {
                                        position: "top right",
                                        className: "error"
                                    });
                                });
                                setTimeout(function () {
                                    $('.ladda-button').ladda('stop');
                                },2000)   
                            } else {
                                $.notify("Success \n Offer Sent Successfully", {
                                    position: "top right",
                                    className: "success"
                                });
                                setTimeout(function () {
                                    $('.ladda-button').ladda('stop');
                                },2000)  
                                window.location.reload();
                            }
                        },
                        error: function (data) {
                            $.notify("Whoops \n Error may be in connection to server", {
                                position: "top right",
                                className: "error"
                            });
                            setTimeout(function () {
                                $('.ladda-button').ladda('stop');
                            },2000);
                        }

                    });
                }
               
            })
            
            $('.comment').on('click',function(e){
                e.preventDefault();
                e.stopPropagation();
                root = $(this).parents('.one_order');
                order_id = root.find('.id').val();
                user_id = "{{\Auth::user()->id}}";
                comment = root.find('#comment-area').val();
                $(this).attr("disabled", "disabled");
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('new_comment')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': order_id,
                        'user_id': user_id,
                        'comment': comment,
                    } ,
                    success: function (data) {
                        if (isNaN(data)){
                            $.each(data['errors'], function(i, item) { 
                                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                            });      
                        }else{  
                            $.notify("Success \n Comment Sent Successfully",{ position:"top right" ,className:"success"});
                        }
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }
    
                });
            });



            jQuery('.pickup').datetimepicker();


            /* button animate */


            $('.new-button-offer').on('click', function (){
                var id = $(this).data('id')
                var lat1 = window.directions[id]["routes"][0]["legs"][0].start_location.lat();
                var lng1 = window.directions[id]["routes"][0]["legs"][0].start_location.lng();
                var lessDistance = {
                    'id':0,
                    'distance':null
                };
                for(key in window.markers){
                    var lat2 = window.markers[key].position.lat()
                    var lng2 = window.markers[key].position.lng()
                    var distance =  calculateDistance(lat1,lng1,lat2,lng2,"K")
                    if(lessDistance['id']===0){
                        lessDistance['id'] = key;
                        lessDistance['distance'] = distance;
                    }
                    
                    if(lessDistance['distance']>distance){
                        lessDistance['id'] = key;
                        lessDistance['distance'] = distance;
                    }
                    
                }
                console.log(lessDistance)
                $('#selectpicker'+id).val(lessDistance['id'])
                $('.'+id).selectpicker('refresh')
                $(this).children('span').toggleClass('animate');
                $(this).parents('.order-item').siblings().find('span.animate').removeClass('animate');



            });
            $('.touch-spin').TouchSpin({
                min: 0,
                max: 1000000,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 1000000,
                buttondown_class: 'btn btn-default bootstrap-touchspin-down button--blue-spin',
                buttonup_class: 'btn btn-default bootstrap-touchspin-up button--blue-spin',
                postfix: '€'
            });
            
            
            $('.mainContent').on('click', function (m) {
                var clickOver = $(m.target);
                if (!clickOver.closest('.order-item').length) {
                    $('.new-button-offer span').removeClass('animate');
                }
            });


            var latitudes = '';
            var longitudes = '';
            var geocoders;
            var order_array = [];
            var vec_array = [];
            function getLang(address , id , type , weight){
                geocoders = new google.maps.Geocoder();
                var address = address ;
                geocoders.geocode({ 'address': address }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        latitudes = results[0].geometry.location.lat();
                        longitudes = results[0].geometry.location.lng();
                        if(type == 'orders'){
                            order_array.push([
                                id,latitudes,longitudes,weight 
                            ]);
                        }else if(type == 'vehicles'){
                            vec_array.push([id,latitudes,longitudes,weight]);
                        }
                        
                    }
                });
            }   

            


            @foreach($data as $order)
            getLang("{{$order->source}}","{{$order->order_id}}",'orders',"{{$order->weight}}");
            @endforeach  

            @foreach($vehicles as $one)
            var addresses = "{{$one->my_add .' '.$one->my_home.' '.$one->my_post .' '.$one->my_city .' '.$one->my_country}}";
            getLang(addresses,"{{$one->vehichle_id}}",'vehicles',"{{$one->weight}}");
            @endforeach     


            function Deg2Rad(deg) {
              return deg * Math.PI / 180;
            }
            function PythagorasEquirectangular(lat1, lon1, lat2, lon2) {
              lat1 = Deg2Rad(lat1);
              lat2 = Deg2Rad(lat2);
              lon1 = Deg2Rad(lon1);
              lon2 = Deg2Rad(lon2);
              var R = 6371; // km
              var x = (lon2 - lon1) * Math.cos((lat1 + lat2) / 2);
              var y = (lat2 - lat1);
              var d = Math.sqrt(x * x + y * y) * R;
              return d;
            }
            function NearestCity(latitude, longitude,weight) {
              var mindif = 99999;
              var closest;

              for (index = 0; index < vec_array.length; ++index) {
                if(parseInt(vec_array[index][3]) >= parseInt(weight)){
                    var dif = PythagorasEquirectangular(latitude, longitude, vec_array[index][1], vec_array[index][2]);
                    if (dif < mindif) {
                      closest = index;
                      mindif = dif;
                    }
                }
              }
                return closest;
            }   

            setTimeout(function(){
                //console.log(order_array.length);
                //console.log(order_array);
                for (var i = 0; i < order_array.length; i++) {
                    order_id = order_array[i][0];
                    order_lat = order_array[i][1];
                    order_long = order_array[i][2];
                    order_weight = order_array[i][3];
                    vec_index = NearestCity(order_lat,order_long,order_weight);
                    //console.log(order_array[i]);
                    //console.log(vec_index);
                    if(vec_index >= 0){
                        $('#selectpicker'+order_id).val(vec_array[vec_index][0]);
                        setRelation(order_id,vec_array[vec_index][0],'auto');
                        $('#DriverInfo'+order_id).find('span.name').text($('#selectpicker'+order_id+' option:selected').data('name'));
                        $('#DriverInfo'+order_id).find('span.phone').text($('#selectpicker'+order_id+' option:selected').data('phone'));
                        $('#selectpicker'+order_id).selectpicker('refresh');
                        $('#DriverInfo'+order_id).show();

                    }
                    
                    

                }
            }, 2000);


            var opts = {
                language: {
                    
                    inputTooLong: function() {
                        return "{{trans('frontend/dashboard.too_much')}}";
                    },
                    errorLoading: function() {
                        return "{{trans('frontend/dashboard.error')}}";
                    },
                    loadingMore: function() {
                        return "{{trans('frontend/dashboard.load_more')}}";
                    },
                    noResults: function() {

                        var element = document.getElementById("select2-driverSelector-results");
                        
                        if (element != null){
                            
                            element.innerHTML = document.createElement("div").innerHTML = '<h5 class="new"><i class="fas fa-plus-square"></i> {{trans('frontend/dashboard.newDriver')}}</h5>';
                        
                        }
                   },
                    searching: function() {
                        return "{{trans('frontend/dashboard.searching')}}";
                    },
                    maximumSelected: function() {
                        return "{{trans('frontend/dashboard.error_load')}}";
                    }
                }
            };

            var opt = {
                language: opts.language ,
                tags: false,
                dir: "ltr",
                multiple: false,
                tokenSeparators: [',', ''],
                minimumResultsForSearch: 1,

                ajax: {
                    delay: 250 ,
                    url: "{{route('vehicles.getDrivers') }}" ,
                    dataType: "json",
                    type: "GET",
                    data: function (params) {

                        var queryParameters = {
                            text: params.term
                        }
                        return queryParameters;
                    },
                    processResults: function (data,params) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.first_name+' '+item.last_name,
                                    id: item.id
                                };
                                
                            })
                        };
                        
                    }

                }
            }
            
            $('.new_vec').on('click',function(e){
                e.preventDefault();
                e.stopPropagation();

                $('#addNewVehcileModal').modal({
                    show:true
                });

                $('#driverSelector').select2(opt);

            });

            $(document).on('click','.select2-results__options h5',function(){
                $('#add_driver').modal('toggle');
                $("#drivers_select"+id).select2("close");
                $("#driverSelector").select2("close");
            });

            $('#addNewVehcileModal #driverSelector').select2({
                placeholder:{
                    id: -1,
                    text: '{{trans('frontend/dashboard.select_driver')}}',
                }
            });


            $('#add_driver').on('click','.btn-primary',function(e){

                e.preventDefault();
                e.stopPropagation();
                $('.ladda-button').ladda('start');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('drivers.newDriver')}}",
                    type: 'POST',
                    data:{
                        '_token': $('input[name="_token"]').val(),
                        'first_name': $('#add_driver #first_name').val(), 
                        'last_name': $('#add_driver #last_name').val(), 
                        'phone': $('#add_driver #driver_phones').val(), 
                    },
                    success:function(data){
                        if (isNaN(data)){
                            $.each(data['errors'], function(i, item) { 
                                $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                            });         
                            setTimeout(function () {
                                $('.ladda-button').ladda('stop');
                            },2000)       
                        }else if(data==1){
                            $.notify("Saved successfully \n Driver Saved Successfully",{ position:"top right" ,className:"success"});
                                $('.ladda-button').ladda('stop');

                            $('#add_driver').modal('toggle');
                            /*setTimeout(function () {
                                location.reload();
                            },2000)*/
                        } 
                        
                    },
                    error:function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                        },2000)    
                    }
                });    

            });

            $('#addNewVehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                $('.ladda-button2').ladda('start');
                $formData = new FormData();
                
                $formData.append('ship_id', $('#addNewVehcileModal .selectpicker option:selected').val());
                $formData.append('ship_name', $('#addNewVehcileModal .selectpicker option:selected').text());
                $formData.append('weight', $('#addNewVehcileModal #weight').val());
                $formData.append('model', $('#addNewVehcileModal #vehcilemodel').val());
                $formData.append('number', $('#addNewVehcileModal #vehcilenum').val());
                $formData.append('first_reg', $('#addNewVehcileModal #first').val());
                $formData.append('driver', $('#addNewVehcileModal #driverSelector option:selected').val());
                $formData.append('country', $('#addNewVehcileModal #country2').val());
                $formData.append('city', $('#addNewVehcileModal #city2').val());
                $formData.append('government', $('#addNewVehcileModal #government2').val());
                $formData.append('postal_code', $('#addNewVehcileModal #postal_code2').val());
                $formData.append('address', $('#addNewVehcileModal #address2').data('street'));
                $formData.append('home', $('#addNewVehcileModal #address2').data('home'));
            
                
                if($('#addNewVehcileModal #driverSelector option:selected').val() == -1){
                    $.notify("Whoops \n Invalid Driver",{ position:"top right" ,className:"error"});
                }else{
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                
                    $.ajax({
                       url: "{{route(Helper::type($profile->status).'.vehicles_add')}}",
                       type: 'POST',
                       data: $formData ,
                       dataType: 'json',
                       contentType: false,
                       processData: false,
                       success: function (data) {
                        if (isNaN(data)){
                          $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                          });    
                          setTimeout(function () {
                             $('.ladda-button2').ladda('stop');
                          },2000)           
                        }else if(data==1){
                          $.notify("Saved successfully \n Vehcile Saved Successfully",{ position:"top right" ,className:"success"});
                          setTimeout(function () {
                             $('.ladda-button2').ladda('stop');
                              location.reload();
                              
                          },2000)
                          $('#addNewVehcileModal').modal('toggle');

                        } 
                       },        
                       error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                        // setTimeout(function () {
                        //       location.reload();
                        //   },2000)
                      }

                    });
                }

            });


        });
    }


    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places&callback=init"
    type="text/javascript"></script>
@endsection