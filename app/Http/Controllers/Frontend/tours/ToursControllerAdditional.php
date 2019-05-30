<?php

namespace App\Http\Controllers\Frontend\tours;

use Illuminate\Http\Request;
use App\Models\Frontend\Tour;
use App\Models\Frontend\Address;
use App\Models\Frontend\Country;
use App\Models\Frontend\Stops;
use App\Models\Frontend\TourDates;
use App\Models\Frontend\TourDetails;
use App\Models\Frontend\TourTimeCalculations;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\CarbonInterval;
use Carbon\Carbon;
use App\Models\Frontend\TourOffers;
use App\Models\Frontend\NewDocument;
use App\Http\Requests\ImagesRequest;

class ToursControllerAdditional extends ToursController
{
    
    public function saveTourDates($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        $calculations = request()->all();
        $this->validateTourCalculations();
        $this->storeTourCalculations($tour);
        // return $tour->cancelationDates;
        return $this->tourFormula($tour);
    }
    public function acceptTerms(ImagesRequest $request, $encrypted)
    {
            
        $tour = $this->getTourId($encrypted);
        foreach ($request->avatars as $file) {
            // dd($file->getMimeType());
            $path = $file->storeAs('signatures',$tour->id.'.'.$file->getClientOriginalExtension());
        }
        $tour->tour_details()->update([
            'terms_accepted'=>1
        ]);
        return $this->tourFormula($tour);
    }
    public function storeTourCalculations(Tour $tour)
    {
        $tourCalculations = [
            'accounting',
            'payment',
            'test',
            'cancelation',
        ];
        $typesIndexes = [
            'days'=>0,
            'weeks'=>1,
            'months'=>2
        ];
        foreach ($tourCalculations as $key=>$name) {
            $storedArray = [
                
                'time'=>$typesIndexes[request()[$name]['values']['type']],
                'every'=>request()[$name]['values']['every'],
                'period'=>request()[$name]['values']['condition'],
            ];
            
            $tour->calculations()->updateOrCreate([
                'type'=>$key
            ], $storedArray);
        }
    }
    public function validateTourCalculations()
    {
        $validationArray = [
            'accounting'=>'required|array',
            'payment'=>'required|array',
            'test'=>'required|array',
            'cancelation'=>'required|array',
        ];
        $this->validate(request(), $validationArray);
        foreach ($validationArray as $type=>$value) {
            $this->validateTimeType($type);
        }
    }
    public function validateTimeType($type)
    {
        $typesIndexes = [
            'accounting'=>[
                'key'=>0,
                
            ],
            'payment'=>[
                'key'=>1,
                
            ],
            'test'=>[
                'key'=>2,
                
            ],
            'cancelation'=>[
                'key'=>3,
                
            ],
        ];
        
        
        $validationArray = [
            $type.'.key'=>'required|in:'.$typesIndexes[$type]['key'],
            $type.'.values'=>'required|array',
            $type.'.values.type'=>'required|in:days,weeks,months',
        ];
        
        $this->validate(request(), $validationArray);
        
        $this->validate(request(), $this->getValidationTypeArray($type));
    }
    public function getvalidationTypeArray($type)
    {
        $typesIndexes = [
            'accounting'=>[
                'key'=>0,
                'days'=>[
                    'min_every'=>0,
                    'max_every'=>0,
                    'min_condition'=>0,
                    'max_condition'=>0
                ],
                'weeks'=>[
                    'min_every'=>0,
                    'max_every'=>0,
                    'min_condition'=>1,
                    'max_condition'=>2
                ],
                'months'=>[
                    'min_every'=>0,
                    'max_every'=>0,
                    'min_condition'=>3,
                    'max_condition'=>5
                ],
                
            ],
            'payment'=>[
                'key'=>1,
                'days'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInDays(Carbon::now()->add(CarbonInterval::days(60))),
                    'min_condition'=>0,
                    'max_condition'=>0
                ],
                'weeks'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInWeeks(Carbon::now()->add(CarbonInterval::days(60))),
                    'min_condition'=>1,
                    'max_condition'=>2
                ],
                'months'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInMonths(Carbon::now()->add(CarbonInterval::days(60))),
                    'min_condition'=>3,
                    'max_condition'=>5
                ],
                
            ],
            'test'=>[
                'key'=>2,
                'days'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInDays(Carbon::now()->add(CarbonInterval::month(3))),
                    'min_condition'=>0,
                    'max_condition'=>8
                ],
                'weeks'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInWeeks(Carbon::now()->add(CarbonInterval::month(3))),
                    'min_condition'=>0,
                    'max_condition'=>8
                ],
                'months'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInMonths(Carbon::now()->add(CarbonInterval::month(3))),
                    'min_condition'=>0,
                    'max_condition'=>8
                ],
                
            ],
            'cancelation'=>[
                'key'=>2,
                'days'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInDays(Carbon::now()->add(CarbonInterval::year(10))),
                    'min_condition'=>0,
                    'max_condition'=>8
                ],
                'weeks'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInWeeks(Carbon::now()->add(CarbonInterval::year(10))),
                    'min_condition'=>0,
                    'max_condition'=>8
                ],
                'months'=>[
                    'min_every'=>0,
                    'max_every'=>Carbon::now()->diffInMonths(Carbon::now()->add(CarbonInterval::year(10))),
                    'min_condition'=>0,
                    'max_condition'=>8
                ],
                
            ],
            
            
        ];
        $requestType = request()[$type]['values']['type'];
        $requestTypeArray = $typesIndexes[$type][$requestType];
        return [
            $type.'.values.every'=>'required|numeric|min:'.$requestTypeArray['min_every'].'|max:'.$requestTypeArray['max_every'],
            $type.'.values.condition'=>'required|numeric|min:'.$requestTypeArray['min_condition'].'|max:'.$requestTypeArray['max_condition']
        ];
    }
    public function tourOffer($encrypted, TourOffers $touroffer)
    {
        $tour = $this->getTourId($encrypted);
        if ($touroffer->tour_id==$tour->id) {
            return $touroffer->TourFormula()->find($touroffer->id);
        }
        abort(404);
    }
    public function tourDetails($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        return $this->tourFormula($tour);
    }
    public function getTourId($encrypted, $isAuth = false)
    {
        try {
            $decrypted = decrypt($encrypted);
        } catch (DecryptException $e) {
            abort(404);
        }
        $id = explode('-', $decrypted)[1];
        $tour = Tour::findOrFail($id);
        if ($tour->company_profile && !$isAuth) {
            if (!request()->user()||!request()->user()->profile||$tour->company_profile->id!==request()->user()->profile->id) {
                abort(403, 'Not Authorized');
            }
        }
       
        if (request()->user()) {
            if (!$tour->company_profile&&request()->user()->profile) {
                $tour->company_profile()->associate(request()->user()->profile);
                $tour->save();
            }
        }
        
        return $tour;
    }
    public function getOrderIcon($id)
    {
        $color = request()->input('color', '#ff0000');
        return view('frontend.dashboard.touricon')->with(compact('id', 'color'), header('content-type', 'image/svg'));
    }
    public function acceptOffer()
    {
        $tour = $this->getTourId(request()->tour);
        $acceptedOffers = $tour->tour_offer()->where('customer_accepted', 1)->count();
        if ($acceptedOffers>0) {
            abort(response()->json([
                'errors'=>[
                    'depublicated'=>['Their is an accepted offer'],
                ]
                ], 422));
        }
        $offer = $tour->tour_offer()->findOrFail(request()->offer);
        $offer->update([
            'customer_accepted'=>1
        ]);
        return $this->tourFormula($tour);
    }
    public function saveTourDays($encrypted)
    {
        $this->validate(request(), ['days'=>'required|array|min:1']);
        $tour = $this->getTourId($encrypted);
        $tourDays = $this->getDaysShortCuts(request()->days);
        $tour->tour_dates()->update([
            'days'=>json_encode($tourDays)
        ]);
        return $tour->tour_dates;
    }
}
