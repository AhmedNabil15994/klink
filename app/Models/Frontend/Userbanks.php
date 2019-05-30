<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Userbanks extends Model
{
    public $timestamps = true;
    use \App\Traits\Encryptable;
    protected $encryptable = [
        'owner','iban'
    ];
    protected $table = 'user_banks';

    protected $fillable = ['user_id','owner','iban'];
}
