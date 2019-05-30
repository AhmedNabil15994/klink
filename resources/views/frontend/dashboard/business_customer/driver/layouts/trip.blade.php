<div class="order-item two" id="order-item-id">
	<div class="col-lg-9 col-md-12">
		<div class="id-place">
			<span class="fas fa-database"></span> id : {{$trip->id}}
		</div>
		<div class="main-item-content">
			<!--first row-->
			<div class="row" style="margin-right: 0">
				<div class="col-xs-12">
					<!--content-->
					<div class="order-item__content clear-fix">
						<!--internal row-->
						<div class="row ">
							<!--first column-->
							<div class="col-md-5 col-sm-6 first_col">
								<div class="row main-row">
									<div class="row">
										<div class="col-xs-12">
											<!--source details-->
											<div class="order-details clearfix">

												<div class="float-left date">
													<div class="float-left icon">
														<span class="fas fa-calendar"></span>
													</div>
													<span class="template-loc load_from_editable" data-url="" data-id=""  data-type="datetime" data-name="start"  id="loadFrom">{{@$trip->is_done_dates->day}}</span>
												</div>
												<div class="clearfix"></div>
											</div>
											<!--source details-->
										</div>
									</div>

									<div class="row fields">
										<div class="col-xs-12">
											<div class="order-details">
												<fieldset>
													<legend>{{$trip->tour->tour_name}}</legend>


													
													<span class="pull-left">Stops Number</span>
													<span class="tour_stop_type pull-right">{{@count($trip->trip_stops)}} Stops</span>
													<div class="clearfix"></div>

													<span class="pull-left">Packets Number</span>
													<span class="packet_number pull-right">@php $count = 0; @endphp
														@foreach($trip->trip_stops as $stop)
														@php $count += count($stop->stops->stop_freights); @endphp         
														@endforeach
													{{$count}} Packet</span>
													<div class="clearfix"></div>


													

													<span class="pull-left">Tour Ship</span>
													<span class="tour_person pull-right text-right">.<img src="{{ asset('images/shippings') }}/{{$trip->tour->tour_ship->img}}" alt="{{$trip->tour->tour_ship->title}}"> {{ @$trip->tour->tour_ship->title }}</span>
													<div class="clearfix"></div>

												</fieldset>
											</div>
										</div>
									</div>



								</div>
							</div>
							<!--first column-->

							<!--second column-->
							<div class=" col-md-5 col-sm-6 second_col">
								<!--important informaion-->
								<div class="order-important-info">
									<div class="row fields">
										<div class="col-xs-12">
											@php $i = 0; @endphp 
											@foreach($trip->trip_stops as $stop)
											@php $i++; @endphp
											@if($i<= 2)
											<div class="row measure">
												<div class="distance-info" style="margin-top:5px;">

													<ul class="distance-list clearfix" style="margin-bottom:0px;">
														<li>{{$stop->stops->id.' - '.$stop->stops->name}} <i class="icon-important fas fa-weight-hanging"></i>{{$stop->stops->weight}} Kg</li>
														<li><i class="icon-important fas fa-clock"></i>{{$stop->stops->duration}} Min</li>
														@if($stop->stops->stop_number)
														<li><i class="icon-important fas fa-phone"></i>{{@$stop->stops->stop_number->mobile_number}}</li>
														@endif
														<li style="border-right: 0;"><i class="icon-important pull-left fas fa-location-arrow"></i><span class="pull-left">
															@if(@$stop->stops->stop_address)
															{!! $stop->stops->stop_address->addressForm() !!}
															@endif
														</span></li>
														<div class="clearfix"></div>
													</ul>
												</div>
											</div>
											@endif
											@endforeach
										</div>
									</div>
								</div>
								<!--important informaion-->
							</div>
							<!--second column-->

							<!--third column-->
							<div class=" col-md-2 col-sm-6 third_col">
								<div class="row fields" style="margin:0;">
									<div class="col-xs-12">
											<!---->
											<div class="order-operation">
												<button id="tour_packets" class="new-button-offer details-trip button button--blue new-make-offertop-square new-make-offer ">
													Details
													<span class="fas fa-long-arrow-alt-down"></span>  
												</button>
											</div>
										</div>
									</div>
								</div>
								<!--third column-->

							</div>
							<!--internal row-->
						</div>
						<!--content-->
					</div>
				</div>
				<!--first row-->
				<!--slide down -->
				<div class="row">
					<div class="col-xs-12">
						<div class="order-item__slide">
							<!--tab row-->
							<div class="row">
								<div class="col-xs-12">
									<ul class="tab-list clearfix">
										<li class="active" data-content="enter-offer" id="li_details">Stops</li>
										<li data-content="details" id="li_packets">Packets</li>
									</ul>
								</div>
							</div>
							<!--tab row-->

							<!--content row-->
							<div class="row">
								<div class="col-xs-12">
									<div class="tab-content">


										<div class="tab-item enter-offer active" id="enter-offer">

											<div class="row">
												<div class="col-xs-12">
													<button class="pull-right btn btn-success add"><i class="fa fa-plus"></i> New Stop</button>
													<table class="table table-hover daTatable dataTable text-center stops-table" data-form="deleteForm" id="stops-table-{{$trip->id}}">
														<thead>
															<tr style="background-color: #EEE;">
																<td></td>
																<th>Stop ID</th>
																<th>Tour Name</th>
																<th>Stop Name</th>
																<th>Stops Number</th>
																<th>Stop Description</th>
																<th>Stop Weight</th>
																<th>{{trans('backend/customer_business.mobile_number')}}</th>
																<th>{{trans('backend/customer_business.address')}}</th>
																<th>{{trans('main.action')}}</th>
															</tr>
														</thead>

														<tbody>
															@php $i=0; @endphp
															@foreach($trip->trip_stops as $stop)
															<tr class="tab-row{{$stop->stops->id}}" data-tester="{{$stop->stops}}"> 
																<td class="details-control"></td>
																<td>{{$stop->stops->id}}</td>
																<td>{{@$stop->stops->tour->tour_name}}</td>
																<td class="stop_name">{{$stop->stops->name}}</td>
																<td class="stop_number">{{$stop->stops->stops_number}}</td>
																<td class="stop_description">{{$stop->stops->stop_description}}</td>
																<td class="stop_weight">{{$stop->stops->weight}}</td>
																<td class="stop_mobile_number">{{@$stop->stops->stop_number->mobile_number}}</td>
																<td class="address" data-address="{{@$stop->stops->stop_address->street.' '.@$stop->stops->stop_address->home.', '.@$stop->stops->stop_address->city.', '.@$stop->stops->stop_address->region}}">
																	@if(@$stop->stops->stop_address)
																	{!! $stop->stops->stop_address->addressForm() !!}
																	@endif
																</td>
																<td>
																	
																	<button type="submit" class="btn btn-primary btn-xs edit" value="{{$stop->stops->id}}"><i class="fa fa-edit"></i>Edit</button>
																	<button type="submit" class="btn btn-info btn-xs freight-data" value="{{$stop->stops->id}}"><i class="fa fa-file-alt"></i>Add Freight</button>
																	<button type="submit" class="btn btn-warning btn-xs delete" value="{{$stop->stops->id}}"><i class="fa fa-trash"></i>{{trans('main.delete')}}</button>
																</td>
															</tr>

															@endforeach
															
														</tbody>

													</table>
													@if(!count($trip->trip_stops))
													<style type="text/css">
													tbody,
													.dataTables_wrapper .row:last-of-type,
													.dataTables_wrapper .row:first-of-type {
														display: none;
													}
													</style>
													<div id="overlayError">
														<div class="row" style="margin-top: 10px;">
															<div class="col-xs-6 text-left pull-right">
																<img style="width: 120px;" src="{{asset('images/filter.svg')}}">
															</div>
															<div class="col-xs-3"></div>
															<div class="col-xs-3 pull-left text-right">
																<div class="callout" style="margin-top: 50px;border-left: 0;">
																	<h4>{{trans('main.no_res')}}<i class="fa fa-exclamation fa-fw"></i></h4>
																	<p>{{trans('main.no_res2')}}</p>
																</div>
															</div>
														</div>
													</div>
													@endif	
												</div>
											</div>	

										</div>

										<!--details-->
										<div class="tab-item details" id="details">
											<!--row-->
											<div class="row">
												
												<div class="col-md-6 log">
													<div class="row">
														<ul>
															<li>24-01-24 15:00 - Stop 1 Arrived</li>
															<li>24-01-24 15:05 - Pick up done in 5 min</li>
															<li>24-01-24 16:00 - Stop 2 Arrived </li>
															<li>24-01-24 16:05 - Drop Finished in 5 min</li>
															<li>24-01-24 18:00 - Stop 3 Arrived</li>
															<li>24-01-24 18:05 - Pick up done in 5 min</li>
															<li>24-01-24 20:00 - Stop 4 Arrived </li>
															<li>24-01-24 20:05 - Drop Finished in 5 min</li>
															<li>24-01-24 20:10 - Pick up done in 5 min</li>
															<li>24-01-24 22:00 - Stop 5 Arrived</li>
															<li>24-01-24 22:05 - Drop done in 5 min</li>
														</ul>
													</div>
												</div>

												<!--first col-->
												<div class="col-md-6">
													<!--row-->
													<div class="row">
														<div class="col-xs-12">
															<div class="packets">
																@foreach($trip->trip_stops as $trip_stop)

																@foreach($trip_stop->stops->stop_freights as $packet)
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
													<!--row-->
												</div>
												<!--first col-->

											</div>
											<!--row-->
										</div>
										<!--details-->


									</div>

								</div>
							</div>
							<!--content row-->
						</div>
					</div>
				</div>
				<!--slide down -->
			</div>
		</div>
	</div>