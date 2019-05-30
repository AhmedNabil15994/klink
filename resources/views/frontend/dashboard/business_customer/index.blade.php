@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
@include('frontend.dashboard.layouts.sidebar2')
<!--profile view side-->
@endsection

@section('page-content')
<link rel="stylesheet" href="/css/css/all.min.css">
<link rel="stylesheet" href="/userdashboard/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css">
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css"/>

<style type="text/css">

@media (max-width:400px){
   /* Full-screen display */
   .datetimepicker.datetimepicker-dropdown-bottom-left {
    left: 25px !important;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}

.container-fluid{
    padding-left:.5rem;
    padding-right:.5rem;
}
}




.main-item-content.active {
    background: #F6AB36;
}
.ship-info{
    margin-top: 15px;
}
.ship-info img{
    width: 50px;
    max-height: 100px;
    margin-right: 10px;
    margin-left: 15px;
}
.main-item-content {
    transition: .3s linear;
}

.mybtn {
    display: inline-block;
    margin-bottom: 0;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.vehicle-name {
    font-size: 12px;
    width: 100%;
    text-align: center;
}

.ship-info-wrapper {
    margin-left: 15px;
    display: flex;
    flex-wrap: wrap;
}

.order-offer .results .order-item__content .order-operation .button .offer-number {
    background: #FFF !important;
    color: #000 !important;
}

.comment {
    color: #FFF;
    background-color: #F6AB36;
    cursor: pointer;
    -webkit-transition: all ease-in-out .25s;
    -moz-transition: all ease-in-out .25s;
    -o-transition: all ease-in-out .25s;
    transition: all ease-in-out .25s;
    padding: .5rem 1rem !important;
}

.countdown {
    width: 100%;
    text-align: center;
    display: block;
    font-size: 18px;
    font-weight: bold;
    color: rgba(0, 0, 0, 0.4);
    margin-bottom: 1rem;
}

body {
    overflow-x: hidden;
}

span.back {
    background: url('/img/box.png');
    background-size: 20px 20px;
    background-repeat: no-repeat;
    width: 20px;
    height: 20px;
    display: inline-block;
}

#OrdersOnMap {
    height: 300px;
    margin-bottom: 2rem;
}

.head-order-item {
    background: #FFF;
    padding: 1rem;
    padding-left: 1rem;
    border-right: .3rem solid #f6ab36;
    box-shadow: 0 0.1rem 0.5rem rgba(0, 0, 0, 0.1);
    border-radius: .3rem;
    margin-bottom: 1.5rem;
    padding-bottom: 0;
    cursor: pointer;
}

@media (min-width:1680px){
    .order-operation .custom-date-field span{
        right:20% !important;
    } 
}


@media (max-width:1920px){
    .editable-container.editable-inline{
       width: 70%;
   }
}

@media (max-width:1440px){
    .editable-container.editable-inline{
        width: 65%;
    }
    .order-item .main-item-content {
        padding-bottom: 1rem !important;
    }
}

.editable-input{
    position:relative;
} 
.editable-input .icon-th{
    position: absolute;
    top: .6rem;
    left: .5rem;
}
.editable-input .input-append.date{
}
.editable-input input{
    padding:.5rem 1rem;
    border:.1rem solid #e3e3e3;
    border-radius:.3rem;
    padding-left:2.5rem;
    width:100%;
}
.editable-input input:focus{
 outline:none;
}

.editable-buttons button{
    padding:.85rem 1rem !important;
}
.order-offer .results .order-item__content .order-details .float-left.date{
    width: 100%;
    margin-bottom: .5rem;
}
.select-car button{
    padding: .5rem 1rem;
    border: none;
    border-radius: .3rem;
    color: #505050;
    background: #dedede;
    font-size: 1.4rem;
}
.selectShipPicker{
    width: 100% !important;
    margin-top: 1rem;
}
.order-offer .results .order-item__content .load-info{
    border: 0;
    height: auto;
    padding-left: 0;
}
span.name,
span.phone{
    font-size: 1rem;
    color: rgba(0, 0, 0, 0.4);
}
.load-items{
    text-align: left;
}

.order-offer .results .order-item__content{
    margin-bottom: 0;
}  
.custom-style55 .load-items p.load-para-sub-2{
    display: inline-block;
} 
.button--blue-spin{
    background: #4184b5;
    color: #FFF;
}
.touch-spin.form-control{
    border-right: 0;
}
.bootstrap-touchspin-up,
.bootstrap-touchspin-down{
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.button.button--blue-spin{
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
}
.bootstrap-touchspin-postfix{
    background: transparent;
    border-left: 0;
    padding-left: 0;
}
.button--blue-spin:hover,
.button--blue-spin:focus
{
    background: #4184b5;
    color: #FFF;
}
.map {
    position: unset !important;
}

.pagination-wrapper {
    font-size: 1.4rem;
}
.top-squares-menue {
    padding: 0;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    /* justify-content: flex-start; */
    margin-bottom: 0;
    position: absolute;
    top: 0rem;
    width: 100%;
    left: 0;
    height: 3rem;
}
.top-squares-menue .top-square{
    padding: 5px;
    flex-grow: 1;
    text-align: center;
    background: #ededed;
}

.button-input-wrapper{
    position: relative;
}
.button-input-wrapper i{
    position: absolute;
    top: 51%;
    right: 6px;
    font-size: 20px;
    /* width: 100px; */
    /* height: 100px; */
    color: rgba(0, 0, 0, 0.4);
    transform: translateY(-50%);
}
.order-offer .results .order-item__content .order-details .date .float-left.icon{
    margin-left: 0;
} 
.order-offer .results .order-item__content .order-details .date span.template-loc{
    margin-left: 1rem;
}
.order-offer .results .order-item__content .order-details{
    margin-bottom: 0
}
ul.days{
    list-style-type: none;
    padding: 0;
}
ul.days li{
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
    color:#FFF;
    border:2px solid #94140e;

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
    color: #191B34 !important;
    font-size: 14px !important;
    border: 0 !important;
    margin-bottom: 5px;
}
fieldset span.pull-left,
fieldset span.pull-right{
    font-weight: 400;
    color: #9B9DB8;
    font-size: 12px;
    text-transform: capitalize;
    cursor: pointer;
    display: inline-block;
    margin-bottom: 5px;
}
fieldset span.pull-right,
.order-info-block .icon-me{
    color: rgba(0, 0, 0, 0.4);
}
.row.fields .order-details{
    margin-left: 1rem !important;
}
.row.measure{
    margin-left:5px;
    margin-bottom: 5px;
}
.row.measure .col-xs-12{
    padding-right:0;
}
.order-item .order-item__content .order-important-info,
.order-offer .results .order-item__content .order-operation{
    height: unset;
    padding-left:1.5rem;
}
.second_col{
    padding-right: 0;
}
.ship-info{
    margin-top: 0;
    font-size: 13px;
    color: rgba(0, 0, 0, 0.4);
}
ul.additional_days {
    margin-bottom: 0;
}
.order-offer .results .order-item__content .distance-info .distance-list li{
    font-size: 1.2rem;
}
.order-offer .results .order-item__content .distance-info .distance-list li i{
    width: 15px;
}
.custom-class.enter-offer .col-sm-6{
    margin-right: 5px;
    width: calc(50% - 5px);
}
td.details-control {
    background: url("{{asset('images/details_open.png')}}") no-repeat center center;
    cursor: pointer;
    padding:10px !important;
}
tr.shown td.details-control {
    background: url("{{asset('images/details_close.png')}}") no-repeat center center;
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
    text-align: center;
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
.dataTables_wrapper .row:nth-of-type(2) .col-sm-12{
    overflow: auto;
}
.col-xs-12 #myTrips_wrapper .row{
    margin:0;
}
@media(max-width: 767px){
    .order-item .order-item__content .order-important-info, .order-offer .results .order-item__content .order-operation{
        padding-left: 0;
    }
}
.row.main{
    margin:0;
}
.pagination>li>a, .pagination>li>span{
    padding: 0px 12px !important;
    font-size: 16px;
}
div.dataTables_wrapper div.dataTables_info{
    white-space: unset;
}
.slick-arrow:before{
    color:#000;
}
</style>




<div class="pageContent rale">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.partials.newHeader')

        <!--order offer-->
        <div class="order-offer">
            <!--main row-->
            <div class="row">

                <!--<div class="col-xs-12">
                    <div class="col-xs-12">
                        <div id="OrdersOnMap">
                        </div>
                    </div>
                </div> -->


                <!--map and result row-->
                <div class="col-xs-12">

                    <!--match result row-->
                    <div class="col-xs-12">
                        <div class="match-result">
                            <span>  </span> {{trans('frontend/dashboard.matching')}}
                        </div>
                    </div>
                    <!--match result row-->

                    <!--order row-->
                    <div class="row">
                        <div class="col-xs-12">
                            <!--here all results-->
                            <div class="results">

                                <!--results row-->

                                <!--one result item-->
                                @foreach($data as $tour)

                                @php
                                    $myTour = $tour->tour_offer()->where('company_profile_id',auth::user()->profile->id)->first();
                                @endphp 

                                @if(!$myTour || $myTour->tour_id != $tour->id)
                                <!--order item-->
                                @if(!$tour->accepted_offer)
                                <div class="order-item two" id="order-item-id">

                                    <div class="col-lg-8 col-md-12">
                                        <div class="id-place">
                                            <span class="fas fa-database"></span> id : {{$tour->id}}
                                        </div>

                                        <div class="main-item-content">

                                            <!--first row-->
                                            <div class="row" style="margin-right: 0">
                                                <div class="col-xs-12">
                                                    <!--content-->
                                                    <div class="order-item__content clear-fix">
                                                        <!--internal row-->
                                                        <div class="row ">
                                                            @include('frontend.dashboard.business_customer.partials.first_col')
                                                            
                                                            @include('frontend.dashboard.business_customer.partials.second_col')

                                                            @include('frontend.dashboard.business_customer.partials.third_col')

                                                            
                                                        </div>
                                                        <!--internal row-->
                                                    </div>
                                                    <!--content-->



                                                </div>
                                            </div>
                                            <!--first row-->

                                        </div>


                                    </div>
                                    
                                    

                                    <div class="col-lg-4 col-md-12">
                                        <!--new order content-->
                                        <div class="new-order-content tour_packets" style="padding-top:3rem;width:100%;">
                                            <ul class="top-squares-menue">
                                                <li class="top-square new-make-offer">
                                                 Packets
                                                </li>
                                            </ul>

                                             <div class="custom-class enter-offer">

                                                <!--second row-->
                                                <div class="row">
                                                    <div class="col-xs-12">

                                                        <div class="pick-deliver">

                                                            <div class="slide-content first-slide active">

                                                                <div class="col-xs-12">
                                                                    <div class="pick-map">
                                                                        <div class="packets">
                                                                            @foreach($tour->stops as $stop)
                                                                            @foreach($stop->stop_freights as $packet)
                                                                            <fieldset>
                                                                                <legend class="order-heading">{{$packet->freights->id.' - '.$packet->freights->name}}</legend>
                                                                                <span class="pull-left">Type </span>
                                                                                <span class="pull-right">
                                                                                    @if($packet->freights->freight_details->type == 'pick')
                                                                                    Pick Up In {{$packet->freights->freight_details->pick_period}} Min
                                                                                    @else
                                                                                    Drop
                                                                                    @endif
                                                                                </span>
                                                                                <div class="clearfix"></div>
                                                                                <span class="pull-left">Category</span>
                                                                                <span class="pull-right text-right" style="width: calc(100% - 51px);">
                                                                                   @if($packet->freights->freight_details->freight_cat_id)
                                                                                    @php $category = $packet->freights->freight_details->freight_category; @endphp
                                                                                    {{$category->category}}<br>
                                                                                    (weight: {{(int) $category->weight}} Kg, l,w,h: {{(int) $category->length}}Cm ,{{(int) $category->width}}Cm ,{{(int) $category->height}}Cm)
                                                                                   @else
                                                                                   @php $category = $packet->freights->freight_details; @endphp
                                                                                    Other<br>
                                                                                    (weight: {{(int) $category->weight}} Kg, l,w,h: {{(int) $category->length}}Cm ,{{(int) $category->width}}Cm ,{{(int) $category->height}}Cm)
                                                                                   @endif

                                                                                </span>
                                                                                <div class="clearfix"></div>
                                                                                <span class="pull-left">Number Of Items </span>
                                                                                <span class="pull-right">{{$packet->number_of_packets}} Item</span>
                                                                                <div class="clearfix"></div>

                                                                                <span class="pull-left">Stop </span>
                                                                                <span class="pull-right">{{$packet->stop->id.' - '.$packet->stop->name}}</span>
                                                                                <div class="clearfix"></div>

                                                                                <span class="pull-left">Receiver Information:-</span><br><div class="clearfix"></div>

                                                                                <span class="pull-left">Name </span>
                                                                                <span class="pull-right">{{$packet->order_person->name()}}</span>
                                                                                <div class="clearfix"></div>

                                                                                <span class="pull-left">Mobile </span>
                                                                                <span class="pull-right">{{$packet->order_person->number->mobile_number}}</span>
                                                                                <div class="clearfix"></div>

                                                                                <span class="pull-left">Address </span>
                                                                                <span class="pull-right">{!! $packet->order_person->address->addressForm() !!}</span>
                                                                                <div class="clearfix"></div>

                                                                            </fieldset>
                                                                            @endforeach
                                                                            @endforeach
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <!--second row-->

                                            </div>

                                        </div>
                                        <!--new order content-->
                                    </div>

                                    @include('frontend.dashboard.business_customer.partials.trip_stops')

                                    @include('frontend.dashboard.business_customer.partials.time_periods')

                            </div>
                            <!--order item-->
                            <!--one result item-->
                                @endif
                                @endif
                            @endforeach

                        </div>
                        <!--here all results-->

                        <!--results row-->
                    </div>

                </div>
                <!--order row-->


            </div>





        </div>


        <!--main row-->


        @if(!empty($data))
        <div class="box-footer">
            <div class="pagination-wrapper">{!! $data->render() !!} </div>
        </div>
        @endif
    </div>
    <!--order offer-->


</div>
</div>
<!--pageContent-->
@endsection
@section('scripts')
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('datetime/bootstrap-datetimepicker.min.js')}}"></script>
<script src="/userdashboard/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
type="text/javascript"></script>


<script type="text/javascript">
    var stops;
    function format ( d , dd) {
        // `d` is the original data object for the row

        d = JSON.parse(d);
        dd = JSON.parse(dd);
        var rows = '';
        $.each(d.trip_stops,function(i,item){
            mobile ='';
            street ='';
            home ='';
            postal_code ='';
            city ='';
            country_name ='';
            description ='';
            duration ='';
            
            if(item.stops.number_id != null){
                if( item.stops.stop_number != null){
                    mobile = item.stops.stop_number.mobile_number;
                }
            }else if(item.stops.number_id == null){
                mobile ='';
            }
            
            var selectedStop = dd.filter(obj => {
              return obj.id === item.stops.id;
            });
            var address = selectedStop[0].stop_address;

            if(address){
                street = address.street;
                home = address.home;
                postal_code = address.postal_code;
                city = address.city;
                country_name = address.country_name;
            }

            if(item.stops.stop_description ){
                description = item.stops.stop_description;
            }

            if(item.stops.duration){
                duration = item.stops.duration+' Min';
            }


            rows += '<tr>'+
            '<td>'+item.stops.name+'</td>'+
            '<td>'+item.stops.stops_number+'</td>'+
            '<td>'+description+'</td>'+
            '<td>'+item.stops.weight+" Kg"+'</td>'+
            '<td>'+duration+" Min"+'</td>'+
            '<td>'+mobile+'</td>'+
            '<td>'+street+" "+home+"<br>"+postal_code+" "+city+"<br>"+country_name+'</td>'+
            '</tr>';
        });     

        return '<table class="table table-hover daTatable trip_stops dataTable text-center" id="stops-data-'+d.id+'"  cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
        '<thead>'+
        '<tr>'+
        '<th>Stop Name</th>'+
        '<th>Stops Number</th>'+
        '<th>Description</th>'+
        '<th>Weight</th>'+
        '<th>Duration</th>'+
        '<th>Mobile</th>'+
        '<th>Address</th>'+
        '</tr>'+
        '</thead>'+
        '<tbody>'+
        rows+
        '</tbody>'+

        '</table>';

    }   
    $(function(){
        $('button#tour_packets').on('click',function(){
            $('.packets').slick();

        });
        // Activate And Show Stops Table inside Trip Row
        $('table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var table = $(this).parents('table');
            var row = table.DataTable().row( tr );
            if ( row.child.isShown() ) {
                // This row is already open - close it
                $(document).find('.trip_stops').DataTable().destroy();
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                
                row.child( format(JSON.stringify(tr.data('tester')),JSON.stringify(tr.data('tester2'))) ).show();
                var newTable = $('#stops-data-'+tr.data('tester').id).DataTable({
                    "pageLength": 5,
                    'language': {
                        paginate: {
                            next: '<span class="fas fa-angle-right"></span>',
                            previous: '<span class="fas fa-angle-left"></span>'
                        }
                    }
                });
                tr.addClass('shown');

            }
        } );


        $('.selectShipPicker').on('change',function(){

            var id = $(this).data('tour');
            var name = $(this).children('option:selected').data('driver');
            var phone = $(this).children('option:selected').data('phone');
            var value = $(this).children('option:selected').val();

            if( value != 'e'){
                $('#DriverInfo'+id+' span.name').html(name);
                $('#DriverInfo'+id+' span.phone').html(phone);
            }else{
                $('#DriverInfo'+id+' span.name').empty();
                $('#DriverInfo'+id+' span.phone').empty();
            }

        });


        $('.submitoffer').on('click',function(e){
            var l = $('.ladda-button').ladda();
            e.preventDefault();
            e.stopPropagation();
            $('.ladda-button').ladda('start');
            var price = $(this).data("price");
            var id = $(this).data("id");
            var parent = $(this).parents(".main-item-content");
            var driver_profile_id = parent.find('.selectShipPicker option:selected').data('id'); 
            var vehicle_id = parent.find('.selectShipPicker option:selected').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('user.business_customer.storeOffer')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'standard_tour_price': price,
                    'tour_id': id,
                    'company_offer': $(this).siblings('div').children('#offer-number').val(),
                    'driver_profile_id': driver_profile_id,
                    'vehicle_id': vehicle_id,
                    
                },
                success: function (data) {
                    if (isNaN(data)) {
                        $.each(data['errors'], function (i, item) {
                            $.notify("Whoops \n" + item, {
                                position: "top right",
                                className: "error"
                            });
                        });
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                        },2000);
                    } else if (data == 1) {
                        $.notify("Sent successfully \n Offer Sent Successfully", {
                            position: "top right",
                            className: "success"
                        });
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                            location.reload();
                        }, 2000);
                    }
                },
                error: function (data) {
                    $.notify("Whoops \n Error may be in connection to server", {
                        position: "top right",
                        className: "error"
                    });
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    }, 2000)
     
                }

            });
        });

    });
</script>

@endsection