<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class IsDoneDates extends Model
{
	protected $table = 'is_done_days';
    public $timestamps = true;
    protected $fillable = ['day','price','trip_id'];


    public function trip(){
        return $this->belongsTo('App\Models\Frontend\Trip','trip_id','id');
    }

    public function time_tracking(){
        return $this->hasMany('App\Models\Frontend\TimeTracking','is_done_day_id','id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($is_done_date) { 
            foreach($is_done_date->time_tracking as $one){
              $one->delete();
            }
        });
    }
}
