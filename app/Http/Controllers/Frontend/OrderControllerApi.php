<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Backend\ShippingDistance;
use App\Models\Backend\Shipping;
use App\Mail\MailSender;

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
use App\Http\Controllers\Backend\OrderHistoryController;

use Illuminate\Contracts\Encryption\DecryptException;

class OrderControllerApi extends Controller
{
    public function saveOrder()
    {
        try {
            $id = decrypt(request()->encryptedId);
        } catch (DecryptException $e) {
            abort(422);
        }
        $this->newOrder();
        $this->validateInformation();
        $this->saveReceiver();
        $this->saveDating();
        if (request()->bill_to==='other') {
            $this->saveOtherBilling();
        }
        $this->saveBillTo();
        $this->saveSender();
        //this is an temperaroy function for the old code. health :(
        $this->oldVaries(Order::find($id));
        return request()->all();
    }
    public function oldVaries(Order $order)
    {
        if (request()->FromAndTo&&request()->FromAndTo['from']&&request()->FromAndTo['to']) {
            $order->sender()->update(request()->FromAndTo['from']);
            $order->receiver()->update(request()->FromAndTo['to']);
        }
        $order_send_receives = OrderSendReceive::where('order_id', $order->id)->first();
        if ($order_send_receives) {
            return false;
        }
        
        if ($order->sender&&$order->receiver) {
            $otherBillingid = $order->otherBilling ? $order->otherBilling->id : 0;
            $order_send_receives = OrderSendReceive::create([
               'order_id'=>$order->id,
               'sender_id'=>$order->sender->id,
               'receiver_id'=>$order->receiver->id,
               'other_billing_id'=>$otherBillingid
            ]);
        }
    }
    public function saveBillTo()
    {
        try {
            $id = decrypt(request()->encryptedId);
        } catch (DecryptException $e) {
            abort(422);
        }
        $order = Order::findOrFail($id);
        $order->bill_to = request()->bill_to;
        $order->save();
    }
    public function StoredOrder($orderId)
    {
        try {
            $id = decrypt($orderId);
        } catch (DecryptException $e) {
            abort(404);
        }
        $order = Order::with(['sender','receiver','otherBilling','dating'])->findOrFail($id);
        
        return $order;
    }
    
    public function ShowNewOrder($orderId)
    {
        return  view('frontend.home2');
    }
    
    public function newOrder()
    {
        $this->validateNewOrder();
        if (request()->encryptedId) {
            try {
                $id = decrypt(request()->encryptedId);
            } catch (DecryptException $e) {
                $id = 0;
            }
        }
        // $id = 0;
        $order = Order::find($id);
        $neworder = [
            'weight'=>request()->weight,
            'items'=>request()->items,
            'length'=>request()->length,
            'width'=>request()->width,
            'height'=>request()->height,
            'cost'=>request()->cost,
            'paid'=>0,
            'source'=>request()->from,
            'destination'=>request()->to,
            'source_location'=>request()->from_map,
            'destination_location'=>request()->to_map,
            'description'=>request()->description,
            'person'=>request()->person,
            'time'=>request()->time,
            'ship_id'=>request()->ship_id,
            'distance'=>request()->distance,
            'duration'=>request()->duration,
            
        ];
        if ($order&&$order->id) {
            unset($neworder['paid']);
            $order->update($neworder);
        } else {
            $order = Order::create($neworder);
            broadcast(new \App\Events\orderProgress($order, ['created','frontend/order.emailStore']));
            
            OrderHistoryController::store($order, 'created');
        }
        
        session()->push('orders', $order->id);
        return [$order,encrypt($order->id)];
        return session()->all();
        return $order;
    }
    public function saveReceiver()
    {
        try {
            $id = decrypt(request()->encryptedId);
        } catch (DecryptException $e) {
            abort(422);
        }
        $order = Order::findOrFail($id);
        $receiverEmail = request()->receiver['email'] ?:'guest-'.$order->id.'@kurier-link.com';
        $receiverArray = [
            'first_name'=>request()->receiver['first_name'],
            'company'=>request()->receiver['company'],
            'nick_name'=>request()->receiver['nick_name'],
            'phone'=>request()->receiver['phone'],
            'email'=>$receiverEmail,
        ];
        if (isset(request()->receiver['company'])&&!empty(request()->receiver['company'])) {
            $receiverArray['company'] = request()->receiver['company'];
        }
        if ($order->receiver()->exists()) {
            $order->receiver()->update($receiverArray);
        } else {
            $receiver = Receivers::create($receiverArray);
            $order->receiver()->save($receiver);
        }
    }
    public function saveDating()
    {
        try {
            $id = decrypt(request()->encryptedId);
        } catch (DecryptException $e) {
            abort(422);
        }
        $order = Order::findOrFail($id);
        $date = \Carbon::now()->addHours(24);
        $valid_until = \Carbon::parse($date)->format('Y-m-d H:i:s');
        $datingArray = [
            'load_from'=>request()->dating['load_from'],
            'load_up'=>request()->dating['load_up'],
            'delivery_from'=>request()->dating['delivery_from'],
            'delivery_until'=>request()->dating['delivery_until'],
            'valid_until'=>$valid_until
            
        ];
        if ($order->dating()->exists()) {
            $order->dating()->update($datingArray);
        } else {
            $dating = OrderDates::create($datingArray);
            $order->dating()->save($dating);
        }
    }
    public function saveSender()
    {
        try {
            $id = decrypt(request()->encryptedId);
        } catch (DecryptException $e) {
            abort(422);
        }
        $order = Order::findOrFail($id);
        
        
        
        $senderEmail = request()->sender['email']?:'guest-'.$order->id.'@kurier-link.com';
        
        $senderArray = [
            'first_name'=>request()->sender['first_name'],
            'company'=>request()->sender['company'],
            'nick_name'=>request()->sender['nick_name'],
            'phone'=>request()->sender['phone'],
            'email'=>$senderEmail,
        ];

        
        if (isset(request()->sender['company'])&&!empty(request()->sender['company'])) {
            $senderArray['company'] = request()->sender['company'];
        }

        if ($order->sender()->exists()) {
            $order->sender()->update($senderArray);
        } else {
            $sender = Senders::create($senderArray);
            $order->sender()->save($sender);
            broadcast(new \App\Events\orderProgress($order, ['senderReceiverInformation','frontend/order.emailStoreTwo'], true));
            
            OrderHistoryController::store($order, 'senderReceiverInformation');
        }
    }
    public function forgetOrder($order)
    {
        try {
            $id = decrypt(request()->order);
        } catch (DecryptException $e) {
            $id = 0;
        }
        // $id=0;
        $orders = session()->pull('orders', []); // Second argument is a default value
        $neworders = [];
        foreach ($orders as $sessionOrder) {
            if ($sessionOrder!==$id) {
                array_push($neworders, $sessionOrder);
            }
        }
        session()->put('orders', $neworders);
        if (count($neworders)) {
            return $this->otherOrders()[0];
        } else {
            return [];
        }
    }
    public function saveOtherBilling()
    {
        try {
            $id = decrypt(request()->encryptedId);
        } catch (DecryptException $e) {
            abort(422);
        }
        $order = Order::findOrFail($id);
        
        
        
       
        $otherBillingArray = [
            'first_name'=>request()->otherbilling['first_name'],
            'company'=>request()->otherbilling['company'],
            'nick_name'=>request()->otherbilling['nick_name'],
            'phone'=>request()->otherbilling['phone'],
            'email'=>request()->get('otherbilling.email', 'guest-'.$order->id.'@kurier-link.com'),
        ];
        if (isset(request()->otherbilling['company'])&&!empty(request()->otherbilling['company'])) {
            $otherBillingArray['company'] = request()->otherbilling['company'];
        }
        if ($order->otherBilling()->exists()) {
            $order->otherBilling()->update($otherBillingArray);
        } else {
            $otherBilling = OrderOtherBilling::create($otherBillingArray);
            $order->otherBilling()->save($otherBilling);
        }
    }
    public function validateInformation()
    {
        $validationRules = [
            'sender.first_name'  =>"required",
            'sender.nick_name'   =>"required",
            'sender.phone'       =>"required|phone_number",
            
            'receiver.first_name'=>"required",
            'receiver.nick_name' =>"required",
            'receiver.phone'     =>"required|phone_number",
            'dating.delivery_from'           =>'required|date',
            'dating.delivery_until'           =>'required|date',
            'dating.load_from'           =>'required|date',
            'dating.load_up'           =>'required|date',
            'bill_to'           =>'required|in:sender,receiver,other'
            
        ];
        if (request()->otherbilling==='other') {
            $validationRules['otherbilling.first_name'] ='required';
            $validationRules['otherbilling.nick_name']  ='required';
            $validationRules['otherbilling.phone']      ='required|phone_number';
            if (request()->otherbilling&&isset(request()->otherbilling['email'])) {
                $validationRules['otherbilling.email']= 'email';
            }
        }
        if (request()->sender&&isset(request()->sender['email'])) {
            $validationRules['sender.email']= 'email';
        }
        if (request()->receiver&&isset(request()->receiver['email'])) {
            $validationRules['receiver.email']= 'email';
        }
        $rulesNames = [
            'sender.first_name'  => trans('front/create.firstName'),
            'sender.last_name'   => trans('front/create.lastName'),
            'sender.phone'       => trans('front/create.phone'),
            'sender.email'       => trans('front/create.email'),
            'receiver.first_name'=> trans('front/create.firstName'),
            'receiver.last_name' => trans('front/create.lastName'),
            'receiver.phone'     => trans('front/create.phone'),
            'receiver.email'     => trans('front/create.email'),
            'dating.delivery_from'=>trans('front/create.chargingTime'),
            'dating.delivery_until'=>trans('front/create.to'),
            'dating.load_from'=>trans('front/create.from'),
            'dating.load_up'=>trans('front/create.to'),
        ];
        $this->validate(request(), $validationRules, [], $rulesNames);
    }
    public function validateNewOrder()
    {
        $this->validate(request(), [
            'weight'=>'required|numeric',
            'items'=>'required|numeric',
            'length'=>'required|numeric',
            'width'=>'required|numeric',
            'height'=>'required|numeric',
            'cost'=>'required|numeric',
            'from'=>'required',
            'to'=>'required',
            'from_map'=>'required',
            'to_map'=>'required',
            'person'=>'required|numeric',
            'time'=>'required|numeric',
            'ship_id'=>'required|numeric|exists:shippings,id',
            'distance'=>'required|numeric',
            'duration'=>'required|numeric',
            'description'=>'required'
        ]);
        $availableShippingType = ShippingDistance::where('min', '<=', request()->distance)
            ->where('max', '>=', request()->distance)->first();
        $ship = Shipping::findOrFail(request()->ship_id);
        $this->shipMatch($ship);
        $this->samePrice($ship, $availableShippingType);
    }
    public function samePrice(Shipping $ship, ShippingDistance $shippingDistance)
    {
        $shipCost = $ship->costs()->where('distance_id', $shippingDistance->id);
        if ($shipCost->count()==0) {
            $this->shipError('ship');
        }
        $shipCost = $shipCost->first();
        $loadTime = request()->time - $ship->specs->min_load_time;
        $cost_per_unit = $loadTime * $ship->specs->cost_per_unit;
        $cost_per_person = (request()->person - 1) * ($loadTime + request()->duration) * $ship->specs->cost_per_person;
        if ($shipCost->cost_per_kilo * request()->distance < $shipCost->min_cost) {
            $newprice = ($shipCost->min_cost + $cost_per_unit + $cost_per_person);
            $newprice =  number_format($newprice, 2,'.','');
        } else {
            $newprice = (($shipCost->cost_per_kilo * request()->distance) + $cost_per_unit + $cost_per_person);
            $newprice =  number_format($newprice, 2,'.','');
        }
        
        if ($newprice>=request()->cost-1&&$newprice<=request()->cost+1) {
            return true;
        } else {
            $this->shipError('price');
            return false;
        }
    }
    public function shipMatch(Shipping $ship)
    {
        if ($ship->pay_load_max<request()->weight||
            $ship->length < request()->length*10||
            $ship->width < request()->width*10||
            $ship->height < request()->height*10) {
            $this->shipError('ship');
        };
    }
    public function shipError($value)
    {
        abort(response()->json([
            'errors'=>[
                $value=>'The '.$value.' don\'t match.',
            ]
            ], 422));
    }
    public function otherOrders()
    {
        $ordersArray =  session()->get('orders');
        if ($ordersArray&&count($ordersArray)!==0) {
            $orders = Order::whereIn('id', $ordersArray)->get();
            foreach ($orders as $order) {
                $order->from = $order->source;
                $order->to = $order->destination;
                $order->from_map = $order->source_location;
                $order->to_map = $order->destination_location;
                $encrypted = encrypt($order->id);
               
                $order->encrypted = $encrypted;
            }
            return [$orders,'owner'];
        } else {
            $orders = Order::selectAdvirtised();
            return [$orders,'adv'];
        }
    }
    public function orderIcon()
    {
        $price = request()->input('price', '0,00');
        $distance = request()->input('distance', '0');
        return view('frontend.dashboard.orderPriceEuroIcon')->with(compact('price', 'distance'), header('content-type', 'image/svg'));
    }
}
