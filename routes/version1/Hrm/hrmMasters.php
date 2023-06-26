<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\version1\Hrm\Masters\HrmResourceTypeController;
Route::resource('hrmDepartment', 'App\Http\Controllers\version1\Hrm\Masters\HrmDepartmentController');
Route::resource('hrmDesignation', 'App\Http\Controllers\Hrm\Masters\HrmDesignationController');
Route::resource('hrmResourceType', 'App\Http\Controllers\version1\Hrm\Masters\HrmResourceTypeController');
Route::resource('hrmDesignation', 'App\Http\Controllers\version1\Hrm\Masters\HrmDesignationController');