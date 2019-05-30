<?php

namespace App\Http\Controllers\Backend;

//namespace App\Http\Controllers\Frontend\Dashboard\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\User;
use App\Models\Frontend\Driver;
use App\Models\Backend\Admin;
use App\Models\Backend\Permission;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\Userroles;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Role;
use DB;
use Hash;
use Config;
use Carbon;
use Auth;
use Validator;
use Input;
use Response;
use App\Models\Backend\AdminProfile;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->get();
        $roles = Role::orderBy('id', 'DESC')->get();
        $type = null;
        return view('backend.adminlte.users.users', compact('data', 'roles', 'type'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function getData(Request $request)
    {
        $type = $request->type;
        $data = [];

        if ($type == 'User') {
            $profiles = Profile::where('status', 'User')->get();
            foreach ($profiles as $key => $value) {
                $data [] = User::find($value->user_id);
            }
            return view('backend.adminlte.users.Ajax.type', compact('data', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($type == 'Company') {
            $profiles = Profile::where('status', 'Company')->get();
            foreach ($profiles as $key => $value) {
                $data [] = User::find($value->user_id);
            }
            return view('backend.adminlte.users.Ajax.type', compact('data', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
        } elseif ($type == 'Driver') {
            $profiles = Profile::where('status', 'Driver')->get();
            foreach ($profiles as $key => $value) {
                if ($value->user_id != 0) {
                    $user = User::find($value->user_id);
                    $data [] = [
                        'name'=> $value->first_name.' '.$value->last_name,
                        'email'=>$user->email,
                        'id'=> $user->id,
                        'phone' => $value->phone,
                        'postal_code' => $value->postal_code,
                        'profile_id' => $value->id,
                    ];
                } else {
                    $data [] = [
                        'name'=> $value->first_name.' '.$value->last_name,
                        'email'=>'',
                        'id'=> $value->user_id,
                        'phone' => $value->phone,
                        'postal_code' => $value->postal_code,
                        'role' => $value->status,
                        'profile_id' => $value->id,
                    ];
                }
            }
            return view('backend.adminlte.users.Ajax.loadDrivers', compact('data', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            $data = User::orderBy('id', 'DESC')->get();
            return view('backend.adminlte.users.Ajax.LoadAllUsers', compact('data', 'type'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }


    public function getAdmins()
    {
        $data = [];
        $roles = Role::orderBy('id', 'DESC')->get();
        $type = 'admin';
        $hidden = true;
        $specialLoad = route('users.admin');
        
        return view('backend.adminlte.users.users', compact('data', 'specialLoad', 'roles', 'type', 'hidden'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function getRoles()
    {
        $data = [];
        $roles = Role::orderBy('id', 'DESC')->get();
        $type = 'roles';
        $hidden = true;
        $specialLoad = route('users.rolesUser');
        
        return view('backend.adminlte.users.users', compact('data', 'specialLoad', 'roles', 'type', 'hidden'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function usersWithFilter(Request $request, $type)
    {
        $this->checkForFilters($type);
        $data = User::filters($type);
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('backend.adminlte.users.users', compact('data', 'roles', 'type'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function checkForFilters($type)
    {
        $filters = [
            'company',
            'user',
            'driver',
            'admin',
            
        ];
        if (!in_array($type, $filters)) {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /********************************New Functions ***********************************************************/

    public function user_index(Request $request)
    {
        $type = $request->type;
        $data = User::orderBy('id', 'ASC')->get();
        $roles = Role::orderBy('id', 'ASC')->get();
        $profile = Profile::orderBy('id', 'ASC')->get();
        if ($type!=null) {
            $data = User::orderBy('id', 'ASC')->whereHas('profile', function ($q) use ($type) {
                return $q->where('status', $type);
            })->get();
            $profile = [];
            foreach ($data as $key=>$value) {
                array_push($profile, $value->profile);
            }
        } elseif ($type == null) {
            $data = User::orderBy('id', 'ASC')->get();
            $roles = Role::orderBy('id', 'ASC')->get();
            $profile = Profile::orderBy('id', 'ASC')->get();
        }
        
        if ($request->ajax()) {
            $data = [];

            if ($type == 'Driver') {
                $profiles = Profile::where('status', 'Driver')->get();
                foreach ($profiles as $key => $value) {
                    if ($value->user_id != 0) {
                        $user = User::find($value->user_id);
                        $data [] = [
                            'name'=> $value->first_name.' '.$value->last_name,
                            'email'=>$user->email,
                            'id'=> $user->id,
                            'phone' => $value->phone,
                            'postal_code' => $value->postal_code,
                            'profile_id' => $value->id,
                        ];
                    } else {
                        $data [] = [
                            'name'=> $value->first_name.' '.$value->last_name,
                            'email'=>'',
                            'id'=> $value->user_id,
                            'phone' => $value->phone,
                            'postal_code' => $value->postal_code,
                            'role' => $value->status,
                            'profile_id' => $value->id,
                        ];
                    }
                }
                return view('backend.adminlte.users.Ajax.loadDrivers', compact('data', 'type'))->render();
            } else {
                $this->data['data']= $data;
                $this->data['roles']= $roles;
                $this->data['profile']= $profile;
                $this->data['type']= $type;
                return view('backend.adminlte.users.Ajax.LoadAllUsers', $this->data)->render();
            }
        }
        return view('backend.adminlte.users.users', compact('data', 'roles', 'profile', 'type'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function roles_index(Request $request)
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        $permission = Permission::orderBy('id', 'ASC')->get();
        return view('backend.adminlte.users.users_roles', compact('roles', 'permission'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    
    public function addUser(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
            'roles' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['name'] = $request->first_name.' '.$request->last_name;

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            \DB::table('user_roles')->insert([
                'user_id' => $user->id,
                'role_id' => $value,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $type = '';

        if ($request->type == 'User') {
            $type = 'User';
        } elseif ($request->type == 'Company') {
            $type = 'Company';
        } elseif ($request->type == 'Driver') {
            $type = 'Driver';
        } else {
            $type = '';
        }

        // create user profile on the fly
        $expireDate = Carbon::today()->addWeeks(1)->toDateString();
        $profile = new Profile(array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'home_phone' => $request->home_phone,
            'address' => $request->street,
            'home' => $request->home,
            'district' => $request->district,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'company' => $request->company,
            'status' => $type,
            'user_status_id' => 1,  // active
            'expire_date' => $expireDate,
        ));

        $user->profile()->save($profile);
        return 1;
    }

    public function removeUser(Request $request)
    {
        User::where('id', $request->id)->delete();
        Profile::where('user_id', $request->id)->delete();
        \DB::table('user_roles')->where('user_id', $request->id)->delete();
        \DB::table('user_links')->where('user_id', $request->id)->delete();
        \DB::table('user_banks')->where('user_id', $request->id)->delete();
        return 1;
    }

    public function removeDriver(Request $request)
    {
        
        Profile::where('user_id', $request->profile_id)->delete();
        Driver::where('profile_id',$request->profile_id)->delete();
        return 1;
    }

    public function editUser(Request $req)
    {
        if ($req->user_id == 0) {
            abort(404);
        } else {
            $data = User::where('id', '=', $req->user_id)->get();
            $profile = Profile::where('user_id', '=', $req->user_id)->where('is_admin', '=', 0)->first();
            $user_id=$req->user_id;
            $roles_id = \DB::table('user_roles')->where('user_id', '=', $user_id)->get();
            $user_roles = [];
            foreach ($roles_id as $key => $value) {
                $user_roles[] = Role::where('id', $value->role_id)->first();
            }
            $roles = Role::orderBy('id', 'ASC')->get();
           
            return view('backend.adminlte.users.edituser', compact('data', 'roles', 'user_id', 'profile', 'user_roles'));
        }
    }

    public function editUserAcc(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|email|unique:users,email,',
            'roles' => 'required'
        ]);*/
        

        $input = $request->all();
        if ($request->filled('password')) {
            $rules = [
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|same:password',
            ];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }
            $user = User::find($request->id);
            $user->password= Hash::make($request->password);
            $user->save();
        }

        DB::table('user_roles')->where('user_id', $request->id)->delete();

        $roles = $request->roles;
        for ($i=0 ; $i < count($roles) ; $i++) {
            \DB::table('user_roles')->insert(
                    ['user_id' => $request->id , 'role_id' => $roles[$i]]
                );
        }
        return 1;
    }

    public function editUserProfile(Request $request)
    {
        $profile = Profile::where('user_id', $request->id)->first();
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        // $profile->fax = $request->fax;
        // $profile->company = $request->company;
        $profile->phone = $request->phone;
        // $profile->url = $request->url;
        $profile->expire_date = $request->expire_date;
        $profile->user_status_id = $request->user_status_id;
        $profile->save();

        
        return 1;
    }


    public function editUserAddress(Request $request)
    {
        $profile = Profile::where('user_id', $request->id)->first();

        $profile->company = $request->company;
        $profile->address = $request->address;
        $profile->district = $request->district;
        $profile->postal_code = $request->postal_code;

        $profile->save();
        
        return 1;
    }

   

    /********************************New Functions ***********************************************************/


    /****************************************************************************************/

    public function inactivate_users_index(Request $request, $type=null)
    {
        $data =[];
        
        if ($type!=null) {
            $user = Profile::where('is_admin', '=', 0)->where('user_status_id', '=', 2)->where('status', $type)->orderBy('id', 'ASC')->get();
        } elseif ($type == 'All' || $type == null) {
            $user = Profile::where('is_admin', '=', 0)->where('user_status_id', '=', 2)->orderBy('id', 'ASC')->get();
        }
        foreach ($user as $key => $value) {
            $data[] = User::where('id', '=', $value->user_id)->first();
        }
        $this->data['data'] = $data;
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadInactivatedUsers', $this->data)->render();
        }
    }

   

   

    public function new(Request $request)
    {
        $dateS = Carbon::now()->startOfMonth();
        $dateE = Carbon::now()->endOfMonth();
        $type = $request->type;
        if ($type!=null) {
            $data = User::whereBetween('created_at', [$dateS,$dateE])->whereHas('profile', function ($q) use ($type) {
                return $q->where('status', $type);
            })->orderBy('id', 'ASC')->get();
        } elseif ($type == 'All' || $type == null) {
            $data = User::whereBetween('created_at', [$dateS,$dateE])->orderBy('id', 'ASC')->get();
        }
        $this->data['data'] = $data;
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadNewUsers', $this->data)->render();
        }
    }

    public function pend(Request $request)
    {
        $type = $request->type;
        if ($type!=null) {
            $data = [];
            $user = Profile::where('user_status_id', 3)->where('is_admin', '=', 0)
                ->where('status', $type)->get();
            foreach ($user as $key => $value) {
                $data[] = User::where('id', '=', $value->user_id)->first();
            }
        } elseif ($type == 'All' || $type == null) {
            $data =[];
            $user = Profile::where('user_status_id', '=', 3)->where('is_admin', '=', 0)->get();
            foreach ($user as $key => $value) {
                $data[] = User::where('id', '=', $value->user_id)->first();
            }
        }

        $this->data['data'] = $data;
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadPendingUsers', $this->data)->render();
        }
    }

    public function susp(Request $request, $type=null)
    {
        $type = $request->type;
        if ($type!=null) {
            $data = [];
            $user = Profile::where('user_status_id', 4)->where('is_admin', '=', 0)
                ->where('status', $type)->get();
            foreach ($user as $key => $value) {
                $data[] = User::where('id', '=', $value->user_id)->first();
            }
        } elseif ($type == 'All' || $type == null) {
            $data =[];
            $user = Profile::where('user_status_id', '=', 4)->where('is_admin', '=', 0)->get();
            foreach ($user as $key => $value) {
                $data[] = User::where('id', '=', $value->user_id)->first();
            }
        }

        $this->data['data'] = $data;
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadSuspendedUsers', $this->data)->render();
        }
    }
    public function expire(Request $request, $type=null)
    {
        $type = $request->type;
        $data =[];
        $user = Profile::where('expire_date', '<', Carbon::now()->format('Y-m-d'))->where('is_admin', '=', 0);
        if ($type!=null) {
            $user = $user->where('status', $type);
        } elseif ($type == 'All' || $type == null) {
            $user = $user->get();
            foreach ($user as $key => $value) {
                $one = User::where('id', '=', $value->user_id)->first();
                
                $data[] =[
                     'id' => $value->user_id,
                     'email' => $one->email,
                     'created_at' => $one->created_at,
                     'expire_date' => $value->expire_date,
                ];
            }
        }
        $this->data['data'] = $data;
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadExpireUsers', $this->data)->render();
        }
    }

    public function admin(Request $request)
    {
        $emptyUsers = Admin::whereDoesntHave('profile')->get();
        foreach ($emptyUsers as $user) {
            $profile = AdminProfile::create([
                'adress'=>'',
                'phone'=>'',
                'email'=>''
            ]);
            $user->profile()->save($profile);
        }
        $data = Admin::orderBy('id', 'ASC')->with('profile')->get();
        $this->data['data'] = $data;
        
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadAdmins', $this->data)->render();
        }
    }

    public function addAdmin(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|same:password',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['name'] = $request->name;

        $user = Admin::create($input);
     
        return 1;
    }

    public function removeAdmin(Request $request)
    {
        // return request()->id;
        return User::find(request()->id);
        User::find(request()->id)->delete();
        return 1;
    }

    public function editAdmin(Request $request)
    {
        /*$this->validate($request, [
            'email' => 'required|email|unique:users,email,',
            'roles' => 'required'
        ]);*/
        $rules= [
            'admin_adress'=>'required',
            'admin_phone'=>'required',
            'admin_email'=>'required|email'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
        }
        $input = $request->all();
        if ($request->filled('password')) {
            $rules = [
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|same:password',
            ];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json([
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }
            $user = Admin::find($request->id);
            $user->password= Hash::make($request->password);
            $user->name = $request->name;
            $user->save();
        } else {
            $user = Admin::find($request->id);
            $user->name = $request->name;
            $user->save();
        }
        $user->profile()->update([
            'email'=>request()->admin_email,
            'phone'=>request()->admin_phone,
            'adress'=>request()->admin_adress
        ]);
        // return $user->profile;
        return 1;
    }


    public function rolesUser(Request $request)
    {
        $data = Role::orderBy('id', 'ASC')->get();
        

        $this->data['data'] = $data;
        if ($request->ajax()) {
            return view('backend.adminlte.users.Ajax.LoadRoleUsers', $this->data)->render();
        }
    }

    public function subadmin(Request $request)
    {
        $this->data['data'] = User::whereHas('profile',function($query){
            $query->where('status','Domain');
        })->get();
        return view('backend.adminlte.subadmin.index', $this->data);
    }

    public function storeSub(Request $request){
        $rules = [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'company'  => 'required|regex:/^\S*$/u',
            'domain' => 'required',
        ];
        
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['name'] = 'Domain';

        $role = Role::where('name','domain')->first();

        $user = User::create($input);

        $profile = $user->profile()->save(new Profile);
        $profile->company = $request->company;
        $profile->status = $input['name'];
        $profile->save();

        $user->banks()->save(new Userbanks(['user_id'=>$user->id]));
        $user->links()->save(new Userlinks(['website'=>$request->domain]));
        $user->roles()->save(new Userroles(['role_id'=>$role->id]));

        return 1;

    }


    public function destroySub(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        $user->profile()->delete();

        return 1;
    }

}
