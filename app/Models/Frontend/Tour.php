<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Tour extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'notes','profile_id_company','ship_id','tour_number','tour_name','is_active','price','tour_type','stops_number',
    ];


    public function tour_details()
    {
        return $this->hasOne('App\Models\Frontend\TourDetails', 'tour_id', 'id');
    }
    public function tour_payments()
    {
        return $this->hasMany('App\Models\Frontend\TourPayments', 'tour_id', 'id');
    }
    public function tour_offer()
    {
        return $this->hasMany('App\Models\Frontend\TourOffers', 'tour_id', 'id');
    }
    public function tour_dates()
    {
        return $this->hasOne('App\Models\Frontend\TourDates', 'tour_id', 'id');
    }
    public function trips()
    {
        return $this->hasMany('App\Models\Frontend\Trip', 'tour_id', 'id');
    }

    public function company_profile()
    {
        return $this->belongsTo('App\Models\Frontend\Profile', 'profile_id_company', 'id');
    }

    public function tour_ship()
    {
        return $this->belongsTo('App\Models\Backend\Shipping', 'ship_id', 'id');
    }

    public function stops()
    {
        return $this->hasMany('App\Models\Frontend\Stops', 'tour_id', 'id');
    }
    
    public function accepted_offer()
    {
        $offer = $this->hasOne('App\Models\Frontend\TourOffers', 'tour_id', 'id')->where('customer_accepted', 1);
        return $offer;
    }

    public function calculations()
    {
        return $this->hasMany('App\Models\Frontend\TourTimeCalculations', 'tour_id', 'id');
    }


    public function accountingDates()
    {
        return  $this->hasOne('App\Models\Frontend\TourTimeCalculations', 'tour_id', 'id')
                        ->orderBy('id', 'DESC')
                        ->where('type', 0);
    }
    public function paymentDates()
    {
        return  $this->hasOne('App\Models\Frontend\TourTimeCalculations', 'tour_id', 'id')
                        ->orderBy('id', 'DESC')
                        ->where('type', 1);
    }
    public function testsDates()
    {
        return  $this->hasOne('App\Models\Frontend\TourTimeCalculations', 'tour_id', 'id')
                        ->orderBy('id', 'DESC')
                        ->where('type', 2);
    }
    public function cancelationDates()
    {
        return  $this->hasOne('App\Models\Frontend\TourTimeCalculations', 'tour_id', 'id')
                        ->orderBy('id', 'DESC')
                        ->where('type', 3);
    }
    

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($tour) {
            foreach ($tour->trips as $trip) {
                $trip->delete();
            }

            foreach ($tour->tour_offer as $offer) {
                $offer->delete();
            }

            foreach ($tour->stops as $stop) {
                $stop->delete();
            }
        });
    }


    public function getTourPerson()
    {
        $result = '';
        $profile = $this->company_profile;
        $details =  $this->tour_details;
        if ($profile) {
            if ($profile->company) {
                $result = $profile->company.'<br> (User)';
            } else {
                $result = $profile->name().'<br> (User)';
            }
        } elseif ($details->tour_person) {
            if ($details->tour_person->company) {
                $result = $details->tour_person->company.'<br> (Order Person)';
            } else {
                $result = $details->tour_person->name().'<br> (Order Person)';
            }
        }
        return $result;
    }

    public function detPerson()
    {
        $result = '';
        $type = '';
        $profile = $this->company_profile;
        $details = $this->tour_details;
        if ($profile) {
            $result = $profile;
            $type = 'profile';
        } elseif ($details->tour_person) {
            $result = $details->tour_person;
            $type = 'order_person';
        }
        return [$result,$type];
    }
}
