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
$total = $order->cost;
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

                                    @if($type == 'pending')
                                    <div class="custom-date-field">
                                        <input type="text" id="offer-number{{$order->order_id}}" data-id="{{$order->order_id}}" class="offer-number form-control" value="{!! Helper::convNum($total) !!}" style="width: 11.3rem;margin:auto;margin-bottom: .2rem;border: 0;background: #FFF;" readonly >
                                        <span class="fas fa-euro-sign" style="right:10%;"></span>
                                    </div>

                                    <span class="countdown" data-countdown='{{\Carbon::parse($valid_until)->format(' Y-m-d - H:i:s ')}}'></span>
                                    <div class="clearfix"></div>
                                    <button class="new-button-offer button button--blue">{{trans('frontend/dashboard.details')}}
                                        <span class="fas fa-long-arrow-alt-right animate"></span>
                                    </button>
                                    <style type="text/css">
                                        .custom-date-field,
                                        .offer-number.form-control{
                                            width: 50%;
                                            display: inline-block;
                                            float: left;
                                        }
                                        .custom-date-field{
                                            margin-bottom: 1rem !important;
                                        }
                                    </style>
                                    <a href="{{route('user2.uncompleted',['id'=> \Crypt::encrypt($order->order_id)])}}" class="button button--blue">{{trans('frontend/dashboard.complete_order')}}
                                        <span class="fas fa-long-arrow-alt-right animate"></span>
                                    </a>
                                    @else
                                    <button class="new-button-offer button button--blue">{{trans('frontend/dashboard.details')}}
                                        <span class="fas fa-long-arrow-alt-right animate"></span>
                                    </button>
                                    <div class="custom-date-field">
                                        <input type="text" id="offer-number{{$order->order_id}}" data-id="{{$order->order_id}}" class="offer-number form-control" value="{!! Helper::convNum($total) !!}" style="width: 11.3rem;margin:auto;margin-bottom: .2rem;border: 0;background: #FFF;" readonly >
                                        <span class="fas fa-euro-sign" style="right:10%;"></span>
                                    </div>
                                    @endif
                                    

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