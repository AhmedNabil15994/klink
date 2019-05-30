<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Frontend\Email;
use App\Models\Frontend\Address;
use App\Models\Frontend\Country;
use App\Models\Question;
use App\Models\Models;
use App\Models\Frontend\Number;
use App\Models\Frontend\NewDocument;
use App\Models\Backend\Admin;
use Helper;
use Validator;
use Response;

class PagesFrontController extends Controller
{
    public function getPage(){
        $route = \Route::current()->parameters()['page'];

        if($route=='contact'){
            $data = new \stdClass();
            $data->title = "Contact";
            $user = Admin::with('profile')->where('email','admin@admin.com')->first();
            return view("Pages.Views.Frontend.Page.contact", compact('user','data'));
        }

        $page = Pages::where('route',$route)->first();
        if($page == null){
            return redirect()->route('error404');
        }else{
            $this->data['data']  = $page;
            return view('Pages.Views.Frontend.Page.page',$this->data);                        
        }
    }

    public function getModel(){
        $route = \Route::current()->parameters()['page'];
        $model = \Route::current()->parameters()['model'];
        $models = Models::get()->pluck('url')->toArray();
        $models = array_merge($models,['questions']);
        $page = Pages::where('route',$route)->first();

        if($page == null || !in_array($model, $models) ){
            return redirect()->route('error404');
        }else{
            if($model == 'questions'){
                return $this->getQuestions();
            }else{
                $modelObj = Models::where("url",$model)->first(); 
                $data = new \stdClass();
                $data->title = $model;
                $data->back = \URL::to('/page/'.$route);
                $this->data['data'] = $data;
                return view('Pages.Views.Frontend.Model.'.$modelObj->title,$this->data);
            }
        }
    }

    public function application(){
        $input = \Input::all();
        $rules = [
            'country' => 'required',
            'mobile_number' => 'required|phone_number',
        ];
        $message = [
            'country.required' => 'Address Must Be Verified.',
            'mobile_number.required' => 'Phone Is Required.',
            'mobile_number.phone_number' => 'Phone Must Be Valid.',
        ];
        $validator = Validator::make($input, $rules, $message);
        if($validator->fails()){
            \Session::flash('errors', $validator->messages()->toArray());
            return redirect()->back();
        }

        $country = Country::where('code', $input['country'])->first();
        
        $input['lat_lng'] = json_encode([$input['lat'],$input['lng']]);
        $input['region'] = $country->name;
        $input['country_id'] = $country->country_id;

        $address = Helper::storeNewRecord('\Address', 'lat_lng', $input);
        $number = Helper::storeNewRecord('\Number', 'mobile_number', $input);
        $page = \Route::current()->parameters()['page'];
        
        \Session::flash('success', "Alert! Create Successfully");
        return redirect()->back();
    }

    public function storeContact(){
        $input = \Input::all();
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
        $message = [
            'name.required' => 'Sorry Name is Required.',
            'email.required' => 'Sorry Email is Required.',
            'email.email' => 'Sorry Email Format Not correct.',
            'message.required' => 'Sorry Message is Required.',
        ];
        $validator = Validator::make($input, $rules, $message);
        if($validator->fails()){
            \Session::flash('errors', $validator->messages()->toArray());
            return redirect()->back();
        }
        dd($input);
    }

    public function getQuestions(){
        $route = \Route::current()->parameters()['page'];
        $page = Pages::where('route',$route)->first();
        $docs = NewDocument::where('page_id',$page->id)->pluck('id')->toArray();
        $questions = Question::getMainRandomByPages($docs);

        if($page == null || $questions == null){
            return redirect()->route('error404');
        }else{
            $this->data['question'] = $questions;
            $data = new \stdClass();
            $data->title = "Advertisment";
            $this->data['data'] = $data;
            return view('Question.Views.Frontend.index',$this->data);                
        }
    }

}
