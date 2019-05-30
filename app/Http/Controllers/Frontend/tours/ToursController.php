<?php

namespace App\Http\Controllers\Frontend\tours;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Tour;
use App\Models\Frontend\Address;
use App\Models\Frontend\Country;
use App\Models\Frontend\Stops;
use App\Models\Frontend\TourDates;
use App\Models\Frontend\TourDetails;
use App\Models\Backend\ShippingDistance;
use App\Models\Backend\Shipping;
use App\Models\Frontend\NewDocument;
use Carbon\Carbon;

class ToursController extends Controller
{
    public function tourFormula(Tour $tour)
    {
        $tour =  $tour->with(['stops'=>function ($q) {
            return $q->with('stop_address')->orderBy('stop_index');
        },'tour_dates','tour_ship','tour_payments','tour_details','calculations','tour_offer'=>function ($q) {
            return $q->tourFormula();
        }])->find($tour->id);
        $tour->encrypted = encrypt('T-'.$tour->id);
        $tour->isAuth = auth()->check() ? 2 : 0;
        $tour->userId = auth()->check() ? request()->user()->id : 0;
        if ($tour->isAuth==1&&request()->user()->email_verified_at) {
            $tour->isAuth = 2;
        }
        if($tour->accepted_offer){
            
            $tour->terms = $this->tourTerms($tour);
        }
        return $tour;
    }
    protected function tourTerms(Tour $tour){
       
        $terms = NewDocument::where('name','subadmin_biznustomer_tour')->first();
        $terms->layout = strip_tags($terms->layout);
        $terms->layout = $this->getTerms($terms,$tour);
        return $terms;
        
    }
    protected function getTerms(NewDocument $terms, Tour $tour){
        $data = [
            // 'super_admin_company_name'=>'ahmed'
        ];
        $layout = preg_replace_callback('/({{|\[)(.*)(}}|\])/U', function ($matches) use ($data) {
            list($shortCode, $shortCodeTwo, $index) = $matches;

            if (isset($data[$index])) {
                return $data[$index];
            } else {
                return $shortCode;
            }
        }, $terms->layout);
        return $layout;
    }
    public function newTour()
    {
        $this->validateTour();
        $tour = $this->storeTour();
        $this->saveTourCalcs($tour);
        return $tour;
    }
    public function saveTourCalcs(Tour $tour)
    {
        $types = [
            0=>[
                'every'=>0,
                'time'=>2,
                'period'=>4
            ],
            1=>[
                'every'=>1,
                'time'=>2,
                'period'=>5
            ],
            2=>[
                'every'=>2,
                'time'=>1,
                'period'=>5
            ],
            3=>[
                'every'=>4,
                'time'=>1,
                'period'=>4
            ]
        ];
        foreach ($types as $type=>$storedArray) {
            $tour->calculations()->updateOrCreate([
                'type'=>$type
            ], $storedArray);
        }
    }
    public function storeTour()
    {
        $tourArray = [
            'tour_type'=>$this->getTourType(),
            'ship_id'   =>request()->tour['ship_id'],
            'price'     =>request()->tour['price']

        ];
        $tour = Tour::create($tourArray);
        $this->saveStops($tour);
        $this->saveTourDates($tour);
        $this->saveTourDetails($tour);
        $tour =  $tour->with(['stops'=>function ($q) {
            return $q->with('stop_address');
        },'tour_dates','tour_details'])->find($tour->id);
        $tour->encrypted = encrypt('T-'.$tour->id);
        return $tour;
    }

    public function saveStops(Tour $tour)
    {
        $myStops = [];
        foreach (request()->stops as $index=>$stop) {
            $newStop = $this->saveStop($stop, $index);
            
            $tour->stops()->save($newStop);
        }
    }
    public function saveTourDates(Tour $tour)
    {
        $tourDays = $this->getDaysShortCuts(request()->tour['days']);
        
        // dd(request()->all());
        // Carbon
        $startTime = new Carbon(request()->tour['tourStartTime']);
        $finishTime =  $startTime->addMinutes(request()->stopsGeneral['totalTimeOfStops']);
        $tourDatesArray = [
            'tour_start_date'=>request()->tour['tourStartDate'],
            'tour_start_time'=>request()->tour['tourStartTime'],
            'tour_finish_time'=>$finishTime,
            'days'=>json_encode($tourDays)
        ];
        $tourDates = new TourDates($tourDatesArray);
        $tourDates->tour()->associate($tour);
        $tourDates->save();
    }
    public function saveTourDetails(Tour $tour)
    {
        $tourDetailsArray = [
            'tour_total_weight'=>request()->stopsGeneral['totalWeight'],
            'tour_total_distance'=>request()->stopsGeneral['totalDistanceStops'],
            'tour_total_time'=>request()->stopsGeneral['totalTimeOfStops'],
            'tour_total_packets_number'=>request()->stopsGeneral['numberOfPackets'],
            'tour_average_stop_time'=>request()->stopsGeneral['timePerStop'],
            'number_of_stops'=>request()->stopsGeneral['numberOfStops']
        ];
        
        $tourDetails = new TourDetails($tourDetailsArray);
        $tourDetails->tour()->associate($tour);
        $tourDetails->save();
    }
    public function getDaysShortCuts($days)
    {
        //because we have to save it like this ['mo','di','sa']
        //and the input comes like [0,1,2,3]
        $shortcuts = [
            'Mo',
            'Di',
            'Mi',
            'Do',
            'Fr',
            'Sa',
            'So'
        ];
        $daysToShortcuts = [];
        foreach ($days as $day) {
            array_push($daysToShortcuts, $shortcuts[$day]);
        }
        return $daysToShortcuts;
    }
    public function saveStop($stop, $index=0)
    {
        $address = $this->getAddress($stop['location']);
        $stop = new Stops([
            'name'=>$stop['stopName'],
            'stop_time'=>$stop['loadTime'],
            'stop_type'=>request()->allowStops?'Dynamic':'Static',
            'stop_index'=>$index
        ]);
        
        $stop->stop_address()->associate($address);
        // $stop->save();
        return $stop;
    }
    public function getAddress($location)
    {
        $country = Country::where('code', $location['address']['country'])->firstOrFail();
        
        unset($location['address']['country']);
        $location['address']['country_id'] = $country->country_id;
        
        $lat = strval($location['geometry']['lat']);
        $lng = strval($location['geometry']['lng']);
        $location['address']['lat_lng']    = json_encode([$lat, $lng]);
        $address = Address::firstOrCreate($location['address']);
        
        return $address;
    }
    
    public function validateTour()
    {
        $addTypeValidation = [
            'time',
            'dates',
        ];
        $tourArray = [
            'tour.mainType'=>'required',
            'tour.tourStartDate'=>'required|date',
            'tour.tourStartTime'=>'required|date_format:H:i',
            'tour.days' =>'required|array|min:1',
            'tour.days.*'=>'required|numeric|min:0|max:6',
            'tour.ship_id'=>'required|numeric|exists:shippings,id',
            'tour.price'=>'required|numeric'
            
        ];
        $this->validateTourPrice();
        if (in_array(request()->mainType, $addTypeValidation)) {
            $tourArray['tour.type'] = 'required';
        }
        $this->validate(request(), $tourArray);
        // if (request()->tour['mainType']==='stops') {
        $this->validateStopsGeneral();
        // }
    }
    public function validateTourPrice($totalDistance=null, $ship_id=null)
    {
        if (!$totalDistance) {
            $totalDistance = request()->stopsGeneral['totalDistanceStops'];
        }
        if (!$ship_id) {
            $ship_id = request()->tour['ship_id'];
        }
        $availableShippingType = ShippingDistance::where('min', '<=', $totalDistance)
            ->where('max', '>=', $totalDistance)->first();
        $ship = Shipping::findOrFail($ship_id);
        $this->shipMatch($ship);
        $this->samePrice($ship, $availableShippingType);
    }
    public function samePrice(Shipping $ship, ShippingDistance $shippingDistance, $timeOfStops=null, $totalDistanceStops=null, $tourPrice=null, $return = false)
    {
        $shipCost = $ship->costs()->where('distance_id', $shippingDistance->id);
        if ($shipCost->count()==0) {
            $this->shipError('ship');
        }
        if (!$totalDistanceStops) {
            $totalDistanceStops = request()->stopsGeneral['totalDistanceStops'];
        }
        //to do (add a function that get the exact time of stops)
        if (!$timeOfStops) {
            $timeOfStops = $this->findTourTimes();
        }
        if (!$tourPrice) {
            $tourPrice = request()->tour['price'];
        }
        $shipCost = $shipCost->first();
        $loadTime = $timeOfStops - $ship->specs->min_load_time;
        $cost_per_unit = $loadTime * $ship->specs->cost_per_unit;
        
        if ($shipCost->cost_per_kilo * $totalDistanceStops < $shipCost->min_cost) {
            $newprice = ($shipCost->min_cost + $cost_per_unit);
            $newprice =  number_format($newprice, 2, '.', '');
        } else {
            $newprice = (($shipCost->cost_per_kilo * $totalDistanceStops) + $cost_per_unit);
            $newprice =  number_format($newprice, 2, '.', '');
        }
        
        if ($return) {
            return $newprice;
        }
        if ($newprice>=$tourPrice-1&&$newprice<=$tourPrice+1) {
            return true;
        } else {
            $this->shipError('price');
            return false;
        }
    }
    public function findTourTimes()
    {
        if (request()->allowStops==true) {
            $TotalTime = 0;
            foreach (request()->stops as $stop) {
                $TotalTime += $stop['loadTime'];
            }
            return $TotalTime;
        } else {
            return request()->stopsGeneral['timePerStop'] * request()->stopsGeneral['numberOfStops'];
        }
    }
    public function shipMatch(Shipping $ship, $weight=null)
    {
        if (!$weight) {
            $weight = request()->stopsGeneral['totalWeight'];
        }
        if ($ship->pay_load_max<$weight) {
            $this->shipError('ship');
        };
    }
    public function shipError($value)
    {
        abort(response()->json([
            'errors'=>[
                $value=>['The '.$value.' don\'t match.'],
            ]
            ], 422));
    }
    public function validateStopsGeneral()
    {
        $minimumNumber = request()->allowStops==true ? 2:1;
        $stopsGeneral = [
            'allowStops'=>'required|boolean',
            'stopsGeneral.numberOfPackets'=>'required|numeric|min:1',
            'stopsGeneral.numberOfStops'=>'required|numeric|min:'.$minimumNumber,
            'stopsGeneral.timePerStop'=>'required|numeric|min:0',
            'stopsGeneral.totalTimeOfStops'=>'required|numeric|min:1',
            'stopsGeneral.totalDistanceStops'=>'required|numeric|min:0',
            'stopsGeneral.totalWeight'=>'required|numeric|min:1',
        ];
        $this->validate(request(), $stopsGeneral);
        if (request()->allowStops==true) {
            $this->validateStops($minimumNumber, request()->stopsGeneral['numberOfStops']);
        } else {
            $this->validateStops($minimumNumber, $minimumNumber);
        }
    }
    
    public function validateStops($min, $max)
    {
        $stopArray = [
            'stops'=>'required|array|min:'.$min.'|max:'.$max,
            'stops.*.loadTime'=>'required|numeric|min:0',
            'stops.*.stopName'=>'required',
            'stops.*.location.geometry'=>'required',
            'stops.*.location.geometry.lat'=>'required|numeric|min:-90|max:90',
            'stops.*.location.geometry.lng'=>'required|numeric|min:-180|max:180',
            'stops.*.location.address'=>'required|array',
            'stops.*.location.address.home'=>'required',
            'stops.*.location.address.postal_code'=>'required',
            'stops.*.location.address.street'=>'required',
            'stops.*.location.address.region'=>'required',
            'stops.*.location.address.city'=>'required',
            'stops.*.location.address.country'=>'required'
        ];
        $this->validate(request(), $stopArray);
    }
    
    public function getTourType()
    {
        $toursTypes = [
            'stops'=>[
                'index'=>0
            ],
            'time'=>[
                'otherTypes'=>[
                    'minutes'=>1,
                    'hours'=>2,
                ],
            ],
            'dates'=>[
                'otherTypes'=>[
                'days'=>3,
                'week'=>4,
                'month'=>5,
                ]
            ],
            'packets'=>[
                
                'index'=>6
            ]
        ];
        $mainType = isset($toursTypes[request()->tour['mainType']]) ? $toursTypes[request()->tour['mainType']] : false;
        
        if (!$mainType) {
            $this->abortInvalidType();
        }
        if (isset($mainType['index'])) {
            return $mainType['index'];
        } elseif (isset($mainType['otherTypes'])) {
            $type = request()->tour['type'];
            if (isset($mainType['otherTypes'][$type])) {
                return $mainType['otherTypes'][$type];
            } else {
                $this->abortInvalidType();
            }
        } else {
            $this->abortInvalidType();
        }
    }
    public function abortInvalidType()
    {
        abort(response()->json([
            'errors'=>[
                'stop'=>[
                    'invalidtype'=>'the tour type is invalid'
                ],
            ]
            ], 422));
    }
}
