<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class TourPayments extends Model
{
    protected $guarded = [];
    public function tour()
    {
        return $this->belongsTo('App\Models\Frontend\Tour', 'tour_id', 'id');
    }
    public function paymentDetails()
    {
        return $this->hasOne(PaymentDetails::class, 'id', 'details_id');
    }
}
