<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class TourDates extends Model
{
    //
    public $timestamps = true;
    protected $fillable = ['tour_number','created','finished','printed','updated'];
}
