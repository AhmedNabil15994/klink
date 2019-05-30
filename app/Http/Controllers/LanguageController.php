<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Session;
use App;
use Input;
use Redirect;
use Config;

class LanguageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  
     public function chooseLanguage(Request $request)
    {

        if($request->ajax()){
            if(!\Session::has('locale')){
                \Session::put('locale', $request->locale);
            }else{
                \Session::forget('locale');
                session(['locale',$request->locale]);
            } 
            return Redirect::back();
        }
    }
}
