<?php

use App\Http\Controllers\version1\Organization\OrganizationController;
use Illuminate\Support\Facades\Route;


Route::get('createAccount',[OrganizationController::class,'createOrganisation'])->name('createAccount');
Route::get('createOrganisation',[OrganizationController::class,'createOrganisation'])->name('createOrganisation');
Route::get('myAccount',[OrganizationController::class,'getOrganizationAccount'])->name('myAccount');
 Route::get('OrganizationAccount',[OrganizationController::class,'getOrganizationAccount'])->name('OrganizationAccount');
Route::post('storeOrganization',[OrganizationController::class,'storeOrganization'])->name('storeOrganization');
Route::post('getDistrict',[OrganizationController::class,'getDistrict'])->name('getDistrict');
Route::post('setOrganizationId', [OrganizationController::class, 'setOrganizationId'])->name('setOrganizationId');
Route::get('organizationDataBase/{id}', [OrganizationController::class, 'organizationDataBase'])->name('organizationDataBase');
Route::get('defaultLogin',[OrganizationController::class,'defaultLogin'])->name('defaultLogin');
Route::post('setDefaultOrganization',[OrganizationController::class,'setDefaultOrganization'])->name('setDefaultOrganization');
