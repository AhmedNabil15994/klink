<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TripStop extends Model
{
    public $timestamps = true;
    protected $fillable = ['trip_id','stop_id','is_user_delivered','is_driver_delivered'];

    public function stops(){
        return $this->belongsTo('App\Models\Frontend\Stops','stop_id','id');
    }

    public function trips(){
        return $this->belongsTo('App\Models\Frontend\Trip','trip_id','id');
    }

}
