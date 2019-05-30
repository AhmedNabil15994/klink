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
<link rel="stylesheet" type="text/css" href="{{asset('/css/invoice.css')}}">
<style type="text/css">
    .btn-xs{
        padding: 6px 12px !important;
        font-size: 15px !important;
    }
    @media print{
        footer{
            display: none !important;
        }

        @page { margin: 0; }
        body { margin: 1.6cm; }

        a{
            visibility: hidden;
        }
        
        .tab-pane{
            padding: 0 !important;
        }
        
        .order-space .orderCard::-webkit-scrollbar { width: 0 !important }

        .company-info {
          padding: 20px !important;
          clear: both !important;
          padding-bottom: 0 !important;
        }
        .company-info .company-name {
          cursor: pointer !important;
          float: left !important;
        }

        .company-info .company-name h2 {
          font-weight: 700 !important;
          font-size: 30px !important;
          text-transform: uppercase !important;
          margin-bottom: 0 !important;
          color: #444 !important;
        }

        .label{
            border: 0;
        }

        .company-info .company-name span {
          font-weight: 500 !important;
          font-size: 13px !important;
          cursor: pointer !important;
          color: #666 !important;
          text-transform: uppercase !important; 
        }
        .company-info .company-info {
          float: right !important;
        }

        .company-info .company-info span {
          display: block !important;
          margin-bottom: 2px !important;
          font-size: 14px !important;
          cursor: pointer !important;
          color: #666 !important;
        }

        .invoice-number {
          padding: 20px !important;
          cursor: pointer !important;
          padding-top: 0 !important;
          padding-bottom: 0 !important;
        }

        .invoice-number h3 {
          font-size: 25px !important;
          color: #000 !important;
          text-transform: unset !important; 
        }

        .invoice-number span {
          font-size: 15px !important;
          color: #777 !important;
        }
        .invoice-number label{
          background: #FFF !important;
          color: #777 !important;
          font-size: 16px !important;
        }
        .invoice-number h6{
          font-size: 16px !important;
        }
        .row{
            margin-bottom: 0 !important;
        }
        .second-div .billing-to {
          padding: 2rem !important;
        }
        .second-div .billing-to h4 {
          text-transform: capitalize !important;
          font-size: 2rem !important;
          color: #333333 !important;
        }

        .second-div .billing-to span {
          display: block !important;
          font-size: 1.5rem !important;
          margin-bottom: .5rem !important;
          color: rgba(0, 0, 0, 0.5) !important;
        }

        .second-div .billing-dates {
          padding: 2rem !important;
          padding-right: 0 !important;
          padding-left: 0 !important;
        }
        .second-div .billing-dates .dates {
          color: #555 !important;
          padding: 1rem !important;
          border-radius: .3rem !important;
        }

        .second-div .billing-dates .dates p {
          font-size: 1.4rem !important;
          color: #333 !important;
        }

        .second-div .billing-dates .dates p span {
          margin-left: 5px !important;
          display: inline-block !important;
          width: 110px !important;
          font-size: 1.4rem !important;
          color: #666 !important;
          font-weight: 600 !important;
        }

        .second-div .billing-conc {
          padding: 2rem !important;
          padding-right: 0 !important;
          padding-left: 0 !important;
          padding-top: 25px !important;
        }
        .second-div .billing-conc .details {
          color: #555 !important;
          padding: .5rem !important;
          border-radius: .3rem !important;
        }

        .second-div .billing-conc .details p {
          font-size: 1.6rem !important;
          color: #333 !important;
        }

        .second-div .billing-conc .details p span {
          margin-right: .5rem !important;
          display: inline-block !important;
          width: 10rem !important;
          font-size: 1.4rem !important;
          color: #666 !important;
          font-weight: 600 !important;
        }
     
        .order-space .orderCard {
          width: 100% !important;
          padding: 2rem !important;
          margin-bottom: 0 !important;
          padding-bottom: 0 !important;
          background: unset !important;
          box-shadow: unset !important;
          border-radius: 0 !important;
          border: 0 !important;
        }
        .order-space .orderCard .table__header--row th {
          border-bottom: 1px solid rgba(0, 0, 0, 0.08) !important;
          color: #6c757d !important;
          cursor: pointer !important;
          font-size: 1.4rem !important;
        }
        .order-space .orderCard .table__body--row {
          transition: background .5s !important;
          cursor: pointer !important;
          /*td*/
        }

        .order-space .orderCard .table__body--row td {
          padding: 1.2rem !important;
          border-bottom: 1px solid rgba(0, 0, 0, 0.08) !important;
          vertical-align: middle !important;
          color: #455a64 !important;
          border-top: none !important;
          font-size: 1.4rem !important;
        }

        .fourth-div .total-value {
          padding: 2rem !important;
          float: right !important;
        }

        .fourth-div .total-value p {
          font-size: 1.5rem !important;
          padding: .5rem !important;
        }

        .fourth-div .total-value span {
          display: inline-block !important;
          width: 20rem !important; 
          margin-right: 10px !important;
          font-weight: 700 !important;
          text-transform: uppercase !important;
        }

        .order-space .orderCard .table .table__header,
        .order-space .orderCard .table .table__header .table__header--row{
            background-color: #DDD !important;
        }
        .invoice-number,
        .company-info{
            padding-bottom: 0 !important;
        }
        .invoice-wrapper{
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
    }

    @media not print {
    

      @media (max-width: 540px){
        .second-div .billing-conc .details p span,
        .second-div .billing-dates .dates p span{
          display: block;
        }
      }
      @media (max-width: 754px){
        .tab-pane{
          padding: 0;
        }
        .invoice-wrapper{
          margin-top: 0;
        }
        .first-div,
        .second-div,
        .third-div,
        .fourth-div{
          padding-right: 15px;
          padding-left: 15px;
        }
        .company-info,
        .invoice-number,
        .col-xs-12{
          padding: 0;
        }
        .company-info .company-name h2,
        .invoice-number h3{
          font-size: 15px;
        }
        .company-info .company-name span,
        .invoice-number span{
          font-size: 10px;
        }
        .company-info .company-info{
          margin-top: 15px;
        }
        .company-info .company-info span{
          font-size: 12px;
        }
        .second-div .billing-to{
          text-align: center;
        }
        .col-xs-4,
        .col-xs-8{
          width: 100%;
        }
        .col-xs-8 .row .col-xs-6{
          width: 50%;
          padding: 0;
        }
        .fourth-div .total-value{
          padding: 15px;
          padding-right: 20px;
          float: unset;
        }
        .fourth-div .total-value span{
          width: 135px;
          margin-right: 0;
        }
        .row.actions{
          margin: 15px;
          text-align: center;
        }
        .row.actions .btn{
          letter-spacing: 50px;
          width: 40px;
          overflow: hidden;
        }
        .second-div .billing-conc .details p span,
        .second-div .billing-dates .dates p span{
          display: unset;
        }
        .fourth-div .total-value p:last-of-type{
          padding: 0 !important;
        }
        .invoice-number .row .col-xs-6{
          padding-right: 0;
        }
      }

    }  
</style>

<div class="tab-content">
    <div id="home" class="tab-pane active in">

        <div class="invoice-wrapper openSans">

            <div class="first-div">


                    <!--company row-->
                    <div class="company-info">
                        <div class="row">
                            
                            <div class="col-xs-6">
                                <div class="company-name">
                                    <h2>kurierlink co</h2>
                                    <span class="com-desc">
                                        {{trans('frontend/order.click')}}
                                    </span>
                                </div>
                            </div>


                            <div class="col-xs-6">
                                <div class="company-info">
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

                    <!--company row-->

                    <!--invoice number row-->
                    <div class="invoice-number">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>{{trans('frontend/order.bill_to')}} : {{$receiver->first_name}} {{$receiver->nick_name}}</h4>
                                <h6><span>
                                   {{trans('frontend/order.order_no')}}:
                                </span># {{$id}}</h6>
                                <?php 
                                    $status = ''; 
                                    $class  = ''; 
                                    $word  = ''; 
                                ?>
                                @if($order->is_active == 0)
                                <?php 
                                    $status = 'Pending';
                                    $class  = 'danger'; 
                                    $word  = trans('frontend/order.pending'); 
                                ?>
                                @else
                                  @if($order->delievered == 1)
                                  <?php 
                                    $status = 'Delievered';
                                    $class  = 'primary'; 
                                    $word  = trans('frontend/dashboard.delievered'); 
                                  ?>
                                  @else
                                   <?php 
                                      $status = 'Active';
                                      $class  = 'success'; 
                                      $word  = trans('frontend/order.active'); 
                                  ?>
                                  @endif
                                @endif
                                <h6> <span>{{trans('frontend/order.order_status')}}: </span> <label class="label label-{{$class}}">{{$word}}</label></h6>
                                <h6> <span>{{trans('frontend/order.order_date')}}: </span> {{ \Carbon::parse($order->created_at)->format('Y-m-d')}}</h6>
                            </div>
                            <div class="col-xs-6">
                                <div class="pull-right" style="padding-right: 1.5rem">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--invoice number row-->


            </div>

            <!--second div-->
            <div class="second-div">
                    <div class="row">

                        <div class="col-xs-4">
                            <div class="billing-to">
                                <h4>{{trans('frontend/order.order')}} 
                                   
                                </h4>
                                
                               
                                <span>{{trans('frontend/order.company')}} : {{$company}}</span>
                                
                                <span class="user-address">
                                    {{$receiver->street}} {{$receiver->home}}<br>
                                    {{$receiver->postal_code}} {{$receiver->town}}<br>
                                    {{$receiver->country}}   
                                </span>

                                
                                <span class="email">
                                    {{$receiver->email}} 
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-8">
                            <div class="row">

                                <div class="col-xs-6">
                                    <div class="billing-dates">
                                        <div class="dates">
                                            <p>
                                                <span>{{trans('frontend/order.issue')}}:</span> {{ \Carbon::parse($dates->load_from)->format('Y-m-d')}}
                                            </p>

                                            <p>
                                                <span>{{trans('frontend/order.due')}}:</span> {{ \Carbon::parse($dates->delivery_until)->format('Y-m-d')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                               

                                

                            </div>
                            
                        </div>


                    </div>
            </div>
            <!--second div-->

            <!--third div-->
            <div class="third-div">
                        <div class="order-space">

                                <!--col-->
                                <div class="col-xs-12">
                                    <!--order card-->
                                    <div class="orderCard">

                                    
                                        <div class="order-data">

                                          <?php 
                                            $senders = \DB::table('senders')->where('order_id','=',$id)->first();
                                            $receivers = \DB::table('receivers')->where('order_id','=',$id)->first();

                                          ?>

                                            <!--table head-->
                                            <table class="table table-striped" id="">

                                                <!--table head-->
                                                <thead class="table__header" style="background: #DDD;">
                                                    <tr class="table__header--row">
                                                        <th>{{trans('frontend/order.quantity')}}</th>
                                                        <th>{{trans('frontend/dashboard.source')}}</th>
                                                        <th>{{trans('frontend/dashboard.destination')}}</th>
                                                        <th>{{trans('frontend/order.weight')}}(km)</th>                     
                                                        <th>{{trans('frontend/order.vat')}}(19%)</th>
                                                        <th>{{trans('frontend/order.total')}}</th>
                                                    </tr>
                                                </thead>
                                                <!--table head-->


                                                <!--table body-->
                                                <tbody class="table__body">

                                                    <tr class="table__body--row">              
                                                        <?php 
                                                            $total = $order->cost;
                                                            $percent = 119/100;

                                                            $first = round($total / $percent , 2) ;
                                                            $vat = round($total - $first , 2);
                                                        ?>
                                                        <td>{{$order->items}}</td>
                                                        <td>{{$senders->postal_code .' '.$senders->town}}</td>
                                                        <td>{{$receivers->postal_code .' '.$receivers->town}}</td>
                                                        <td>{{$order->weight}}</td>
                                                        <td>{{$vat}}</td>
                                                        <td>{{$order->cost}} €</td>
                                                    
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
            </div>
            <!--third div-->

            <!--fourth div-->
            <div class="fourth-div">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="total-value">
                                <p style="border-bottom: 1px solid #DDD;">
                                    <span>{{trans('frontend/order.subtotal')}}: </span>  <span class="pull-right text-right">{{$first}} €</span>
                                </p>

                                <p style="border-bottom: 1px solid #DDD;">
                                    <span>{{trans('frontend/order.vat')}} (19%): </span>  <span class="pull-right text-right">{{$vat}} €</span>
                                </p>

                                <p style="border-bottom: 1px solid #DDD;">
                                    <span>{{trans('frontend/order.total')}}: </span>   <span class="pull-right text-right">{{$total}} €</span>
                                </p>

                                <p style="margin-bottom:0;border-bottom: 0; "> 
                                    @if($order->is_active == 0)
                                    <?php 
                                        $paid = 0;
                                    ?>
                                    <span>{{trans('frontend/order.paid')}}: </span>  <span class="pull-right text-right">{{$paid}} €</span>
                                    @else
                                    <?php 
                                        $paid = $order->paid;
                                    ?>
                                    <span>{{trans('frontend/order.paid')}}: </span>  <span class="pull-right text-right">{{$paid}} €</span>
                                    @endif
                                </p>

                                <p style="background: #f9f9f9;padding: 1rem;border-bottom: 0;margin-top: 2px;border-top: .3rem solid #555;">
                                     <span>{{trans('frontend/order.amount_due')}}: </span> <span class="text-right">{{round($total - $paid , 2)}} €</span>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
            <!--fourth div-->

            

        </div>
        <div class="row actions" style="padding: 0;margin: 0;margin-bottom: 2.5rem;">
            <a href="{{route('download_pdf',['id'=> $encrypted])}}" class="btn btn-xs btn-default"><i class="fa fa-save fa-1x"></i> {{trans('frontend/order.download')}}</a>
            <a href="#" class="btn btn-xs btn-default" onclick="window.print()"><i class="fa fa-print fa-1x"></i> {{trans('frontend/order.print')}}</a>
        </div>
            
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