<?php

namespace App\Models\Frontend;

use App\Models\Frontend\User;
use App\Models\Frontend\Profile;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Shipping;

class Vehicle extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'ship_name','location', 'weight','first_reg','driver','phone','email','address','model','number','country','city','postal_code','status','ship_id','img','user_id',
    ];
    public function company()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function ship()
    {
        return $this->belongsTo(Shipping::class, 'ship_id', 'id')->withDefault(function ($ship) {
            $ship->image = 'default.svg';
        });
    }
    public function tour_offer()
    {
        return $this->belongsTo('App\Models\Frontend\TourOffers', 'id', 'vehicle_id');
    }
    public function drivere()
    {
        // return $this->belongsToMany('App\Role', 'role_user');
        
        return $this->belongsTo(User::class, 'driver', 'id')->withDefault(function ($user, $vehicle) {
            $driver = \App\Models\Frontend\Driver::where('vehichle_id', $vehicle->id)->first();
            if ($driver) {
                $profile =  \App\Models\Frontend\Profile::where('id', $driver->profile_id)->first();
                if ($profile) {
                    $user->name = $profile->first_name .' '.$profile->last_name;
                    $user->profile = $profile;
                } else {
                    $user->name = trans('frontend/makeoffer.noDriver');
                    $profile = new \App\Models\Frontend\Profile();
                    $profile->phone = trans('frontend/makeoffer.noPhone');
                
                    $user->profile = $profile;
                }
            } else {
                $user->name = trans('frontend/makeoffer.noDriver');
                $profile = new \App\Models\Frontend\Profile();
                
                $profile->phone = trans('frontend/makeoffer.noPhone');
                
                $user->profile = $profile;
            }
        });
    }
}
