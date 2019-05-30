<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TourOffers extends Model
{
    public $timestamps = true;
    protected $fillable = ['company_profile_id','driver_profile_id','vehicle_id','tour_id','bill_id','customer_accepted','company_offer','standard_tour_price'];


    public function tour()
    {
        return $this->belongsTo('App\Models\Frontend\Tour', 'tour_id', 'id');
    }

    public function tour_company()
    {
        return $this->hasOne('App\Models\Frontend\Profile', 'id', 'company_profile_id');
    }

    public function tour_driver()
    {
        return $this->hasOne('App\Models\Frontend\Profile', 'id', 'driver_profile_id');
    }

    public function tour_vehicle()
    {
        return $this->hasOne('App\Models\Frontend\Vehicle', 'id', 'vehicle_id')->withDefault();
    }
    public function scopeTourFormula($q)
    {
        return $q->with(['tour_company'=>function ($q) {
            return $q->select(['id','first_name','last_name']);
        },'tour_driver'=>function ($q) {
            return $q->select(['id','first_name','last_name']);
        },'tour_vehicle'=>function ($q) {
            return $q->select(['id','model','ship_name','weight','ship_id'])->with('ship');
        }]);
    }
}
