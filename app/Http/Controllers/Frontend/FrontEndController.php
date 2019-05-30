<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Models\Frontend\Userlinks;
use App\Models\Frontend\Userbanks;
use App\Models\Frontend\Role;
use App\Models\Frontend\Userroles;
use App\Models\Frontend\Faq;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Carbon;
use Session;
use App\Mail\MailSender;
use App\Models\Backend\Emails;
use App\Models\Pages;
use App\Models\Backend\Admin;

use Illuminate\Foundation\Auth\ResetsPasswords;

class FrontEndController extends Controller
{
    use ResetsPasswords;
    //

    
    public function bewerbung()
    {
        return view('frontend.dashboard.bewerbung');
    }
    public function index()
    {
        return view('frontend.auth.login');
    }

    public function register()
    {
        return view("frontend.auth.register");
    }

    public function aboutUs()
    {
        return view("frontend.about");
    }

    public function imp()
    {
        return view("frontend.impressum");
    }

    public function contact()
    {
        $user = Admin::with('profile')->where('email','admin@admin.com')->first();
        return view("frontend.contact", compact('user'));
    }

    public function service()
    {
        return view("frontend.services");
    }

    public function faq()
    {
        $this->data['general'] = Faq::where('user_id', 0)->where('is_seen', 1)->take(10)->get();
        $this->data['other'] = Faq::where('user_id', '!=', 0)->where('is_seen', 1)->take(10)->get();
        return view("frontend.faq", $this->data);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        // return redirect(route('login'));
        return redirect('/');
    }

    public function postReg(Request $request)
    {
        // return request()->all();
        $rules = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required',
            // 'password_confirmation' => 'required|same:password',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $user = new User;
        
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user_id = $user->id;
        $code = '';
        if ($request->status == "User") {
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
        }
        $userProfile = Profile::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'address'=>$request->address,
            'district'=>$request->district,
            'home'=>$request->home,
            'address'=>$request->address,
            'status'=> $request->status,
            'user_id'=>$user_id,
            'pin'=>$code,
            'postal_code'=>$request->postal_code,
            'region'=>$request->region,
            'location'=>$request->location
            

        ]);
        // return $userProfile;
        Userbanks::create([
            'owner'=> $request->first_name." ".$request->last_name,
            'user_id' => $user_id,
        ]);
        Userlinks::create([
            'user_id' => $user_id,
        ]);

        $type = $request->status ;
        if ($type == 'User') {
            $role = Role::where('name', 'user')->first();
            Userroles::create([
                'user_id' => $user_id,
                'role_id' => $role->id,
            ]);
        } elseif ($type == 'Company') {
            $role = Role::where('name', 'company')->first();
            Userroles::create([
                'user_id' => $user_id,
                'role_id' => $role->id,
            ]);
        } elseif ($type == 'Driver') {
            $role = Role::where('name', 'driver')->first();
            Userroles::create([
                'user_id' => $user_id,
                'role_id' => $role->id,
            ]);
        }

        //sending email register.
        $this->sendMailToUser($user, $userProfile);
        return 1;
    }
    public function sendMailToUser(User $user, $userProfile)
    {
        $RegisterEmail = Emails::where('title', 'register')->first();
        $data = [
            'firstname' => $user->name,
            'registerConfirmLink'=> 'https://kurier-link.com',
            'email'=>$user->email,
            'password'=>request()->password,
            'MrOrMrs'=> $userProfile->gender == 'Herr' ? trans('main.mr') : trans('main.mrs'),
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);

        \Mail::to($user->email, $user->name)
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
        return 1;
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return  redirect()->back()->withInput()->withErrors($validator);
        }
        if ($request->input('remember')) {
            $remember=true;
        } else {
            $remember=false;
        }

        //dd(request()->all());
        if (Auth::guard('web')->attempt(['email'=> request('email'), 'password' => request('password')], $remember)) {
            $status = Auth::user()->profile->status;
            $status = lcfirst($status);
            if ($status == 'company') {
                return redirect('/'.$status.'/dashboard/orders');
            } elseif ($status == 'user') {
                return redirect('/'.$status.'/dashboard/pending');
            } elseif ($status == 'driver') {
                return redirect('/'.$status.'/dashboard');
            }elseif($status == 'subdomain'){
                return redirect('/admin/dashboard');
            }
        } else {
            return redirect()->back()->withInput()->withErrors('Somethng wrong with your login data !');
        }
    }

    public function reset()
    {
        return view('frontend.auth.reset');
    }

    public function postReset(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255|exists:users',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        //dd(env('MAIL_HOST'));
        $response = $this->broker()->sendResetLink($request->only(['email']));

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }


    public function qustion_store(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
            'question' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
        $custom = [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];
        $validator = Validator::make(Input::all(), $rules, $custom);
        if ($validator->fails()) {
            return Response::json([
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        $faq = new Faq;
        $faq->user_id = 0;
        $faq->email = $request->email;
        $faq->name = $request->name;
        $faq->question = $request->question;
        $faq->is_seen = 0;
        $faq->is_read = 1;
        $faq->save();

        return 1;
    }
}
