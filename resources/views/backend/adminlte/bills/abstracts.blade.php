@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('frontend/order.abstracts') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/bills.abstracts') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/bills.abstracts')
}}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/bills.abstracts') }}
@endsection
 
@section('main-content')
<link rel="stylesheet" href="/css/plugins/date/jquery.datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<style type="text/css">
    .tab-row.main{
        cursor: pointer;
    }
</style>

<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">
            
            <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
                id="bills-table">
                <thead>
                    <tr style="background-color: #EEE;">
                        <th>{{trans('backend/bills.abstract_no')}}</th>
                        <th>{{trans('backend/bills.source')}}</th>
                        <th>{{trans('backend/bills.destination')}}</th>
                        <th>{{trans('backend/bills.sender')}}</th>
                        <th>{{trans('backend/bills.receiver')}}</th>
                        <th>{{trans('backend/bills.company')}}</th>
                        <th>{{trans('backend/bills.cost')}}</th>
                        <th>{{trans('backend/bills.tax')}}</th>
                        <th>{{trans('backend/bills.total')}}</th>
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
            var route = "{{route('bill.bill_abstract',['order_id' => 'uid'])}}";
            route = route.replace('uid', id);
            window.location.href = route;
        });
   });
</script>
@endsection

@endsection