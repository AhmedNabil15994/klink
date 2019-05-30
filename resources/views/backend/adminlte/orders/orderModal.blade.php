<style type="text/css">
    #state-watingOrder{
        color: #dc3545;
        font-weight: bold;
    }
    #state-paidOrder{
        color: #6AC259;
        font-weight: bold;
    }
    #state-completedOrder{
        font-weight: bold;
    }
    #state-expiredOrder{
        font-weight: bold;
    }
    .ul-row{
        border-bottom: 1px solid #DDD;
        margin-left: 0px;
        margin-right: 5px;
    }
    .my-side-wrapper .stateName{
        color: #111;
        padding: 5px 0;
    }
    .my-side-wrapper .stateName a{
        color: #111;
        margin: 5px;
        text-align: left;
        font-size: 14px;
    }
    .my-side-wrapper .catName{
        color: #c5c5c5;
        padding: 5px 0;
    }
    .my-side-wrapper{
        padding: 0;
        list-style: none;
        display: flex;
        flex-direction: column;
    }
    ul.panel-nav {
        display: inline-block;
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: transparent;
    }
    ul.panel-nav li {
        float: left;
    }
    ul.panel-nav li a.active {
        border-bottom: 2px solid #5fbeaa;
        color: #111;
    }
    ul.panel-nav li a:hover {
        color: #111;
    }
    ul.panel-nav li a {
        display: block;
        color: silver;
        text-align: center;
        padding: 5px!important;
        font-size: 12px;
        margin-bottom: 0;
        text-decoration: none;
        font-weight: bold;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: #666;
    }
    table td{
        text-align: left !important;
    }
    .table tbody tr > td:first-of-type,
    .table tbody tr > td:last-of-type{
        text-align: center !important;
        padding-top:0 !important; 
        padding-bottom:0 !important; 
        font-size: 12px;
    }
    .pag{
        box-shadow: 0 1px 5px rgba(0,0,0,.2);        
    }
    .content-wrapper, .right-side , .wrapper{
        background-color: #FFF !important;
    }
    .label{
        background-color: #358eda;
        padding: 5px;
        margin-bottom: 10px;
        display: inline-block;
    }
    #form_search input.form-control{
        display: block;
        width: 100% !important;
        position: relative;
    }
    #form_search .input-group-btn{
        position: absolute;
        right: 0;
    }
    .row{
        margin-bottom: 20px;
    }
    button i{
        font-size: 13px;
        margin-right: 5px;
    }
    .table{
        color: #495060;
        border: 1px solid #DDD;
    }
    .table thead tr > th{
        text-align: center;
        padding: 12px 5px;
    }
    .table tbody tr > td{
        /*text-align: center;*/
        padding: 10px 7px;
        font-size: 14px;
    }
    .table tbody .selected_record:hover{
        cursor: pointer;
        -webkit-transition: all ease-in-out .3s;
        -moz-transition: all ease-in-out .3s;
        -o-transition: all ease-in-out .3s;
        transition: all ease-in-out .3s;
        background-color: #EBF7FF;
    }
    .table tbody .tab-row.active,.table tbody .selected_record:active{
        background-color: #DDD;
    }
    .btn-warning{
        background-color: #FFAD33;
        padding: 6px 5px;
        padding-left: 10px;
        display: inline-block;
        font-size: 12px;
    }
    .btn-warning:hover{
        opacity: .8;
    }
    .tax-delete{
        padding: 0;
        font-size: 12px;
        padding: 2px 7px;
        background-color: #ed3f14;
    }
    .taxs .text{
        border: 1px solid #e9eaec;
        background-color: #f7f7f7;
        padding: 5px;
        display: block;
        width: fit-content;
        margin: auto;
        margin-bottom: 10px;
    }
    .taxs .rate{
        min-width: 40px;
    }
    th.edit{
        position: relative;
    }
    th.edit div{
        position: absolute;
        top: 0;
        left: 0;
        padding: 5px 15px;
        display: block;
        width: 100%;
        text-align: center;
    }
    td .btn{
        margin-bottom: 5px;
    }
    .tab-pane{
        padding:0;
    }
    .select2,.form-control{
        width: 50% !important;
        display: inline-block;
    }
    #datatable_paginate{
        text-align: left;
    }
    .dataTables_wrapper .row:first-of-type .col-sm-6:first-of-type{
        float: left;
    }
    #datatable_wrapper .row:last-of-type{
        margin-top: 30px;
    }
    .dataTables_filter{
        display: none;
    }
    .dataTables_length,
    .pagination{
        float: left;
    }
    .dataTables_wrapper .row .col-sm-5{
        float: right;
    }
    .dataTables_wrapper .row .col-sm-5 .dataTables_info{
        float: right;
    }
    #search{
        float: none;
    }
    .pag{
        min-height: 300px;
        padding:0;
        padding-top:20px;
    }
    .tab-content{
      border:none;
    }
    .progress {
        padding: 2px;
        height: 10px;
            box-sizing: content-box;
            width: 100%;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 6px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    }

    .dataTables_wrapper .row:nth-of-type(2) .col-sm-12{
        overflow:unset;
    }


   
    #users-table_wrapper{
            overflow-x:auto;
    }


    .action-td{
        display: flex;
        flex-wrap: wrap;

    }
    .action-td .btn{
        flex: 1 0 60px;
    }
    @keyframes mymove {
        from {width: 0px;}
        /* to {width:;} */
    }
    .progress-bar {
      /* height: 16px; */
      /* width: 0%; */
      animation: mymove 1s forwards;
      border-radius: 4px !important;
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
      transition: 0.4s linear;
      transition-property: width, background-color;
      box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    }
    .progress-bar.newOrder{
        width: 15%;
        background-color: #f63a0f;
    }
    .progress-bar.watingOrder{
        width: 30%;
        background-color: #f27011;
    }
    .progress-bar.decidingOrder{
        width: 60%;
        background-color: #f27011;
    }
    .progress-bar.acceptedOrder{
        width: 55%;
        background-color: #f2b01e;
    }
    .progress-bar.paidOrder{
        width: 80%;
        background-color: #f2d31b;
    }
    .progress-bar.expiredOrder{
        width: 45%;
        background-color: #dc3545;
    }
    .progress-bar.cancelledWithoutOffers{
        width: 100%;
        background-color: #dc3545;
    }
    .progress-bar .reklamationOrder{
        width: 95%;
        background-color: #dc3545;
    }
    .progress-bar.completedOrder{
        width: 100%;
        background-color: #6AC259;
    }
    .progress-bar.cancelledOrder{
        width: 80%;
        background-color: #dc3545;
    }
    .description-wrapper{
        display: flex;
        flex-wrap: wrap;
    }
    .description-wrapper .description{
        display: flex;
        flex-wrap: nowrap;
        font-size: 10px;
        font-weight: bold;
        max-height: 20px;
        align-items: center;
    }
    .email-span{
        padding: 3px;
        border-radius: 6px;
        background: #cfe9ff;
    }
    .headSearch{
        width: 100% !important;
        min-width: 80px !important;
        
        font-size: 12px;
    }
    div.slider-company {
        display: none;
    }
    .details-control::after{
        display: none !important;
    }
    .details-control{
        padding: 8px !important;
        padding-bottom: 12px;
    }
    table.dataTable tbody td.no-padding {
        padding: 0;
        background: #f4f4f4;
    }
    tr{
        cursor: pointer;
    }

    #tags{
        margin-top: 20px;
        padding: 5px 10px;
        border-radius: 5px;
        border: 1px solid #c7c7c7;
    }

    #tags:focus{
        outline:none;
    }

    .table tbody tr > td:first-of-type, .table tbody tr > td:last-of-type{
        text-align: center !important;
        padding-top: 18px !important;
        padding-bottom: 0 !important;
        font-size: 12px;
    }

    .table tbody tr > td:first-of-type, .table tbody tr > td:last-of-type {
        text-align: center !important;
        padding-top: 10px!important;
        padding-bottom: 0 !important;
        font-size: 12px;
    }


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
    @media(max-width: 991px){
        .load-para-sub-2.pull-right{
            padding-right: 5px;
        }
    }
</style>



<div id="orderModal" class="modal fade rale" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('backend/orders.ModalTitle')}} <span class="order-id"></span></h4>
            </div>
            <div class="modal-body">
                <div class="new-order-page">
                    <div class="col-xs-12">

                        <div class="new-order-card">

                            <div class="card-main-content">

                                <div class="order-card-id pull-left">
                                    
                                </div>
                                <div class="order-card-id pull-right">
                                    <a href="#" class="next-button">{{trans('frontend/order.next')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="order-location">

                                    <div class="order-heading">
                                        {{trans('backend/bills.order_dets')}}
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="order-pickup">
                                                <span>{{trans('backend/bills.pick_dets')}}</span>

                                                <div class="order-info-block">
                                                    <i class="icon-me fas fa-clock"></i>
                                                    <span class="load_from"></span> <br>
                                                    <i class="icon-me fas fa-map-marker-alt pull-left"></i>
                                                    <span class="source pull-left"></span> 
                                                    <div class="clearfix"></div>
                                                </div>

                                            </div>

                                            <div class="order-deliver">
                                                <span>{{trans('backend/bills.delivery_dets')}}</span>

                                                <div class="order-info-block">
                                                    <i class="icon-me fas fa-clock"></i>
                                                    <span class="delivery_until"></span><br>
                                                    <i class="icon-me fas fa-map-marker-alt pull-left"></i>
                                                    <span class="destination pull-left"></span>
                                                    <div class="clearfix"></div>  
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6">
                                            <!--important informaion-->
                                            <div class="order-important-info payment">
                                                <div class="order-heading text-left">
                                                    {{trans('backend/bills.payment_dets')}}
                                                </div>
                                                <p>
                                                    <span class="title">{{trans('backend/bills.payment_method')}}: </span>
                                                    <span class="additional"><img class="payment_type" src="" alt="payment"></span>
                                                </p>

                                                <p>
                                                    <span class="title">{{trans('frontend/order.company')}}: </span>
                                                    <span class="additional company"></span>
                                                </p>

                                                <p>
                                                    <span class="title">{{trans('frontend/dashboard.offer')}}: </span>
                                                    <span class="additional offer_total"></span> <span class="fas fa-euro-sign"></span>
                                                </p>
                                                
                                                <p>
                                                    <span class="title">{{trans('frontend/dashboard.status')}}: </span>
                                                    <span class="additional order_status label"></span>
                                                </p>       

                                            </div>
                                            <!--important informaion-->
                                        </div>

                                    </div>
                                            
                                    <div class="clearfix"></div>
                                    <div class="custom-block">

                                        
                                        <div class="valid-time">
                                            <span class="head">{{trans('frontend/order.distance')}}</span>
                                            <span class="distance"></span>
                                        </div>
                                        
                                        <div class="wait-time">
                                            <span class="head">{{trans('backend/bills.load_time')}}</span>
                                            <span class="load_time"></span>
                                        </div>

                                        <div class="wait-time">
                                            <span class="head">{{trans('backend/bills.persons')}}</span>
                                            <div class="perons">
                                                
                                            </div>
                                        </div>

                                        <div class="valid-time">
                                            <span class="head">{{trans('frontend/order.weight')}}</span>
                                            <span class="weight"></span>
                                        </div>

                                    </div>
                                    
                                    <div class="custom-block">
                                
                                        <div class="valid-time">
                                            <span class="head">~idm</span>
                                            <span class="length"></span>
                                        </div>
                                        <div class="valid-time">
                                            <span class="head">{{trans('frontend/order.length')}}</span>
                                            <span class="length"></span>
                                        </div>

                                        <div class="wait-time">
                                            <span class="head">{{trans('frontend/order.width')}}</span>
                                            <span class="width"></span>
                                        </div>

                                        <div class="wait-time">
                                            <span class="head">{{trans('frontend/order.height')}}</span>
                                            <span class="height"></span>
                                        </div>

                                    </div>
                                    
                                    <div class="custom-block">
                                        <div class="row" style="width: 100% ; margin: 0;">
                                            <div class="col-xs-12 col-sm-6" style="padding: 0;">
                                                <div class="valid-time car">
                                                    <span class="head">{{trans('frontend/order.car')}}</span>
                                                    <div class="car-block">
                                                        <div class="car-img">
                                                            <img class="image" src="" alt="car">
                                                        </div>
                                                        <div class="car-name">
                                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6" style="padding: 0;">
                                                <div class="valid-time car">
                                                    <span class="head">{{trans('frontend/order.goods_desc')}} </span>
                                                    <span class="description"></span>
                                                </div>
                                            </div>
                                                        
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

                                                <div class="order-heading">
                                                    {{trans('backend/bills.other_dets')}}
                                                </div>


                                                <div class="order-pickup">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 order-important-info">
                                                            <span class="order-heading">{{trans('frontend/order.sender')}}</span>
                                                            <p>
                                                                <span class="title">Name: </span>
                                                                <span class="additional sender_name"></span>
                                                            </p>
                                                            <!--<p>
                                                                <span class="title pull-left" style="display: inline-block;">{{trans('frontend/order.address')}}: </span>
                                                                <span class="additional sender_add">
                                                                    
                                                                </span>
                                                            </p>-->
                                                            <p>
                                                                <span class="title">{{trans('frontend/order.phone')}}: </span>
                                                                <span class="additional sender_phone"></span>
                                                            </p>
                                                            <p>
                                                                <span class="title">{{trans('frontend/order.email')}}: </span>
                                                                <span class="additional sender_email"></span>
                                                            </p>
                                                            <p class="sender_comp">
                                                                <span class="title">{{trans('frontend/order.company')}}: </span>
                                                                <span class="additional sender_company"></span>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 order-important-info">
                                                            <span class="order-heading">{{trans('frontend/order.receiver')}}</span>
                                                            <p>
                                                                <span class="title">Name: </span>
                                                                <span class="additional receiver_name"></span>
                                                            </p>
                                                            <!--<p>
                                                                <span class="title pull-left" style="display: inline-block;">{{trans('frontend/order.address')}} : </span>
                                                                <span class="additional receiver_add">
                                                                    
                                                                </span>
                                                            </p>-->
                                                            <p>
                                                                <span class="title">{{trans('frontend/order.phone')}}: </span>
                                                                <span class="additional receiver_phone"></span>
                                                            </p>
                                                            <p>
                                                                <span class="title">{{trans('frontend/order.email')}}: </span>
                                                                <span class="additional receiver_email"></span>
                                                            </p>
                                                            <p class="receiver_comp">
                                                                <span class="title">{{trans('frontend/order.company')}}: </span>
                                                                <span class="additional receiver_company"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="order-pickup order_dates">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 order-important-info">
                                                            <p>
                                                                <span class="title">
                                                                    {{trans('frontend/order.load_from')}}:
                                                                </span>
                                                                <span class="additional load_from">
                                                                    
                                                                </span>
                                                            </p>
                                                            <p>
                                                                <span class="title">
                                                                    {{trans('frontend/order.load_up')}}:
                                                                </span>
                                                                <span class="additional load_up">
                                                                    
                                                                </span>
                                                            </p>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 order-important-info">
                                                            <p>
                                                                <span class="title">
                                                                    {{trans('frontend/order.delivery_from')}}:
                                                                </span>
                                                                <span class="additional delivery_from">
                                                                    
                                                                </span>
                                                            </p>
                                                            <p>
                                                                <span class="title">
                                                                    {{trans('frontend/order.delivery_until')}}:
                                                                </span>
                                                                <span class="additional delivery_until">
                                                                    
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>

                                                <div class="order-pickup">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-6 order-important-info">
                                                            <p>
                                                                <span class="title pull-left" style="margin-right: 5px;">
                                                                    {{trans('frontend/order.bill_to')}}:
                                                                </span>
                                                                <span class="additional bill_to">
                                                                    
                                                                </span>
                                                            </p>
                                                            <div class="clearfix"></div>
                                                            <div class="otherBillingData">
                                                                <p>
                                                                    <span class="title pull-left" style="margin-right: 5px;">
                                                                        {{trans('frontend/order.phone')}}:
                                                                    </span>
                                                                    <span class="additional other_phone">
                                                                        
                                                                    </span>
                                                                </p>
                                                                <p>
                                                                    <span class="title pull-left" style="margin-right: 5px;">
                                                                        {{trans('frontend/order.email')}}:
                                                                    </span>
                                                                    <span class="additional other_email">
                                                                        
                                                                    </span>
                                                                </p>
                                                                <p class="other_comp">
                                                                    <span class="title pull-left" style="margin-right: 5px;">
                                                                        {{trans('frontend/order.company')}}:
                                                                    </span>
                                                                    <span class="additional other_company">
                                                                        
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6 order-important-info company_details">
                                                            <span class="order-heading">{{trans('backend/bills.company_dets')}}</span>
                                                            <div id="company_order_dates">
                                                                <p>
                                                                    <span class="title pull-left" style="margin-right: 5px;">
                                                                        {{trans('backend/bills.company_dates')}}:

                                                                    </span>
                                                                    <span class="additional" id="company_dates">
                                                                        
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </p>
                                                                <p id="company_load_up">
                                                                    <span class="title pull-left" style="margin-right: 5px;">
                                                                        {{trans('backend/bills.company_load_time')}} :
                                                                    </span>
                                                                    <span class="additional" id="company_load_time">
                                                                        
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="order-pickup">
                                                   <div class="row">
                                                       <div class="col-xs-12 col-sm-6 order-important-info company_order_vecs" id="company_order_vecs">
                                                           <div class="car-block">
                                                                <div class="car-img pull-left">
                                                                    <img class="image2" src="" alt="car">
                                                                </div>
                                                                <div class="car-name2 pull-left">
                                                                                
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="car-block">
                                                                <div class="col-xs-12">
                                                                    <p class="load-para-sub-2 pull-left">
                                                                        <i class="fas fa-user-tie"></i>
                                                                        <span class="driver_name"></span>
                                                                    </p>

                                                                    <p class="load-para-sub-2 pull-right">
                                                                        <i class="fas fa-phone"></i>
                                                                        <span class="driver_phone"></span>
                                                                    </p>                                                        
                                                                </div>
                                                            </div>
                                                       </div>

                                                       <div class="col-xs-12 col-sm-6 order-important-info company_order_steps">
                                                           <span class="order-heading">{{ trans('backend/bills.order_steps') }}</span>
                                                            
                                                            <p id="p_take_money">
                                                                <span class="title pull-left" style="margin-right: 5px;">
                                                                {{trans('frontend/dashboard.take_money')}}:
                                                                </span>
                                                                <span class="additional take_money"></span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                            <p id="p_pick_up">
                                                                <span class="title pull-left" style="margin-right: 5px;">
                                                                    {{trans('frontend/dashboard.pick_up')}} :
                                                                </span>
                                                                <span class="additional pick_up">
                                                                        
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                            <p id="p_pick_up_done">
                                                                <span class="title pull-left" style="margin-right: 5px;">
                                                                    {{trans('frontend/dashboard.pick_up_done')}}:
                                                                </span>
                                                                <span class="additional pick_up_done">
                                                                        
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>
                                                            <p id="p_delievered">
                                                                <span class="title pull-left" style="margin-right: 5px;">
                                                                    {{trans('frontend/dashboard.delievered')}}:
                                                                </span>
                                                                <span class="additional delievered">
                                                                        
                                                                </span>
                                                                <div class="clearfix"></div>
                                                            </p>

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
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal" style="background: #B96C7B;"><i class="fa fa-home "></i> {{ trans('backend/bills.back') }}</button>
            </div>
        </div>

    </div>
</div>
