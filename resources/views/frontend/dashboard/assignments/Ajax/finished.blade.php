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
$offer = \DB::table('offers')->where('user_id','=',$order->user_id)->where('order_id','=',$order->order_id)->where('is_accepted','=',1)->first();
$total = $offer->total;
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
<style type="text/css">
    .order-offer .results .order-item__content .order-operation{
        height: auto;
    }
    .order-item .order-item__content .order-important-info{
        border-left: 0;
        padding-left: 0;
    }
    .col-md-5.col-sm-6{
        padding-top: .5rem;
    }
    .col-md-5.col-sm-6:nth-of-type(2){
        border-left: 1px solid rgba(0, 0, 0, 0.2);
        padding-right: 0;
    }
    .order-operation .custom-date-field{
        width: auto;
    }
    .order-offer .results .order-item__content .order-details .float-left.date{
        width: auto;
    }
</style>
<!--one result item-->
<!--order item-->
<div class="order-item two" id="order-item-{{$order->order_id}}">

    <div class="col-lg-12 col-md-12">
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
                            <div class="col-md-5 col-sm-6">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <!--source details-->
                                            <div class="order-details clearfix">
                                                <div class="float-left date">
                                                    {{Carbon::parse($load_from)->format('M d, Y')}}
                                                </div>
                                                <div class="float-left icon">
                                                    <span class="fas fa-map-marker-alt"></span>
                                                </div>
                                                <div class="float-left address" id="from{{$order->order_id}}">
                                                   {{$order->source}}
                                                </div>
                                            </div>
                                            <!--source details-->
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                            <!--first column-->


                            <!--second column-->
                            <div class=" col-md-5 col-sm-6">

                                <!--important informaion-->
                                <div class="order-important-info">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <!--destination details-->
                                            <div class="order-details clearfix">
                                                <div class="float-left icon">
                                                    <span class="fas fa-map-marker-alt"></span>
                                                </div>
                                                <div class="float-left address" id="to{{$order->order_id}}">
                                                    {{$order->destination}}
                                                </div>
                                            </div>
                                            <!--destination details-->

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--second column-->

                            <!--third column-->
                            <div class=" col-md-2 col-sm-6">
                                <div class="order-operation">
                                    <div>
                                        <?php 
                                            if($order->paid == $order->cost){
                                                $class = 'primary';
                                                $word  = trans('frontend/order.paid');
                                            }else{
                                                $class = 'danger';
                                                $word  = trans('backend/bills.unpaid');
                                            }
                                        ?>
                                        <label class="pull-left">{{trans('frontend/dashboard.status')}} : </label>
                                        <label class="pull-right label label-{{$class}}">{{$word}}</label>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="custom-date-field">
                                        <input type="text" id="offer-number{{$order->order_id}}" data-id="{{$order->order_id}}" class="offer-number form-control" value="{!! Helper::convNum($total) !!}" style="width: 11.3rem;margin:auto;margin-bottom: .2rem;border: 0;background: #FFF;" readonly >
                                        <span class="fas fa-euro-sign" style="right:10%;"></span>
                                    </div>
                                    

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

        

           
    </div>


</div>
<!--order item-->
<!--one result item-->

@endforeach