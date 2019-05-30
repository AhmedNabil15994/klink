@include('frontend.layouts.partials.nav2')

<link rel="stylesheet" href="{{asset('css/main_order.css')}}">
<link rel="stylesheet" href="{{asset('css/login_style.css')}}">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


<style type="text/css">
    .pay-info-wrapper .payment-iformation{
        flex: 1 0 auto;
    }
    .pay-info-wrapper .payment-form{
        flex: 1 0 auto;
        min-width: 380px;
    }

    .pay-info-wrapper{
        display: flex;
        flex-wrap: wrap;
        width: 100%;

    }
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
    .log_space .form-group .custom-span{
        position: initial;
    }
    .log_space .form-group .custom-span::before{
        /* top: -1.7rem; */
        /* left: -3.5rem; */
        font-size: 2rem;
        top: 100%;
        left: 60%;
        transform: translate(-50%,-50%);
    }
    .log_space{
        margin-top: 0;
        margin-bottom:0;
    }
    .content .step__five .compelete-button:disabled{
        background-color: #838383;
    }


    .editable-click, a.editable-click, a.editable-click:hover{
        border:none;
        color:#838383;
    }

    .btn .glyphicon{
        top:unset;
        right:unset;
        font-size:unset;
    }

    .input-append.date .add-on i, .input-prepend.date .add-on i, .input-group.date .input-group-addon span i{
        position:absolute;
        margin-top:-2.6rem;
        width: 2rem;
        height: 2.5rem;
        text-align: center;
        line-height: 2.5rem;
        padding-left:.5rem;
    }

    .input-medium{
        padding-left: 2.5rem;
        border: 1px solid #d4d4d4;
        border-radius: .2rem;
        padding-top: .5rem;
    }
    span.span-info{
        color: #777;
        font-size: 1.7rem;
        font-weight: 700;
        display: inline-block;
        width: 9rem;
    }
    span.span-info.address{
        height: 6rem;
        display: block;
        float: left;
        margin-right: .5rem;
    }
    span.span-data{
        color: #333;
        font-size: 1.5rem;
    }

    .input-medium:focus{
        outline:none;
    }

    @media (max-width:550px){
        .content .own-data li .data-title{
            margin-bottom:1rem;
        }
    }

    @media (max-width:400px){

        .editable-input .form-control{
            width:12.5rem !important;            
        }

        .input-medium{
            width:12.5rem !important;
        }

        .content .own-data li .data-value{
            word-break:break-all;
        }
    }

     @media (max-width:400px){

        .editable-buttons .btn{
            padding:.3rem .6rem !important;
        }
    }
    .valid_until{
        color:  red !important;
        font-size: 16px !important;
        font-weight: bold !important;
    }
    select.selectpicker{
        display: block !important;
    }
    .payment_method img{
        width: 70px;
        /* height: 35px; */
        height: auto !important;
    }
</style>
<div class="container">
<?php 
    $newOffer = \DB::table('offers')->where('order_id','=',$order->id)->where('is_accepted','=',1)->first();
?>
<div class="fullHeight">
    <div class="steplist">
        <div class="row">
            <div class="col-xs-12">
                <ul class="step">
                    <li id="step_list_1" class="compelete">
                        <span class="glyphicon glyphicon-scale
                        "></span>

                    </li>
                    <li  id="step_list_2" class="compelete">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </li>
                    <li  id="step_list_3" class="compelete">
                        <span class="glyphicon glyphicon-edit"></span>
                    </li>
                    <li class="active" class="" id="step_list_4">
                        <span class="glyphicon glyphicon-heart-empty"></span>
                    </li>
                    <li  id="step_list_5">
                        <span class="glyphicon glyphicon-usd"></span>
                    </li>
            </div>
        </div>
    </div>
        
    <div class="content rale">


    <div class="step_item step__four active" data-list="step_list_4">
        <div class="row">
            <div class="payment_info">

                        <div class="col-md-4">
                           
                            <div class="row col-xs-12">
                                <div class="order_info">
                                    <h4 class="order_heading">{{trans('frontend/order.order')}}</h4>
                                    <div class="order_cart">
                                        <div class="cart_img">
                                            <img src="{{asset('images/shopping_cart.png')}}" alt="cart">
                                        </div><!--cart image-->
                                        <p class="order-title">
                                            {{trans('frontend/order.order_no')}} : <br>
                                            <span>
                                                {{$order['id']}}
                                            </span>
                                        </p>
                                    </div><!--order cart-->
                                </div><!--order info-->
                            </div><!--row-->


                            <div class="row col-xs-12">
                                <div class="time_info">
                                    <div class="store">
                                        <span class="store_heading">{{trans('frontend/order.store')}}</span>
                                        <p class="store_from">{{\Carbon::parse($dates['load_from'])->format('Y-m-d')}}</p>
                                        <p class="store_to">{{\Carbon::parse($dates['load_up'])->format('Y-m-d')}}</p>
                                    </div>

                                    <div class="time_icon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </div>

                                    <div class="deliver">
                                        <span class="deliver_heading">{{trans('frontend/order.delivering')}}</span>
                                        <p class="deliver_from">{{\Carbon::parse($dates['delivery_from'])->format('Y-m-d')}}</p>
                                        <p class="deliver_to">{{\Carbon::parse($dates['delivery_until'])->format('Y-m-d')}}</p>
                                    </div>

                                </div><!--time_info-->
                            </div><!--row-->

                            <div class="row col-xs-12" style="margin-top: 2.5rem;">
                                <div class="col-xs-6" style="padding: 0;">
                                    <span class="valid_heading" style="color: #6dace6;">{{trans('frontend/order.valid_until')}}</span>
                                </div>
                                <div class="col-xs-6" style="padding: 0;">
                                    <span class="valid_until" style="color: #838383;font-size: 11px;float: right;" data-countdown='{{\Carbon::parse($dates['valid_until'])->format('Y-m-d - H:i:s')}}'></span>
                                </div>
                            </div>
                        </div><!--col-->

                        <div class="col-md-4">
                            <div class="row col-xs-12">
                                <div class="further_info">
                                    <h4 class="order_heading">{{trans('frontend/order.further_data')}}</h4>
                                    <ul class="values">
                                        <li>
                                            <span class="value_title">
                                                {{trans('frontend/order.measurement')}}
                                            </span>
                                            <span class="value">
                                                {{$order['length']}}, {{$order['width']}}, {{$order['height']}}/{{$order['weight']}}
                                            </span>
                                        </li>

                                        <li>
                                            <span class="value_title">
                                               {{trans('frontend/order.distance')}} 

                                            </span>
                                            <span class="value">
                                                {{round($order['distance'])}} Km
                                            </span>
                                        </li>

                                        <li>
                                            <span class="value_title">
                                                {{trans('frontend/order.subtotal')}} 
                                            </span>
                                            <span class="value cost">
                                                {{$order['cost']}} €
                                                <?php 
                                                    if($order->offers()->where('is_accepted',1)->count()>0){
                                                        
                                                        $cost = $order['cost'] / 1.19;
                                                        $vat = round($cost * 19/100 , 2);
                                                        $total = round($cost + $vat , 2);
                                                    }else{
                                                        $discount = round($order['cost']*$ship['discount']/100 ,2);
                                                        $after = $order['cost'] + $discount;
                                                        $cost = $order['cost'];
                                                        $vat = round($cost * 19/100 , 2);
                                                        $total = round($cost + $vat , 2);
                                                    }
                                                    

                                                ?>
                                            </span>
                                        </li>

                                        <li>
                                            <span class="value_title">
                                                {{trans('frontend/order.inc')}} :
                                            </span>
                                            <span class="value vat">
                                               {{$vat}} €
                                            </span>
                                        </li>

                                        

                                        <li>
                                            <span class="total">
                                                {{trans('frontend/order.total')}}
                                            </span>
                                            <span class="total_value">
                                               {{$total}} €
                                            </span>
                                        </li>
                                    </ul>
                                </div><!--order info-->
                            </div><!--row-->
                        </div><!--col-->

                        <div class="col-md-4">
                            <div class="payment_method">
                                @if(isset($newOffer))
                                @include('frontend.order.Ajax.payment')
                                @else
                                <h4 class="order_heading">{{trans('frontend/order.offers')}}</h4>
                                <div class="data">
                                    <ul class="values">
                                        <li>
                                            <span class="value_title">{{trans('frontend/order.name')}}</span>
                                            <span class="value_title">{{trans('frontend/order.total')}}</span>
                                            <span class="value_title">{{trans('frontend/order.action')}}</span>
                                        </li>
                                        <div class="more">
                                            @include('frontend.order.Ajax.offer')
                                        </div>
                                    </ul>    
                                </div>
                                @endif
                            </div>
                        </div><!--col-->


            </div><!--payment info-->
        </div><!--payment info row-->
        <input type="hidden" name="ship_discount" class="ship_discount" value="{{$ship->discount}}">





        <div class="row">
                    <div class="col-xs-12">
                        <button class="data-button"> 
                        <span class="but-text">
                            {{trans('frontend/order.sender_data')}}
                        </span> 
                        <span class="icon glyphicon glyphicon-menu-down
                        "></span>
                        </button>
                        <div class="slide_data">
                            <ul class="own-data">
                                <li>
                                    <span class="data-title">{{trans('frontend/order.name')}}</span>
                                    <span class="data-value"><a href="#" id="userSendergender" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['gender']}}</a> : <a href="#" id="userSendername" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['first_name']}} {{$sender['nick_name']}}</a></span>
                                </li>
                                <!--don't change this-->
                                <li>
                                    <span class="data-title">{{trans('frontend/order.address')}}</span>
                                    <span class="data-value">
                                        {{$sender['street'].' , '.$sender['home']}}<br>
                                        {{$sender['postal_code'].' , '.$sender['town']}}<br>
                                        {{$sender['country']}}
                                    </span>
                                </li>
                                <!--don't change this-->
                                <li>
                                    <span class="data-title">{{trans('frontend/order.phone')}} / {{trans('frontend/order.email')}}</span>
                                    <span class="data-value"><a href="#" id="userSenderphone" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['phone']}}</a> / <a href="#" id="userSenderemail" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['email']}}</a></span>
                                </li>
                                <input type="hidden" name="encrypted" class="encrypted" value="{{$encrypted}}">
                                @if(isset($sender['company']))
                                <li>
                                    <span class="data-title">{{trans('frontend/order.company')}}</span>
                                    <span class="data-value">{{$sender['company']}}</span>
                                </li>
                                @endif
                                
                            </ul>
                        </div><!--slide data-->
                    </div><!--col-->
        </div><!--sender data row-->

        


        <div class="row">
                    <div class="col-xs-12">
                        <button class="data-button"> 
                        <span class="but-text">
                            {{trans('frontend/order.receipt_data')}}
                        </span> 
                        <span class="icon glyphicon glyphicon-menu-down
                        "></span>
                        </button>
                        <div class="slide_data">
                            <ul class="own-data">
                                <li>
                                    <span class="data-title">{{trans('frontend/order.name')}}</span>
                                    <span class="data-value"><a href="#" id="userRecievergender" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['gender']}}</a> : <a href="#" id="userRecievername" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['first_name']}} {{$receiver['nick_name']}}</a></span>
                                </li>
                                <!--don't change that-->
                                <li>
                                    
                                    <span class="data-title">{{trans('frontend/order.address')}}</span>
                                    <span class="data-value">
                                        {{$receiver['street'].' , '.$receiver['home']}}<br>
                                        {{$receiver['postal_code'].' , '.$receiver['town']}}<br>
                                        {{$receiver['country']}}
                                    </span>
                                </li>
                                <!--don't change that-->
                                <li>
                                    <span class="data-title">{{trans('frontend/order.phone')}} / {{trans('frontend/order.email')}}</span>
                                    <span class="data-value"><a href="#" id="userRecieverphone" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['phone']}}</a> / <a href="#" id="userRecieveremail" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['email']}}</a></span>
                                </li>
                                 @if(isset($receiver['company']))
                                <li>
                                    <span class="data-title">{{trans('frontend/order.company')}}</span>
                                    <span class="data-value">{{$receiver['company']}}</span>
                                </li>
                                @endif
                            </ul>
                        </div><!--slide data-->
                    </div><!--col-->
        </div><!--recipient data row-->


        <div class="row">
                    <div class="col-xs-12">
                        <button class="data-button"> 
                        <span class="but-text">
                            {{trans('frontend/order.loading')}}
                        </span> 
                        <span class="icon glyphicon glyphicon-menu-down
                        "></span>
                        </button>
                        <div class="slide_data">
                            <ul class="own-data">
                                <li>
                                    <span class="data-title">{{trans('frontend/order.loaded_from')}}</span>
                                    <span class="data-value"><a href="#" id="loadFrom" data-type="datetime" data-pk="1" data-url="" title="Select date & time">{{\Carbon::parse($dates['load_from'])->format('Y-m-d H:i')}}</a></span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.loaded_up')}}</span>
                                    <span class="data-value"><a href="#" id="loadUp" data-type="datetime" data-pk="1" data-url="" title="Select date & time">{{\Carbon::parse($dates['load_up'])->format('Y-m-d H:i')}}</a></span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.delivery_from')}}</span>
                                    <span class="data-value"><a href="#" id="deliveryFrom" data-type="datetime" data-pk="1" data-url="" title="Select date & time">{{\Carbon::parse($dates['delivery_from'])->format('Y-m-d H:i')}}</a></span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.delivery_until')}}</span>
                                    <span class="data-value"><a href="#" id="deliveryUntil" data-type="datetime" data-pk="1" data-url="" title="Select date & time">{{\Carbon::parse($dates['delivery_until'])->format('Y-m-d H:i')}}</a></span>
                                </li>
                                
                            </ul>
                        </div><!--slide data-->
                    </div><!--col-->
        </div><!--Loading and delivery times
                    row-->


        <div class="row">
                    <div class="col-xs-12">
                        <button class="data-button"> 
                        <span class="but-text">
                                {{trans('frontend/order.ship_desc')}} :
                        </span> 
                        <span class="icon glyphicon glyphicon-menu-down
                        "></span>
                        </button>
                        <div class="slide_data">
                            <ul class="own-data">
                                <li>
                                    <span class="data-title">{{trans('frontend/order.goods_desc')}}</span>
                                    <span class="data-value"><a href="#" id="description" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$order->description}}</a></span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.car')}}</span>
                                    <span class="data-value">{{$ship->title}}</span>
                                </li>
                            </ul>
                        </div><!--slide data-->
                    </div><!--col-->
        </div><!--Shipping Description:row-->






        <!--control-->
        <input type="button" class="submit_button next" value="{{trans('frontend/order.next')}}" disabled>
        <input type="submit" class="submit_button prev" value="{{trans('frontend/order.prev')}}" style="visibility: hidden;">
        <!--controls-->
  
    </div><!--step four-->  
    


    <div class="step_item step__five" data-list="step_list_5">
            <div class="row">
                    <h3 class="step_five_heading">{{trans('frontend/order.payment_cash')}}</h3>                    
            </div><!--row-->

            <div class="row">

                    <div class="col-md-6">
                        <h4 class="billing-heading">{{trans('frontend/order.billing')}}</h4>
                        <div class="billing-content">
                            <div class="row" style="margin: 0;margin-top: 1.5rem;line-height: 1.5;">
                                <?php
                                    $biller = '';

                                    if($order->bill_to == 'sender'){
                                        $biller = \DB::table('senders')->where('order_id','=',$order->id)->first();
                                    }elseif($order->bill_to == 'receiver'){
                                        $biller = \DB::table('receivers')->where('order_id','=',$order->id)->first();
                                    }elseif($order->bill_to == 'other'){
                                        $biller = \DB::table('order_other_billings')->where('order_id','=',$order->id)->first();
                                    }

                                ?>
                                {{$biller->street.' '.$biller->home.','}}<br> 
                                {{$biller->postal_code.' '.$biller->town.','}}<br> 
                                {{$biller->country}} 
                              <p>
                                  
                              </p>
                            </div>
                        </div>
                    </div>  
                    <!--col-->

                    <div class="col-md-6">
                            <h4 class="custom-heading"></h4>
                            <p class="transfer-para">
                                {{trans('frontend/order.transfer_p')}}
                            </p>
                            <button class="compelete-button" disabled='disabled' data-toggle="modal" data-target="#payments">
                                {{trans('frontend/order.complete')}}
                            </button>

                    </div><!--col-->
                    
            </div><!--row-->

            


            




            <!--control-->
            <input type="submit" class="submit_button prev" value="{{trans('frontend/order.prev')}}">
            <input type="submit" class="submit_button invoice pull-right" value="{{trans('frontend/order.invoice')}}" disabled>
            <!--controls-->


    </div><!--step five-->

</div>    






<div id="payments" class="modal fade">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title" >{{ trans('frontend/order.payment') }}</h4>
                
            </div>    
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
                                    @include('frontend.order.Ajax.payment-form')
                            </div>
                            <div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
                                <div class="row">
                                        <div class="col-xs-12">
                                                <h4 class="billing-heading">{{trans('frontend/order.billing')}}</h4>
                                                <div class="billing-content">
                                                    <div class="row" style="margin: 0;margin-top: 1.5rem;line-height: 1.5;">
                                                        
                                                        <?php
                                                            $biller = '';
                        
                                                            if($order->bill_to == 'sender'){
                                                                $biller = \DB::table('senders')->where('order_id','=',$order->id)->first();
                                                            }elseif($order->bill_to == 'receiver'){
                                                                $biller = \DB::table('receivers')->where('order_id','=',$order->id)->first();
                                                            }elseif($order->bill_to == 'other'){
                                                                $biller = \DB::table('order_other_billings')->where('order_id','=',$order->id)->first();
                                                            }
                        
                                                        ?>
                                                        <span class="span-info">{{trans('frontend/order.company')}}</span>
                                                        
                                                        <span class="span-data company">: </span><br>

                                                        <span class="span-info">{{trans('frontend/order.name')}}</span>
                                                        <span class="creditName span-data">: {{$biller->first_name.' '.$biller->nick_name}}</span><br>
                                                        
                                                        <p>
                                                            <span class="span-info address">{{trans('frontend/order.address')}}</span>
                                                            <span class="span-data"> : 
                                                                {{$biller->street.' '.$biller->home}}<br> 
                                                                &nbsp;{{$biller->postal_code.' '.$biller->town}}<br> 
                                                                &nbsp;{{$biller->country}} 
                                                            </span>

                                                            <span class="clearfix"></span>
                                                        </p>

                                                        <span class="span-info">{{trans('frontend/order.total')}}</span>
                                                        <span class="span-data order_cost"></span>
                                                    </div>
                                                </div>
                                            </div>  
                                </div>
                            </div>
                        </div>
                </div>
                
        </div>
    </div>
</div> 

<form id="paypal" class="paypal" method="POST" action="{{route('paypal')}}">
    
    {{csrf_field()}}
    <input type="hidden" name="order_id" value="{{$order->id}}">

</form>

<div class="modal fade" tabindex="-1" role="dialog" id="commentModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Company Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Company: <span class="offer_name"></span> says :</p>
        <textarea class="form-control" readonly style="max-width: 100%; min-width: 100%; max-height: 150px; min-height: 150px;"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 



</div><!--content-->


</div><!--container-->
@include('frontend.layouts.partials.footer')
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="/plugins/card-master/jquery.card.js"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
<script src="{{asset('datetime/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('plugins/notifyjs/js/notify.js')}}"></script>




<script type="text/javascript">


    $(document).ready(function (){

        /*slide down*/
        $('#description').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_desc')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'description': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Description Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        /*sender*/
        $('#userSendergender').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_sender_gender')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'gender': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Gender Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#userSendername').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_sender_name')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'name': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Name Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#userSenderphone').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_sender_phone')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'phone': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Phone Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#userSenderemail').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_sender_email')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'email': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Email Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        /*Reciever*/
        $('#userRecievergender').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_receiver_gender')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'gender': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Gender Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#userRecievername').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_receiver_name')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'name': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Name Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#userRecieverphone').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_receiver_phone')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'phone': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Phone Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#userRecieveremail').editable({
            mode : 'inline',
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_receiver_email')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'email': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Email Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });



        $('#loadFrom').editable({
            type:'datetime',
            mode:'inline',
            format: 'yyyy-mm-dd hh:ii',
            viewformat: 'yyyy-mm-dd hh:ii',
            placement: 'right',
            datetimepicker: {
                todayHighlight: true,
                showMeridian: true,
                minuteStep: 1,
                pickerPosition: "bottom-left",
                format: 'yyyy-mm-dd hh:ii',

            },
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_load_from')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'load_from': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });



        $('#loadUp').editable({
            type:'datetime',
            mode:'inline',
            format: 'yyyy-mm-dd hh:ii',
            viewformat: 'yyyy-mm-dd hh:ii',
            placement: 'right',
            datetimepicker: {
                todayHighlight: true,
                showMeridian: true,
                minuteStep: 1,
                pickerPosition: "bottom-left",

            },
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_load_up')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'load_up': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });


        $('#deliveryFrom').editable({
            type:'datetime',
            mode:'inline',
            format: 'yyyy-mm-dd hh:ii',
            viewformat: 'yyyy-mm-dd hh:ii',
            placement: 'right',
            datetimepicker: {
                todayHighlight: true,
                showMeridian: true,
                minuteStep: 1,
                pickerPosition: "bottom-left",

            },
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_delivery_from')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'delivery_from': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
        });

        $('#deliveryUntil').editable({
            type:'datetime',
            mode:'inline',
            format: 'yyyy-mm-dd hh:ii',
            viewformat: 'yyyy-mm-dd hh:ii',
            placement: 'right',
            datetimepicker: {
                todayHighlight: true,
                showMeridian: true,
                minuteStep: 1,
                pickerPosition: "bottom-left",

            },
             success: function(response,newValue){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('edit_delivery_until')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'order_id': {{$order->id}},
                        'delivery_until': newValue,
                    },
                    success: function (data) {
                        $.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                });
            }
            
        });

    });


</script>

<script type="text/javascript">
$(function(){ 

    

    $('[data-countdown]').each(function() {
      var $this = $(this), finalDate = $(this).data('countdown');
      $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('%H:%M:%S'));
      });
    });

    $('.custom-check#remember').on('click',function(){
        if($('.custom-check#remember').is(':checked')){
            $('.compelete-button').removeAttr('disabled');
            $('#finishOrder').removeAttr('disabled');
        }else{
            $('.compelete-button').attr('disabled','true');
            $('#finishOrder').attr('disabled','true');

        }
    });


    //accordion slide data
    $('.data-button').on('click',function() {
        $(this).children('.icon').toggleClass('active');
        $(this).next('.slide_data').slideToggle();
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


    $('.prev').on('click', function (){
            $('.step_item.active').fadeOut(500, function (){
                $('#'+$(this).attr('data-list')).removeClass('active').prev().removeClass('compelete').addClass('active');
                $(this).removeClass('active').prev('.step_item').addClass('active').fadeIn(500);
            });
    });

    // function next(){
    //     $('html, body').animate({scrollTop : 0},600);
    //     $('.step_item.active').fadeOut(500, function (){
    //         $('#'+$(this).attr('data-list')).removeClass('active').addClass('compelete').next().addClass('active');
    //         $(this).removeClass('active').next('.step_item').addClass('active').fadeIn(500);
            
    //     });
    // }

    $(document).on('click','ul.payment_method a',function(e){ 
        e.preventDefault();
        $('span.span-data.order_cost').text(": "+$('span.total_value').text());
        
        if($(this).attr('id') == 'paypalImg' || $(this).attr('id') == 'sepaImg'){
            $('#paypal').submit();
        }else{
            $('.step__four .next').removeAttr('disabled');     
            /*var text = $(this).data('hidden');
            $('h4.custom-heading').text(text);
            $('#payments').modal('show')*/
            // next();
            $('#payment-form').submit();
        }

    });

        var CurrentAjaxReq = null;
        if(CurrentAjaxReq != null){
            CurrentAjaxReq.abort(); 
        }
        var refreshIntervalId = setInterval(function() {
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            CurrentAjaxReq  = $.ajax({
                type: 'POST',
                url: "/order/offers",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'order_id': "{{$order->id}}",
                },
                success: function(data) {  
                    if(data == 404){
                       window.location.href="{{route('error404')}}";
                    }
                    $('.payment_method .data .values .more').html(data);
                    CurrentAjaxReq  = null;

                    
                },
                error: function(data){
                            
                }

            });       
        }, 2500);

        @if(isset($newOffer))
            clearInterval(refreshIntervalId);
        @endif
        

        $('.accept').unbind('click');
        $(document).on('click','.accept',function(e){
            e.preventDefault();
            e.stopPropagation();

            var id = $(this).attr('value');
            var total = $(this).attr('data-val');
            var check = $(this).attr('data-check');
            var discount = $('.ship_discount').val();
            var company = $(this).data('company');
            if(check == 0){
                new_total = "{{$total}}";
            }else{
                x = parseFloat(total / 1.19).toFixed(2);
                new_vat = parseFloat(total - x).toFixed(2);
                n = parseFloat( x * ( 1 + (discount/100) )).toFixed(2);
                new_discount = parseFloat( (discount / 100 ) * n).toFixed(2);
                new_total = parseFloat(n * 1.19).toFixed(2);
            }
            

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.ajax({
                type: 'POST',
                url: "/order/offers/edit",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'order_id': "{{$order->id}}",
                    'id': id,
                    'new_total': new_total,
                },
                success: function(data) {                 
                    if(data == 0){
                        $.notify("Whoops \n Please Update Your Order Delievery Dates",{ position:"top right" ,className:"error"});
                    }else if(typeof(data) == 'string'){
                        $('.payment_method').empty();
                        $('.payment_method').html(data);
                        $('.payment_method .selectpicker').selectpicker();                    
                        if(check == 1){
                            $('.further_info .total_value').html(new_total + " €");
                            $('.further_info .cost').html(n + " €");
                            $('.further_info .discount').html(new_discount + " €");
                            $('.further_info .vat').html(new_vat + " €");
                        }

                        $('span.span-data.company').text(": "+company);

                    }

                },
                error: function(data){
                                                
                }

            });       
        });     

        $(document).on('click','.comment',function(){
            var comment = $(this).siblings('.com').val();
            var profile = $(this).siblings('.value.profile').html();
            $('.offer_name').text(profile);
            $('textarea.form-control').val(comment);
        });

       $(document).on('keyup','#nameCreditCard',function(){

            var value = $(this).val();
            $('span.creditName').text(value);

       });
});

</script>




