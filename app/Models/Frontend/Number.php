<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    public $timestamps = true;
    protected $fillable = ['mobile_number','mobile_number2','home_number'];


    public function order_person(){
    	return $this->belongsTo('App\Models\Frontend\OrderPerson','id','number_id');
    }

    public function admin(){
    	return $this->belongsTo('App\Models\Backend\AdminProfile','id','number_id');
    }

    public function stop(){
    	return $this->belongsTo('App\Models\Frontend\Stop','id','number_id');
    }

    

}
