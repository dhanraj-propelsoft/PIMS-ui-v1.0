<?php

use App\Http\Controllers\PIMS\Users\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";
});
Route::get('/', function () {
    return view('pimsUi.UserLogin.loginPage');
});

// Route::prefix('user')->name('user.')->group(function () {
Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {

});
Route::post('/userLogin', [UserController::class, 'userLogin'])->name('userLogin');
Route::post('/userRegister', [UserController::class, 'userRegister'])->name('userRegister');
Route::Resource('salutation', 'App\Http\Controllers\PIMS\Master\SalutationController');
Route::Resource('gender', 'App\Http\Controllers\PIMS\Master\GenderController');
Route::Resource('documentType', 'App\Http\Controllers\PIMS\Master\DocumentTypeController');
Route::Resource('country', 'App\Http\Controllers\PIMS\Master\CountryController');
Route::Resource('bloodGroup', 'App\Http\Controllers\PIMS\Master\BloodGroupController');
Route::Resource('maritalStatus', 'App\Http\Controllers\PIMS\Master\MaritalStatusController');
Route::Resource('relationShip', 'App\Http\Controllers\PIMS\Master\RelationShipController');
Route::Resource('state', 'App\Http\Controllers\PIMS\Master\StateController');
Route::Resource('bankAccountType', 'App\Http\Controllers\PIMS\Master\BankAccountTypeController');
Route::Resource('bank', 'App\Http\Controllers\PIMS\Master\BankController');
Route::Resource('addressType', 'App\Http\Controllers\PIMS\Master\AddressTypeController');
Route::Resource('language', 'App\Http\Controllers\PIMS\Master\LanguageController');

Route::Resource('businessActivity', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessActivityController');
Route::Resource('administratorType', 'App\Http\Controllers\PIMS\OrganizationMaster\AdministratorTypeController');
Route::Resource('businessSaleSubset', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessSaleSubsetController');
Route::Resource('businessSector', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessSectorController');
Route::Resource('organizationCategory', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationCategoryController');
Route::Resource('organizationDocumentType', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationDocumentTypeController');
Route::Resource('organizationOwnerShip', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationOwnerShipController');






