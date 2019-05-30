@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
@include('frontend.dashboard.layouts.sidebar2')
<!--profile view side-->
@endsection


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

    .order-offer .results .order-item__slide .tab-content .status .operation-timeline{
        padding: 3.8rem !important;
    }
    .contact-sender.sender{
        margin-top: 1.5rem !important;
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
        width: 11rem;
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
    }
    .load-items{
        text-align: left;
    }
    .select-car .row{
        margin: 0;
    }
    .order-offer .results .order-item__content{
        margin-bottom: 0;
    }    
    .new-data p.important-item{
        margin-bottom: .5rem;
    }
    p.important-item img{
        width: 70px !important;
        height: 40px !important;
        min-height: 35px !important;
        filter: none !important;
        filter: grayscale(0) !important;
        -webkit-filter: grayscale(0) !important;
        -moz-filter: grayscale(0) !important;
        cursor: pointer;
        margin-bottom: .5rem;
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
<!--pageContent-->
<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')


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
                                    @include('frontend.dashboard.assignments.Ajax.accepted')
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
    $(function(){


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

    });

</script>
@endsection