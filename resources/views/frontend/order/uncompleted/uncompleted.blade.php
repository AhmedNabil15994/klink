@extends('frontend.order.uncompleted.index')
@section('sidebar2')
@include('frontend.order.uncompleted.layouts.sidebar2')
@endsection

@section('page-content')
<?php 
$newOffer = \DB::table('offers')->where('order_id','=',$order->id)->where('is_accepted','=',1)->first();
?>
<link rel="stylesheet" href="{{asset('css/main_order.css')}}">
<link rel="stylesheet" href="{{asset('css/login_style.css')}}">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


<style type="text/css">
	.pay-info-wrapper .payment-iformation{
		flex: 1 0 auto;
	}
	.pay-info-wrapper .payment-form{
		flex: 1 0 auto;
		min-width: 380px;
	}
	.myNumberFont{
		font-size: 16px ;
	}
	.content .step__four .values li .value.myNumberFont,
	.content .step__four .values li .total_value{
		font-size: 14px !important;
	}
	
	.pay-info-wrapper{
		display: flex;
		flex-wrap: wrap;
		width: 100%;

	}
	.StripeElement {
		background-color: white;
		height: 4rem;
		padding: 1rem 1.2rem;
		border-radius: .4rem;
		border: .1rem solid transparent;
		box-shadow: 0 .1rem .3rem 0 #e6ebf1;
		-webkit-transition: box-shadow 150ms ease;
		transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
		box-shadow: 0 .1rem .3rem 0 #cfd7df;
	}

	.StripeElement--invalid {
		border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
		background-color: #fefde5 !important;
	}
	.step__three .icheckbox_square-orange{
		margin-top: .8rem !important;
	}
	.log_space .form-group .custom-span{
		position: initial;
	}
	.log_space .form-group .custom-span::before{
		/* top: -1.7rem; */
		/* left: -3.5rem; */
		font-size: 2rem;
		top: 100%;
		left: 60%;
		transform: translate(-50%,-50%);
	}
	.log_space{
		margin-top: 0;
		margin-bottom:0;
	}
	.content .step__five .compelete-button:disabled{
		background-color: #838383;
	}


	.editable-click, a.editable-click, a.editable-click:hover{
		border:none;
		color:#838383;
	}

	.btn .glyphicon{
		top:unset;
		right:unset;
		font-size:unset;
	}

	.input-append.date .add-on i, .input-prepend.date .add-on i, .input-group.date .input-group-addon span i{
		position:absolute;
		margin-top:-2.6rem;
		width: 2rem;
		height: 2.5rem;
		text-align: center;
		line-height: 2.5rem;
		padding-left:.5rem;
	}

	.input-medium{
		padding-left: 2.5rem;
		border: 1px solid #d4d4d4;
		border-radius: .2rem;
		padding-top: .5rem;
	}
	span.span-info{
		color: #777;
		font-size: 1.7rem;
		font-weight: 700;
		display: inline-block;
		width: 9rem;
	}
	span.span-info.address{
		height: 6rem;
		display: block;
		float: left;
		margin-right: .5rem;
	}
	span.span-data{
		color: #333;
		font-size: 1.5rem;
	}

	.input-medium:focus{
		outline:none;
	}

	@media (max-width:550px){
		.content .own-data li .data-title{
			margin-bottom:1rem;
		}
	}

	@media (max-width:400px){

		.editable-input .form-control{
			width:12.5rem !important;            
		}

		.input-medium{
			width:12.5rem !important;
		}

		.content .own-data li .data-value{
			word-break:break-all;
		}
	}

	@media (max-width:400px){

		.editable-buttons .btn{
			padding:.3rem .6rem !important;
		}
	}
	.valid_until{
		color:  red !important;
		font-size: 1.6rem !important;
		font-weight: bold !important;
	}
	select.selectpicker{
		display: block !important;
	}
	.payment_method img{
		width: 7rem;
		/* height: 35px; */
		height: auto !important;
	}

	ul.own-data:first-of-type li{
		padding: .5rem 1.5rem;
	}
	ul.own-data.last li{
		padding: .5rem;
		padding-left: 0;
	}
	.content .own-data li .data-value{
		border: .1rem solid #EEE;
		background: #EEE;
	}
	.editable-click, a.editable-click, a.editable-click:hover{
		display: block;
	}
	ul.own-data > h4{
		color: #FFF;
	}
	h4.ul-heading{
		margin-bottom: 0;
		padding-bottom: 0;
		margin-top: 1.5rem;
	}
	@media(max-width: 767px){
		.further_info{
			margin-bottom: 2.5rem;
		}
		.content .step__four .store{
			z-index: 999999;
		}
	}
	#userRecieverphone,
	#userRecieveremail,
	#userSenderphone,
	#userSenderemail,
	#deliveryFrom,
	#deliveryUntil,
	#loadFrom,
	#loadUp{
		display: inline-block;
	}
	.payment_method .data p img{
		width: 2.5rem;
		height: 2.5rem;
	}
	.loadImgp{
		color: #838383;
		margin-top: 6rem;
	}
	.time_info div{
		text-align: center;
	}
	.time_icon  p{
		font-size: 1.1rem;
		margin-top: .5rem;
	}
	span.back {
	    background: url("{{asset('/img/box.png')}}");
	    background-size: 2rem 2rem;
	    background-repeat: no-repeat;
	    width: 1.5rem;
	    height: 2rem;
	    display: inline-block;
	}
	.content .step__four .store{
		padding-left: 0;
	}
	.content .step__four .store p,
	.content .step__four .deliver p{
		font-size: 1.3rem;
	}
	.content .step__four .deliver{
		padding-right: 0;
	}
	.content .step__four .order_info{
		padding-bottom: 0;
	}
	.content .step__four{
		min-height: auto;
	}
	.time_info form.editableform{
		position: absolute;
		z-index: 500;
	}
	span.store_heading{
		text-align: center;
	    width: 100%;
	    display: block;
	}
	.last li span.data-value img{
		width: 3.5rem;
	    height: 3.5rem;
	    margin-right: 1rem;
	    border-radius: 50%;
	}
	.content .step__five{
		border: 0;
		padding: 0;
		border-top: .1rem solid #e4e4e4;
		margin-top: 5rem;
		padding-top: 1rem;
		font-size: 1rem;
		color: #888;
		margin-bottom: 0;
	}
	ul.payment_method{
		position: relative;
	}
	div.disable{
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		height: 100%;
		background: rgba(0,0,0,.03);
		z-index: 100;
		cursor: no-drop;
	}
	ul.payment_method{
        list-style:none;
        padding:0;
        margin:0 ;
    }
    ul.payment_method li
    {
        display:inline-block;
        margin: 5px;
    }
    ul.payment_method img{
        width: 70px !important;
        height: 40px !important;
        min-height: 35px !important;
        filter: grayscale(.75) !important;
        -webkit-filter: grayscale(.75) !important; 
        -moz-filter: grayscale(.75) !important;
        transition:all .5s ease-in-out !important;
    }
    ul.payment_method img:hover{
        filter: none;
        filter: grayscale(0) !important;
        -webkit-filter: grayscale(0) !important;
        -moz-filter: grayscale(0) !important;
    }
    ul.payment_method img.hover{
    	filter: none !important;
        filter: grayscale(0) !important;
        -webkit-filter: grayscale(0) !important;
        -moz-filter: grayscale(0) !important;
    }
</style>
<!--pageContent-->
<div class="pageContent rale">
	<div class="container-fluid">
		<div class="content rale" style="background: #FFF;">


			<div class="step_item step__four active" data-list="step_list_4">
				<div class="row">
					<div class="payment_info">

						<div class="col-md-4">

							<div class="row col-xs-12">
								<div class="order_info">
									<h4 class="order_heading">{{trans('frontend/order.order')}}</h4>
									<div class="order_cart">
										<div class="cart_img">
											<img src="{{asset('images/shopping_cart.png')}}" alt="cart">
										</div><!--cart image-->
										<p class="order-title">
											{{trans('frontend/order.order_no')}} : <br>
											<span class="myNumberFont">
												{{$order['id']}}
											</span>
										</p>
									</div><!--order cart-->
								</div><!--order info-->
							</div><!--row-->


							<div class="row col-xs-12">
								<div class="time_info">
									<div class="store text-center col-sm-4 col-xs-12">
										<span class="store_heading">{{trans('frontend/order.store')}}</span>
										@if(Helper::convert($dates['load_from']) == Helper::convert($dates['load_up']))
										<p class="store_from">{!! Helper::convert($dates['load_from']) !!}</p>
										<p class="store_to">
											<span class="data-value">
												<a href="#" id="loadFrom" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
													{{\Carbon::parse($dates['load_from'])->format('H:i')}}
												</a>
											</span>
											- 
											<span class="data-value">
												<a href="#" id="loadUp" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
												{{\Carbon::parse($dates['load_up'])->format('H:i')}}
												</a>
											</span>
										</p>
										@else
										<p class="store_from text-center">
											<span class="data-value">
												<a href="#" id="loadFrom" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
													{{\Carbon::parse($dates['load_from'])->format('Y-m-d H:i')}}
												</a>
											</span>
										</p>
										<p class="store_to text-center">
											<span class="data-value">
												<a href="#" id="loadUp" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
												{{\Carbon::parse($dates['load_up'])->format('Y-m-d H:i')}}
												</a>
											</span>
										</p>
										@endif
										
									</div>

									<div class="time_icon  col-sm-4 col-xs-12">
										<span class="glyphicon glyphicon-time"></span>
										<p><span class="myNumberFont">{{explode(" ", $order_time)[0]}}</span> {{explode(" ", $order_time)[1]}}</p>
										@for($i=0 ; $i<$order->person ; $i++)
                                            <span class="back"></span> 
                                        @endfor
                                        <div class="clearfix"></div>
									</div>

									<div class="deliver  col-sm-4 col-xs-12">
										<span class="deliver_heading">{{trans('frontend/order.delivering')}}</span>
										@if(Helper::convert($dates['delivery_from']) == Helper::convert($dates['delivery_until']))
										<p class="deliver_from">{!! Helper::convert($dates['delivery_from']) !!}</p>
										<p class="deliver_to">
											<span class="data-value">
												<a href="#" id="deliveryFrom" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
													{{\Carbon::parse($dates['delivery_from'])->format('H:i')}}
												</a>
											</span>
											 - 
											<span class="data-value">
												<a href="#" id="deliveryUntil" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
													{{\Carbon::parse($dates['delivery_until'])->format('H:i')}}
												</a>
											</span>
										@else
										<p class="deliver_from text-center">
											<span class="data-value">
												<a href="#" id="deliveryFrom" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
													{{\Carbon::parse($dates['delivery_from'])->format('Y-m-d H:i')}}
												</a>
											</span>
										</p>
										<p class="deliver_to text-center">
											<span class="data-value">
												<a href="#" id="deliveryUntil" data-type="datetime" data-pk="1" data-url="" title="Select date & time">
													{{\Carbon::parse($dates['delivery_until'])->format('Y-m-d H:i')}}
												</a>
											</span>
										</p>
										@endif


									</div>

								</div><!--time_info-->
							</div><!--row-->

							
						</div><!--col-->

						<div class="col-md-4">
							<div class="row col-xs-12">
								<div class="further_info">
									<h4 class="order_heading">{{trans('frontend/order.further_data')}}</h4>
									<ul class="values">
										<li>
											<span class="value_title">
												{{trans('frontend/order.measurement')}}
											</span>
											<span class="value myNumberFont">
												{{$order['length']}}, {{$order['width']}}, {{$order['height']}}/{{$order['weight']}}
											</span>
										</li>

										<li>
											<span class="value_title">
												{{trans('frontend/order.distance')}} 

											</span>
											<span class="value myNumberFont">
												{!! Helper::convNum(round($order['distance'])) !!} Km
											</span>
										</li>

										<li>
											<span class="value_title">
												{{trans('frontend/order.subtotal')}} 
											</span>
											<span class="value cost myNumberFont">
												<?php 
												if($order->offers()->where('is_accepted',1)->count()>0){

													$cost = round($order['cost'] / 1.19 ,2);
													$vat = round($cost * 19/100 , 2);
													$total = round($cost + $vat , 2);
												}else{
													$discount = round($order['cost']*$ship['discount']/100 ,2);
													$after = $order['cost'] + $discount;
													$cost = $order['cost'];
													$vat = round($cost * 19/100 , 2);
													$total = round($cost + $vat , 2);
												}


												?>
												{!! Helper::convNum($cost) !!} €

											</span>
										</li>

										<li>
											<span class="value_title">
												{{trans('frontend/order.inc')}} :
											</span>
											<span class="value vat myNumberFont">
												{!! Helper::convNum($vat) !!} €
											</span>
										</li>



										<li>
											<span class="total">
												{{trans('frontend/order.total')}}
											</span>
											<span class="total_value myNumberFont">
												{!! Helper::convNum($total) !!} €
											</span>
										</li>
									</ul>
								</div><!--order info-->
							</div><!--row-->
						</div><!--col-->
						<div id="app">
							<div class="col-md-4">
								<div class="payment_method">
									@if(isset($newOffer))
										@include('frontend.order.Ajax.payment')
									@else
									<div class="data">
										@if(count($offers))
											@include('frontend.order.Ajax.offer')
										@else
											<p class="loadImgp">{{trans('frontend/order.please_wait')}}
												<img src="{{asset('images/ajax-loader.gif')}}">
											</p>	
										@endif
										<div class="offer-design" style="visibility: hidden;">
											<h4 class="order_heading">{{trans('frontend/order.offers')}}</h4>
											<ul class="values">
												<li>
													<span class="value_title">{{trans('frontend/order.name')}}</span>
													<span class="value_title">{{trans('frontend/order.total')}}</span>
													<span class="value_title">{{trans('frontend/order.action')}}</span>
												</li>
											<ul>
										</div>
									</div>		
									@endif
								</div>
							</div><!--col-->
						</div>

					</div><!--payment info-->
				</div><!--payment info row-->
				<input type="hidden" name="ship_discount" class="ship_discount" value="{{$ship->discount}}">



				<div class="row">
					<div class="col-sm-6 col-xs-12 col-md-4">
						<h4 class="ul-heading">{{trans('frontend/order.sender')}}</h4>
						<ul class="own-data">
							<li class="row">
								<span class="data-title">{{trans('frontend/order.name')}}</span>
								<span class="data-value">
									<a href="#" id="userSendername" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['first_name']}} {{$sender['nick_name']}}</a>
								</span>
							</li>
							<li class="row">
								<span class="data-title">{{trans('frontend/order.address')}}</span>
								<span class="data-value">
									{{$sender['street'].' , '.$sender['home']}}<br>
									{{$sender['postal_code'].' , '.$sender['town']}}<br>
									{{$sender['country']}}
								</span>
							</li>
							<li class="row">
								<span class="data-title">{{trans('frontend/order.phone')}} / {{trans('frontend/order.email')}}</span>
								<span class="data-value"><a href="#" id="userSenderphone" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['phone']}}</a> / <a href="#" id="userSenderemail" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$sender['email']}}</a></span>
							</li>
							@if(isset($sender['company']))
							<li class="row">>
								<span class="data-title">{{trans('frontend/order.company')}}</span>
								<span class="data-value">{{$sender['company']}}</span>
							</li>
							@endif
						</ul>
					</div>
					<div class="col-sm-6 col-xs-12 col-md-4">
						<h4 class="ul-heading">{{trans('frontend/order.receiver')}}</h4>
						<ul class="own-data last">
							<li>
								<span class="data-title">{{trans('frontend/order.name')}}</span>
								<span class="data-value">
									<a href="#" id="userRecievername" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['first_name']}} {{$receiver['nick_name']}}</a>
								</span>
							</li>
							<!--don't change that-->
							<li>

								<span class="data-title">{{trans('frontend/order.address')}}</span>
								<span class="data-value">
									{{$receiver['street'].' , '.$receiver['home']}}<br>
									{{$receiver['postal_code'].' , '.$receiver['town']}}<br>
									{{$receiver['country']}}
								</span>
							</li>
							<!--don't change that-->
							<li>
								<span class="data-title">{{trans('frontend/order.phone')}} / {{trans('frontend/order.email')}}</span>
								<span class="data-value"><a href="#" id="userRecieverphone" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['phone']}}</a> / <a href="#" id="userRecieveremail" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$receiver['email']}}</a></span>
							</li>
							@if(isset($receiver['company']))
							<li>
								<span class="data-title">{{trans('frontend/order.company')}}</span>
								<span class="data-value">{{$receiver['company']}}</span>
							</li>
							@endif
						</ul>
					</div>
					<div class="col-sm-6 col-xs-12 col-md-4">
						<h4 class="ul-heading">{{trans('frontend/order.ship_desc')}}</h4>
						<ul class="own-data last">
							<li>
								<span class="data-title">{{trans('frontend/order.goods_desc')}}</span>
								<span class="data-value"><a href="#" id="description" data-type="text" data-pk="1" data-url="" data-title="Enter username">{{$order->description}}</a></span>
							</li>
							<li>
								<span class="data-title">{{trans('frontend/order.car')}}</span>
								<span class="data-value"><img src="{{asset('images/shippings').'/'.$ship->img}}">{{$ship->title}}</span>
							</li>
						</ul>
					</div>
				</div>

				
				


			</div><!--step four-->  




		</div>    
	</div>
</div>   

<div id="payments" class="modal fade">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title" >{{ trans('frontend/order.payment') }}</h4>

			</div>    
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
						@include('frontend.order.Ajax.payment-form')
					</div>
					<div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">
						<div class="row">
							<div class="col-xs-12">
								<h4 class="billing-heading">{{trans('frontend/order.billing')}}</h4>
								<div class="billing-content">
									<div class="row" style="margin: 0;margin-top: 1.5rem;line-height: 1.5;">

										<?php
										$biller = '';

										if($order->bill_to == 'sender'){
											$biller = \DB::table('senders')->where('order_id','=',$order->id)->first();
										}elseif($order->bill_to == 'receiver'){
											$biller = \DB::table('receivers')->where('order_id','=',$order->id)->first();
										}elseif($order->bill_to == 'other'){
											$biller = \DB::table('order_other_billings')->where('order_id','=',$order->id)->first();
										}

										?>
										<span class="span-info">{{trans('frontend/order.company')}}</span>

										<span class="span-data company">: </span><br>

										<span class="span-info">{{trans('frontend/order.name')}}</span>
										<span class="creditName span-data">: {{$biller->first_name.' '.$biller->nick_name}}</span><br>

										<p>
											<span class="span-info address">{{trans('frontend/order.address')}}</span>
											<span class="span-data"> : 
												{{$biller->street.' '.$biller->home}}<br> 
												&nbsp;{{$biller->postal_code.' '.$biller->town}}<br> 
												&nbsp;{{$biller->country}} 
											</span>

											<span class="clearfix"></span>
										</p>

										<span class="span-info">{{trans('frontend/order.total')}}</span>
										<span class="span-data order_cost"></span>
									</div>
								</div>
							</div>  
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div> 


<form id="paypal" class="paypal" method="POST" action="{{route('paypal')}}">

	{{csrf_field()}}
	<input type="hidden" name="order_id" value="{{$order->id}}">
	<input type="hidden" name="payment_type">

</form>

<form id="bar" class="bar" method="POST" action="{{route('succ', Crypt::encrypt($order->id))}}">

	{{csrf_field()}}
	<input type="hidden" name="order_id" value="{{$order->id}}">

</form>

<div class="modal fade" tabindex="-1" role="dialog" id="commentModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Company Comment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Company: <span class="offer_name"></span> says :</p>
				<textarea class="form-control" readonly style="max-width: 100%; min-width: 100%; max-height: 150px; min-height: 150px;"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div> 

@endsection

@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset('plugins/iCheck/all.css')}}">
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('datetime/bootstrap-datetimepicker.min.js')}}"></script>





<script type="text/javascript">


	$(document).ready(function (){

		/*slide down*/
		$('#description').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_desc')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'description': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Description Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		
		$('#userSendername').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_sender_name')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'name': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Name Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		$('#userSenderphone').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_sender_phone')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'phone': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Phone Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		$('#userSenderemail').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_sender_email')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'email': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Email Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		/*Reciever*/
		

		$('#userRecievername').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_receiver_name')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'name': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Name Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		$('#userRecieverphone').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_receiver_phone')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'phone': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Phone Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		$('#userRecieveremail').editable({
			mode : 'inline',
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_receiver_email')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'email': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Email Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});



		$('#loadFrom').editable({
			type:'datetime',
			mode:'inline',
			format: 'yyyy-mm-dd hh:ii',
			viewformat: 'yyyy-mm-dd hh:ii',
			placement: 'right',
			datetimepicker: {
				todayHighlight: true,
				showMeridian: true,
				minuteStep: 1,
				pickerPosition: "bottom-left",
				format: 'yyyy-mm-dd hh:ii',

			},
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_load_from')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'load_from': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});



		$('#loadUp').editable({
			type:'datetime',
			mode:'inline',
			format: 'yyyy-mm-dd hh:ii',
			viewformat: 'yyyy-mm-dd hh:ii',
			placement: 'right',
			datetimepicker: {
				todayHighlight: true,
				showMeridian: true,
				minuteStep: 1,
				pickerPosition: "bottom-left",

			},
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_load_up')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'load_up': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});


		$('#deliveryFrom').editable({
			type:'datetime',
			mode:'inline',
			format: 'yyyy-mm-dd hh:ii',
			viewformat: 'yyyy-mm-dd hh:ii',
			placement: 'right',
			datetimepicker: {
				todayHighlight: true,
				showMeridian: true,
				minuteStep: 1,
				pickerPosition: "bottom-left",

			},
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_delivery_from')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'delivery_from': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}
		});

		$('#deliveryUntil').editable({
			type:'datetime',
			mode:'inline',
			format: 'yyyy-mm-dd hh:ii',
			viewformat: 'yyyy-mm-dd hh:ii',
			placement: 'right',
			datetimepicker: {
				todayHighlight: true,
				showMeridian: true,
				minuteStep: 1,
				pickerPosition: "bottom-left",

			},
			success: function(response,newValue){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('edit_delivery_until')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'order_id': {{$order->id}},
						'delivery_until': newValue,
					},
					success: function (data) {
						if(data == 1){
							$.notify("Success \n Dates Updated Successfully",{ position:"top right" ,className:"success"});
						}else{
							$.notify("Whoops \n New Order Created !!",{ position:"top right" ,className:"Success"});
							window.location.href = data;
						}
					},        
					error: function(data){
						$.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					}

				});
			}

		});

	});


</script>

<script type="text/javascript">
	$(function(){ 

		function  startiCheck(){
			$(".icheckbox_flat").iCheck({
		        checkboxClass: 'icheckbox_square-blue',
		        radioClass: 'iradio_minimal-blue'
		    }); 

			$('.icheckbox_flat').on('ifChanged',function () {
			    if ($("#one:checked").length == 1){
				   	$('div.select_this').removeClass('disable');
				   	$('ul.payment_method img').addClass('hover');
				}else{
				   	$('div.select_this').addClass('disable');
				   	$('ul.payment_method img').removeClass('hover');
				} 
			});

			$('[data-countdown]').each(function() {
				var $this = $(this), finalDate = $(this).data('countdown');
				$this.countdown(finalDate, function(event) {
					$this.html(event.strftime('%H:%M:%S'));
				});
			});
			
		}
		    
		startiCheck();



	    $(document).on('click','ul.payment_method a',function(e){ 
	    	e.preventDefault();
	    	$('span.span-data.order_cost').text(": "+$('span.total_value').text());
	    	var test_attr = $(this).attr('id');
	    	if($(this).attr('id') == 'paypal' || $(this).attr('id') == 'sepa'){
	    		$('form#paypal input[name="payment_type"]').val($(this).attr('id'));
	    		$('form#paypal').submit();
	    	}else{

	    		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
		    	$.ajax({
		    		type: 'POST',
		    		url: "{{route('setPayment')}}",
		    		data: {
		    			'_token': $('input[name=_token]').val(),
		    			'payment_type': test_attr ,
	    				'order_id': "{{$order->id}}",

		    		},
		    		success:function(data) {   
		    			if(data == 1){
		    				if(test_attr == 'bar'){
					    		$('form#bar').submit();
					    	}else{
					    		$('#payment-form').submit();
					    	} 
			    		}

		    		},   
		    	});     
		    	

	        }

	    });


	    $('.accept').unbind('click');
	    $(document).on('click','.accept',function(e){
	    	e.preventDefault();
	    	e.stopPropagation();
	    	var id = $(this).attr('value');
	    	var total = $(this).attr('data-val');
	    	var check = $(this).attr('data-check');
	    	var discount = $('.ship_discount').val();
	    	var company = $(this).data('company');
	    	var new_total = '';
	    	if(check == 0){
	    		new_total = "{{$total}}";
	    	}else{
	    		x = parseFloat(total / 1.19).toFixed(2);
	    		n = parseFloat( x * ( 1 + (discount/100) )).toFixed(2);
	    		new_discount = parseFloat( (discount / 100 ) * n).toFixed(2);
	    		new_total = parseFloat(n * 1.19).toFixed(2);
	    		new_vat = parseFloat(new_total - n).toFixed(2);

	    	}


	    	$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	    	$.ajax({
	    		type: 'POST',
	    		url: "{{route('offer_edit')}}",
	    		data: {
	    			'_token': $('input[name=_token]').val(),
	    			'order_id': "{{$order->id}}",
	    			'id': id,
	    			'new_total': new_total,
	    		},
	    		success: function(data) {                 
	    			if(data==0){
	    				$.notify("Whoops \n Please Update Your Order Delievery Dates",{ position:"top right" ,className:"error"});
	    			}else if(typeof(data) == 'string'){
	    				$('.payment_method').empty();
	    				$('.payment_method').html(data);
	    				if(check == 1){

	    					$('.further_info .total_value').html(new_total.replace('.',',') + " €");
	    					$('.further_info .cost').html(n.replace('.',',') + " €");
	    					$('.further_info .discount').html(new_discount.replace('.',',') + " €");
	    					$('.further_info .vat').html(new_vat.replace('.',',') + " €");

	    				}
	                    startiCheck();
	                    $('#payment-form input[name="amount"]').val(new_total);
	    			}

	    		},
	    		error: function(data){

	    		}

	    	});       
	    });     

	    $(document).on('click','.comment',function(){
	    	var comment = $(this).siblings('.com').val();
	    	var profile = $(this).siblings('.value.profile').html();
	    	$('.offer_name').text(profile);
	    	$('textarea.form-control').val(comment);
	    });

	    
	});
</script>






<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script>

		    // Enable pusher logging - don't include this in production
		    //Pusher.logToConsole = true;

		    var pusher = new Pusher('c0f7e0f7e60b25c186cc', {
		      cluster: 'eu',
		      forceTLS: true
		    });

		    var channel = pusher.subscribe('order'+"{{$order->id}}");
		    channel.bind('App\\Events\\TaskEvent', function(data) {
		      $('.payment_method .data').children().not('div.offer-design').remove();
		      $('div.offer-design').css('visibility','visible');

		      var cost ;
		      var cost2 ;
		      var check ;
		      if(data.order.min == data.offer.total){
		      	cost = data.order.cost;
		      	cost2 = data.order.cost;
		      	check = 0;
		      }else{
		      	var discount = data.discount;
		      	var total = data.offer.total;
		      	var x = parseFloat(total / 1.19 ).toFixed(2);
				var new_vat = parseFloat( total - x).toFixed(2);
				cost = parseFloat( x * ( 1 + (discount/100) ) ).toFixed(2);
		      	check = 1;
		      	cost2 = total;

		      }


              $('div.offer-design ul.values').append('<li><span class="value profile">'+data.profile.first_name+' '+data.profile.last_name+'</span><span class="value myNumberFont">'+cost.replace('.',',')+'</span><span class="btn btn-xs btn-success accept" value="'+data.offer.id+'" data-check="'+check+'" data-val="'+cost2+'" data-company="'+data.profile.company+'">'+"{{trans('frontend/order.accept')}}"+'</span></li>');

		    });
</script>

@endsection