<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TimeTracking extends Model
{
    public $timestamps = true;
    protected $fillable = ['is_done_day_id','type'];


    public function is_done_dates(){
        return $this->belongsTo('App\Models\Frontend\IsDoneDates','is_done_day_id','id');
    }

}
