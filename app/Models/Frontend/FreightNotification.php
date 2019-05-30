<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreightNotification extends Model
{
    public $timestamps = true;
    protected $fillable = ['freight_id','notification_name','notification_shortcut','notification_description'];


    public function freight(){
    	return $this->belongsTo('App\Models\Frontend\Freights','id','freight_id');
    }
    
}
