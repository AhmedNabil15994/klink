@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/bills.invoice') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/bills.invoice') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/bills.invoice')
}}
@endsection

<!--breadcrumb current page-->
@section('previous_breadcrumb')
{{ trans('backend/bills.invoices') }}
@endsection

 
@section('current_breadcrumb') {{ trans('backend/bills.invoice') }}
@endsection
 
@section('main-content')
<link rel="stylesheet" href="/css/plugins/date/jquery.datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('/css/order_abstract.css')}}">
<style type="text/css">
    .btn-xs{
        padding: 6px 12px !important;
        font-size: 15px !important;
    }
    .container{
      width: auto !important;
    }
    p{
        margin: 0 0 10px !important;
    }
    .company-invoice .bill-information .invoice-dates{
        background-color: #F6AB36;
        color: #FFF;
        padding: 1rem 1.5rem;
        width: 50%;
        border-radius: .5rem;
        box-shadow: .1rem .1rem 1rem #999;
    }
    .bill_to{
        font-weight: bold !important;
        font-size: 2rem !important;
        display: inline-block !important;
    }
    .name{
        display: inline-block !important;
        margin-left: 5px !important;
    }
    @media print {
      @page { margin: 0; }
      body { margin: 1.6cm; }

      footer{
        display: none !important;
      }
      .actions{
        display: none !important;
      }
      .tab-content{
        border: 0 !important;
      }
      .order-space .orderCard::-webkit-scrollbar { width: 0 !important }
      .tab-pane{
            padding: 0 !important;
        }
      .container-fluid{
        padding-right: 0 !important;
        padding-left: 0 !important;
      }
      .main-wrapper .pageContent{
        padding-top: 0 !important;
      }

      /*company invoice*/
      .company-invoice .company-heading h1 {
        padding: 0 !important;
        margin: 0 !important;
        font-size: 25px !important;
        margin-bottom: 5px !important;
        color: #444;
      }

      .company-invoice .company-heading p {
        font-size: 11px !important;
        text-transform: uppercase !important;
        color: #666 !important;
      }

      .company-invoice .company-address {
        padding-top: 25px !important;
        cursor: pointer !important;
         float: right !important;
      }

      .company-invoice .company-address span {
        display: block !important;
        margin-bottom: 2px !important;
        font-size: 14px !important;
        color: #666 !important;
      }

      .company-invoice .bill-information .invoice-dates {
        float: left !important;
        padding: 0 !important;
        margin-bottom: 25px !important;
        width: 100% !important;
      }

      .company-invoice .bill-information .invoice-dates p {
        font-size: 14px;
        display: block !important;
        color: #666 !important;
      }

      .company-invoice .bill-information .invoice-dates span {
        display: inline-block !important;
        font-weight: 500 !important;
        text-transform: uppercase !important;
        font-size: 13px !important;
        margin-left: 3px !important;
      }

      .company-invoice .bill-information .bill-to {
        float: left;
        text-align: left;
      }

      .company-invoice .bill-information .bill-to p {
        font-weight: 500;
        text-transform: uppercase;
        margin: 0;
        font-size: 15px;
      }

      .company-invoice .bill-information .bill-to span {
        display: block;
        margin-bottom: 5px;
        font-size: 14px;
        color: #666 !important;
      }

      .company-invoice .invoice-number {
        text-align: center;
        padding-top: 10px !important;
        cursor: pointer;
      }

      .company-invoice .invoice-number .invoice {
        font-size: 18px;
        font-weight: 500;
        text-transform: uppercase;
        margin-bottom: 5px !important;
      }

      .company-invoice .invoice-number .num {
        font-size: 16px;
        margin-bottom: 5px !important;
      }

      

      .order-space {
        margin-top: 0 !important;
      }

      .order-space .orderCard {
        width: 100% !important;
        margin-bottom: 0 !important;
        border: 0 !important;
        padding: 0 !important;
      }

      .order-space .orderCard {
        overflow: hidden !important;
      }

      .order-space .orderCard .order-head {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      }

      .order-space .orderCard .table__header--row th {
        font-size: 14px !important;
        background: #EEE !important;
        font-weight: 400 !important;
      }

      .company-invoice .total {
        text-align: right;
      }

      .company-invoice .total .total-value {
        text-align: left;
        float: right;
        cursor: pointer;
        margin-bottom: 0 !important;
      }
       .company-invoice .total .total-value p.test{
        font-size: 16px;
        border-bottom: 1px solid #DDD;
      }
      .company-invoice .total .total-value span {
        display: inline-block;
        min-width: 200px !important;
        font-weight: 500 !important;
        font-size: 12px !important;
        text-transform: uppercase;
      }

      .company-invoice .total .total-value span {
        font-size: 12pt;
      }

      .company-invoice .total .total-value .due-amount {
        border-top: .3rem solid #FFF;
        padding-top: .5rem;
        background-color: 
      }

      .company-invoice .total .total-value .due-amount {
        border-top: .3rem solid #000;
      }

      .company-heading h1 {
        font-size: 25pt !important;
      }
      .company-heading p {
        font-size: 11pt !important;
      }
      .company-address span {
        font-size: 13pt !important;
      }
      .invoice-dates p {
        font-size: 14pt;
      }
      .invoice-dates span {
        font-size: 13pt;
      }
      .bill-to p {
        font-size: 15pt;
      }
      .bill-to span {
        font-size: 14pt;
      }
      .invoice-number .invoice {
        font-size: 18pt;
      }
      .invoice-number .num {
        font-size: 16pt;
      }
      .bill_to{
          font-weight: 500 !important;
          font-size: 1.6rem !important;
          display: inline-block !important;
      }
      .name{
          display: inline-block !important;
          margin-left: 5px !important;
      }
      .company-invoice .container.test{
        width: 50% !important;
        float: left;
        margin-bottom: 25px;
      }
      .company-invoice .bill-information{
        padding-top: 0 !important;
      }
      .row{
        margin-bottom: 0 !important;
      }
    }
    @media not print {
      @media (max-width: 767px){
      .col-xs-6,
      .company-invoice .bill-information .invoice-dates{
        width: 100%;
      }
      .company-invoice .bill-information .bill-to{
        text-align: center;
        margin-bottom: 1rem;
      }
      .company-invoice .bill-information .invoice-dates{
        margin-bottom: 1rem;
      }
      .company-invoice .total .total-value p{
        font-size: 1.2rem;
      }
      .row.actions{
        margin: 1.5rem;
        text-align: center;
      }
      .row.actions .btn{
        letter-spacing: 50px;
        width: 40px;
        overflow: hidden;
      }
    }
    }
    
</style>

<div class="tab-content">
    <div id="home" class="tab-pane active in">

        <!--company invoice-->
    <div class="company-invoice">
        
        <!--invoice heading-->
        <div class="container test">
            <div class="company-heading">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="play">Kurier-link co</h1>
                        <p class="rubik">
                            click to transport.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--invoice heading-->
        
        <!--company address-->
        <div class="container test">
            <div class="company-address rubik">
                <div class="row">
                    <div class="col-xs-12">
                        <span>
                            <?php 
                                $address = $data->profile->address;
                            ?>
                            {!! $address->addressForm() !!}
                            </span>
                            <span>
                            {{$data->profile->number->mobile_number}}
                            </span>
                            <span>
                            {{$data->email}}
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <!--company address-->
        
        <?php 
                $sender = \DB::table('senders')->where('order_id','=',$order->order_id)->first();
                $receiver = \DB::table('receivers')->where('order_id','=',$order->order_id)->first();

            ?>
        
        <!--bill information-->
        <div class="container">
            <div class="bill-information">
                <div class="row">

                    <div class="col-xs-6">
                        <div class="bill-to rubik">
                            <P class="bill_to">
                                {{trans('frontend/order.bill_to')}} : 
                            </P>
                            
                            <span class="name">
                               {{$company->first_name}} {{$company->last_name}}
                            </span>
                            
                            <span>
                                {{$company->address}} {{$company->home}}<br>
                                {{$company->postal_code}} {{$company->district}}<br>
                                {{$company->country}}
                            </span>
                          
                            <span>
                                {{$user->email}}
                            </span>
                        </div>
                    </div>
                   
                    
                </div>
                
            </div>
        </div>
        <!--bill information-->
        
        
        <div class="container">
            <div class="invoice-number rubik ">
               <div class="row">
                   <div class="col-xs-12">
                       <p class="invoice">
                           {{trans('frontend/dashboard.abstract')}}
                       </p>
                       <p  class="num">
                           # {{$order->order_id}}
                       </p>
                   </div>
               </div>                               
            </div>
        </div>
        
        
        
        <!--invoice table-->
        <!--row-->
        <div class="container">
            
        
            <div class="row">
                <!--order space-->
                <div class="order-space">

                    <!--col-->
                    <div class="col-xs-12">

                                        <!--order card-->
                                        <div class="orderCard">

                                           

                                            <!--order data-->
                                            <div class="order-data">



                                                <!--table head-->
                                                <table class="table table-hover table-striped">

                                                    <!--table head-->
                                                    <thead class="table__header">
                                                        <tr class="table__header--row">
                                                            <th>{{trans('frontend/order.quantity')}}</th>
                                                            <th>{{trans('frontend/dashboard.source')}}</th>
                                                            <th>{{trans('frontend/dashboard.destination')}}</th>
                                                            <th>{{trans('frontend/order.weight')}}(kg)</th>                     
                                                            <th>{{trans('frontend/order.total')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <!--table head-->


                                                    <!--table body-->
                                                    <tbody class="table__body">

                                                            <tr class="table__body--row">              

                                                                <?php 
                                                                    $subtotal = $offer->total;
                                                                    $paid = 0;
                                                                ?>
                                                                <td>{{$order->items}}</td>
                                                                <td>{{$sender->postal_code .' '.$sender->town}}</td>
                                                                <td>{{$receiver->postal_code .' '.$receiver->town}}</td>
                                                                <td>{{$order->weight}}</td>
                                                                <td>{{$subtotal}} €</td>
                                                            </tr>

                                                    </tbody>
                                                    <!--table body-->

                                                </table>
                                                <!--table head-->




                                            </div>

                                        </div>
                                        <!--order card-->

                                    </div>
                    <!--col-->






                </div>
                <!--order space-->
            </div>
        
        
        </div>
        <!--row-->
        <!--invoice table-->
        
        
        
         <!--fourth div-->
        <div class="total rubik">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="total-value">
                            <p class="test">
                                <span>{{trans('frontend/order.subtotal')}}: </span>  {{$subtotal}} €
                            </p>

                            <p class="test">
                                <span>{{trans('frontend/order.total')}}: </span>  {{$subtotal}} €
                            </p>

                            <p>
                                <span>{{trans('frontend/order.paid')}}: </span>  {{$paid}} €
                            </p>
                            
                            <p class="due-amount">
                                <span>{{trans('frontend/order.amount_due')}}: </span> {{round($subtotal - $paid , 2)}} €
                            </p>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fourth div-->

       
        
    </div>
    <!--company invoice-->
        
        <div class="row actions" style="padding: 0;margin: 0;margin-bottom: 2.5rem;">
            <a href="{{route('download_abstract',['id'=> $encrypted])}}" class="btn btn-xs btn-default"><i class="fa fa-save fa-1x"></i> {{trans('frontend/order.download')}}</a>
            <a href="#" class="btn btn-xs btn-default" onclick="window.print()"><i class="fa fa-print fa-1x"></i> {{trans('frontend/order.print')}}</a>
        </div>
            
    </div>
</div>










@section('scripts')
    @include('backend.adminlte.layouts.partials.scripts')
<script>
   $(function(){
        $('.breadcrumb .prev').toggle();
        $('.breadcrumb .prev a').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = "{{URL::to('backend/bill/invoices')}}";
        });
   });
</script>
@endsection

@endsection