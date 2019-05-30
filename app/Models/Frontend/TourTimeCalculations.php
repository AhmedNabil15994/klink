<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TourTimeCalculations extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'tour_id','every','time','period','type'
    ];


    public function tour(){
        return $this->belongsTo('App\Models\Frontend\Tour','id','tour_id');
    }

    public function determineTime(){
    	$time = $this->time;
    	$result = '';

    	if($time == 0){
    		$result = 'Days';
    	}elseif ($time == 1) {
    		$result = 'Weeks';
    	}elseif ($time == 2) {
    		$result = 'Months';
    	}

    	return $this->every.' '.$result;
    }

    public function determinePeriod(){
    	$time = $this->period;
    	$result = '';

    	if($time == 0){
    		$result = 'Same Day';
    	}elseif ($time == 1) {
    		$result = 'Start Of Week';
    	}elseif ($time == 2) {
    		$result = 'End Of Week';
    	}elseif ($time == 3) {
    		$result = 'Start Of Month';
    	}elseif ($time == 4) {
    		$result = 'End Of Month';
    	}elseif ($time == 5) {
    		$result = 'To 15 Of Month,<br> Or End Of Month';
    	}elseif ($time == 6) {
    		$result = 'End Of Quarter';
    	}elseif ($time == 7) {
    		$result = 'Half Year';
    	}elseif ($time == 8) {
    		$result = 'End Of Year';
    	}

    	return $result;
    }

}
