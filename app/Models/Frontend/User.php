<?php

namespace App\Models\Frontend;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use ResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function drivers()
    {
        return $this
        ->hasManyThrough('App\Models\Frontend\User', 'App\Models\Frontend\Driver', 'company_id', 'id', 'id', 'user_id');
    }
    public function taxes()
    {
        return $this->hasMany('App\Models\Frontend\taxes', 'user_id', 'id');
    }
    public function informationAsDriver()
    {
        return $this->hasMany('\App\Models\Frontend\Driver', 'user_id');
    }
    public function profile()
    {
        return $this->hasOne('App\Models\Frontend\Profile')->withDefault([
            'first_name'=>' ',
        ]);
    }
    public function banks()
    {
        return $this->hasOne('App\Models\Frontend\Userbanks', 'user_id', 'id');
    }
    public function links()
    {
        return $this->hasOne('App\Models\Frontend\Userlinks', 'user_id', 'id');
    }
    public function roles()
    {
        return $this->hasMany('App\Models\Frontend\Userroles', 'user_id', 'id');
    }
    public function faqs()
    {
        return $this->hasMany('App\Models\Frontend\Faq', 'user_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Frontend\Offer', 'user_id', 'id');
    }
    public function scopeFilters($query, $type)
    {
        return $data = User::orderBy('id', 'DESC')->whereHas('profile', function ($q) use ($type) {
            return $q->where('status', $type);
        })->get();
    }
    // public function orders()
    // {
    //     return $this->offers()->with('order');
    // }
    public function order()
    {
        return $this->belongsToMany('\App\Models\Frontend\Order', 'offers', 'user_id', 'order_id');
    }
    public function vehicle()
    {
        return $this->belongsToMany('\App\Models\Frontend\Vehicle', 'drivers', 'user_id', 'vehichle_id');
    }
    public function companyVehicle()
    {
        return $this
        ->hasMany('\App\Models\Frontend\Vehicle', 'user_id');
    }
    public function scopeAsDriver($driver)
    {
        return $driver->with(['vehicle'=>function ($q) {
            return $q->select('number');
        },'profile'=>function ($q) {
            return $q->select('image', 'id', 'user_id');
        }]);
    }
    public function scopeOrders($user, $users)
    {
        $myusers = [];
        foreach ($users as $orders=>$usere) {
            $orders =array_map('intval', explode(',', $orders));
            
            $usere['orders'] = \App\Models\Frontend\Order::getOrders($orders, $usere['id']);
            array_push($myusers, $usere);
        }
        return $myusers;
    }
    
    public function createFromOutSide()
    {
    }
    public function scopeOrdersOfUsers()
    {
        $email = $this->email;
        return \App\Models\Frontend\Order::whereHas('sender', function ($q) use ($email) {
            return $q->where('email', $email);
        });
    }
    public function delete()
    {
        if ($this->profile&& $this->profile->status =='Company') {
            $this->drivers()->delete();
            $this->companyVehicle()->delete();
            $this->offers()->delete();
        }
        if ($this->profile&& $this->profile->status == 'User') {
            // $this->order()->delete();
            $this->ordersOfUsers()->delete();
            $this->offers()->delete();
        }
        
        $this->profile()->delete();
        $this->banks()->delete();
        $this->roles()->delete();
        $this->banks()->delete();
        $this->links()->delete();

        $this->faqs()->delete();
        // return 1;
        //to be done
        //make an anymous user for deleted user faqs;
        return parent::delete();
    }

    /*public function address() {
        return $this->hasMany('App\Models\UserAddress');
    }

    public function bankAccounts() {
        return $this->hasMany('App\Models\UserBankAccount');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function payments() {
        return $this->hasMany('App\Models\Payment');
    }*/

    public function bank_account()
    {
        return $this->hasMany('App\Models\Frontend\BankAccount', 'bank_id', 'id');
    }
}
