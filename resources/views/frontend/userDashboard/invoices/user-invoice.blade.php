@extends('frontend.userDashboard.index')
@section('sidebar2')
<!--profile view side-->
    @include('frontend.userDashboard.layouts.sidebar2')
<!--profile view side-->
@endsection
<link href="/userdashboard/assets/css/user-invoice.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .send{
        margin-right: 1rem;
        margin-left: 1rem;
    }
    @media print{
        .row.actions{
            display: none;
        }
        .user-invoice .total .total-value{
            margin-right: 3rem;
        }
        .total .total-value {
          padding: 2rem !important;
          float: right !important;
        }

        .total .total-value p {
          font-size: 1.5rem !important;
          padding: .5rem !important;
        }

        .total .total-value span {
          display: inline-block !important;
          width: 20rem !important; 
          margin-right: 10px !important;
          font-weight: 700 !important;
          text-transform: uppercase !important;
        }

    }
</style>
@section('page-content')

<div class="pageContent rale">
    <div class="container-fluid">
        <!--user invoice-->
        <div class="user-invoice">
                            
                            <!--invoice heading-->
                            <div class="container-fluid">
                                <div class="company-heading">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1 class="play">kurierlink co</h1>
                                            <p class="rubik">
                                                click to transport.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--invoice heading-->
                            
                            <!--company address-->
                            <div class="container-fluid">
                                <div class="company-address rubik">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span>
                                                Haackzeile 13, 13589 Berlin, Germany 
                                            </span>
                                            <span>
                                                +2541-2547891
                                            </span>
                                            <span>
                                                kurierlink@admin.com
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company address-->

                            <!--invoice head and bill info-->
                            <div class="container-fluid">
                                <div class="invoice-head">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="invoice-heading">
                                                <p>
                                                    # {{$order->order_id}}
                                                </p>
                                                <h2 class="rubik">
                                                    invoice
                                                </h2>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="bill-to rubik">
                                                <P>
                                                    Bill to :
                                                </P>
                                                
                                                <span>
                                                    {{$receiver->first_name.' '.$receiver->nick_name}}
                                                </span>
                                                
                                                <span>
                                                    {{$receiver->home.' ,'.$receiver->street}}<br>
                                                    {{$receiver->postal_code.' ,'.$receiver->town}}<br>
                                                    {{$receiver->country}}<br>
                                                </span>
                                                
                                                <span>
                                                    {{$receiver->phone}}  
                                                </span>
                                                
                                                <span>
                                                    {{$receiver->email}}  
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            
                            <!--bill information-->
                            <div class="container-fluid">
                                <div class="bill-information">
                                    <div class="row">
                                    
                                        <div class="col-sm-12">
                                            <div class="invoice-dates rubik">
                                                <p>
                                                    <span>Issue date : </span> {{Carbon::parse($order_dates->load_up)->format('Y-m-d')}}
                                                </p>
                                                
                                                <p>
                                                    <span>Due date : </span> {{Carbon::parse($order_dates->delievery_until)->format('Y-m-d')}}
                                                </p>
                                                
                                                <p>
                                                    <span>Company : </span> {{$user->first_name.' '.$user->last_name}}
                                                </p>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                            </div>
                            <!--bill information-->
                            
                            
                            
                            
                            
                            <!--invoice table-->
                            <!--row-->
                            <div class="container-fluid">
                                
                            
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!--order space-->
                                        <div class="order-space">

                                            <!--col-->
                                            <div class="col-sm-12">

                                                                <!--order card-->
                                                                <div class="orderCard">

                                                                

                                                                    <!--order data-->
                                                                    <div class="order-data">



                                                                        <!--table head-->
                                                                        <table class="table">

                                                                            <!--table head-->
                                                                            <thead class="table__header">
                                                                                <tr class="table__header--row">
                                                                                    <th>Qunatity</th>
                                                                                    <th>Length(cm)</th>
                                                                                    <th>Height(cm)</th>
                                                                                    <th>Weight(Kg)</th>
                                                                                    <th>Tax(19%)</th>
                                                                                    <th>Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <!--table head-->


                                                                            <!--table body-->
                                                                            <tbody class="table__body">
                                                                                <?php 
                                                                                    $total = $order->cost;
                                                                                    $percent = 119/100;

                                                                                    $first = round($total / $percent , 2) ;
                                                                                    $vat = round($total - $first , 2);
                                                                                ?>

                                                                                    <tr class="table__body--row">              

                                                                                        <td>{{$order->items}}</td>
                                                                                        <td>{{$order->length}}</td>
                                                                                        <td>{{$order->height}}</td>
                                                                                        <td>{{$order->weight}}</td>
                                                                                        <td>{{$vat}} &euro;</td>
                                                                                        <td>{{$total}} &euro;</td>

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
                            
                            
                            </div>
                            <!--row-->
                            <!--invoice table-->
                            
                            
                            
                            <!--fourth div-->
                            <div class="total rubik">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="total-value">
                                                <p style="border-bottom: 1px solid #DDD;">
                                                    <span>subtotal: </span>  <span class="pull-right text-right">{{$first}} €</span>
                                                </p>

                                                <p style="border-bottom: 1px solid #DDD;">
                                                    <span>vat (19%): </span>  <span class="pull-right text-right">{{$vat}} €</span>
                                                </p>

                                                <p style="border-bottom: 1px solid #DDD;">
                                                    <span>total: </span>   <span class="pull-right text-right">{{$total}} €</span>
                                                </p>

                                                <p style="margin-bottom:0;border-bottom: 0; "> 
                                                    @if($order->is_active == 0)
                                                    <?php 
                                                        $paid = 0;
                                                    ?>
                                                    <span>paid: </span>  <span class="pull-right text-right">{{$paid}} €</span>
                                                    @else
                                                    <?php 
                                                        $paid = $order->paid;
                                                    ?>
                                                    <span>paid: </span>  <span class="pull-right text-right">{{$paid}} €</span>
                                                    @endif
                                                </p>

                                                <p style="background: #f9f9f9;padding: 1rem;border-bottom: 0;margin-top: 2px;border-top: .3rem solid #555;">
                                                     <span>amount due: </span> <span class="text-right">{{round($total - $paid , 2)}} €</span>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--fourth div-->

                            
                            <div class="row actions" style="padding: 0;margin: 0;margin-bottom: 2.5rem;">
                                <a href="{{route('download_pdf',['id'=> $encrypted])}}" class="btn btn-xs btn-default"><i class="fa fa-save fa-1x"></i> Download</a>
                                <a href="#" class="btn btn-xs btn-default send" value="{{$encrypted}}"><i class="fa fa-envelope fa-1x"></i> Send Email</a>
                                <a href="#" class="btn btn-xs btn-default" onclick="window.print()"><i class="fa fa-print fa-1x"></i> Print</a>
                            </div>
                            
        </div>
    </div>
</div>

<!--user invoice-->
@endsection

@section('scripts')
<script type="text/javascript">
    $(function(){
        $('.send').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id = $(this).attr('value');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('sendInvoice')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': id,
                } ,
                success: function (data) {
                    if (isNaN(data)){
                        $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                        });      
                    }else{  
                        $.notify("Success \n Email Sent Successfully",{ position:"top right" ,className:"success"});
                    }
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });
    });
</script>
@endsection