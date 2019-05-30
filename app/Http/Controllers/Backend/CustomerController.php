<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\TourDays;
use Helper;
use Response;
use App\Models\Frontend\Tour;
use App\Models\Frontend\TourDates;
use App\Models\Frontend\TourDetails;
use App\Models\Frontend\Stops;
use App\Models\Frontend\TourOffers;
use App\Models\Frontend\Trip;
use App\Models\Frontend\IsDoneDates;
use App\Models\Frontend\Freights;
use App\Models\Frontend\NewDocument;
use App\Models\Frontend\FreightDetails;
use App\Models\Frontend\StopsFreights;
use App\Models\Frontend\Driver;
use App\Models\Frontend\OrderPerson;
use App\Models\Frontend\TourTimeCalculations;
use App\Models\Frontend\Email;
use App\Models\Frontend\Address;
use App\Models\Frontend\Country;
use App\Models\Frontend\Number;
use App\Models\Frontend\TripStop;
use App\Models\Frontend\FreightCat;
use App\Models\Frontend\Profile;
use App\Models\Frontend\User;
use App\Models\Backend\Shipping;
use App\Models\Backend\ShippingDistance;
use umulmrum\Holiday\Calculator\HolidayCalculator;
use umulmrum\Holiday\Filter\IncludeTimespanFilter;
use umulmrum\Holiday\Formatter\DateFormatter;
use umulmrum\Holiday\Provider\Germany\GermanyHolidayInitializer;
use umulmrum\Holiday\Provider\Germany\Berlin;
use Carbon;
use Validator;

class CustomerController extends Controller
{
    public function validateAddress($country)
    {
        $result = '';
        if (!$country) {
            $rules = ['country' => 'required'];
            $validator = Validator::make([$country], $rules, [
                'country.required' => 'Address Must Be Verified.',
            ]);
            if ($validator->fails()) {
                $result = Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }
        }

        return $result;
    }

    public function checkDates($tour_start_date, $tour_finish_date, $days)
    {
        // limitted Tour
        if ($tour_finish_date != '' || $tour_finish_date != null) {
            $date =  new Carbon($tour_finish_date);
            $year = $date->format('Y');

            $holidayCalculator = new HolidayCalculator(new GermanyHolidayInitializer());
            // Calculate the holiday for one year in a region.
            $holidays = $holidayCalculator->calculateHolidaysForYear($year, Berlin::ID);
            $formattedHolidays = (new DateFormatter())->formatList($holidays);

            // sort array with given user-defined function
            usort($formattedHolidays, "App\Models\Frontend\TourDates::compareByTimeStamp");

            // Holidays
            $holidays = TourDates::removeDates($formattedHolidays, $tour_finish_date);
            
            // All Days
            $period = TourDates::generateDateRange(Carbon::parse($tour_start_date), Carbon::parse($tour_finish_date));
            
            // Remove Holidays From All Days
            for ($i=0; $i < count($holidays) ; $i++) {
                if (in_array($holidays[$i], $period)) {
                    $period = array_diff($period, [$holidays[$i]]);
                }
            }

            // Tour Work Days
            $tour_work_days = TourDates::getWorkDays($period, $days);

            return $tour_work_days;
        }
    }

    public function tours()
    {
        $this->data['companies'] = Profile::where('status', 'company')->get();
        $this->data['drivers'] = Profile::where('status', 'driver')->get();
        $this->data['ships'] = Shipping::get();
        $this->data['order_persons'] = OrderPerson::get();
        $this->data['docs'] = NewDocument::get();
        $this->data['users'] = Profile::where('status', 'business_customer')->get();
        $this->data['data'] = Tour::with('accepted_offer')->orderBy('id', 'DESC')->get();
        return view('backend.adminlte.customer_business.tour', $this->data);
    }
    
    public function storeTour(Request $request)
    {
        $input = $request->all();
        $input['is_active'] = 0;
        Tour::create($input);

        return 1;
    }

    public function destroyTour(Request $request)
    {
        $tour = Tour::find($request->id);
        $tour->delete();
        return 1;
    }

    public function cancelTour(Request $request)
    {
        $tour = Tour::find($request->id);
        $calc = $tour->calculations()->where('type', 3)->first();
        
        $data = [$calc->every,$calc->time,$calc->period];

        $cancellation_speak_day = TourDates::getSpeakDay($request->date, $data);

        $dates = $tour->tour_dates()->update(['cancellation_speak_day'=>$cancellation_speak_day]);

        return 1;
    }

    public function getTourData(Request $request)
    {
        $tour = Tour::where('id', $request->id)->with('tour_details.tour_person', 'tour_ship', 'tour_offer.tour_company', 'tour_offer.tour_driver', 'tour_offer.tour_vehicle.ship', 'tour_dates', 'trips.is_done_dates', 'trips.trip_stops.stops.stop_number', 'company_profile', 'tour_ship', 'calculations', 'stops.stop_address.country', 'accepted_offer')->first();
        return Response::json($tour);
    }

    public function getDrivers(Request $request)
    {
        $company_id = $request->id;

        $drivers = Driver::where('company_id', $company_id)->with('profile')->groupBy('profile_id')->get();

        return Response::json($drivers);
    }

    public function storeTourDates(Request $request)
    {
        $payment_speak_day = TourDates::getSpeakDay($request->start, $request->payment);
        $account_speak_day = TourDates::getSpeakDay($request->start, $request->account);
        $cancellation_speak_day = TourDates::getSpeakDay($request->start, $request->cancellation);
        $test_speak_day = TourDates::getSpeakDay($request->start, $request->test);

        if ($request->tour_finish_date != null || $request->tour_finish_date != '') {
            $tour_work_days = $this->checkDates($request->tour_start_date, $request->tour_finish_date, $request->days);
        } else {
            $tour_work_days = $this->checkDates($request->tour_start_date, $account_speak_day, $request->days);
        }

        $calculations = [

            [
                'every'=> $request->payment[0],
                'time'=> $request->payment[1],
                'period'=> $request->payment[2],
                'type'=> 1,
            ],

            [
                'every'=> $request->account[0],
                'time'=> $request->account[1],
                'period'=> $request->account[2],
                'type'=> 0,
            ],

            [
                'every'=> $request->cancellation[0],
                'time'=> $request->cancellation[1],
                'period'=> $request->cancellation[2],
                'type'=> 3,
            ],
            
            [
                'every'=> $request->test[0],
                'time'=> $request->test[1],
                'period'=> $request->test[2],
                'type'=> 2,
            ]

        ];
        
        

        $tour = Tour::where('id', $request->id)->with(['trips.is_done_dates.time_tracking','tour_dates'])->first();

        $input = $request->all();
        $input['days'] = json_encode($request->days);
        
        if ($tour->tour_dates) {
            $tour->tour_dates()->update([
                'tour_start_date' => $input['tour_start_date'],
                'tour_finish_date' => $input['tour_finish_date'],
                'tour_start_time' => $input['tour_start_time'],
                'tour_finish_time' => $input['tour_finish_time'],
                'days' => $input['days'],
                'payment_speak_day' => $payment_speak_day,
                'cancellation_speak_day' => $cancellation_speak_day,
                'account_speak_day' => $account_speak_day,
                'test_speak_day' => $test_speak_day,
            ]);
        } else {
            $tour->tour_dates()->save(new TourDates([
                'tour_start_date' => $input['tour_start_date'],
                'tour_finish_date' => $input['tour_finish_date'],
                'tour_start_time' => $input['tour_start_time'],
                'tour_finish_time' => $input['tour_finish_time'],
                'days' => $input['days'],
                'payment_speak_day' => $payment_speak_day,
                'cancellation_speak_day' => $cancellation_speak_day,
                'account_speak_day' => $account_speak_day,
                'test_speak_day' => $test_speak_day,
             ]));
        }
        
        foreach ($tour->trips as $key => $value) {
            $value->is_done_dates()->delete();
        }
        
        $tour->trips()->delete();
        $tour->calculations()->delete();

        foreach ($calculations as $one => $value) {
            $tour->calculations()->save(new TourTimeCalculations($value));
        }

        foreach ($tour_work_days as $key => $value) {
            $trip = $tour->trips()->save(new Trip);
            $stop = $tour->stops()->save(new Stops);
            $trip_stop = $trip->trip_stops()->save(new TripStop(['trip_id'=>$trip->id,'stop_id'=>$stop->id]));
            $trip->is_done_dates()->save(new IsDoneDates(['day'=>$value[0]]));
        }

        return 1;
    }

    public function storeTourDetails(Request $request)
    {
        $tour = Tour::find($request->id);
        $input = $request->all();
        $input['additional_days'] = json_encode($request->additional_days);
        if ($tour->tour_details) {
            $tour->tour_details()->update([
                'additional_days' => $input['additional_days'],
                'min_day_hour' => $input['min_day_hour'],
                'max_day_hour' => $input['max_day_hour'],
                'additional_price' => $input['additional_price'],
            ]);
        } else {
            $tour->tour_details()->save(new TourDetails([
                'additional_days' => $input['additional_days'],
                'min_day_hour' => $input['min_day_hour'],
                'max_day_hour' => $input['max_day_hour'],
                'additional_price' => $input['additional_price'],
             ]));
        }
        
        return 1;
    }

    public function assignPerson(Request $request)
    {
        $tour = Tour::find($request->id);

        if ($request->type == 'order_person') {
            if ($tour->tour_details) {
                $tour->tour_details->order_person_id = $request->person;
                $tour->tour_details()->update(['order_person_id'=>$request->person]);
            } else {
                $tour->tour_details()->save(new TourDetails(['order_person_id'=>$request->person]));
            }
            $tour->profile_id_company = null;
            $tour->save();
        } elseif ($request->type == 'user') {
            if ($tour->tour_details) {
                $tour->tour_details->update(['order_person_id'=>null]);
            }
            $tour->profile_id_company = $request->person;
            $tour->save();
        }
        $user = User::find($request->company_profile_id);

        if ($request->company_profile_id != '' || $request->company_profile_id != null) {
            if ($tour->accepted_offer) {
                $tour->accepted_offer()->update([
                    'company_profile_id'=> $user->profile->id,
                    'driver_profile_id'=> $request->driver_profile_id,
                    'vehicle_id'=> $request->vehicle_id,
                    'company_offer'=> $request->company_offer,
                    'customer_accepted'=> 1,
                ]);
            } else {
                $offer = new TourOffers([
                    'company_profile_id'=> $user->profile->id,
                    'driver_profile_id'=> $request->driver_profile_id,
                    'vehicle_id'=> $request->vehicle_id,
                    'company_offer'=> $request->company_offer,
                    'customer_accepted'=> 0,
                ]);
                
                $tour->tour_offer()->save($offer);
                event(new \App\Events\NewTourOffer($offer->id, $tour->id));
            }
        }

        return 1;
    }

    public function order_person(Request $request)
    {
        $this->data['data'] = OrderPerson::orderBy('id', 'DESC')->get();
        return view('backend.adminlte.customer_business.order_person', $this->data);
    }

    public function storeOrderPerson(Request $request)
    {
        $country = Country::where('code', $request->country)->first();
        $error = $this->validateAddress($country);
        if ($error != '') {
            return $error;
        }

        $input = $request->all();
        $input['lat_lng'] = json_encode($request->lat_lng);
        $input['region']    = $country->name;
        $input['country_id']    = $country->country_id;

        $number = Helper::storeNewRecord('\Number', 'mobile_number', $input);
        $email = Helper::storeNewRecord('\Email', 'email', $input);
        $address = Helper::storeNewRecord('\Address', 'lat_lng', $input);

        $order_person = new OrderPerson;
        $order_person->first_name = $request->first_name;
        $order_person->last_name = $request->last_name;
        $order_person->company = $request->company;
        $order_person->number_id = $number;
        $order_person->email_id = $email;
        $order_person->address_id = $address;
        $order_person->save();

        return 1;
    }

    public function destroyOrderPerson(Request $request)
    {
        $order_person = OrderPerson::find($request->id);
        $order_person->delete();
        $order_person->email()->delete();
        $order_person->number()->delete();
        return 1;
    }

    public function tour_trips(Request $request)
    {
        $this->data['data'] = Tour::orderBy('id', 'Desc')->with('trips.trip_stops.stops.stop_number', 'trips.trip_stops.stops.stop_address', 'trips.is_done_dates')->get();
        return view('backend.adminlte.customer_business.tour_trips', $this->data);
    }

   
    public function destroyTourTrips(Request $request)
    {
        $trip = Trip::find($request->id);
        $trip->is_done_dates()->delete();
        $trip->delete();

        return 1;
    }

    public function tour_dates()
    {
        $this->data['data'] = TourDates::orderBy('id', 'Desc')->get();
        return view('backend.adminlte.customer_business.tour_dates', $this->data);
    }

    public function destroyTourDates(Request $request)
    {
        TourDates::find($request->id)->delete();
        return 1;
    }

    public function tour_details()
    {
        $this->data['data'] = TourDetails::orderBy('id', 'Desc')->get();
        return view('backend.adminlte.customer_business.tour_details', $this->data);
    }

    public function destroyTourDetails(Request $request)
    {
        TourDetails::find($request->id)->delete();
        return 1;
    }

    public function stops(Request $request)
    {
        $this->data['data'] = Stops::with('stop_freights.freights.freight_details.freight_category', 'stop_freights.order_person.address', 'stop_freights.order_person.number', 'stop_freights.order_person')->orderBy('id', 'Desc')->get();
        $this->data['cats'] = FreightCat::orderBy('id', 'DESC')->get();
        $this->data['persons'] = OrderPerson::orderBy('id', 'DESC')->get();
        $this->data['tours'] = Tour::orderBy('id', 'Desc')->get();
        return view('backend.adminlte.customer_business.stops', $this->data);
    }
    
    public function storeStops(Request $request)
    {
        $country = Country::where('code', $request->country)->first();
        $error = $this->validateAddress($country);
        if ($error != '') {
            return $error;
        }

        $input = $request->all();
        $input['lat_lng'] = json_encode($request->lat_lng);
        $input['region'] = $country->name;
        $input['country_id'] = $country->country_id;

   
        $address = Helper::storeNewRecord('\Address', 'lat_lng', $input);

        $stop = new Stops;
        $stop->name = $request->name;
        $stop->stop_description = $request->description;
        $stop->address_id = $address;
        $stop->stops_number = $request->stops_number;
        $stop->weight = $request->weight;
        $stop->save();

        if ($request->mobile_number) {
            $number = Helper::storeNewRecord('\Number', 'mobile_number', $input);
            $stop->number_id = $number;
            $stop->save();
        }

        return 1;
    }
    public function destroyStops(Request $request)
    {
        $stop = Stops::find($request->id)->delete();
        return 1;
    }
    public function editStops(Request $request)
    {
        $stop = Stops::find($request->id);
        $tour_id = $stop->tour_id;
        $number = 0;

        if ($request->stops) {
            $number = count($request->stops);
            foreach ($request->stops as $key => $value) {
                if (!isset($value['address'])) {
                    return Response::json([
                        'errors' => ['Invalid New Stop Information']
                    ]);
                }
                $country = Country::where('code', $value['address']['country'])->first();
                $address = $value['address'];
                $address['lat_lng'] = json_encode($value['address']['lat_lng']);
                $address['region'] = '';
                $address['country_id'] = $country->country_id;
                $stop_address = Helper::storeNewRecord('\Address', 'lat_lng', $address);


                $new_stop = Stops::create([
                    'tour_id' => $tour_id,
                    'weight'  => $value['weight'],
                    'duration'  => $value['duration'],
                    'address_id'  => $stop_address,

                ]);

                $trips = $new_stop->tour->trips;

                foreach ($trips as $key => $value) {
                    TripStop::create([
                        'trip_id' => $value->id,
                        'stop_id' => $new_stop->id,
                    ]);
                }
            }
        }


        $country = Country::where('code', $request->country)->first();
        $error = $this->validateAddress($country);
        if ($error != '') {
            return $error;
        }

        $input = $request->all();
        $input['lat_lng'] = json_encode($request->lat_lng);
        $input['region'] = '';
        $input['country_id'] = $country->country_id;

   
        $address = Helper::storeNewRecord('\Address', 'lat_lng', $input);

        $stop = Stops::find($request->id);
        $stop->name = $request->name;
        $stop->stop_description = $request->description;
        $stop->address_id = $address;
        $stop->stops_number = $request->stops_number - $number;
        $stop->weight = $request->weight;
        $stop->save();

        if ($request->mobile_number) {
            $number = Helper::storeNewRecord('\Number', 'mobile_number', $input);
            $stop->number_id = $number;
            $stop->save();
        }

        return 1;
    }

  
    public function assignToTour(Request $request)
    {
        $stop = Stops::find($request->id);
        $stop->tour_id = $request->tour_id;
        $stop->save();

        TripStop::where('stop_id', $request->id)->delete();

        foreach ($stop->tour->trips as $key => $value) {
            TripStop::create(['trip_id'=>$value->id,'stop_id'=>$request->id]);
        }

        return 1;
    }

    public function tripTour(Request $request)
    {
        $trip = Trip::find($request->id);
        $trip_stops = $trip->trip_stops;
        $stops = $trip->tour->stops;
        $trip_stops_ids = [];
        foreach ($trip_stops as $key => $value) {
            $trip_stops_ids[] = $value->stop_id;
        }

        $result = [];
        foreach ($stops as $key => $value) {
            if (in_array($value->id, $trip_stops_ids)) {
                $result[] = [
                    'id' => $value->id,
                    'status' => 'selected',
                    'name'  => $value->name,
                ];
            } else {
                $result[] = [
                    'id' => $value->id,
                    'status' => '',
                    'name'  => $value->name,
                ];
            }
        }

        return Response::json([$result,$trip->tour->tour_name]);
    }

    public function assignTripStops(Request $request)
    {
        for ($i=0;$i<count($request->stops);$i++) {
            TripStop::where('trip_id', $request->trip_id)->where('stop_id', $request->stops[$i])->delete();
            TripStop::create([
                'trip_id' => $request->trip_id,
                'stop_id' => $request->stops[$i],
            ]);
        }
        return 1;
    }

    public function getTourDates(Request $request)
    {
        $tour = Tour::find($request->id);
        if ($tour->tour_dates) {
            $dates = $tour->tour_dates;
            $dates->tour_start_time= Carbon::parse($dates->tour_start_time)->format('H:i');
            $dates->tour_finish_time= Carbon::parse($dates->tour_finish_time)->format('H:i');
            $dates->days = json_decode($dates->days);
            $dates->payment = $tour->calculations()->where('type', 1)->first();
            $dates->account = $tour->calculations()->where('type', 0)->first();
            $dates->test = $tour->calculations()->where('type', 2)->first();
            $dates->cancellation = $tour->calculations()->where('type', 3)->first();
            return Response::json($dates);
        } else {
            return 0;
        }
    }

    public function getTourDetails(Request $request)
    {
        $tour = Tour::find($request->id);
        if ($tour->tour_details) {
            $details = $tour->tour_details;
            $details->min_day_hour= Carbon::parse($details->min_day_hour)->format('H:i');
            $details->max_day_hour= Carbon::parse($details->max_day_hour)->format('H:i');
            $details->additional_days = json_decode($details->additional_days);
            return Response::json($details);
        } else {
            return 0;
        }
    }

    public function getTourPersons(Request $request)
    {
        $tour = Tour::find($request->id);
        $company = '';
        $driver = '';
        $person = '';
        $type = '';
        $company_drivers = [];
        if ($tour->accepted_offer) {
            $company = $tour->accepted_offer->company_profile_id;
            $driver = $tour->accepted_offer->driver_profile_id;
            $company_drivers = Driver::where('company_id', $company)->where('vehichle_id', '!=', '')->with('profile')->groupBy('profile_id')->get();
        }

        if ($tour->profile_id_company) {
            $person = $tour->profile_id_company;
            $type   = 'person';
        } elseif ($tour->tour_details) {
            if ($tour->tour_details->order_person_id) {
                $person = $tour->tour_details->order_person_id;
                $type   = 'order_person';
            }
        }

        $data = [
            'company' => $company,
            'driver' => $driver,
            'person' => $person,
            'type' => $type,
            'company_drivers' => $company_drivers,
        ];
        return Response::json($data);
    }

    public function editOrderPerson(Request $request)
    {
        $country = Country::where('code', $request->country)->first();
        $error = $this->validateAddress($country);
        if ($error != '') {
            return $error;
        }

        $input = $request->all();
        $input['lat_lng'] = json_encode($request->lat_lng);
        $input['region']    = $country->name;
        $input['country_id']    = $country->country_id;

        $number = Helper::storeNewRecord('\Number', 'mobile_number', $input);
        $email = Helper::storeNewRecord('\Email', 'email', $input);
        $address = Helper::storeNewRecord('\Address', 'lat_lng', $input);

        $order_person = OrderPerson::find($request->id);
        $order_person->first_name = $request->first_name;
        $order_person->last_name = $request->last_name;
        $order_person->company = $request->company;
        $order_person->number_id = $number;
        $order_person->email_id = $email;
        $order_person->address_id = $address;
        $order_person->save();

        return 1;
    }

    public function getDates(Request $request)
    {
        $start = $request->start;



        $days = Carbon::parse($start)->daysInMonth;
        $time = [1,7,$days];
        $total_time = $request->every * $time[$request->time];
        $total_time = $total_time ? $total_time : 1;
        $final_date = '';


        // Same Day
        if ($request->payment_period == 0) {
            $final_date = Carbon::parse($start)->addDays($total_time)->format('Y-m-d');
        
        // Start Of Week
        } elseif ($request->payment_period == 1) {
            $final_date = Carbon::parse($start)->addDays($total_time)->startOfWeek()->addWeek()->format('Y-m-d');
        
        // end of Week
        } elseif ($request->payment_period == 2) {
            $final_date = Carbon::parse($start)->addDays($total_time)->endOfWeek()->format('Y-m-d');
        
        // Start Of Month
        } elseif ($request->payment_period == 3) {
            $final_date = Carbon::parse($start)->addDays($total_time)->startOfMonth()->addMonth()->format('Y-m-d');
        
        // End Of Month
        } elseif ($request->payment_period == 4) {
            $final_date = Carbon::parse($start)->addDays($total_time)->endOfMonth()->format('Y-m-d');
        
        // Till Day 15 Or End Of Month
        } elseif ($request->payment_period == 5) {
            $final_date = Carbon::parse($start)->addDays($total_time)->format('Y-m-d');
            $years = Carbon::parse($final_date)->format('Y');
            $months = Carbon::parse($final_date)->format('m');
            $days = Carbon::parse($final_date)->format('d');
            
            if ($days > 15) {
                $final_date = Carbon::parse($years.'-'.$months.'-'.$days)->endOfMonth()->format('Y-m-d');
            } else {
                $final_date = Carbon::parse($years.'-'.$months.'-'.'15')->format('Y-m-d');
            }
        
            // End Of Quarter
        } elseif ($request->payment_period == 6) {
            $final_date = Carbon::parse($start)->addDays($total_time)->lastOfQuarter()->format('Y-m-d');
        
        // Half Year
        } elseif ($request->payment_period == 7) {
            $final_date = Carbon::parse($start)->addDays($total_time)->format('Y-m-d');
            $years = Carbon::parse($final_date)->format('Y');
            $months = Carbon::parse($final_date)->format('m');
            
            if ($months <= 6) {
                $final_date = Carbon::parse($years.'-06-30')->format('Y-m-d');
            } else {
                $final_date = Carbon::parse($years.'-12-31')->format('Y-m-d');
            }

            // End Of Year
        } elseif ($request->payment_period == 8) {
            $final_date = Carbon::parse($start)->addDays($total_time)->endOfYear()->format('Y-m-d');
        }



        return $final_date;
    }

    public function filterTours($type)
    {
        if ($type == 'all') {
            $this->data['data'] = Tour::with('accepted_offer')->orderBy('id', 'DESC')->get();
        } else {
            $this->data['data'] = Tour::where('tour_type', $type)->with('accepted_offer')->orderBy('id', 'DESC')->get();
        }

        return view('backend.adminlte.customer_business.Ajax.filter', $this->data)->render();
    }

    

    public function filterTrips($type)
    {
        if ($type == 'all') {
            $this->data['data'] = Tour::orderBy('id', 'Desc')->with('trips.trip_stops.stops.stop_number', 'trips.trip_stops.stops.stop_address', 'trips.is_done_dates')->get();
        } elseif ($type == 'today') {
            $tours = Tour::whereHas('trips.is_done_dates', function ($query) {
                $query->where('day', Carbon::parse(Carbon::now())->format('Y-m-d'));
            })->with(['trips' => function ($query) {
                $query->whereHas('is_done_dates', function ($q) {
                    $q->where('day', Carbon::parse(Carbon::now())->format('Y-m-d'));
                })->with('trip_stops.stops.stop_address', 'trip_stops.stops.stop_number', 'is_done_dates');
            }])->get();

            $this->data['data'] = $tours;
        } elseif ($type == 'current_account_period') {
            $tours = Tour::whereHas('tour_dates', function ($query) {
                $query->where('account_speak_day', '>=', Carbon::parse(Carbon::now())->format('Y-m-d'));
            })->with('trips.trip_stops.stops.stop_address', 'trips.trip_stops.stops.stop_number', 'trips.is_done_dates')->get();

            $this->data['data'] = $tours;
        }

        return view('backend.adminlte.customer_business.Ajax.filterTrips', $this->data)->render();
    }


    public function storeTripStop(Request $request)
    {
        $country = Country::where('code', $request->country)->first();
        $error = $this->validateAddress($country);
        if ($error != '') {
            return $error;
        }

        $input = $request->all();
        $input['lat_lng'] = json_encode($request->lat_lng);
        $input['region'] = $country->name;
        $input['country_id'] = $country->country_id;

        $trip = Trip::find($request->trip_id);
        $tour_id = $trip->tour->id;
   
        $address = Helper::storeNewRecord('\Address', 'lat_lng', $input);

        $stop = new Stops;
        $stop->name = $request->name;
        $stop->stop_description = $request->description;
        $stop->address_id = $address;
        $stop->stops_number = $request->stops_number - count($request->stops);
        $stop->weight = $request->weight;
        $stop->tour_id = $trip->tour->id;
        $stop->save();

        if ($request->mobile_number) {
            $number = Helper::storeNewRecord('\Number', 'mobile_number', $input);
            $stop->number_id = $number;
            $stop->save();
        }
        TripStop::create(['stop_id'=>$stop->id,'trip_id'=>$request->trip_id]);



        if ($request->stops) {
            $number = count($request->stops);
            foreach ($request->stops as $key => $value) {
                if (!isset($value['address'])) {
                    return Response::json([
                        'errors' => ['Invalid New Stop Information']
                    ]);
                }
                $country = Country::where('code', $value['address']['country'])->first();
                $address = $value['address'];
                $address['lat_lng'] = json_encode($value['address']['lat_lng']);
                $address['region'] = '';
                $address['country_id'] = $country->country_id;
                $stop_address = Helper::storeNewRecord('\Address', 'lat_lng', $address);


                $new_stop = Stops::create([
                    'tour_id' => $tour_id,
                    'weight'  => $value['weight'],
                    'duration'  => $value['duration'],
                    'address_id'  => $stop_address,

                ]);

                $trips = $new_stop->tour->trips;

                foreach ($trips as $key => $value) {
                    TripStop::create([
                        'trip_id' => $value->id,
                        'stop_id' => $new_stop->id,
                    ]);
                }
            }
        }


        return 1;
    }

    public function packet_category(Request $request)
    {
        $this->data['data'] = FreightCat::orderBy('id', 'DESC')->get();
        return view('backend.adminlte.customer_business.freight_category', $this->data);
    }

    public function storeCategory(Request $request)
    {
        FreightCat::create($request->all());
        return 1;
    }

    public function editCategory(Request $request)
    {
        $cat = FreightCat::find($request->id);
        $cat->category = $request->category;
        $cat->weight = $request->weight;
        $cat->width = $request->width;
        $cat->length = $request->length;
        $cat->height = $request->height;
        $cat->cat_price = $request->cat_price;
        $cat->save();

        return 1;
    }

    public function destroyCategory(Request $request)
    {
        $cat = FreightCat::find($request->id);
        FreightDetails::where('freight_cat_id', $request->id)->update(['freight_cat_id'=>null]);
        $cat->delete();
        return 1;
    }

    public function storeStopFreight(Request $request)
    {
        $freight = new Freights;
        $freight->name = $request->name;
        $freight->save();
        $cat_id = '';
        if ($request->category == 'other') {
            $cat_id = null;
        } else {
            $cat_id = $request->category;
        }

        $freight->freight_details()->save(new FreightDetails([

            'width' => $request->width,
            'weight' => $request->weight,
            'length' => $request->length,
            'height' => $request->height,
            'type' => $request->type,
            'pick_period' => $request->pick_period,
            'freight_cat_id' => $cat_id,

        ]));

        $stop = Stops::find($request->stop_id);
        $stop->stop_freights()->save(new StopsFreights([
            'number_of_packets' => $request->number_of_items,
            'order_person_id' => $request->order_person_id,
            'freight_id' => $freight->id,
            'notes' => $request->description,
        ]));

        $stop = Stops::find($request->stop_id);
        $tour = $stop->tour;
        $list = [];
        foreach ($tour->stops as $key => $value) {
            if ($value->stop_freights != null) {
                $list = $value->stop_freights()->with('freights.freight_details')->get();
            }
        }
         
        $weight = 0;
        $width = 0;
        $height = 0;
        $length = 0;

        foreach ($list as $key => $value) {
            $weight += (int) $value->freights->freight_details->weight;
            $width += (int) $value->freights->freight_details->width * 10;
            $height += (int) $value->freights->freight_details->height * 10;
            $length += (int) $value->freights->freight_details->length * 10;
        }

        $measurements= [$weight , $width , $height , $length];
        $number_of_packets = count($list);
        $ship = $tour->tour_ship;
        $ship_min_packets = $ship->min_packets;

        if ($ship->pay_load_max < $measurements[0] || $ship->width < $measurements[1] || $ship->height < $measurements[2] || $ship->length < $measurements[3] || $ship_min_packets < $number_of_packets) {
            $new_ship = Shipping::where([
                ['pay_load_max' , '>=' , $measurements[0]],
                ['width' , '>=' , $measurements[1]],
                ['height' , '>=' , $measurements[2]],
                ['length' , '>=' , $measurements[3]],
                ['min_packets' , '>=' , $number_of_packets],
            ])->first();


            $tour->ship_id = $new_ship->id;
            $tour->save();
        }
        $distance = round($request->distance / 1000);

        $ship_distance = ShippingDistance::where([
            ['min','<=',$distance],
            ['max','>=',$distance],
            ['is_active','=',1],
        ])->first();

        $cost = $tour->tour_ship()->with(['costs'=>function ($query) use ($ship_distance) {
            $query->where('distance_id', $ship_distance->id);
        }])->first();

        $price = $distance * $cost->costs[0]->cost_per_kilo;
        $freight->freight_details()->update(['price'=> $price ]);

        return 1;
    }

    public function destroyFreight(Request $request)
    {
        $freight = Freights::find($request->id);
        $freight->stops_freights()->delete();
        $freight->delete();
        return 1;
    }

    public function editStopFreight(Request $request)
    {
        $freight = Freights::find($request->id);
        $freight->name = $request->name;
        $freight->save();

        $cat_id = '';
        if ($request->category == 'other') {
            $cat_id = null;
        } else {
            $cat_id = $request->category;
        }

        $freight->freight_details()->update([

            'width' => $request->width,
            'weight' => $request->weight,
            'length' => $request->length,
            'height' => $request->height,
            'type' => $request->type,
            'pick_period' => $request->pick_period,
            'freight_cat_id' => $cat_id,

        ]);

        $stop = Stops::find($request->stop_id);
        $stop->stop_freights()->update([
            'number_of_packets' => $request->number_of_items,
            'order_person_id' => $request->order_person_id,
            'freight_id' => $freight->id,
            'notes' => $request->description,
        ]);


        return 1;
    }
}
