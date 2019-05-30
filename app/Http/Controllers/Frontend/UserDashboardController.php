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
use App\Models\Frontend\OrderDates;
use App\Models\Frontend\Vehicle;
use App\Models\Frontend\CompanyOrderVehicles;
use App\Models\Frontend\Order;
use App\Models\Frontend\Offer;
use App\Models\Frontend\Receivers;
use App\Models\Frontend\Senders;
use App\Models\Frontend\OrderOtherBilling;
use App\Models\Backend\Shipping;
use App\Models\Frontend\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use Crypt;
use Session;

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
use App\Mail\MailSender;

class UserDashboardController extends Controller
{
    public function index()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['active_orders'] =  DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->get();

        $this->data['new_orders'] = DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')->where('senders.email', '=', Auth::user()->email)
              ->orderBy('orders.id', 'DESC')
              ->take(5)
              ->get();
                             
        $this->data['orders'] = DB::table('orders')->join('senders', 'orders.id', '=', 'senders.order_id')
                                ->where('senders.email', '=', Auth::user()->email)
                                ->get();

        $this->data['spent'] = DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->sum('orders.paid');

        $orders = DB::table('orders')->join('senders', 'orders.id', '=', 'senders.order_id')
                        ->where('senders.email', '=', Auth::user()->email)
                        ->where('orders.is_active', '=', 1)
                        ->get()
                        ->groupBy(function ($date) {
                            return Carbon::parse($date->created_at)->format('m'); // grouping by months
                        });

        $offer_count = [];
        $offer_price = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        $count       = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        $price       = [0,0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($orders as $key => $value) {
            $offer_count[(int)$key] = count($value);
            foreach ($value as $one) {
                $offer_price[(int)$key] += $one->paid;
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


        return view('frontend.userDashboard.dashboard', $this->data);
    }

    public function succ($id)
    {
        $order_id = Crypt::decrypt($id);
        $order = Order::find($order_id);
        $order->is_active = 1;
        $order->payment_type = Session::get('payment_type');
        $order->save();

        if (Session::get('payment_type') != 'bar') {
            $order = Order::find($order_id);
            $order->paid = $order->cost;
            $order->save();
            
            $now = Carbon::now();
            $now = Carbon::parse($now)->format('Y-m-d H:i:s');

            $relation = CompanyOrderVehicles::where('order_id', $order_id)->first();
            $relation->take_money = $now;
            $relation->save();
        }

        Session::flash('message', "Success \n Payment Done Successfully \n Invoice was Sent To your Mail");
        return redirect()->route('user2.activeorders');
    }

    public function uncompleted($id)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $order_id = Crypt::decrypt($id);
        $order = Order::where('id', $order_id)->first();
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
                ->setSuccessUrl(route('succ2', ['id'=>$id]))
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
            $this->data['sender'] = Senders::where('order_id', $order_id)->first();
            $this->data['receiver'] = Receivers::where('order_id', $order_id)->first();
            $this->data['ship'] = Shipping::where('id', $ship_id)->first();
            $this->data['encrypted']=$id;
            $this->data['order_id']=$order_id;

            return view('frontend.userDashboard.uncompleted', $this->data);
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
                $this->data['dates'] = $dates;
                return view('frontend.order.Ajax.payment', $this->data)->render();
            }
        }
    }
    
    public function invoices(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] =  DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->get();

        if ($request->ajax()) {
            return view('frontend.userDashboard.invoices.Ajax.invoice', $this->data)->render();
        } else {
            return view('frontend.userDashboard.invoices.invoice-index', $this->data);
        }
    }

    public function invoice($id)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $order =  DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('orders.id', '=', $id)
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->first();
        if ($order) {
            $this->data['order'] = $order;
            $this->data['order_dates'] = OrderDates::where('order_id', $id)->first();
            $order = Order::where('id', $id)->first();

            if ($order->bill_to == 'receiver') {
                $this->data['receiver'] = Receivers::where('order_id', $id)->first();
            } elseif ($order->bill_to == 'sender') {
                $this->data['receiver'] = Senders::where('order_id', $id)->first();
            } elseif ($order->bill_to == 'other') {
                $this->data['receiver'] = OrderOtherBilling::where('order_id', $id)->first();
            }

            $offer = Offer::where('order_id', $id)->where('is_accepted', 1)->first();
            $this->data['user'] = Profile::where('user_id', $offer->user_id)->first();
            $this->data['encrypted'] = Crypt::encrypt($id);
            return view('frontend.userDashboard.invoices.user-invoice', $this->data)->render();
        } else {
            return redirect('error404');
        }
    }

    public function paid(Request $request)
    {
        if ($request->ajax()) {
            $this->data['data'] = \DB::table('orders')->join('offers', 'orders.id', '=', 'offers.order_id')
                                                  ->join('user_profiles', 'offers.user_id', '=', 'user_profiles.user_id')
                                                  ->where('orders.paid', '!=', 0)
                                                  ->get();
            return view('frontend.userDashboard.invoices.Ajax.invoice', $this->data)->render();
        }
    }

    public function unpaid(Request $request)
    {
        if ($request->ajax()) {
            $this->data['data'] = \DB::table('orders')->join('offers', 'orders.id', '=', 'offers.order_id')
                                                  ->join('user_profiles', 'offers.user_id', '=', 'user_profiles.user_id')
                                                  ->where('orders.paid', '=', 0)
                                                  ->get();
            return view('frontend.userDashboard.invoices.Ajax.invoice', $this->data);
        }
    }

    public function orders()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $data = DB::table('orders')->join('offers', 'offers.order_id', '=', 'orders.id')
                                          ->join('senders', 'senders.order_id', '=', 'offers.order_id')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->where('offers.is_accepted', '=', 1)
                                          ->where('orders.is_active', '=', 1)
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        $this->data['data'] = $data;
        
        
        return view('frontend.userDashboard.user-order', $this->data)->render();
    }

    public function pending()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $data = DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->where('order_dates.valid_until', '>', Carbon::now())
                                          ->where('orders.is_active', '=', '0')
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);

        $this->data['data'] = $data;
        $this->data['type'] = 'pending';
        

        return view('frontend.userDashboard.user-order', $this->data)->render();
    }

    public function cancelled()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $data = DB::table('orders')->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->where('order_dates.valid_until', '<', Carbon::now())
                                          ->where('orders.is_active', '!=', 1)
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        $this->data['data'] = $data;
        $this->data['type'] = 'cancelled';
        
        return view('frontend.userDashboard.user-order', $this->data)->render();
    }

    public function finished()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $data = DB::table('orders')->join('order_dates', 'orders.id', '=', 'order_dates.order_id')
                                          ->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->where('order_dates.valid_until', '<', Carbon::now())
                                          ->where('orders.delievered', '=', 1)
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        $this->data['data'] = $data;
        $this->data['type'] = 'finished';


        
        return view('frontend.userDashboard.user-order', $this->data)->render();
    }

    public function activeOrders()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] = DB::table('orders')->join('senders', 'senders.order_id', '=', 'orders.id')
                                          ->where('senders.email', '=', Auth::user()->email)
                                          ->where('is_active', '=', 1)
                                          ->where('orders.delievered', '=', 0)
                                          ->orderBy('orders.id', 'DESC')
                                          ->paginate(5);
        return view('frontend.userDashboard.orders', $this->data)->render();
    }
}
