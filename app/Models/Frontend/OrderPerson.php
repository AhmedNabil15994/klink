<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class OrderPerson extends Model
{   
    protected $table = 'order_persons';
    public $timestamps = true;
    protected $fillable = ['first_name','last_name','company','number_id','email_id','address_id'];


    public function tour_details_person(){
    	return $this->belongsTo('App\Models\Frontend\TourDetails','id','order_person_id');
    }

    public function stop_order_person(){
    	return $this->belongsTo('App\Models\Frontend\StopsFreights','id','order_person_id');
    }


    public function address(){
    	return $this->hasOne('App\Models\Frontend\Address','id','address_id');
    }

    public function number(){
    	return $this->hasOne('App\Models\Frontend\Number','id','number_id');
    }

    public function email(){
    	return $this->hasOne('App\Models\Frontend\Email','id','email_id');
    }

    public function name(){
        return $this->first_name.' '.$this->last_name;
    }

}
