<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'description','img','user_id','type'
    ];
    protected $appends = ['name'];
    public function getNameAttribute(){
        return $this->docType->name;
    }
    public function docType(){
        return $this->belongsTo('App\Models\Frontend\DocumentsTypes','type','id')->withDefault(function($type){
            $type->name = 'other';
        });
    }
}
