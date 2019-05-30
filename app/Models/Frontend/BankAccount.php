<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
	protected $table = 'bank_accounts';
    public $timestamps = true;
    protected $fillable = ['bank_id','user_id'];


    public function bank(){
    	return $this->belongsTo('App\Models\Frontend\Bank','id','bank_id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\Frontend\User','id','user_id');
    }

}
