@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/bills.userList') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/bills.userList') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/bills.userList')
}}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/bills.userList') }}
@endsection
 
@section('main-content')
<link rel="stylesheet" href="/css/plugins/date/jquery.datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<style>
    .reGenerate {
        right: 15px;
        top: 2.5px;
        cursor: pointer;
        padding: 5px;
        position: absolute;
        transition: .5s;
    }

    .reGenerate.rotating {
        animation: rotate infinite .5s;
    }

    @keyframes rotate {
        from {
            transform: rotate(0DEG)
        }
        to {
            transform: rotate(360DEG)
        }
    }

    .reGenerate i.fa {
        font-size: 20px;
        color: #444444;
    }

    #bills-table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    #bills-table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    #bills-table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    #bills-table th,
    #bills-table td {
        padding: .625em;
        text-align: center;
    }

    #bills-table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    #bills-table td:first-child i.fa {
        display: none;
    }

    @media screen and (max-width: 992px) {
        #bills-table {
            border: 0;
        }

        #bills-table caption {
            font-size: 1.3em;
        }

        #bills-table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        #bills-table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
            padding: 0;
            border-radius: 10px;
            transition: .5s;
        }

        #bills-table tr.hidden-tableraw {
            border-bottom: 0px;

        }
        #bills-table tr.hidden-tableraw td:first-child {
            border-radius: 10px;
        }

        #bills-table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
            /* transition: .5s; */
            min-height: 10px;
        }

        #bills-table td:first-child {
            background-color: #5cb85c;
            border-color: #4cae4c;
            color: #ffffff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: relative;
            display: block;
            transition: .5s;

        }

        #bills-table td:first-child i.fa {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 20px;
            display: block;
        }


        #bills-table td::before {
            /*
        * aria-label has no advantage, it won't be read inside a #bills-table
        content: attr(aria-label);
        */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
            min-width: 100px;

        }

        #bills-table td:last-child {
            border-bottom: 0;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    }

    .btn-xs.action-small {
        border-radius: 100%;
        padding: 0;
        width: 30px;
        height: 30px;
    }

    .btn-xs.action-small i.fa {
        font-size: 20px;
        line-height: 30px;
        margin: 0;
    }
    .excel{
        margin-right: 10px;
    }
    .zoomIn,.zoomOut{
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }
    .dropdown-menu>li{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{
        color: #4cae4c !important;
        background: #ffffff !important;
    }
</style>
    @include('backend.adminlte.bills.newBillModal')
    @include('backend.adminlte.bills.editBillModal')
    @include('backend.adminlte.bills.detectTimeModal')
<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">

            <div class="row" style="margin-bottom: -35px;margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
            </div>
            <div class="row" style="margin-bottom: -35px;margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right excel"  value=""><img width="15" src="/images/excil.svg" alt=""><span>{{ trans('backend/bills.excelExpot') }}</span></button>
            </div>

            <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
                id="bills-table">
                <thead>
                    <tr style="background-color: #EEE;">
                        <th>{{ trans('backend/bills.number') }}</th>
                        <th>{{trans('backend/bills.orderNumber')}}</th>
                        <th>{{trans('backend/bills.customer')}}</th>
                        <th>{{trans('backend/bills.orderCost')}}</th>
                        <th>{{trans('backend/bills.tax')}}</th>
                        <th>{{trans('backend/bills.fees')}}</th>
                        <th>{{trans('backend/bills.subTotal')}}</th>
                        <th>{{trans('backend/bills.discount')}}</th>
                        <th>{{trans('backend/bills.billDate')}}</th>
                        <th>{{trans('backend/bills.note')}}</th>
                        <th>{{trans('backend/bills.paymentType')}}</th>
                        <th style="width:120px;">{{trans('backend/bills.actions')}}</th>

                    </tr>
                </thead>

                <tbody>
                    <?php $i=0; ?> @foreach($bills as $bill)
                    <tr class="selected{{$bill->id}}">
                        <td data-label="{{trans('backend/bills.number')}}" class="billNumber" >{{$bill['number']}} <i class="fa fa-minus"></i></td>
                        <td data-label="{{trans('backend/bills.orderNumber')}}" class="orderNumber">{{$bill['order_num']}}</td>
                        <td data-label="{{trans('backend/bills.customer')}}" class="customer">{{$bill['customerName']}}</td>
                        <td data-label="{{trans('backend/bills.orderCost')}}" class="orderCost">{{$bill['order_cost']}}</td>
                        <td data-label="{{trans('backend/bills.tax')}}" class="orderTax">{{$bill['tax']}}</td>
                        <td data-label="{{trans('backend/bills.fees')}}" class="orderFees">{{$bill['fees']}}</td>
                        <td data-label="{{trans('backend/bills.subTotal')}}" class="sub_total">{{$bill['sub_total']}}</td>
                        <td data-label="{{trans('backend/bills.discount')}}" class="orderDiscount">{{$bill['discount']}}</td>
                        <td data-label="{{trans('backend/bills.billDate')}}" class="billDate">{{$bill['invionce_date']}}</td>
                        <td data-label="{{trans('backend/bills.note')}}" class="note">{{$bill['note']}}</td>
                        <td data-label="{{trans('backend/bills.paymentType')}}" class="paymentType">{{$bill['payment_type']}}</td>
                        <td data-label="{{trans('backend/bills.actions')}}" class="action">
                            <button class="btn btn-success btn-xs edit action-small" data-toggle="tooltip" title="{{trans('backend/bills.edit')}}" value="{{$bill->id}}"><i  class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-xs delete action-small" data-toggle="tooltip" title="{{trans('backend/bills.delete')}}"
                                value="{{$bill->id}}"><i class="fa fa-close"></i></button>
                                <a style="color:#ffffff;" target="_blank" href="{{route('bill.print',['bill'=>$bill['id']])}}" class="btn btn-success btn-xs  action-small" data-toggle="tooltip" title="{{trans('backend/bills.print')}}" ><i  class="fa fa-print"></i></a>
                            {{-- <div class="dropdown" style="display:inline-block;">
                                <button class="btn btn-xs action-small btn-primary  dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a style="color:#ffffff;" target="_blank" href="{{route('bill.print',['bill'=>$bill['id']])}}" class="btn btn-success btn-xs  action-small" data-toggle="tooltip" title="{{trans('backend/bills.print')}}" ><i  class="fa fa-print"></i></a>
                                    </li>
                                </ul>
                            </div> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @if(!count($bills))
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
    @include('backend.adminlte.layouts.modals.confirm_delete')
    @include('backend.adminlte.layouts.partials.scripts')
<script type="text/javascript" src="/css/plugins/date/jquery.datetimepicker.full.min.js"></script>
<script>
    $(function () {
            window.lastUpdatedBill =0;
            $(document).on('click', '.add', function () {
                $('#add-bill').modal('toggle');
            });
            window.ExcelReportData = {
                startDate:'',
                endDate :'',
            }

            $(document).on('click','.excel',function(){
                
                $('#ExcelReportTimeModal').modal('toggle');
            });
            function testAnim(x) {
                $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
            };
            $('.modal').on('show.bs.modal', function (e) {
                
                testAnim('zoomIn');
            })
            $('.modal').on('hide.bs.modal', function (e) {
                
                testAnim('zoomOut');
            })
            $(document).on('click', '.edit', function () {
                window.lastUpdatedBill = $(this).val();
                var id = $(this).attr('value');
                parent = $('tr.selected' + id);
                $('#edit-bill .billNumber').val(parent.children('td.billNumber').text())
                $('#edit-bill .orderNumber').val(parent.children('td.orderNumber').text())
                $('#edit-bill .customer').val(parent.children('td.customer').text())
                $('#edit-bill .orderCost').val(parent.children('td.orderCost').text())
                $('#edit-bill .orderTax').val(parent.children('td.orderTax').text())
                $('#edit-bill .orderFees').val(parent.children('td.orderFees').text())
                $('#edit-bill .orderDiscount').val(parent.children('td.orderDiscount').text())
                $('#edit-bill .billDate').val(parent.children('td.billDate').text())
                $('#edit-bill .paymentType').val(parent.children('td.paymentType').text())
                $('#edit-bill .note').val(parent.children('td.note').text())
                $('#edit-bill').modal('toggle');
            });
            $('[data-toggle="tooltip"]').tooltip(); 
            if($(window).width()<='992'){

                $('#bills-table td').each(function(){
                    $(this).parent('tr').addClass('hidden-tableraw');
                    $(this).parent('tr').children('td:gt(0)').slideUp(500);
                    $(this).children('i').removeClass('fa-minus')
                    $(this).children('i').addClass('fa-plus')
                })
            }
            $('#bills-table td:first-child').click(function(){
                if($(this).children('i').hasClass('fa-minus')){
                    $(this).parent('tr').addClass('hidden-tableraw');
                    $(this).parent('tr').children('td:gt(0)').slideUp(500);
                    $(this).children('i').removeClass('fa-minus')
                    $(this).children('i').addClass('fa-plus')
                    // $(this).parent('tr').children('td:first-child').slideDown(500);
                }else{
                    $(this).parent('tr').removeClass('hidden-tableraw');
                    $(this).parent('tr').children('td:gt(0)').slideDown(500);
                    $(this).children('i').removeClass('fa-plus')
                    $(this).children('i').addClass('fa-minus')
                }
            })
            $(document).on('click','.delete',function(){
                $('#confirm-delete').modal('toggle');
                var id = $(this).attr('value');

                $(document).on('click','#confirm-delete .btn-danger' ,function(e){

                    e.preventDefault();
                    e.stopPropagation();
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                    url: "{{route('bill.destroy')}}",
                    type: 'POST',
                    data: {
                        '_token' : $('input[name="_token"]').val(),
                        'id'	: id,
                    } ,
                    success: function (data) {
                    
                        $.notify("Deleted successfully \n Bill Deleted Successfully",{ position:"top right" ,className:"success"});
                        $('#confirm-delete').modal('toggle');
                        $('.selected'+id).remove();
                        close();
                    },        
                    error: function(data){
                        $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                    });

                });

            });
         });

</script>
@endsection

@endsection