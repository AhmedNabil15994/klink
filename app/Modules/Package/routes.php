<?php 

Route::group(['middleware'=>'guest','prefix'=>'/packages'], function () {
    Route::get('/', 'PackageController@home_index');
});

Route::group(['middleware'=>'admin:webadmin' , 'prefix' => 'backend'], function () {
    Route::group(['prefix'=>'/packages'], function () {

       	Route::get('/', 'PackageController@index');
       	Route::post('/addPackage', 'PackageController@addPackage');            
       	Route::post('/editPackage', 'PackageController@editPackage');            
       	Route::post('/destroyPackage', 'PackageController@destroyPackage');            
    });

    Route::group(['prefix'=>'/features'], function () {

       	Route::get('/', 'FeatureController@index');
       	Route::post('/addFeature', 'FeatureController@addFeature');            
       	Route::post('/editTitle', 'FeatureController@editTitle');            
       	Route::post('/editType', 'FeatureController@editType');            
       	Route::post('/destroyFeature', 'FeatureController@destroyFeature');            
    });

});