@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
{{trans('backend/customer_business.title')}}
@endsection
 
@section('contentheader_title')
{{trans('backend/customer_business.title')}}
@endsection
 
@section('contentheader_description') 
	@yield('customer_business_title')
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
{{trans('backend/customer_business.title')}}
@endsection


@section('main-content')

<style type="text/css">
		.ul-row{
	        border-bottom: 1px solid #DDD;
	        margin-left: 0px;
	        margin-right: 5px;
	    }
	    .row.ul-row{
	    	margin-right: 0 !important;
	    	margin-left: 0 !important;
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
		textarea{
			min-height: 150px;
			max-height: 150px;
			min-width: 100%;
			max-width: 100%;
		}
		.btn-warning{
			padding: 1px 5px !important;
		}
		.modal .form-group ul.days{
			list-style-type: none;
			padding: 0;
		}
		.modal .form-group ul.days li{
			width: 50px;
			height: 50px;
			border: 2px solid #000;
			border-radius: 50%;
			float: left;
		    margin-right: 5px;
		    text-align: center;
		    font-size: 16px;
		    font-weight: 600;
		    padding-top: 14px;
		    margin-bottom: 5px;
		    cursor: pointer;
		    -webkit-transition: all ease-in-out .25s;
		    -moz-transition: all ease-in-out .25s;
		    -o-transition: all ease-in-out .25s;
		    transition: all ease-in-out .25s;
		}
		.modal .form-group ul.days li:hover,
		.modal .form-group ul.days li.active{
			background-color: #000;
			color:#FFF;
			border:2px solid #94140e;
		}
		.pac-container {
		  z-index: 1054 !important;
		}
		.map-input .fa-check{
	        display:none;
	    }
	    .map-input.valid-location .fa-check{
	        display:block;
	        color:#98b71b !important;
	    }

	    .map-input.valid-location .fa-home,
	    .map-input.valid-location .fa-location-arrow{
	        display:none;
	    }
	    .map-input.valid-location input{
	        border-color:#98b71b;
	        padding-left: 25px;
	    }
	    .map-input i.fa {
		    position: absolute;
		    top: 1rem;
		    left: 2.3rem;
		    z-index: 10;
		    color: #f6ab36;
		    font-size: 1.5rem;
		}
		.padd-right{
			padding-right: 0 !important;
		}
		.padd-left{
			padding-left: 0 !important;
		}
		.padder-right{
			padding-right: 5px !important;
		}
		.padder-left{
			padding-left: 5px !important;
		}
		button.add.btn-success{
			visibility: hidden;
		}
		td ul.days{
			list-style-type: none;
			padding: 0;
		}
		td ul.days li{
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
		.dataTables_wrapper .row:first-of-type{
			margin-bottom: 0 !important;
		}
		#home.col-md-9{
			padding-top: 15px;
			padding-bottom: 15px;
		}
		.bigFilter{
			border: 1px solid #DDD;
		    padding: 20px 20px;
		    background-color: #FFF;
		    border-radius: 5px;
		    box-shadow: 1px 1px 10px #999;
		}
		.bigFilter ul.main{
			margin: 0;
			margin-left:5px; 
			padding: 0;
		}
		.bigFilter ul.main>li,
		.bigFilter ul.main>li a{
			font-size: 15px;
			color: #666;
			margin-bottom: 10px;
			text-decoration: none;
		}
		.bigFilter ul.main li ul.inner li{
			margin-top: 5px;
		}
		.bigFilter ul.main li ul.inner li a{
			color: #777;
			font: 14px;
			display: block;
			width: 100%;
			text-decoration: none;
			font-weight: 400;
		}
		.bigFilter ul li a.active{
			font-weight: bold !important;
			color: #333 !important;
		}
</style>

<div class="tab-content">
	@yield('bigFilter')
	<div id="home" class="tab-pane active in">
		@yield('filter')
		<div class="pag">
			<div class="row" style="margin-bottom: -35px;margin-right: 2px;">
				<button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
				<div class="clearfix"></div>
			</div>
			<div class="myTable">
			@yield('table')
			</div>
			
		</div>
	</div>
	<div class="clearfix"></div>
</div>

@endsection

@section('scripts')
	@include('backend.adminlte.layouts.modals.confirm_delete')

	@yield('scripts2')

<script type="text/javascript">
	$(function(){
	
		$(document).on('click','.add',function(){
			$('#add-shipping').modal('toggle');
		});

		$('.delete').unbind('click');

	});

</script>
@endsection

