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
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Chart\Exception;

class editTourController extends ToursControllerAdditional
{
    public function tour_ship($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        $this->validate(request(), [
            'ship_id'=>'required|numeric|exists:shippings,id',
            'price'=>'required|numeric'
        ]);
        $this->validateTourPriceEdit($tour->tour_details->tour_total_distance, request()->ship_id, $tour);
        $tour->update([
            'price'=>request()->price
        ]);
        $ship = Shipping::findOrFail(request()->ship_id);
        $tour->tour_ship()->associate($ship);
        $tour->save();
        return $tour;
    }
    public function validateTourPriceEdit($totalDistance = null, $ship_id = null, Tour $tour, $return = false)
    {
        $availableShippingType = ShippingDistance::where('min', '<=', $totalDistance)
            ->where('max', '>=', $totalDistance)->first();
        $ship = Shipping::findOrFail($ship_id);
        $this->shipMatch($ship, $tour->tour_details->tour_total_weight);
        $this->samePrice($ship, $availableShippingType, $this->findTourTimesEdit($tour), $totalDistance, request()->price);
    }
    public function findTourTimesEdit(Tour $tour)
    {
        if (count($tour->stops)==1) {
            return $tour->tour_details->number_of_stops * $tour->tour_details->tour_average_stop_time;
        } else {
            return $tour->stops()->sum('stop_time');
        }
    }
    public function changeShip(Tour $tour, $weight)
    {
        $ship = Shipping::selectRaw('CAST(pay_load_max AS UNSIGNED) as pay_load_max,id')->where('pay_load_max', '>=', floatval($weight))->orderBy('pay_load_max', 'ASC')->first();
        $totalDistance = $tour->tour_details->tour_total_distance;
        $availableShippingType = ShippingDistance::where('min', '<=', $totalDistance)
            ->where('max', '>=', $totalDistance)->first();
        if (!$ship) {
            $this->shipError('weight');
        }
        $this->changePrice($tour, $ship, $availableShippingType, $totalDistance);
        $tour->tour_ship()->associate($ship);
        $tour->save();
        return $ship;
    }
    public function changePrice(Tour $tour, Shipping $ship, ShippingDistance $availableShippingType, $totalDistance)
    {
        $price =  $this->samePrice($ship, $availableShippingType, $this->findTourTimesEdit($tour), $totalDistance, $tour->price, true);
        $tour->update([
            'price'=>$price
        ]);
    }
    public function tour_details($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        $acceptableArray = [
            'tour_total_weight'=>[
                'handler'=>function () use ($tour) {
                    try {
                        $this->shipMatch($tour->tour_ship, request()->tour_total_weight);
                    } catch (\Exception $e) {
                        $this->changeShip($tour, request()->tour_total_weight);
                    }
                    $tour->tour_details()->update([
                        'tour_total_weight'=>request()->tour_total_weight
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|numeric|min:1'
            ],
            'tour_total_packets_number'=>[
                'handler'=>function () use ($tour) {
                    $tour->tour_details()->update([
                        'tour_total_packets_number'=>request()->tour_total_packets_number
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|numeric|min:1'
            ],
            'tour_average_stop_time'=>[
                'handler'=>function () use ($tour) {
                    $tour->tour_details()->update([
                        'tour_average_stop_time'=>request()->tour_average_stop_time
                    ]);
                    $totalDistance = $tour->tour_details->tour_total_distance;
                    $availableShippingType = ShippingDistance::where('min', '<=', $totalDistance)
                                                ->where('max', '>=', $totalDistance)->first();
                    $this->changePrice($tour, $tour->tour_ship, $availableShippingType, $totalDistance);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|numeric|min:1',
            ],
            'tour_total_time'=>[
                'handler'=>function () use ($tour) {
                    $minTime = $tour->tour_details->number_of_stops * $tour->tour_details->tour_average_stop_time;
                    $this->validate(request(), [
                        'tour_total_time'=>'required|numeric|min:'.$minTime,
                    ]);
                    $tour->tour_details()->update([
                        'tour_total_time'=>request()->tour_total_time
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|numeric|min:1'
            ],
            'number_of_stops'=>[
                'handler'=>function () use ($tour) {
                    $tour->tour_details()->update([
                        'number_of_stops'=>request()->number_of_stops
                    ]);
                    if ((float)$tour->tour_details->tour_total_time < $tour->tour_details->number_of_stops * $tour->tour_details->tour_average_stop_time) {
                        $tour->tour_details()->update([
                            'tour_total_time'=>$tour->tour_details->number_of_stops * $tour->tour_details->tour_average_stop_time
                        ]);
                    }
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|numeric|min:2',
            ],
            'tour_start_time'=>[
                'handler'=>function () use ($tour) {
                    $startTime = new Carbon($tour->tour_dates->tour_start_time);
                    $endTime = new Carbon($tour->tour_dates->tour_finish_time);
                    $diff = $startTime->diffInMinutes($endTime);
                    $newStartTime = new Carbon(request()->tour_start_time);
                    
                    $tour->tour_dates()->update([
                        'tour_start_time'=>request()->tour_start_time,
                        'tour_finish_time'=> $newStartTime->addMinutes($diff),
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|date_format:H:i'
            ],
            'tour_finish_date'=>[
                'handler'=>function () use ($tour) {
                    $tour->tour_dates()->update([
                        'tour_finish_date'=>request()->tour_finish_date
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|date'
            ],
            'tour_finish_time'=>[
                'handler'=>function () use ($tour) {
                    $tour->tour_dates()->update([
                        'tour_finish_time'=>request()->tour_finish_time
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|date_format:H:i'
            ],
            'stop_time'=>[
                'handler'=>function () use ($tour) {
                    $stop = Stops::where('tour_id', $tour->id)->findOrFail(request()->stop_id);
                    $diff  = request()->stop_time - $stop->stop_time;
                    $stop->update([
                       'stop_time'=>request()->stop_time
                   ]);
                   
                    $totalDistance = $tour->tour_details->tour_total_distance;
                    $ship = $tour->tour_ship;
                    $availableShippingType = ShippingDistance::where('min', '<=', $totalDistance)
                   ->where('max', '>=', $totalDistance)->first();
                    $this->changePrice($tour, $ship, $availableShippingType, $totalDistance);
                    
                    $tour->tour_details()->update([
                       'tour_total_time'=>($tour->tour_details->tour_total_time+$diff),
                    ]);
                    
                    // return new Carbon($tour->tour_dates->tour_start_time);
                    $finishTime =  new Carbon($tour->tour_dates->tour_finish_time);
                    $finishTime =  $finishTime->addMinutes($diff);
                    $tour->tour_dates()->update([
                        'tour_finish_time'=>$finishTime
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required|numeric|min:0'
            ],
            'stop_name'=>[
                'handler'=>function () use ($tour) {
                    $stop = Stops::where('tour_id', $tour->id)->findOrFail(request()->stop_id);
                    $stop->update([
                        'name'=>request()->stop_name,
                    ]);
                    return $this->tourFormula($tour);
                },
                'validator'=>'required'
            ],
        ];
        foreach ($acceptableArray as $key=>$value) {
            if (request()->has($key)) {
                $this->validate(request(), [
                    $key=>$value['validator']
                ]);
                return $value['handler']();
            }
        }
        abort(404);
    }
}
