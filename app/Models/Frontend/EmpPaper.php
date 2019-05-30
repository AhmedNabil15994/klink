<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class EmpPaper extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'emp_contact','tax_deduction','sv_id', 'insurance_company','private_insurance','proof_parent','pensions','painter',
    ];
}
