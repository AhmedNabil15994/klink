        <div class="row">
            
                    <div class="payment_info">

                        <div class="col-md-4">
                           
                            <div class="row col-xs-12">
                                <div class="order_info">
                                    <h4 class="order_heading">{{trans('frontend/order.order')}}</h4>
                                    <div class="order_cart">
                                        <div class="cart_img">
                                            <img src="images/shopping_cart.png" alt="cart">
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
                        <input type="hidden" name="encrypted" class="encrypted" value="{{$encrypted}}">
                        <div class="col-md-4">
                            <div class="payment_method">
                                <h4 class="order_heading">{{trans('frontend/order.offers')}}</h4>
                                <div class="data">
                                    <ul class="values">
                                        <li>
                                            <span class="value_title">{{trans('frontend/order.name')}}</span>
                                            <span class="value_title">{{trans('frontend/order.total')}}</span>
                                            <span class="value_title">{{trans('frontend/order.action')}}</span>
                                        </li>
                                        <div class="more">
                                            
                                        </div>
                                    </ul>    
                                </div>
                            </div>
                        </div><!--col-->


                    </div><!--payment info-->

        </div><!--payment info row-->
        <input type="hidden" name="ship_discount" class="ship_discount" value="{{$ship['discount']}}">
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
                                    <span class="data-value">{{$order['description']}}</span>
                                </li>
                                <li>
                                    <span class="data-title">{{trans('frontend/order.car')}}</span>
                                    <span class="data-value">{{$ship['title']}}</span>
                                </li>
                            </ul>
                        </div><!--slide data-->
                    </div><!--col-->
        </div><!--Shipping Description:row-->






        <!--control-->
        <input type="button" class="submit_button next" value="{{trans('frontend/order.next')}}" disabled>
        <input type="submit" class="submit_button prev" value="{{trans('frontend/order.prev')}}">
        <!--controls-->

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



<script src="js/main_order.js"></script>
<script src="js/main_order2.js"></script>
<script src="{{asset('js/jquery.countdown.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('[data-countdown]').each(function() {
          var $this = $(this), finalDate = $(this).data('countdown');
          $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('%D days %H:%M:%S'));
          });
        });
    });
</script>
