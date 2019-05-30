<div class="col-lg-4 col-md-12">
    <!--new order content-->
    <div class="new-order-content trip_stop" style="padding-top:3rem;width:100%;">
        <ul class="top-squares-menue">
            <li class="top-square new-make-offer">
                Trips & Stops
            </li>
        </ul>
        
        <div class="custom-class enter-offer">

            <!--second row-->
            <div class="row">
                <div class="col-xs-12">

                    <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" id="myTrips" data-form="deleteForm">
                        <thead>
                            <tr style="background-color: #EEE;">
                                <td></td>
                                <th>{{trans('backend/customer_business.trip_number')}}</th>
                                <th>{{trans('backend/customer_business.trip_date')}}</th>
                                <th>{{trans('backend/customer_business.tour_number')}}</th>
                                <th>{{trans('backend/customer_business.tour_name')}}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tour->trips as $trip)
                            <tr class="tab-row{{$trip->id}}" data-tester="{{$trip}}" data-tester2="{{$tour->stops}}">
                                <td class="details-control"></td>
                                <td class="trip_number">{{$trip->id}}</td>
                                <td class="trip_number">{{$trip->is_done_dates->day}} - {{Carbon::parse($trip->is_done_dates->day)->format('l')}}</td>
                                <td class="tour_number">{{ $trip->tour->tour_number }}</td>
                                <td class="tour_name">{{ $trip->tour->tour_name }}</td>
                            </tr>

                            @endforeach
                            
                        </tbody>

                    </table>
                </div>
            </div>
            <!--second row-->

        </div>

    </div>
    <!--new order content-->
</div>