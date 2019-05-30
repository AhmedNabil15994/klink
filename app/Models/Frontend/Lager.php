<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Lager extends Model
{
	protected $table = 'lagers';
    public $timestamps = true;
    protected $fillable = ['lager_location_id','name'];


    public function freight_lager(){
    	return $this->belongsTo('App\Models\Frontend\FreightLager','id','lager_id');
    }


    public function lager_address(){
    	return $this->hasOne('App\Models\Frontend\Address','lager_location_id','id');
    }

}
