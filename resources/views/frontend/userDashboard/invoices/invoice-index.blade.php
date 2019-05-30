@extends('frontend.userDashboard.index')
@section('sidebar2')
<!--profile view side-->
    @include('frontend.userDashboard.layouts.sidebar2')
<!--profile view side-->
@endsection
@section('page-content')
<style type="text/css">
    .label{
        color: #FFF !important;
    }
    .label-primary{
        padding-left: 2.2rem !important;
        padding-right: 2.2rem !important;
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
    .tab-content{
        box-shadow: unset !important;
    }
</style>
<div class="pageContent rale">
    <div class="container-fluid">

        <div class="invoice-index">



                                   


                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Hello <span>{{$profile->first_name.' '.$profile->last_name}}</span>, Welcome!</h4>
                        <p class="text-muted page-title-alt">Here is your Account Invoices.</p>
                    </div>
                </div>
                <!-- Page-Title -->


                <!--account setting fieldset-->
                <div class="row">
                    <div class="col-sm-12">

                        <fieldset>
                            <legend>
                                <i class="fa fa-copy 

                                "></i>account invoices
                            </legend>






                            <!--table row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--order space-->
                                    <div class="order-space clearfix">

                                        <!--col-->
                                        <div class="col-sm-12">
                                            <!--order card-->
                                            <div class="orderCard">

                                                <!--order head-->
                                                <div class="order-head">
                                                    <h3 class="order-heading">Your invoices</h3>
                                                    <p class="order-paragraph">here your invoices </p>
                                                </div>
                                                <div class="tab-content">
                                                    <div id="home" class="tab-pane active in">
                                                        <div class="row ul-row">
                                                            <ul class="panel-nav pull-left">
                                                                <li><a class="active al" id="state-all" href="javascript:void(0)" link="{{route('user2.invoices')}}">All</a></li>
                                                                <li><a class="al" id="paid" href="javascript:void(0)" link="{{route('user2.paid')}}">Paid</a></li>
                                                                <li><a class="al" id="unpaid" href="javascript:void(0)" link="{{route('user2.unpaid')}}">Un-paid</a></li>
                                                            </ul>
                                                        </div>
                                                        <!--order data-->
                                                        <div class="order-data">



                                                            <!--table head-->
                                                            <table class="table table-hover  daTatable dataTable demo-foo-filtering" id="demo-foo-filtering2">

                                                                <!--table head-->
                                                                <thead class="table__header">
                                                                    <tr class="table__header--row">
                                                                        <th>Order No</th>
                                                                        <th>Source</th>
                                                                        <th>Destination</th>
                                                                        <th>Reciever</th>
                                                                        <th>total</th>
                                                                        <th>status</th>

                                                                    </tr>
                                                                </thead>
                                                                <!--table head-->


                                                                <!--table body-->
                                                                <tbody class="table__body">

                                                                    @foreach($data as $one)
                                                                    <?php 
                                                                        $receiver = \DB::table('receivers')->where('order_id','=',$one->order_id)->first();
                                                                        $status = '';
                                                                        if($one->paid == $one->cost){
                                                                            $status = 'Paid';
                                                                            $class = 'primary';
                                                                        }else{
                                                                            $status = 'Un-paid';
                                                                            $class = 'danger';
                                                                        }
                                                                    ?>
                                                                    <tr class="table__body--row" value="{{$one->order_id}}">              

                                                                        <td class="car-head">
                                                                            <span class="fas fa-file-alt">

                                                                            </span> {{$one->order_id}}
                                                                        </td>
                                                                        <td>{{$one->source}}</td>
                                                                        <td>{{$one->destination}}</td>
                                                                        <td>{{$receiver->first_name.' '.$receiver->nick_name}}</td>
                                                                        <td>{{$one->cost}} &euro;</td>
                                                                        <td><label class="label label-{{$class}}">{{$status}}</label></td>

                                                                        
                                                                    </tr>
                                                                    @endforeach


                                                                </tbody>
                                                                <!--table body-->

                                                            </table>
                                                            <!--table head-->

                                                            
                                                            

                                                        </div>
                                                    </div>
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
                            <!--table row-->




                          
                           







                        </fieldset>

                    </div>
                </div>
                <!--account setting fieldset-->



        </div>
    </div>
</div>        
@endsection

@section('scripts')



<script type="text/javascript">
    $(function(){
        $(document).on('click','.table__body--row',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id = $(this).attr('value');
            var route = "{{route('user2.invoice',[$id='uid'])}}";
            route = route.replace('uid',id);
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
            url = url || '?page=' + page_number;
            var outerBox = '#home';
            var Box = '#home .order-data';
            var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
            $(Box + ' #overlayPagination').remove();
            $(Box).append(loaging);
            $.ajax({
                url: url
            }).done(function (data) {
                $(Box).html(data);
                $('.order-data #overlayPagination').remove();
            }).fail(function () {
                $('.order-data #overlayPagination').remove();
                $('.order-data #overlayError').remove();
                var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                $(Box).html(error);
            });
        }


    });
</script>
@endsection