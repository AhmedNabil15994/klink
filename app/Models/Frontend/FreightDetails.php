<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreightDetails extends Model
{
    public $table = 'freights_details';
    public $timestamps = true;
    protected $fillable = [
    	'freight_id','freight_cat_id','width','length','height','weight','type','pick_period','price'
    ];


    public function freight(){
    	return $this->belongsTo('App\Models\Frontend\Freights','freight_id','id');
    }

    public function freight_category(){
    	return $this->hasOne('App\Models\Frontend\FreightCat','id','freight_cat_id');
    }

    public function freight_status(){
        return $this->hasMany('App\Models\Frontend\FreightStatus','freight_details_id','id');
    }


}
