<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class CompletedProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        // return $request->user();
        $profile = $user->profile;
        if (!$profile) {
            $errors = ['noProfile'=>trans('frontend/completed.noProfile')];
            return redirect()->route('user.profile')->withErrors($errors);
        }
        $rules = [
            // 'first_name'=>'required',
            // 'last_name'=>'required',
            // 'postal_code'=>'required|regex:/\b\d{5}\b/',
            // // 'license_no' =>'required|numeric',
            // 'country'=>'required',
            // 'district'=>'required'
        ];
        
        $errors = $this->generateErrors($rules, $profile->toArray());
        if ($errors) {
            $errors->errors()->add('IncompletedValues', trans('frontend/completed.title'));
            return redirect()->route('user.profile')
                                ->withErrors($errors);
        }

        return $next($request);
    }
    public function generateErrors($rules, $toBeValidated)
    {
        $messages = require resource_path('lang/'.\App::getLocale().'/frontend/completed.php');
        $validator = Validator::make($toBeValidated, $rules, $messages);

        if ($validator->fails()) {
            return $validator;
        }
        return null;
    }
}
