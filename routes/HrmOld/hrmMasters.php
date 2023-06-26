<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hrm\Masters\HrmDepartmentController;
Route::resource('hrmDepartmentMaster', 'App\Http\Controllers\Hrm\Masters\HrmDepartmentController');
Route::resource('hrmDesignationMaster', 'App\Http\Controllers\Hrm\Masters\HrmDesignationController');
Route::resource('hrmResourceTypeMaster', 'App\Http\Controllers\Hrm\Masters\HrmResourceTypeController');