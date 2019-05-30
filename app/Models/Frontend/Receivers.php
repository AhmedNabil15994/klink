<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Receivers extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'country', 'postal_code','town','street','home','gender','nick_name','first_name','company','phone','email','order_id',
    ];
    public function scopeGetReceiverAddress($q){
        $sender = $q->first();
        // return $sender->street;
        return $sender->street.' '.
                $sender->home.' '.
                $sender->postal_code.' '.
                $sender->town.' '.
                $sender->country;
    }
}
