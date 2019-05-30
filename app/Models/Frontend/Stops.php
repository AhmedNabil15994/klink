<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Stops extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name','stop_description','stop_bar_code','number_id','address_id','tour_id','stops_number','weight','stop_time','duration','stop_time','stop_index'
    ];
    

    public function tour()
    {
        return $this->belongsTo('App\Models\Frontend\Tour', 'tour_id', 'id');
    }

    public function stop_address()
    {
        return $this->belongsTo('App\Models\Frontend\Address', 'address_id', 'id');
    }

    public function stop_number()
    {
        return $this->hasOne('App\Models\Frontend\Number', 'id', 'number_id');
    }

    public function stop_freights()
    {
        return $this->hasMany('App\Models\Frontend\StopsFreights', 'stop_id', 'id');
    }

    public function trip_stops()
    {
        return $this->hasMany('App\Models\Frontend\TripStop', 'stop_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($stop) {
            foreach ($stop->trip_stops as $one) {
                $one->delete();
            }
            foreach ($stop->stop_freights as $item) {
                $item->delete();
            }
        });
    }
}
