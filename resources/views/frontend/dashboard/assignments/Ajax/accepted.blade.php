@foreach($data as $order)
<!--results row-->
<?php
$sender;
$reciver;
$dates = \DB::table('order_dates')->where('order_id', '=', $order->order_id)->first();
$send_receive = \DB::table('order_send_receives')->where('order_id', '=', $order->order_id)->first();
$other = \DB::table('order_other_billings')->where('order_id','=',$order->order_id)->first();
$relation = \App\Models\Frontend\CompanyOrderVehicles::where('order_id',$order->order_id)->where('user_id',$order->user_id)->first();
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

$company_order_dates = \DB::table('company_order_dates')->where('user_id','=',$order->user_id)->where('order_id','=',$order->order_id)->first();


$load_from = '';
if (empty($company_order_dates->start)) {
    $load_from = $dates->load_from;
} else {
    $load_from = $company_order_dates->start;
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
if (empty($company_order_dates->end)) {
    $delivery_until = $dates->delivery_until;
} else {
    $delivery_until = $company_order_dates->end;
}

$order_load_time = '';
if (empty($company_order_dates->load_up)) {
    $order_load_time = $order->time;
} else {
    $order_load_time = $company_order_dates->load_up;
}

$valid_until = '';
if (empty($dates->valid_until)) {
    $valid_until = '';
} else {
    $valid_until = $dates->valid_until;
}
?>
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
    }
    .load-items{
        text-align: left;
    }
    .select-car .row{
        margin: 0;
    }
    .order-offer .results .order-item__content{
        margin-bottom: 0;
    }    
    .new-data p.important-item{
        margin-bottom: .5rem;
    }
    p.important-item img{
        width: 70px !important;
        height: 40px !important;
        min-height: 35px !important;
        filter: none !important;
        filter: grayscale(0) !important;
        -webkit-filter: grayscale(0) !important;
        -moz-filter: grayscale(0) !important;
        cursor: pointer;
        margin-bottom: .5rem;
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
    .order-offer .results .order-item__content .order-details .float-left.address{
        margin-left: 5px;
    }
    .order-offer .results .order-item.complete{
        border: 0;
        padding: 0;
    }
    .order-offer .results .order-item.complete .order-operation .button--blue{
        display: unset;
    }
    .order-offer .results .order-item__content .order-operation{
        height: auto;
    }
</style>
<!--one result item-->
<!--order item-->
<div class="order-item complete" id="order-item-{{$order->order_id}}">

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
                            <div class="col-md-3 col-xs-12">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-xs-12" style="padding-right: 0;">
                                            <!--source details-->
                                            <div class="order-details clearfix">
                                                <div class="float-left date">
                                                    {{Carbon::parse($load_from)->format('Y-m-d H:i')}}
                                                </div>
                                                <div class="float-left date">
                                                    {{Carbon::parse($delivery_until)->format('Y-m-d H:i')}}
                                                </div>
                                            </div>
                                            <!--source details-->
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
                                            $vec = \App\Models\Frontend\CompanyOrderVehicles::where('order_id',$order->order_id)->first();
                                            
                                            if($vec){
                                                $vec_data = \App\Models\Frontend\Vehicle::find($vec->vehicle_id);
                                                $ship = \App\Models\Backend\Shipping::find($vec_data->ship_id);
                                                $driver = \App\Models\Frontend\Driver::where('company_id',$vec->user_id)->where('vehichle_id',$vec_data->id)->first();
                                                $driver_profile = \App\Models\Frontend\Profile::find($driver->profile_id);
                                                
                                            }else{
                                                $ship = \App\Models\Backend\Shipping::find($order->ship_id);    
                                            }     

                                            ?>

                                            @if($vec)
                                            <img src="/images/shippings/{{$ship->img}}" alt="{{$ship->title}}">
                                            {{$ship->title}}
                                            <div class="col-xs-12" id="DriverInfo{{$order->order_id}}">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="load-info custom-style55">
                                                            <div class="load-items">              
                                                                <p class="load-para-sub-2 pull-left">
                                                                    <i class="fas fa-user-tie"></i>
                                                                    @if($driver_profile)
                                                                    <span class="name">{{$driver_profile->name()}}</span>
                                                                    @endif
                                                                </p>

                                                                <p class="load-para-sub-2 pull-right">
                                                                    <i class="fas fa-phone"></i>
                                                                    @if($driver_profile)
                                                                    <span class="phone">{{$driver_profile->phone}}</span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <img src="/images/shippings/{{$ship->img}}" alt="{{$ship->title}}">
                                            {{$ship->title}}
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--first column-->


                            <!--second column-->
                            <div class=" col-md-3 col-sm-6">

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
                                            {{$order_load_time}} {{trans('frontend/makeoffer.minutes')}}
                                        </span>
                                    </p>

                                    <p class="important-item">
                                        <i class="icon-important fas fa-prescription-bottle"></i>

                                        {{trans('frontend/order.desc')}} : 
                                        <span>{{$order->description}}</span>
                                    </p>

                                </div>
                            </div>
                            <!--second column-->

                            <!--third column-->
                            <div class="col-md-3 col-sm-6 new-data">
                                <div class="order-important-info">
                                    @if(!isset($relation->pick_up_done))
                                    <p class="important-item">
                                        <span>{{trans('frontend/order.sender')}} : </span>
                                    </p>
                                    <p class="important-item">
                                        <i class="icon-important fas fa-user-tie"></i>
                                        {{$sender->first_name.' '.$sender->nick_name}} 
                                    </p>
                                    <p class="important-item">
                                        <i class="icon-important fas fa-phone"></i>
                                        {{$sender->phone}}
                                    </p>
                                    <i class="icon-important pull-left fas fa-map-marker-alt"></i>
                                    <p class="important-item pull-left">
                                        {{$sender->street.' '.$sender->home}}<br>
                                        {{$sender->postal_code.' '.$sender->town}}<br>
                                        {{$sender->country}}
                                    </p><br>
                                    <div class="clearfix"></div>
                                    @else
                                    <p class="important-item">
                                        <span>{{trans('frontend/order.receiver')}} : </span>
                                    </p>
                                    <p class="important-item">
                                        <i class="icon-important fas fa-user-tie"></i>
                                        {{$receiver->first_name.' '.$receiver->nick_name}} 
                                    </p>
                                    <p class="important-item">
                                        <i class="icon-important fas fa-phone"></i>
                                        {{$receiver->phone}}
                                    </p>
                                    <i class="icon-important pull-left fas fa-map-marker-alt"></i>
                                    <p class="important-item pull-left">
                                        {{$receiver->street.' '.$receiver->home}}<br>
                                        {{$receiver->postal_code.' '.$receiver->town}}<br>
                                        {{$receiver->country}}
                                    </p><br>
                                    <div class="clearfix"></div>
                                    @endif
                                </div>  
                            </div>
                            <!--third column-->

                            <!--fourth column-->
                            <div class=" col-md-3 col-sm-12">
                                <div class="order-operation">
                                    <div class="row" style="margin: 0;">
                                        <p class="important-item" style="color: rgba(0, 0, 0, 0.4);">
                                            @if($order->payment_type == 'bar')
                                            {{trans('frontend/order.payment')}}

                                            <img class="pull-right" src="{{asset('images/bar.svg')}}" alt="bar">
                                            @endif    
                                        </p>
                                    </div>

                                    @if($order->bill_to == 'receiver' && !isset($relation->take_money))

                                    <div class="rows">
                                        <p class="important-item" style="color: rgba(0, 0, 0, 0.4);">
                                            <span>{{trans('frontend/order.bill_to')}} : </span>
                                        </p>
                                        <p class="important-item">
                                            <i class="icon-important fas fa-user-tie" style="color: rgba(0, 0, 0, 0.4)"></i>
                                            {{$receiver->first_name.' '.$receiver->nick_name}} 
                                        </p>
                                        
                                        <div class="clearfix"></div>
                                    </div>

                                    @elseif($order->bill_to == 'other' && !isset($relation->take_money))

                                    <div class="rows">
                                        <p class="important-item" style="color: rgba(0, 0, 0, 0.4);">
                                            <span>{{trans('frontend/order.bill_to')}} : </span>
                                        </p>
                                        <p class="important-item">
                                            <i class="icon-important fas fa-user-tie" style="color: rgba(0, 0, 0, 0.4)"></i>
                                            {{$other->first_name.' '.$other->nick_name}} 
                                        </p>
                                        
                                        <div class="clearfix"></div>
                                    </div>

                                    @endif

                                    <div class="row" style="margin: 0;">
                                        <p class="important-item" style="color: rgba(0, 0, 0, 0.4);">
                                            {{trans('frontend/dashboard.total')}}
                                            <span class="pull-right" style="margin-right: .5rem;">
                                                {!! Helper::convNum($total) !!}
                                                <span class="fas fa-euro-sign"></span>
                                            </span>
                                        </p>
                                    </div>


                                    @if($order->confirmed == 0 && $order->payment_type == 'bar')

                                    <button class="new-button-offer confirm button button--blue" data-value="{{$order->order_id}}">{{trans('frontend/dashboard.confirm')}}
                                        <span class="fas fa-long-arrow-alt-right animate"></span>
                                    </button>

                                    @elseif($order->payment_type != 'bar' || $order->confirmed == 1)
                                        @if($order->bill_to == 'receiver' || $order->bill_to == 'other')

                                            @if(isset($relation->pick_up_done))
                                            <div style="color: rgba(0, 0, 0, 0.4);">
                                                <label class="pull-left">{{trans('frontend/dashboard.pick_up_done')}}</label>
                                                <label class="pull-left">{{Carbon::parse($relation->pick_up_done)->format('d M, Y - h:i a')}}</label>
                                            </div>
                                            @endif

                                            @if(!isset($relation->take_money))
                                            <button class="take_money button button--blue" data-value="{{$order->order_id}}" data-kind="take_money">{{trans('frontend/dashboard.take_money')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>
                                            @endif

                                            @if(!isset($relation->pick_up))
                                            <button class="pick_up button button--blue" data-value="{{$order->order_id}}" data-kind="pick_up">{{trans('frontend/dashboard.pick_up')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @elseif(!isset($relation->pick_up_done))
                                            <button class="pick_up_done button button--blue" data-value="{{$order->order_id}}" data-kind="pick_up_done">{{trans('frontend/dashboard.pick_up_done')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @elseif(!isset($relation->to_destination))
                                            <button class="to_destination button button--blue" data-value="{{$order->order_id}}" data-kind="to_destination">{{trans('frontend/dashboard.to_destination')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @else
                                            <button class="delievered button button--blue" data-value="{{$order->order_id}}">{{trans('frontend/dashboard.delievered')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>
                                            
                                            @endif
                                        
                                        @else

                                            @if(isset($relation->pick_up_done))
                                            <div style="color: rgba(0, 0, 0, 0.4);">
                                                <label class="pull-left">{{trans('frontend/dashboard.pick_up_done')}}</label>
                                                <label class="pull-left">{{Carbon::parse($relation->pick_up_done)->format('d M, Y - h:i a')}}</label>
                                            </div>
                                            @endif

                                            @if(!isset($relation->take_money))
                                            <button class="take_money button button--blue" data-value="{{$order->order_id}}" data-kind="take_money">{{trans('frontend/dashboard.take_money')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @elseif(!isset($relation->pick_up))
                                            <button class="pick_up button button--blue" data-value="{{$order->order_id}}" data-kind="pick_up">{{trans('frontend/dashboard.pick_up')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @elseif(!isset($relation->pick_up_done))
                                            <button class="pick_up_done button button--blue" data-value="{{$order->order_id}}" data-kind="pick_up_done">{{trans('frontend/dashboard.pick_up_done')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @elseif(!isset($relation->to_destination))
                                            <button class="to_destination button button--blue" data-value="{{$order->order_id}}" data-kind="to_destination">{{trans('frontend/dashboard.to_destination')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>

                                            @else
                                            <button class="delievered button button--blue" data-value="{{$order->order_id}}">{{trans('frontend/dashboard.delievered')}}
                                                <span class="fas fa-long-arrow-alt-right animate"></span>
                                            </button>
                                            
                                            @endif
                                        @endif
                                        

                                    @endif



                                    <input type="hidden" name="source" class="source" value="{{$order->source}}">
                                    <input type="hidden" name="destination" class="destination" value="{{$order->destination}}">
                                    <input type="hidden" name="id" class="id" value="{{$order->order_id}}">
                                </div>
                            </div>
                            <!--fourth column-->

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



