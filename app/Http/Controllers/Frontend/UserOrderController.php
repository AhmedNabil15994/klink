<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Vehicle;
use App\Models\Frontend\Comment;
use App\Models\Frontend\Driver;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderDates;
use App\Models\Frontend\OrderOtherBilling;
use App\Models\Frontend\OrderSendReceive;
use App\Models\Frontend\CompanyOrderDates;
use App\Models\Frontend\CompanyOrderVehicles;
use App\Models\Frontend\Offer;
use App\Models\Backend\Shipping;
use App\Models\Backend\Emails;
use App\Models\Backend\Admin;
use App\Models\Frontend\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Response;
use Carbon;
use PDF;
use App\Events\EventTask;
use Crypt;
use Illuminate\Pagination\LengthAwarePaginator;
use Route;
use \App\Http\Controllers\Backend\OrderHistoryController;

class UserOrderController extends Controller
{
    public function counts()
    {
        $data = [];
        $orders = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->where('order_dates.valid_until', '<', Carbon::now())
                                          ->where('offers.user_id', '=', Auth::user()->id)
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


        $this->data['count1'] = DB::table('offers')->join('orders', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '0')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->count();

        $this->data['count2'] = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->where('order_dates.valid_until', '>', Carbon::now())
                                          ->where('orders.is_active', '=', '0')
                                          ->where('orders.delievered', '=', '0')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->count();

        $this->data['count3'] = count($data);

        $this->data['count4'] = DB::table('offers')->join('orders', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '1')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->count();

        return $this->data;
    }
    public function activeOrders(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '0')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        $this->data['data'] = $data;
        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('accepted');
        //$this->counts();
        return view('frontend.dashboard.ActiveOrder', $this->data);
    }
    public function index(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $vehicles = Vehicle::where('user_id', Auth::user()->id)->count();
        if ($vehicles > 0) {
            $ships = [];
            $user_vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
            foreach ($user_vehicles as $key => $value) {
                $ships[] = $value->ship_id;
            }

            //
            $orders = \DB::table('orders')->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                ->orderBy('orders.id', 'DESC')
                                ->where('order_dates.valid_until', '>', Carbon::now())
                                ->where('orders.delievered', '=', '0')
                                ->where('orders.is_active', 0)
                                ->whereIn('orders.ship_id', $ships)
                                ->get();
            $data =[];
            $company_vehicles =[];
            foreach ($orders as $key => $value) {
                $offers = Offer::where('order_id', $value->order_id)->where('user_id', Auth::user()->id)->get();
                $company_vehicles = Vehicle::where('user_id', Auth::user()->id)->where('ship_id', $value->ship_id)->get();
                if (!count($offers)) {
                    $data[] = $value;
                }
            }
            
            
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
            $itemCollection = collect($data);
     
            $perPage = 5;
     
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
     
            $paginatedItems= new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
     
            $paginatedItems->setPath($request->url());
     


            //dd($data);
            $this->data['data'] = $paginatedItems;
            $this->data['vehicles'] = $company_vehicles;
            $this->data['count'] = count($data);
        } else {
            $this->data['count'] = 0;
            $this->data['data'] = [];
        }
        // return 'hello';
        $this->data['vehicles'] = auth()->user()->companyVehicle;
        
        return view('frontend.dashboard.order', $this->data);
    }

    public function index2(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $vehicles = Vehicle::where('user_id', Auth::user()->id)->count();
        if ($vehicles > 0) {
            $ships = [];
            $weights = [];

            $user_vehicles = Vehicle::where('user_id', Auth::user()->id)->where('status', 1)->get();
            foreach ($user_vehicles as $key => $value) {
                $ships[] = $value->ship_id;
                $weights[] = $value->weight;
            }

            //
            $orders = \DB::table('orders')->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                ->where('order_dates.valid_until', '>', Carbon::now())
                                ->where('orders.delievered', '=', '0')
                                ->where('orders.is_active', 0)
                                ->orderBy('orders.id', 'DESC')
                                ->groupBy('orders.id')
                                ->get();


            /*$orders = \DB::table('orders')->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                ->where('order_dates.valid_until', '>', Carbon::now())
                                ->where('orders.delievered', '=', '0')
                                ->where('orders.is_active', 0)
                                ->whereIn('orders.ship_id',$ships)
                                ->orderBy('orders.id', 'DESC')
                                ->get();        */
            

            $data =[];
            $company_vehicles =[];
            foreach ($orders as $key => $value) {
                $offers = Offer::where('order_id', $value->order_id)->where('user_id', Auth::user()->id)->get();
                $offer = Offer::where('order_id', $value->order_id)->where('is_accepted', 1)->first();
                $company_vehicles = Vehicle::where('user_id', Auth::user()->id)->where('weight', '>=', $value->weight)->get();
                if (!count($offers)) {
                    if (empty($offer)) {
                        $data[] = $value;
                    }
                }
            }
            
            
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
            $itemCollection = collect($data);
     
            $perPage = 5;
     
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
     
            $paginatedItems= new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
     
            $paginatedItems->setPath($request->url());
     


            //dd($data);
            $this->data['shippings'] = Shipping::orderBy('id', 'DESC')->get();
            $this->data['drivers'] = Driver::where('company_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            $this->data['data'] = $paginatedItems;
            $this->data['count'] = count($data);
        } else {
            $this->data['count'] = 0;
            $this->data['data'] = [];
            $this->data['shippings'] = Shipping::orderBy('id', 'DESC')->get();
            $this->data['drivers'] = Driver::where('company_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        // return 'hello';
        
        $this->data['vehicles'] = \DB::table('drivers')->join('vehicles', 'vehicles.id', '=', 'drivers.vehichle_id')
                                            ->join('user_profiles', 'drivers.profile_id', '=', 'user_profiles.id')
                                            ->where('vehicles.user_id', '=', Auth::user()->id)
                                            ->where('drivers.company_id', '=', Auth::user()->id)
                                            ->orderBy('vehicles.weight', 'ASC')
                                            ->get(['vehicles.*','vehicles.address as my_add','vehicles.home as my_home','vehicles.postal_code as my_post','vehicles.country as my_country','vehicles.city as my_city','drivers.*','user_profiles.*']);

        /*auth()->user()->companyVehicle()->with(['drivere'=>function ($q) {
            return $q->with(['profile'=>function ($q) {
                return $q->select('phone', 'user_id');
            }])->first();
        }])->get();*/
        // return $this->data['vehicles'];
        
        return view('frontend.dashboard.order2', $this->data);
    }
    
    public function getCarInfo(Request $request)
    {
        $vehicle = Vehicle::find($request->id);

        return $vehicle;
    }

    public function assign()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '0')
                                          ->where('offers.user_id', '=', Auth::user()->id)
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
        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.delievered', '=', '1')
                                          ->where('offers.user_id', '=', Auth::user()->id)
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
        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->where('order_dates.valid_until', '>', Carbon::now())
                                          ->where('orders.delievered', '=', '0')
                                          ->where('orders.is_active', '=', '0')
                                          ->where('offers.user_id', '=', Auth::user()->id)
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
        $data = [];
        $orders = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->where('order_dates.valid_until', '<', Carbon::now())
                                          ->where('offers.user_id', '=', Auth::user()->id)
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
       
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($data);
        $perPage = 5;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());
     
        $this->data['data'] = $paginatedItems;

        $this->data['count'] = count($data);
        $this->data['type'] = Crypt::encrypt('cancelled');
        $this->counts();

        return view('frontend.dashboard.assignments.assignment', $this->data);
    }
    public function sendAdminEmail(Order $order, Offer $offer, $description='')
    {
        $RegisterEmail = Emails::where('title', '=', 'newOfferSend')->first();

        
        $data = [
            'orderStatus'=>$order->status,
            'orderId'=>$order->id,
            'companyName'=>auth()->user()->name,
            'cost'=>$offer->total,
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        \Mail::to(['corbeigt@hotmail.com'], 'Kurier Link Admin')
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
        return 1;
    }

    public function setPayment(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->payment_type = $request->payment_type;
        $order->save();
        return 1;
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
            // return strtotime(request()->load_from) ? 'true' :'false';
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
        $offer = new Offer;
        $offer->order_id = $request->order_id;
        $offer->user_id = $request->user_id;
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
        //OrderHistoryController::store($order, 'foundOffer');
        $this->sendAdminEmail($order, $offer);
        $this->sendAdminEmail3($order, $offer);
        return 1;
    }
    public function sendAdminEmail3($order, $offer)
    {
        $RegisterEmail = Emails::where('title', '=', 'NewOfferToUser')->first();

        
        $data = [
            'name'=>$order->sender->first_name.' '.$order->sender->nick_name,
            'orderId'=>$order->id,
            'companyName'=>$offer->user->name,
            'cost'=>$offer->total,
            'orderLink'=>route('lastSteps', ['id'=>Crypt::encrypt($order->id)]),
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        \Mail::to($order->sender->email, $order->sender->first_name.' '.$order->sender->nick_name)
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
        return 1;
    }
    public function offers(Request $request)
    {
        if ($request->ajax()) {
            $dates = '';
            $valid_until = '';
            $dates = OrderDates::where('order_id', $request->order_id)->first();
            if (isset($request->order_id) && isset($dates)) {
                $valid_until = $dates->valid_until;
            }
  
            $order = Order::where('id', $request->order_id)->first();
            $offers = Offer::where('order_id', $request->order_id)->where('is_accepted', 1)->first();

            $now_date = Carbon::now();
            $now = Carbon::parse($now_date)->format('Y-m-d H:i:s');

            if ($now > $valid_until || $order->is_active == 1 || (isset($offers) && $order->is_active)) {
                return 404;
            } else {
                $offers = Offer::where('order_id', $request->order_id)->orderBy('total', 'ASC')->take(5)->get();
              
                if (count($offers)) {
                    $this->data['offers']= $offers;
                    return view('frontend.order.Ajax.offer', $this->data)->render();
                } else {
                    return 0;
                }
            }
        }
    }

    public function offer_edit(Request $request)
    {
        $offer = Offer::find($request->id);
        $order = Order::find($request->order_id);
        $dates = OrderDates::where('order_id', $request->order_id)->first();
        $from = $dates->delivery_from;

        $now = Carbon::now();
        $now = Carbon::parse($now)->format('Y-m-d H:i:s');

        $from = Carbon::parse($from)->addMinutes(30);
        $from = Carbon::parse($from)->format('Y-m-d H:i:s');

        if ($from <= $now) {
            return 0;
        } else {
            if ($offer->is_accepted == 0) {
                $order->cost = $request->new_total;
                $order->save();
                $offer->is_accepted = 1;
                $offer->save();
                OrderHistoryController::store($order, 'acceptedOffer');
                $this->sendAdminEmail2($order, $offer);
                return view('frontend.order.Ajax.payment')->with(['dates'=>$order->dating])->render();
            }
        }
    }
    public function sendAdminEmail2(Order $order, Offer $offer, $description='')
    {
        $RegisterEmail = Emails::where('title', '=', 'OfferAcceptedEmail')->first();

        
        $data = [
            'orderStatus'=>$order->status,
            'orderId'=>$order->id,
            'companyName'=>$offer->user->name,
            'cost'=>$offer->total,
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        \Mail::to(['corbeigt@hotmail.com'], 'Kurier Link Admin')
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
        return 1;
    }
    public function abstracts(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->orderBy('orders.id', 'DESC')
                                          ->get();
         
        return view('frontend.dashboard.abstract', $this->data);
    }

    public function order_abstract($id, $num)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $order = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('orders.id', '=', $id)
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->orderBy('orders.id', 'DESC')
                                          ->first();
        if ($order) {
            $this->data['order'] = $order;
            $this->data['order_dates'] = OrderDates::where('order_id', $id)->first();
            $this->data['company'] = Profile::where('user_id', Auth::user()->id)->first();
            $this->data['encrypted'] = Crypt::encrypt($id);
            $this->data['offer'] = Offer::where('user_id', Auth::user()->id)->where('order_id', $id)->where('is_accepted', 1)->first();
    
            $this->data['data'] = Admin::with('profile')->where('email','admin@admin.com')->first();
            $this->data['num'] = $num;

            return view('frontend.dashboard.order_abstract', $this->data);
        } else {
            return redirect('error404');
        }
    }

    public function download_pdf($id, $num)
    {
        $this->data['order'] = Order::where('id', $id)->first();
        $this->data['order_dates'] = OrderDates::where('order_id', $id)->first();
        $this->data['company'] = Profile::where('user_id', Auth::user()->id)->first();
        $this->data['offer'] = Offer::where('user_id', Auth::user()->id)->where('order_id', $id)->where('is_accepted', 1)->first();
    
        $this->data['data'] = Admin::with('profile')->where('email','admin@admin.com')->first();
        $this->data['num'] = $num;
        $pdf = PDF::loadView('frontend.pdf.abstract', $this->data);
        return $pdf->download('Abstract #'.$id.'.pdf');
    }


    public function sendAbstract(Request $request)
    {
        $id = $request->id;
        $order_id = Crypt::decrypt($id);
        $template = Emails::where('title', 'Abstract')->first();

        $name = Auth::user()->profile->first_name ." ". Auth::user()->profile->last_name;
        $email = Auth::user()->email;

        $data = [
            'name' => $name,
            'id'=> $id,
            'order_id'=> $order_id,
            
        ];
        $GeneratedEmail = $template->parse($data);

      

        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'order_id'    => $id,
            'url'     => url('/order/abstract/download_abstract', $id),
        ];
      
        \Mail::send(
            'frontend.emails.mail2',
            ['data' => $data],
            function ($message) use ($data) {
                $message
                    ->from($data['no-reply'], $data['name'])
                    ->to($data['email'])->subject($data['subject']);
            }
        );

        return 1;
    }


    public function filter(Request $request)
    {
        $data = '';
        $count = '';
        $type = Crypt::decrypt($request->type);

        $this->data['country'] = $request->country;
        $this->data['country2'] = $request->country2;
        $this->data['postal_code'] = $request->postal_code;
        $this->data['postal_code2'] = $request->postal_code2;
        $this->data['city'] = $request->city;
        $this->data['city2'] = $request->city2;

        if ($type == 'accepted') {
            $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('senders', 'orders.id', '=', 'senders.order_id')
                                          ->join('receivers', 'orders.id', '=', 'receivers.order_id')
                                          ->where(function ($query) use ($request) {
                                              $query->where('senders.postal_code', '=', $request->postal_code)
                                                    ->where('receivers.postal_code', '=', $request->postal_code2)
                                                    ->orWhere('senders.town', '=', $request->city)
                                                    ->orWhere('receivers.town', '=', $request->city2)
                                                    ->orWhere('senders.country', '=', $request->country)
                                                    ->orWhere('receivers.country', '=', $request->country2);
                                          })->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->where('orders.is_active', '=', 1)
                                          ->where('orders.delievered', '=', '0')
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        } elseif ($type == 'pending') {
            $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->join('senders', 'orders.id', '=', 'senders.order_id')
                                          ->join('receivers', 'orders.id', '=', 'receivers.order_id')
                                          ->where(function ($query) use ($request) {
                                              $query->where('senders.postal_code', '=', $request->postal_code)
                                                    ->where('receivers.postal_code', '=', $request->postal_code2)
                                                    ->orWhere('senders.town', '=', $request->city)
                                                    ->orWhere('receivers.town', '=', $request->city2)
                                                    ->orWhere('senders.country', '=', $request->country)
                                                    ->orWhere('receivers.country', '=', $request->country2);
                                          })->where('order_dates.valid_until', '>', Carbon::now())
                                          ->where('orders.is_active', '=', '0')
                                          ->where('orders.delievered', '=', '0')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        } elseif ($type == 'cancelled') {
            $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->join('senders', 'orders.id', '=', 'senders.order_id')
                                          ->join('receivers', 'orders.id', '=', 'receivers.order_id')
                                          ->where(function ($query) use ($request) {
                                              $query->where('senders.postal_code', '=', $request->postal_code)
                                                    ->where('receivers.postal_code', '=', $request->postal_code2)
                                                    ->orWhere('senders.town', '=', $request->city)
                                                    ->orWhere('receivers.town', '=', $request->city2)
                                                    ->orWhere('senders.country', '=', $request->country)
                                                    ->orWhere('receivers.country', '=', $request->country2);
                                          })->where('order_dates.valid_until', '<', Carbon::now())
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('orders.delievered', '=', '0')
                                          ->where('orders.is_active', '!=', 1)
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        }
        if ($type == 'finished') {
            $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('senders', 'orders.id', '=', 'senders.order_id')
                                          ->join('receivers', 'orders.id', '=', 'receivers.order_id')
                                          ->where(function ($query) use ($request) {
                                              $query->where('senders.postal_code', '=', $request->postal_code)
                                                    ->where('receivers.postal_code', '=', $request->postal_code2)
                                                    ->orWhere('senders.town', '=', $request->city)
                                                    ->orWhere('receivers.town', '=', $request->city2)
                                                    ->orWhere('senders.country', '=', $request->country)
                                                    ->orWhere('receivers.country', '=', $request->country2);
                                          })->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->where('orders.is_active', '=', 1)
                                          ->where('orders.delievered', '=', '1')
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        }


        

        $this->data['data'] = $data;
        $this->data['type'] = $request->type;
        return view('frontend.dashboard.assignments.Ajax.filter', $this->data)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function comment(Request $request)
    {
        $comment = Comment::where('user_id', $request->user_id)->where('order_id', $request->order_id)->first();

        if (isset($comment)) {
            $comment->user_id = $request->user_id;
            $comment->order_id = $request->order_id;
            $comment->comment = $request->comment;

            $comment->save();
        } else {
            $comment = new Comment;
            $comment->user_id = $request->user_id;
            $comment->order_id = $request->order_id;
            $comment->comment = $request->comment;

            $comment->save();
        }

      

        return 1;
    }


    public function drivers()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['drivers'] = \DB::table('drivers')
                                  ->join('user_profiles', 'drivers.profile_id', '=', 'user_profiles.id')
                                  ->where('drivers.company_id', '=', Auth::user()->id)
                                  ->groupBy('drivers.profile_id')
                                  ->get();

        // return $this->data['drivers'];
        return view('frontend.dashboard.drivers', $this->data);
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

    public function company_order_dates(Request $request)
    {
        $draft = $request->newValue;
        $type  = $request->type;
        $order_dates = OrderDates::where('order_id', $request->order_id)->first();
        if ($type == 'load_up') {
            $new = $draft;
        } else {
            $date  = explode('GMT+0200', $draft, 2);
            $date  = new \DateTime($date[0], new \DateTimeZone('Europe/Berlin'));
            $new   = $date->format('Y-m-d H:i');
        }
        
        if ($new > Carbon::parse($order_dates->delivery_until)->format('Y-m-d H:i')) {
            return Response::json([
            'errors' => ["Wrong Date \n Date isn't suitable for order dates"]
          ]);
        } else {
            if ($type == 'start') {
                if ($new < Carbon::parse($order_dates->load_from)->format('Y-m-d H:i')) {
                    return Response::json([
                'errors' => ["Wrong Date \n Date isn't suitable for order dates"]
              ]);
                } else {
                    $company_dates = CompanyOrderDates::where('order_id', $request->order_id)->where('user_id', Auth::user()->id)->first();

                    if (!empty($company_dates)) {
                        $company_dates->$type = $new;
                        $company_dates->save();
                    } else {
                        $company_order_dates = CompanyOrderDates::create([
                    'order_id'  => $request->order_id,
                    'user_id' => Auth::user()->id,
                ]);
                        $company_order_dates->$type = $new ;
                        $company_order_dates->save();
                    }
                    return 1;
                }
            } else {
                $company_dates = CompanyOrderDates::where('order_id', $request->order_id)->where('user_id', Auth::user()->id)->first();

                if (!empty($company_dates)) {
                    $company_dates->$type = $new;
                    $company_dates->save();
                } else {
                    $company_order_dates = CompanyOrderDates::create([
                  'order_id'  => $request->order_id,
                  'user_id' => Auth::user()->id,
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
        $company_order_vec = CompanyOrderVehicles::where('order_id', $request->order_id)->where('user_id', Auth::user()->id)->first();
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
          'user_id'  => Auth::user()->id,
        ]);
        }

        return 1;
    }

    public function edit_steps(Request $request)
    {
        $now = Carbon::now();
        $now = Carbon::parse($now)->format('Y-m-d H:i:s');

        $order_id = $request->id;
        $type = $request->type;
        if ($type == 'take_money') {
            $order = Order::find($order_id);
            $order->paid = $order->cost;
            $order->save();
        }
        $relation = CompanyOrderVehicles::where('order_id', $order_id)->where('user_id', Auth::user()->id)->first();

        $relation->$type = $now;
        $relation->save();

        return 1;
    }


    public function new_order(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        return view('frontend.dashboard.new-order', $this->data);
    }
}
