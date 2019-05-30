<?php

namespace App\Http\Controllers\Frontend\tours;

use Illuminate\Http\Request;
use App\Models\Frontend\User;
use App\Models\Frontend\Profile;
use App\Mail\MailSender;
use App\Models\Backend\Emails;

// use App\Http\Controllers\Controller;

class tourAuthenticationController extends ToursControllerAdditional
{

    //
    
    public function register($encrypted)
    {
        if (request()->user()) {
            abort(401, trans('front/touroffers.loggedIn'));
        }
        $tour = $this->getTourId($encrypted);
        
        if ($tour->company_profile) {
            abort(response([
                'errors'=>[
                    'not allowed'=>[trans('front/touroffers.notallowed')]
                ]
            ], 422));
        }
        $this->validateRegister();
        $user = User::create([
            'name'=>request()->first_name.' '.request()->nick_name,
            'email'=>request()->email,
            'password'=>bcrypt(request()->password),
        ]);
       
        $user->profile()->updateOrCreate([], [
            'first_name'=>request()->first_name,
            'last_name'=>request()->nick_name,
            'phone'=>request()->phone,
            'status'=>'business_customer'
        ]);
        $user->banks()->updateOrCreate([], [
            'owner'=> request()->first_name." ".request()->nick_name,
        ]);
        $user->links()->updateOrCreate([], [
            
        ]);
        $tour->company_profile()->associate($user->profile);
        $tour->save();
        $this->sendMailToUser($user, $user->profile);
        $this->sendVerifyEmail($user);
        \Auth::login($user);
        return $this->tourFormula($tour);
    }
    public function validateRegister()
    {
        $this->validate(request(), [
            'first_name'=>'required|max:255',
            'nick_name'=>'required|max:255',
            'phone'=>'required|phone_number',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6|max:255',
        ]);
    }
    public function resendEmail($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        if (!$tour->company_profile) {
            abort(401);
        }
        $user = \App\Models\Frontend\Profile::find($tour->company_profile->id)->user;
        if (!$tour->company_profile||!$user) {
            abort(401);
        }
        $this->sendVerifyEmail($user);
        return 'sent';
    }
    public function sendVerifyEmail(User $user)
    {
        $verfiyEmail = Emails::where('title', 'emailverification')->first();
        $encrypted = encrypt($user->email.'-'.$user->id);
        $data = [
            'first_name'=>$user->profile->first_name,
            'last_name'=>$user->profile->last_name,
            'verify_link'=>url('/user/verify/'.$encrypted),
            'site_url'=>url('/').'/'
        ];
        $GeneratedEmail = $verfiyEmail->parse($data);
        
        \Mail::to($user->email, $user->name)
        ->send(new MailSender($GeneratedEmail[1], $GeneratedEmail[0], [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
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
    public function verification($encrypted)
    {
        $str = decrypt($encrypted);
        $str = explode('-', $str);
        $id = end($str);
        $user = User::findOrFail($id);
        $mytime = \Carbon\Carbon::now();
        if (!$user->email_verified_at) {
            $user->update([
                'email_verified_at'=>$mytime,
            ]);
        }
       
        
        event(new \App\Events\EmailAuthenticated($user));
        echo "<script>window.close();</script>";
        return 'success';
        // return end($str);
    }
    public function index($encrypted)
    {
        $tour = $this->getTourId($encrypted);
        return auth()->check()?1:0;
    }
}
