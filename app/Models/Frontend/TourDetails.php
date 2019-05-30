<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TourDetails extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'min_day_hour',
        'max_day_hour',
        'additional_days',
        'additional_price',
        'tour_id',
        'order_person_id',
        'tour_total_weight',
        'tour_total_distance',
        'tour_total_time',
        'tour_total_packets_number',
        'tour_average_stop_time',
        'number_of_stops',
        'terms_accepted'
    ];


    public function tour()
    {
        return $this->belongsTo('App\Models\Frontend\Tour', 'tour_id', 'id');
    }

    public function tour_person()
    {
        return $this->hasOne('App\Models\Frontend\OrderPerson', 'id', 'order_person_id');
    }
}
