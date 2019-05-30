<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
    protected $fillable = ['details'];
    public function payment()
    {
        return $this->belongsTo(TourPayments::class, 'payment_id', 'id');
    }
}
