<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Mail\MailSender;
use App\Models\Backend\Emails;
use Illuminate\Support\Facades\Validator;

class SocialAuthController extends Controller
{
    public function redirect($service)
    {
        session(['lastProvider'=>'login']);
        return \Socialite::driver($service)->redirect();
    }
    public function redirectRegister($service)
    {
        $rules = [
            'country'=>'required',
            'city'=>'required',
            'postal'=>'regex:/\b\d{5}\b/',
        ];
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) {
            $validator->errors()->add('LocationError', trans('frontend/login.cannotReachLocation'));
            
            return redirect()->route('register')
                    ->withInput(array_merge(request()->all(), ['service'=>$service]))
                        ->withErrors($validator);
        }
        session(['lastProvider'=>'register']);
        session(['formatedAdress'=>request()->adress]);
        if (request()->city) {
            session(['city'=>request()->city]);
        }
        if (request()->country) {
            session(['country'=>request()->country]);
        }
        if (request()->postal) {
            session(['postal_code'=>request()->postal]);
        }
        return \Socialite::driver($service)->redirect();
    }
    public function callback($service)
    {
        if (session()->has('lastProvider')) {
            $user = \Socialite::driver($service)->user();
            // return response()->json($user);
            if (!$user->getEmail()) {
                if (session('lastProvider')=='register') {
                    return redirect()->route('register')->withErrors(trans('frontend/login.noEnoughInfo'));
                } else {
                    return redirect()->route('login')->withErrors(trans('frontend/login.noEnoughInfo'));
                }
            }
            if (session('lastProvider')=='login') {
                return $this->loginFunction($service, $user);
            } elseif (session('lastProvider')=='register') {
                return $this->RegisterFunction($service, $user);
            }
        }
        return abort(403, 'Unauthorized action.');
    }
    public function loginFunction($service, $user)
    {
        $authUser = $this->FindLoginUser($user, $service);
        if ($authUser) {
            \Auth::login($authUser, true);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('login')->withErrors('Somethng wrong with your login data !');
        }
    }
    public function FindLoginUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        } else {
            return null;
        }
    }
    public function RegisterFunction($service, $user)
    {
        $authUser = $this->RegisterNewUser($user, $service);
        if ($authUser) {
            \Auth::login($authUser, true);
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('register')->withErrors('Somethng wrong with your login data !');
        }
    }
    public function RegisterNewUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return null;
        }
        $CreatedUser =  User::create([
            'name'     => $user->name,
            'email'    => $user->getEmail(),
            'password' => null
        ]);
        $userProfile = Profile::create([
            'first_name'=>$user->getName(),
            'last_name'=>' ',
            'image'=>$user->getAvatar(),
            'address'=>session('formatedAdress'),
            'user_id'=>$CreatedUser->id,
            'country'=>session('country'),
            'district'=>session('city'),
            'postal_code'=>session('postal_code'),

        ]);
        $this->sendMailToUser($CreatedUser, $userProfile);
        return $CreatedUser;
    }
    public function sendMailToUser(User $user, $userProfile)
    {
        $RegisterEmail = Emails::where('title', 'register')->first();
        if (!$RegisterEmail) {
            return false;
        }
        // return 1;
        $data = [
            'firstname' => $user->name,
            'registerConfirmLink'=> 'http://185.158.249.97:81',
            'MrOrMrs'=> $userProfile->gender == 'Herr' ? trans('main.mr') : trans('main.mrs'),
            
        ];
        $GeneratedEmail = $RegisterEmail->parse($data);

        \Mail::to($user->email, $user->name)->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'ahmed@ahmed.com','name'=>'ahmed']]));
        return 1;
    }
}
