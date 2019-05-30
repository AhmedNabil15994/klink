<?php

namespace App\Http\Controllers\Backend;

use App\Models\Frontend\Order;
use App\Models\Backend\Shipping;
use App\Models\Frontend\Offer;
use App\Models\Frontend\Vehicle;
use App\Models\Frontend\CompanyOrderDates;
use App\Models\Frontend\CompanyOrderVehicles;
use App\Models\Frontend\OrderDates;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Frontend\User;
use App\Models\Frontend\Senders;
use Helper;
use Carbon;

class OrdersBackend extends Controller
{
    private $categories = [
        'all'=>[
            'all'
        ],
        'aktiv'=>[
            
            'watingOrder',
            'decidingOrder',
            'acceptedOrder',
        ],
        'Exp'=>[
            'newOrder',
            'expiredOrder',
            'cancelledWithoutOffers',
            'cancelledOrder',
        ],
        'superaktiv'=>[
            'paidOrder',
            'completedOrder',
        ],
        'reklamation'=>[
            'reklamationOrder'
        ],
    ];
    private $states = [
        'all'=>[
            
            'active'=>true,
            'icon'=>false
            
            
        ],
        'newOrder'=>[
            'class'=>'label label-primary',
            'icon'=>'/images/writing.svg',
        ],
        'expiredOrder'=>[
            'class'=>'label label-success',
            'icon'=>'/images/expiredOrder.svg'
        ],
        'watingOrder'=>[
            'class'=>'label label-info',
            'icon'=>'/images/watingOrder.svg'

        ],
        'decidingOrder'=>[
            'class'=>'label label-info',
            'icon'=>'/images/robot.svg'
        ],
        'cancelledOrder'=>[
            'class'=>'label label-success',
            'icon'=>'/images/cancelledOrder.svg'
        ],
        'cancelledWithoutOffers'=>[
            'class'=>'label label-danger',
            'icon'=>'/images/cancelledOrder.svg'
        ],
        'acceptedOrder'=>[
            'class'=>'label label-warning',
            'icon'=>'/images/acceptedOrder.svg'
        ],
        'paidOrder'=>[
            'class'=>'label label-success',
            'icon'=>'/images/paidOrder.svg'
        ],
        'reklamationOrder'=>[
            'class'=>'label label-danger',
            'icon'=>'/images/complaint.svg'
        ],
        'completedOrder'=>[
            'class'=>'label label-success',
            'icon'=>'/images/checked.svg'
        ],
        
        
        
        
        

    ];
    public function index($state=null)
    {
        $states = $this->states;
        $statesCat = $this->categories;
        $companies = User::filters('company');
        if ($state) {
            if ($states[$state]) {
                foreach ($states as $key=>$statee) {
                    $states[$key]['active'] = false;
                }
                $states[$state]['active'] = true;
            } else {
                abort('404');
            }
        }
        if (request()->order&&!empty(request()->order)) {
            $order = Order::find(request()->order);
            if (! $order) {
                $order = '';
            }
            return view('backend.adminlte.orders.order', compact(['states','statesCat','order','companies']));
        }
        
        return view('backend.adminlte.orders.order', compact(['states','statesCat','companies']));
    }
    public function destroyOrder()
    {
        $order = Order::findOrFail(request()->id);
        $order->delete($force=true);
        return 1;
    }
    public function getOrders($Numbers=null)
    {
        // return 'ahmed';
        // return request()->all();
        
        $category = request()->state ? request()->state:'all';
        $states = $this->states[$category];
        $orders =  Order::status('FilterFunction'.$category);

        
        $paginationNumber = request()->length ? request()->length :10;
        
        if (request()->order[0]['column']==7) {
            $orders = $orders->orderBy('cost', request()->order[0]['dir']);
        } else {
            $orders = $orders->orderBy('id', request()->order[0]['dir']);
        }
        
        
        
        // request()->page = 2;
        $draw = request()['draw']?request()->draw:1;
        $pageNum =1;
        // return request()->length;
        $pageNum=request()->length==0?1:(request()['start'] + request()['length'])/(request()['length']);
        // $orders = $orders->setAttribute('test', 'test');
        $orders  = $orders->getInfo();
        
        $FilterInfo = [];
        if (request()->search['value']) {
            // return explode('-', 'ahmed-ali-thabet-roshdan', 2);
            // return request()->all();
            $orders  = $orders->search(request()->search['value']);
            
            $field = explode('-', request()->search['value'], 2)[0];
            $field = 'search'.$field;
            $FilterInfo['search'] =[ trans('backend/orders.'.$field),explode('-', request()->search['value'], 2)[1]];
        }
        // $FilterInfo['company'] = trans('backend/orders.allCompanies');
        // if (request()->company!=0) {
        //     $orders = $orders->findByCompany(request()->company);
        //     $company = User::find(request()->company);
        //     $FilterInfo['company'] = $company->name.'('.$company->email.')';
        // }
        $total = $orders->count();
        if ($Numbers!=null) {
            return $orders->getDataForChart();
        }
        $orders = $orders->with(['offers.user'=>function ($q) {
            return $q->select('name', 'id');
        }]);
        $orders = $orders->paginate($paginationNumber, ['*'], 'page', $pageNum);
        
        // return $orders['total'];
        request()->state = 'all';
        $category = collect(['category'=>$category,"recordsTotal"=> $total,
        "recordsFiltered"=> $total,'draw'=>$draw,
        'FilterInfo'=>$FilterInfo
        ,'chart'=>$this->getOrders($Numbers=true)]);
        $orders = $category->merge($orders);

        return $orders;
    }
    public function GetCompanies()
    {
        // return User::with(['order'=>function ($q) {
        //     return $q->distinct()->with(['offers'=>function ($query) {
        //         return $query;
        //     }]);
        // }])->get();
        $users =  Offer::users();
        // return $users;
        return ['users'=>User::orders($users[0]),'lastPage'=>$users[1]];
    }
    public function GetSenders()
    {
        $senders = Senders::getSenders();
        return $senders;
    }
    public function OrdersUser()
    {
        return view('backend.adminlte.orders.user');
    }
    public function OrderSender()
    {
        return view('backend.adminlte.orders.sender');
    }
    
    public function getOrderInfo(Order $order)
    {
        $orderDating = $order->dating;
        $ordersender = $order->sender;
        $orderReceiver = $order->receiver;
        $orderOtherBilling = $order->otherBilling;
        $orderOffers = $order->offers()->with('user')->get();
        return [
            'Dating'=>$orderDating,
            'Sender'=>$ordersender,
            'receiver'=>$orderReceiver,
            'otherBilling'=>$orderOtherBilling,
            'Offers'=>$orderOffers,
        ];
    }
    public function destroy()
    {
        $offer = Offer::find(request()->id);
        if ($offer&&$offer['is_accepted']==1) {
            return response(['errors'=>['accepted'=>'accepted offers cant not be deleted']], 500);
        }
        $offer->delete();
        return 1;
    }


    public function getOrderInformation($id)
    {
        $order = Order::find($id);
        $profile = '';
        $company_order_dates = '';
        $company_order_vecs = '';
        $driver = '';
        $driver_profile = '';
        $ship2 = '';
        $order_steps = '';
        if ($order->is_active == 1) {
            $offer = Offer::where('order_id', $id)->where('is_accepted', 1)->first();
            $profile = Profile::where('user_id', $offer->user_id)->first();
            $company_order_dates2 = CompanyOrderDates::where('user_id', $offer->user_id)->where('order_id', $id)->first();
            $company_order_vecs = CompanyOrderVehicles::where('user_id', $offer->user_id)->where('order_id', $id)->first();
            
            $driver = Driver::where('company_id', $offer->user_id)->where('vehichle_id', $company_order_vecs->vehicle_id)->first();
            $vehicle = Vehicle::find($company_order_vecs->vehicle_id);
            $driver_profile = Profile::find($driver->profile_id);
            $ship2 = Shipping::find($vehicle->ship_id);
            $company_order_dates = [
               'start' => Helper::convert2($company_order_dates2['start']),
               'end' => Helper::convert2($company_order_dates2['end']),
               'load_up' => $company_order_dates2['load_up'],
               
            ];

            $order_steps = [
                'take_money' => Helper::convert2($company_order_vecs['take_money']),
                'pick_up' => Helper::convert2($company_order_vecs['pick_up']),
                'pick_up_done' => Helper::convert2($company_order_vecs['pick_up_done']),
                'to_destination' => Helper::convert2($company_order_vecs['to_destination']),
            ];
        }

        $ship = Shipping::find($order->ship_id);
        $dates = $order->dating;
        $orderDating = [
           'load_from' => Helper::convert2($dates['load_from']),
           'load_up' => Helper::convert2($dates['load_up']),
           'delivery_from' => Helper::convert2($dates['delivery_from']),
           'delivery_until' => Helper::convert2($dates['delivery_until']),
           'valid_until' => Helper::convert2($dates['valid_until']),
        ];
        $ordersender = $order->sender;
        $orderReceiver = $order->receiver;
        $orderOtherBilling = $order->otherBilling;
        $orderOffers = $order->offers()->with('user')->get();
        return [
            'Dating'=>$orderDating,
            'ship'=>$ship,
            'ship2'=>$ship2,
            'order_steps'=>$order_steps,
            'company_order_dates'=>$company_order_dates,
            'company_order_vecs'=>$company_order_vecs,
            'driver_profile'=>$driver_profile,
            'profile'=>$profile,
            'sender'=>$ordersender,
            'receiver'=>$orderReceiver,
            'otherBilling'=>$orderOtherBilling,
            'offers'=>$orderOffers,
        ];
    }

    public function cancel(Request $request)
    {
        $id = $request->id;

        $order = Order::find($id);
        $order->is_active = 0;
        $order->paid = 0;
        $order->payment_type = '';
        $order->save();

        Offer::where('order_id', $id)->delete();

        $now = Carbon::now();
        $now = Carbon::parse($now)->format('Y-m-d H:i:s');
        $dates = OrderDates::where('order_id', $id)->first();
        $dates->valid_until = $now;
        $dates->save();

        return 1;
    }
}
