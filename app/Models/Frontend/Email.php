<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{	
	protected $table = 'email_addresses';
    public $timestamps = true;
    protected $fillable = ['email'];

    public function order_person(){
    	return $this->belongsTo('App\Models\Frontend\OrderPerson','id','email_id');
    }

    public function admin(){
    	return $this->belongsTo('App\Models\Backend\AdminProfile','id','email_id');
    }

}
