<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public $timestamps = true;
    protected $fillable = ['tour_id'];

    public function tour(){
    	return $this->belongsTo('App\Models\Frontend\Tour','tour_id','id');
    }

    public function trip_calc_type(){
    	return $this->hasOne('App\Models\Frontend\TripCalculateType','trip_id','id');
    }

    public function is_done_dates(){
        return $this->hasOne('App\Models\Frontend\IsDoneDates','trip_id','id');
    }

    public function trip_stops(){
        return $this->hasMany('App\Models\Frontend\TripStop','trip_id','id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($trip) { 
            foreach($trip->trip_stops as $stop){
                $stop->delete();
            }

            if($trip->is_done_dates != null){
                $trip->is_done_dates->delete();
            }

            if($trip->trip_calc_type != null){
                $trip->trip_calc_type->delete();
            }    
        });
    }

}
