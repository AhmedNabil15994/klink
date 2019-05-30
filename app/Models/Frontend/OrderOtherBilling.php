<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderOtherBilling extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'country', 'postal_code','town','street','home','gender','nick_name','first_name','company','phone','email','order_id',];
}
