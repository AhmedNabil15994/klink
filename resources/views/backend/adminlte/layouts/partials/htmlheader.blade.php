<head>
    <meta charset="UTF-8">
    <title> {{config('app.name')}} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link type="text/javascript" src="{{asset('plugins/iCheck/all.css')}}" />
    <link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <link href="{{asset('plugins/ladda-buttons/css/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('css/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/css/fa-solid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/css/fa-brands.min.css')}}">
    <link href="{{ asset('plugins/lou-multi-select/css/multi-select.css')}}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/timePicker.css')}}">
    <link href="{{asset('css/bootstrap-editable.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/plugins/date/jquery.datetimepicker.min.css')}}">
    
    <style type="text/css">
        .modal-body .col-xs-12{
            margin-bottom: 15px;
        }
        i.fa-check{
            font-size: 24px;
            color: #449D44;
        }
        i.fa-times{
            font-size: 24px;
            color: #C9302C;
        }
        .input-append.date .add-on i, .input-prepend.date .add-on i{
            margin-top: -20px;
            margin-left: 5px;
        }
        .input-append.date input.input-small{
            padding-left: 20px;
        }
        .sidebar-menu li a,.logo:hover{
            text-decoration: none;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
        color: #666;
        }
        .notifyjs-bootstrap-base.notifyjs-bootstrap-error{
            background-color: #d9534f !important;
            color: #FFF !important;
            border-color: #d43f3a !important;
        }
        .notifyjs-bootstrap-base.notifyjs-bootstrap-success{
            background-color: #449d44 !important;
            color: #FFF !important;
            border-color:#398439 !important;
        }
        .tab-content{
            border: 1px solid #DDD;
        }
        .pag{
            border: 1px solid #DDD;
            padding: 20px 20px; 
            background-color: #FFF;
            border-radius: 5px;
            box-shadow: 5px 5px 5px #999;
        }
        .table tbody tr > td{
            text-align: center !important; 
        }
        .content-wrapper, .right-side , .wrapper{
            background-color: #FFF !important;
        }
        .label{
            background-color: #358eda;
            padding: 5px;
            margin-bottom: 10px; 
            display: inline-block;
        }
        #form_search input.form-control{
            display: block;
            width: 100% !important;
            position: relative;
        }
        #form_search .input-group-btn{
            position: absolute;
            right: 0;
        }
        .row{
            margin-bottom: 20px;    
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
        .btn-warning{
            background-color: #FFAD33;
            padding: 6px 5px;
            padding-left: 10px;
            display: inline-block;
            font-size: 12px;
        }
        .btn-warning:hover{
            opacity: .8;
        }
        .tax-delete{
            padding: 0;
            font-size: 12px;
            padding: 2px 7px;
            background-color: #ed3f14;
        }
        .taxs .text{
            border: 1px solid #e9eaec;
            background-color: #f7f7f7;
            padding: 5px;
            display: block;
            width: fit-content;
            margin: auto;
            margin-bottom: 10px;
        }
        .taxs .rate{
            min-width: 40px;
        }
        th.edit{
            position: relative;
        }
        th.edit div{
            position: absolute;
            top: 0;
            left: 0;
            padding: 5px 15px;
            display: block;
            width: 100%;
            text-align: center;
        }
        td .btn{
            margin-bottom: 5px;
        }
        .tab-pane{
            padding: 15px;
            border-top: 0;
        }
        .select2{
            width: 50% !important;
            display: inline-block;
        }
        #datatable_paginate{
            text-align: left;
        }
        .pag{
            position: relative;
        }
        #overlayPagination{
            position: absolute;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(255,255,255,.5);
        }
        #overlayPagination i.fa{
            font-size: 100px;
            color: #888;
            display: block;
            margin: auto;
            margin-top: 100px;
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
        #search{
            float: left;
        }
        .dataTables_wrapper .row:nth-of-type(2) .col-sm-12{
            overflow: auto;
        }
        .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body{
            background-color: transparent !important;
            color: #505458 !important;
            border: 0 !important;
        }
    </style>    

    @yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
