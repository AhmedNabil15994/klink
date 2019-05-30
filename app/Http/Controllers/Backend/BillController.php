<?php

namespace App\Http\Controllers\Backend;
use DB;
use Crypt;
use App\Models\Backend\bill;
use App\Models\Backend\Admin;
use App\Models\Frontend\Order;
use App\Models\Frontend\User;
use App\Models\Frontend\OrderDates;
use App\Models\Frontend\Senders;
use App\Models\Frontend\Receivers;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Offer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Exports\BillsExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = bill::all();
        return view('backend.adminlte.bills.bills', compact('bills'));
    }
    public function test()
    {
        return \Excel::download(new BillsExport, 'invoices.xlsx');
    }
    public function randomIndex()
    {
        $randomString = strtoupper(str_random(16));
        $randomStringArray = str_split($randomString, 4);
        $randomString = implode("-", $randomStringArray);
        $isFound = bill::where('order_num', $randomString)->first();
        // return !empty($isFound) ? 'TRUE' :'false' ;
        if (!empty($isFound)) {
            return $this->randomIndex();
        }
        return $randomString;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rules = [
            'number'=>'required|unique:bills',
            'order_num'=>'required|unique:bills',
            'customerName'=>'required|max:150',
            'order_cost'=>'required|numeric',
            'fees'=>'required|numeric',
            'tax'=>'required|numeric',
            'discount'=>'required|numeric',
            'payment_type'=>'required',
            'invionce_date'=>'required|date',
            

        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $bill = request()->all();
        $bill['total'] = $bill['order_cost'] + $bill['fees'] + $bill['tax'] - $bill['discount'];
        $bill['sub_total'] = $bill['order_cost'] + $bill['fees'] + $bill['tax'] - $bill['discount'];
        bill::create($bill);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $rules = [
            'number'=>'required|unique:bills,id,'.request()->id,
            'order_num'=>'required|unique:bills,id,'.request()->id,
            'customerName'=>'required|max:150',
            'order_cost'=>'required|numeric',
            'fees'=>'required|numeric',
            'tax'=>'required|numeric',
            'discount'=>'required|numeric',
            'payment_type'=>'required',
            'invionce_date'=>'required|date',
            

        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $billFromDb = bill::where('id', request()->id)->first();
        if (request()->number!=$billFromDb->number) {
            return Response::json([
                'errors' => ['number'=>trans('backend/bills.changenumber')]
            ]);
        }
        if (request()->order_num!=$billFromDb->order_num) {
            return Response::json([
                'errors' => ['order_num'=>trans('backend/bills.changeorder')]
            ]);
        }
        $bill = request()->all();
        $bill['total'] = $bill['order_cost'] + $bill['fees'] + $bill['tax'] - $bill['discount'];
        $bill['sub_total'] = $bill['order_cost'] + $bill['fees'] + $bill['tax'] - $bill['discount'];
        
        $billFromDb->update($bill);
        return 1;
    }
    public function excel()
    {
        $rules = [
            'start'=>'date|before_or_equal:end',
            'end'=>'date|after_or_equal:start'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }
        $name = 'bills';
        if (request()->start&&request()->end) {
            if (request()->start!=request()->end) {
                $name = $name.'_From : '.request()->start.'_To : '.request()->end;
            } else {
                $name = $name.'_Day : '.request()->start;
            }
        }
        return \Excel::download(new BillsExport(request()->start, request()->end), $name.'.xlsx');
    }
    public function print(bill $bill)
    {
        return view('backend.adminlte.bills.print', compact('bill'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $bill = bill::find(request()->id);
        $bill->delete();
        return 1;
    }




    public function invoices(Request $request){

        if($request->ajax()){
          $this->data['data'] = \DB::table('orders')->join('offers','orders.id','=','offers.order_id')
                                                  ->join('user_profiles','offers.user_id','user_profiles.user_id')
                                                  ->get();
          return view('backend.adminlte.bills.Ajax.LoadInvoices', $this->data)->render();                                    
       }else{
        $this->data['data'] = \DB::table('orders')->join('offers','orders.id','=','offers.order_id')
                                                  ->join('user_profiles','offers.user_id','user_profiles.user_id')
                                                  ->get();
        return view('backend.adminlte.bills.invoices',$this->data);
       }

        
    }

    public function paid_invoices(Request $request){

        if($request->ajax()){
          $this->data['data'] = \DB::table('orders')->join('offers','orders.id','=','offers.order_id')
                                                  ->join('user_profiles','offers.user_id','user_profiles.user_id')
                                                  ->where('orders.paid','!=',0)
                                                  ->get();
          return view('backend.adminlte.bills.Ajax.LoadInvoices', $this->data)->render();                                    
       }
        
    }

    public function unpaid_invoices(Request $request){

        if($request->ajax()){
          $this->data['data'] = \DB::table('orders')->join('offers','orders.id','=','offers.order_id')
                                                  ->join('user_profiles','offers.user_id','user_profiles.user_id')
                                                  ->where('orders.paid','=',0)
                                                  ->get();
          return view('backend.adminlte.bills.Ajax.LoadInvoices', $this->data)->render();                                    
       }

        
    }

    public function bill_invoice($id){

        $user_id = Offer::where('order_id', $id)->first();
        $company = Profile::where('user_id', $user_id->user_id)->first();

        $this->data['company'] = $company->first_name ." ". $company->last_name;

        $order = Order::where('id',$id)->first();

        if($order->bill_to == 'receiver'){
            $this->data['receiver'] = Receivers::where('order_id', $id)->first();
        }elseif ($order->bill_to == 'sender') {
            $this->data['receiver'] = Senders::where('order_id', $id)->first();
        }elseif ($order->bill_to == 'other') {
            $this->data['receiver'] = OrderOtherBilling::where('order_id', $id)->first();
        }

        $this->data['dates'] = OrderDates::where('order_id', $id)->first();
        $this->data['order'] = Order::where('id', $id)->first();
        $this->data['data'] = Admin::with('profile')->where('email','admin@admin.com')->first();
        
        $this->data['id'] = $id;
        $this->data['encrypted'] = Crypt::encrypt($id);
        return view('backend.adminlte.bills.bill_invoice', $this->data);
    }

    public function abstracts(){

        $this->data['data'] = \DB::table('orders')->join('offers','orders.id','=','offers.order_id')
                                                  ->join('user_profiles','offers.user_id','user_profiles.user_id')
                                                  ->where('offers.is_accepted','=',1)
                                                  ->where('orders.is_active','=',1)
                                                  ->get();

        return view('backend.adminlte.bills.abstracts',$this->data);
    }

    public function bill_abstract($id){
        $order = DB::table('orders')->join('offers','offers.order_id','=','orders.id')
                                          ->where('orders.is_active','=','1')
                                          ->where('orders.id','=',$id)
                                          ->where('offers.is_accepted','=','1')
                                          ->orderBy('orders.id','DESC')
                                          ->first();
      if($order){
        $this->data['order'] = $order;
        $this->data['order_dates'] = OrderDates::where('order_id',$id)->first();
        $this->data['company'] = Profile::where('user_id', $order->user_id)->first();
        $this->data['user'] = User::where('id', $order->user_id)->first();
        $this->data['offer'] = Offer::where('order_id',$id)->where('is_accepted',1)->first();
    
        $this->data['data'] = Admin::with('profile')->where('email','admin@admin.com')->first();
        $this->data['encrypted'] = Crypt::encrypt($id);
        return view('backend.adminlte.bills.bill_abstract',$this->data);
      }

    }


}
