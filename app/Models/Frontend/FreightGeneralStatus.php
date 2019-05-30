<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class FreightGeneralStatus extends Model
{
    public $timestamps = true;
    protected $fillable = ['status','image'];


    public function freight_status_general(){
        return $this->hasOne('App\Models\Frontend\FreightStatus','general_status_id','id');
    }

}
