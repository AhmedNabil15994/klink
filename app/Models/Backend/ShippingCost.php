<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'shippings_cost';
    protected $fillable = [
        'type_id', 'distance_id','cost_per_kilo','min_cost','is_active',
    ];
    public function shippingDistance()
    {
        return $this->belongsTo('\App\Models\Backend\ShippingDistance', 'distance_id');
    }
}
