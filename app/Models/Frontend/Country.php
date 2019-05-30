<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = ['country_id','code','name','full_name','iso3','number','continent_code','display_order'];


    public function address()
    {
        return $this->belongsTo('App\Models\Frontend\Address', 'country_id', 'country_id');
    }
}
