<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $timestamps = true;//make created_at and update_at
    // the fillable data
    protected $fillable = [
        'weight', 'items','source_location','destination_location','length','width','height','description','distance','duration','source','destination','cost','paid','min','ship_id','bill_to','person','time','is_active','payment_type','delievered','confirmed','code','test',
    ];
    
    //don't change status function before going to neworder.vue
    // dynamic props
    protected $appends = ['status','last_edit'];
    protected $states = [
        'newOrder',
        'watingOrder',
        'expiredOrder',
        'acceptedOrder',
        'decidingOrder',
        'cancelledOrder',
        'cancelledWithoutOffers',
        'paidOrder',
        'completedOrder',
        'reklamationOrder',
        //to do deliverd order (finished).
    ];
    public function senderReceiver()
    {
        return $this->hasOne('\App\Models\Frontend\OrderSendReceive', 'order_id');
    }
    public function ship()
    {
        return $this->belongsTo('\App\Models\Backend\Shipping', 'ship_id');
    }
    public function OrderHistory()
    {
        return $this->hasMany('\App\Models\Backend\OrderHistory', 'order_id', 'id');
    }
    public function getLastEditAttribute()
    {
        return $this->OrderHistory()->orderBy('id', 'DESC')->first();
    }
    public function getStatusAttribute()
    {
        foreach ($this->states as $state) {
            $query = Order::where('id', $this->id);
            $callbackFunction = 'FilterFunction'.$state;
            if (call_user_func([$this,$callbackFunction], $query)->count()==1) {
                return $state;
            }
        }
        return 'NotCompleted';
        // $query = Order::where('id', $this->id);
        // // return  $this->FilterFunctionexpired($query)->count()==1;
        // if ($this->FilterFunctionactive($query)->count()==1) {
        //     return 'activeOrder';
        // }
        // $query = Order::where('id', $this->id);
        // if ($this->FilterFunctionexpired($query)->count()==1) {
        //     return 'expiredOrder';
        // }
        // $query = Order::where('id', $this->id);
        // if ($this->FilterFunctionaccepted($query)->count()==1) {
        //     return 'acceptedOrder';
        // }
        // $query = Order::where('id', $this->id);
        // if ($this->FilterFunctioncanceled($query)->count()==1) {
        //     return 'canceledOrder';
        // }
        // return 'NotCompleted';
    }
    public function scopeSelectAdvirtised()
    {
        return $this->where('delievered', true)
        ->with(['ship'=>function ($q) {
            return $q->select('id', 'title', 'img');
        }])
        ->select('destination as to', 'ship_id', 'distance', 'source as from', 'paid as price')->take(10)->get();
    }
    public function dating()
    {
        return $this->hasOne('App\Models\Frontend\OrderDates', 'order_id', 'id');
    }
    public function sender()
    {
        return $this->hasOne('App\Models\Frontend\Senders', 'order_id', 'id');
    }
    public function receiver()
    {
        return $this->hasOne('App\Models\Frontend\Receivers', 'order_id', 'id');
    }
    public function otherBilling()
    {
        return $this->hasOne('App\Models\Frontend\OrderOtherBilling', 'order_id', 'id');
    }
    public function offers()
    {
        return $this->hasMany('App\Models\Frontend\Offer', 'order_id', 'id');
    }
    
    public function acceptedOffer()
    {
        return $this->hasOne('App\Models\Frontend\Offer', 'order_id', 'id')
        ->where('is_accepted', 1)->withDefault(function ($offer) {
            $offer->user = [
                'name'=>'No Company',
                'email'=>'No Company'
            ];
        });
    }
    public function delete($force=false)
    {
        if ($force==true) {
            $this->offers()->delete();
            $this->sender()->delete();
            $this->receiver()->delete();
            $this->senderReceiver()->delete();
            $this->otherBilling()->delete();

            return parent::delete();
        }
        if ($this->status=='acceptedOrder') {
            return 0;
        }
        $this->offers()->delete();
        $this->sender()->delete();
        $this->receiver()->delete();
        $this->senderReceiver()->delete();
        $this->otherBilling()->delete();
        return parent::delete();
    }
    
    public function scopeFindByCompany($query, $company)
    {
        return $query->whereHas('offers', function ($q) use ($company) {
            return $q->where('user_id', $company);
        });
    }
    public function scopeFindByCompanyActive($query, $company)
    {
        return $query
                ->where('delievered', 0)
                ->where('is_active', 1)
                
                ->whereHas('offers', function ($q) use ($company) {
                    return $q->where('user_id', $company)->where('is_accepted', 1);
                });
    }
    public function scopeFindByCompanyCompleted($query, $company)
    {
        return $query->where('is_active', 1)
                ->where('delievered', 1)
                ->whereHas('offers', function ($q) use ($company) {
                    return $q->where('user_id', $company)->where('is_accepted', 1);
                });
    }
    public function scopeGetDataForChart($query)
    {
        $chartData = [];
        // foreach ($this->states as $state) {
        //     $chartData[trans('backend/orders.'.$state)] = 0;
        // }
        // foreach ($query->get() as $key) {
        //     $chartData[trans('backend/orders.'.$key->status)] =  $chartData[trans('backend/orders.'.$key->status)]+1;
        // }
        return $chartData;
    }
    public function scopeGetInfo($query)
    {
        return $query->with([
            'sender'=>function ($q) {
                return $q->select('order_id', 'id', 'email', 'postal_code', 'first_name', 'nick_name', 'town', 'country');
            },
            'receiver'=>function ($q) {
                return $q->select('order_id', 'id', 'email', 'postal_code', 'first_name', 'nick_name', 'town', 'country');
            },
            'acceptedOffer.user'
            
        ]);
    }
    public function scopeSearch($query, $queryText)
    {
        $field = explode('-', $queryText, 2)[0];
        $q = explode('-', $queryText, 2)[1];
        if (!$field||!$q) {
            return $query;
        }
        if ($field=='sender') {
            return $query->whereHas('sender', function ($qe) use ($q) {
                return $qe->where('first_name', 'like', '%'.$q.'%')
                        ->orWhere('nick_name', 'like', '%'.$q.'%')
                        ->orWhere('email', 'like', '%'.$q.'%');
            });
        }
        if ($field=='receiver') {
            return $query->whereHas('receiver', function ($qe) use ($q) {
                return $qe->where('first_name', 'like', '%'.$q.'%')
                        ->orWhere('nick_name', 'like', '%'.$q.'%')
                        ->orWhere('email', 'like', '%'.$q.'%');
            });
        }
        if ($field=='Company') {
            return $query->whereHas('acceptedOffer.user', function ($qe) use ($q) {
                return $qe->where('name', 'like', '%'.$q.'%')
                    ->orWhere('email', 'like', '%'.$q.'%');
            });
        }
        if ($field=='from') {
            return $query->WhereHas('sender', function ($my) use ($q) {
                return $my->where('country', 'like', '%'.$q.'%')
                                ->orWhere('town', 'like', '%'.$q.'%')
                                ->orWhere('postal_code', 'like', '%'.$q.'%');
            });
        }
        if ($field=='to') {
            return $query->WhereHas('receiver', function ($my) use ($q) {
                return $my->where('country', 'like', '%'.$q.'%')
                                ->orWhere('town', 'like', '%'.$q.'%')
                                ->orWhere('postal_code', 'like', '%'.$q.'%');
            });
        }
        if ($field=='number') {
            return $query->where('id', 'like', '%'.$q.'%');
        }
    }
    public function scopeStatus($query, $callbackFunction)
    {
        return call_user_func([$this,$callbackFunction], $query);
    }
    public function FilterFunctionall($query)
    {
        return $query;
    }
    public function FilterFunctionnewOrder($query)
    {
        return $query->whereDoesntHave('dating');
    }
    public function FilterFunctionwatingOrder($query)
    {
        //orders that's completed and active
        // the user is currently receiving offers and hasn't accepted any one yet
        return $query->whereHas('dating', function ($q) {
            return $q->where('valid_until', '>', date('Y-m-d H:i:s'));
        })->whereDoesntHave('offers', function ($q) {
            return $q;
        });
    }
    public function FilterFunctionreklamationOrder($query)
    {
        //orders that's completed and active
        // the user is currently receiving offers and hasn't accepted any one yet
        return $query->where('id', -1);
    }
    public function FilterFunctiondecidingOrder($query)
    {
        //orders that's completed and active
        // the user is currently receiving offers and hasn't accepted any one yet
        return $query->whereHas('dating', function ($q) {
            return $q->where('valid_until', '>', date('Y-m-d H:i:s'));
        })
        ->whereHas('offers')
        ->whereDoesntHave('offers', function ($q) {
            return $q->where('is_accepted', 1);
        });
    }
    public function FilterFunctionacceptedOrder($query)
    {
        /*the order was completed and has offers.
          the user accepted the offers.
          but the user not paid it yet. */
        return $query
        ->where('is_active', 0)
        ->whereHas('offers', function ($q) {
            return $q->where('is_accepted', 1);
        })->whereHas('dating', function ($q) {
            return $q->where('valid_until', '>', date('Y-m-d H:i:s'));
        });
    }
    public function FilterFunctionpaidOrder($query)
    {
        return $query->where('is_active', 1)
                ->where('delievered', 0)
                ->whereHas('offers', function ($q) {
                    return $q->where('is_accepted', 1);
                });
    }
    public function FilterFunctioncompletedOrder($query)
    {
        return $query->where('is_active', 1)
                ->where('delievered', 1)
                ->whereHas('offers', function ($q) {
                    return $q->where('is_accepted', 1);
                });
    }
    // public function FilterFunctionactive($query)
    // {
    //     return $query->where('is_active', 0)
    //                     ->whereDoesntHave('offers', function ($q) {
    //                         return $q->where('is_accepted', 1);
    //                     })->whereHas('dating', function ($q) {
    //                         return $q->where('valid_until', '>', date('Y-m-d H:i:s'));
    //                     });
    // }
    public function FilterFunctionexpiredOrder($query)
    {
        return $query->has('offers', '=', 0)
                        ->whereHas('dating', function ($query) {
                            return $query->where('valid_until', '<', date('Y-m-d H:i:s'));
                        });
    }
    
    
    public function FilterFunctionaccepted($query)
    {
        return $query->whereHas('offers', function ($q) {
            return $q->where('is_accepted', 1);
        })->where('is_active', 1);
    }
    public function FilterFunctioncancelledOrder($query)
    {
        return $query
        ->where('is_active', 0)
        ->has('offers', '!=', 0)
        ->has('acceptedOffer')
        ->whereHas('dating', function ($q) {
            return $q->where('valid_until', '<', date('Y-m-d H:i:s'));
        });
    }
    public function FilterFunctioncancelledWithoutOffers($query)
    {
        return $query
        ->where('is_active', 0)
        ->has('offers', '!=', 0)
        ->whereDoesntHave('acceptedOffer')
        ->whereHas('dating', function ($q) {
            return $q->where('valid_until', '<', date('Y-m-d H:i:s'));
        });
    }


    //
    public function scopeGetOrders($query, $array, $userId)
    {
        return $query->whereIn('id', $array)
        ->orderBy('id', 'DESC')->with(['offers'=>function ($q) use ($userId) {
            return $q->where('user_id', $userId);
        }])->get();
    }
}
