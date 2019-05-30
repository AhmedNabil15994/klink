<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    //

	public function index(){
		return view('mobile.home');
	}

	public function orders(){
		return view('mobile.orders');
	}

	public function profile(){
		return view('mobile.profile');
	}
	public function vehicles(){
		return view('mobile.vehcile');
	}
	public function drivers(){
		return view('mobile.driver');
	}

}
