<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;


class ShippingSpec extends Model
{
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'min_load_time', 'max_load_time','cost_per_unit','min_person', 'max_person','cost_per_person','ship_id','is_active',
    ];
}
