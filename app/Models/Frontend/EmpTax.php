<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class EmpTax extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'id_number','office_no','bracket_factor', 'child_allow','denomination','pensions_no',
    ];
}
