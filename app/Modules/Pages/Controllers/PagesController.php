<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;

class PagesController extends Controller
{

    public function index()
    {   
        $this->data['data'] = Pages::get(); 
        return view('Pages.Views.index',$this->data);
    }

    public function storePage(Request $request){
        Pages::create($request->all());
        return 1;
    }

    public function editPage(Request $request){
        $link = Pages::find($request->id);
        $link->title = $request->title;
        $link->route = $request->route;
        $link->layout = $request->layout;
        $link->save();

        return 1;
    }

    public function destroyPage(Request $request){
        Pages::find($request->id)->delete();
        return 1;
    }
   
}
