<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $timestamps = true;

    protected $fillable = ['question','reply','user_id','is_seen','replied_at','is_read','name','email'];
}
