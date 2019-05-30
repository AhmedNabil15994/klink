@extends('backend.adminlte.documents.index')



@section('contract')
<style type="text/css">
.first-div{
	padding: 20px;
}
.company-info {
	padding: 10px;
	clear: both;
	padding-bottom: 0;
	margin-bottom: 50px;
}
.company-info .company-name {
	cursor: pointer;
	float: left;
}

.company-info .company-name h2 {
	font-weight: 700;
	font-size: 26px;
	text-transform: uppercase;
	margin-bottom: 0;
	color: #444;
}

.company-info .company-name span {
	font-weight: 500;
	font-size: 12px;
	cursor: pointer;
	color: #666;
	text-transform: uppercase;
}
.company-info .company-info {
	float: right;
}

.company-info .company-info span {
	display: block;
	margin-bottom: 2px;
	font-size: 14px;
	cursor: pointer;
	color: #666;
}

.invoice-number {
	padding: 10px;
	cursor: pointer;
	padding-top: 0;
}

.invoice-number h3 {
	font-size: 25px;
	color: #000;
}

.invoice-number span {
	font-size: 15px;
	color: #777;
}
.invoice-number label{
	background: #FFF;
	color: #777;
	font-size: 16px;
}
.invoice-number h6{
	font-size: 16px;
}

.second-div {
	position: unset;
}

.second-div .billing-to {
	padding: 1rem;
}
.second-div .billing-to h4 {
	text-transform: capitalize;
	font-size: 2rem;
	color: #333333;
}

.second-div .billing-to span {
	display: block;
	font-size: 1.5rem;
	margin-bottom: .5rem;
	color: rgba(0, 0, 0, 0.5);
}

.second-div .billing-dates {
	padding: 1rem;
}
.second-div .billing-dates .dates {
	color: #555;
	padding: 1rem;
	border-radius: .3rem;
}

.second-div .billing-dates .dates p {
	font-size: 1.4rem;
}

.second-div .billing-dates .dates p span {
	margin-right: .5rem;
	display: inline-block;
	font-size: 1.4rem;
}

.second-div .billing-conc {
	padding: 1rem;
}
.second-div .billing-conc .details {
	color: #555;
	padding: .5rem;
	border-radius: .3rem;
}

.second-div .billing-conc .details p {
	font-size: 1.6rem;
}

.second-div .billing-conc .details p span {
	margin-right: .5rem;
	display: inline-block;
	width: 11rem;
	font-size: 1.4rem;
}

.order-space .orderCard {
	width: 100%;
	padding: 1rem;
}
.order-space .orderCard .table__header--row th {
	border-bottom: 1px solid rgba(0, 0, 0, 0.08);
	color: #6c757d;
	cursor: pointer;
	font-size: 1.4rem;
}
.order-space .orderCard .table__body--row {
	transition: background .5s;
	cursor: pointer;
	/*td*/
}

.order-space .orderCard .table__body--row td {
	padding: 1.2rem;
	border-bottom: 1px solid rgba(0, 0, 0, 0.08);
	vertical-align: middle;
	color: #455a64;
	border-top: none;
	font-size: 1.4rem;
}

.fourth-div .total-value {
	padding: 1rem;
	float: right;
	width: 100%;
}

.fourth-div .total-value p {
	font-size: 1.5rem;
}

.fourth-div .total-value span {
	display: inline-block;
	width: 50%;
	font-size: 12px;
	font-weight: 700;
	text-transform: uppercase;
}
.second-div .row:first-of-type{
	margin-right: 0;
	margin-left: 0;
}
.fifth-div{
	border-top: .25rem solid #555; 
	padding-top: 10px;
}
.fifth-div p{
	margin-bottom: 0;
}
.billing-parent{
	margin-top: 30px;
}
.fourth-div .row:first-of-type{
	margin-right: 0;
	margin-left: 0;
}
.billing-dates .input-append.date{
	position: relative;
}
.billing-dates span.add-on{
	position: absolute;
	left: 0;
	top: 26px;
}
a#address{
	max-width: 140px;
	display: inherit;
}
span.new-vat{
	width: unset !important;
}
@media print{
	.fourth-div .row{
		width: 50%;
		margin-left: 50%;
		margin-right: 0;
	}
	.fourth-div .row:first-of-type .col-xs-12:first-of-type{
		margin-left:100%;
	}
	.actions,.main-footer{
		display: none;
	}
	.tab-content{
		border:0;
	}
	.editable-click, a.editable-click, a.editable-click:hover{
		border-bottom: 0;
	}
}
</style>
<div class="invoice-wrapper openSans">
	<form id="invoiceForm" action="{{route('documents.download_invoice')}}" method="post">
		
		<div class="first-div">


			<!--company row-->
			<div class="company-info">
				<div class="row">

					<div class="col-xs-6">
						<div class="company-name">
							<h2>kurierlink co</h2>
							<span class="com-desc">
								{{trans('frontend/order.click')}}
							</span>
						</div>
					</div>

				</div>
			</div>

			<!--company row-->

			<!--invoice number row-->
			<div class="invoice-number">
				<div class="row">
					<div class="col-xs-6">
						<h4>{{trans('frontend/order.bill_to')}} :  <a href="#" class="editable" id="name" data-type="text" data-pk="1" data-url="" data-title="Ex: Jhon Snow"></a></h4>
						<h6><span>
							{{trans('frontend/order.order_no')}}:
						</span># <a href="#" class="editable" id="order_id" data-type="text" data-pk="1" data-url="" data-title="ID"></a></h6>


						<h6> <span>{{trans('frontend/order.order_date')}}: </span><a href="#" class="editable" id="order_date" data-type="date" data-pk="1" data-url="" data-title="Enter Date"></a></h6>
					</div>
					<div class="col-xs-6">
						<div class="pull-right" style="padding-right: 1.5rem">

						</div>
					</div>
				</div>
			</div>
			<!--invoice number row-->


		</div>

		<!--second div-->
		<div class="second-div">
			<div class="row">

				<div class="col-xs-6">
					<div class="billing-to">
						<h4>{{trans('frontend/order.order')}} 
						</h4>


						<span class="user-address">
							<a href="#" class="editable" id="address" data-type="text" data-pk="1" data-url="" data-title="Address">Address</a>
						</span>



						<span class="email">
							<a href="#" class="editable" id="email" data-type="text" data-pk="1" data-url="" data-title="ID">Email</a>
						</span>
					</div>
				</div>

				<div class="col-xs-6">
					<div class="row">

						<div class="col-xs-12 billing-parent">
							<div class="billing-dates">
								<div class="dates">
									<p>
										<span style="font-weight: 600;">{{trans('frontend/order.issue')}}:</span> <a href="#" class="editable" id="issue_date" data-type="date" data-pk="1" data-url="" data-title="Enter Date"></a>
									</p>

									<p>
										<span style="font-weight: 600;">{{trans('frontend/order.due')}}:</span> <a href="#" class="editable" id="due_date" data-type="date" data-pk="1" data-url="" data-title="Enter Date"></a>
									</p>
								</div>
							</div>
						</div>



					</div>

				</div>


			</div>
		</div>
		<!--second div-->

		<!--third div-->
		<div class="third-div">
			<div class="order-space">

				<!--col-->
				<div class="col-xs-12">
					<!--order card-->
					<div class="orderCard">


						<div class="order-data">



							<!--table head-->
							<table class="table table-striped" id="">

								<!--table head-->
								<thead class="table__header" style="background: #DDD;">
									<tr class="table__header--row">
										<th>{{trans('frontend/order.quantity')}}</th>
										<th>{{trans('frontend/dashboard.source')}}</th>
										<th>{{trans('frontend/dashboard.destination')}}</th>
										<th>{{trans('frontend/order.weight')}}(kg)</th>                     
										<th>{{trans('frontend/order.vat')}}(<a href="#" id="vat" data-type="select" data-pk="1" data-url="" data-title="Vat">19</a>%)</th>
										<th>{{trans('frontend/order.total')}}</th>
									</tr>
								</thead>
								<!--table head-->


								<!--table body-->
								<tbody class="table__body">

									<tr class="table__body--row">              

										<td><a href="#" class="editable" id="quantity" data-type="text" data-pk="1" data-url="" data-title="Quantity">Quantity</a></td>
										<td><a href="#" class="editable" id="source" data-type="text" data-pk="1" data-url="" data-title="Source">Source</a></td>
										<td><a href="#" class="editable" id="destination" data-type="text" data-pk="1" data-url="" data-title="Destination">Destination</a></td>

										<td><a href="#" class="editable" id="weight" data-type="text" data-pk="1" data-url="" data-title="Weight">Weight</a></td>
										<td class="vat">vat</td>
										<td><a href="#" id="total" data-type="text" data-pk="1" data-url="" data-title="Total">Total</a> €</td>

									</tr>

								</tbody>
								<!--table body-->

							</table>
							<!--table head-->

						</div>

					</div>
					<!--order card-->

				</div>
				<!--col-->






			</div>
			<!--order space-->
		</div>
		<!--third div-->

		<!--fourth div-->
		<div class="fourth-div">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-md-offset-6">
					<div class="total-value">
						<p style="border-bottom: 1px solid #DDD;">
							<span>{{trans('frontend/order.subtotal')}}: </span>  <span class="pull-right text-right"><span class="subtotal">0</span> €</span>
							<div class="clearfix"></div>
						</p>

						<p style="border-bottom: 1px solid #DDD;">
							<span>{{trans('frontend/order.vat')}} (<span class="new-vat">19</span>%): </span>  <span class="pull-right text-right"><span class="vat2">0</span> €</span>
							<div class="clearfix"></div>
						</p>

						<p style="border-bottom: 1px solid #DDD;">
							<span>{{trans('frontend/order.total')}}: </span>   <span class="pull-right text-right"><span class="total">0</span> €</span>
							<div class="clearfix"></div>
						</p>

						<p style="margin-bottom:0;border-bottom: 0; "> 

							<span>{{trans('frontend/order.paid')}}: </span>  <span class="pull-right text-right"><a href="#" id="paid" data-type="text" data-pk="1" data-url="" data-title="Paid">0</a> €</span>
							<div class="clearfix"></div>

						</p>

						<p style="background: #f9f9f9;padding:10px 0;border-bottom: 0;border-top: .3rem solid #555;">
							<span>{{trans('frontend/order.amount_due')}}: </span> <span class="pull-right text-right"><span class="amount-due">0</span> €</span>
							<div class="clearfix"></div>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!--fourth div-->

		<!--fifth div-->
		<div class="fifth-div">
			<div class="row">

				<div class="col-xs-4 col-md-4 ">
					<div class="total-value">
						<p>
							<span>Address: </span>  <span class="pull-right text-right profile_address">
								{!! $data->profile->address->addressForm() !!}</span>
								<div class="clearfix"></div>
							</p>

							<p>
								<span>Email: </span>  <span class="pull-right text-right profile_email">{{$data->email}}</span>
								<div class="clearfix"></div>

							</p>

					</div>
				</div>
				<div class="col-xs-4 col-md-4 ">
						<div class="total-value">
							<p>
								<span>Phone: </span> <span class="pull-right text-right profile_phone">{{$data->profile->number->mobile_number}}</span>
								<div class="clearfix"></div>

							</p>

							<p>
								<span>Fax: </span>  <span class="pull-right text-right">{{$data->profile->phone}}</span>
								<div class="clearfix"></div>
							</p>

							<p>
								<span>Website: </span>   <span class="pull-right text-right">www.kurier-link.com</span>
								<div class="clearfix"></div>
							</p>
						</div>
				</div>
				<div class="col-xs-4 col-md-4 ">
						<div class="total-value">
							<p>
								<span>Account Owner: </span>  <span class="pull-right text-right profile_name">{{$data->name}}</span>
							</p>

							<p>
								<span>Bank: </span>  <span class="pull-right text-right">CIB</span>
							</p>

							<p>
								<span>IBAN: </span>   <span class="pull-right text-right">135/2625/8530</span>
							</p>
						</div>
				</div>
			</div>
		</div>
		<!--fifth div-->
	
	</form>

</div>

	@endsection

	@section('scripts2')
	<script type="text/javascript">
		$(function(){

			$(".print").on('click',function(){
				window.print();
			});
			
			function newCalc(percent,total,paid){
				$('span.new-vat').empty().html(percent);
				vat = percent * total / 100;
				all = parseFloat(vat) + parseFloat(total);

				$('td.vat').empty().html(vat);
				$('span.vat2').empty().html(vat);
				$('span.subtotal').empty().html(total);
				$('span.total').empty().html(all);
				$('span.amount-due').empty().html(all - paid);


			}

			$('a#vat').editable({

				mode:'inline',
				type:'select',
				value: 3,    
				source: [
				{value: 1, text: '0'},
				{value: 2, text: '7'},
				{value: 3, text: '19'}
				],
				success:function(response,newValue){
					var result = '';
					if(newValue == 1){
						result = 0;
					}else if (newValue == 2) {
						result = 7;
					}else if (newValue == 3) {
						result = 19;
					}

					newCalc(result,parseFloat($('a#total').html()),parseFloat($('a#paid').html()));
				},

			});

			$('a#total').editable({
				mode:'inline',
				success:function(response,newValue){
					newCalc(parseFloat($('a#vat').html()),newValue,parseFloat($('a#paid').html()));
				},
			});

			$('a#paid').editable({
				mode:'inline',
				success:function(response,newValue){
					newCalc(parseFloat($('a#vat').html()),parseFloat($('a#total').html()),newValue);
				},
			});

			$(document).on('click', '#download', function (e) {
				
				e.preventDefault();
				e.stopPropagation();
				var data = {
					'_token': $('input[name="_token"]').val(),
					'name': $('a#name').html(),
					'order_id': $('a#order_id').html(),
					'order_date': $('a#order_date').html(),
					'issue_date': $('a#issue_date').html(),
					'due_date': $('a#due_date').html(),
					'address': $('a#address').html(),
					'email': $('a#email').html(),
					'quantity': $('a#quantity').html(),
					'source': $('a#source').html(),
					'destination': $('a#destination').html(),
					'weight': $('a#weight').html(),
					'vat': $('a#vat').html(),
					'vat_price': $('td.vat').html(),
					'subtotal': $('a#total').html(),
					'total': $('span.total').html(),
					'paid': $('a#paid').html(),
					'amount_due': $('span.amount-due').html(),
					'profile_address': $('span.profile_address').html(),
					'profile_email': $('span.profile_email').html(),
					'profile_phone': $('span.profile_phone').html(),
					'profile_name': $('span.profile_name').html(),
				};
	        	var formData = new FormData();
				
				$.each(data , function(key,value){
					$('#invoiceForm').append("<input type='hidden' name='"+key+"' value='"+value+"'>");
				});
				$('#invoiceForm').submit();
				
					
			});
		});
	</script>
	@endsection