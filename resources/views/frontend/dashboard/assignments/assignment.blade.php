@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
@include('frontend.dashboard.layouts.sidebar2')

<!--profile view side-->
@endsection



<?php 
    $test_type = \Crypt::decrypt($type);

?> @if($test_type == 'pending' )
<style type="text/css">
    .order-offer .results .order-item.complete {
        border-left: .5rem solid #f6ab36 !important;
    }
    
</style>
@elseif($test_type == 'cancelled')
<style type="text/css">
    .order-offer .results .order-item.complete {
        border-left: .5rem solid #d9534f !important;
    }
</style>
@elseif($test_type == 'finished')
<style type="text/css">
    .order-offer .results .order-item.complete {
        border-left: .5rem solid #398bf7 !important;
    }
</style>
@endif 
@section('page-content')
<link rel="stylesheet" href="/css/css/all.min.css">
<style type="text/css">
    .first_cont {
        margin: 0 !important;
        background-color: #FFF;
        box-shadow: 0 0.1rem 0.5rem rgba(0, 0, 0, 0.1);
    }

    .orders {}

    .orders p:first-of-type {
        font-size: 30px;
        margin-bottom: 0;
    }

    .orders p:last-of-type {
        font-size: 12px;
        color: #666;
    }

    .first_cont div.col-md-5.col-sm-6.col-xs-12 {
        padding: 0;
    }

    .type {
        border-bottom: 1px solid #DDD;
        cursor: pointer;
    }

    .type:hover {
        background-color: #f9f9f9;
    }

    .type.active {
        color: #FFF;
    }

    .type.active .orders p:last-of-type {
        color: #DDD;
    }

    .type.success {
        border-right: 5px solid #009124;
    }

    .type.success.active {
        background-color: #04b12f;
    }

    .type.primary {
        border-right: 5px solid #398bf7;
    }

    .type.primary.active {
        background-color: #547aad;
    }

    .type.orange {
        border-right: 5px solid #f6ab36;
    }

    .type.orange.active {
        background-color: #da8500;
    }

    .type.danger {
        border-right: 5px solid #d9534f;
    }

    .type.danger.active {
        background-color: #c50803;
    }

    .type a,
    .type a:hover,
    .type a:active,
    .type a.active {
        text-decoration: none;
        color: unset;
    }

    .results {
        margin-top: 15px;
    }

    .row.first_row {
        margin: 0;
        margin-bottom: 20px;
    }

    .row.second_row {
        margin: 0;
        border: 1px solid #DDD;
        padding: 15px 0;
        margin-bottom: 20px;
        display: none;
    }

    .second_row .col-xs-1 {
        padding-top: 7px;
        font-size: 18px;
        color: #777;
        padding: 0;
        margin-right: 10px;
    }

    .second_row .col-xs-10 {
        padding: 0;
    }

    .order-offer .results .order-item__slide .tab-list li {
        width: 33.3333333% !important;
    }

    .countdown {
        font-size: 18px;
        font-weight: bold;
        color: #333 !important;
        margin-left: 10px;
    }

    .fa-times {
        color: #c50803;
    }

    .second_row #city2 {
        margin-bottom: 10px;
    }

    @media(max-width: 767px) {
        .row.second_row input {
            margin-bottom: 15px;
        }
        .second_row #city,
        .second_row #city2 {
            margin-left: 12px;
        }
    }

    .gm-svpc {
        display: none;
    }
</style>
<style type="text/css">
    .map {
        position: unset !important;
    }

    .pagination-wrapper {
        font-size: 1.4rem;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-color: transparent;
    }

    .nav-tabs {
        margin-bottom: 2rem;
    }

    .main-wrapper .pageContent {
        height: unset;
        min-height: 100vh !important;
    }
</style>
<style type="text/css">
    .heade {
        position: relative;
    }

    .test {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #FFF;
        opacity: .7;
    }

    .test img {
        width: 8rem;
        height: 8rem;
        display: block;
        margin: auto;
        margin-top: 20%;
    }
</style>
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
        margin-left: 10px;
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
    .row.pagination-row{
        display: block;
        width: 100%;
        float: left;
        margin-left: 1.5rem;
    }
    .order-offer .results .order-item__content{
        margin-bottom: 0;
    }
    .order-item .main-item-content{
        padding-bottom: 1rem;
    }
</style>
<style type="text/css">
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
    .top-squares-menue .top-square.active{
        background:#fff;
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
</style>

<style type="text/css">
    @media(max-width: 767px){
        .order-offer .results .order-item__content .load-info{
            padding-top: 0;
        }
        .order-item__content .row .col-md-3{
            margin-bottom: 1.5rem;
        }
        .order-item__content .row .col-md-3.new-data{
            margin-bottom: 0;
        }
        .order-offer .results .order-item__content .order-operation{
            padding-top: 0;
            height: auto;
        }
        .order-offer .results .order-item.complete .order-operation .button--blue{
            margin-bottom: 0;
        }
    }
    @media(min-width: 768px) and (max-width: 991px){
        .order-item__content .row .col-md-3{
            margin-bottom: 1.5rem;
        }
        .order-item .order-item__content .order-important-info{
            border-left: 0;
            padding-left: 0;
        }
        .order-offer .results .order-item__content .order-operation{
            height: auto;
            padding-top: 0;
        }
        .order-item__content .row .col-md-3:last-of-type{
            margin-bottom: 0;
        }
        .order-item .order-item__content .new-data .order-important-info{
            border-left: 1px solid rgba(0, 0, 0, 0.2);
            padding-left: 2rem;
        }
    }
    @media(min-width: 992px) and (max-width: 1199px){
        .order-offer .results .order-item__content .row .col-md-3:first-of-type{
            width:40%;
        }
        .order-offer .results .order-item__content .row .col-md-3:nth-of-type(2),
        .order-offer .results .order-item__content .row .col-md-3:nth-of-type(3){
            width:30%;
            padding-right: 0;
        }
        .order-offer .results .order-item__content .row .col-md-3:last-of-type{
            width: 100%;
        }
    }
    @media(min-width: 1200px) and (max-width: 1325px){

    }
</style>
<!--pageContent-->
<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')

        <div class="row first_cont">
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="col-xs-12 type success {{Active(Helper::type($profile->status).'.assign')}}">
                    <a href="{{route(Helper::type($profile->status).'.assign')}}">
                        <div class="orders">
                            <p>{{$count1}}</p>
                            <p>{{trans('frontend/dashboard.accepted')}} ({{trans('frontend/dashboard.prog')}})</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 type primary {{Active(Helper::type($profile->status).'.finished')}}">
                    <a href="{{route(Helper::type($profile->status).'.finished')}}">
                        <div class="orders">
                            <p>{{$count4}}</p>
                            <p>{{trans('frontend/dashboard.finished')}}</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 type orange {{Active(Helper::type($profile->status).'.pending')}}">
                    <a href="{{route(Helper::type($profile->status).'.pending')}}">
                        <div class="orders">
                            <p>{{$count2}}</p>
                            <p>{{trans('frontend/dashboard.pending')}}</p>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 type danger {{Active(Helper::type($profile->status).'.cancelled')}}">
                    <a href="{{route(Helper::type($profile->status).'.cancelled')}}">
                        <div class="orders">
                            <p>{{$count3}}</p>
                            <p>{{trans('frontend/dashboard.cancelled')}}</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-sm-6 col-xs-12">
                <div class="row my">
                    <div class="col-xs-12">
                        <canvas id="myChart" width="200" height="79" style="margin-top: 19px;margin-bottom: 18px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="type" class="type" value="{{$type}}">
        <div class="tab-content">
            <div id="home" class="tab-pane active in">
                <!--order offer-->
                <div class="order-offer">

                    <!--results row-->
                    <div class="row heade">
                        <div class="col-xs-12 managed">
                            <!--here all results-->

                            <div class="results">

                                <div class="row first_row">
                                    <button class="btn btn-md btn-primary pull-right filter"> <i class="fas fa-filter"></i> {{trans('frontend/dashboard.filter')}}</button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row second_row">
                                    <div class="col-xs-12">
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 0">
                                            <div class="col-xs-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text" id="country" placeholder="{{trans('frontend/order.country')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="number" id="postal_code" placeholder="{{trans('frontend/order.postal_code')}}" />
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="text" id="city" placeholder="{{trans('frontend/order.town')}}" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 15px;">
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 0">
                                            <div class="col-xs-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text" id="country2" placeholder="{{trans('frontend/order.country')}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="number" id="postal_code2" placeholder="{{trans('frontend/order.postal_code')}}" />
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="text" id="city2" placeholder="{{trans('frontend/order.town')}}" />
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <button class="btn btn-md btn-primary pull-right search"><i class="fas fa-search"></i> {{trans('frontend/dashboard.search')}}</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="assign-item Cancelled active">
                                    @if($test_type == 'finished')
                                    @include('frontend.dashboard.assignments.Ajax.finished')
                                    @elseif($test_type == 'pending')
                                    @include('frontend.userDashboard.layouts.orders')
                                    @elseif($test_type == 'accepted')
                                    @include('frontend.dashboard.assignments.Ajax.accepted')
                                    @elseif($test_type == 'cancelled')
                                    @include('frontend.userDashboard.layouts.orders')
                                    @endif
                                </div>

                            </div>

                            <!--here all results-->

                            <div class="row pagination-row">
                                <div class="box-footer">
                                    <div class="pagination-wrapper">{!! $data->render() !!} </div>
                                </div>
                            </div>
                        </div>
                        <div class="test">
                            <img src="{{asset('images/ajax-loader.gif')}}">
                        </div>
                    </div>
                    <!--results row-->


                </div>
                <!--order offer-->
            </div>
        </div>
    </div>
</div>
<!--pageContent-->
@endsection
 
@section('scripts') {{--
<script src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script> --}}

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    var ctx = document.getElementById("myChart").getContext('2d');
    var votesData = {
        labels: [
            "{{trans('frontend/dashboard.prog')}}",
            "{{trans('frontend/dashboard.finished')}}",
            "{{trans('frontend/dashboard.pending')}}",
            "{{trans('frontend/dashboard.cancelled')}}"
        ],
        datasets: [
            {
                data: [{{$count1}} , {{$count4}} , {{$count2}} ,{{$count3}} ],
                backgroundColor: [
                    "#009124",
                    "#398bf7",
                    "#f6ab36",
                    "#d9534f",
                ]
            }]
    };
    var options ={
        segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 2,
            percentageInnerCutout : 50,
            animationSteps : 100,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            responsive: true,
            maintainAspectRatio: true,
            showScale: true,
            animateScale: true
        };
    var doughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: votesData,
        options:options,
    });

    $(function(){

        $(document).on('click','.filter',function(e){
            e.preventDefault();
            e.stopPropagation();
            $('.second_row').slideToggle(500);
        });

        @if($test_type == 'pending' )
        $('[data-countdown]').each(function() {
          var $this = $(this), finalDate = $(this).data('countdown');
          $(this).empty();
          $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('%H:%M:%S'));
          });
            
        });

        @endif


                $(document).on('click','.search',function(e){
            e.preventDefault();
            e.stopPropagation();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('filter')}}",
                type: 'GET',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'type': $('input[name="type"]').val(),
                    'country': $('input#country').val(),
                    'country2': $('input#country2').val(),
                    'postal_code': $('input#postal_code').val(),
                    'postal_code2': $('input#postal_code2').val(),
                    'city': $('input#city').val(),
                    'city2': $('input#city2').val(),
                } ,
                success: function (data) {
                        $('.pagination-wrapper').remove();
                        setTimeout(function(){
                            $('.test').toggle();
                        },2500);
                        $('.assign-item').empty();
                        $('.test').toggle();  
                        $('.managed').html(data);
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });     

        $(document).on('click','.pagination-wrapper.tested .pagination .page-link',function(e){
            e.preventDefault();
            var page = $(this).attr('href');
            getItems(page);
            window.history.pushState("", "", page);
        });                

        function getItems(page){
            
            $.ajax({
                url:page,
                data:{
                    '_token': $('input[name="_token"]').val(),
                    'type': $('input[name="type"]').val(),
                    'country': $('input#country').val(),
                    'country2': $('input#country2').val(),
                    'postal_code': $('input#postal_code').val(),
                    'postal_code2': $('input#postal_code2').val(),
                    'city': $('input#city').val(),
                    'city2': $('input#city2').val(),
                }
            }).done(function(data){
                setTimeout(function(){
                    $('.test').toggle();
                },2500);
                $('.assign-item').empty();
                $('.test').toggle();  
                $('.managed').html(data);
            });
        }  


        $(document).on('click','.delievered',function(e){
            e.preventDefault();
            e.stopPropagation();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.done')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': $(this).data('value'),
                } ,
                success: function (data) {
                    $.notify("Success \n Order is delievered successfully.",{ position:"top right" ,className:"success"});
                    setTimeout(function(){
                        location.reload();
                    },2000);
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });

        $(document).on('click','.take_money,.pick_up,.pick_up_done,.to_destination',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id = $(this).data('value');
            var kind = $(this).data('kind');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.edit_steps')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': id,
                    'type': kind,
                } ,
                success: function (data) {
                    $.notify("Success \n Order Information Updated successfully.",{ position:"top right" ,className:"success"});
                    setTimeout(function(){
                        location.reload();
                    },2000);
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });

        });
        $(document).on('click','.new-button-offer.confirm',function(e){
            e.preventDefault();
            e.stopPropagation();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.confirmed')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'id': $(this).data('value'),
                } ,
                success: function (data) {
                    $.notify("Success \n Order is Confirmed successfully.",{ position:"top right" ,className:"success"});
                    setTimeout(function(){
                        location.reload();
                    },2000);
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });
        
        var geocoder;
        var geocoder2;
        var directionsDisplay ;
        var directionsService = new google.maps.DirectionsService();   
        var IDs = [];

        town = '';
        town2 = '';
        postal_code = '';
        postal_code2 = '';
        country = '';
        country1 = '';
        country2 = '';

        function getAdd(address , address2 , my_id){
            geocoder = new google.maps.Geocoder();
                  geocoder.geocode( { 'address': address}, function(results, status) {
                      if (status == 'OK') {
                        for (var i=0; i<results[0].address_components.length; i++) {
                            for (var b=0;b<results[0].address_components[i].types.length;b++) {

                                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                    town = results[0].address_components[i].long_name;
                                }
                                if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                    postal_code = results[0].address_components[i].long_name;
                                }
                                if(results[0].address_components[i].types.indexOf('country') > -1) {
                                    country = results[0].address_components[i].short_name;
                                    country1 = results[0].address_components[i].long_name;
                                }
                                
                            }
                        }   
                        $('#from'+my_id).text(country +' ' + postal_code + ' ' + town);
                        $('#froms'+my_id).text(country +' | ' + postal_code + ' ' + town);
                        $('#fromt'+my_id).text(country1);

                      } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                      }
                  });

            geocoder2 = new google.maps.Geocoder();
                  geocoder2.geocode( { 'address': address2}, function(results, status) {
                      if (status == 'OK') {
                        for (var i=0; i<results[0].address_components.length; i++) {
                            for (var b=0;b<results[0].address_components[i].types.length;b++) {

                                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                    town2 = results[0].address_components[i].long_name;
                                }
                                if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                    postal_code2 = results[0].address_components[i].long_name;
                                }
                                if(results[0].address_components[i].types.indexOf('country') > -1) {
                                    country2 = results[0].address_components[i].short_name;
                                }
                            }
                        }   
                        $('#to'+my_id).text(country2 +' ' + postal_code2 + ' ' + town2);
                        $('#tos'+my_id).text(country2 +' | ' + postal_code2 + ' ' + town2);
                      } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                      }
                  }); 

        }


        @foreach($data as $order)
        <?php  $send_receive = \DB::table('order_send_receives')->where('order_id','=',$order->order_id)->first(); ?>
            @if(empty($send_receive))
                id = '{{$order->order_id}}';
                item = [id,'{{$order->source}}','{{$order->destination}}'];
                IDs.push(item);
            @endif         
        @endforeach
        address = '';
        address2 = '';
        my_id = '';

        for (var i = 0; i < IDs.length; i++) {
            var id = IDs[i];
            for (var x = 0; x < id.length; x++) {
                address = id[1];
                address2 = id[2];
                my_id = id[0];
            }
            getAdd(address , address2 , my_id);
        }
        


        $(document).on('click','.show-details', function (){
            $(this).toggleClass('active');
            $(this).parents('.order-item').find('.order-item__slide').slideToggle();
            $(this).parents('.order-item').siblings().find('.order-item__slide').slideUp();
            
            $(this).parents('.one_order').siblings('.one_order').find('.order-item__slide').slideUp()

            var source = $(this).siblings('.source').val();
            var destination = $(this).siblings('.destination').val();
            var id = $(this).siblings('.id').val();
            var place = 1;
            getLocation(id,source,destination,place);
        });

        @foreach($data as $order)
            getLocation("{{$order->order_id}}","{{$order->source}}","{{$order->destination}}",0);   
        @endforeach

        function getLocation(id,source,destination,place){
                var latlng = new google.maps.LatLng(52.52000659999999, 13.404953999999975);
                var myOptions = {
                    minZoom: 9,
                    zoom:10,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: false,
                    mapTypeControl: false,
                };
                /*var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                    geocoder = new google.maps.Geocoder;
                    directionsDisplay.setMap(map);
                    calcRoute(source,destination);*/
                if(place == 1){
                    var map = new google.maps.Map(document.getElementById('googlemap'+id), myOptions);
                }else{
                    var map = new google.maps.Map(document.getElementById('googlemaps'+id), myOptions);
                }
                calcRoute(source,destination,map);
        }
        function calcRoute(start, end, map) {
            var request = {
                origin:start,
                destination:end,
                travelMode: google.maps.TravelMode.DRIVING    
            };
            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    //directionsDisplay.setDirections(response);
                    var directionsRenderer = new google.maps.DirectionsRenderer(); 
                    directionsRenderer.setMap(map); 
                    directionsRenderer.setDirections(response); 
                }else{
                        switch (status) {
                            case "NOT_FOUND": { 
                                alert("Either the start location or destination were not recognised"); 
                                break;
                            };
                            case "ZERO_RESULTS": {
                                alert("No route could be found between the start location and destination"); 
                                break; 
                            };
                            case "MAX_WAYPOINTS_EXCEEDED": {
                                alert("Maximum waypoints exceeded. Maximum of 8 allowed"); 
                                break; 
                            };
                            case "INVALID_REQUEST": { 
                                alert("Invalid request made for obtaining directions"); 
                                break;
                            };
                            case "OVER_QUERY_LIMIT": {
                                alert("This webpage has sent too many requests recently. Please try again later"); 
                                break; 
                            };
                            case "REQUEST_DENIED": { 
                                alert("This webpage is not allowed to request directions"); 
                                break; 
                            };
                            case "UNKNOWN_ERROR": { 
                                alert("Unknown error with the server. Please try again later"); 
                                break; 
                            };
                        }
                }
            });
        }
          




    });

</script>
@endsection