<?php 


Route::group(['middleware'=>'guest','prefix'=>'/Question'], function () {
    Route::get('/', 'QuestionController@index');
    Route::post('/newQuestion', 'QuestionController@newQuestion');
});