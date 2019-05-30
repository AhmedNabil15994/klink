<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreightLager extends Model
{
	protected $table = 'freight_lagers';
    public $timestamps = true;
    protected $fillable = ['lager_id','stop_freight_id'];

    public function stop_freight(){
    	return $this->belongsTo('App\Models\Frontend\StopsFreights','id','stop_freight_id');
    }

    public function lager(){
    	return $this->hasOne('App\Models\Frontend\Lager','lager_id','id');
    }
}
