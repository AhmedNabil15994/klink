@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
@include('frontend.dashboard.layouts.sidebar2')
<!--profile view side-->
@endsection

@section('page-content')
<link rel="stylesheet" href="/css/css/all.min.css">
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
	    padding: 0;
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
	fieldset img{
		width: 50px;
	    max-height: 100px;
	    margin-right: 10px;
	    margin-left: 15px;
	}
	.first_col .main-row{
		border-right: 1px solid rgba(0, 0, 0, 0.2);
		padding-right: 10px;
	}
	.order-item .order-item__content .second_col .order-important-info .row.fields{
		border-left: 0 ;
		border-right: 1px solid rgba(0, 0, 0, 0.2);
		margin-left: -5px;
		margin-right: -20px;
	}
	.order-offer .results .order-item__content .order-operation{
		border-left: 0;
	}
	.second_col .row.fields .col-xs-12{
		padding:0;
	}
	.order-offer .results .order-item__content .distance-info .distance-list li i.fa-weight-hanging{
		margin-left: 10px;
	}
	.third_col{
		padding: 0;
	}
	.third_col .row.fields .col-xs-12{
		padding-right: 0;
	}
	.first_col fieldset{
		margin-bottom: 0;
	}
	.order-item .order-item__content .second_col .order-important-info{
		border:0;
	}
	@media(max-width: 767px){
		.order-item .order-item__content .second_col .order-important-info .row.fields{
			margin: 0;
		    margin-left: 15px; 
		    margin-top: 15px; 
			border: 0;
		}
	}
	@media(min-width: 768px) and (max-width: 991px){
		.order-item .order-item__content .second_col .order-important-info .row.fields{
			margin: 0;
    		margin-left: -10px;
    		border:0;
    	}
	}
	td .btn{
		padding: 0 12px;
		margin-bottom: 5px;
   	 	width: 100%;
	}
	.packets{
		padding-right: 30px;
		padding-left: 30px;
	}
	.slick-prev{
		left: 0px;
	}
	.slick-next{
		right: 0px;
	}
	.log .row{
		border-left: 1px solid rgba(0,0,0,.2);
    	margin: 0;
	}
	.log .row ul{
		list-style-type: none;
		padding: 0;
	}
	.log .row ul li{
		font-weight: 400;
	    color: #9B9DB8;
	    font-size: 15px;
	    text-transform: capitalize;
	    cursor: pointer;
	    margin-bottom: 5px;
	    padding-left: 10px;
	}
	.log .row ul li:before{
		content: "";
	    height: 10px;
	    width: 10px;
	    background: #f6ab36;
	    border-radius: 50%;
	    display: inline-block;
	    margin-right: 10px;
	    position: absolute;
	    left: 10px;
	    margin-top: 10px;
	}
	td p{
		margin-bottom: 0;
	}
</style>


<div class="pageContent rale">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.partials.newHeader')

        <!--order offer-->
        <div class="order-offer">
            <!--main row-->
            <div class="row">

                <!--map and result row-->
                <div class="col-xs-12">

                    <!--match result row-->
                    <div class="col-xs-12">
                        <div class="match-result">
                            <span> {{$count}} </span> {{trans('frontend/dashboard.matching')}}
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
                                @foreach($data as $trip)
                              	@include('frontend.dashboard.business_customer.driver.layouts.trip')
                            	@endforeach
                        	</div>
                        	<!--here all results-->
                    	</div>
                	</div>
               		<!--order row-->
            	</div>
        	</div>

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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script type="text/javascript">

   	function formatFreights ( d ) {
	    // `d` is the original data object for the row

	    d = JSON.parse(d);
	    console.log(d);
	   	var rows = '';
		$.each(d.stop_freights,function(i,item){
			
			var type = '';
			var type_class = '';
			var category = '';
			var weight = '';
			var width = '';
			var height = '';
			var length = '';
			var sizes = '';
			var cat = '';
			var period = '';
	
			if(item.freights.freight_details.type == 'pick'){
				type = 'Pick Up in '+item.freights.freight_details.pick_period+' Mins';
				type_class = 'pick';
				period = item.freights.freight_details.pick_period;
			}else if(item.freights.freight_details.type == 'drop'){
				type = 'Drop';
				type_class = 'drop';
				period = '';
			}


			if(item.freights.freight_details.freight_cat_id == null){
				category = 'Other';
				cat = 'other';
				weight = item.freights.freight_details.weight;
				length = item.freights.freight_details.length;
				width = item.freights.freight_details.width;
				height = item.freights.freight_details.height;
				sizes = '(weight: '+weight+'Kg l,w,h:'+length+'Cm ,'+width+'Cm ,'+height+'Cm)';
			}else{

				category =item.freights.freight_details.freight_category.category;
				cat = item.freights.freight_details.freight_category.id;
				weight = item.freights.freight_details.freight_category.weight;
				length = item.freights.freight_details.freight_category.length;
				width = item.freights.freight_details.freight_category.width;
				height = item.freights.freight_details.freight_category.height;
				sizes ='(weight: '+weight+'Kg l,w,h:'+length+'Cm ,'+width+'Cm ,'+height+'Cm)';
			}

	   	 	rows += '<tr style= class="trip" data-tester="'+encodeURIComponent(JSON.stringify(item))+'">'+
		            '<td class="freight_name">'+item.freights.name+'</td>'+
		            '<td class="type" data-type="'+type_class+'" data-period="'+period+'">'+type+'</td>'+
		            '<td class="sizes" data-type="'+cat+'" data-weight="'+weight+'" data-width="'+width+'" data-length="'+length+'" data-height="'+height+'"><p>'+category+'</p><p>'+sizes+'</p></td>'+
		            '<td class="number_of_packets">'+item.number_of_packets+'</td>'+
		            '<td class="person" data-id="'+item.order_person.id+'">'+
		            	'<p>'+item.order_person.first_name+' '+item.order_person.last_name+'</p>'+
		            	'<p>'+item.order_person.number.mobile_number+'</p>'+
		            	'<p>'+item.order_person.address.street+' '+item.order_person.address.home+"<br>"+item.order_person.address.postal_code+' '+item.order_person.address.city+"<br>"+item.order_person.address.country_name+'</p>'+
		            '</td>'+
		            '<td class="actions" data-notes="'+item.notes+'">'+
		            	'<button type="submit" class="btn btn-primary btn-xs edit-packet" value="'+item.freight_id+'" data-stop-id="'+d.id+'"><i class="fa fa-edit"></i>Edit</button>'+
						'<button type="submit" class="btn btn-warning btn-xs delete-packet" value="'+item.freight_id+'"><i class="fa fa-trash"></i>{{trans('main.delete')}}</button>'+
		            '</td>'+
		        '</tr>';
	   	});    	

	   	return '<div class="addition_stop text-left">Stop '+d.id+' Freights :- </div><table class="table demo-foo-filtering table-hover daTatable trips dataTable text-center" id="freight-data-'+d.id+'"  cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
		    	'<thead>'+
		    	'<tr style="background-color: #EEE;">'+
		    	'<th>Freight Name</th>'+
		    	'<th>Freight Type</th>'+
		    	'<th>Freight Category</th>'+
		    	'<th>Number Of Packets</th>'+
		    	'<th>Receiver</th>'+
		    	'<th>{{trans('main.action')}}</th>'+
		    	'</tr>'+
		    	'</thead>'+
		    	'<tbody>'+
		    	rows+
		    	'</tbody>'+

		    	'</table>';
	    	
	}


    $(function(){

    	$('.third_col').on('click','.details-trip',function(e){
    		e.preventDefault();
    		e.stopPropagation();
    		var myElement = $(this).parents('.main-item-content').find('div.row:nth-of-type(2) .col-xs-12 .order-item__slide');
    		myElement.fadeToggle(500);

    		$(this).children('span.fas').toggleClass('fa-long-arrow-alt-up');
    	});


    	$(document).on('click','li#li_packets',function(){
    		$(this).parents('.order-item__slide').find('#details.active .packets').slick();
    	});

       	
    	var l = $('.ladda-button').ladda();
		var l5 = $('.ladda-button5').ladda();
	
		// Activate And Show Freight Table inside Stop Row
		var table = $('.stops-table').DataTable();
		$(document).on('click', '.stops-table tbody td.details-control', function () {
			var id =  $(this).parents('table').attr('id');
			id = id.replace('stops-table-','');
	        var tr = $(this).closest('tr');
	        var row = $('#stops-table-'+id).DataTable().row( tr );
	        if ( row.child.isShown() ) {
	            // This row is already open - close it
	            $(document).find('#stops-table-'+id+' #freight-data-'+tr.data('tester').id).DataTable().destroy();
	            row.child.hide();
	            tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	           	
	            row.child( formatFreights(JSON.stringify(tr.data('tester'))) ).show();
	            var newTable = $('#stops-table-'+id+' #freight-data-'+tr.data('tester').id).DataTable({
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


    });
</script>

@endsection