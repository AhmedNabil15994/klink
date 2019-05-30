<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Frontend\Faq;
use App\Models\Frontend\Profile;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;

class QuestionController extends Controller
{
    public function index(){
    	$this->data['data'] = Faq::orderBy('id','DESC')->get();
    	return view('backend.adminlte.questions.index',$this->data);
    }

    public function edit(Request $request){
    	$rules = [
            'question' => 'required',
            'reply' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $faq = Faq::find($request->id);
        $faq->question = $request->question;
        $faq->reply = $request->reply;
        $faq->replied_at = Carbon::now()->format('Y-m-d H:i:s');
        $faq->is_seen = 1;
        $faq->save();

        return 1;
    }

    public function store(Request $request){
    	$rules = [
            'question' => 'required',
            'reply' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->reply = $request->reply;
        $faq->is_seen = 1;
        $faq->user_id = 0;
        $faq->save();

        return 1;
    }

    public function destroy(Request $request){
    	Faq::where('id',$request->id)->delete();
    	return 1;
    }

}
