<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class TourDays extends Model
{
    //
    public $timestamps = true;
    protected $fillable = ['day','min_hour','max_hour','price','additional_price'];
}
