<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name', 'display_name','description',
    ];
}
