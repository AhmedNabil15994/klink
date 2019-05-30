<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Models\Frontend\User;
use App\Models\Frontend\Order;
use App\Models\Frontend\Offer;
use App\Models\Frontend\Vehicle;

class AdminController extends Controller
{

    

    public function getLogin()
    {
        if (Auth::guard('webadmin')->check()) {
            return redirect('backend/dashboard');
        } else {
            return view('backend.adminlte.auth.login');
        }
    }

    public function postLogin()
    {
        if (Auth::guard('webadmin')->attempt(['email'=> request('email'), 'password' => request('password')])) {
            return redirect('backend/dashboard');
        } else {
            return redirect('backend/login');
        }
    }

    public function logout()
    {
        Auth::guard('webadmin')->logout();
        // return redirect(route('login'));
        return redirect('backend/login');
    }

    

    public function index()
    {
        return view('backend.adminlte.home2');
    }
    public function offerVehicle(Offer $offer)
    {
        return $offer->vehicle($offer)->first();
    }
    public function AllUserApi()
    {
        $users =  User::whereHas('profile', function ($q) {
            return $q->where('status', 'company');
        })->with(['profile','companyVehicle'=>function ($q) {
            return $q->select('id', 'user_id');
        }])->get();
        
        $waiting = Order::status('FilterFunctionwatingOrder')->with([
            'offers'=>function ($q) {
                return $q->orderBy('is_accepted')->with('user');
            },
            'sender',
            'receiver',
            'otherBilling'
        ])->get();
        $deciding = Order::status('FilterFunctiondecidingOrder')->with([
            'offers'=>function ($q) {
                return $q->orderBy('is_accepted')->with('user');
            },
            'sender',
            'receiver',
            'otherBilling'
        ])->get();
        $orders = $waiting->merge($deciding);
        $vehicles = Vehicle::whereHas('company')->with(['drivere'=>function ($q) {
            return $q->with('profile');
        },'ship'])->get();
        return [
            'users'=>$users,
            'orders'=>$orders,
            'vehicles'=>$vehicles,
        ];
    }
}
