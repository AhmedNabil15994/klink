<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Faq;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Vehicle;
use App\Models\Frontend\Tour;
use App\Models\Frontend\Order;
use App\Models\Frontend\Offer;
use App\Models\Frontend\Driver;
use App\Models\Backend\Shipping;
use App\Models\Frontend\Document;
use App\Models\Frontend\CompanyOrderVehicles;
use App\Models\Frontend\CompanyOrderDates;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use Crypt;
use Helper;
use \App\Http\Controllers\Backend\OrderHistoryController;
use \App\Http\Controllers\Frontend\UserOrderController;


class DriverDashboardController extends Controller
{   
    
   


    public function index()
    {   
       
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $driver = Driver::where('user_id',Auth::user()->id)->get();
        $user = [];
        $vec = [];
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $vec [] = $value->vehichle_id;
                $user [] = $value->company_id;
            }
            $user_vehicles = Vehicle::whereIn('id', $vec)->get();
        }else{
            $user [] = Auth::user()->id;
            $user_vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
        }


        $ships = [];
        foreach ($user_vehicles as $key => $value) {
            $ships[] = $value->ship_id;
            $vec[] = $value->id;
        }
        if (count($user_vehicles) > 0) {
            $this->data['order_count'] = DB::table('offers')
                                        ->join('orders', 'offers.order_id', '=', 'orders.id')
                                        ->join('company_order_vehicles', 'company_order_vehicles.order_id', '=', 'orders.id')
                                        ->whereIn('offers.user_id',  $user)
                                        ->orwhereIn('company_order_vehicles.vehicle_id', $vec)
                                        ->whereIn('company_order_vehicles.user_id', $user)
                                        ->orwhereIn('orders.ship_id', $ships)
                                        ->count();

        } else {
            $this->data['order_count'] = 0;
        }
        $this->data['vehicle_count'] = count($user_vehicles);



        $this->data['accepted_order'] =  DB::table('offers')
                                        ->join('orders', 'offers.order_id', '=', 'orders.id')
                                        ->join('company_order_vehicles', 'company_order_vehicles.order_id', '=', 'orders.id')
                                        ->where('orders.is_active', '=', '1')
                                        ->whereIn('offers.user_id',  $user)
                                        ->whereIn('company_order_vehicles.vehicle_id', $vec)
                                        ->whereIn('company_order_vehicles.user_id', $user)
                                        ->where('offers.is_accepted', '=', '1')
                                        ->count();

        $this->data['income'] = DB::table('offers')
                                        ->join('orders', 'offers.order_id', '=', 'orders.id')
                                        ->join('company_order_vehicles', 'company_order_vehicles.order_id', '=', 'orders.id')
                                        ->where('orders.is_active', '=', '1')
                                        ->whereIn('offers.user_id',  $user)
                                        ->whereIn('company_order_vehicles.vehicle_id', $vec)
                                        ->whereIn('company_order_vehicles.user_id', $user)
                                        ->where('offers.is_accepted', '=', '1')
                                        ->sum('offers.total');


        $this->data['active_orders'] = DB::table('offers')
                                        ->join('orders', 'offers.order_id', '=', 'orders.id')
                                        ->join('company_order_vehicles', 'company_order_vehicles.order_id', '=', 'orders.id')
                                        ->where('orders.is_active', '=', '1')
                                        ->whereIn('offers.user_id',  $user)
                                        ->whereIn('company_order_vehicles.vehicle_id', $vec)
                                        ->whereIn('company_order_vehicles.user_id', $user)
                                        ->where('offers.is_accepted', '=', '1')
                                        ->take(5)
                                        ->get();

        $this->data['new_orders'] = Order::orderBy('id', 'DESC')->where('is_active', 0)->whereIn('ship_id', $ships)->take(5)->get();



        $offers = Offer::whereIn('user_id', $user)
                        ->where('is_accepted', 1)
                        ->get()
                        ->groupBy(function ($date) {
                            return Carbon::parse($date->created_at)->format('m'); // grouping by months
                        });

        $offer_count = [];
        $offer_price = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        $count       = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        $price       = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($offers as $key => $value) {
            $offer_count[(int)$key] = count($value);
            foreach ($value as $one) {
                $offer_price[(int)$key] += $one['total'];
            }
        }
        
        for ($i = 0; $i <= 12; $i++) {
            if (empty($offer_count[$i])) {
                $offer_count[$i] = 0;
                $offer_price[$i] = 0;
            }
        }


        for ($i=1; $i <= count($offer_count)-1 ; $i++) {
            $count[$i] = $offer_count[$i];
            $price[$i] = $offer_price[$i];
        }


        $this->data['offer_count'] = $count;
        $this->data['offer_price'] = $price;//array_multisort($count, SORT_DESC, $array);

        return view('frontend.dashboard.dashboard', $this->data);
    }

    
    public function orders(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $user = [];
        $driver = Driver::where('user_id',Auth::user()->id)->first();
        if(!empty($driver)){
            $user[] = $driver->company_id;
        }else{
            $user[] = Auth::user()->id;
        }

        $vehicles = Vehicle::whereIn('user_id', $user)->count();
        if ($vehicles > 0) {
            $ships = [];
            $weights = [];

            $user_vehicles = Vehicle::whereIn('user_id', $user)->where('status', 1)->get();
            foreach ($user_vehicles as $key => $value) {
                $ships[] = $value->ship_id;
                $weights[] = $value->weight;
            }

            $orders = \DB::table('orders')->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                ->join('vehicles', 'orders.weight', '<=', 'vehicles.weight')
                                ->whereIn('vehicles.user_id', $user)
                                ->where('vehicles.status', '=', 1)
                                ->where('order_dates.valid_until', '>', Carbon::now())
                                ->where('orders.delievered', '=', '0')
                                ->where('orders.is_active', 0)
                                ->orderBy('orders.id', 'DESC')
                                ->groupBy('orders.id')
                                ->get(['orders.*','order_dates.*','vehicles.weight as vec_weight','vehicles.ship_name as ship_name','vehicles.ship_id as vec_ship_id']);

            $data =[];
            $company_vehicles =[];
            foreach ($orders as $key => $value) {
                $offers = Offer::where('order_id', $value->order_id)->whereIn('user_id', $user)->get();
                $offer = Offer::where('order_id', $value->order_id)->where('is_accepted', 1)->first();
                $company_vehicles = Vehicle::whereIn('user_id', $user)->where('ship_id', $value->ship_id)->get();
                if (!count($offers)) {
                    if (empty($offer)) {
                        $data[] = $value;
                    }
                }
            }
        
            $paginatedItems = Helper::paginateData($data,5,$request);

            $this->data['data'] = $paginatedItems;
            $this->data['vehicles'] = $company_vehicles;
            $this->data['count'] = count($data);
        } else {
            $this->data['count'] = 0;
            $this->data['data'] = [];
        }
        $this->data['vehicles'] = \DB::table('drivers')->join('vehicles', 'vehicles.id', '=', 'drivers.vehichle_id')
                                            ->join('user_profiles', 'drivers.profile_id', '=', 'user_profiles.id')
                                            ->where('vehicles.user_id', '=', Auth::user()->id)
                                            ->where('drivers.company_id', '=', Auth::user()->id)
                                            ->orderBy('vehicles.weight', 'ASC')
                                            ->get(['vehicles.*','vehicles.address as my_add','vehicles.home as my_home','vehicles.postal_code as my_post','vehicles.country as my_country','vehicles.city as my_city','drivers.*','user_profiles.*']);
        
        return view('frontend.dashboard.order', $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
            'order_id'=>'required',
            'user_id'=>'required',
            'total'=>'required',
        ];
        $dates = false;
        if (request()->input('load_from')) {
            $rules['load_from'] = 'date';
            $dates = true;
        }
        if (request()->input('delivery_from')) {
            $rules['delivery_from'] = 'date';
            $dates = true;
        }
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        // return request()->all();
        
        $user = '';
        $driver = Driver::where('user_id',Auth::user()->id)->first();
        if(count($driver) > 0){
            $user = $driver->company_id;
        }else{
            $user = Auth::user()->id;
        }

        $offer = new Offer;
        $offer->order_id = $request->order_id;
        $offer->user_id = $user;
        $offer->total = $request->total;
        $offer->is_accepted = 0;
        $offer->save();
        if ($dates==true) {
            $offer->edits()->create([
                'load_from'=>request()->load_from,
                'delivery_from'=>request()->delivery_from,
            ]);
        }
        $order = Order::find(request()->order_id);
        $profile = Profile::where('user_id', $offer->user_id)->first();
        $discount = Shipping::where('id', $order->ship_id)->first();
        OrderHistoryController::store($order, 'foundOffer');
        event(new \App\Events\TaskEvent($order, $offer, $profile, $discount->discount));
        UserOrderController::sendAdminEmail($order, $offer);
        UserOrderController::sendAdminEmail3($order, $offer);
        return 1;
    }

    public function company_order_dates(Request $request)
    {
        $draft = $request->newValue;
        $type  = $request->type;
        $order_dates = OrderDates::where('order_id',$request->order_id)->first();

        $user = '';
        $driver = Driver::where('user_id',Auth::user()->id)->first();
        if(count($driver) > 0){
            $user = $driver->company_id;
        }else{
            $user = Auth::user()->id;
        }

        if ($type == 'load_up') {
            $new = $draft;
        } else {
            $date  = explode('GMT+0200', $draft, 2);
            $date  = new \DateTime($date[0], new \DateTimeZone('Europe/Berlin'));
            $new   = $date->format('Y-m-d H:i');
        }
        
        if($new > Carbon::parse($order_dates->delivery_until)->format('Y-m-d H:i') ){
          return Response::json([
            'errors' => ["Wrong Date \n Date isn't suitable for order dates"]
          ]);
        }else{

          if($type == 'start'){
            if($new < Carbon::parse($order_dates->load_from)->format('Y-m-d H:i')){
              return Response::json([
                'errors' => ["Wrong Date \n Date isn't suitable for order dates"]
              ]);
            }else{
              $company_dates = CompanyOrderDates::where('order_id', $request->order_id)->where('user_id', $user)->first();

              if (!empty($company_dates)) {
                  $company_dates->$type = $new;
                  $company_dates->save();
              } else {
                  $company_order_dates = CompanyOrderDates::create([
                    'order_id'  => $request->order_id,
                    'user_id' => $user,
                ]);
                  $company_order_dates->$type = $new ;
                  $company_order_dates->save();
              }
              return 1;
              }
          }else{
            $company_dates = CompanyOrderDates::where('order_id', $request->order_id)->where('user_id', $user)->first();

            if (!empty($company_dates)) {
                $company_dates->$type = $new;
                $company_dates->save();
            } else {
                $company_order_dates = CompanyOrderDates::create([
                  'order_id'  => $request->order_id,
                  'user_id' => $user,
              ]);
                $company_order_dates->$type = $new ;
                $company_order_dates->save();
            }
            return 1;
          }
        }   
    }

    public function company_order_vec(Request $request)
    {

        $user = '';
        $driver = Driver::where('user_id',Auth::user()->id)->first();
        if(count($driver) > 0){
            $user = $driver->company_id;
        }else{
            $user = Auth::user()->id;
        }

        $company_order_vec = CompanyOrderVehicles::where('order_id', $request->order_id)->where('user_id', $user)->first();
        $vehicle_id = $request->vehicle_id;

        if ($vehicle_id  == 0) {
            $vehicle_id = '';
        } else {
            $vehicle_id = $request->vehicle_id;
        }

        if (!empty($company_order_vec)) {
            $company_order_vec->vehicle_id = $vehicle_id;
            $company_order_vec->save();
        } else {
            CompanyOrderVehicles::create([
          'order_id'  => $request->order_id,
          'vehicle_id'  => $vehicle_id,
          'user_id'  => $user,
        ]);
        }

        return 1;
    }

    public function counts()
    {
        $data = [];
        $user = [];
        $vecs = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
                if($value->vehichle_id != null || $value->vehichle_id != ''){
                    $vecs[] = $value->vehichle_id;
                }
            }
        }else{
            $user[] = Auth::user()->id;
            $vehicles = Vehicle::whereIn('user_id',$user)->get();
            foreach ($vehicles as $key => $value) {
                $vecs[] = $value->id;
            }
        }

        $orders = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                        ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                        ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                        ->where('order_dates.valid_until', '<', Carbon::now())
                                        ->whereIn('offers.user_id', $user)
                                        ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                        ->whereIn('company_order_vehicles.user_id', $user)
                                        ->where('orders.delievered', '=', '0')
                                        ->where('orders.is_active', '!=', 1)
                                        ->orderBy('orders.id', 'DESC')
                                        ->get();
         
        $now = Carbon::now()->format('Y-m-d H:i:s');
        foreach ($orders as $key => $value) {
            $date = Carbon::parse($value->valid_until)->addDay();
            $date = Carbon::parse($date)->format('Y-m-d H:i:s');

            if ($date >= $now) {
                $data [] = $value;
            }
        }

        //Cancelled Orders Count                                  
        $this->data['count3'] = count($data);



        //Accepted Orders Count
        $this->data['count1'] = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '0')
                                          ->whereIn('offers.user_id', $user)
                                          ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                          ->whereIn('company_order_vehicles.user_id', $user)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->count();

        //Pending Orders Count                                  
        $this->data['count2'] = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                    ->where('order_dates.valid_until', '>', Carbon::now())
                                    ->where('orders.delievered', '=', '0')
                                    ->where('orders.is_active', '=', '0')
                                    ->whereIn('offers.user_id', $user)
                                    ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                    ->whereIn('company_order_vehicles.user_id', $user)
                                    ->count();

        

        //Finished Orders Count
        $this->data['count4'] = DB::table('orders')
                                    ->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                    ->where('orders.is_active', '=', '1')
                                    ->where('orders.delievered', '=', '1')
                                    ->whereIn('offers.user_id', $user)
                                    ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                    ->whereIn('company_order_vehicles.user_id', $user)
                                    ->where('offers.is_accepted', '=', '1')
                                    ->count();

        return $this->data;
    }

    public function activeOrders(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $user = [];
        $vecs = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
                if($value->vehichle_id != null || $value->vehichle_id != ''){
                    $vecs[] = $value->vehichle_id;
                }
            }
        }else{
            $user[] = Auth::user()->id;
            $vehicles = Vehicle::whereIn('user_id',$user)->get();
            foreach ($vehicles as $key => $value) {
                $vecs[] = $value->id;
            }
        }

        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '0')
                                          ->whereIn('offers.user_id', $user)
                                          ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                          ->whereIn('company_order_vehicles.user_id', $user)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);

        $this->data['data'] = $data;
        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('accepted');
        return view('frontend.dashboard.ActiveOrder', $this->data);
    }

    public function assign()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $user = [];
        $vecs = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
                if($value->vehichle_id != null || $value->vehichle_id != ''){
                    $vecs[] = $value->vehichle_id;
                }
            }
        }else{
            $user[] = Auth::user()->id;
            $vehicles = Vehicle::whereIn('user_id',$user)->get();
            foreach ($vehicles as $key => $value) {
                $vecs[] = $value->id;
            }
        }

        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '0')
                                          ->whereIn('offers.user_id', $user)
                                          ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                          ->whereIn('company_order_vehicles.user_id', $user)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);

        $this->data['data'] = $data;
        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('accepted');
        $this->counts();
        return view('frontend.dashboard.assignments.assignment', $this->data);
    }

    public function finished()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $user = [];
        $vecs = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
                if($value->vehichle_id != null || $value->vehichle_id != ''){
                    $vecs[] = $value->vehichle_id;
                }
            }
        }else{
            $user[] = Auth::user()->id;
            $vehicles = Vehicle::whereIn('user_id',$user)->get();
            foreach ($vehicles as $key => $value) {
                $vecs[] = $value->id;
            }
        }

        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                    ->where('orders.is_active', '=', '1')
                                    ->where('orders.delievered', '=', '1')
                                    ->whereIn('offers.user_id', $user)
                                    ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                    ->whereIn('company_order_vehicles.user_id', $user)
                                    ->where('offers.is_accepted', '=', '1')
                                    ->orderBy('orders.id', 'DESC')
                                    ->paginate(5);
        $this->data['data'] = $data;
        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('finished');
        $this->counts();
        return view('frontend.dashboard.assignments.assignment', $this->data);
    }

    public function pending()
    {

        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $user = [];
        $vecs = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
                if($value->vehichle_id != null || $value->vehichle_id != ''){
                    $vecs[] = $value->vehichle_id;
                }
            }
        }else{
            $user[] = Auth::user()->id;
            $vehicles = Vehicle::whereIn('user_id',$user)->get();
            foreach ($vehicles as $key => $value) {
                $vecs[] = $value->id;
            }
        }


        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                    ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                    ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                    ->where('order_dates.valid_until', '>', Carbon::now())
                                    ->where('orders.delievered', '=', '0')
                                    ->where('orders.is_active', '=', '0')
                                    ->whereIn('offers.user_id', $user)
                                    ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                    ->whereIn('company_order_vehicles.user_id', $user)
                                    ->orderBy('orders.id', 'DESC')
                                    ->paginate(5);

        $this->data['data'] = $data;
        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('pending');
        $this->counts();
        return view('frontend.dashboard.assignments.assignment', $this->data);
    }

    public function cancelled(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();


        $user = [];
        $vecs = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
                if($value->vehichle_id != null || $value->vehichle_id != ''){
                    $vecs[] = $value->vehichle_id;
                }
            }
        }else{
            $user[] = Auth::user()->id;
            $vehicles = Vehicle::whereIn('user_id',$user)->get();
            foreach ($vehicles as $key => $value) {
                $vecs[] = $value->id;
            }
        }


        $data = [];
        $orders = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                        ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                        ->join('company_order_vehicles', 'orders.id','=','company_order_vehicles.order_id')
                                        ->where('order_dates.valid_until', '<', Carbon::now())
                                        ->whereIn('offers.user_id', $user)
                                        ->whereIn('company_order_vehicles.vehicle_id', $vecs)
                                        ->whereIn('company_order_vehicles.user_id', $user)
                                        ->where('orders.delievered', '=', '0')
                                        ->where('orders.is_active', '!=', 1)
                                        ->orderBy('orders.id', 'DESC')
                                        ->get();
         
        $now = Carbon::now()->format('Y-m-d H:i:s');
        foreach ($orders as $key => $value) {
            $date = Carbon::parse($value->valid_until)->addDay();
            $date = Carbon::parse($date)->format('Y-m-d H:i:s');

            if ($date >= $now) {
                $data [] = $value;
            }
        }
       
        $paginatedItems = Helper::paginateData($data,5,$request);

        $this->data['data'] = $paginatedItems;

        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('cancelled');
        $this->counts();

        return view('frontend.dashboard.assignments.assignment', $this->data);
    }

    public function done(Request $request)
    {
        $now = Carbon::now();
        $now = Carbon::parse($now)->format('Y-m-d H:i:s');
        $order = Order::find($request->id);
        $order->delievered = 1;
        $order->updated_at =  $now;
        $order->save();

        return 1;
    }

    public function confirmed(Request $request)
    {
        $order = Order::find($request->id);
        $order->confirmed = 1;
        $order->save();

        return 1;
    }

    public function edit_steps(Request $request){

        $user = [];
        $driver = Driver::where('user_id',Auth::user()->id)->get();
        if(count($driver) > 0){
            foreach ($driver as $key => $value) {
                $user[] = $value->company_id;
            }
        }else{
            $user[] = Auth::user()->id;            
        }     


        $now = Carbon::now();
        $now = Carbon::parse($now)->format('Y-m-d H:i:s');

        $order_id = $request->id;
        $type = $request->type;
        if($type == 'take_money'){
            $order = Order::find($order_id);
            $order->paid = $order->cost;
            $order->save();
        }
        $relation = CompanyOrderVehicles::where('order_id',$order_id)->whereIn('user_id',$user)->first();

        $relation->$type = $now;
        $relation->save();

        return 1;


    }


    public function business_customer(Request $request){
        $tours = Tour::whereHas('accepted_offer',function($query){
                $query->where('driver_profile_id',Auth::user()->profile->id);
        })->with(['trips'=>function($q){
            $q->with('trip_stops.stops.stop_freights.freights.freight_details.freight_category','trip_stops.stops.stop_freights.order_person.address','trip_stops.stops.stop_freights.order_person.number','trip_stops.stops.stop_freights.order_person')->orderBy('id','DESC');
        }])->get();
        $trips = array();
        foreach ($tours as $key => $value) {
            foreach ($value->trips as $key1 => $trip ) {
                $trips[] = $trip;
            }
        }
        $paginatedItems = Helper::paginateData($trips,10,$request);


        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] = $paginatedItems;
        $this->data['count'] = count($trips);
        
        return view('frontend.dashboard.business_customer.driver.main',$this->data);
    }

    public function filterTrips(Request $request, $type){
        $day = Carbon::parse($type)->format('Y-m-d');
        $tours = Tour::whereHas('accepted_offer',function($query) use ($day){
                $query->where('driver_profile_id',Auth::user()->profile->id);
        })->with(['trips'=>function($q)  use ($day){
            $q->whereHas('is_done_dates',function($dat) use ($day){
                $dat->where('day',$day);
            })->with('trip_stops.stops.stop_freights.freights.freight_details.freight_category','trip_stops.stops.stop_freights.order_person.address','trip_stops.stops.stop_freights.order_person.number','trip_stops.stops.stop_freights.order_person')->orderBy('id','DESC');
        }])->get();
        $trips = array();
        foreach ($tours as $key => $value) {
            foreach ($value->trips as $key1 => $trip ) {
                $trips[] = $trip;
            }
        }
        $paginatedItems = Helper::paginateData($trips,10,$request);

        //dd($paginatedItems);
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] = $paginatedItems;
        $this->data['count'] = count($trips);
        
        return view('frontend.dashboard.business_customer.driver.main',$this->data);
    }


}
