<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreeDays extends Model
{
	protected $table = 'free_days';
    public $timestamps = true;
    protected $fillable = ['tour_dates_id','details','date'];

    public function tour_dates(){
    	return $this->belongsTo('App\Models\Frontend\TourDates','tour_dates_id','id');
    }

}
