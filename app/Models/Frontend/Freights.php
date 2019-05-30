<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Freights extends Model
{
    public $timestamps = true;
    protected $fillable = [
    	'freight_details_id','last_seen_location','name'
    ];


    public function stops_freights(){
    	return $this->belongsTo('App\Models\Frontend\StopsFreights','id','freight_id');
    }

    public function freight_notification(){
    	return $this->hasMany('App\Models\Frontend\FreightNotification','freight_id','id');
    }

    public function freight_details(){
    	return $this->hasOne('App\Models\Frontend\FreightDetails','freight_id','id');
    }

}
