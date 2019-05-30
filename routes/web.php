<?php

use Illuminate\Support\Facades\Cache;
use App\Models\Frontend\Tour;
use Illuminate\Support\Facades\File;
use App\Mail\MailSender;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/user/verify/{encrypted}', 'Frontend\tours\tourAuthenticationController@verification');

Route::get('/test', function () {
    //return view('frontend.test');
    
    $data = ['tour_id'=>1];
    $pdf = PDF::loadView('frontend.pdf.tourDocument', $data);
    $path = storage_path('app/tours/documents/1.pdf');
    if (File::exists($path)) {
        // return response()->file($path);
        File::delete($path);
    }
    $pdf->save($path);
    
    return $pdf->inline();
    // return App\Models\Frontend\TourPayments::with('paymentDetails')->get();

    abort(404);
});
Route::post('/err', function () {
    // return request()->all();
    return 'ahmed';
});
Route::post('/geschaeftskundenportal/success/payment/{encrypted}', 'Frontend\tours\tourPayWireController@success');


Route::post('/getDates', ['as'=>'getDates','uses'=>'Backend\CustomerController@getDates']);



Route::get('/', function () {
    return view('frontend.home2');
})->name('main');
Route::get('/other', function () {
    return view('frontend.home');
});



// Route::get('/', function () {
//     return view('frontend.home2');
// })->name('main');

// Route::get('/updateDriverFunction', function () {
//     $companies =  \App\Models\Frontend\User::whereHas('profile',function($q){
//         return $q->where('status','Company');
//     })->get();
//     foreach($companies as $company){
//         $driver = \App\Models\Frontend\Driver::where('profile_id',$company->profile->id)
//             ->where('company_id',$company->id)->count();
//             if($driver ==0){

//                 \App\Models\Frontend\Driver::create([
//                     'profile_id'=>$company->profile->id,
//                     'company_id'=>$company->id
//                 ]);
//             }
//     }
// });
// Route::get('deletedProfiles',function(){
//     return App\Models\Frontend\Driver::whereDoesntHave('profile')->pluck('profile_id');
// });
// Route::get('/makeprofiletest', function () {
//     $user = new App\Models\Frontend\User();
//     $user->save();
//     $profile = new App\Models\Frontend\Profile();
//     $profile->status = 'Company';
//     $profile->user_id = $user->id;
//     $user->profile()->save($profile);
//     // $profile->save();
//     // $profile = new App\Models\Frontend\Profile();
//     // $profile->status = 'company';
//     // $profile->save();
// });

Route::get('/js/lang-{lang}.js', function ($lang) {
    // return $lang;
    Cache::forget('lang-'.$lang.'.js');
    $strings = Cache::remember('lang-{$lang}.js', 0, function () use ($lang) {
        
        // return $lang;
        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $files2 = glob(resource_path('lang/' . $lang . '/front/*.php'));
        $files3 = glob(resource_path('lang/' . $lang . '/frontend/*.php'));
        $files4 = glob(resource_path('lang/' . $lang . '/backend/*.php'));
        
        $strings = [];
        foreach ($files2 as $file) {
            $name   = basename($file, '.php');
            $strings['front'][$name] = require $file;
        }
        foreach ($files as $file) {
            $name   = basename($file, '.php');
            $strings[$name] = require $file;
        }
        foreach ($files3 as $file) {
            $name   = basename($file, '.php');
            $strings['frontend'][$name] = require $file;
        }
        foreach ($files4 as $file) {
            $name   = basename($file, '.php');
            $strings['backend'][$name] = require $file;
        }
        
        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n =  ' . json_encode($strings) . ';');
    exit();
})->name('assets.lang');
// Route::get('/countrytest', function () {
//     $country = App\Models\Frontend\countries::where('code', 'DE')->first();
//     $user = request()->user();
//     $ahmed = App\Models\Frontend\employment::find(7);
//     $ahmed->nation()->associate($country)->save();
//     $ahmed->user()->associate($user)->save();
//     return App\Models\Frontend\employment::find(7);
// });
// Route::get('/test-Document',function(){
//     return App\Models\Frontend\Document::all();
// });
// Route::get('/updateAllUsers', function () {
//     $profiles = \App\Models\Frontend\Profile::where('location', '')->get();
    
//     foreach ($profiles as $profile) {
//         $newAddress = $profile->address.' '.
//                                 $profile->home.' '.
//                                 $profile->postal_code.' '.
//                                 $profile->district.' '.
//                                 $profile->region.' '.
//                                 $profile->country;
//         $newLocation =  app('geocoder')->geocode($newAddress)->get()->first();
        
//         if ($newLocation) {
//             $newLocation = $newLocation->getCoordinates();
//             $newLocation2  = $newLocation->getLatitude().','.$newLocation->getLongitude();
//             $profile->location = $newLocation2;
//             $profile->save();
//         }
//     }
// });
Route::get('/error404', function () {
    return view('errors.error404');
})->name('error404');
Route::get('/loginasAdmin/{user}', function ($user) {
    
    // return 'ahmed';
    
    $user = \App\Models\Frontend\User::find($user);
    Auth::login($user);
    return redirect(route(Helper::type($user->profile->status).'.dashboard'));
})->middleware('admin:webadmin');


Route::get('/loginUser/{user}', function ($user) {
    $user = \App\Models\Frontend\User::find($user);
    Auth::login($user);
    return redirect(route(Helper::type($user->profile->status).'.pending'));
})->name('forceLogin');


Route::get('/loginasAdmin2/{user}', function ($user) {
    $user = \App\Models\Frontend\User::find($user);
    Auth::login($user);
    return redirect(route(Helper::type($user->profile->status).'.vehicles'));
})->middleware('admin:webadmin')->name('seeVehicles');

Route::get('/loginasCompany/{user}', function ($user) {
    $user = \App\Models\Frontend\User::find($user);
    Auth::login($user);
    return redirect(route(Helper::type($user->profile->status).'.profile'));
})->middleware(['user:web','company'])->name('seeProfile');


// Route::get('encryptionTest', function () {
//     \App\Models\Frontend\Userbanks::create([
//         'user_id'=>5,
//         'owner'=>'ahmed',
//         'iban'=>null
//     ]);
//     return \App\Models\Frontend\Userbanks::all();
// });
// Route::get('/driverstest', function () {
//     return \App\Models\Frontend\User::with('drivers')->get();
// });
// Route::get('/testSend/{order_id}/{email}/{name}', 'Frontend\OrderController@sendEmail');

// Route::get('testRelationships', function () {
//     $user = \App\Models\Frontend\User::find(21);
//     return $user->delete();
// });
// Route::get('/chickOrderStatus/{order}', 'Frontend\OrderController@checkStatus');


// Route::get('/testParsetwo', function () {
//     $name = "[hi] helloz [hello] (hi) {{jhihi}} {{ahmed}} {{name}}";
//     // echo preg_replace('/[\[{\(].*[\]}\)]/U', 'ahmed', $name);
//     $data = ['name'=>'ahmed','hi'=>'ahmed'];
//     echo preg_replace_callback('/({{|\[)(.*)(}}|\])/U', function ($matches) use ($data) {
//         print_r($matches);
//         list($shortCode, $shortTwo, $index) = $matches;
//         echo '<br>';
//         // return 'ahmed';
//         if (isset($data[$index])) {
//             return $data[$index];
//         } else {
//             return $shortCode;
//         }
//     }, $name);
    // echo preg_replace_callback('/[\{](.*)[\}]/', function ($matches) use ($data) {
    //     if (isset($matches[1])) {
    //         array_pop($matches);
    //     }
    //     print_r($matches);
    //     list($shortCode, $index) = $matches;
    //     if (isset($data[$index])) {
    //         return $data[$index];
    //     } else {
    //         return 'hel';
    //     }
    // }, $name);
// });
// Route::get('/globtest', 'Backend\LanguageFilesController@showFolder');
// Route::get('/excelTest', 'Backend\BillController@test');

// Route::get('/test', function () {
//     \DB::table('admins')->insert([

//         'email'	=> 'admin@admin.com',
//         'name'	=> 'Mohamed Taha',
//         'password'	=> bcrypt('1234admin'),
//     ]);
// });
// Route::get('test-broadcast', function () {
//     \Mail::to(['a_a199799@ymail.com'], 'Kurier Link Admin')
//         ->send(new MailSender('test', 'test', [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
//     // \Mail::to([' corbeigt@hotmail.com'], 'Kurier Link Admin')
//     //     ->send(new MailSender('test', 'test', [0=>['address'=>'admin@kurier-link.com','name'=>'Kurier Link']]));
//     event(new \App\Events\NewTourOffer(3, 1));
//     // return auth()->user();
//     return view('welcome2');
// });
Route::get('/kurierwerden', 'AdvertiseController@index');
Route::get('/partnerwerden', 'AdvertiseController@partnerwerden');
Route::get('/order/icon/{id}', 'Frontend\DriverController@getOrderIcon')->middleware('svgImage');
Route::get('/tour/icon/{id}', 'Frontend\tours\ToursControllerAdditional@getOrderIcon')->middleware('svgImage');
Route::group(['middleware'=>['user:web','buissnessCustomer'],'prefix'=>'business_customer'], function () {
    Route::get('/dashboard', function () {
        return view('buissness.welcome');
    });
});
Route::group(['middleware'=> 'Language'], function () {
    Route::group(['prefix' => 'geschaeftskundenportal', 'namespace'=>'Frontend'], function () {
        Route::get('/', ['as' => 'business_customer.index','uses'=>function () {
            return view('frontend.home2');
        }]);
        Route::get('/tour/{tourId}', function ($tourId) {
            return view('frontend.home2');
        });
        Route::get('/tour/laststep/{tourId}', function ($tourId) {
            return view('frontend.home2');
        });
        Route::get('/tour/laststep/{encrypted}/paymentSuccess', 'tours\tourPayPalController@pay_success')->name('paypal_success_tour');
        Route::get('/package', function () {
            return view('frontend.home2');
        });
    });


    Route::post('/language-chooser', 'LanguageController@chooseLanguage');
    Route::get('/order/create_order/{orderId}', function ($orderId) {
        return view('frontend.home2');
    });
    Route::get('/testdates', function () {
        return view('frontend.home2');
    });
    Route::get('/testdatesmoment', function () {
        return Carbon::now()->{ camel_case('startOf week') }();
    });
    Route::get('/order/make_order/{orderId}', 'Frontend\OrderControllerApi@showNewOrder');
    
    Route::post('/order', ['as'=>'order','uses'=>'Frontend\OrderController@index']);
    Route::post('/order/check', ['as'=>'order_check','uses'=>'Frontend\OrderController@check']);
    Route::post('/order/store', ['as'=>'order_store','uses'=>'Frontend\OrderController@store']);
    Route::post('/order/storeTwo', ['as'=>'order_storeTwo','uses'=>'Frontend\OrderController@storeTwo']);
    Route::post('/order/storeThree', ['as'=>'order_storeThree','uses'=>'Frontend\OrderController@storeThree']);
    Route::post('/order/storeDates', ['as'=>'order_storeDates','uses'=>'Frontend\OrderController@storeDates']);
    Route::post('/order/getInfo', ['as'=>'order_getInfo','uses'=>'Frontend\OrderController@getInfo']);
    Route::get('/order/lastSteps/{id}', ['as'=>'lastSteps','uses'=>'Frontend\OrderController@lastSteps']);
    
    Route::post('/order/lastSteps/edit_desc', ['as'=>'edit_desc','uses'=>'Frontend\OrderController@edit_desc']);

    Route::post('/order/lastSteps/edit_sender_name', ['as'=>'edit_sender_name','uses'=>'Frontend\OrderController@edit_sender_name']);
    Route::post('/order/lastSteps/edit_sender_phone', ['as'=>'edit_sender_phone','uses'=>'Frontend\OrderController@edit_sender_phone']);
    Route::post('/order/lastSteps/edit_sender_email', ['as'=>'edit_sender_email','uses'=>'Frontend\OrderController@edit_sender_email']);

    Route::post('/order/lastSteps/edit_receiver_name', ['as'=>'edit_receiver_name','uses'=>'Frontend\OrderController@edit_receiver_name']);
    Route::post('/order/lastSteps/edit_receiver_phone', ['as'=>'edit_receiver_phone','uses'=>'Frontend\OrderController@edit_receiver_phone']);
    Route::post('/order/lastSteps/edit_receiver_email', ['as'=>'edit_receiver_email','uses'=>'Frontend\OrderController@edit_receiver_email']);

    Route::post('/order/lastSteps/edit_load_from', ['as'=>'edit_load_from','uses'=>'Frontend\OrderController@edit_load_from']);
    Route::post('/order/lastSteps/edit_load_up', ['as'=>'edit_load_up','uses'=>'Frontend\OrderController@edit_load_up']);
    Route::post('/order/lastSteps/edit_delivery_from', ['as'=>'edit_delivery_from','uses'=>'Frontend\OrderController@edit_delivery_from']);
    Route::post('/order/lastSteps/edit_delivery_until', ['as'=>'edit_delivery_until','uses'=>'Frontend\OrderController@edit_delivery_until']);

 
    Route::post('/order/offers', 'Frontend\UserOrderController@offers')->name('offers');
    Route::post('/order/offers/edit', 'Frontend\UserOrderController@offer_edit')->name('offer_edit');
    Route::post('/payment', 'Frontend\OrderController@complete_order');
    Route::post('setPayment', 'Frontend\UserOrderController@setPayment')->name('setPayment');
    Route::post('/order/succ/{id}', ['as'=>'succ','uses'=>'Frontend\OrderController@succ']);
    Route::get('/order/succ/{id}', ['as'=>'succe','uses'=>'Frontend\OrderController@succ']);
    
    
    Route::post('/paypal', 'Frontend\PaypalController@pay')->name('paypal');
    Route::get('/paypal_success/{id}', 'Frontend\PaypalController@paypal_success')->name('paypal_success');
    Route::get('/paypal_cancel', 'Frontend\PaypalController@paypal_cancel')->name('paypal_cancel');

    Route::post('/payment_type', 'Frontend\OrderController@setSession')->name('payment_type');

    Route::get('/order/invoice', 'Frontend\OrderController@invoice')->name('invoice');
    Route::get('/order/invoice/download_pdf/{id}', 'Frontend\OrderController@download_pdf')->name('download_pdf');
    Route::post('/order/invoice/sendInvoice', 'Frontend\OrderController@sendInvoice')->name('sendInvoice');
    Route::get('/order/reference/download_pdf/{id}', 'Frontend\OrderController@download_code')->name('download_code');

    
    Route::post('/min_max', 'Frontend\OrderController@min_max')->name('min_max');

    Route::get('/terms', 'Frontend\OrderController@terms')->name('terms');
    Route::get('/contact', 'Frontend\FrontEndController@contact')->name('contact');
    Route::get('/faq', 'Frontend\FrontEndController@faq')->name('faq');
    Route::get('/service', 'Frontend\FrontEndController@service')->name('service');
    Route::get('/aboutUs', 'Frontend\FrontEndController@aboutUs')->name('about');
    Route::get('/impressum', 'Frontend\FrontEndController@imp')->name('imp');
    
    Route::post('/qustion_store', ['as'=>'qustion_store','uses'=>'Frontend\FrontEndController@qustion_store']);
    
    Route::get('/draft/{parameter}', 'Frontend\OrderController@uncompleted')->name('uncompleted');


    Route::get('/order/abstract/download_abstract/{id}', 'Frontend\OrderController@download_abstract')->name('download_abstract');

    Route::get('/bewerbung', 'Frontend\FrontEndController@bewerbung')->name('bewerbung');
    Route::group(['middleware'=>'guest'], function () {
        Route::get('/login', 'Frontend\FrontEndController@index')->name('login');
        Route::post('/postLogin', 'Frontend\FrontEndController@postLogin')->name('postLogin');
        Route::get('/login/{service}', ['as'=>'loginCredintial','uses'=>'Frontend\SocialAuthController@redirect']);
        Route::get('/register/{service}', ['as'=>'registerCredential','uses'=>'Frontend\SocialAuthController@redirectRegister']);
        Route::get('/callback/{service}', 'Frontend\SocialAuthController@callback');
        Route::get('/reset', 'Frontend\FrontEndController@reset')->name('reset');
        Route::post('/postReset', 'Frontend\FrontEndController@postReset')->name('postReset');

        Route::get('/register', 'Frontend\FrontEndController@register')->name('register');
        Route::post('/postReg', 'Frontend\FrontEndController@postReg');
        
        Route::get('backend/login', 'Backend\AdminController@getLogin')->name('backend/login');
        Route::post('backend/login', 'Backend\AdminController@postLogin');
    });
    
    Route::group(['namespace'=>'Mobile','prefix'=>'/mobile'], function () {
        Route::get('/', ['as'=>'mobile.index','uses'=>'MobileController@index']);
        Route::get('/orders', ['as'=>'mobile.orders','uses'=>'MobileController@orders']);
        Route::get('/profile', ['as'=>'mobile.profile','uses'=>'MobileController@profile']);
        Route::get('/vehicles', ['as'=>'mobile.vehicles','uses'=>'MobileController@vehicles']);
        Route::get('/drivers', ['as'=>'mobile.drivers','uses'=>'MobileController@drivers']);
    });

    Route::group(['middleware'=> ['user:web','company'] , 'namespace'=> 'Frontend' , 'prefix'=>'/company'], function () {
        Route::get('/dashboard', 'UserController@index')->name('user.dashboard')->middleware('completed');
        
        Route::get('/dashboard/how-to-use', 'UserController@howToUse')->name('user.howToUse');
        Route::get('/dashboard/driverInfo/{driver}', 'DriverController@show');
        Route::get('/dashboard/vehicles', 'UserController@vehicles')->name('user.vehicles')->middleware('completed');
        Route::post('/dashboard/vehicles/add', 'UserController@vehicles_add')->name('user.vehicles_add');
        Route::post('/dashboard/vehicles/update', 'UserController@vehicles_update')->name('user.vehicles_update');
        Route::post('/dashboard/vehicles/delete', 'UserController@vehicles_delete')->name('user.vehicles_delete');
        Route::post('/dashboard/vehicles/newDriver', 'UserController@newDriver')->name('vehicles.newDriver');

        Route::get('/dashboard/profile_setting', 'UserController@profile_setting')->name('user.profile');
        Route::get('/dashboard/account_setting', 'UserController@account_setting')->name('user.account_setting');
        Route::get('/dashboard/employment', 'UserController@employment')->name('user.employment');
        Route::post('/dashboard/employment/new_emp', 'UserController@new_emp')->name('user.new_emp');
        Route::get('/dashboard/employment/emp_print/{id}', 'UserController@emp_print')->name('user.emp_print');
        Route::post('/dashboard/employment/emp_accept', 'UserController@emp_accept')->name('user.emp_accept');
        Route::post('/dashboard/employment/emp_start', 'UserController@emp_start')->name('user.emp_start');
        Route::get('/dashboard/contact_info', 'UserController@contact_info')->name('user.contact_info');
        Route::get('/dashboard/profile_tax', 'UserController@profile_tax')->name('user.profile_tax');
        Route::get('/dashboard/payment_info', 'UserController@payment_info')->name('user.payment_info');
        Route::get('/dashboard/document', 'UserController@document')->name('user.document');
        Route::get('/dashboard/deactivate', 'UserController@my_deactivate')->name('user.my_deactivate');


        Route::post('/dashboard/profile/upload', 'UserController@upload')->name('user.profile_upload');
        Route::post('/dashboard/profile/edit', 'UserController@edit')->name('user.profile_edit');
        Route::post('/dashboard/profile/user_edit', 'UserController@user_edit')->name('user.user_edit');
        Route::post('/dashboard/profile/new_emails', 'UserController@new_emails')->name('user.new_emails');
        Route::post('/dashboard/profile/pwChange', 'UserController@pwChange')->name('user.pwChange');
        Route::post('/dashboard/profile/links_edit', 'UserController@links_edit')->name('user.links_edit');
        Route::post('/dashboard/profile/banks_edit', 'UserController@banks_edit')->name('user.banks_edit');
        Route::post('/dashboard/profile/required_info', 'UserController@requiredInfo')->name('user.requiredUpdate');
        Route::post('/dashboard/profile/deactivate', 'UserController@deactivate')->name('user.deactivate');
        
        Route::get('/dashboard/vehicles/getDrivers', 'UserController@getDrivers')->name('vehicles.getDrivers');
        Route::post('/dashboard/vehicles/editDriver', 'UserController@editDriver')->name('vehicles.editDriver');
        
        Route::post('/dashboard/vehicles/edit_driver', 'UserController@edit_driver')->name('vehicles.edit_driver');
        
        Route::post('/dashboard/vehicles/edit', 'UserController@edit_type')->name('vehicles.edit_type');
        Route::post('/dashboard/vehicles/edit_first_reg', 'UserController@edit_first_reg')->name('vehicles.edit_first_reg');
        Route::post('/dashboard/vehicles/edit_status', 'UserController@edit_status')->name('vehicles.edit_status');
        
        Route::post('/dashboard/drivers/delete/{driver}', 'DriverController@deleteDriver')->name('drivers.DeleteDriver');
        Route::post('/dashboard/drivers/newDriver', 'DriverController@newDriver')->name('drivers.newDriver');
        Route::post('/dashboard/drivers/newUser', 'DriverController@newUser')->name('drivers.newUser');

        Route::post('/dashboard/drivers/valid/{driver}/{state}', 'DriverController@validUnValid')->name('drivers.validUnvalid');
        
        Route::post('/dashboard/drivers/edit_name', 'DriverController@edit_name')->name('drivers.edit_name');
        Route::post('/dashboard/drivers/edit_phone', 'DriverController@edit_phone')->name('drivers.edit_phone');
        Route::post('/dashboard/drivers/edit_email', 'DriverController@edit_email')->name('drivers.edit_email');
        
        Route::get('/dashboard/faq', 'UserController@faq')->name('user.user_faq')->middleware('completed');
        Route::post('/dashboard/faq_add', 'UserController@faq_add')->name('user.faq_add');
        Route::post('/dashboard/faq_edit', 'UserController@faq_edit')->name('user.faq_edit');
        Route::post('/dashboard/faq_remove', 'UserController@faq_remove')->name('user.faq_remove');

        Route::get('/dashboard/orders', 'UserOrderController@index2')->name('user.orders')->middleware('completed');
        Route::get('/dashboard/orders2', 'UserOrderController@index')->name('user.orders2')->middleware('completed');
        Route::get('/dashboard/activeorders', 'UserOrderController@activeOrders')->name('user.activeorders')->middleware('completed');
        Route::post('/dashboard/new_offer', 'UserOrderController@store')->name('user.new_offer');
        Route::post('/dashboard/new_comment', 'UserOrderController@comment')->name('new_comment');
        Route::get('/dashboard/getCarInfo', 'UserOrderController@getCarInfo')->name('getCarInfo');
        
        Route::get('/dashboard/drivers', 'UserOrderController@drivers')->name('user.drivers');
        
        Route::get('/dashboard/assignments', 'UserOrderController@assign')->name('user.assign');
        Route::get('/dashboard/pending', 'UserOrderController@pending')->name('user.pending');
        Route::get('/dashboard/cancelled', 'UserOrderController@cancelled')->name('user.cancelled');
        Route::get('/dashboard/finished', 'UserOrderController@finished')->name('user.finished');

        Route::post('/dashboard/done', 'UserOrderController@done')->name('user.done');
        Route::post('/dashboard/edit_steps', 'UserOrderController@edit_steps')->name('user.edit_steps');
        Route::post('/dashboard/confirmed', 'UserOrderController@confirmed')->name('user.confirmed');

        Route::get('/dashboard/filter', 'UserOrderController@filter')->name('filter');
        
        Route::post('/dashboard/documents/add', 'UserController@documents_add')->name('user.documents_add');
        Route::post('/dashboard/tax/add', 'UserController@tax_add')->name('user.tax_add');
        Route::post('/dashboard/documents/delete', 'UserController@documents_delete')->name('user.documents_delete');
        Route::get('/dashboard/documents/download/{id}', 'UserController@download_attach')->name('user.download_attach')->middleware('completed');

        Route::get('/dashboard/geschaeftskundenportal', 'BusinessCustomerController@index')->name('user.business_customer.index');
        Route::post('/dashboard/geschaeftskundenportal', 'BusinessCustomerController@storeOffer')->name('user.business_customer.storeOffer');

        
        Route::get('/dashboard/abstracts', 'UserOrderController@abstracts')->name('abstracts');
        Route::get('/dashboard/abstracts/{id}/{num}', 'UserOrderController@order_abstract')->name('order_abstract');
        Route::get('/dashboard/abstracts/download_pdf/{id}/{num}', 'UserOrderController@download_pdf')->name('download_pdf2');
        Route::post('/dashboard/abstracts/sendAbstract', 'UserOrderController@sendAbstract')->name('sendAbstract');
        
        Route::post('/dashboard/orders/company_order_dates', 'UserOrderController@company_order_dates')->name('user.company_order_dates');
        Route::post('/dashboard/orders/company_order_vec', 'UserOrderController@company_order_vec')->name('user.company_order_vec');

        Route::get('/dashboard/new-order', 'UserOrderController@new_order')->name('user.new_order');

        Route::get('/dashboard/logout', 'FrontEndController@logout')->name('user.logout');
    });

    Route::group(['middleware'=> ['user:web','driver'] , 'namespace'=> 'Frontend' , 'prefix'=>'/driver'], function () {
        Route::get('/dashboard', 'DriverDashboardController@index')->name('user3.dashboard');


        Route::get('/dashboard/profile_setting', 'UserController@profile_setting')->name('user3.profile');
        Route::get('/dashboard/account_setting', 'UserController@account_setting')->name('user3.account_setting');
        Route::get('/dashboard/employment', 'UserController@employment')->name('user3.employment');
        Route::post('/dashboard/employment/new_emp', 'UserController@new_emp')->name('user3.new_emp');
        Route::get('/dashboard/employment/emp_print/{id}', 'UserController@emp_print')->name('user3.emp_print');
        Route::post('/dashboard/employment/emp_accept', 'UserController@emp_accept')->name('user3.emp_accept');
        Route::post('/dashboard/employment/emp_start', 'UserController@emp_start')->name('user3.emp_start');
        Route::get('/dashboard/contact_info', 'UserController@contact_info')->name('user3.contact_info');
        Route::get('/dashboard/payment_info', 'UserController@payment_info')->name('user3.payment_info');
        Route::get('/dashboard/document', 'UserController@document')->name('user3.document');
        Route::get('/dashboard/deactivate', 'UserController@my_deactivate')->name('user3.my_deactivate');
        Route::post('/dashboard/profile/upload', 'UserController@upload')->name('user3.profile_upload');
        Route::post('/dashboard/profile/edit', 'UserController@edit')->name('user3.profile_edit');
        Route::post('/dashboard/profile/user_edit', 'UserController@user_edit')->name('user3.user_edit');
        Route::post('/dashboard/profile/new_emails', 'UserController@new_emails')->name('user3.new_emails');
        Route::get('/dashboard/profile_tax', 'UserController@profile_tax')->name('user3.profile_tax');
        Route::post('/dashboard/profile/pwChange', 'UserController@pwChange')->name('user3.pwChange');
        Route::post('/dashboard/profile/links_edit', 'UserController@links_edit')->name('user3.links_edit');
        Route::post('/dashboard/profile/banks_edit', 'UserController@banks_edit')->name('user3.banks_edit');
        Route::post('/dashboard/profile/required_info', 'UserController@requiredInfo')->name('user3.requiredUpdate');
        Route::post('/dashboard/profile/deactivate', 'UserController@deactivate')->name('user3.deactivate');

            
        Route::get('/dashboard/vehicles', 'UserController@vehicles')->name('user3.vehicles')->middleware('completed');
        Route::get('/dashboard/drivers', 'UserOrderController@drivers')->name('user3.drivers');

        Route::post('/dashboard/vehicles/add', 'UserController@vehicles_add')->name('user3.vehicles_add');
        Route::post('/dashboard/vehicles/update', 'UserController@vehicles_update')->name('user3.vehicles_update');
        Route::post('/dashboard/vehicles/delete', 'UserController@vehicles_delete')->name('user3.vehicles_delete');

            
        Route::get('/dashboard/orders', 'DriverDashboardController@orders')->name('user3.orders')->middleware('completed');
        Route::post('/dashboard/new_offer', 'DriverDashboardController@store')->name('user3.new_offer');
        Route::post('/dashboard/orders/company_order_dates', 'DriverDashboardController@company_order_dates')->name('user3.company_order_dates');
        Route::post('/dashboard/orders/company_order_vec', 'DriverDashboardController@company_order_vec')->name('user3.company_order_vec');
        Route::post('/dashboard/done', 'DriverDashboardController@done')->name('user3.done');
        Route::post('/dashboard/edit_steps', 'DriverDashboardController@edit_steps')->name('user3.edit_steps');
        Route::post('/dashboard/confirmed', 'DriverDashboardController@confirmed')->name('user3.confirmed');

        Route::get('/dashboard/activeorders', 'DriverDashboardController@activeOrders')->name('user3.activeorders')->middleware('completed');
        Route::get('/dashboard/assignments', 'DriverDashboardController@assign')->name('user3.assign');
        Route::get('/dashboard/pending', 'DriverDashboardController@pending')->name('user3.pending');
        Route::get('/dashboard/cancelled', 'DriverDashboardController@cancelled')->name('user3.cancelled');
        Route::get('/dashboard/finished', 'DriverDashboardController@finished')->name('user3.finished');

        Route::get('/dashboard/geschaeftskundenportal', 'DriverDashboardController@business_customer')->name('user3.business_customer.index');
        Route::get('/dashboard/{type}_trips', 'DriverDashboardController@filterTrips')->name('user3.business_customer.filterTrips');

    
        Route::get('/dashboard/faq', 'UserController@faq')->name('user3.user_faq')->middleware('completed');
        Route::post('/dashboard/faq_add', 'UserController@faq_add')->name('user3.faq_add');
        Route::post('/dashboard/faq_edit', 'UserController@faq_edit')->name('user3.faq_edit');
        Route::post('/dashboard/faq_remove', 'UserController@faq_remove')->name('user3.faq_remove');

        Route::post('/dashboard/documents/add', 'UserController@documents_add')->name('user3.documents_add');
        Route::post('/dashboard/documents/delete', 'UserController@documents_delete')->name('user3.documents_delete');
        Route::post('/dashboard/tax/add', 'UserController@tax_add')->name('user3.tax_add');

        Route::get('/dashboard/documents/download/{id}', 'UserController@download_attach')->name('user3.download_attach')->middleware('completed');

        Route::get('/dashboard/how-to-use', 'UserController@howToUse')->name('user3.howToUse');

        
        
        Route::get('/dashboard/logout', 'FrontEndController@logout')->name('user3.logout');
    });
    
    
    Route::group(['middleware'=> ['user:web','normal_user'] , 'namespace'=> 'Frontend' , 'prefix'=>'/user'], function () {
        Route::get('/dashboard', 'UserDashboardController@index')->name('user2.dashboard');
        Route::get('/dashboard/profile_setting', 'UserController@profile_setting')->name('user2.profile');
        
        Route::get('/dashboard/account_setting', 'UserController@account_setting')->name('user2.account_setting');
        Route::get('/dashboard/employment', 'UserController@employment')->name('user2.employment');
        Route::get('/dashboard/profile_tax', 'UserController@profile_tax')->name('user2.profile_tax');
        Route::get('/dashboard/contact_info', 'UserController@contact_info')->name('user2.contact_info');
        Route::get('/dashboard/payment_info', 'UserController@payment_info')->name('user2.payment_info');
        Route::get('/dashboard/document', 'UserController@document')->name('user2.document');
        Route::get('/dashboard/deactivate', 'UserController@my_deactivate')->name('user2.my_deactivate');


        Route::post('/dashboard/profile/upload', 'UserController@upload')->name('user2.profile_upload');
        Route::post('/dashboard/profile/edit', 'UserController@edit')->name('user2.profile_edit');
        Route::post('/dashboard/profile/user_edit', 'UserController@user_edit')->name('user2.user_edit');
        Route::post('/dashboard/profile/new_emails', 'UserController@new_emails')->name('user2.new_emails');
        Route::post('/dashboard/profile/pwChange', 'UserController@pwChange')->name('user2.pwChange');
        Route::post('/dashboard/profile/links_edit', 'UserController@links_edit')->name('user2.links_edit');
        Route::post('/dashboard/profile/banks_edit', 'UserController@banks_edit')->name('user2.banks_edit');
        Route::post('/dashboard/profile/required_info', 'UserController@requiredInfo')->name('user2.requiredUpdate');
        Route::post('/dashboard/profile/deactivate', 'UserController@deactivate')->name('user2.deactivate');
        
        
        Route::group(['prefix'=>'/dashboard/invoices'], function () {
            Route::get('/', 'UserDashboardController@invoices')->name('user2.invoices');
            Route::get('/paid', 'UserDashboardController@paid')->name('user2.paid');
            Route::get('/unpaid', 'UserDashboardController@unpaid')->name('user2.unpaid');
            Route::get('/{id}', 'UserDashboardController@invoice')->name('user2.invoice');
        });

        Route::get('/dashboard/orders', 'UserDashboardController@orders')->name('user2.orders');
        Route::get('/dashboard/pending', 'UserDashboardController@pending')->name('user2.pending');
        Route::post('/dashboard/pending/succ/{id}', ['as'=>'succ2','uses'=>'UserDashboardController@succ']);

        Route::get('/dashboard/cancelled', 'UserDashboardController@cancelled')->name('user2.cancelled');
        Route::get('/dashboard/activeorders', 'UserDashboardController@activeOrders')->name('user2.activeorders');
        
        Route::get('/dashboard/finished', 'UserDashboardController@finished')->name('user2.finished');
        Route::get('/dashboard/pending/{id}', 'UserDashboardController@uncompleted')->name('user2.uncompleted');
        Route::post('/dashboard/pending/offers/edit', 'UserDashboardController@offer_edit')->name('user2.offer_edit');

        Route::get('/dashboard/faq', 'UserController@faq')->name('user2.user_faq')->middleware('completed');
        Route::post('/dashboard/faq_add', 'UserController@faq_add')->name('user2.faq_add');
        Route::post('/dashboard/faq_edit', 'UserController@faq_edit')->name('user2.faq_edit');
        Route::post('/dashboard/faq_remove', 'UserController@faq_remove')->name('user2.faq_remove');

        Route::post('/dashboard/documents/add', 'UserController@documents_add')->name('user2.documents_add');
        Route::post('/dashboard/documents/delete', 'UserController@documents_delete')->name('user2.documents_delete');
        Route::get('/dashboard/documents/download/{id}', 'UserController@download_attach')->name('user2.download_attach')->middleware('completed');

        Route::get('/dashboard/how-to-use', 'UserController@howToUse')->name('user2.howToUse');



        Route::get('/dashboard/logout', 'FrontEndController@logout')->name('user2.logout');
    });


    Route::group(['middleware'=>'admin:webadmin' , 'namespace'=> 'Backend' , 'prefix' => 'backend'], function () {
        Route::get('/dashboard', 'AdminController@index')->name('backend.dashboard');
        Route::get('/logout', 'AdminController@logout')->name('backend.logout');

        Route::group(['prefix'=>'MainPageApi'], function () {
            Route::get('/', ['as'=>'backend.AllUserApi','uses'=>'AdminController@AllUserApi']);
            Route::get('/offer/{offer}', ['as'=>'backend.offerVehicle','uses'=>'AdminController@offerVehicle']);
        });
        Route::group(['prefix' => 'shipping'], function () {
            Route::get('/', ['as' => 'shipping.index', 'uses' => 'ShippingController@index']);
            Route::post('addShip', ['as' => 'shipping.store', 'uses' => 'ShippingController@store']);
            Route::post('remShip', ['as' => 'shipping.destroy', 'uses' => 'ShippingController@destroy']);
            Route::post('editShip', ['as' => 'shipping.edit', 'uses' => 'ShippingController@edit']);
            Route::post('editMillistone/{ship}', ['as' => 'shipping.millistone', 'uses' => 'ShippingController@millistone']);
            
           
            Route::get('distance', ['as' => 'shipping.distance', 'uses' => 'ShippingController@distance']);
            Route::post('addDist', ['as' => 'shipping.storeDist', 'uses' => 'ShippingController@storeDist']);
            Route::post('remDist', ['as' => 'shipping.destroyDist', 'uses' => 'ShippingController@destroyDist']);
            Route::post('editDist', ['as' => 'shipping.editDist', 'uses' => 'ShippingController@editDist']);


            Route::get('cost', ['as' => 'shipping.cost', 'uses' => 'ShippingController@cost']);
            Route::post('addCost', ['as' => 'shipping.storeCost', 'uses' => 'ShippingController@storeCost']);
            Route::post('remCost', ['as' => 'shipping.destroyCost', 'uses' => 'ShippingController@destroyCost']);
            Route::post('editCost', ['as' => 'shipping.editCost', 'uses' => 'ShippingController@editCost']);
            
            Route::get('shippingSpec', ['as' => 'shipping.spec', 'uses' => 'ShippingController@spec']);
            Route::post('storeSpec', ['as' => 'shipping.storeSpec', 'uses' => 'ShippingController@storeSpec']);

            Route::post('editSpec', ['as' => 'shipping.editSpec', 'uses' => 'ShippingController@editSpec']);

            Route::post('destroySpec', ['as' => 'shipping.destroySpec', 'uses' => 'ShippingController@destroySpec']);
        });
        Route::group(['prefix'=>'shippingDiscount'], function () {
            Route::get('/', ['as'=>'shippingDiscount.index','uses'=>'DiscountController@index']);
            Route::get('/nonDiscountedShips', ['as'=>'shippingDiscount.nonDiscounted','uses'=>'DiscountController@getAll']);
            Route::post('/updateShipDiscount', ['as'=>'shippingDiscount.updateShip','uses'=>'DiscountController@update']);
        });

        Route::group(['prefix'=>'orders'], function () {
            Route::get('/show/{state}', ['as'=>'orders.index','uses'=>'OrdersBackend@index']);
            Route::get('/getOrders', ['as'=>'orders.orders','uses'=>'OrdersBackend@getOrders']);
            Route::get('/getOrdersIds/{order}', ['as'=>'orders.info','uses'=>'OrdersBackend@getOrderInfo']);
            Route::get('/getOrdersInfo/{id}', ['as'=>'orders.information','uses'=>'OrdersBackend@getOrderInformation']);
            Route::get('/ordersCompany', ['as'=>'orders.companies','uses'=>'OrdersBackend@GetCompanies']);
            Route::get('/ordersSender', ['as'=>'orders.sendersinfo','uses'=>'OrdersBackend@GetSenders']);
            Route::get('/ordersUser', ['as'=>'orders.users','uses'=>'OrdersBackend@OrdersUser']);
            Route::get('/senders', ['as'=>'orders.senders','uses'=>'OrdersBackend@OrderSender']);
            Route::post('/deleteOffer', ['as'=>'offer.destroy','uses'=>'OrdersBackend@destroy']);
            Route::post('/deleteOrder', ['as'=>'order.forceDelete','uses'=>'OrdersBackend@destroyOrder']);
            Route::post('cancelOrder', ['as'=>'order.cancel','uses'=>'OrdersBackend@cancel']);
        });

        Route::group(['prefix' => 'email'], function () {
            Route::get('/', ['as' => 'email.index', 'uses' => 'EmailsController@index']);
            Route::post('addEmail', ['as'=>'email.store','uses'=>'EmailsController@store']);
            Route::post('editEmail/{emails}', ['as'=>'email.edit','uses'=>'EmailsController@edit']);
            Route::post('deleteEmail', ['as'=>'email.destroy','uses'=>'EmailsController@destroy']);
            Route::get('testParse', 'EmailsController@testParseContent');
        });
        Route::group(['prefix' => 'language'], function () {
            Route::get('/', ['as'=>'language.index','uses'=>'LanguageFilesController@index']);
            Route::get('details/{languageFiles}', ['as'=>'language.show','uses'=>'LanguageFilesController@show']);
            Route::get('fileDetails', ['as'=>'language.file','uses'=>'LanguageFilesController@fileDetails']);
            Route::post('addLanguage', ['as'=>'language.store','uses'=>'LanguageFilesController@store']);
            Route::post('editLanguage', ['as'=>'language.edit','uses'=>'LanguageFilesController@edit']);
            Route::post('editFile', ['as'=>'language.editFile','uses'=>'LanguageFilesController@editFile']);
            Route::post('deleteLanguage', ['as'=>'language.destroy','uses'=>'LanguageFilesController@destroy']);
            Route::get('refreshTranslate', [ 'as'=>'language.refresh','uses'=>'LanguageFilesController@refreshTranslation']);
        });
        Route::group(['prefix'=>'bill'], function () {
            Route::get('/', ['as'=>'bill.index','uses'=>'BillController@index']);
            
            Route::get('/invoices', ['as'=>'bill.invoices','uses'=>'BillController@invoices']);
            Route::get('/paid_invoices', ['as'=>'bill.paid_invoices','uses'=>'BillController@paid_invoices']);
            Route::get('/unpaid_invoices', ['as'=>'bill.unpaid_invoices','uses'=>'BillController@unpaid_invoices']);
            Route::get('/invoices/{id}', ['as'=>'bill.bill_invoice','uses'=>'BillController@bill_invoice']);
            
            Route::get('/abstracts', ['as'=>'bill.abstracts','uses'=>'BillController@abstracts']);
            Route::get('/abstracts/{id}', ['as'=>'bill.bill_abstract','uses'=>'BillController@bill_abstract']);
            
            Route::get('/randomOrderNumber', ['as'=>'bill.randomIndex','uses'=>'BillController@randomIndex']);
            Route::get('/excelDownload', ['as'=>'bill.excel','uses'=>'BillController@excel']);
            Route::get('/printInvoice/{bill}', ['as'=>'bill.print','uses'=>'BillController@print']);
            Route::post('/deteleteBill', ['as'=>'bill.destroy','uses'=>'BillController@destroy']);
            Route::post('/newPill', ['as'=>'bill.new','uses'=>'BillController@create']);
            Route::post('/editPill', ['as'=>'bill.edit','uses'=>'BillController@edit']);
        });

        Route::group(['prefix'=>'documents'], function () {
            Route::get('/other', ['as'=>'documents.index','uses'=>'DocumentController@index']);
            Route::get('/filterByType/{id}', 'DocumentController@filterByType');
            Route::post('/editDocumentRoute', 'DocumentController@editDocumentRoute');
            Route::get('/types', ['as'=>'documents.types','uses'=>'DocumentController@types']);

            Route::post('/storeType', ['as'=>'documents.storeType','uses'=>'DocumentController@storeType']);
            Route::post('/destroyType', ['as'=>'documents.destroyType','uses'=>'DocumentController@destroyType']);
            Route::post('/editType', ['as'=>'documents.editType','uses'=>'DocumentController@editType']);


            Route::get('/invoice', ['as'=>'documents.invoice','uses'=>'DocumentController@invoice']);
            Route::post('/download_invoice', ['as'=>'documents.download_invoice','uses'=>'DocumentController@download_invoice']);

            Route::get('/newTemplate', ['as'=>'documents.newTemplate','uses'=>'DocumentController@newTemplate']);
            Route::get('/showTemplate/{id}', ['as'=>'documents.showTemplate','uses'=>'DocumentController@showTemplate']);
            Route::post('/storeTemplate', ['as'=>'documents.storeTemplate','uses'=>'DocumentController@storeTemplate']);
            Route::post('/editTemplate', ['as'=>'documents.editTemplate','uses'=>'DocumentController@editTemplate']);
            Route::get('/convertTemplate', ['as'=>'documents.convertTemplate','uses'=>'DocumentController@convertTemplate']);
            Route::get('/getVars', ['as'=>'documents.getVars','uses'=>'DocumentController@getVars']);
            Route::post('/downloadTemplate', ['as'=>'documents.downloadTemplate','uses'=>'DocumentController@downloadTemplate']);
            Route::post('/destroyTemplate', ['as'=>'documents.destroyTemplate','uses'=>'DocumentController@destroyTemplate']);


            Route::get('service_contract', ['as'=>'documents.service_contract','uses'=>'DocumentController@service_contract']);
            Route::post('/download_service_contract', ['as'=>'documents.download_service_contract','uses'=>'DocumentController@download_service_contract']);
        });

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', ['as' => 'user.index', 'uses' => 'UserController@index']);
            Route::post('/user/getData', ['as' => 'users.getData', 'uses' => 'UserController@getData']);
            Route::get('/filter/{type}', ['as' => 'user.filters', 'uses' => 'UserController@usersWithFilter']);
            Route::post('/', ['as' => 'users.create', 'uses' => 'UserController@store']);
            Route::get('users_view', ['as' => 'users.users_view', 'uses' => 'UserController@user_index']);
            Route::get('inactivated', ['as' => 'users.inactivated', 'uses' => 'UserController@inactivate_users_index']);
            // Route::get('inactivated', ['as' => 'users.inactivated', 'uses' => 'UserController@inactivate_users_index']);
            Route::get('/filters/admin', ['as'=>'user.admins','uses'=>'UserController@getAdmins']);
            Route::get('/filters/roles', ['as'=>'user.roles','uses'=>'UserController@getRoles']);
            
            Route::get('new', ['as' => 'users.new', 'uses' => 'UserController@new']);
            Route::get('susp', ['as' => 'users.susp', 'uses' => 'UserController@susp']);
            Route::get('pend', ['as' => 'users.pend', 'uses' => 'UserController@pend']);
            Route::get('expire', ['as' => 'users.expire', 'uses' => 'UserController@expire']);
            Route::get('rolesUser', ['as' => 'users.rolesUser', 'uses' => 'UserController@rolesUser']);
            Route::get('admin', ['as' => 'users.admin', 'uses' => 'UserController@admin']);

            Route::post('addUser', ['as' => 'users.addUser', 'uses' => 'UserController@addUser']);
            Route::post('removeUser', ['as' => 'users.removeUser', 'uses' => 'UserController@removeUser']);
            Route::post('removeDriver', ['as' => 'users.removeDriver', 'uses' => 'UserController@removeDriver']);
            Route::get('editUser', ['as' => 'users.editUser', 'uses' => 'UserController@editUser']);
            Route::post('editUserAcc', ['as' => 'users.editUserAcc', 'uses' => 'UserController@editUserAcc']);
            Route::post('editUserProfile', ['as' => 'users.editUserProfile', 'uses' => 'UserController@editUserProfile']);

            Route::post('editUserAddress', ['as' => 'users.editUserAddress', 'uses' => 'UserController@editUserAddress']);

            Route::post('addAdmin', ['as' => 'admins.addAdmin', 'uses' => 'UserController@addAdmin']);
            Route::post('removeAdmin', ['as' => 'admins.removeAdmin', 'uses' => 'UserController@removeAdmin']);
            Route::post('editAdmin', ['as' => 'admins.editAdmin', 'uses' => 'UserController@editAdmin']);


            Route::get('/roles_view', ['as' => 'users.users_roles', 'uses' => 'UserController@roles_index']);
            Route::post('addRole', ['as' => 'users.addRole', 'uses' => 'RoleController@addRole']);
            Route::post('removeRole', ['as' => 'users.removeRole', 'uses' => 'RoleController@removeRole']);
            Route::post('editRole', ['as' => 'users.editRole', 'uses' => 'RoleController@editRole']);
        });
        
        Route::group(['prefix' => 'questions'], function () {
            Route::get('/', ['as' => 'questions.index', 'uses' => 'QuestionController@index']);
            Route::post('/edit', ['as' => 'questions.edit', 'uses' => 'QuestionController@edit']);
            Route::post('/store', ['as' => 'questions.store', 'uses' => 'QuestionController@store']);
            Route::post('/destroy', ['as' => 'questions.destroy', 'uses' => 'QuestionController@destroy']);
        });

        Route::group(['prefix' => 'subadmin'], function () {
            Route::get('/', ['as' => 'subadmin.index', 'uses' => 'UserController@subadmin']);
            Route::post('/edit', ['as' => 'subadmin.edit', 'uses' => 'UserController@editSub']);
            Route::post('/store', ['as' => 'subadmin.store', 'uses' => 'UserController@storeSub']);
            Route::post('/destroy', ['as' => 'subadmin.destroy', 'uses' => 'UserController@destroySub']);
        });

        Route::group(['prefix'=>'customer_business'], function () {
            Route::get('/tours', ['as'=>'customer_business.tours','uses'=>'CustomerController@tours']);
            Route::get('/filterTours/{type}', ['as'=>'customer_business.filterTours','uses'=>'CustomerController@filterTours']);
            Route::post('/tours', ['as'=>'customer_business.storeTour','uses'=>'CustomerController@storeTour']);
            Route::post('/destroyTour', ['as'=>'customer_business.destroyTour','uses'=>'CustomerController@destroyTour']);
            Route::post('/storeTourDates', ['as'=>'customer_business.storeTourDates','uses'=>'CustomerController@storeTourDates']);
            Route::post('/storeTourDetails', ['as'=>'customer_business.storeTourDetails','uses'=>'CustomerController@storeTourDetails']);
            Route::post('/cancelTour', ['as'=>'customer_business.cancelTour','uses'=>'CustomerController@cancelTour']);

            Route::get('/order_person', ['as'=>'customer_business.order_person','uses'=>'CustomerController@order_person']);
            Route::post('/order_person', ['as'=>'customer_business.storeOrderPerson','uses'=>'CustomerController@storeOrderPerson']);
            Route::post('/editOrderPerson', ['as'=>'customer_business.editOrderPerson','uses'=>'CustomerController@editOrderPerson']);
            Route::post('/destroyOrderPerson', ['as'=>'customer_business.destroyOrderPerson','uses'=>'CustomerController@destroyOrderPerson']);


            Route::post('assignPerson', ['as'=>'customer_business.assignPerson','uses'=>'CustomerController@assignPerson']);
            Route::get('getDrivers', ['as'=>'customer_business.getDrivers','uses'=>'CustomerController@getDrivers']);
            Route::get('/getTourPersons', ['as'=>'customer_business.getTourPersons','uses'=>'CustomerController@getTourPersons']);
            

            Route::get('/tour_trips', ['as'=>'customer_business.tour_trips','uses'=>'CustomerController@tour_trips']);
            Route::post('/storeTrip', ['as'=>'customer_business.storeTrip','uses'=>'CustomerController@storeTrip']);
            Route::post('/destroyTourTrips', ['as'=>'customer_business.destroyTourTrips','uses'=>'CustomerController@destroyTourTrips']);
            Route::get('/filterTrips/{type}', ['as'=>'customer_business.filterTrips','uses'=>'CustomerController@filterTrips']);

            Route::post('/storeTripStop', ['as'=>'customer_business.storeTripStop','uses'=>'CustomerController@storeTripStop']);


            Route::get('/tripTour', ['as'=>'customer_business.tripTour','uses'=>'CustomerController@tripTour']);
            Route::post('/assignTripStops', ['as'=>'customer_business.assignTripStops','uses'=>'CustomerController@assignTripStops']);



            Route::get('/tour_dates', ['as'=>'customer_business.tour_dates','uses'=>'CustomerController@tour_dates']);
            Route::post('/destroyTourDates', ['as'=>'customer_business.destroyTourDates','uses'=>'CustomerController@destroyTourDates']);
            Route::get('/getTourDates', ['as'=>'customer_business.getTourDates','uses'=>'CustomerController@getTourDates']);


            



            Route::get('/tour_details', ['as'=>'customer_business.tour_details','uses'=>'CustomerController@tour_details']);
            Route::post('/destroyTourDetails', ['as'=>'customer_business.destroyTourDetails','uses'=>'CustomerController@destroyTourDetails']);
            Route::get('/getTourDetails', ['as'=>'customer_business.getTourDetails','uses'=>'CustomerController@getTourDetails']);
            Route::get('/getTourData', ['as'=>'customer_business.getTourData','uses'=>'CustomerController@getTourData']);
            

            Route::get('/stops', ['as'=>'customer_business.stops','uses'=>'CustomerController@stops']);
            Route::post('/stops', ['as'=>'customer_business.storeStops','uses'=>'CustomerController@storeStops']);
            Route::post('/editStops', ['as'=>'customer_business.editStops','uses'=>'CustomerController@editStops']);
            Route::post('/destroyStops', ['as'=>'customer_business.destroyStops','uses'=>'CustomerController@destroyStops']);
            Route::post('/assignToTour', ['as'=>'customer_business.assignToTour','uses'=>'CustomerController@assignToTour']);



            Route::get('/packet_category', ['as'=>'customer_business.packet_category','uses'=>'CustomerController@packet_category']);
            Route::post('/storeStopFreight', ['as'=>'customer_business.storeStopFreight','uses'=>'CustomerController@storeStopFreight']);
            Route::post('/editStopFreight', ['as'=>'customer_business.editStopFreight','uses'=>'CustomerController@editStopFreight']);
            Route::post('/destroyFreight', ['as'=>'customer_business.destroyFreight','uses'=>'CustomerController@destroyFreight']);

            
            Route::post('/storeCategory', ['as'=>'customer_business.storeCategory','uses'=>'CustomerController@storeCategory']);
            Route::post('/editCategory', ['as'=>'customer_business.editCategory','uses'=>'CustomerController@editCategory']);
            Route::post('/destroyCategory', ['as'=>'customer_business.destroyCategory','uses'=>'CustomerController@destroyCategory']);
        });
    });

    
    /* Route::group(['domain' => '{subdomain}.localhost','middleware'=>'subadmin'], function () {

         Route::get('/admin/login', 'Domain\Backend\DomainController@getLogin');
         Route::post('/admin/login', 'Domain\Backend\DomainController@postLogin');

         Route::group(['middleware'=>['user:web','subdomain'] , 'namespace'=> 'Domain\Backend' , 'prefix' => 'admin'], function () {

            Route::get('/dashboard', 'DomainController@index')->name('admin.dashboard');



         });

         Route::get('/', function ($subdomain) {


             dd($subdomain);

         })->name('view-domain');
     });*/
});
