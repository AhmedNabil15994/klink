<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class StopsFreights extends Model
{
	protected $table = 'stops_freights';
    public $timestamps = true;
    protected $fillable = [

    	'number_of_packets','notes','freight_id','stop_id','order_person_id'

    ];


    public function stop(){
    	return $this->belongsTo('App\Models\Frontend\Stops','stop_id','id');
    }

    public function order_person(){
    	return $this->hasOne('App\Models\Frontend\OrderPerson','id','order_person_id');
    }

    public function freights(){
    	return $this->hasOne('App\Models\Frontend\Freights','id','freight_id');
    }

    public function freight_lager(){
    	return $this->hasOne('App\Models\Frontend\FreightLager','stop_freight_id','id');
    }

}
