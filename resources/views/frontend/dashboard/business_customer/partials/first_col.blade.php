<!--first column-->
<div class="col-md-4 col-sm-6">
    <div class="row">
        <div class="row">
            <div class="col-xs-12">
                <!--source details-->
                <div class="order-details clearfix">

                    <div class="float-left date">
                        <div class="float-left icon">
                            <span class="fas fa-calendar"></span>
                        </div>
                        <span class="template-loc load_from_editable" data-url="" data-id=""  data-type="datetime" data-name="start"  id="loadFrom">{{@$tour->tour_dates->tour_start_date}} - {{@$tour->tour_dates->tour_finish_date}}</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="float-left date">
                        <div class="float-left icon">
                            <span class="fas fa-clock"></span>
                        </div>
                        <span class="template-loc load_from_editable" data-url="" data-id=""  data-type="datetime" data-name="start" id="loadFrom">
                            @if($tour->tour_dates && $tour->tour_dates->tour_start_time && $tour->tour_dates->tour_finish_time)
                            
                            {{Carbon::parse($tour->tour_dates->tour_start_time)->format('H:i')}} - {{Carbon::parse($tour->tour_dates->tour_finish_time)->format('H:i')}}

                            @endif
                        </span>

                        <div class="float-right pull-right">
                            <ul class="unstyled-list days">
                                @if($tour->tour_dates && $tour->tour_dates->days)
                                @foreach(json_decode($tour->tour_dates->days) as $one)
                                <li>{{$one}}</li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
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
                        <legend>{{$tour->tour_name}}</legend>

                        <span class="pull-left">Tour Type</span>
                        <span class="tour_type pull-right">
                            @if($tour->tour_type == 0 )
                            Tour Per Stop
                            @elseif($tour->tour_type == 1)
                            Tour Per Min
                            @elseif($tour->tour_type == 3)
                            Tour Per Day
                            @elseif($tour->tour_type == 6)
                            Tour Per Packet
                            @endif
                        </span>
                        <div class="clearfix"></div>

                        <span class="pull-left">Packets Number</span>
                        <span class="packet_number pull-right">
                        @php $count = 0; @endphp
                        @foreach($tour->stops as $stop)
                        @php $count += count($stop->stop_freights); @endphp         
                        @endforeach
                        {{$count}} Packet</span>
                        <div class="clearfix"></div>

                        <span class="pull-left">Tour Stops Type</span>
                        <span class="tour_stop_type pull-right">Static</span>
                        <div class="clearfix"></div>

                        <span class="pull-left">Stops Number</span>
                        <span class="tour_stop_type pull-right">{{@count($tour->stops)}} Stops</span>
                        <div class="clearfix"></div>

                        <span class="pull-left">Stop Time</span>
                        <span class="tour_stop_type pull-right">{{$tour->stop->stop_time}} Min</span>
                        <div class="clearfix"></div>

                        <span class="pull-left">Tour Person</span>
                        <span class="tour_person pull-right text-right">{!! @$tour->getTourPerson() !!}</span>
                        <div class="clearfix"></div>

                        <span class="pull-left">Tour Description</span>
                        <span class="tour_desc pull-right">{{@$tour->notes}}</span>
                        <div class="clearfix"></div>
                    </fieldset>
                </div>
            </div>
        </div>



    </div>
</div>
<!--first column-->