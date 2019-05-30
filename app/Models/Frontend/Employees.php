<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'title',
        'birth_date',
        'nationality',
        'birth_place',
        'status',
        'email',
        'mobile_number',
        'card_number',
        'passport_number',
        'residency_no',
        'residency_date',
        'residency_type',
    ];
    protected $appends = ['nationality_name'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\Frontend\User', 'user_id', 'id');
    }
    public function nation()
    {
        return $this->belongsTo('App\Models\Frontend\countries', 'nationality', 'code');
    }

    public function emp_address()
    {
        return $this->hasOne('App\Models\Frontend\EmpAddress', 'emp_id', 'id');
    }

    public function emp_bank()
    {
        return $this->hasOne('App\Models\Frontend\EmpBank', 'emp_id', 'id');
    }

    public function emp_employment()
    {
        return $this->hasOne('App\Models\Frontend\EmpEmployment', 'emp_id', 'id');
    }

    public function emp_paper()
    {
        return $this->hasOne('App\Models\Frontend\EmpPaper', 'emp_id', 'id');
    }

    public function emp_social()
    {
        return $this->hasOne('App\Models\Frontend\EmpSocialInsurance', 'emp_id', 'id');
    }

    public function emp_tax()
    {
        return $this->hasOne('App\Models\Frontend\EmpTax', 'emp_id', 'id');
    }

    public function emp_contract()
    {
        return $this->hasOne('App\Models\Frontend\Contract', 'emp_id', 'id');
    }

}
