<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Frontend\Driver;
use Illuminate\Http\Request;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Offer;
use App\Models\Backend\Emails;
use App\Models\Frontend\Vehicle;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\Userroles;
use App\Models\Frontend\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use Auth;
use DB;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function deleteDriver($id)
    {
       $profile = Profile::find($id);
        $driverVehicles = Driver::where('profile_id',$profile->id);
        
        if(($profile->user&&$profile->user->status=='Company')||($profile->user&&$profile->user->id == request()->user()->id)){
            abort(404);
        }
        $driverVehicles->update([
            'profile_id'=>request()->user()->profile->id,
            'user_id'=>request()->user()->id
        ]);
       if($profile->user_id == 0 ){
            $profile->delete();
            Driver::where('profile_id',$profile->id)
            ->where('profile_id','!=',request()->user()->profile->id)
            ->where('company_id',Auth::user()->id)->delete();
       }else{
            $profile->delete();
            User::where('id',$profile->user_id)->delete();
            Offer::where('user_id',$profile->user_id)->delete();
            Vehicle::where('user_id',$profile->user_id)->delete();
            Userlinks::where('user_id',$profile->user_id)->delete();
            Userbanks::where('user_id',$profile->user_id)->delete();
            Userroles::where('user_id',$profile->user_id)->delete();
            Driver::where('user_id',$profile->user_id)->where('user_id','!=',request()->user()->id)->where('company_id',Auth::user()->id)->delete();
       }

       return 1;

    }
    public function validUnValid(User $driver, $state)
    {
        $isFound =  Driver::where('user_id', $driver->id)->where('company_id', auth()->user()->id);
        if ($isFound->count()!=0) {
            $driver->profile()->update([
                'is_driver_valid'=>$state=='true' ? 1 : 0,
            ]);
            return $state;
        }
        abort(403, 'Unauthorized Action.');
    }
    public function getOrderIcon($id)
    {
        $color = request()->input('color', '#ff0000');
        return view('frontend.dashboard.ordericon')->with(compact('id', 'color'), header('content-type', 'image/svg'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(User $driver)
    {
        // return 'ahmed';
        if (!request()->user()->drivers()->get()->where('id', $driver->id)->count()) {
            abort(403, 'Unauthorized action.');
        }
        return User::where('id', $driver->id)->asDriver()->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }

    public function newDriver(Request $request){

        $rules = [
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

        
        /*$user = User::create([
            'name'=>request()->first_name.' '.request()->last_name,
        ]);

        $userBanks = $user->banks()->create([
            'user_id' => $user->id,
            'owner'=> $user->name,
            
        ]);
        $userLinks = $user->links()->create([
            'user_id' => $user->id,
        ]);
        $role = Role::where('name', 'driver')->first();
        $userRoles = $user->roles()->create([
            'user_id' => $user->id,
            'role_id'=>$role->id,
        ]);*/

        $profile = Profile::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            //'user_id'   => $user->id,
            'status' => 'Driver',
        ]);

        $driver = Driver::create([
            'company_id'=> Auth::user()->id,
            'profile_id'=> $profile->id,
            //'user_id'   => $user->id,
        ]);



        return 1;

    }

    public function edit_name(Request $request){
        $profile = Profile::find($request->id);
        $name = explode(' ',$request->newValue , 2);
        $profile->first_name = $name[0];
        $profile->last_name = $name[1];
        $profile->save();

        return 1;
    }

    public function edit_phone(Request $request){
        $profile = Profile::find($request->id);
        $profile->phone = $request->newValue;
        $profile->save();

        return 1;
    }

    public function edit_email(Request $request){
        $profile = Profile::find($request->id);
        $user_id = $profile->user_id;

        $user = User::find($user_id);

        $user->email = $request->newValue;
        $user->save();

        return 1;
    }

    public function sendPw($password,$email,$name){
        $RegisterEmail = Emails::where('title', '=', 'DriverPw')->first();

        $data = [
            'name' => $name,
            'email'=> $email,
            'password'=> $password,
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);

        $data = [
            'no-reply' => 'admin@kurier-link.com',
            'name'     => 'Kurier link click to transport',
            'subject'    => $GeneratedEmail[0],
            'content'    => $GeneratedEmail[1],
            'email'    => $email,
            'url'     => route('login'),
        ];
        \Mail::send(
            'frontend.emails.driverpw',
            ['data' => $data],
            function ($message) use ($data) {
                $message
                    ->from($data['no-reply'], $data['name'])
                    ->to($data['email'])->subject($data['subject']);
            }
        );
    }

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); 
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); 
    }
    public function newUser(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
        ]);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
            
        $password = $this->randomPassword();
        

        $profile = Profile::find($request->profile_id);

        $user = User::create([
            'email' => $request->email,
            'password'=> bcrypt($password),
            'name'  => $profile->name(),
        ]);
        $user_id = $user->id;

        $profile = Profile::find($request->profile_id);
        $profile->user_id = $user_id;
        $profile->save();

        $name = $profile->name();

        $drivers = Driver::where('profile_id',$request->profile_id)->where('company_id',Auth::user()->id)->get();
        foreach ($drivers as $key => $value) {
            $value->user_id  = $user_id;
            $value->save();
        }

        $role = Role::where('name', 'driver')->first();

        Userroles::create([
            'user_id' => $user_id,
            'role_id' => $role->id,
        ]);

        Userbanks::create([
            'owner'=> $name,
            'user_id' => $user_id,
        ]);
        Userlinks::create([
            'user_id' => $user_id,
        ]);

        $this->sendPw($password,$request->email,$name);

        return 1;
    }

}
