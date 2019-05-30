<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'order_id', 'comment','user_id',
    ];
}
