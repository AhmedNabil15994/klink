<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class AllTax extends Model
{
	protected $table = 'all_taxes';
    public $timestamps = true;
    protected $fillable = ['tax_id','tax_ministry','tax_number','tax_class','ust_id','profile_id'];


    public function profile_taxes(){
        return $this->belongsTo('App\Models\Frontend\Profile','id','profile_id');
    }

}
