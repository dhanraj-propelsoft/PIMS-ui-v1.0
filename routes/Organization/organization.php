<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\OrganizationController;

Route::get('organisation',[OrganizationController::class,'organisation'])->name('organisation');
Route::get('create_organisation',[OrganizationController::class,'create_organisation'])->name('create_organisation');
Route::get('new_organisation',[OrganizationController::class,'new_organisation'])->name('new_organisation');
Route::post('organisation_details',[OrganizationController::class,'organisation_details'])->name('organisation_details');
Route::post('organisation_confirmation',[OrganizationController::class,'organisation_confirmation'])->name('organisation_confirmation');
Route::post('user_organisation',[OrganizationController::class,'user_organisation'])->name('user_organisation');
Route::post('admin_organisation',[OrganizationController::class,'admin_organisation'])->name('admin_organisation');
Route::post('gst_form',[OrganizationController::class,'gst_form'])->name('gst_form');
Route::post('organisation_form',[OrganizationController::class,'organisation_form'])->name('organisation_form');
Route::post('organisation_submit',[OrganizationController::class,'organisation_submit'])->name('organisation_submit');
Route::post('get_cities',[OrganizationController::class,'get_cities'])->name('get_cities');
Route::get('organization_wizard',[OrganizationController::class,'organization_wizard'])->name('organization_wizard');
Route::post('organizationStore',[OrganizationController::class,'organizationStore'])->name('organizationStore');


