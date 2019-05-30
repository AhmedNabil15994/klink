<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class EmpBank extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'bank_name','account_owner','iban', 
    ];
}
