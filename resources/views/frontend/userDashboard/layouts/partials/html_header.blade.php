<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
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

    <style type="text/css">
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

      @font-face {
        font-family: myNumberFont;
        src: url({{asset('fonts/CalibreTest-Bold.woff')}});
      }

      .myNumberFont {
        font-family: myNumberFont;
        font-weight: bold;
        letter-spacing: 1px;
      }

      @media (max-width:600px){

        #demo-foo-filtering_filter{
          float:right;
        }

        div.dataTables_wrapper div.dataTables_length label{
          margin-top:2.5rem;
        }


      }
    /*
      @media (min-width:2881px) and (max-width:3120px){
          html{
              font-size:160% !important;
          }
      }

      @media (min-width:2881px) and (max-width:3120px){
          html{
              font-size:140% !important;
          }
      }

      @media (min-width:2560px) and (max-width:2880px){
          html{
              font-size:120% !important;
          }
      }


      @media (min-width:2161px) and (max-width:2559px){
          html{
              font-size:105% !important;
          }
      }


      @media (min-width:1921px) and (max-width:2160px){
          html{
              font-size:95%;
          }
      }

      @media (min-width:1681px) and (max-width:1920px){
          html{
              font-size:85% !important;
          }
      }


      @media (min-width:1441px) and (max-width:1680px){
          html{
              font-size:75% !important;
          }
      }
      */
      
        html{
          font-size:62.5% !important;
        }
      

    </style>
  </head>
  <body>