<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','IndexController@index');
Route::get('sms/{mobile}','IndexController@sms');
Route::get('csms/{cap}','IndexController@csms');

Route::get('auth/regist', 'Auth\AuthController@getRegister');
Route::post('auth/regist', ['uses'=>'Auth\AuthController@postRegister','middleware'=>'App\Http\Middleware\EmailMiddleware']);

route::get('auth/logout','Auth\AuthController@getLogout');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

route::get('/home',function(){
	return '这是用户页';
});

route::get('bor','ProController@bor');
route::post('bor','ProController@borPost');

route::get('plist','CheckController@pList');

route::get('check/{pid}','CheckController@check');
route::post('check/{pid}','CheckController@checkPost');

route::get('tb/{pid}','GrowController@tb');
route::post('tb/{pid}','GrowController@tbPost');
route::get('payrun','GrowController@run');
route::get('mybill','GrowController@bill');
route::get('mytz','GrowController@tz');
route::get('mysy','GrowController@sy');

route::post('pay','GrowController@pay');
route::post('pays',function(){
    return view('index');
});
route::post('xx',function(){
	print_r($_POST);
});
