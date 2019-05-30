<?php

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class EmpSocialInsurance extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'social_law','parenthood','kv', 'rv','av','pv','uv','health_insurance_company','kv2'
    ];
}
