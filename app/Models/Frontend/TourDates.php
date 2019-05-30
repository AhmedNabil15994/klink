<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class TourDates extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'tour_id','tour_start_date','tour_finish_date','tour_start_time','tour_finish_time','account_speak_day','cancellation_speak_day','payment_speak_day','test_speak_day','days'
    ];

    public function tour()
    {
        return $this->belongsTo('App\Models\Frontend\Tour', 'tour_id', 'id');
    }

    public function tour_free_day()
    {
        return $this->hasMany('App\Models\Frontend\FreeDays', 'tour_dates_id', 'id');
    }

    public static function compareByTimeStamp($time1, $time2)
    {
        if (strtotime($time1) > strtotime($time2)) {
            return 1;
        } elseif (strtotime($time1) < strtotime($time2)) {
            return -1;
        } else {
            return 0;
        }
    }

    // Get Holidays
    public static function removeDates($data, $limit)
    {
        $holidays = [];
        $x = 0;
        for ($i=0; $i < count($data) ; $i++) {
            if (strtotime($limit) >= strtotime($data[$i])) {
                $holidays[$x] = $data[$i];
                $x++;
            }
        }
        return $holidays;
    }

    public static function generateDateRange($start_date, $end_date)
    {
        $dates = [];
        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    public static function indexArray($data)
    {
        $result = [];
        foreach ($data as $one => $value) {
            $result [] = $value;
        }
        return $result;
    }

    public static function getWorkDays($period, $days)
    {
        $actual_days = [];
        $eng_days = ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
        $tour_work_days = [];

        for ($i=0; $i < count($days) ; $i++) {
            if ($days[$i] == 'Sa') {
                $actual_days[] = 'Saturday';
            } elseif ($days[$i] == 'So') {
                $actual_days[] = 'Sunday';
            } elseif ($days[$i] == 'Mo') {
                $actual_days[] = 'Monday';
            } elseif ($days[$i] == 'Di') {
                $actual_days[] = 'Tuesday';
            } elseif ($days[$i] == 'Mi') {
                $actual_days[] = 'Wednesday';
            } elseif ($days[$i] == 'Do') {
                $actual_days[] = 'Thursday';
            } elseif ($days[$i] == 'Fr') {
                $actual_days[] = 'Friday';
            }
        }

        $period = TourDates::indexArray($period);

        for ($i=0; $i < count($period) ; $i++) {
            $date = Carbon::parse($period[$i])->format('l');
            for ($x=0; $x < count($actual_days) ; $x++) {
                if ($date === $actual_days[$x]) {
                    $tour_work_days[] = [$period[$i],$date];
                    break;
                }
            }
        }

        return $tour_work_days;
    }


    public static function getSpeakDay($start,array $data){


        $every = $data[0];
        $myTime = $data[1];
        $period = $data[2];

        
        $days = Carbon::parse($start)->daysInMonth;
        $time = [1,7,$days];
        $total_time = $every * $time[$myTime];
        $total_time = $total_time ? $total_time : 1;
        $final_date = '';

        // Same Day
        if($period == 0){

            $final_date = Carbon::parse($start)->addDays($total_time)->format('Y-m-d');
        
        // Start Of Week
        }elseif($period == 1){

            $final_date = Carbon::parse($start)->addDays($total_time)->startOfWeek()->addWeek()->format('Y-m-d');
        
        // end of Week
        }elseif ($period == 2) {
         
            $final_date = Carbon::parse($start)->addDays($total_time)->endOfWeek()->format('Y-m-d');
        
        // Start Of Month
        }elseif ($period == 3) {
         
            $final_date = Carbon::parse($start)->addDays($total_time)->startOfMonth()->addMonth()->format('Y-m-d');
        
        // End Of Month
        }elseif ($period == 4){
           
            $final_date = Carbon::parse($start)->addDays($total_time)->endOfMonth()->format('Y-m-d');
        
        // Till Day 15 Or End Of Month
        }elseif ($period == 5) {
         
            $final_date = Carbon::parse($start)->addDays($total_time)->format('Y-m-d');
            $years = Carbon::parse($final_date)->format('Y');
            $months = Carbon::parse($final_date)->format('m');
            $days = Carbon::parse($final_date)->format('d');
            
            if($days > 15){
                $final_date = Carbon::parse($years.'-'.$months.'-'.$days)->endOfMonth()->format('Y-m-d');
            }else{
                $final_date = Carbon::parse($years.'-'.$months.'-'.'15')->format('Y-m-d');
            }
        
        // End Of Quarter
        }elseif ($period == 6){
            
            $final_date = Carbon::parse($start)->addDays($total_time)->lastOfQuarter()->format('Y-m-d');
        
        // Half Year
        }elseif ($period == 7){

            $final_date = Carbon::parse($start)->addDays($total_time)->format('Y-m-d');
            $years = Carbon::parse($final_date)->format('Y');
            $months = Carbon::parse($final_date)->format('m');
            
            if($months <= 6){
                $final_date = Carbon::parse($years.'-06-30')->format('Y-m-d');
            }else{
                $final_date = Carbon::parse($years.'-12-31')->format('Y-m-d');
            }            

        // End Of Year
        }elseif ($period == 8){
         
            $final_date = Carbon::parse($start)->addDays($total_time)->endOfYear()->format('Y-m-d');
       
        }



        return $final_date;
    }


}
