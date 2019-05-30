@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('frontend/order.invoices') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/bills.invoices') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/bills.invoices')
}}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/bills.invoices') }}
@endsection
 
@section('main-content')
<link rel="stylesheet" href="/css/plugins/date/jquery.datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<style type="text/css">
    .tab-row.main{
        cursor: pointer;
    }
    .label-primary{
        padding: 5px 12px !important;
    }
    .ul-row{
        border-bottom: 1px solid #DDD;
        margin-left: 0px;
        margin-right: 5px;
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
        padding: 10px!important;
        margin-bottom: 0;
        text-decoration: none;
        font-weight: bold;
    }
</style>

<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="row ul-row">
        <ul class="panel-nav pull-left">
            <li><a class="active al" id="state-all" href="javascript:void(0)" link="{{route('bill.invoices')}}">{{trans('backend/user.all')}}</a></li>
            <li><a class="al" id="paid" href="javascript:void(0)" link="{{route('bill.paid_invoices')}}">{{trans('backend/bills.paid')}}</a></li>
            <li><a class="al" id="unpaid" href="javascript:void(0)" link="{{route('bill.unpaid_invoices')}}">{{trans('backend/bills.unpaid')}}</a></li>
        </ul>
    </div>
        <div class="pag">

            <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
                id="bills-table">
                <thead>
                    <tr style="background-color: #EEE;">
                        <th>{{trans('backend/bills.invoice_no')}}</th>
                        <th>{{trans('backend/bills.source')}}</th>
                        <th>{{trans('backend/bills.destination')}}</th>
                        <th>{{trans('backend/bills.sender')}}</th>
                        <th>{{trans('backend/bills.receiver')}}</th>
                        <th>{{trans('backend/bills.company')}}</th>
                        <th>{{trans('backend/bills.cost')}}</th>
                        <th>{{trans('backend/bills.tax')}}</th>
                        <th>{{trans('backend/bills.total')}}</th>
                        <th>{{trans('frontend/auth.status')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $invoice)
                    <tr class="tab-row main">
                        <?php 
                            $total = $invoice->cost;
                            $cost = round( $total/(119/100) ,2);
                            $tax = round( $cost * (19/100) ,2);
                            $sender = \DB::table('senders')->where('order_id','=',$invoice->order_id)->first();
                            $receiver = \DB::table('receivers')->where('order_id','=',$invoice->order_id)->first();
                            $status = '';
                            $class = '';
                            if($invoice->paid == 0){
                                $status = trans('backend/bills.unpaid');
                                $class = 'danger';
                            }elseif($invoice->paid == $invoice->cost){
                                $status = trans('backend/bills.paid');
                                $class = 'primary';
                            }
                        ?>
                        <input type="hidden" class="order_id" value="{{$invoice->order_id}}">
                        <th>{{$invoice->order_id}}</th>
                        <th>{{$invoice->source}}</th>
                        <th>{{$invoice->destination}}</th>
                        <th>{{$sender->first_name}} {{$sender->nick_name}}</th>
                        <th>{{$receiver->first_name}} {{$sender->nick_name}}</th>
                        <th>{{$invoice->first_name}} {{$invoice->last_name}}</th>
                        <th>{{$cost}} €</th>
                        <th>{{$tax}} €</th>
                        <th>{{$total}} €</th>
                        <th><span class="label label-{{$class}}">{{$status}}</span></th>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @if(!count($data))
            <style type="text/css">
                tbody,
                .dataTables_wrapper .row:last-of-type,
                .dataTables_wrapper .row:first-of-type {
                    display: none;
                }
            </style>
            <div id="overlayError">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-xs-6 text-left pull-right">
                        <img style="width: 120px;" src="{{asset('images/filter.svg')}}">
                    </div>
                    <div class="col-xs-3"></div>
                    <div class="col-xs-3 pull-left text-right">
                        <div class="callout" style="margin-top: 50px;border-left: 0;">
                            <h4>{{trans('main.no_res')}}<i class="fa fa-exclamation fa-fw"></i></h4>
                            <p>{{trans('main.no_res2')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>










@section('scripts')
    @include('backend.adminlte.layouts.partials.scripts')
<script>
   $(function(){
        $(document).on('click','table .tab-row.main',function(e){
            e.preventDefault();
            e.stopPropagation();
            id = $(this).children('.order_id').val();
            var route = "{{route('bill.bill_invoice',['order_id' => 'uid'])}}";
            route = route.replace('uid', id);
            window.location.href = route;
        });


        $('#state-all , #paid , #unpaid').click(function () {
                if ($(this).hasClass('active')) {
                    return void (0);
                } else {
                    $('.panel-nav a.active').removeClass('active');
                    $(this).addClass('active');
                    getData(null, $(this).attr('link'));
                }
        });

        function getData(page_number, url) {
            url = url || '?page=' + page_number
            var outerBox = '#home';
            var Box = '#home .pag';
            var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
            $(Box + ' #overlayPagination').remove();
            $(Box).append(loaging);
            $.ajax({
                url: url
            }).done(function (data) {
                $(Box).html(data);
                $('.pag #overlayPagination').remove();
            }).fail(function () {
                $('.pag #overlayPagination').remove();
                $('.pag #overlayError').remove();
                var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                $(Box).html(error);
            });
        }

   });
</script>
@endsection

@endsection