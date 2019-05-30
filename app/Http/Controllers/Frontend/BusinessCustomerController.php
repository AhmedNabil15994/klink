<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Tour;
use App\Models\Frontend\TourOffers;

class BusinessCustomerController extends Controller
{
    public function index()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] = Tour::orderBy('id', 'DESC')->with('tour_details.tour_person', 'tour_ship', 'tour_offer.tour_company', 'tour_offer.tour_driver', 'tour_offer.tour_vehicle.ship', 'tour_dates', 'trips.is_done_dates', 'trips.trip_stops.stops.stop_number', 'company_profile', 'tour_ship', 'calculations', 'stops.stop_address.country', 'accepted_offer')->paginate(10);

        return view('frontend.dashboard.business_customer.index', $this->data);
    }

    public function storeOffer(Request $request)
    {
        $offer = new TourOffers;
        $offer->tour_id = $request->tour_id;
        $offer->standard_tour_price = $request->standard_tour_price;
        $offer->company_offer = $request->company_offer;
        $offer->driver_profile_id = $request->driver_profile_id;
        $offer->vehicle_id = $request->vehicle_id;
        $offer->company_profile_id = Auth::user()->profile->id;
        $offer->customer_accepted = 0;
        $offer->save();
        event(new \App\Events\NewTourOffer($offer->id, $request->tour_id));

        return 1;
    }
}
