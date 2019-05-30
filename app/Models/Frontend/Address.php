<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = true;
    protected $fillable = ['street','city','home','postal_code','additional','region','country_id','lat_lng'];

    protected $appends = ['country_name'];

    public function stop_address()
    {
        return $this->belongsTo('App\Models\Frontend\Stops', 'id', 'address_id');
    }

    public function lager_address()
    {
        return $this->belongsTo('App\Models\Frontend\Lager', 'id', 'lager_location_id');
    }

    public function order_person()
    {
        return $this->belongsTo('App\Models\Frontend\OrderPerson', 'id', 'address_id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Backend\AdminProfile', 'id', 'address_id');
    }

    public function country()
    {
        return $this->hasOne('App\Models\Frontend\Country', 'country_id', 'country_id');
    }

    public function addressForm()
    {
        $country = $this->country->name;
        $address = $this->street.' '.$this->home.'<br>'.$this->postal_code.' '.$this->city.'<br>'.$country;
        return $address ? $address : '';
    }
    public function getCountryNameAttribute()
    {
        return $this->country->name;
    }

    public function fullAddress()
    {
        $country = $this->country->name;
        $address = $this->street.' '.$this->home.' '.$this->postal_code.' '.$this->city.' '.$country;
        return $address ? $address : '';
    }

}
