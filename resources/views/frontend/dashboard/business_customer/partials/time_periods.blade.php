<div class="col-lg-4 col-md-12">
    <!--new order content-->
    <div class="new-order-content time_period" style="padding-top:3rem;width:100%;">
        <ul class="top-squares-menue">
            <li class="top-square new-make-offer">
                Time & Period
            </li>
        </ul>
        
        <div class="custom-class enter-offer">
            @php
                $payment = $tour->calculations()->where('type',1)->first();
                $account = $tour->calculations()->where('type',0)->first();
                $cancellation = $tour->calculations()->where('type',3)->first();
                $test = $tour->calculations()->where('type',2)->first();
            @endphp
            <!--second row-->
            <div class="row main">
                <div class="col-xs-12 col-sm-6">
                    @if($tour->tour_dates && $payment)
                    <div class="row">
                        <fieldset class="payment">
                            <legend class="order-heading">Payment</legend>
                            <span class="pull-left">Time </span>
                            <span class="pull-right time">{{$payment->determineTime()}}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Period</span>
                            <span class="pull-right period text-right">{!! $payment->determinePeriod() !!}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Day </span>
                            <span class="pull-right day">{{$tour->tour_dates->payment_speak_day}}</span>
                            <div class="clearfix"></div>
                        </fieldset>
                    </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-6">
                    @if($tour->tour_dates && $account)
                    <div class="row">
                        <fieldset class="account">
                            <legend class="order-heading">Accounting</legend>
                            <span class="pull-left">Time </span>
                            <span class="pull-right time">{{$account->determineTime()}}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Period </span>
                            <span class="pull-right period text-right">{!! $account->determinePeriod() !!}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Day </span>
                            <span class="pull-right day">{{$tour->tour_dates->account_speak_day}}</span>
                            <div class="clearfix"></div>
                        </fieldset>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row main">
                <div class="col-xs-12 col-sm-6">
                    @if($tour->tour_dates && $cancellation)
                    <div class="row">
                        <fieldset class="cancellation">
                            <legend class="order-heading">Cancellation</legend>
                            <span class="pull-left">Time </span>
                            <span class="pull-right time">{{$cancellation->determineTime()}}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Period </span>
                            <span class="pull-right period text-right">{!! $cancellation->determinePeriod() !!}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Day </span>
                            <span class="pull-right day">{{$tour->tour_dates->cancellation_speak_day}}</span>
                            <div class="clearfix"></div>
                        </fieldset>
                    </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-6">
                    @if($tour->tour_dates && $test)
                    <div class="row">
                        <fieldset class="test">
                            <legend class="order-heading">Test</legend>
                            <span class="pull-left">Time </span>
                            <span class="pull-right time">{{$test->determineTime()}}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Period </span>
                            <span class="pull-right period text-right">{!! $test->determinePeriod() !!}</span>
                            <div class="clearfix"></div>
                            <span class="pull-left">Day </span>
                            <span class="pull-right day">{{$tour->tour_dates->test_speak_day}}</span>
                            <div class="clearfix"></div>
                        </fieldset>
                    </div>
                @endif
                </div>
            </div>
            <!--second row-->
        </div>

    </div>
    <!--new order content-->
</div>