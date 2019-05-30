<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Userroles extends Model
{
    protected $table = 'user_roles';
    public $timestamps = true;
    protected $fillable = [
        'user_id', 'role_id',
    ];
}
