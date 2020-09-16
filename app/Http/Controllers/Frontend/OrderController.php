<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use DB;
use App\Mail\MailSender;

use Hochstrasser\Wirecard\Context;
use Hochstrasser\Wirecard\Helper\WirecardHelper;
use Hochstrasser\Wirecard\Model\Common\PaymentType;
use Hochstrasser\Wirecard\Request\Seamless\Frontend\InitPaymentRequest;
use Hochstrasser\Wirecard\Model\Common\Basket;
use Hochstrasser\Wirecard\Model\Common\BasketItem;
use Hochstrasser\Wirecard\Model\Common\ShippingInformation;
use Hochstrasser\Wirecard\Model\Common\BillingInformation;
use Hochstrasser\Wirecard\Request\CheckoutPage\InitCheckoutPageRequest;
use Hochstrasser\Wirecard\Request\Seamless\Frontend\InitDataStorageRequest;
use GuzzleHttp\Client;
use Hochstrasser\Wirecard\Request\Seamless\Frontend\ReadDataStorageRequest;

use App\Models\Frontend\Order;
use App\Models\Frontend\User;
use App\Models\Backend\Role;
use App\Models\Backend\ShippingSpec;
use App\Models\Frontend\Senders;
use App\Models\Frontend\Receivers;
use App\Models\Frontend\OrderOtherBilling;
use App\Models\Frontend\Offer;
use App\Models\Backend\Emails;
use App\Models\Frontend\OrderSendReceive;
use App\Models\Frontend\CompanyOrderVehicles;
use App\Models\Frontend\Userroles;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Profile;
use App\Models\Frontend\OrderDates;
use App\Models\Backend\Shipping;
use App\Models\Backend\ShippingCost;
use App\Models\Backend\Admin;
use App\Models\Backend\ShippingDistance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use Redirect;
use PDF;
use App;
use Session;
use App\Http\Controllers\Backend\OrderHistoryController;
use Helper;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createUser($email)
    {
        $user = User::where('email', $email)->first();
        $sender = Senders::where('email', $email)->first();

        if (!isset($user)) {
            $newUser = User::create([
                'email' => $email,
                'password' => bcrypt('user123456'),
                'name'=> $sender->first_name.' '.$sender->nick_name

            ]);
            $id = $newUser->id;
            $expireDate = Carbon::today()->addWeeks(1)->toDateString();


            $charset = "0123456789";
            $base = strlen($charset);
            $result = '';

            $now = explode(' ', microtime())[1];
            while ($now >= $base) {
                $i = $now % $base;
                $result = $charset[$i] . $result;
                $now /= $base;
            }
            $code = substr($result, -5);

            $role = Role::where('name', 'user')->first();
            Userroles::create([
                'role_id'=> $role->id,
                'user_id'=> $id
            ]);
            Profile::create([
                'user_id' => $id,
                'first_name' => $sender->first_name,
                'last_name' => $sender->nick_name,
                'company' => $sender->company,
                'phone' => $sender->phone,
                'address' => $sender->street.' '.$sender->home,
                'district' => $sender->town,
                'postal_code' => $sender->postal_code,
                'country' => $sender->country,
                'status' => 'User',
                'user_status_id' => 1,  // active
                'expire_date' => $expireDate,
                'pin' => $code,
            ]);

            Userlinks::create(['user_id' => $id]);
            Userbanks::create(['user_id' => $id]);
        }
    }
    
    public function setSession(Request $request)
    {
        return Session::put('payment_type', $request->payment_type);
    }

    public function succ($id)
    {
        $order_id = Crypt::decrypt($id);
        $order = Order::find($order_id);
        $order->is_active = 1;
        $order->save();

        if ($order->payment_type != 'bar') {
            $order = Order::find($order_id);
            $order->paid = $order->cost;
            $order->save();
            
            $now = Carbon::now();
            $now = Carbon::parse($now)->format('Y-m-d H:i:s');

            $relation = CompanyOrderVehicles::where('order_id', $order_id)->first();
            $relation->take_money = $now;
            $relation->save();
        }
        
        $sender = Senders::where('order_id', $order_id)->first();
        $email = $sender->email;
        $this->createUser($email);
        $user = User::where('email', $email)->first();
        Session::flash('message', "Success \n Payment Done Successfully \n Invoice was Sent To your Mail");
        return redirect()->route("forceLogin", ['user'=>$user]);
    }

    public function lastSteps($id)
    {
        $order_id = Crypt::decrypt($id);
        $order = Order::where('id', $order_id)->first();
        if ($order->offers()->count()==0) {
            OrderHistoryController::store($order, 'lookingForOvers');
            $this->sendAdminEmail($order, trans('frontend/order.emailStoreFour'));
        }
        $ship_id = $order->ship_id;

        

        $context = new Context([
            'customer_id' => 'D258413',//'D200001',
            'secret' => '6J93UTYQ7D76K4PKBH3FZMYTV9ZJ35D7NM8GE76MKBR5EDPQWR6WB4Q7CQQD',//'B8AKTPWBRMNBV455FG6M2DANE99WU2',
            'language' => 'de',
        ]);


        $request = InitCheckoutPageRequest::with()
                ->setPaymentType(PaymentType::Select)
                ->setContext($context)
                ->setAmount($order->cost)
                ->setCurrency('EUR')
                ->setOrderDescription(trans('frontend/order.invoice').' #'.$order_id)
                ->setSuccessUrl(route('succ', ['id'=>$id]))
                ->setFailureUrl(route('error404'))
                ->setCancelUrl(route('error404'))
                ->setServiceUrl(route('service'));

        

        $this->data['request'] = $request;

        $dates = OrderDates::where('order_id', '=', $order_id)->first();
        $valid_until = $dates->valid_until;

        $now_date = Carbon::now();
        $now = Carbon::parse($now_date)->format('Y-m-d H:i:s');

        $offers = Offer::where('order_id', $order_id)->where('is_accepted', 1)->first();

        if ($now > $valid_until || $order->is_active == 1 || (isset($offers) && $order->is_active)) {
            abort(404);
        } else {
            $this->data['order'] = $order;
            $dtF = $order->duration + 360;
            $load_up = $dates->load_up;
            $duration = '';

            if ($dtF >= 3600) {
                $hrs = floor($dtF / 3600);
                $secs = $dtF % 3600 ;
                if ($secs >= 60) {
                    $mins = ceil($secs / 60);
                } else {
                    $mins = 1;
                }
                $duration = $hrs .' '. trans('frontend/order.hours') . ' ' . $mins . ' '.trans('frontend/order.minutes');
            } else {
                $mins = floor($dtF / 60);
                $secs = $dtF % 60 ;
                if ($secs >= 30) {
                    $mins = $mins + 1;
                }
                $duration = $mins .' '.trans('frontend/order.minutes');
            }
            $order_time = $duration;

            $this->data['order_time'] = $order_time;
            $this->data['offers'] = Offer::where('order_id', $order_id)->orderBy('total', 'ASC')->take(5)->get();
            $dates = OrderDates::where('order_id', $order_id)->first();
            $this->data['dates'] = $dates;
            $sender = Senders::where('order_id', $order_id)->first();
            $this->data['sender'] = $sender;
            $this->data['receiver'] = Receivers::where('order_id', $order_id)->first();
            $this->data['ship'] = Shipping::where('id', $ship_id)->first();
            $this->data['encrypted']=$id;
            $this->data['order_id']=$order_id;

            $email = $sender->email;

            $user = User::where('email', $email)->first();

            if (isset($user)) {
                $prof = Profile::where('user_id', $user->id)->first();
                if (isset($prof) && $user->profile->status == 'User') {
                    Auth::login($user);
                    $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
                    return redirect()->route('user2.uncompleted', ['id'=>$id]);
                }else{
                    return view('frontend.order.uncompleted.uncompleted', $this->data);
                }
            } else {
                return view('frontend.order.uncompleted.uncompleted', $this->data);
            }
        }
    }

    public function checkStatus(Order $order)
    {
        return $order;
    }
    public function index(Request $request)
    {
        // return request()->all();
        $data=$request->all();
        $duration = '';
        $hrs = '';
        $mins = '';
        $secs = '';
        $dtF = $request->duration;

        if ($dtF >= 3600) {
            $hrs = floor($dtF / 3600);
            $secs = $dtF % 3600 ;
            if ($secs >= 60) {
                $mins = ceil($secs / 60);
            } else {
                $mins = 1;
            }
            $duration = $hrs .' '. trans('frontend/order.hours') . ' ' . $mins . ' '.trans('frontend/order.minutes');
        } else {
            $mins = floor($dtF / 60);
            $secs = $dtF % 60 ;
            if ($secs >= 30) {
                $mins = $mins + 1;
            }
            $duration = $mins .' '.trans('frontend/order.minutes');
        }
        
        $profs = Profile::where('status', 'Company')->get();
        /*foreach ($profs as $key => $value) {
            # code...
        }*/

        $this->data['from'] = $request->from;
        $this->data['to'] = $request->to;
        $this->data['distance'] = $request->distance;
        $this->data['duration'] = $duration;
        $this->data['duration2'] = $dtF;
        $this->data['from_lat']=$request->from_lat;
        $this->data['from_lng']=$request->from_lng;
        $this->data['to_lat']=$request->to_lat;
        $this->data['to_lng']=$request->to_lng;
        $this->data['companies'] = Profile::where('status', 'Company')->get();


        return view('frontend.order.order', $this->data);
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'weight'=>'required',
            'items'=>'required',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'distance'=> 'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        
        //dd($ship_distance['id']);

        if ($request->ajax()) {
            $ship_distance = ShippingDistance::where('is_active', 1)
                                        ->where('min', '<=', round($request->distance/1000))
                                        ->where('max', '>=', round($request->distance/1000))
                                        ->first();
                                        
            $data = DB::table('shippings')->join('shippings_cost', 'shippings.id', '=', 'shippings_cost.type_id')
                                ->where('shippings.is_active', '=', '1')
                                ->where('shippings_cost.distance_id', '=', $ship_distance['id'])
                                ->where(function ($query) use ($request) {
                                    $query->where([
                                        ['shippings.pay_load_max','>=',floatval($request->weight)],
                                        ['shippings.length','>=',floatval($request->length * 10)],
                                        ['shippings.width','>=',floatval($request->width * 10)],
                                        ['shippings.height','>=',floatval($request->height * 10)],
                                    ]);
                                })->get();

            $data = $data->sortBy('pay_load_max')->first();

            $ship_id = $data->type_id;

            $dtF = $request->duration;
            $mins = floor($dtF / 60);
            $secs = $dtF % 60 ;
            if ($secs >= 30) {
                $mins = $mins + 1;
            }

            $ship = ShippingSpec::where('ship_id', $ship_id)->first();
            $cost_per_unit = 0;
            $cost_per_person = 0;

            if (isset($ship)) {
                if ($request->time > $ship->min_load_time && $request->time <= $ship->max_load_time) {
                    $load_time = $request->time - $ship->min_load_time ;

                    if ($request->person == 1) {
                        $cost_per_unit = round($load_time * $ship->cost_per_unit, 2) ;
                    } elseif ($request->person == 2) {
                        $cost_per_unit = round($load_time * $ship->cost_per_unit, 2);

                        $cost_per_person = round(($load_time + $mins) * $ship->cost_per_person, 2);
                    } else {
                        $cost_per_unit = round($load_time * $ship->cost_per_unit, 2) ;
                        $person = $request->person - 1 ;
                        $cost_per_person = round($person * ($load_time + $mins) * $ship->cost_per_person, 2);
                    }
                }
            }

            $distance = round($request->distance/1000);
            $this->data['distance'] = $distance;
            $cost = '';

            if ($data->cost_per_kilo * $distance > $data->min_cost) {
                $cost = round($data->cost_per_kilo * $distance, 2);
            } elseif ($data->cost_per_kilo * $distance < $data->min_cost) {
                $cost = round($data->min_cost, 2);
            }

            $this->data['cost'] = Helper::convNum(round(($cost  + $cost_per_unit + $cost_per_person), 2));
            $this->data['data']= $data;

            return view('frontend.order.Ajax.order', $this->data)->render();
        }
    }


    public function min_max(Request $request)
    {
        $distance = round($request->distance/1000);
        $min1 = '';
        $min2 = '';
        $max1 = '';
        $max2 = '';

        $final_max ='';
        $final_min ='';
        $ship_distance = ShippingDistance::where('is_active', 1)
                                        ->where('min', '<=', round($distance))
                                        ->where('max', '>=', round($distance))
                                        ->first();
        $min_kilo = ShippingCost::where('is_active', 1)->where('distance_id', $ship_distance->id)->where('cost_per_kilo', '>=', 0)->orderBy('cost_per_kilo', 'ASC')->first();

        $max_kilo = ShippingCost::where('is_active', 1)->where('distance_id', $ship_distance->id)->where('cost_per_kilo', '>=', 0)->orderBy('cost_per_kilo', 'DESC')->first();



        $min_cost = ShippingCost::where('is_active', 1)->where('distance_id', $ship_distance->id)->where('min_cost', '>=', 0)->orderBy('min_cost', 'ASC')->first();

        $max_cost = ShippingCost::where('is_active', 1)->where('distance_id', $ship_distance->id)->where('min_cost', '>=', 0)->orderBy('min_cost', 'DESC')->first();

        if ($min_kilo->cost_per_kilo * $distance > $min_kilo->min_cost) {
            $min1 = $min_kilo->cost_per_kilo * $distance;
        } elseif ($min_kilo->cost_per_kilo * $distance < $min_kilo->min_cost) {
            $min1 = $min_kilo->min_cost;
        }

        if ($min_cost->cost_per_kilo * $distance > $min_cost->min_cost) {
            $min2 = $min_cost->cost_per_kilo * $distance;
        } elseif ($min_cost->cost_per_kilo * $distance < $min_cost->min_cost) {
            $min2 = $min_cost->min_cost;
        }

        if ($max_kilo->cost_per_kilo * $distance > $max_kilo->min_cost) {
            $max1 = $max_kilo->cost_per_kilo * $distance;
        } elseif ($max_kilo->cost_per_kilo * $distance < $max_kilo->min_cost) {
            $max1 = $max_kilo->min_cost;
        }

        if ($max_cost->cost_per_kilo * $distance > $max_cost->min_cost) {
            $max2 = $max_cost->cost_per_kilo * $distance;
        } elseif ($max_cost->cost_per_kilo * $distance < $max_cost->min_cost) {
            $max2 = $max_cost->min_cost;
        }


        if ($min1 >= $min2) {
            $final_min = $min2;
        } else {
            $final_min = $min1;
        }

        if ($max1 >= $max2) {
            $final_max = $max1;
        } else {
            $final_max = $max2;
        }

        $data = [Helper::convNum(round($final_min, 2)),Helper::convNum(round($final_max, 2))];

        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function uncompleted($id)
    {
        // return 'ahmed';
        $order_id = Crypt::decrypt($id);
        $order = Order::where('id', $order_id)->first();
        // return $order;
        $ship_id = $order->ship_id;
        $dates = OrderDates::where('order_id', '=', $order_id)->first();
        $valid_until = $dates->valid_until;

        $now_date = Carbon::now();
        $now = Carbon::parse($now_date)->format('Y-m-d H:i:s');

        $offers = Offer::where('order_id', $order_id)->where('is_accepted', 1)->first();

        if ($now > $valid_until || $order->is_active == 1 || (isset($offers) && $order->is_active)) {
            abort(404);
        } else {
            $offers = Offer::where('order_id', $order_id)->orderBy('total', 'ASC')->take(5)->get();
            $order_dates = OrderDates::where('order_id', $order_id)->first();
            $sender = Senders::where('order_id', $order_id)->first();
            $receiver = Receivers::where('order_id', $order_id)->first();
            $shipping = Shipping::where('id', $ship_id)->first();
            $this->data['dates']=$order_dates;
            $this->data['order']=$order;
            $this->data['sender']=$sender;
            $this->data['receiver']=$receiver;
            $this->data['offers']=$offers;
            $this->data['ship']=$shipping;
            $this->data['ship_id']=$ship_id;
            $this->data['encrypted']=$id;
            $this->data['order_id']=$order_id;

            $email = $sender->email;

            $user = User::where('email', $email)->first();

            if (isset($user)) {
                $prof = Profile::where('user_id', $user->id)->first();
                if (isset($prof) && $user->profile->status == 'User') {
                    Auth::login($user);
                    $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
                    return redirect()->route('user2.uncompleted', ['id'=>$id]);
                }
            } else {
                return view('frontend.order.uncompleted', $this->data);
            }
        }
    }

    

    public function sendEmail($order_id, $email, $name)
    {
        $RegisterEmail = Emails::where('title', '=', 'Un-completed Order')->first();

        
        $data = [
            'name' => $name,
            'order_num'=> $order_id,
            'complete_url'=> url('/draft', Crypt::encrypt(['id'=>$order_id])),
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'title'    => $RegisterEmail->title,
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'order_id'    => $order_id,
            'encrypted'    => Crypt::encrypt($order_id),
        ];
        \Mail::send(
            'frontend.emails.mail',
            ['data' => $data],
            function ($message) use ($data) {
                $message
                    ->from($data['no-reply'], $data['name'])
                    ->to($data['email'])->subject($data['subject']);
            }
        );

        return 1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'weight'=>'required',
            'items'=>'required',
            'length'=>'required',
            'width'=>'required',
            'height'=>'required',
            'cost'=>'required',
            'source'=>'required',
            'destination'=>'required',
            'distance'=> 'required',
            'ship_id'=> 'required',
            'description'=>'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ], 403);
        }



        $ship = Shipping::where('id', '=', $request->ship_id)->first();
        $discount = round($request->cost * $ship->discount/100, 2);
        $after = $request->cost-$discount;
        $vat = round($after * 19/100, 2);
        $total = round($after + $vat, 2);

        $order = new Order;
        $order->weight = $request->weight;
        $order->items = $request->items;
        $order->length = $request->length;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->cost = $request->cost;
        $order->min = $total;
        $order->source = $request->source;
        $order->destination = $request->destination;
        $order->distance = $request->distance/1000;
        $order->description = $request->description;
        $order->ship_id = $request->ship_id;
        $order->duration = $request->duration;
        $order->person = $request->person;
        $order->test = $request->test;
        $order->time = $request->time;
        $order->is_active=0;
        $order->source_location = $request->source_location;
        $order->destination_location = $request->destination_location;
        $order->save();


        $data = [$order->id , Crypt::encrypt($order->id)];
        OrderHistoryController::store($order, 'created');
        // broadcast(new \App\Events\orderProgress($order));
        $this->sendAdminEmail($order, trans('frontend/order.emailStore'));
        return $data;
    }
    public function sendAdminEmail(Order $order, $description='')
    {
        $RegisterEmail = Emails::where('title', '=', 'AdminStatusEmail')->first();

        
        $data = [
            'orderStatus'=>$order->status,
            'orderId'=>$order->id,
            'description'=>$description
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);
        \Mail::to(['corbeigt@hotmail.com'], 'Kurier Link Admin')
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
        return 1;
    }
    public function storeTwo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country1'=>'required',
            'postal_code1'=>'required',
            'street1'=>'required',
            'home1'=>'required',
            'gender1'=>'required',
            'nickname1'=>'required',
            'firstname1'=>'required',
            'phone1'=> 'required|numeric|phone_number',
            'email1'=> 'required|email',
            'town1'=> 'required',

            'country2'=>'required',
            'postal_code2'=>'required',
            'street2'=>'required',
            'home2'=>'required',
            'gender2'=>'required',
            'nickname2'=>'required',
            'firstname2'=>'required',
            'phone2'=> 'required|numeric|phone_number',
            //'email2'=> 'required|email',
            'town2'=> 'required',

            'order_id'=> 'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        
        $sender = Senders::where('order_id', $request->order_id)->first();
        $sender_id = '';
        if (!isset($sender)) {
            $sender = new Senders;
            $sender->country = $request->country1;
            $sender->postal_code = $request->postal_code1;
            $sender->street = $request->street1;
            $sender->home = $request->home1;
            $sender->gender = $request->gender1;
            $sender->nick_name = $request->nickname1;
            $sender->first_name = $request->firstname1;
            $sender->company = $request->company1;
            $sender->phone = $request->phone1;
            $sender->email = $request->email1;
            $sender->town = $request->town1;
            $sender->order_id = $request->order_id;
            $sender->save();
            $sender_id = $sender->id;
        } else {
            Senders::where('order_id', $request->order_id)->update([

                'country'=>$request->country1,
                'postal_code'=>$request->postal_code1,
                'street'=>$request->street1,
                'home'=>$request->home1,
                'gender'=>$request->gender1,
                'nick_name'=>$request->nickname1,
                'first_name'=>$request->firstname1,
                'company'=>$request->company1,
                'phone'=>$request->phone1,
                'email'=>$request->email1,
                'town'=>$request->town1,
                'order_id'=>$request->order_id
            ]);
            $item = Senders::where('order_id', $request->order_id)->first();
            $sender_id = $item['id'];
        }
       

        $receiver = Receivers::where('order_id', $request->order_id)->first();
        $receiver_id = '';
        if (!isset($receiver)) {
            $receiver = new Receivers;
            $receiver->country = $request->country2;
            $receiver->postal_code = $request->postal_code2;
            $receiver->street = $request->street2;
            $receiver->home = $request->home2;
            $receiver->gender = $request->gender2;
            $receiver->nick_name = $request->nickname2;
            $receiver->first_name = $request->firstname2;
            $receiver->company = $request->company2;
            $receiver->phone = $request->phone2;
            $receiver->email = $request->email2;
            $receiver->town = $request->town2;
            $receiver->order_id = $request->order_id;
            $receiver->save();
            $receiver_id = $receiver->id;
        } else {
            Receivers::where('order_id', $request->order_id)->update([

                'country'=>$request->country2,
                'postal_code'=>$request->postal_code2,
                'street'=>$request->street2,
                'home'=>$request->home2,
                'gender'=>$request->gender2,
                'nick_name'=>$request->nickname2,
                'first_name'=>$request->firstname2,
                'company'=>$request->company2,
                'phone'=>$request->phone2,
                'email'=>$request->email2,
                'town'=>$request->town2,
                'order_id'=>$request->order_id
            ]);
            $item = Receivers::where('order_id', $request->order_id)->first();
            $receiver_id = $item['id'];
        }

        $one = Order::find($request->order_id);
        $this->updateOrderCoordinates($one);
        $one->bill_to = $request->bill_to;
        $one->save();

        $order = OrderSendReceive::firstOrNew(array('order_id' => $request->order_id));

        $order->order_id = $request->order_id;
        $order->sender_id = $sender_id;
        $order->receiver_id = $receiver_id;
        $order->other_billing_id = 0;
        $order->save();
        OrderHistoryController::store($one, 'senderReceiverInformation');
        $this->sendAdminEmail($one, trans('frontend/order.emailStoreTwo'));
        return 1;
    }
    public function updateOrderCoordinates(Order $order)
    {
        $senderAddress = $order->sender()->getSenderAddress();
        $receiverAddress = $order->receiver()->getReceiverAddress();
        $newSource =  app('geocoder')->geocode($senderAddress)->get()->first()->getCoordinates();
        $newSourceLocation  = $newSource->getLatitude().','.$newSource->getLongitude();
        $newDestination =  app('geocoder')->geocode($receiverAddress)->get()->first()->getCoordinates();
        $newDestinationLocation  = $newDestination->getLatitude().','.$newDestination->getLongitude();
        $order->source_location = $newSourceLocation;
        $order->destination_location = $newDestinationLocation;
    }
    public function storeThree(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country1'=>'required',
            'postal_code1'=>'required',
            'street1'=>'required',
            'home1'=>'required',
            'gender1'=>'required',
            'nickname1'=>'required',
            'firstname1'=>'required',
            'phone1'=> 'required|numeric|phone_number',
            'email1'=> 'required|email',
            'town1'=> 'required',

            'country2'=>'required',
            'postal_code2'=>'required',
            'street2'=>'required',
            'home2'=>'required',
            'gender2'=>'required',
            'nickname2'=>'required',
            'firstname2'=>'required',
            'phone2'=> 'required|numeric|phone_number',
            //'email2'=> 'required|email',
            'town2'=> 'required',

            'country3'=>'required',
            'postal_code3'=>'required',
            'street3'=>'required',
            'home3'=>'required',
            'gender3'=>'required',
            'nickname3'=>'required',
            'firstname3'=>'required',
            'phone3'=> 'required|numeric|phone_number',
            //'email3'=> 'required|email',
            'town3'=> 'required',

            'order_id'=> 'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $sender = Senders::where('order_id', $request->order_id)->first();
        $sender_id = '';
        if (!isset($sender)) {
            $sender = new Senders;
            $sender->country = $request->country1;
            $sender->postal_code = $request->postal_code1;
            $sender->street = $request->street1;
            $sender->home = $request->home1;
            $sender->gender = $request->gender1;
            $sender->nick_name = $request->nickname1;
            $sender->first_name = $request->firstname1;
            $sender->company = $request->company1;
            $sender->phone = $request->phone1;
            $sender->email = $request->email1;
            $sender->town = $request->town1;
            $sender->order_id = $request->order_id;
            $sender->save();
            $sender_id = $sender->id;
        } else {
            Senders::where('order_id', $request->order_id)->update([

                'country'=>$request->country1,
                'postal_code'=>$request->postal_code1,
                'street'=>$request->street1,
                'home'=>$request->home1,
                'gender'=>$request->gender1,
                'nick_name'=>$request->nickname1,
                'first_name'=>$request->firstname1,
                'company'=>$request->company1,
                'phone'=>$request->phone1,
                'email'=>$request->email1,
                'town'=>$request->town1,
                'order_id'=>$request->order_id
            ]);
            $item = Senders::where('order_id', $request->order_id)->first();
            $sender_id = $item['id'];
        }
       

        $receiver = Receivers::where('order_id', $request->order_id)->first();
        $receiver_id = '';
        if (!isset($receiver)) {
            $receiver = new Receivers;
            $receiver->country = $request->country2;
            $receiver->postal_code = $request->postal_code2;
            $receiver->street = $request->street2;
            $receiver->home = $request->home2;
            $receiver->gender = $request->gender2;
            $receiver->nick_name = $request->nickname2;
            $receiver->first_name = $request->firstname2;
            $receiver->company = $request->company2;
            $receiver->phone = $request->phone2;
            $receiver->email = $request->email2;
            $receiver->town = $request->town2;
            $receiver->order_id = $request->order_id;
            $receiver->save();
            $receiver_id = $receiver->id;
        } else {
            Receivers::where('order_id', $request->order_id)->update([

                'country'=>$request->country2,
                'postal_code'=>$request->postal_code2,
                'street'=>$request->street2,
                'home'=>$request->home2,
                'gender'=>$request->gender2,
                'nick_name'=>$request->nickname2,
                'first_name'=>$request->firstname2,
                'company'=>$request->company2,
                'phone'=>$request->phone2,
                'email'=>$request->email2,
                'town'=>$request->town2,
                'order_id'=>$request->order_id
            ]);
            $item = Receivers::where('order_id', $request->order_id)->first();
            $receiver_id = $item['id'];
        }


        $other_billing = OrderOtherBilling::where('order_id', $request->order_id)->first();
        $other_billing_id = '';
        if (!isset($other_billing)) {
            $other_billing = new OrderOtherBilling;
            $other_billing->country = $request->country3;
            $other_billing->postal_code = $request->postal_code3;
            $other_billing->street = $request->street3;
            $other_billing->home = $request->home3;
            $other_billing->gender = $request->gender3;
            $other_billing->nick_name = $request->nickname3;
            $other_billing->first_name = $request->firstname3;
            $other_billing->company = $request->company3;
            $other_billing->phone = $request->phone3;
            $other_billing->email = $request->email3;
            $other_billing->town = $request->town3;
            $other_billing->order_id = $request->order_id;
            $other_billing->save();
            $other_billing_id = $other_billing->id;
        } else {
            OrderOtherBilling::where('order_id', $request->order_id)->update([

                'country'=>$request->country3,
                'postal_code'=>$request->postal_code3,
                'street'=>$request->street3,
                'home'=>$request->home3,
                'gender'=>$request->gender3,
                'nick_name'=>$request->nickname3,
                'first_name'=>$request->firstname3,
                'company'=>$request->company3,
                'phone'=>$request->phone3,
                'email'=>$request->email3,
                'town'=>$request->town3,
                'order_id'=>$request->order_id
            ]);
            $item = OrderOtherBilling::where('order_id', $request->order_id)->first();
            $other_billing_id = $item['id'];
        }
        
        $one = Order::find($request->order_id);
        $one->bill_to = $request->bill_to;
        $one->save();


        $order = OrderSendReceive::firstOrNew(array('order_id' => $request->order_id));
        ;

        $order->order_id = $request->order_id;
        $order->sender_id = $sender_id;
        $order->receiver_id = $receiver_id;
        $order->other_billing_id = $other_billing_id;
        $order->save();
        OrderHistoryController::store($one, 'senderReceiverInformation');
        $this->sendAdminEmail($one, trans('frontend/order.emailStoreTwo'));
        return 1;
    }


    public function storeDates(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'load_from'=>'required',
            'load_up'=>'required',
            'delivery_from'=>'required',
            'delivery_until'=>'required',
            'valid_until'=> 'required',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $valid_until = '';
        if ($request->valid_until == 1) {
            $date = Carbon::now()->addHours(1);
            $valid_until = Carbon::parse($date)->format('Y-m-d H:i:s');
        } elseif ($request->valid_until == 15) {
            $date = Carbon::now()->addSeconds(900);
            $valid_until = Carbon::parse($date)->format('Y-m-d H:i:s');
        } elseif ($request->valid_until == 30) {
            $date = Carbon::now()->addSeconds(1800);
            $valid_until = Carbon::parse($date)->format('Y-m-d H:i:s');
        } elseif ($request->valid_until == 12) {
            $date = Carbon::now()->addHours(12);
            $valid_until = Carbon::parse($date)->format('Y-m-d H:i:s');
        } elseif ($request->valid_until == 24) {
            $date = Carbon::now()->addHours(24);
            $valid_until = Carbon::parse($date)->format('Y-m-d H:i:s');
        }
        $sender = Senders::where('order_id', $request->order_id)->first();

        $this->sendEmail($request->order_id, $sender->email, $sender->first_name);

        $order = OrderDates::where('order_id', $request->order_id)->first();
        if (!isset($order)) {
            $order = new OrderDates;
            $order->order_id = $request->order_id;
            $order->load_from = Carbon::parse($request->load_from)->format('Y-m-d H:i:s');
            $order->load_up = Carbon::parse($request->load_up)->format('Y-m-d H:i:s');
            $order->delivery_from = Carbon::parse($request->delivery_from)->format('Y-m-d H:i:s');
            $order->delivery_until = Carbon::parse($request->delivery_until)->format('Y-m-d H:i:s');
            $order->valid_until = $valid_until;
            $order->save();
        } else {
            OrderDates::where('order_id', $request->order_id)->update([

                'load_from'=>Carbon::parse($request->load_from)->format('Y-m-d H:i:s'),
                'load_up'=>Carbon::parse($request->load_up)->format('Y-m-d H:i:s'),
                'delivery_from'=>Carbon::parse($request->delivery_from)->format('Y-m-d H:i:s'),
                'delivery_until'=>Carbon::parse($request->delivery_until)->format('Y-m-d H:i:s'),
                'valid_until'=> $valid_until,
                'order_id'=>$request->order_id
            ]);
        }

        $one = Order::find($request->order_id);
        $this->sendAdminEmail($one, trans('frontend/order.emailStoreThree'));
        OrderHistoryController::store($one, 'datingStore');

        $profile_ids = $request->company_ids;

       
        $profiles = Profile::whereIn('id', $profile_ids)->get();
        

        $RegisterEmail = Emails::where('title', '=', '50km_near_company')->first();
        foreach ($profiles as $key => $value) {
            $user = User::find($value->user_id);
            $data = [
                'fristname' => $value->first_name,
                'from' => $one->source,
                'to' => $one->destination,
                'width' => $one->width.' Kg',
                'distnace' => round($one->distance).' Km',
                'length' => $one->length.'~Idm',
                'postal_city' => $value->postal_code.' '.$value->district,
                'status' => $value->status,
            ];
            $GeneratedEmail = $RegisterEmail->parse($data);
            $email = $user->email;
            $data = [
                'no-reply' => 'admin@kurier-link.com',
                'name'     => 'Kurier link click to transport',
                'subject'    => $GeneratedEmail[0],
                'content'    => $GeneratedEmail[1],
                'email'    => $email,
                'link' => route(Helper::type($value->status).'.orders'),
                'url' => '',
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
        }
        



        return 1;
    }

    public function getInfo(Request $request)
    {
        if ($request->ajax()) {
            $order_id = $request->order_id;
            $order = Order::find($order_id);
            $ship_id = $order['ship_id'];
            $order_dates = OrderDates::where('order_id', $order_id)->first();
            $sender = Senders::where('order_id', $order_id)->first();
            $receiver = Receivers::where('order_id', $order_id)->first();
            $shipping = Shipping::where('id', $ship_id)->first();
            $this->data['dates']=$order_dates;
            $this->data['order']=$order;
            $this->data['sender']=$sender;
            $this->data['receiver']=$receiver;
            $this->data['ship']=$shipping;
            $this->data['encrypted'] = Crypt::encrypt($order_id);
            
            return view('frontend.order.Ajax.step_four', $this->data)->render();
        }
    }

    public function terms()
    {
        return view('frontend.terms');
    }


    


    public function invoice(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $user_id = Offer::where('order_id', $id)->first();
        $company = Profile::where('user_id', $user_id->user_id)->first();
        $order = Order::where('id', $id)->first();

        if ($order->bill_to == 'receiver') {
            $this->data['receiver'] = Receivers::where('order_id', $id)->first();
        } elseif ($order->bill_to == 'sender') {
            $this->data['receiver'] = Senders::where('order_id', $id)->first();
        } elseif ($order->bill_to == 'other') {
            $this->data['receiver'] = OrderOtherBilling::where('order_id', $id)->first();
        }

        $this->data['company'] = $company->first_name ." ". $company->last_name;
        $this->data['dates'] = OrderDates::where('order_id', $id)->first();
        $this->data['order'] = Order::where('id', $id)->first();
        $this->data['data'] = Admin::with('profile')->where('email', 'admin@admin.com')->first();
        
        $this->data['id'] = $id;
        $this->data['encrypted'] = Crypt::encrypt($id);
        return view('frontend.order.invoice', $this->data);
    }

    public function download_pdf($id)
    {
        $order_id = Crypt::decrypt($id);
        $user_id = Offer::where('order_id', $order_id)->first();
        $company = Profile::where('user_id', $user_id->user_id)->first();

        $order = Order::where('id', $order_id)->first();

        if ($order->bill_to == 'receiver') {
            $this->data['receiver'] = Receivers::where('order_id', $order_id)->first();
        } elseif ($order->bill_to == 'sender') {
            $this->data['receiver'] = Senders::where('order_id', $order_id)->first();
        } elseif ($order->bill_to == 'other') {
            $this->data['receiver'] = OrderOtherBilling::where('order_id', $order_id)->first();
        }


        $this->data['company'] = $company->first_name ." ". $company->last_name;
        $this->data['dates'] = OrderDates::where('order_id', $order_id)->first();
        $this->data['order'] = Order::where('id', $order_id)->first();
        $this->data['data'] = Admin::with('profile')->where('email', 'admin@admin.com')->first();
        
        $this->data['id'] = $order_id;
        
        $pdf = PDF::loadView('frontend.pdf.invoice', $this->data);
        return $pdf->download('Order #'.$order_id.'.pdf');
    }

    public function sendInvoice($id)
    {
        //$id = $request->id;
        $order_id = Crypt::decrypt($id);
        $sender = Senders::where('order_id', $order_id)->first();
        $email = $sender->email;
        $name = $sender->first_name.' '.$sender->nick_name;
        // $id='any';
        // $name = 'ahmed';
        // $order_id = ['id'=>'ahmed'];
        // $email = 'ahmed@yahhoo.com';
        // $template = Emails::where('title', '=', 'Invoice')->first();
        $RegisterEmail = Emails::where('title', '=', 'Invoice')->first();

        $data = [
            'name' => $name,
            'id'=> $id,
            'order_id'=> $order_id,
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);

        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'order_id'    => $id,
            'url'     => url('/order/invoice/download_pdf', $id),
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

    public function sendCode($id)
    {
        //$id = $request->id;
        $order_id = Crypt::decrypt($id);
        $offer = Offer::where('order_id', $order_id)->where('is_accepted', 1)->first();
        $user = $offer->user_id;
        $profile = Profile::where('user_id', $user)->first();
        $name = $profile->first_name.' '.$profile->last_name;
        $RegisterEmail = Emails::where('title', '=', 'ReferenceCode')->first();
        $normal = User::find($user);
        $email = $normal->email;
        $data = [
            'name' => $name,
            'id'=> $id,
            'order_id'=> $order_id,
            
        ];
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $base = strlen($charset);
        $result = '';

        $now = explode(' ', microtime())[1];
        while ($now >= $base) {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        $code = substr($result, -5);
        $GeneratedEmail = $RegisterEmail->parse($data);

        $order = Order::find($order_id);
        $order->code = $code;
        $order->save();

        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'code'    => $code,
            'order_id'    => $id,
            'url'     => url('/order/reference/download_pdf', $id),
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

    public function download_abstract($id)
    {
        $order_id = Crypt::decrypt($id);

        $this->data['order'] = Order::where('id', $order_id)->first();
        $offer = Offer::where('order_id', $order_id)->first();
        $this->data['order_dates'] = OrderDates::where('order_id', $order_id)->first();
        $this->data['company'] = Profile::where('user_id', $offer->user_id)->first();
        $this->data['user'] = User::where('id', $offer->user_id)->first();
        $this->data['offer'] = Offer::where('order_id', $order_id)->where('is_accepted', 1)->first();
    
        $this->data['data'] = Admin::with('profile')->where('email', 'admin@admin.com')->first();
        $pdf = PDF::loadView('frontend.pdf.abstract', $this->data);
        return $pdf->download('Abstract #'.$order_id.'.pdf');
    }

    public function download_code($id)
    {
        $order_id = Crypt::decrypt($id);
        $user_id = Offer::where('order_id', $order_id)->first();
        $company = Profile::where('user_id', $user_id->user_id)->first();

        $order = Order::where('id', $order_id)->first();

        if ($order->bill_to == 'receiver') {
            $this->data['receiver'] = Receivers::where('order_id', $order_id)->first();
        } elseif ($order->bill_to == 'sender') {
            $this->data['receiver'] = Senders::where('order_id', $order_id)->first();
        } elseif ($order->bill_to == 'other') {
            $this->data['receiver'] = OrderOtherBilling::where('order_id', $order_id)->first();
        }


        $this->data['company'] = $company->first_name ." ". $company->last_name;
        $this->data['dates'] = OrderDates::where('order_id', $order_id)->first();
        $this->data['order'] = Order::where('id', $order_id)->first();
        $this->data['data'] = Admin::with('profile')->where('email', 'admin@admin.com')->first();
        
        $this->data['id'] = $order_id;
        $pdf = PDF::loadView('frontend.pdf.reference', $this->data);
        return $pdf->download('Code #'.$order->code.'.pdf');
    }

    public function check_order($id)
    {
        $offer = Offer::where('order_id', $id)->where('is_accepted', 1)->first();
        if (!empty($offer)) {
            $order [] = Order::find($id);

        

            $new_order = Order::create($order);
            $new_order_id = $new_order->id;
            Order::where('id', $new_order_id)->delete();


            $old = Order::find($id);
            $old->id = $new_order_id;
            $old->save();

            $sender = Senders::where('order_id', $id)->first();
            $sender->order_id = $new_order_id;
            $sender->save();

            $receiver = Receivers::where('order_id', $id)->first();
            $receiver->order_id = $new_order_id;
            $receiver->save();

            $order_dates = OrderDates::where('order_id', $id)->first();
            $order_dates->order_id = $new_order_id;
            $order_dates->save();

            $order_send_receives = OrderSendReceive::where('order_id', $id)->first();
            $order_send_receives->order_id = $new_order_id;
            $order_send_receives->save();

            Offer::where('order_id', $id)->delete();

            $order_other_billing = OrderOtherBilling::where('order_id', $id)->first();
            if (isset($order_other_billing)) {
                $order_other_billing->order_id = $new_order_id;
                $order_other_billing->save();
            }


            /*$user = User::where('email',$sender->email)->first();

            if(isset($user)){
                $prof = Profile::where('user_id',$user->id)->first();
                if(isset($prof) && $user->profile->status == 'User'){
                    Auth::login($user);
                    $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
                    return redirect()->route('user2.uncompleted',['id'=>$order_id]);
                }
            }else{
                return redirect()->route('lastSteps',['id'=>$order_id]);
            }*/
            return $new_order_id;
        } else {
            return 1;
        }
    }

    public function getUser($value)
    {
        $routing = '';
        $order_id = Crypt::encrypt($value);
        $sender = Senders::where('order_id', $value)->first();
        $user = User::where('email', $sender->email)->first();
        if (isset($user)) {
            $prof = Profile::where('user_id', $user->id)->first();
            if (isset($prof) && $user->profile->status == 'User') {
                Auth::login($user);
                $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
                $routing = route('user2.uncompleted', ['id'=>$order_id]);
            }
        } else {
            $routing = route('lastSteps', ['id'=>$order_id]);
        }
        return $routing;
    }

    public function edit_desc(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $order = Order::find($request->order_id);
            $order->description = $request->description;
            $order->save();
            return 1;
        } else {
            $order = Order::find($value);
            $order->description = $request->description;
            $order->save();
            return $this->getUser($value);
        }
    }


    public function edit_sender_name(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $sender = Senders::where('order_id', $request->order_id)->first();
            $name = explode(' ', $request->name, 2);
            $sender->first_name = $name[0];
            $sender->nick_name = $name[1];
            $sender->save();

            return 1;
        } else {
            $sender = Senders::where('order_id', $value)->first();
            $name = explode(' ', $request->name, 2);
            $sender->first_name = $name[0];
            $sender->nick_name = $name[1];
            $sender->save();
            return $this->getUser($value);
        }
    }

    public function edit_sender_email(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $sender = Senders::where('order_id', $request->order_id)->first();
            $sender->email = $request->email;
            $sender->save();

            return 1;
        } else {
            $sender = Senders::where('order_id', $value)->first();
            $sender->email = $request->email;
            $sender->save();
            return $this->getUser($value);
        }
    }

    public function edit_sender_phone(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $sender = Senders::where('order_id', $request->order_id)->first();
            $sender->phone = $request->phone;
            $sender->save();

            return 1;
        } else {
            $sender = Senders::where('order_id', $value)->first();
            $sender->phone = $request->phone;
            $sender->save();
            return $this->getUser($value);
        }
    }

    public function edit_receiver_phone(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $receiver = Receivers::where('order_id', $request->order_id)->first();
            $receiver->phone = $request->phone;
            $receiver->save();

            return 1;
        } else {
            $receiver = Receivers::where('order_id', $value)->first();
            $receiver->phone = $request->phone;
            $receiver->save();
            return $this->getUser($value);
        }
    }


    public function edit_receiver_name(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $receiver = Receivers::where('order_id', $request->order_id)->first();
            $name = explode(' ', $request->name, 2);
            $receiver->first_name = $name[0];
            $receiver->nick_name = $name[1];
            $receiver->save();

            return 1;
        } else {
            $receiver = Receivers::where('order_id', $value)->first();
            $name = explode(' ', $request->name, 2);
            $receiver->first_name = $name[0];
            $receiver->nick_name = $name[1];
            $receiver->save();
            return $this->getUser($value);
        }
    }

    public function edit_receiver_email(Request $request)
    {
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $receiver = Receivers::where('order_id', $request->order_id)->first();
            $receiver->email = $request->email;
            $receiver->save();

            return 1;
        } else {
            $receiver = Receivers::where('order_id', $value)->first();
            $receiver->email = $request->email;
            $receiver->save();
            return $this->getUser($value);
        }
    }

    public function edit_load_from(Request $request)
    {
        $draft = $request->load_from;
        $date = explode('GMT+0200', $draft, 2);
        $date = new \DateTime($date[0], new \DateTimeZone('Europe/Berlin'));
        $new = $date->format('Y-m-d H:i');

        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $dates = OrderDates::where('order_id', $request->order_id)->first();
            $dates->load_from = $new;
            $dates->save();

            return 1;
        } else {
            $dates = OrderDates::where('order_id', $value)->first();
            $dates->load_from = $new;
            $dates->save();
            return $this->getUser($value);
        }
    }

    public function edit_load_up(Request $request)
    {
        $draft = $request->load_up;
        $date = explode('GMT+0200', $draft, 2);
        $date = new \DateTime($date[0], new \DateTimeZone('Europe/Berlin'));
        $new = $date->format('Y-m-d H:i');

        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $dates = OrderDates::where('order_id', $request->order_id)->first();
            $dates->load_up = $new;
            $dates->save();

            return 1;
        } else {
            $dates = OrderDates::where('order_id', $value)->first();
            $dates->load_up = $new;
            $dates->save();
            return $this->getUser($value);
        }
    }

    public function edit_delivery_from(Request $request)
    {
        $draft = $request->delivery_from;
        $date = explode('GMT+0200', $draft, 2);
        $date = new \DateTime($date[0], new \DateTimeZone('Europe/Berlin'));
        $new = $date->format('Y-m-d H:i');

        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $dates = OrderDates::where('order_id', $request->order_id)->first();
            $dates->delivery_from = $new;
            $dates->save();

            return 1;
        } else {
            $dates = OrderDates::where('order_id', $value)->first();
            $dates->delivery_from = $new;
            $dates->save();
            return $this->getUser($value);
        }
    }
    public function edit_delivery_until(Request $request)
    {
        $draft = $request->delivery_until;
        $date = explode('GMT+0200', $draft, 2);
        $date = new \DateTime($date[0], new \DateTimeZone('Europe/Berlin'));
        $new = $date->format('Y-m-d H:i');
        $value = $this->check_order($request->order_id);
        if ($value == 1) {
            $dates = OrderDates::where('order_id', $request->order_id)->first();
            $dates->delivery_until = $new;
            $dates->save();

            return 1;
        } else {
            $dates = OrderDates::where('order_id', $value)->first();
            $dates->delivery_until = $new;
            $dates->save();
            return $this->getUser($value);
        }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
