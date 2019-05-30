<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'pay_load_max','palletspaces','length','width','height','img','is_active','discount','min_packets'
    ];
    public function vehicles()
    {
        return $this->hasMany('App\Models\Frontend\Vehicle', 'ship_id');
    }
    public function costs()
    {
        return $this->hasMany('\App\Models\Backend\ShippingCost', 'type_id');
    }
    public function specs()
    {
        return  $this->hasOne('\App\Models\Backend\ShippingSpec', 'ship_id')
        ->withDefault(function ($spec) {
            $spec->min_load_time= 5;
            $spec->max_load_time= 10;
            $spec->cost_per_unit= .1;
            $spec->min_person= 1;
            $spec->max_person= 3;
            $spec->cost_per_person= 0.17;
        });
    }
    public function delete()
    {
        $this->vehicles()->delete();
        return parent::delete();
    }


    public function tour_ship(){
        return $this->belongsTo('App\Models\Frontend\Tour','id','ship_id');
    }
}
