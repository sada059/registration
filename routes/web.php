<?php

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
		Validator::extend('bannedUserwords', function ($attribute, $value, $parameters, $validator)
		{
			$bannedUserwords = ['Andrew', 'Rooney', 'Taxim'];
			return !in_array($value, $bannedUserwords);
		});
Route::get('/', function () {
    return view('welcome');
});
Route::any('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::get('register', ['uses' => 'Auth\LoginController@getRegister', 'as' => 'user.registration']);
Route::post('postregister', ['uses' => 'Auth\LoginController@postRegister', 'as' => 'user.postregistration']);
//Route::any('register', ['uses' => 'Auth\LoginController@postRegister', 'as' => 'user.registration']);