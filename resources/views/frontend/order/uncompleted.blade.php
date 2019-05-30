@include('frontend.layouts.partials.nav')

<link rel="stylesheet" href="{{asset('css/main_order.css')}}">
<link rel="stylesheet" href="{{asset('css/login_style.css')}}">

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
    .log_space .form-group .custom-span::before{
        top: -2.4rem;
        left: -2.7rem;
        font-size: 2rem;
    }
    .content .step__five .compelete-button:disabled{
        background-color: #838383;
    }
    .valid_until{
        color:  red !important;
        font-size: 16px !important;
        font-weight: bold !important;
    }
    select.selectpicker{
        display: block !important;
    }
    /*
    .payment_method img{
        width: 70px;
        height: 35px;
        filter: grayscale(1) !important;
        -webkit-filter: grayscale(1) !important; 
        -moz-filter: grayscale(1) !important;
        transition:all .5s ease-in-out !important;
    }
    .payment_method img:hover{
        filter: none;
        filter: grayscale(0);
        -webkit-filter: grayscale(0);
        -moz-filter: grayscale(0);
    }*/
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

                                                    $discount = round($order['cost']*$ship['discount']/100 ,2);
                                                    $after = $order['cost'] + $discount;
                                                    $cost = $order['cost'];
                                                    $vat = round($cost * 19/100 , 2);
                                                    $total = round($cost + $vat , 2);

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
                                    <span class="data-value">{{$sender['gender']}} : {{$sender['first_name']}} {{$sender['nick_name']}}</span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.address')}}</span>
                                    <span class="data-value">
                                        {{$sender['street'].' , '.$sender['home']}}<br>
                                        {{$sender['postal_code'].' , '.$sender['town']}}<br>
                                        {{$sender['country']}}
                                    </span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.phone')}} / {{trans('frontend/order.email')}}</span>
                                    <span class="data-value">{{$sender['phone']}} / {{$sender['email']}}</span>
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
                                    <span class="data-value">{{$receiver['gender']}}  : {{$receiver['first_name']}} {{$receiver['nick_name']}}</span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.address')}}</span>
                                    <span class="data-value">
                                        {{$receiver['street'].' , '.$receiver['home']}}<br>
                                        {{$receiver['postal_code'].' , '.$receiver['town']}}<br>
                                        {{$receiver['country']}}
                                    </span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.phone')}} / {{trans('frontend/order.email')}}</span>
                                    <span class="data-value">{{$receiver['phone']}} / {{$receiver['email']}}</span>
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
                                    <span class="data-value">{{\Carbon::parse($dates['load_from'])->format('Y-m-d H:i')}}</span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.loaded_up')}}</span>
                                    <span class="data-value">{{\Carbon::parse($dates['load_up'])->format('Y-m-d H:i')}}</span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.delivery_from')}}</span>
                                    <span class="data-value">{{\Carbon::parse($dates['delivery_from'])->format('Y-m-d H:i')}}</span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.delivery_until')}}</span>
                                    <span class="data-value">{{\Carbon::parse($dates['delivery_until'])->format('Y-m-d H:i')}}</span>
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
                                    <span class="data-value">{{$order->description}}</span>
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
            <input type="submit" class="submit_button invoice pull-right" value="{{trans('frontend/order.invoice')}}" disabled>
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
                    <form action="/payment" method="POST" id="payment-form">
                        {{csrf_field()}}
                      <div class="form-row">
                        <h4 for="card-element">
                          {{trans('frontend/order.credit_or')}}
                        </h4>
                        <div id="card-element">
                          <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <input type="hidden" name="order_id" id="order_id" class="order_id" value="{{$order_id}}">
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
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>

<script src="https://js.stripe.com/v3/"></script>


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
        }else{
            $('.compelete-button').attr('disabled','true');

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

    function next(){
        $('html, body').animate({scrollTop : 0},600);
        $('.step_item.active').fadeOut(500, function (){
            $('#'+$(this).attr('data-list')).removeClass('active').addClass('compelete').next().addClass('active');
            $(this).removeClass('active').next('.step_item').addClass('active').fadeIn(500);
            
        });
    }

    
	$(document).on('click','ul.payment_method a',function(e){ 
        e.preventDefault();
        if($(this).attr('id') == 'paypalImg' || $(this).attr('id') == 'sepa'){
            $('#paypal').submit();
        }else{
            $('.step__four .next').removeAttr('disabled');     
            var text = $(this).data('hidden');
            $('h4.custom-heading').text(text);
            next();
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
            clearInterval(refreshIntervalId);
            var id = $(this).attr('value');
            var total = $(this).attr('data-val');
            var check = $(this).attr('data-check');
            var discount = $('.ship_discount').val();
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

       
});

</script>

<script type="text/javascript">
    // Create a Stripe client.
    var token1  = '';
    var stripe = Stripe('pk_test_ss76E7LtzKg0fcikDfQPYnge');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        lineHeight: '1.8rem',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
    });
    function stripeTokenHandler(token) {
        //console.log(token);
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      //form.submit();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/payment",
            type: 'POST',
            data: {
                '_token': $('input[name="_token"]').val(),
                'order_id': "{{$order->id}}",
                'stripeToken': token.id,
                
            } ,
            success: function (data) {
                if (isNaN(data)){
                    $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                    });      
                }else{   
                    $.notify("Success \n Payment Done Successfully",{ position:"top right" ,className:"success"});
                    $('#payments,.modal-backdrop').hide();
                    $('.fade.in').removeClass('in');
                    $('body').removeClass('modal-open');
                    $('body').css('paddingRight','0');
                    $('.step__five .prev').attr('disabled','disabled');
                    $('.step__five .invoice').removeAttr('disabled');
                }    
            },        
            error: function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
            }

        });

    }

</script>


