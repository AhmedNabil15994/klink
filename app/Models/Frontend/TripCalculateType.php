<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TripCalculateType extends Model
{
	protected $table = 'trip_calculate_types';
    public $timestamps = true;
    protected $fillable = ['min_hour','max_hour','additional_price','trip_id'];

    public function trip(){
    	return $this->belongsTo('App\Models\Frontend\Trip','trip_id','id');
    }
}
