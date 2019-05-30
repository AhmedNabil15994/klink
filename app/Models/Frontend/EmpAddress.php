<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class EmpAddress extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'address','home','city', 'postal_code','country',
    ];
}
