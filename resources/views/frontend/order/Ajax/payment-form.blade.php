<style>
    .credit-form-row{
        width: 380px;
        margin: 10px auto;
        max-width: 100%;
        box-shadow: -5px 5px 5px rgba(0, 0, 0, 0.15);
        padding: 20px;
    }
    .card-wrapper{
        margin-bottom: 1rem;
    }
    .jp-card{
        min-width: initial !important;
    }
</style>
<h4 for="card-element">
    {{trans('frontend/order.credit_or')}}
</h4>

<form action="<?= $request->getEndpoint() ?>" method="POST" id="payment-form">
    {{csrf_field()}}
    <?php foreach ($request->getRequestParameters() as $param => $value): ?>
    <input type="hidden" name="<?= $param ?>" value="<?= $value ?>"/>
    <?php endforeach ?>
    <div class="form-row credit-form-row">

        {{--
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div> --}}
        <div class="card-wrapper">
            </div>
        <div class="row">
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
            <div class="col-xs-12">
                <div class="form-group">
                    <input type="text" id="nameCreditCard" value="{{$biller->first_name}} {{$biller->nick_name}}" placeholder="{{trans('frontend/order.nameCard')}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <input type="text" id="numberCreditCard" placeholder="{{trans('frontend/order.numberCard')}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" id="expiryCreditCard" placeholder="{{trans('frontend/order.expiryCard')}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <input type="text" id="cvcCreditCard" placeholder="{{trans('frontend/order.cvcCard')}}" class="form-control">
                </div>
            </div>
        </div>
        <input type="hidden" name="order_id" id="order_id" class="order_id" value="{{$order_id}}">
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert" class="alert-danger" style="background-color: transparent;margin-top:.7rem;"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-sm-1 col-xs-1" style="padding:0;">
                    <div class="confirm-order first">
                        <div class="confirm-icon" style="border: 0;">
                            <div class="log_space" style="box-shadow: unset;border:0;background-color: transparent;min-height: 2rem;">
                                <div class="form-group">
                                    <label for="remember" class="custom-label">
                                                <input type="checkbox" class="custom-check" name="order" value="remember" id="remember">
                                                <span class="custom-span"></span>
                                            </label>
                                </div>
                                <!--form group-->
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
                    <div class="col-sm-1 col-xs-1" style="padding:0;">
                        <div class="confirm-order">
                            <div class="confirm-icon" style="border: 0;">
                                <div class="log_space" style="box-shadow: unset;border:0;background-color: transparent;min-height: 2rem;">
                                    <div class="form-group">
                                        <label for="remember2" class="custom-label">
                                                    <input type="checkbox" class="custom-check" value="remember2" id="remember2" name="data">
                                                    <span class="custom-span"></span>
                                                </label>
                                    </div>
                                    <!--form group-->
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
    <div class="content text-center" style="position: unset;margin-bottom: 0;margin-top: 0;">
        <input type="submit" name="finish"  id="finishOrder" disabled class="submit_button" value="{{trans('frontend/order.submit')}} {{trans('frontend/order.payment')}}"
            style="padding: 1rem 2rem;">
    </div>
</form>

<script>
    /*$(document).ready(function(){
        Stripe.setPublishableKey('pk_test_8Fa8ILdYgUOSaRV92DxbgFNW');
        $('#payment-form').submit(function(e){
            e.preventDefault();
    $('#errory').addClass('hidden');
    var ex_month = '';
    var ex_year = '';
    if($('#expiryCreditCard').val().split(' / ').length!==0){
        ex_month = $('#expiryCreditCard').val().split(' / ')[0]
        ex_year = $('#expiryCreditCard').val().split(' / ')[1]
    }
    Stripe.card.createToken({
        number: $('#numberCreditCard').val(),
        cvc: $('#cvcCreditCard').val(),
        exp_month: ex_month,
        exp_year: ex_year,
        // name:$('#name').val()
    }, function(status,response){
        if(response.error){
            console.log(response.error);
            $('#errory').removeClass('hidden');
            $('#errory').text(response.error.message);
        }
        else{
            console.log(response.id);
                var token = response.id;
                $('#payment-form').append($('<input type="hidden" name="stripeToken" />').val(token));
                $('#payment-form').get(0).submit();
        }
    });
return false;

});
        $('#payment-form').card({
            // a selector or DOM element for the container
            // where you want the card to appear
            container: '.card-wrapper', // *required*

            // all of the other options from above
            formSelectors: {
                numberInput: 'input#numberCreditCard', // optional — default input[name="number"]
                expiryInput: 'input#expiryCreditCard', // optional — default input[name="expiry"]
                cvcInput: 'input#cvcCreditCard', // optional — default input[name="cvc"]
                nameInput: 'input#nameCreditCard' // optional - defaults input[name="name"]
            },
           
            placeholders: {
                number: '•••• •••• •••• ••••',
                name: 'Full Name',
                expiry: '••/••',
                cvc: '•••'
            },

            masks: {
                cardNumber: '•' // optional - mask card number
            },
            // debug: true
        });
 
    })*/

</script>