<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id','printed','accepted','started'
    ];
}
