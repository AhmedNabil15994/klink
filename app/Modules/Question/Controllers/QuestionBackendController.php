<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Frontend\NewDocument;
use Illuminate\Http\Request;

class QuestionBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $questions = Question::get();

        $list = [];
        foreach ($questions as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = Question::generateQuestion($value);
        }

        $this->data['data'] = (object)$list;
        $this->data['docs'] = NewDocument::where('page_id','!=',NULL)->get();
        
        if($request->ajax()){
            return view('Question.Views.Backend.Ajax.filter',$this->data)->render();
        }

        return view('Question.Views.Backend.index',$this->data);
    }

    public function filterByDocument($id)
    {
        $questions = Question::where('document_id',$id)->get();

        $list = [];
        foreach ($questions as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = Question::generateQuestion($value);
        }

        $this->data['data'] = (object)$list;
        $this->data['docs'] = NewDocument::where('page_id','!=',NULL)->get();
        
        return view('Question.Views.Backend.Ajax.filter',$this->data)->render();
    }


    public function addQuestion(Request $request){
        $question = new Question();
        $question->question = $request->question;
        $question->answers = json_encode($request->answers);
        $question->is_main = $request->is_main;
        $question->document_id = $request->document_id != 0 ? $request->document_id : null;
        $question->notes = $request->notes;
        $question->save();
        return 1;
    }

    public function destroyQuestion(Request $request){
        Question::find($request->id)->delete();
        return 1;
    }

    public function editAnswer(Request $request){
        $question = Question::find($request->question_id);
        $answers = json_decode($question->answers);
        $list = [];
        foreach ($answers as $key => $value) {
            $list[$key] = $value;
        }
        $list[$request->id - 1 ]->text = $request->text;
        $question->answers = json_encode($list);
        $question->save();
        return 1;
    }

    public function editQuestion(Request $request){
        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->save();
        return 1;
    }

    public function editQuestionDocument(Request $request){
        $question = Question::find($request->id);
        $question->document_id = $request->document_id;
        $question->save();
        return 1;
    }


    public function loadQuestion(Request $request){
        $this->data['selectedQuestion'] = Question::find($request->id);
        $this->data['all'] = Question::where('is_main',0)->get();
        return view('Question.Views.Backend.Ajax.loadQuestion',$this->data)->render();
    }

    public function assignQuestion(Request $request){
        $list = [];
        foreach ($request->questions as $key => $value) {
            $list[] = [
                'answer_id'=>$request->answer_id,
                'questions' => $value
            ];
        }

        $question = Question::find($request->question_id);
        $old = $question->relatives != null ? json_decode($question->relatives) : [];

        $question->relatives = json_encode(array_merge($old,$list));
        $question->save();

        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
