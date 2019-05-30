<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderDates extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'order_id', 'load_from','load_up','delivery_from','delivery_until','valid_until',
    ];
}
