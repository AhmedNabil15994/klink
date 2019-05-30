<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Userlinks extends Model
{
    public $timestamps = true;
    protected $table = 'user_links';

    protected $fillable = ['facebook','twitter','linkedin','website','user_id']; 


    public function user(){
    	return $this->belongsTo('App\Models\Frontend\User','user_id','id');
    }

}
