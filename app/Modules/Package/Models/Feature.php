<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';
    protected $primary_key = 'id';
    public $timestamps = false;

    static function generateFeature($source){
    	$featureObj = new \stdClass();
    	$featureObj->id = $source->id;
    	$featureObj->title = $source->title;
    	$featureObj->type = $source->type;
    	return $featureObj;
    }

}
