<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $table = 'admin_profiles';
    public $timestamps = true;
    protected $fillable = [
        'first_name','last_name','company','admin_id','address_id','email_id','number_id',
    ];


    public function admin()
    {
        return $this->belongsTo('App\Models\Backend\Admin','admin_id','id');
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
