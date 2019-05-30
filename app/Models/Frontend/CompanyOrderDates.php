<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class CompanyOrderDates extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'order_id','user_id','start','end','load_up',
    ];
}
