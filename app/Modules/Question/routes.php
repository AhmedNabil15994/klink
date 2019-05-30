<?php 


Route::group(['middleware'=>'admin:webadmin' , 'prefix' => '/backend/Question'], function () {
    Route::get('/', 'QuestionBackendController@index');
   	Route::get('/filterByDocument/{id}', 'QuestionBackendController@filterByDocument');

   	Route::post('/addQuestion', 'QuestionBackendController@addQuestion');
   	Route::post('/destroyQuestion', 'QuestionBackendController@destroyQuestion');
   	Route::post('/editAnswer', 'QuestionBackendController@editAnswer');
   	Route::post('/editQuestion', 'QuestionBackendController@editQuestion');
   	Route::post('/editQuestionDocument', 'QuestionBackendController@editQuestionDocument');

   	Route::get('/loadQuestion', 'QuestionBackendController@loadQuestion');
   	Route::get('/assignQuestion', 'QuestionBackendController@assignQuestion');
});

Route::group(['middleware'=>'guest','prefix'=>'/Question'], function () {
    Route::get('/', 'QuestionController@index');
    Route::post('/newQuestion', 'QuestionController@newQuestion');
});