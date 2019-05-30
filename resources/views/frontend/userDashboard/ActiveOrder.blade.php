@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
@include('frontend.dashboard.layouts.sidebar2')
<!--profile view side-->
@endsection


<style type="text/css">
    .first_cont {
        margin: 0 !important;
        background-color: #FFF;
        box-shadow: 0 0.1rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    .orders {}

    .orders p:first-of-type {
        font-size: 30px;
        margin-bottom: 0;
    }

    .orders p:last-of-type {
        font-size: 12px;
        color: #666;
    }

    .first_cont div.col-md-5.col-sm-6.col-xs-12 {
        padding: 0;
    }

    .type {
        border-bottom: 1px solid #DDD;
        cursor: pointer;
    }

    .type:hover {
        background-color: #f9f9f9;
    }

    .type.active {
        color: #FFF;
    }

    .type.active .orders p:last-of-type {
        color: #DDD;
    }

    .type.success {
        border-right: 5px solid #009124;
    }

    .type.success.active {
        background-color: #04b12f;
    }

    .type.primary {
        border-right: 5px solid #398bf7;
    }

    .type.primary.active {
        background-color: #547aad;
    }

    .type.orange {
        border-right: 5px solid #f6ab36;
    }

    .type.orange.active {
        background-color: #da8500;
    }

    .type.danger {
        border-right: 5px solid #d9534f;
    }

    .type.danger.active {
        background-color: #c50803;
    }

    .type a,
    .type a:hover,
    .type a:active,
    .type a.active {
        text-decoration: none;
        color: unset;
    }

    .results {
        margin-top: 15px;
    }

    .row.first_row {
        margin: 0;
        margin-bottom: 20px;
    }

    .row.second_row {
        margin: 0;
        border: 1px solid #DDD;
        padding: 15px 0;
        margin-bottom: 20px;
        display: none;
    }

    .second_row .col-xs-1 {
        padding-top: 7px;
        font-size: 18px;
        color: #777;
        padding: 0;
        margin-right: 10px;
    }

    .second_row .col-xs-10 {
        padding: 0;
    }

    .order-offer .results .order-item__slide .tab-list li {
        width: 33.3333333% !important;
    }

    .countdown {
        font-size: 18px;
        font-weight: bold;
        color: #333 !important;
        margin-left: 10px;
    }

    .fa-times {
        color: #c50803;
    }

    .second_row #city2 {
        margin-bottom: 10px;
    }

    @media(max-width: 767px) {
        .row.second_row input {
            margin-bottom: 15px;
        }
        .second_row #city,
        .second_row #city2 {
            margin-left: 12px;
        }
    }

    .order-offer .results .order-item__slide .tab-content .status .operation-timeline{
        padding: 3.8rem !important;
    }
    .contact-sender.sender{
        margin-top: 1.5rem !important;
    }
    .gm-svpc {
        display: none;
    }
</style>
<style type="text/css">
    .map {
        position: unset !important;
    }

    .pagination-wrapper {
        font-size: 1.4rem;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-color: transparent;
    }

    .nav-tabs {
        margin-bottom: 2rem;
    }

    .main-wrapper .pageContent {
        height: unset;
        min-height: 100vh !important;
    }
</style>
<style type="text/css">
    .heade {
        position: relative;
    }

    .test {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #FFF;
        opacity: .7;
    }

    .test img {
        width: 8rem;
        height: 8rem;
        display: block;
        margin: auto;
        margin-top: 20%;
    }
</style>

<?php 
    $test_type = \Crypt::decrypt($type);

?> @if($test_type == 'pending' )
<style type="text/css">
    .order-offer .results .order-item.complete {
        border-left: .5rem solid #f6ab36 !important;
    }
</style>
@elseif($test_type == 'cancelled')
<style type="text/css">
    .order-offer .results .order-item.complete {
        border-left: .5rem solid #d9534f !important;
    }
</style>
@elseif($test_type == 'finished')
<style type="text/css">
    .order-offer .results .order-item.complete {
        border-left: .5rem solid #398bf7 !important;
    }
</style>
@endif 
@section('page-content')

<!--pageContent-->
<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')


        <input type="hidden" name="type" class="type" value="{{$type}}">
        <div class="tab-content">
            <div id="home" class="tab-pane active in">
                <!--order offer-->
                <div class="order-offer">

                    <!--results row-->
                    <div class="row heade">
                        <div class="col-xs-12 managed">
                            <!--here all results-->

                            <div class="results">

                                <div class="row first_row">
                                    <button class="btn btn-md btn-primary pull-right filter"> <i class="fas fa-filter"></i> {{trans('frontend/dashboard.filter')}}</button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row second_row">
                                    <div class="col-xs-12">
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 0">
                                            <div class="col-xs-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text" id="country" placeholder="{{trans('frontend/order.country')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="number" id="postal_code" placeholder="{{trans('frontend/order.postal_code')}}" />
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="text" id="city" placeholder="{{trans('frontend/order.town')}}" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 15px;">
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 0">
                                            <div class="col-xs-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text" id="country2" placeholder="{{trans('frontend/order.country')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="number" id="postal_code2" placeholder="{{trans('frontend/order.postal_code')}}" />
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="text" id="city2" placeholder="{{trans('frontend/order.town')}}" />
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <button class="btn btn-md btn-primary pull-right search"><i class="fas fa-search"></i> {{trans('frontend/dashboard.search')}}</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="assign-item Cancelled active">
                                    @foreach($data as $order)
                                    <?php 
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

                                        $one_offer = \DB::table('offers')->where('user_id','=',\Auth::user()->id)->where('order_id','=',$order->order_id)->first();                                
                                    ?>

                                    <!--order item-->
                                    <div class="order-item complete">
                                        <!--first row-->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <!--content-->

                                                <div class="order-item__content clearfix">
                                                    <!--internal row-->
                                                    <div class="row ">
                                                        <!--first column-->
                                                        <div class="col-lg-3 col-md-4 col-sm-5">
                                                            <div class="row">
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <!--source details-->
                                                                        <div class="order-details clearfix">
                                                                            <div class="float-left date">
                                                                                {{Carbon::parse($load_from)->format('M d')}}
                                                                            </div>
                                                                            <div class="float-left icon">
                                                                                <span class="fas fa-map-marker-alt"></span>
                                                                            </div>
                                                                            <div class="float-left address" id="from{{$order->order_id}}">
                                                                                <?php 
                                                                                        $country ='';
                                                                                        $country1 ='';
                                                                                        $country2 ='';
                                                                                        $postal_code ='';
                                                                                        $postal_code2 ='';
                                                                                        $town ='';
                                                                                        $town2 ='';
                                                                                        if($sender == '') {
                                                                                            $country = '';
                                                                                            $postal_code = '';
                                                                                            $town = '';
                                                                                            $country1 = '';
                                                                                        }else if($sender->country == 'Germany' || $sender->country == 'Deutschland'){
                                                                                            $postal_code = $sender->postal_code;
                                                                                            $town = $sender->town;
                                                                                            $country = 'DE';
                                                                                            $country1 = 'Germany';
                                                                                        }else{
                                                                                            $country = $sender->country;
                                                                                            $postal_code = $sender->postal_code;
                                                                                            $town = $sender->town;
                                                                                            $country1 = 'Germany';

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
                                                                                {{Carbon::parse($delivery_until)->format('M d')}}
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
                                                                    <div class="distance-info">
                                                                        <ul class="distance-list clearfix">
                                                                            <li>id : {{$order->order_id}}</li>
                                                                            <li>{{round($order->distance)}} km</li>
                                                                            <li>{{round($order->weight)}} kg</li>
                                                                            <li style="border-right: 0;">~{{round($order->length)}} Idm</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--first column-->
                                                        <!--map info-->
                                                        <div class="col-lg-3 col-md-3">
                                                            <div class="map-info">
                                                                <div class="assign-map">
                                                                    <div class="row">
                                                                        <div class="pick-map">
                                                                            <div id="googlemaps{{$order->order_id}}" class="map"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--map info-->


                                                        <!--second column-->
                                                        <div class="col-lg-2 col-md-2 col-sm-3">
                                                            <div class="load-info">
                                                                <p class="load-from">{{trans('frontend/dashboard.load_from')}}</p>
                                                                <p>{{Carbon::parse($load_from)->format('M d, Y')}} - {{Carbon::parse($load_from)->format('H:i')}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!--second column-->

                                                        <!--third column-->
                                                        <div class="col-lg-4 col-md-3 col-sm-4">
                                                            <div class="order-operation">
                                                                <!--complete order-->
                                                                <ul class="step-complete clearfix">
                                                                    @if($test_type == 'accepted')
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    @elseif($test_type == 'finished')
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    @elseif($test_type == 'pending')
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    @if($order->is_active == 0 && $one_offer->is_accepted == 1)
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    @else
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    @endif
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    @elseif($test_type == 'cancelled')
                                                                    <li><span class="fas fa-check"></span></li>
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    <li><span class="fas fa-times"></span></li>
                                                                    @endif
                                                                </ul>
                                                                <!--complete order-->

                                                                <button class="button show-details">{{trans('frontend/dashboard.details')}} 
                                                                        <span class="fas fa-angle-down"></span>
                                                                    </button>
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


                                        <!--slide down -->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="order-item__slide">
                                                    <!--tab row-->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <ul class="tab-list clearfix">
                                                                <li class="active" data-content="status">{{trans('frontend/dashboard.status')}}</li>
                                                                <li data-content="offer-complete">{{trans('frontend/dashboard.offer')}}</li>
                                                                <li data-content="details">{{trans('frontend/dashboard.details')}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--tab row-->

                                                    <!--content row-->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="tab-content">
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
                                                                                                <span class="template-loc" id="froms{{$order->order_id}}">
                                                                                                        {{$country}} | {{$postal_code}} {{$town}}
                                                                                                    </span>

                                                                                                <span class="template-loc">
                                                                                                        {{Carbon::parse($load_from)->format('M d')}} <br>{{Carbon::parse($load_from)->format('H:i')}} - {{Carbon::parse($load_up)->format('H:i')}}
                                                                                                    </span>
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
                                                                                                <span class="template-loc" id="tos{{$order->order_id}}">
                                                                                                        {{$country2}} | {{$postal_code2}} {{$town2}}
                                                                                                    </span>
                                                                                                <span class="template-loc">
                                                                                                    {{Carbon::parse($delivery_from)->format('M d')}}<br>{{Carbon::parse($delivery_from)->format('H:i')}} - {{Carbon::parse($delivery_until)->format('H:i')}}
                                                                                                    </span>
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
                                                                                                kg</p>
                                                                                        </div>

                                                                                        <div class="total">
                                                                                            <p class="total-head">{{trans('frontend/dashboard.total')}}</p>
                                                                                            <p class="total-value">~{{round($order->length)}} Idm
                                                                                                | {{round($order->weight)}}
                                                                                                kg</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--second col-->

                                                                        <!--third column-->
                                                                        <div class="col-md-4">
                                                                            <div class="row">
                                                                                <div class="pick-map">
                                                                                    <div id="googlemap{{$order->order_id}}" class="map"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--third column-->
                                                                    </div>
                                                                    <!--row-->
                                                                </div>

                                                                <!--details-->


                                                                <div class="tab-item offer-complete ">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="company-info">
                                                                                <h3>Marina lanke berlin ag</h3>
                                                                                <ul class="icon-list clearfix">
                                                                                    <li>
                                                                                        <span class="fas fa-child"></span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="fas fa-clipboard-check"></span>
                                                                                        <span>{{Carbon::parse($delivery_from)->format('M d')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="fas fa-flag"></span>
                                                                                        <span id="fromt{{$order->order_id}}">{{$country1}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="fas fa-truck"></span>
                                                                                    </li>
                                                                                </ul>

                                                                                <div class="tested">
                                                                                    <span class="fas fa-check-circle"></span>
                                                                                    <p>{{trans('frontend/dashboard.tested')}}</p>
                                                                                    @if($test_type == 'accepted')
                                                                                    <button class="btn btn-xs btn-success delievered" value="{{$order->order_id}}">{{trans('frontend/dashboard.delievered')}}</button>                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-8">
                                                                            <div class="offer-complete-information">
                                                                                <!--row-->
                                                                                <div class="row">
                                                                                    <div class="col-xs-12">
                                                                                        <div class="transport-cost">
                                                                                            <h3>{{trans('frontend/dashboard.trans_cost')}}</h3>
                                                                                            <p class="cost">{{$order->total}} &euro;</p>
                                                                                            <p class="note">{{trans('frontend/dashboard.vat')}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--row-->

                                                                                <!--row-->
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="complete-valid-info border">

                                                                                            <div class="info-block">
                                                                                                <p class="valid-heading">{{trans('frontend/dashboard.offer_valid')}}</p>
                                                                                                <span class="date red" data-countdown='{{\Carbon::parse($valid_until)->format(' Y-m-d - H:i:s ')}}'>{{\Carbon::parse($valid_until)->format('Y-m-d - H:i:s')}}</span>
                                                                                            </div>

                                                                                            <div class="info-block">
                                                                                                <p class="valid-heading">{{trans('frontend/dashboard.pickup')}}</p>
                                                                                                <span class="date">
                                                                                                        {{Carbon::parse($load_from)->format('M d, Y')}}     - 
                                                                                                        {{Carbon::parse($load_from)->format('H:i')}} {{Carbon::parse($load_up)->format('H:i')}}       
                                                                                                    </span>
                                                                                            </div>

                                                                                            <div class="info-block">
                                                                                                <p class="valid-heading">{{trans('frontend/dashboard.delivery')}}</p>
                                                                                                <span class="date">
                                                                                                        {{Carbon::parse($delivery_from)->format('M d, Y')}}     - 
                                                                                                        {{Carbon::parse($delivery_from)->format('H:i')}} {{Carbon::parse($delivery_until)->format('H:i')}}    
                                                                                                    </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="complete-valid-info">
                                                                                            <div class="info-block">
                                                                                                <p class="valid-heading">{{trans('frontend/dashboard.your_message')}}</p>
                                                                                                <?php 
                                                                                                        $ship = \DB::table('shippings')->where('id','=',$order->ship_id)->first();
                                                                                                    ?>
                                                                                                <span class="date">{{$ship->title}}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!--row-->
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>


                                                                <!--status tab-->
                                                                <div class="tab-item status active" id="status">
                                                                    <div class="row">
                                                                        <!--first col-->
                                                                        <div class="col-md-6">
                                                                            @if($order->paid == $order->cost)
                                                                            <!--row one-->
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <div class="download-documents">
                                                                                        <h3>{{trans('frontend/dashboard.down_doc')}}</h3>
                                                                                        <ul class="document-list">
                                                                                            <li>
                                                                                                <a href="#">
                                                                                                    <div class="file-name">
                                                                                                        <span class="file-type">PDF</span>
                                                                                                        <span class="file-name">transporti</span>
                                                                                                    </div>
                                                                                                    <div class="file-date">
                                                                                                        juli 05, 2017 - 16:36
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>

                                                                                            <li>
                                                                                                <a href="#">
                                                                                                    <div class="file-name">
                                                                                                        <span class="file-type">word</span>
                                                                                                        <span class="file-name">transposition</span>
                                                                                                    </div>
                                                                                                    <div class="file-date">
                                                                                                        juli 05, 2017 - 16:36
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>

                                                                                            <li>
                                                                                                <a href="#">
                                                                                                    <div class="file-name">
                                                                                                        <span class="file-type">jpeg</span>
                                                                                                        <span class="file-name">transporti</span>
                                                                                                    </div>

                                                                                                    <div class="file-date">
                                                                                                        juli 05, 2017 - 16:36
                                                                                                    </div>
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--row one-->
                                                                            @endif

                                                                            <!--row two-->
                                                                            <div class="row">
                                                                                <div class="col-xs-12">
                                                                                    <div class="contact-sender">
                                                                                        <h3>{{trans('frontend/order.desc')}}</h3>
                                                                                        <p style="padding-left: 10px;">
                                                                                            {{$order->description}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--row two-->
                                                                        </div>
                                                                        <!--first col-->

                                                                        <!--second col-->
                                                                        <div class="col-md-6">
                                                                            <div class="operation-timeline">
                                                                                <ul class="timeline">

                                                                                    @if($test_type == 'accepted')

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.submitted')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A')}}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.pending')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->updated_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.accepted')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">Juli 05 , 2017 12:00 AM</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.order_working')}}</span>
                                                                                    </li>
                                                                                    @elseif($test_type == 'finished')
                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.submitted')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.pending')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->updated_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.accepted')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">Juli 05 , 2017 12:00 AM</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.order_working')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">Juli 05 , 2017 12:00 AM</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.order_finished')}}</span>
                                                                                    </li>

                                                                                    @elseif($test_type == 'pending')
                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.submitted')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.pending')}}  <span class="date red countdown" data-countdown='{{\Carbon::parse($valid_until)->format('Y-m-d - H:i:s')}}'>{{\Carbon::parse($valid_until)->format('Y-m-d - H:i:s')}}</span></span>

                                                                                        @if($order->is_active == 0 && $one_offer->is_accepted == 1)
                                                                                        <li>
                                                                                            <span class="date">{{Carbon::parse($one_offer->updated_at)->format('M d , Y h:i A') }}</span>
                                                                                            <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.accepted')}}</span>
                                                                                        </li>
                                                                                        @endif
                                                                                    </li>


                                                                                    @elseif($test_type == 'cancelled')
                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.submitted')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($one_offer->created_at)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer')}} {{trans('frontend/dashboard.pending')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($valid_until)->format('M d , Y h:i A') }}</span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.offer_cancelled')}}</span>
                                                                                    </li>

                                                                                    <li>
                                                                                        <span class="date">{{Carbon::parse($valid_until)->format('M d , Y h:i A') }}
                                                                                            </span>
                                                                                        <span class="step-text">{{trans('frontend/dashboard.order_expired')}}</span>
                                                                                    </li>

                                                                                    @endif


                                                                                </ul>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-xs-12" style="padding: 0;">
                                                                                    <div class="col-xs-12 col-sm-6">
                                                                                        
                                                                                        <div class="contact-sender sender">
                                                                                            <h3>{{trans('frontend/order.sender')}}</h3>
                                                                                            <p style="padding-left: 10px;">
                                                                                                {{$sender->first_name .' '.$sender->nick_name}}<br>
                                                                                                {{$sender->phone}}<br>
                                                                                                {{$sender->street}} {{$sender->home}}<br>
                                                                                                {{$sender->postal_code}} {{$sender->town}}<br>
                                                                                                {{$sender->country}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-12 col-sm-6">
                                                                                        <div class="contact-sender sender">
                                                                                            <h3>{{trans('frontend/order.receiver')}}</h3>
                                                                                            <p style="padding-left: 10px;">
                                                                                                {{$receiver->first_name .' '.$receiver->nick_name}}<br>
                                                                                                {{$receiver->phone}}<br>
                                                                                                {{$receiver->street}} {{$receiver->home}}<br>
                                                                                                {{$receiver->postal_code}} {{$receiver->town}}<br>
                                                                                                {{$receiver->country}}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>    
                                                                                    
                                                                                </div>   
                                                                            </div>

                                                                        </div>
                                                                        <!--second col-->
                                                                    </div>
                                                                </div>
                                                                <!--status tab-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--content row-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--slide down -->
                                    </div>
                                    <!--order item-->
                                    @endforeach
                                </div>

                            </div>

                            <!--here all results-->

                            <div class="row">
                                <div class="box-footer">
                                    <div class="pagination-wrapper">{!! $data->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        <div class="test">
                            <img src="{{asset('images/ajax-loader.gif')}}">
                        </div>
                    </div>
                    <!--results row-->


                </div>
                <!--order offer-->
            </div>
        </div>
    </div>
</div>
<!--pageContent-->
@endsection
 
@section('scripts') {{--
<script src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $(function(){

        

        

        var geocoder;
        var geocoder2;
        var directionsDisplay ;
        var directionsService = new google.maps.DirectionsService();   
        var IDs = [];

        town = '';
        town2 = '';
        postal_code = '';
        postal_code2 = '';
        country = '';
        country1 = '';
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
                                    country1 = results[0].address_components[i].long_name;
                                }
                                
                            }
                        }   
                        $('#from'+my_id).text(country +' ' + postal_code + ' ' + town);
                        $('#froms'+my_id).text(country +' | ' + postal_code + ' ' + town);
                        $('#fromt'+my_id).text(country1);

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
        


        $(document).on('click','.show-details', function (){
            $(this).toggleClass('active');
            $(this).parents('.order-item').find('.order-item__slide').slideToggle();
            $(this).parents('.order-item').siblings().find('.order-item__slide').slideUp();
            
            $(this).parents('.one_order').siblings('.one_order').find('.order-item__slide').slideUp()

            var source = $(this).siblings('.source').val();
            var destination = $(this).siblings('.destination').val();
            var id = $(this).siblings('.id').val();
            var place = 1;
            getLocation(id,source,destination,place);
        });

        @foreach($data as $order)
            getLocation("{{$order->order_id}}","{{$order->source}}","{{$order->destination}}",0);   
        @endforeach

        function getLocation(id,source,destination,place){
                var latlng = new google.maps.LatLng(52.52000659999999, 13.404953999999975);
                var myOptions = {
                    minZoom: 9,
                    zoom:10,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: false,
                    mapTypeControl: false,
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
                calcRoute(source,destination,map);
        }
        function calcRoute(start, end, map) {
            var request = {
                origin:start,
                destination:end,
                travelMode: google.maps.TravelMode.DRIVING    
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    //directionsDisplay.setDirections(response);
                    var directionsRenderer = new google.maps.DirectionsRenderer(); 
                    directionsRenderer.setMap(map); 
                    directionsRenderer.setDirections(response); 
                }else{
                        switch (status) {
                            case "NOT_FOUND": { 
                                alert("Either the start location or destination were not recognised"); 
                                break;
                            };
                            case "ZERO_RESULTS": {
                                alert("No route could be found between the start location and destination"); 
                                break; 
                            };
                            case "MAX_WAYPOINTS_EXCEEDED": {
                                alert("Maximum waypoints exceeded. Maximum of 8 allowed"); 
                                break; 
                            };
                            case "INVALID_REQUEST": { 
                                alert("Invalid request made for obtaining directions"); 
                                break;
                            };
                            case "OVER_QUERY_LIMIT": {
                                alert("This webpage has sent too many requests recently. Please try again later"); 
                                break; 
                            };
                            case "REQUEST_DENIED": { 
                                alert("This webpage is not allowed to request directions"); 
                                break; 
                            };
                            case "UNKNOWN_ERROR": { 
                                alert("Unknown error with the server. Please try again later"); 
                                break; 
                            };
                        }
                }
            });
        }
          


        $(document).on('click','.search',function(e){
            e.preventDefault();
            e.stopPropagation();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('filter')}}",
                type: 'GET',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'type': $('input[name="type"]').val(),
                    'country': $('input#country').val(),
                    'country2': $('input#country2').val(),
                    'postal_code': $('input#postal_code').val(),
                    'postal_code2': $('input#postal_code2').val(),
                    'city': $('input#city').val(),
                    'city2': $('input#city2').val(),
                } ,
                success: function (data) {
                        $('.pagination-wrapper').remove();
                        setTimeout(function(){
                            $('.test').toggle();
                        },2500);
                        $('.assign-item').empty();
                        $('.test').toggle();  
                        $('.managed').html(data);
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });     

        $(document).on('click','.pagination-wrapper.tested .pagination .page-link',function(e){
            e.preventDefault();
            var page = $(this).attr('href');
            getItems(page);
            window.history.pushState("", "", page);
        });                

        function getItems(page){
            
            $.ajax({
                url:page,
                data:{
                    '_token': $('input[name="_token"]').val(),
                    'type': $('input[name="type"]').val(),
                    'country': $('input#country').val(),
                    'country2': $('input#country2').val(),
                    'postal_code': $('input#postal_code').val(),
                    'postal_code2': $('input#postal_code2').val(),
                    'city': $('input#city').val(),
                    'city2': $('input#city2').val(),
                }
            }).done(function(data){
                setTimeout(function(){
                    $('.test').toggle();
                },2500);
                $('.assign-item').empty();
                $('.test').toggle();  
                $('.managed').html(data);
            });
        }  


        $(document).on('click','.delievered',function(e){
            e.preventDefault();
            e.stopPropagation();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('done')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': $(this).attr('value'),
                } ,
                success: function (data) {
                    $.notify("Success \n Order is delievered successfully.",{ position:"top right" ,className:"success"});
                    setTimeout(function(){
                        location.reload();
                    },2000);
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });

    });

</script>
@endsection