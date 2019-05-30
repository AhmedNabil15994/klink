<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;
    protected $fillable = ['question','answers','is_main','relatives','document_id','notes'];

    public function Document(){
        return $this->hasOne('App\Models\Frontend\NewDocument','id','document_id');
    }

    static function getAll(){
        $source = self::get();
        return self::getData($source);
    }

    static function getAllLast(){
        $source = self::where('is_main',0)->where('relatives',null)->get();
        return self::getData($source);
    }

    static function getData($source){
        $list = [];
        foreach ($source as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::generateQuestion($value);
        }
        return $list;
    }

    static function getOne($id,$answer_id){
        $source = self::find($id);
        return self::generateQuestionWithAnswer($source,$answer_id);
    }

    static function generateQuestionWithAnswer($source,$answer_id){
        $answers = json_decode($source->answers);
        $selected_answer = '';

        if($answer_id != 0){
            foreach ($answers as $key => $value) {
                if($answers[$key]->id == $answer_id){
                    $selected_answer = $value;
                }
            }    
        }

        $questionObj = new \stdClass();
        $questionObj->id = $source->id;
        $questionObj->question = $source->question;
        $questionObj->answers = $answers;
        $questionObj->selected_answer = $selected_answer;

        return $questionObj;

    }

    static function generateQuestion($source){
        $answers = json_decode($source->answers);
    	$relatives = json_decode($source->relatives);
    	$relative = [];
    	if(! empty($relatives)){
	    	foreach ($relatives as $key => $one) {
	    		$relative[$key] = [
	    			'answer'=> $answers[$one->answer_id - 1],
	    			'related_question' => self::find($one->questions->question_id),
	    		];
	    	}
    	}
	
    	$questionObj = new \stdClass();
    	$questionObj->id = $source->id;
    	$questionObj->question = $source->question;
    	$questionObj->answers = $answers;
        $questionObj->last = !empty($relative) ? 0 : 1;
    	$questionObj->is_main = $source->is_main == 1 ? 'Yes':'No';
    	$questionObj->document = $source->Document ;
    	$questionObj->relatives = $relative;
    	$questionObj->notes = $source->notes;
    	
    	return $questionObj;
    }

    static function getMainRandom(){
        $question = self::where('is_main',1)->where('relatives','!=',null)->inRandomOrder()->take(1)->first();
        if($question){
            return self::generateQuestion($question);
        }
    }

    static function getMainRandomByPages($page_ids){
        $question = self::where('is_main',1)->whereIn('document_id',$page_ids)->where('relatives','!=',null)->inRandomOrder()->take(1)->first();
        if($question){
            return self::generateQuestion($question);
        }
    }

    static function getNewQuestion($main_id,$answer_id){
        $mainQuestion = self::find($main_id);
        $relatives = json_decode($mainQuestion->relatives);
        $question = '';
        if(!empty($relatives)){
            $related = [];
            foreach ($relatives as $key => $value) {
                if($value->answer_id == $answer_id){
                    $related[] = $value->questions->question_id; 
                }
            }

            $question = self::whereIn('id',$related)->inRandomOrder()->take(1)->first();

        }
        if($question){
            return self::generateQuestion($question);
        }
    }

}
