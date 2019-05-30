<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Models;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        $this->data['data'] = Question::getMainRandom();
        return view('Question.Views.Frontend.index',$this->data);
    }

    public function newQuestion(){
        $input = \Input::all();
        $question_id = (int) $input['question_id'];
        $answer_id = (int) $input['answer_id'];

        $this->data['data'] = Question::getNewQuestion($question_id,$answer_id);
        if($this->data['data'] != null){
            return view('Question.Views.Frontend.Ajax.loadNewQuestion',$this->data)->render();
        }else{
            return $this->userResults(array_unique($input['data'],SORT_REGULAR));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function userResults($data){
        $selection = serialize(array_values($data));
        $modelObj = Models::where('answers',$selection)->first();
        $route = \Route::current()->parameters()['page'];

        if($modelObj == null){
            $modelObj = Models::where('is_default',1)->first();
        }

        $route = route('model',['page'=>$route,'model'=>$modelObj->url]);
        $result = [0,$route];
        return $result;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
