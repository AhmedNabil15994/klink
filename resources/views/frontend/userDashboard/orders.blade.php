@extends('frontend.userDashboard.index') 
@section('sidebar2')
<!--profile view side-->
    @include('frontend.userDashboard.layouts.sidebar2')
<!--profile view side-->
@endsection
 
@section('page-content')
<link rel="stylesheet" href="/css/css/all.min.css">
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
</style>

<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.userDashboard.layouts.partials.newHeader')

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

            <!--match result row-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="match-result">
                        <span> {{count($data)}} </span> {{trans('frontend/dashboard.matching')}}
                    </div>
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
                                    $dates = \DB::table('order_dates')->where('order_id', '=', $order->order_id)->first();
                                    $send_receive = \DB::table('order_send_receives')->where('order_id', '=', $order->order_id)->first();
                                    if (!empty($send_receive)) {
                                        $receiver_id = $send_receive->receiver_id;
                                        $sender_id = $send_receive->sender_id;
                                        $sender = \DB::table('senders')->where('id', '=', $sender_id)->first();
                                        $receiver = \DB::table('receivers')->where('id', '=', $receiver_id)->first();
                                    } else {
                                        $sender = '';
                                        $receiver = '';
                                    }
                                    $ship = \DB::table('shippings')->where('id', '=', $order->ship_id)->first();
                                    $discount = round($order->cost * $ship->discount / 100, 2);
                                    $after = $order->cost - $discount;
                                    $vat = round($after * 19 / 100, 2);
                                    $total = $order->paid;
                                    $load_from = '';
                                    if (empty($dates->load_from)) {
                                        $load_from = '';
                                    } else {
                                        $load_from = $dates->load_from;
                                    }

                                    $load_up = '';
                                    if (empty($dates->load_up)) {
                                        $load_up = '';
                                    } else {
                                        $load_up = $dates->load_up;
                                    }

                                    $delivery_from = '';
                                    if (empty($dates->delivery_from)) {
                                        $delivery_from = '';
                                    } else {
                                        $delivery_from = $dates->delivery_from;
                                    }

                                    $delivery_until = '';
                                    if (empty($dates->delivery_until)) {
                                        $delivery_until = '';
                                    } else {
                                        $delivery_until = $dates->delivery_until;
                                    }

                                    $valid_until = '';
                                    if (empty($dates->valid_until)) {
                                        $valid_until = '';
                                    } else {
                                        $valid_until = $dates->valid_until;
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
                                                                                    {{Carbon::parse($load_from)->format('M d')}}
                                                                                </div>
                                                                                <div class="float-left icon">
                                                                                    <span class="fas fa-map-marker-alt"></span>
                                                                                </div>
                                                                                <div class="float-left address" id="from{{$order->order_id}}">
                                                                                    <?php
                                                                                        $country = '';
                                                                                        $country2 = '';
                                                                                        $postal_code = '';
                                                                                        $postal_code2 = '';
                                                                                        $town = '';
                                                                                        $town2 = '';
                                                                                        if ($sender == '') {
                                                                                            $country = '';
                                                                                            $postal_code = '';
                                                                                            $town = '';
                                                                                        } else if ($sender->country == 'Germany' || $sender->country == 'Deutschland') {
                                                                                            $postal_code = $sender->postal_code;
                                                                                            $town = $sender->town;
                                                                                            $country = 'DE';
                                                                                        } else {
                                                                                            $country = $sender->country;
                                                                                            $postal_code = $sender->postal_code;
                                                                                            $town = $sender->town;
                                                                                        }

                                                                                        if ($receiver == '') {
                                                                                            $country2 = '';
                                                                                            $postal_code2 = '';
                                                                                            $town2 = '';
                                                                                        } else if ($receiver->country == 'Germany' || $receiver->country == 'Deutschland') {
                                                                                            $country2 = 'DE';
                                                                                            $postal_code2 = $receiver->postal_code;
                                                                                            $town2 = $receiver->town;
                                                                                        } else {
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
                                                                        {{$order->time}} {{trans('frontend/makeoffer.minutes')}}
                                                                        </span>
                                                                    </p>



                                                                </div>
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

                                                                    <button class="new-button-offer button button--blue">{{trans('frontend/dashboard.details')}}
                                                                                                                    <span class="fas fa-long-arrow-alt-right"></span>
                                                                                                                    </button>
                                                                    <div class="custom-date-field">
                                                                        <input type="text" id="offer-number{{$order->order_id}}" data-id="{{$order->order_id}}" class="offer-number form-control" value="{{$total}}" style="width: 11.3rem;margin:auto;margin-bottom: .2rem;border: 0;background: #FFF;" readonly >
                                                                        <span class="fas fa-euro-sign" style="right:10%;"></span>
                                                                    </div>

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
                                                                                        @for($i=0 ; $i
                                                                                        <$order->person ; $i++)
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
                                                <li class="top-square slide-button details-button">
                                                    {{trans('frontend/makeoffer.orderinfo')}}
                                                </li>
                                                <li class="top-square new-make-offer">
                                                   {{trans('frontend/makeoffer.ordercomplete')}}
                                                </li>
                                            </ul>
                                            <!--row-->
                                            <div class="custom-class details">
                                                <div class="row">

                                                    <div class="slide-content first-pick active">

                                                        <!--first row-->
                                                        <div class="col-xs-12">

                                                            <!--row-->
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="info-block">
                                                                        <div class="info-template">
                                                                            <p class="template-para">{{trans('frontend/dashboard.pickup')}}</p>
                                                                            <div class="location-info" style="flex-wrap:wrap;">
                                                                                <span class="template-loc" style="" id="froms{{$order->order_id}}">{{$country}} | {{$postal_code}} {{$town}}</span>
                                                                                <span class="template-loc load_from_editable" data-url="" data-id="{{$order->order_id}}"  data-type="datetime" data-name="load_from"  id="loadFrom{{$order->order_id}}">{{\Carbon::parse($load_from)->format('d-m-Y H:i')}}</span>
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
                                                                            <p class="template-para" >{{trans('frontend/dashboard.delivery')}}</p>
                                                                            <div class="location-info" style="flex-wrap:wrap;">
                                                                                <span class="template-loc" style="" id="tos{{$order->order_id}}">{{$country2}} | {{$postal_code2}} {{$town2}}</span>
                                                                                <span class="template-loc load_from_editable" data-id="{{$order->order_id}}"  data-type="datetime" data-name="delivery_from" data-url="">{{\Carbon::parse($delivery_from)->format('d-m-Y H:i')}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--row-->

                                                        </div>
                                                        <!--first row-->

                                                        <!--second row-->
                                                        <div class="col-xs-12">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="load-info">
                                                                        <div class="load-items">

                                                                            <p class="load-para">
                                                                                {{trans('frontend/order.desc')}}
                                                                            </p>
                                                                            <p class="load-para-sub-2">
                                                                                {{$order->description}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <!--second row-->
                                                        <div class="col-xs-12" style="display:none;" id="DriverInfo{{$order->order_id}}">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="load-info custom-style55">
                                                                        <div class="load-items">


                                                                            <p class="load-para-sub-2">

                                                                            <i class="fas fa-user-tie"></i>
                                                                            <span class="name">

                                                                            </span>
                                                                            </p>

                                                                            <p class="load-para-sub-2">
                                                                            <i class="fas fa-phone"></i>
                                                                            <span class="phone">


                                                                            </span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        

                                                        <!--third row-->

                                                    </div>

                                                    <div class="slide-content">



                                                    </div>

                                                </div>
                                            </div>
                                            <!--row-->


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

            
            <div class="box-footer">
                <div class="pagination-wrapper">{!! $data->render() !!} </div>
            </div>
           
        </div>
        <!--order offer-->


    </div>
</div>
<!--pageContent-->
@endsection
@section('scripts')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('datetime/bootstrap-datetimepicker.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places&callback=init"
    type="text/javascript"></script>

{{--
<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}
<style type="text/css">
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
    .top-squares-menue .top-square.active{
        background:#fff;
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
<script type="text/javascript">
    function init(){
        
        // console.log('google loaded')
        
           
            
            
            
            
    
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
    
    
            $('.show-details').on('click', function (){
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
    
            function getLocation(id,source,destination){
                
                    var latlng = new google.maps.LatLng(52.52000659999999, 13.404953999999975);
                    var myOptions = {
                        // minZoom: 3,
                        center:latlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        disableDefaultUI: false,
                        mapTypeControl: false,
                        streetViewControl: false,
                        zoomControl:false,
                        minZoom: 9,
                        zoom:9,
                    };
                    /*var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    geocoder = new google.maps.Geocoder;
                    directionsDisplay.setMap(map);
                    calcRoute(source,destination);*/
                  
                    var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    
                    calcRoute(source,destination,map,id);
            }

            
            function calcRoute(start, end, map, id,type="order",options={},fit=false) {
                
                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode.DRIVING,
                    
                };
                directionsService.route(request, function (response, status) {

                    if (status == google.maps.DirectionsStatus.OK) {
                        //directionsDisplay.setDirections(response);
                        var directionsRenderer = new google.maps.DirectionsRenderer(options);
                        directionsRenderer.setMap(map);
                        directionsRenderer.setDirections(response);
                        

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
    
    
            $(document).on('keyup','.form-control.offer-number',function(){
                parent = $(this).parents('.one_order');
                value = $(this).val();
                second = parent.find('.order-item__slide').find('.total-offer').val(value);
    
            });
            
            $(document).on('keyup','.total-offer',function(){
                parent = $(this).parents('.one_order');
                value = $(this).val();
                second = parent.find('.order-item__content').find('.form-control.offer-number').val(value);
    
            });
    
            
            


            jQuery('.pickup').datetimepicker();


            /* button animate */


            $('.new-button-offer').on('click', function (){

                $(this).children('span').toggleClass('animate');
                $(this).parents('.order-item').siblings().find('span.animate').removeClass('animate');

            });

            

            $('.mainContent').on('click', function (m) {
                var clickOver = $(m.target);
                if (!clickOver.closest('.order-item').length) {
                    $('.new-button-offer span').removeClass('animate');
                }
            });


            
    
        };
   


    
</script>

<script type="text/javascript">
    $(function(){
        @if(Session::has('message'))
        $.notify("Success \n Payment Done Successfully \n Invoice was Sent To your Mail",{ position:"top right" ,className:"success"});
        @endif  
    });
</script>


@endsection