<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public $timestamps = true;
    protected $fillable = ['title','route','layout'];


}
