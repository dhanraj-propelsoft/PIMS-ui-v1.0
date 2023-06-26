<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response'],'namespace'=>'App\Http\Controllers'], function () {
    // Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    // Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    // Route::get('/check_person','Auth\ApiAuthController@check_person')->name('check_person.api');
    // Route::get('/check_person_email','Auth\ApiAuthController@check_person_email')->name('check_person_email.api');
    // Route::get('/get_temp_status','Auth\ApiAuthController@get_temp_status')->name('get_temp_status.api');
    // Route::get('/check_user','Auth\ApiAuthController@check_user')->name('check_user.api');
    // Route::post('/temp_user_mobile','Auth\ApiAuthController@temp_user_mobile')->name('temp_user_mobile.api');
    // Route::post('/update_temp_user_email','Auth\ApiAuthController@update_temp_user_email')->name('update_temp_user_email.api');
    // Route::post('/get_stage','Auth\ApiAuthController@get_stage')->name('get_stage.api');
});

Route::middleware('auth:api')
->namespace('App\Http\Controllers')
->group(function () {
   //Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');
});
