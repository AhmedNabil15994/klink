<!--second column-->
<div class=" col-md-5 col-sm-6 second_col">

    <!--important informaion-->
    <div class="order-important-info">
        <div class="row fields">
            <div class="col-xs-12">
                @if($tour->tour_details && $tour->tour_details->min_day_hour)
                <fieldset id="tour_details">
                    <legend class="order-heading">Additional Tour Details</legend>
                    <div class="order-pickup">
                        <span class="pull-left">Min & Max Hour </span>
                        <div class="order-info-block pull-right">
                            <i class="icon-me fas fa-clock pull-left"></i>
                            <span class="min_max_day pull-left">
                            @if($tour->tour_details->min_day_hour && $tour->tour_details->max_day_hour)
                            
                            {{Carbon::parse($tour->tour_details->min_day_hour)->format('H:i')}} - {{Carbon::parse($tour->tour_details->max_day_hour)->format('H:i')}}

                            @endif
                            </span><br>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>

                        <span class="pull-left">Additional Price </span>
                        <span class="pull-right additional_price">{{$tour->tour_details->additional_price}} €</span>
                        <div class="clearfix"></div>

                        <div class="row" style="margin: 0;">
                            <span class="pull-left">Additional Days </span>
                            <ul class="unstyled-list days additional_days pull-right">
                                @if($tour->tour_details->additional_days)
                                @foreach(json_decode($tour->tour_details->additional_days) as $one)
                                <li>{{$one}}</li>
                                @endforeach
                                @endif
                            </ul>
                        </div>  
                    </div>
                </fieldset>
                @endif
                <div class="row measure">
                    <div class="distance-info" style="margin-top:5px;">
                        <ul class="distance-list clearfix" style="margin-bottom:0px;">
                            <li><i class="icon-important fas fa-compass"></i>100 km</li>
                            <li><i class="icon-important fas fa-weight-hanging"></i>750 kg</li>
                            <li style="border-right: 0;"><i class="icon-important fas fa-clock"></i>3 Hr 10 Min</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="com-xs-12">
                        <div class="ship-info">

                            <img src="{{ asset('images/shippings') }}/{{$tour->tour_ship->img}}" alt="{{$tour->tour_ship->title}}"> {{$tour->tour_ship->title}}

                            <div class="col-xs-12">
                                <div class="select-car">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            @php
                                                $myVec = auth()->user()->companyVehicle->where('ship_id',$tour->ship_id)->first();
                                                $attr = '';
                                            @endphp
                                            
                                            <select class="selectpicker selectShipPicker" data-tour="{{$tour->id}}">
                                                @foreach(auth()->user()->companyVehicle as $ship)
                                                @if($ship->id == $tour->ship_id)
                                                @php $attr = 'selected'; @endphp
                                                @else
                                                @php $attr = ''; @endphp
                                                @endif
                                                <option value="{{$ship->id}}" {{$attr}} data-driver="{{$ship->drivere->name}}" data-phone="{{$ship->drivere->profile->phone}}" data-id="{{$ship->drivere->profile->id}}">{{$ship->ship_name}}</option>
                                                @endforeach

                                                <option class="new_vec" value="e"><i class="fas fa-plus-square"></i> {{trans('frontend/dashboard.add_vec')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12" style="display:block;padding: 0;" id="DriverInfo{{$tour->id}}">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="load-info custom-style55">
                                                <div class="load-items">

                                                    <p class="load-para-sub-2 pull-left">

                                                        <i class="fas fa-user-tie"></i>
                                                        <span class="name"> 
                                                            {{@$myVec->drivere->name}}
                                                        </span>
                                                    </p>

                                                    <p class="load-para-sub-2 pull-right">
                                                        <i class="fas fa-phone"></i>
                                                        <span class="phone">
                                                            {{@$myVec->drivere->profile->phone}}
                                                        </span>
                                                    </p>

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
        </div>

    </div>
    <!--important informaion-->



</div>
<!--second column-->