<?php 

Route::group(['middleware'=>'admin:webadmin','prefix'=>'/backend'],function(){
	
	Route::group(['prefix'=>'/pages'],function(){
		Route::get('/', 'PagesController@index');
		Route::post('/storePage', 'PagesController@storePage');
		Route::post('/editPage', 'PagesController@editPage');
		Route::post('/destroyPage', 'PagesController@destroyPage');
	});

	Route::group(['prefix'=>'/models'],function(){
		Route::get('/', 'ModelsController@index');
		Route::post('/storeModel', 'ModelsController@storeModel');
		Route::post('/destroyModel', 'ModelsController@destroyModel');
		Route::post('/editModel', 'ModelsController@editModel');
		Route::post('/updateAnswers', 'ModelsController@updateAnswers');
		Route::post('/updateQuestions', 'ModelsController@updateQuestions');
	});

});

Route::group(['middleware'=>'guest','prefix'=>'/page'], function () {
    Route::get('/{page}','PagesFrontController@getPage');
	Route::get('/{page}/{model}','PagesFrontController@getModel')->name('model');
	Route::post('/{page}/application','PagesFrontController@application');
	Route::post('/contact/store/new','PagesFrontController@storeContact');
    Route::post('/{page}/{model}/newQuestion', 'QuestionController@newQuestion');

	//Route::get('question/{page}','PagesFrontController@getQuestions');
});
