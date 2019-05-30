<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreightStatus extends Model
{
    public $timestamps = true;
    protected $fillable = [
    	'incase_of_non_status','general_status_id','freight_details_id',
    ];


    public function freight_details(){
        return $this->belongsTo('App\Models\Frontend\FreightDetails','id','freight_details_id');
    }

    public function freight_status_general(){
        return $this->hasOne('App\Models\Frontend\FreightGeneralStatus','general_status_id','id');
    }


}
