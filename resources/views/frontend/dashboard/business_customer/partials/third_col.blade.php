<!--third column-->
<div class=" col-md-3 col-sm-6">
    <div class="order-operation">

        <button id="tour_packets" class="new-button-offer button button--blue new-make-offertop-square new-make-offer ">
            Packets
            <span class="fas fa-long-arrow-alt-right"></span>  
        </button>

        <button id="trip_stop" class="new-button-offer button button--blue new-make-offertop-square new-make-offer ">
            Trips & Stops
            <span class="fas fa-long-arrow-alt-right"></span>  
        </button>

        <button id="time_period" class="new-button-offer button button--blue new-make-offertop-square new-make-offer ">
            Time & Period
            <span class="fas fa-long-arrow-alt-right"></span>  
        </button>

        <div>
            <input type="text" id="offer-number" data-id="" class="offer-number form-control touch-spin" value="{{$tour->price}}">
        </div>

        <button data-id="{{$tour->id}}" data-price="{{$tour->price}}" class="submitoffer button button--blue-spin ladda-button" data-style="expand-right">{{trans('frontend/dashboard.bind_offer')}}
        </button>


    </div>
</div>
<!--third column-->