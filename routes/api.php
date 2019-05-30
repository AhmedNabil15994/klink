<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});
Route::group(['prefix'=>'shipping'], function () {
    Route::get('/getAll', 'Backend\ShippingController@getAll');
});
Route::group(['prefix'=>'orders'], function () {
    Route::post('/neworder', 'Frontend\OrderControllerApi@newOrder');
    Route::post('/saveInformation', 'Frontend\OrderControllerApi@saveOrder');
    Route::get('/getOrder/{orderId}', 'Frontend\OrderControllerApi@StoredOrder');
    Route::get('/other', 'Frontend\OrderControllerApi@otherOrders');
    Route::post('/forgetOrder/{order}', 'Frontend\OrderControllerApi@forgetOrder');
    Route::get('/images/icon', 'Frontend\OrderControllerApi@orderIcon')->middleware('svgImage');
});
Route::group(['prefix'=>'tours'], function () {
    Route::get('/tour/{encrypted}', 'Frontend\tours\ToursControllerAdditional@tourDetails');
    // Route::get("/tour/terms/{encrypted}",'Frontend\tours\ToursControllerAdditional@tourTerms');
    Route::get('/tour/{encrypted}/offer/{touroffer}', 'Frontend\tours\ToursControllerAdditional@tourOffer');
    Route::post('/create/tour', 'Frontend\tours\ToursController@newTour');
    Route::post('/save/dates/{encrypted}', 'Frontend\tours\ToursControllerAdditional@saveTourDates');
    
    Route::post('/accept/terms/{encrypted}', 'Frontend\tours\ToursControllerAdditional@acceptTerms');
    Route::post('/accept', 'Frontend\tours\ToursControllerAdditional@acceptOffer')->middleware([
        'auth'
    ]);
    Route::post('/saveTourDays/{encrypted}', 'Frontend\tours\ToursControllerAdditional@saveTourDays');
    Route::get('/islogin/{encrypted}', 'Frontend\tours\tourAuthenticationController@index');
    Route::group(['prefix'=>'/edit/{encrypted}'], function () {
        Route::post('/tour_ship', 'Frontend\tours\editTourController@tour_ship');
        Route::post('/tour_details', 'Frontend\tours\editTourController@tour_details');
    });
    Route::post('/pay/paypal/{encrypted}', 'Frontend\tours\tourPayPalController@paywithPayPal');
    Route::post('/pay/wirecard/{encrypted}', 'Frontend\tours\tourPayWireController@pay');
    Route::post('/wirecard/confirm/{encrypted}', 'Frontend\tours\tourPayWireController@confirm');
});
Route::group([], function () {
    Route::post('/register/{encrypted}', 'Frontend\tours\tourAuthenticationController@register');
    Route::post('/resend/{encrypted}', 'Frontend\tours\tourAuthenticationController@resendEmail');
});
