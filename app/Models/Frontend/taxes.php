<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class taxes extends Model
{
    protected $fillable = ['tax_id','tax_number','ministry'];
}
