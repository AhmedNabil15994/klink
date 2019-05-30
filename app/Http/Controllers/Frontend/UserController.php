<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Frontend\User;
use App\Models\Frontend\Driver;
use App\Models\Frontend\Role;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Faq;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\UserEmail;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Vehicle;
use App\Models\Frontend\Order;
use App\Models\Frontend\Offer;
use App\Models\Frontend\Employees;
use App\Models\Frontend\EmpAddress;
use App\Models\Frontend\EmpBank;
use App\Models\Frontend\EmpEmployment;
use App\Models\Frontend\Contract;
use App\Models\Frontend\EmpPaper;
use App\Models\Frontend\EmpSocialInsurance;
use App\Models\Frontend\EmpTax;
use App\Models\Backend\Shipping;
use App\Models\Frontend\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use Helper;
use Crypt;
use Hash;
use App\Models\Frontend\DocumentsTypes;
use App\Models\Frontend\taxes;
use App\Models\Frontend\countries;

class UserController extends Controller
{
    public function index()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $vehicles = Vehicle::where('user_id', Auth::user()->id)->count();
        $ships = [];
        $user_vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
        foreach ($user_vehicles as $key => $value) {
            $ships[] = $value->ship_id;
        }
        if ($vehicles > 0) {
            $this->data['order_count'] = Order::orderBy('id', 'DESC')->where('is_active', 0)->whereIn('ship_id', $ships)->count();
        } else {
            $this->data['order_count'] = 0;
        }
        $this->data['vehicle_count'] = $vehicles;
        
        $this->data['accepted_order'] =  DB::table('offers')->join('orders', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->count();

        $this->data['income'] = DB::table('offers')->join('orders', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->sum('offers.total');

        $this->data['active_orders'] = DB::table('offers')->join('orders', 'offers.order_id', '=', 'orders.id')
                                          ->where('orders.is_active', '=', '1')
                                          ->where('offers.user_id', '=', Auth::user()->id)
                                          ->where('offers.is_accepted', '=', '1')
                                          ->take(5)
                                          ->get();

        $this->data['new_orders'] = Order::orderBy('id', 'DESC')->where('is_active', 0)->whereIn('ship_id', $ships)->take(5)->get();



        $offers = Offer::where('user_id', Auth::user()->id)
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

    public function checkThis()
    {
        if (Auth::user()->profile->status  == 'Company') {
            $drivers = Driver::where('company_id', Auth::user()->id)->where('user_id', '!=', '')->with('profile')->get();
            return $drivers->unique('profile_id');
        }
    }

    public function profile_setting()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['drivers'] = $this->checkThis();
        return view('frontend.dashboard.profile.profile_setting', $this->data);
    }
    public function account_setting()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['emails'] = UserEmail::where('user_id', Auth::user()->id)->get();
        $this->data['drivers'] = $this->checkThis();

        return view('frontend.dashboard.profile.account_setting', $this->data);
    }
    public function contact_info()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['links'] = Userlinks::where('user_id', Auth::user()->id)->first();
        $this->data['drivers'] = $this->checkThis();

        return view('frontend.dashboard.profile.contact_information', $this->data);
    }
    public function employment()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['countries'] = countries::orderBy('display_order')->get();
        $this->data['data'] = Employees::where('user_id', Auth::user()->id)->with('emp_address', 'emp_bank', 'emp_employment', 'emp_paper', 'emp_social', 'emp_tax', 'emp_contract')->get();
        $this->data['drivers'] = $this->checkThis();

        return view('frontend.dashboard.profile.employment', $this->data);
    }

    public function emp_print($id)
    {
        $this->data['data'] = Employees::where('id', $id)->with('emp_address', 'emp_bank', 'emp_employment', 'emp_paper', 'emp_social', 'emp_tax')->get();
        $contract = Contract::where('emp_id', $id)->first();
        $contract->printed = 1;
        $contract->save();
        return view('frontend.dashboard.profile.print_emp', $this->data)->render();
    }

    public function emp_accept(Request $request)
    {
        $contract = Contract::where('emp_id', $request->id)->first();
        $contract->printed = 1;
        $contract->accepted = 1;
        $contract->save();
        return 1;
    }

    public function emp_start(Request $request)
    {
        $contract = Contract::where('emp_id', $request->id)->first();
        $contract->started = 1;
        $contract->save();
        return 1;
    }

    public function new_emp(Request $request)
    {
        //dd($request->all());
            
        if($request->nationality != 'DE'){
            $rules = [
                'email' => 'required|email|unique:employees',
                'mobile_number' => 'required|unique:employees',
                'card_number' => 'required|unique:employees',
                'passport_number' => 'required|unique:employees',
                'residency_no' => 'required|unique:employees',
                'id_number' => 'required|integer|unique:emp_taxes',
                'denomination' => 'integer|regex:/^[1-6]$/',

            ];
            $residency_no = $request->residency_no;

            $residency_date = $request->residency_date;
            $residency_type = $request->residency_type;
        }else{
            $rules = [
                'email' => 'required|email|unique:employees',
                'mobile_number' => 'required|unique:employees',
                'card_number' => 'required|unique:employees',
                'passport_number' => 'required|unique:employees',
                'id_number' => 'required|integer|unique:emp_taxes',
                'denomination' => 'integer|regex:/^[1-6]$/',

            ];
            $residency_no = '';

            $residency_date = '';
            $residency_type = '';
        }    

        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        $emp = Employees::create([

            'user_id' => Auth::user()->id,
            'title' => $request->emp_title,
            'name' => $request->emp_name,
            'birth_date' => Helper::convert($request->birth_date),
            'nationality' => $request->nationality,
            'birth_place' => $request->birth_place,
            'status' => $request->status,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'card_number' => $request->card_number,
            'passport_number' => $request->passport_number,
            'residency_no' => $residency_no,
            'residency_date' => $residency_date,
            'residency_type' => $residency_type,

        ]);

        $emp_id = $emp->id;

        EmpAddress::create([
            'emp_id'    => $emp_id,
            'address'    => $request->address,
            'home'    => $request->home,
            'city'    => $request->city,
            'postal_code'    => $request->postal_code,
            'country'    => $request->country,
        ]);

        EmpEmployment::create([
            'emp_id'    => $emp_id,
            'job_title'    => $request->job_title,
            'entry_date'    => Helper::convert($request->entry_date),
            'first_entry_date'    => Helper::convert($request->first_entry_date),
            'work_time'    => $request->work_time,
            'degree'    => $request->degree,
            'vocational'    => $request->vocational,
            'start_training'    => Helper::convert($request->start_training),
            'end_training'    => Helper::convert($request->end_training),
        ]);

        EmpTax::create([
            'emp_id'    => $emp_id,
            'id_number'    => $request->id_number,
            'office_no'    => $request->office_no,
            'pensions_no'    => $request->pensions_no,
            'bracket_factor'    => $request->bracket_factor,
            'child_allow'    => $request->child_allow,
            'denomination'    => $request->denomination,
        ]);

        EmpSocialInsurance::create([
            'emp_id'    => $emp_id,
            'social_law'    => $request->social_law,
            'parenthood'    => $request->parenthood,
            'kv'    => $request->kv,
            'kv2'    => $request->kv2,
            'health_insurance_company' => $request->health_insurance_company,
            'rv'    => $request->rv,
            'av'    => $request->av,
            'pv'    => $request->pv,
            'uv'    => $request->uv,
        ]);

        EmpPaper::create([
            'emp_id'    => $emp_id,
            'emp_contact'    => $request->emp_contact,
            'tax_deduction'    => $request->tax_deduction,
            'sv_id'    => $request->sv_id,
            'insurance_company'    => $request->insurance_company,
            'private_insurance'    => $request->private_insurance,
            'proof_parent'    => $request->proof_parent,
            'pensions'    => $request->pensions,
            'painter'    => $request->painter,
        ]);

        EmpBank::create([
            'emp_id'    => $emp_id,
            'bank_name'    => Crypt::encrypt($request->bank_name),
            'account_owner'    => Crypt::encrypt($request->account_owner),
            'iban'    => Crypt::encrypt($request->iban),
        ]);

        Contract::create([
            'emp_id'    => $emp_id,
        ]);

        return 1;
    }


    public function profile_tax()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['taxes'] = auth()->user()->taxes;
        $this->data['drivers'] = $this->checkThis();

        return view('frontend.dashboard.profile.profile_tax', $this->data);
    }
    public function payment_info()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['banks'] = Userbanks::where('user_id', Auth::user()->id)->first();
        $this->data['drivers'] = $this->checkThis();

        return view('frontend.dashboard.profile.payment_information', $this->data);
    }
    public function document()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['data'] = Document::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $this->data['types'] = DocumentsTypes::all();
        $this->data['drivers'] = $this->checkThis();
        
        return view('frontend.dashboard.profile.document', $this->data);
    }
    public function my_deactivate()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        $this->data['drivers'] = $this->checkThis();
        
        return view('frontend.dashboard.profile.Deactivate', $this->data);
    }

    

    public function upload(Request $request)
    {
        $rules = [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
        }

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/profiles');
        $image->move($destinationPath, $name);

        $user_id = Auth::user()->id;

        $profile = Profile::where('user_id', $user_id)->first();
        $profile->image = $name;
        $profile->save();
            

        return 1;
    }

    public function edit(Request $request)
    {
        $user_id = Auth::user()->id;
        $type = $request->type;
        $value = $request->newValue;
        
        $profile = Profile::where('user_id', $user_id)->first();
        $locationTypes = [
            'postal_code',
            'address',
            'home',
            'country',
            'region',
            'district'
        ];
        
        
        if ($type == 'birth_date') {
            $new = Helper::convert(substr($value, 0, 40));
            $profile->$type = $new;
            $profile->save();
        } elseif ($type == 'name') {
            $name = explode(' ', $value, 2);
            $profile->first_name = $name[0];
            $profile->last_name = $name[1];
            $profile->save();
        } else {
            $profile->$type = $value;
            $profile->save();
        }
        if (isset(request()->location)&&!empty(request()->location)) {
            $profile->location = request()->location;
            $profile->save();
        } else {
            if (in_array($type, $locationTypes)) {
                $newAddress = $profile->address.' '.
                                $profile->home.' '.
                                $profile->postal_code.' '.
                                $profile->district.' '.
                                $profile->region.' '.
                                $profile->country;
                $newLocation =  app('geocoder')->geocode($newAddress)->get()->first()->getCoordinates();
                $newLocation2  = $newLocation->getLatitude().','.$newLocation->getLongitude();
                $profile->location = $newLocation2;
                $profile->save();
                // return $newLocation2;
            }
        }
        return 1;
    }
    public function requiredInfo()
    {
        $requiredOnly = [
            'first_name'=>'required',
            'last_name'=>'required',
            'postal_code'=>'required|regex:/\b\d{5}\b/',
            'license_no' =>'required|numeric',
            'country'=>'required',
            'district'=>'required'
        ];
        $rules = [];
        foreach (request()->all() as $key=>$input) {
            if (!array_key_exists($key, $requiredOnly)) {
                return Response::json([
                    'errors' => 'Undifined Input'
                ]);
            }
            $rules[$key] = $requiredOnly[$key];
        }
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
        }
        $userId = request()->user()->id;
        $userProfile = Profile::where('user_id', $userId)->update(request()->all());
        return 1;
    }
    public function user_edit(Request $request)
    {
        if($request->type == 'email'){
            $rules = [
                'email' => 'required|unique:users',
            ];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }

            $user = User::find(Auth::user()->id);
            $user->email = $request->email;
            $user->save();
            Auth::guard('web')->logout();
        }elseif ($request->type == 'user_emails') {
            $rules = [
                'email' => 'required|unique:user_emails',
            ];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }

            $user = UserEmail::find($request->id);
            $user->email = $request->email;
            $user->save();
        }
        return 1;
    }
    public function new_emails(Request $request)
    {
        $rules = [
            'email' => 'required|unique:user_emails',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $emails = UserEmail::create([
            'user_id' => Auth::user()->id,
            'email' => $request->email,
        ]);
        
        return 1;
    }

    public function pwChange(Request $request)
    {
        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        $user = User::find(Auth::user()->id);


        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            Auth::guard('web')->logout();
            return 1;
        } else {
            return Response::json([
                'errors' => ['Wrong Password']
            ]);
        }
    }

    public function links_edit(Request $request)
    {
        $type = $request->type;
        $value = $request->newValue;

        $links = Userlinks::where('user_id', Auth::user()->id)->first();
        $links->$type = $value;
        $links->save();
        return 1;
    }

    public function banks_edit(Request $request)
    {
        $type = $request->type;
        $value = $request->newValue;

        $banks = Userbanks::where('user_id', Auth::user()->id)->first();
        $banks->$type = $value;
        $banks->save();
        return 1;
    }

    public function deactivate(Request $request)
    {
        $id = Auth::user()->id;
        Profile::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        Userlinks::where('user-id', $id)->delte();
        Userbanks::where('user-id', $id)->delte();
        Auth::guard('web')->logout();
        return 1;
    }

    

    public function faq()
    {
        $this->data['data'] = Faq::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
        $update = Faq::where('user_id', Auth::user()->id)->where('is_seen', '1')->update(['is_read'=>1]);
        
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        return view('frontend.dashboard.faq', $this->data);
    }

    public function faq_add(Request $request)
    {
        $rules = [
            'question' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $faq = new Faq;
        $faq->question = $request->question;
        $faq->user_id = Auth::user()->id;
        $faq->save();

        return 1;
    }
    public function faq_edit(Request $request)
    {
        $rules = [
            'question' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $faq = Faq::find($request->id);
        $faq->question = $request->question;
        $faq->user_id = Auth::user()->id;
        $faq->save();

        return 1;
    }

    public function faq_remove(Request $request)
    {
        Faq::where('id', $request->id)->delete();
        return 1;
    }

    public function vehicles()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $this->data['shippings'] = Shipping::orderBy('id', 'DESC')->get();

        $this->data['data'] = Vehicle::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->with('drivere')->get();
        // return $this->data['data'];
        $this->data['count'] = Vehicle::where('user_id', Auth::user()->id)->count();
        $this->data['drivers'] = request()->user()->drivers()->with('informationAsDriver')->get();
        $this->data['drivers2'] = request()->user()->drivers()->with('informationAsDriver')->take(5)->get();
        
        // return $this->data['drivers'];
        // return $this->data['data'][0]['drivere'];
        return view('frontend.dashboard.new-vehcile', $this->data);
    }

    public function getDrivers(Request $request)
    {
        $drivers = \DB::table('drivers')->join('user_profiles', 'drivers.profile_id', '=', 'user_profiles.id')
                                  ->where('drivers.company_id', '=', Auth::user()->id)
                                  ->where(function ($query) use ($request) {
                                      $query->where(DB::raw('CONCAT(user_profiles.first_name, " ", user_profiles.last_name)'), 'like', '%' . $request->text . '%');
                                  })->groupBy('drivers.profile_id')->get(['user_profiles.id','user_profiles.first_name','user_profiles.last_name','user_profiles.phone']);

        /*$drivers = \DB::table('users')->join('drivers','users.id','=','drivers.user_id')
                            ->join('user_profiles','users.id','=','user_profiles.user_id')
                            ->where('drivers.company_id','=',Auth::user()->id)
                            ->where(function ($query) use ($request) {
                                $query->where('users.name', 'like', '%' . $request->text . '%');
                            })->groupBy('drivers.profile_id')->get(['users.email','users.name','users.id','user_profiles.phone']);*/
        if (!empty($drivers)) {
            return Response::json($drivers);
        } else {
            return 0;
        }
    }

    public function editDriver(Request $request)
    {
        $relation = Driver::where('vehichle_id', '=', $request->car_id)->where('company_id', '=', Auth::user()->id)->first();

        if (!isset($relation)) {
            Driver::create([
                'profile_id' => $request->driver_id,
                'vehichle_id' => $request->car_id,
                'company_id' => Auth::user()->id,
            ]);
        } else {
            $driver_cars = Driver::where('vehichle_id', '=', $request->car_id)->where('company_id', '=', Auth::user()->id)->first();
            $driver_cars->profile_id = $request->driver_id;
            $driver_cars->save();
        }
        $profile = Profile::find($request->driver_id);

        if ($profile->user_id != 0) {
            $user = \DB::table('users')->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                                ->where('user_profiles.id', '=', $request->driver_id)
                                ->first();
        } else {
            $user = Profile::where('id', $request->driver_id)->first();
        }

        return Response::json($user);
    }

    public function vehicles_add(Request $request)
    {
        $rules = [
            'ship_name'  => 'required|max:255',
            'driver' =>'required|exists:user_profiles,id',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        
        $vehicle = new Vehicle;

        $vehicle->ship_name = $request->ship_name;
        $vehicle->ship_id = $request->ship_id;
        $vehicle->weight = $request->weight;
        $vehicle->model = $request->model;
        $vehicle->number = $request->number;
        $vehicle->address = $request->address;
        $vehicle->home = $request->home;
        $vehicle->country = $request->country;
        $vehicle->city = $request->city;
        $vehicle->region = $request->government;
        $vehicle->postal_code = $request->postal_code;
        $vehicle->first_reg = $request->first_reg;
        $vehicle->user_id = Auth::user()->id;
        $vehicle->status = 1;
        $vehicle->save();

        $profile = Profile::where('id', $request->driver)->first();
        

        if ($profile->user_id == 0) {
            Driver::create([
                'vehichle_id' => $vehicle->id,
                'company_id' => Auth::user()->id,
                'profile_id' => $profile->id,
            ]);
        } else {
            Driver::create([
                'user_id' => $profile->user_id,
                'vehichle_id' => $vehicle->id,
                'company_id' => Auth::user()->id,
                'profile_id' => $profile->id,
            ]);
        }

        
        
        return 1;
    }
    public function newDriver()
    {
        // return response('ahmed', 500);
        $rules = [
            'email'=>'email|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        $user = User::create([
            'name'=>request()->first_name.' '.request()->last_name,
            'email'=>request()->email,
            'password'=>bcrypt(request()->password),

        ]);
        
        $profile = $user->profile()->create([
            'first_name'=>request()->first_name,
            'last_name'=>request()->last_name,
            'phone'=>request()->phone,
            'adress'=>request()->adress,
            'home'=>request()->home,
            'country'=>request()->country,
            'postal_code'=>request()->postal_code,
            'district'=>request()->city,
            'home_phone'=>request()->home_phone,
            'status'=>'Driver',

        ]);
        $userBanks = $user->banks()->create([
            'owner'=> $user->name,
            
        ]);
        $userLinks = $user->links()->create([
            'user_id' => $user->id,
        ]);
        $role = Role::where('name', 'driver')->first();
        $userRoles = $user->roles()->create([
            'role_id'=>$role->id
        ]);
        $driver = Driver::create([
            'user_id'=>$user->id,
            'company_id'=>Auth::user()->id,
            'profile_id'=>$profile->id,
        
        ]);
        return $user;
    }

    public function vehicles_update(Request $request)
    {
        $rules = [
            'ship_name'  => 'required|max:255',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $vehicle = Vehicle::find($request->id);


        $vehicle->ship_name = $request->ship_name;
        $vehicle->ship_id = $request->ship_id;
        $vehicle->weight = $request->weight;
        $vehicle->model = $request->model;
        $vehicle->number = $request->number;
        $vehicle->address = $request->address;
        $vehicle->country = $request->country;
        $vehicle->city = $request->city;
        $vehicle->postal_code = $request->postal_code;
        $vehicle->first_reg = $request->first_reg;

        $vehicle->save();

        $driver = Driver::where('company_id', Auth::user()->id)->where('vehichle_id', $request->id)->first();
        $driver->profile_id = $request->driver;
        $driver->save();

        return 1;
    }

    public function vehicles_delete(Request $request)
    {
        Vehicle::where('id', $request->id)->delete();
        Driver::where('vehichle_id', $request->id)->delete(true);
        return 1;
    }

 
    public function documents_add(Request $request)
    {
        $rules = [
            'type'  => 'required|exists:documents_types,id',
            'description'  => 'required',
            'documentDate' =>'required|date',
            'image' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/documents');
        $image->move($destinationPath, $name);

        $doc = new Document;

        // $doc->name = $request->name;
        $doc->type = $request->type;
        $doc->documentDate = $request->documentDate;
        $doc->description = $request->description;
        $doc->img = $name;
        $doc->user_id  = Auth::user()->id;
        $doc->save();

        return 1;
    }
    public function tax_add()
    {
        $rules = [
            'add-tax-id'  => 'required',
            'add-tax-number'  => 'required',
            'add-tax-ministry' =>'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        auth()->user()->taxes()->create([
            'tax_id'=>request('add-tax-id'),
            'tax_number'=>request('add-tax-number'),
            'ministry'=>request('add-tax-ministry'),
        ]);
        return 1;
    }
    public function documents_delete(Request $request)
    {
        Document::where('id', $request->id)->delete();
        return 1;
    }

    public function download_attach(Request $request, $id)
    {
        $doc = Document::find($id);

        $filepath = public_path('images/documents/').$doc->img;
        return Response::download($filepath);
    }

    public function edit_type(Request $request)
    {
        // return app('geocoder')->geocode('Los Angeles, CA')->get();
        $type = $request->type;
        $vehicle = Vehicle::find($request->id);
        
        if ($type == 'number') {
            $vehicle->number = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'address') {
            $vehicle->address = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'postal_code') {
            $vehicle->postal_code = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'city') {
            $vehicle->city = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'country') {
            $vehicle->country = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'weight') {
            $vehicle->weight = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'home') {
            $vehicle->home = $request->newValue;
            $vehicle->save();
        } elseif ($type == 'region') {
            $vehicle->region = $request->newValue;
            $vehicle->save();
        }


        return 1;
    }

    public function edit_first_reg(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $vehicle->first_reg = $request->newValue;
        $vehicle->save();
            
        return 1;
    }

    public function edit_status(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $vehicle->status = $request->status;
        $vehicle->save();
            
        return 1;
    }

    public function edit_driver(Request $request)
    {
        $type = $request->type;
        $profile = Profile::find($request->id);

        if ($type == 'name') {
            $name = explode(' ', $request->newValue, 2);
            $profile->first_name = $name[0];
            $profile->last_name = $name[1];
            $profile->save();
        } elseif ($type == 'phone') {
            $profile->phone = $request->newValue;
            $profile->save();
        }
    }

    public function orders(Request $request)
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();

        $this->data['orders'] = Order::orderBy('id', 'DESC')->get();



        return view('frontend.dashboard.order', $this->data);
    }
    
    public function howToUse()
    {
        $this->data['profile'] = Profile::where('user_id', Auth::user()->id)->where('is_admin', 0)->first();
        
        return view('frontend.dashboard.howToUse', $this->data);
    }
}
