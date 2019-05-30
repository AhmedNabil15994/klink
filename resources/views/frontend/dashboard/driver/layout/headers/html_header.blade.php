<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta http-equiv="content-language" content="{{App::getLocale()}}">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{trans('frontend/driver-dashboard/header.title')}}</title>
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-editable.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins/date/jquery.datetimepicker.min.css')}}">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">



    <link rel="stylesheet" href="{{asset('css/userDashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/view-profile.css')}}">

    <!--font awesome-->
	  <link rel="stylesheet" href="{{asset('css/css/fontawesome.min.css')}}">
	  <link rel="stylesheet" href="{{asset('css/css/fa-solid.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/css/fa-brands.min.css')}}">
    <!--datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
     <link rel="stylesheet"href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('plugins/ladda-buttons/css/ladda-themeless.min.css')}}" rel="stylesheet" type="text/css">

    <!--load google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,500" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="/css/driver/header.css">
  </head>
  <body>