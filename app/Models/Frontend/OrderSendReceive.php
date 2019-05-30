<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderSendReceive extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'order_id', 'sender_id','receiver_id','other_billing_id',
    ];
}
