<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class offerDates extends Model
{
    protected $fillable = ['offer_id','load_from','delivery_at'];

    public function offer()
    {
        return $this->belongsTo('App\Models\Frontend\Offer', 'offer_id');
    }
}
