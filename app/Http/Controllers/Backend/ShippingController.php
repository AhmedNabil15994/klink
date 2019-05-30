<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Shipping;
use App\Models\Backend\ShippingDistance;
use App\Models\Backend\ShippingCost;
use App\Models\Backend\ShippingSpec;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use PayPal\Api\ShippingCost as ShippingCostApi;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $this->data['data']= Shipping::orderBy('id', 'DESC')->with(['costs'=>function ($q) {
            return $q->with('shippingDistance');
        }])->get();
        $this->data['ships'] = ShippingDistance::orderBy('id', 'DESC')->get();
        return view('backend.adminlte.shipping.index', $this->data);
    }
    public function millistone(ShippingCost $ship)
    {
        $rules = [
            'type_id'  => 'required|integer',
            'distance_id'  => 'required|integer',
            'cost_per_kilo'  => 'required',
            'min_cost'  => 'required',
            'is_active'  => 'required|integer',
        ];
        $rulees = [];
        foreach (request()->all() as $key=>$value) {
            if ($rules[$key]) {
                $rulees[$key] = $rules[$key];
            } else {
                return abort(401, 'not allowed');
            }
        }
        $validator = Validator::make(Input::all(), $rulees);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $ship->update(request()->all());
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'payload'  => 'required',
            'height'    => 'required',
            'width'    => 'required',
            'length'    => 'required',
            'pallet'  => 'required',
            'is_active'  => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/shippings');
            $image->move($destinationPath, $name);

            $ship = new Shipping();

            $ship->title = $request->title;
            $ship->height = $request->height;
            $ship->width = $request->width;
            $ship->length = $request->length;
            $ship->pay_load_max = $request->payload;
            $ship->palletspaces = $request->pallet;
            $ship->img = $name;
            $ship->min_packets = $request->min_packets;
            $ship->is_active = $request->is_active;

            $ship->save();
            return 1;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $rules = [
            'title' => 'required',
            'height'    => 'required',
            'width'    => 'required',
            'length'    => 'required',
            'payload'  => 'required',
            'pallet'  => 'required',
            'is_active'  => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/shippings');
            $image->move($destinationPath, $name);

            $ship =  Shipping::find($request->id);

            $ship->title = $request->title;
            $ship->height = $request->height;
            $ship->width = $request->width;
            $ship->length = $request->length;
            $ship->pay_load_max = $request->payload;
            $ship->palletspaces = $request->pallet;
            $ship->min_packets = $request->min_packets;
            $ship->img = $name;
            $ship->is_active = $request->is_active;

            $ship->save();
            return 1;
        } else {
            $ship =  Shipping::find($request->id);

            $ship->title = $request->title;
            $ship->height = $request->height;
            $ship->width = $request->width;
            $ship->length = $request->length;
            $ship->pay_load_max = $request->payload;
            $ship->palletspaces = $request->pallet;
            $ship->is_active = $request->is_active;
            $ship->save();
            return 1;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Shipping::where('id', $request->id)->delete();
        ShippingCost::where('type_id', $request->id)->delete();
        return Response::json($data);
    }


    public function distance(Request $request)
    {
        $this->data['data'] = ShippingDistance::orderBy('id', 'DESC')->get();

        return view('backend.adminlte.shipping.distance', $this->data);
    }


    public function storeDist(Request $request)
    {
        $rules = [
            'min'  => 'required',
            'max'  => 'required',
            'is_active'  => 'required|integer',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $ship = new ShippingDistance();

        $ship->min = $request->min;
        $ship->max = $request->max;
        $ship->is_active = $request->is_active;

        $ship->save();
        return 1;
    }

    public function destroyDist(Request $request)
    {
        $data = ShippingDistance::where('id', $request->id)->delete();
        ShippingCost::where('distance_id', $request->id)->delete();
        return Response::json($data);
    }

    public function editDist(Request $request)
    {
        $rules = [
            'min'  => 'required',
            'max'  => 'required',
            'is_active'  => 'required|integer',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $ship = ShippingDistance::find($request->id);

        $ship->min = $request->min;
        $ship->max = $request->max;
        $ship->is_active = $request->is_active;

        $ship->save();
        return 1;
    }



    public function cost(Request $request)
    {
        $this->data['data'] = ShippingCost::orderBy('id', 'DESC')->get();
        $this->data['types'] = Shipping::orderBy('id', 'DESC')->get();
        $this->data['distances'] = ShippingDistance::orderBy('id', 'DESC')->get();

        return view('backend.adminlte.shipping.cost', $this->data);
    }


    public function storeCost(Request $request)
    {
        $rules = [
            'type_id'  => 'required|integer',
            'distance_id'  => 'required|integer',
            'cost_per_kilo'  => 'required',
            'min_cost'  => 'required',
            'is_active'  => 'required|integer',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $ship = new ShippingCost();

        $ship->type_id = $request->type_id;
        $ship->distance_id = $request->distance_id;
        $ship->cost_per_kilo = $request->cost_per_kilo;
        $ship->min_cost = $request->min_cost;
        $ship->is_active = $request->is_active;

        $ship->save();
        return 1;
    }

    public function destroyCost(Request $request)
    {
        $data = ShippingCost::where('id', $request->id)->delete();

        return Response::json($data);
    }

    public function editCost(Request $request)
    {
        $rules = [
            'type_id'  => 'required|integer',
            'distance_id'  => 'required|integer',
            'cost_per_kilo'  => 'required',
            'min_cost'  => 'required',
            'is_active'  => 'required|integer',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $ship = ShippingCost::find($request->id);

        $ship->type_id = $request->type_id;
        $ship->distance_id = $request->distance_id;
        $ship->cost_per_kilo = $request->cost_per_kilo;
        $ship->min_cost = $request->min_cost;
        $ship->is_active = $request->is_active;

        $ship->save();
        return 1;
    }

    public function spec(Request $request)
    {
        $this->data['data'] = ShippingSpec::orderBy('id', 'DESC')->get();
        $this->data['types'] = Shipping::orderBy('id', 'DESC')->get();

        return view('backend.adminlte.shipping.spec', $this->data);
    }

    public function storeSpec(Request $request)
    {
        $rules = [
            'ship_id'  => 'required|integer|unique:shipping_specs',
            'min_time'  => 'required|integer',
            'max_time'  => 'required|integer',
            'min_person'  => 'required|integer',
            'max_person'  => 'required|integer',
            'cost_per_unit'  => 'required',
            'cost_per_person'  => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $spec = ShippingSpec::create([

            'ship_id' => $request->ship_id,
            'min_load_time' => $request->min_time,
            'max_load_time' => $request->max_time,
            'cost_per_unit' => $request->cost_per_unit,
            'min_person' => $request->min_person,
            'max_person' => $request->max_person,
            'cost_per_person' => $request->cost_per_person,

        ]);


        return 1;
    }

    public function destroySpec(Request $request)
    {
        ShippingSpec::where('id', $request->id)->delete();
        return 1;
    }

    public function editSpec(Request $request)
    {
        $rules = [
            'id'	=> 'required|integer',
            'ship_id'  => 'required|integer',
            'min_load_time'  => 'required|integer',
            'max_load_time'  => 'required|integer',
            'min_person'  => 'required|integer',
            'max_person'  => 'required|integer',
            'cost_per_unit'  => 'required',
            'cost_per_person'  => 'required',
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $spec = ShippingSpec::find($request->id);
        $spec->update($request->all());
        $spec->save();

        return 1;
    }

    public function getAll()
    {
        $shipping_distances = ShippingDistance::
        select('min', 'max', 'id', 'is_active')
        ->get();
        $shippings = Shipping::
        select([
            'discount',
            'height',
            'img',
            'length',
            'palletspaces',
            'pay_load_max',
            'title',
            'updated_at',
            'width',
            'id'
        ])
        ->with(['costs'=>function ($q) {
            return $q;
        },'specs'])
        ->orderByRaw('CAST(pay_load_max AS UNSIGNED)')
        
        ->get();
        return [$shippings,$shipping_distances];
    }
}
