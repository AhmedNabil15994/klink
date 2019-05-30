<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ShippingDistance extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'shippings_distance';
    protected $fillable = [
        'min', 'max','is_active',
    ];

   
     
}
