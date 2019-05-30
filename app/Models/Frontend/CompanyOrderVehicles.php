<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class CompanyOrderVehicles extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'order_id','user_id','vehicle_id','take_money','pick_up','pick_up_done','to_destination',
    ];
}
