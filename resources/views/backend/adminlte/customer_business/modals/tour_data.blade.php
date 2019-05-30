<style type="text/css">
    
    .new-order-page .new-order-card{
        max-width: 100%;
        margin: 0;
    }
    
    .order-important-info .important-item{
      cursor: pointer;
    }
    .order-important-info .important-item p {
      display: inline-block;
    }
    .order-important-info .icon-important{
      display: inline-block;
      margin-right: 1rem;
      color:rgba(0, 0, 0, 0.4);
      font-size: 1.6rem;
      width: 2.2rem;

    }

    .order-important-info p span{
      text-transform: capitalize;
      font-size: 1.3rem;
    }
    .order-important-info p span.title{
        color: #9B9DB8 !important;
    }
    .order-important-info p span.additional{
        color: #666 !important;
    }
    .order-location .row,
    .order-pickup .row{
        margin-bottom: 0;
    }
    span.order-heading{
        font-weight: 600 !important;
        color: #555 !important;
        cursor: pointer !important;
        font-size: 16px !important;
    }
    .order-pickup p{
        margin-bottom: 0;
    }
    hr{
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .order-important-info.col-xs-12{
        margin-bottom: 0 !important;
    }
    span.additional img{
        width: 70px !important;
        height: 25px !important;
        min-height: 25px !important;
        cursor: pointer;
        margin-bottom: 5px;
    }
    .order-heading.text-left {
        text-align: left !important;
    }
    span.back {
        background: url({{ asset('/img/box.png') }});
        background-size: 20px 20px;
        background-repeat: no-repeat;
        width: 20px;
        height: 20px;
        display: inline-block !important;
        min-width: 20px !important;
    }
    .order-important-info p span.additional.label{
        color: #FFF !important;
    }
    .new-order-page .new-order-card .card-main-content .order-location .custom-block span.valid_until{
        text-align: center;
        max-width: 65px;
    }
    .order-heading.text-left{
        color: #9B9DB8 !important;
    }
    .order-location{
        margin-top: 10px;
    }
    .new-order-page .new-order-card .card-main-content .order-location .order-heading{
        margin-bottom: 10px;
    }
    .new-order-page .new-order-card .card-main-content .order-card-id.pull-right{
        padding: 0 5px;
    }
    .order-location .col-xs-12{
        padding-right: 0 !important;
    }
    .company_order_vecs{
        padding-right: 5px !important;
        border-right: 1px solid #EEE;
    }
    .company_order_vecs .car-block .car-img{
        width: 50px;
        height: 36px;
        margin-right: 5px;
        margin-bottom: 10px;
    }
    .company_order_vecs .car-block .car-img img.image2{
        width: 100%;
        height: 100%;
    }
    .company_order_vecs .car-block .car-name2{
        margin-top: 8px;
        color: #666;
    }
    .company_order_vecs .car-block .col-xs-12{
        padding: 0;
    }
    .company_order_vecs .car-block .col-xs-12 p i {
        color: #2933EA;
        font-size: 13px;
        margin-right: 5px;
    }
    .order-important-info.company_order_steps span.additional,
    .order-important-info.company_order_steps span.title{
        margin-bottom: 0 !important;
    }
    .order-important-info.company_order_steps span.order-heading{
        margin-bottom: -1px !important;
    }
    a.next-button{
        -webkit-align-self: flex-end;
        -ms-flex-item-align: end;
        align-self: flex-end;
        text-decoration: underline;
        color: #FFF;
        font-weight: 600;
    }
    .new-order-page .new-order-card .card-main-content .order-location .order-deliver .icon-me.pull-left,
    .new-order-page .new-order-card .card-main-content .order-location .order-pickup .icon-me.pull-left{
        font-size: 15px !important;
        margin-right: 10px !important;
    }
    fieldset{
        border: 1px solid #DDD;
        border-radius: 5px;
        padding: 5px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        margin-bottom: 10px;
    }
    fieldset legend{
        text-align: left !important;
        color: #9B9DB8 !important;
        font-size: 14px !important;
        border: 0 !important;
        margin-bottom: 5px;
    }
    fieldset ul.days{
        list-style-type: none;
        padding: 0;
        margin-bottom: 0;
    }
    fieldset ul.days li{
        width: 25px;
        height: 25px;
        border: 2px solid #000;
        border-radius: 50%;
        float: left;
        margin-right: 5px;
        text-align: center;
        font-size: 12px;
        font-weight: 600;
        padding-top: 3px;
        margin-bottom: 5px;
        cursor: pointer;
        background-color: #000;
        color: #FFF;
        border: 2px solid #94140e;
    }
    span.auto-type{
        width: 50%;
    }
    .new-order-page .new-order-card .card-main-content .order-location .custom-block .car-block .car-img{
            flex-basis: 100% !important;
            -webkit-flex-basis: 100% !important;
            -ms-flex-preferred-size: 100% !important;
    }
    .new-order-page .new-order-card .card-sec-content.active{
        overflow: hidden;
        overflow-y: auto;
    }

    td.details-control {
        background: url("{{asset('images/details_open.png')}}") no-repeat center center;
        cursor: pointer;
        padding:10px !important;
    }
    tr.shown td.details-control {
        background: url("{{asset('images/details_close.png')}}") no-repeat center center;
    }
    #offers td img{
        width: 50px;
    }
    @media(max-width: 991px){
        .load-para-sub-2.pull-right{
            padding-right: 5px;
        }
    }
</style>

<div id="tour-data" class="modal fade rale" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tour Number <span class="tour_number"></span></h4>
            </div>
            <div class="modal-body">
                <div class="new-order-page">
                    <div class="col-xs-12">

                        <div class="new-order-card">

                            <div class="card-main-content">

                                <div class="order-card-id tour_number pull-left">

                                </div>
                                <div class="order-card-id pull-right">
                                    <a href="#" class="next-button">{{trans('frontend/order.next')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="order-location">
                                    
                                     


                                    <div class="row" style="margin-right: 0;">
                                        
                                        <div class="col-xs-12 col-sm-6">
                                            <fieldset>
                                                <legend class="order-heading">
                                                        Tour Details
                                                </legend>
                                                <div class="order-pickup">

                                                    <span class="pull-left">Tour Name</span>
                                                    <span class="tour_name pull-right">Test</span>
                                                    <div class="clearfix"></div>

                                                    <span class="pull-left">Tour Price</span>
                                                    <span class="tour_price pull-right">500 €</span>
                                                    <div class="clearfix"></div>

                                                    <span class="pull-left">Tour Type</span>
                                                    <span class="tour_type pull-right">Tour Per Stop</span>
                                                    <div class="clearfix"></div>
                                                    
                                                    <span class="pull-left">Packets Number</span>
                                                    <span class="packet_number pull-right">13 Packet</span>
                                                    <div class="clearfix"></div>

                                                    <span class="pull-left">Tour Stops Type</span>
                                                    <span class="tour_stop_type pull-right">Static</span>
                                                    <div class="clearfix"></div>

                                                    <span class="pull-left">Tour Person</span>
                                                    <span class="tour_person pull-right">Ahmed Nabil (User)</span>
                                                    <div class="clearfix"></div>

                                                    <span class="pull-left auto-type">{{trans('frontend/order.car')}}</span>
                                                    <div class="custom-block car">
                                                        <div class="car-block pull-right">
                                                            <div class="car-img">
                                                                <img class="image" src="{{asset('images/shippings/1536474535.jpg')}}" alt="car">
                                                            </div>
                                                            <div class="car-name">
                                                                PKW
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <span class="pull-left">Tour Description</span>
                                                    <span class="tour_desc pull-right">Description</span>
                                                    <div class="clearfix"></div>
                                            </fieldset>
                                            
                                            <fieldset>
                                                <legend class="order-heading">Calculations</legend>
                                                <div class="order-pickup">
                                                    <span>Stops Number </span>
                                                    <span class="pull-right stop_number">5 Stops </span>
                                                    <div class="clearfix"></div>
                                                    <span>Weight </span>
                                                    <span class="pull-right weight">500 Kg </span>
                                                    <div class="clearfix"></div>
                                                    <span>Stop Time </span>
                                                    <span class="pull-right stop_time">3 Min </span>
                                                    <div class="clearfix"></div>
                                                    <span>Duration </span>
                                                    <span class="pull-right duration">1 Hr 49 Min </span>
                                                    <div class="clearfix"></div>
                                                    <span>Distance </span>
                                                    <span class="pull-right distance">230 Km </span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset id="tour_details">
                                                <legend class="order-heading">Additional Tour Details</legend>
                                                <div class="order-pickup">
                                                    <span class="pull-left">Min & Max Day Hour </span>
                                                    <div class="order-info-block pull-right">
                                                        <i class="icon-me fas fa-clock pull-left"></i>
                                                        <span class="min_max_day pull-left">09:00 - 20:00</span><br>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>

                                                    <span>Additional Price </span>
                                                    <span class="pull-right additional_price">100 €</span>
                                                    <div class="clearfix"></div>

                                                    <div class="row" style="margin: 0;">
                                                        <span>Additional Days </span>
                                                        <ul class="unstyled-list days additional_days pull-right">
                                                            <li>Fr</li>
                                                            <li>Sa</li>
                                                            <li>So</li>
                                                        </ul>
                                                    </div>  
                                                </div>
                                            </fieldset>
                                    
                                            <fieldset class="account">
                                                <legend class="order-heading">Accounting</legend>
                                                <div class="order-pickup">
                                                    <span>Account Time </span>
                                                    <span class="pull-right time">2 weeks </span>
                                                    <div class="clearfix"></div>
                                                    <span>Account Period </span>
                                                    <span class="pull-right period">end of month </span>
                                                    <div class="clearfix"></div>
                                                    <span>Account Speak Day </span>
                                                    <span class="pull-right day">31-01-2019 </span>
                                                    <div class="clearfix"></div>
                                                </div>        
                                            </fieldset>

                                        </div>


                                        <div class="col-xs-12 col-sm-6">
                                            <fieldset id="tour_dates">
                                                <legend class="order-heading">
                                                        Tour Dates
                                                </legend>
                                                <div class="order-pickup">
                                                    <div class="row" style="margin: 0;">
                                                        <span>Days </span>
                                                        <ul class="unstyled-list days pull-right tour_days">
                                                            <li>Fr</li>
                                                            <li>Sa</li>
                                                            <li>So</li>
                                                        </ul>
                                                    </div>  
                                                    <span>Tour Start & Finish Date </span>

                                                    <div class="order-info-block">
                                                        <i class="icon-me fas fa-calendar pull-left"></i>
                                                        <span class="start_finish_date pull-left">31-12-2018   -   25-01-2019 </span><br>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <span>Tour Start & Finish Time </span>

                                                    <div class="order-info-block">
                                                        <i class="icon-me fas fa-clock pull-left"></i>
                                                        <span class="start_finish_time pull-left">09:00   -  17:00 </span><br>
                                                        <div class="clearfix"></div>
                                                    </div>            
                                                </div>
                                            </fieldset>

                                            <fieldset class="payment">
                                                <legend class="order-heading">Payment</legend>
                                                <div class="order-pickup">
                                                    <span>Payment Time </span>
                                                    <span class="pull-right time">2 weeks </span>
                                                    <div class="clearfix"></div>
                                                    <span>Payment Period </span>
                                                    <span class="pull-right period">end of month </span>
                                                    <div class="clearfix"></div>
                                                    <span>Next Payment Day </span>
                                                    <span class="pull-right day">31-01-2019 </span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </fieldset>

                                            <fieldset class="cancellation">
                                                <legend class="order-heading">Cancellation</legend>
                                                <div class="order-pickup">
                                                    <span>Cancellation Time </span>
                                                    <span class="pull-right time">2 weeks </span>
                                                    <div class="clearfix"></div>
                                                    <span>Cancellation Period </span>
                                                    <span class="pull-right period">end of month </span>
                                                    <div class="clearfix"></div>
                                                    <span>Cancellation Speak Day </span>
                                                    <span class="pull-right day">31-01-2019 </span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset class="test">
                                                <legend class="order-heading">Test</legend>
                                                <div class="order-pickup">
                                                    <span>Test Time </span>
                                                    <span class="pull-right time">2 weeks </span>
                                                    <div class="clearfix"></div>
                                                    <span>Test Period </span>
                                                    <span class="pull-right period">end of month </span>
                                                    <div class="clearfix"></div>
                                                    <span>Test Speak Day </span>
                                                    <span class="pull-right day">31-01-2019 </span>
                                                    <div class="clearfix"></div>
                                                </div>        
                                            </fieldset>

                                        </div>

                                        
                                    </div>

                                    
                                    
                                    
                                    <div class="custom-block">
                                        <div class="row" style="width: 100% ; margin: 0;">
                                            <div class="col-xs-2 pull-right">
                                                <a href="#" class="more-button">{{trans('backend/bills.more')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                </div>

                            </div>


                            <div class="card-sec-content">

                                <div class="card-main-content">

                                    <div class="custom-block">
                                        <a href="#" class="back-button"><i class="fas fa-long-arrow-alt-left"></i> {{trans('backend/bills.back')}} </i></a>
                                    </div>

                                    <div class="order-location">

                                        <table id="offers" class="table table-hover daTatable dataTable text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Company</th>
                                                    <th>Offer</th>
                                                    <th>Driver</th>
                                                    <th>Car</th>
                                                    <th>Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                            
                                        </table>
                                        <hr>
                                        <table class="table table-hover daTatable dataTable text-center display" id="trips" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Trip Number</th>
                                                    <th>Trip Date</th>
                                                    <th>Tour Number</th>
                                                    <th>Tour Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            

                        </div>

                    </div>
                </div>    
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal" style="background: #B96C7B;"><i class="fa fa-home "></i> {{ trans('backend/bills.back') }}</button>
            </div>
        </div>

    </div>
</div>