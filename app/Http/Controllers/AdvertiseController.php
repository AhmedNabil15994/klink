<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function index()
    {
        return view('advertise.index');
    }
    public function partnerwerden()
    {
        return view('advertise.partnerwerden');
    }
}
