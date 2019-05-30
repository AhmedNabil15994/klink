<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreightCat extends Model
{
    public $timestamps = true;
    protected $fillable = ['category','cat_price','weight','width','height','length'];


    public function freight_details(){
    	return $this->belongsTo('App\Models\Frontend\FreightDetails','id','freight_cat_id');
    }

}
