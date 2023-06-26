<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hrm\Transaction\hrmResourceController;
Route::resource('hrmResource', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController');
Route::get('createResource', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@create')->name('createResource');
Route::post('findResourceWithEmailAndMobile', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@findResourceWithEmailAndMobile')->name('findResourceWithEmailAndMobile');
Route::post('getDesignationDataByDept', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@getDesignationDataByDept')->name('getDesignationDataByDept');
Route::Post('resourceOtpValidate', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@resourceOtpValidate')->name('resourceOtpValidate');
Route::get('hrmResourceEdit', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@hrmResourceEdit')->name('hrmResourceEdit');
Route::get('reliveResourcePage/{id}', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@reliveResourcePage')->name('reliveResourcePage');
Route::Post('resourceMobileOtp', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@resourceMobileOtp')->name('resourceMobileOtp');
Route::post('resourceEmailOtp', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@resourceEmailOtp')->name('resourceEmailOtp');
Route::post('resourceEmailOtpValidate', 'App\Http\Controllers\version1\Hrm\Transaction\hrmResourceController@resourceEmailOtpValidate')->name('resourceEmailOtpValidate');


