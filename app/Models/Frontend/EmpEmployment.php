<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class EmpEmployment extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'emp_id', 'job_title','entry_date','first_entry_date', 'work_time','degree','vocational','start_training','end_training',
    ];
}
