<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hrm\Transaction\hrmResourceController;
Route::resource('hrmResource1', 'App\Http\Controllers\Hrm\Transaction\hrmResourceController');
Route::post('findResourceWithEmailAndMobile', 'App\Http\Controllers\Hrm\Transaction\hrmResourceController@findResourceWithEmailAndMobile')->name('findResourceWithEmailAndMobile');
Route::post('getDesignationDataByDept', 'App\Http\Controllers\Hrm\Transaction\hrmResourceController@getDesignationDataByDept')->name('getDesignationDataByDept');