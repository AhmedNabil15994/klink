<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    
	public $timestamps = true;
	protected $fillable = ['tour_number','company','price_type','tour_type','distance','notes','tour_date_id'];


	public function tour_dates()
    {
        return $this->hasOne('App\Models\Frontend\TourDates', 'tour_id', 'id');
    }

   
}
