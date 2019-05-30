<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $timestamps = true;
    protected $fillable = ['account_owner','iban','bank_name'];

    public function bank_account(){
    	return $this->hasOne('App\Models\Frontend\BankAccount','user_id','id');
    }


}
