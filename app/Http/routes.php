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

Route::get('/', 'WelcomeController@index');
Route::post('/', 'WelcomeController@postIndex');

Route::get('home', 'HomeController@index');
Route::post('comments/delete/{id}', 'HomeController@deleteComment');
Route::get('comments/{id}', 'HomeController@showComment');
Route::post('comments', 'HomeController@addComment');
Route::post('comments/{id}', 'HomeController@editComment');

Route::get('wechat/verify', ['uses'=>'Auth\AuthController@wechatVerify','as'=>'wechat.verify']);
Route::get('wechat/auth', ['uses'=>'Auth\AuthController@wechatAuth','as'=>'wechat.auth']);

Route::any('wechat','Auth\AuthController@serve');
Route::get('me', ['uses'=>'Wechat\UserController@profile']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
