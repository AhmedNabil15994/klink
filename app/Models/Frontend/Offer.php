<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $timestamps = true;

    protected $fillable = ['order_id','user_id','total','is_accepted'];
    public function edits()
    {
        return $this->hasOne('App\Models\Frontend\offerDates', 'offer_id');
    }
    public function scopeVehicle($q, $offer)
    {
        return CompanyOrderVehicles::where('order_id', $offer->order_id)
                                        ->where('user_id', $offer->user_id);
    }
    public function scopeUsers()
    {
        $users = $this->select('offers.*', \DB::raw('group_concat(DISTINCT order_id) as orders'))
        ->groupBy('user_id')->paginate(10);
        return [$users->pluck('user', 'orders')->toArray(),$users->lastPage()];
    }
    public function user()
    {
        return $this->hasOne('\App\Models\Frontend\User', 'id', 'user_id')->withDefault();
    }
    public function order()
    {
        return $this->belongsTo('\App\Models\Frontend\Order', 'order_id', 'id');
    }
    public function delete()
    {
        if ($this->is_accepted) {
            return 0;
        }
        return parent::delete();
    }
}
