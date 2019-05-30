<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models;
use App\Models\Question;

class ModelsController extends Controller
{

    public function index()
    {   
        $this->data['data'] = Models::getAll();
        $this->data['questions'] = Question::getAllLast(); 
        return view('Pages.Views.Backend.Model.index',$this->data);
    }

    public function storeModel(Request $request){
        $answer = [];
        
        if(!empty($request->answers[0])){
            foreach ($request->answers[0] as $key => $value) {
                $answer[$key] = [
                    'question_id' => $value,
                    'answer_id' => 0,
                ]; 
            }
        }

        $modelObj = new Models;
        $modelObj->title = $request->title; 
        $modelObj->url = $request->url; 
        $modelObj->is_default = $request->is_default; 
        $modelObj->answers = !empty($answer) ? serialize($answer) : null; 
        $modelObj->save();

        return 1;
    }

    public function editModel(Request $request){
        $type = $request->type;

        $modelObj = Models::find($request->id);
        $modelObj->$type = $request->value;
        $modelObj->save();

        return 1;
    }

    public function destroyModel(Request $request){
        Models::find($request->id)->delete();
        return 1;
    }

    public function updateAnswers(Request $request){
        $model = Models::find($request->id);
        $question_id = $request->question_id;
        $answer_id = $request->answer_id;
        $old_answer = unserialize($model->answers);

        foreach ($old_answer as $key => $value) {
            if($value['question_id'] == $question_id){
                $old_answer[$key]['answer_id'] = $answer_id;
            }
        }

        $model->answers = !empty($old_answer) ? serialize($old_answer) : null;
        $model->save();

        return 1;
    }

    public function updateQuestions(Request $request){
        $answer = [];
        if(!empty($request->answers[0])){
            foreach ($request->answers[0] as $key => $value) {
                $answer[$key] = [
                    'question_id' => $value,
                    'answer_id' => 0,
                ]; 
            }
        }

        $modelObj = Models::find($request->id);
        $modelObj->answers = !empty($answer) ? serialize($answer) : null; 
        $modelObj->is_default = $request->is_default; 
        $modelObj->save();

        return 1;
    }
   
}
