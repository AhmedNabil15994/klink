<h4 class="order_heading">{{trans('frontend/order.payment')}}</h4>

<ul class="payment_method new_payment_method">
    <div class="disable select_this">
    
    </div>
    <li>
        <a href="#" id="paypal">
            <img src="/images/paypal.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="visa">
            <img src="/images/visa.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="master_card">
            <img src="/images/master.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="maestro">
            <img src="/images/maestro.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="klarna">
            <img src="/images/klarna.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="sofort">
            <img src="/images/sofort.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="sepa">
            <img src="/images/sepa.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="vorkasse">
            <img src="/images/vorkasse.svg" alt="">
        </a>
    </li>
    <li>
        <a href="#" id="bar">
            <img src="/images/bar.svg" alt="">
        </a>
    </li>
    
</ul>

<div class="row col-xs-12" style="margin-top: 1.5rem;">
    <div class="col-xs-8" style="padding: 0;">
        <span class="valid_heading" style="color: #6dace6;">{{trans('frontend/order.valid_until')}}</span>
    </div>
    <div class="col-xs-4" style="padding: 0;">
        <span class="valid_until" style="color: #838383;font-size: 11px;float: right;" data-countdown='{{\Carbon::parse($dates['valid_until'])->format('Y-m-d - H:i:s')}}'></span>
    </div>
</div>

<div class="row step__five">
    <div class="col-xs-12">
        <div class="row col-xs-2" style="margin-bottom: 1rem;">   
                        
            <input type="checkbox" name="type" id="one" class="icheckbox_flat">

        </div>  
        <div class="col-xs-10">
            <span class="confirm-head">
                {{trans('frontend/order.confirm_order')}}
            </span>
            <p>{{trans('frontend/order.accept1')}} : <a href="{{URL::to('/terms')}}">{{trans('frontend/order.data_confirm')}}</a></p>
        </div>   
    </div>
</div>


