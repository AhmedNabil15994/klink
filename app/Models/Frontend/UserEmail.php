<?php

namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    //
    public $timestamps = true;

    protected $fillable = ['user_id','email'];
}
