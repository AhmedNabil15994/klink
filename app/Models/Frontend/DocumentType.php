<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public $timestamps = true;
    protected $fillable = ['name','description'];


    public function document(){
    	return $this->belongsTo('App\Models\Frontend\NewDocument','id','document_type_id');
    }

    

}
