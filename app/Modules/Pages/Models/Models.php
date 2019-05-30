<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','url','answers','is_default'];


    static function getAll(){
    	$source = self::get();
    	return self::generateObj($source);
    }

    static function generateObj($source){
    	$list = [];
    	foreach ($source as $key => $value) {
    		$list[$key] = new \stdClass();
    		$list[$key] = self::getData($value);
    	}
    	return $list;
    }

    static function getData($source){
    	$dataObj = new \stdClass();
    	$dataObj->id = $source->id;
    	$dataObj->title = $source->title;
    	$dataObj->url = $source->url;
    	$dataObj->answers = $source->answers != null ? self::getAnswers(unserialize($source->answers)) : '';
    	$dataObj->is_default = $source->is_default;
    	$dataObj->default = $source->is_default == 1 ? "Yes" : "No";

    	return $dataObj;
    }

    static function getAnswers($source){
    	$question = [];
    	foreach ($source as $key => $value) {
    		$question[$key] = Question::getOne($value['question_id'],$value['answer_id']);
    	}
    	return $question;
    }

}
