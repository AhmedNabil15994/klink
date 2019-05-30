<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded = [];
    public function profile()
    {
        return $this->hasOne('App\Models\Frontend\Profile', 'id', 'profile_id');
    }
    public function company(){
        return $this->belongsTo('App\Models\Frontend\User','company_id','id');
    }
    // public function delete($force=false){
        
    //     if($this->profile->user_id == $this->company_id){
    //         $others = App\Models\Frontend\Driver::where('profile_id',$this->profile_id)->count();
    //         if($others<2){
    //             $this->update([
    //                 'vehichle_id'=>null
    //             ]);
    //             return 1;
    //         }
    //     }
    //     if($force==true){

    //         return parent::delete();
    //     }else{
    //         return 'ahmed';
    //     }
    // }
}
