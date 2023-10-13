<?php
use App\Http\Controllers\PIMS\Setting\UserController;
use App\Http\Controllers\PIMS\Master\CountryController;
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
    return view('pimsUi.Setting.Users.loginPage');
});

// Route::prefix('user')->name('user.')->group(function () {
    Route::group(['middleware' => 'token.auth'], function () {

Route::Resource('salutation', 'App\Http\Controllers\PIMS\Master\SalutationController');
Route::Resource('gender', 'App\Http\Controllers\PIMS\Master\GenderController');
Route::Resource('documentType', 'App\Http\Controllers\PIMS\Master\DocumentTypeController');
Route::Resource('country', 'App\Http\Controllers\PIMS\Master\CountryController');
Route::Resource('bloodGroup', 'App\Http\Controllers\PIMS\Master\BloodGroupController');
Route::Resource('maritalStatus', 'App\Http\Controllers\PIMS\Master\MaritalStatusController');
Route::Resource('relationShip', 'App\Http\Controllers\PIMS\Master\RelationShipController');
Route::Resource('qualification', 'App\Http\Controllers\PIMS\Master\QualificationController');
Route::Resource('state', 'App\Http\Controllers\PIMS\Master\StateController');
Route::Resource('district', 'App\Http\Controllers\PIMS\Master\DistrictController');
Route::Resource('area', 'App\Http\Controllers\PIMS\Master\AreaController');
Route::Resource('city', 'App\Http\Controllers\PIMS\Master\CityController');
Route::Resource('roles', 'App\Http\Controllers\PIMS\Setting\RoleController');
Route::Resource('users', 'App\Http\Controllers\PIMS\Setting\UserController');

Route::Resource('bankAccountType', 'App\Http\Controllers\PIMS\Master\BankAccountTypeController');
Route::Resource('bank', 'App\Http\Controllers\PIMS\Master\BankController');
Route::Resource('addressType', 'App\Http\Controllers\PIMS\Master\AddressTypeController');
Route::Resource('language', 'App\Http\Controllers\PIMS\Master\LanguageController');

Route::Resource('businessActivity', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessActivityController');
Route::Resource('administratorType', 'App\Http\Controllers\PIMS\OrganizationMaster\AdministratorTypeController');
Route::Resource('businessSaleSubset', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessSaleSubsetController');
Route::Resource('businessSector', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessSectorController');
Route::Resource('category', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationCategoryController');
Route::Resource('orgDocumentType', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationDocumentTypeController');
Route::Resource('ownerShip', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationOwnerShipController');
Route::Resource('structure', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationStructureController');
Route::Resource('orgActivation', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationActivationController');

Route::Resource('origin', 'App\Http\Controllers\PIMS\PFM\OriginController');
Route::Resource('existence', 'App\Http\Controllers\PIMS\PFM\ExistenceController');
Route::Resource('deponeStatus', 'App\Http\Controllers\PIMS\PFM\DeponeStatusController');
Route::Resource('cachet', 'App\Http\Controllers\PIMS\PFM\CachetController');
Route::Resource('validation', 'App\Http\Controllers\PIMS\PFM\ValidationController');
Route::Resource('survival', 'App\Http\Controllers\PIMS\PFM\SurvivalController');
Route::Resource('activeStatus', 'App\Http\Controllers\PIMS\PFM\ActiveStatusController');
Route::Resource('personStage', 'App\Http\Controllers\PIMS\PFM\PersonStageController');
Route::Resource('authorization', 'App\Http\Controllers\PIMS\PFM\AuthorizationController');
});

Route::post('/check_duplicate', [CountryController::class, 'check_duplicate'])->name('check_duplicate');
Route::post('/checkStDuplicate', 'App\Http\Controllers\PIMS\Master\StateController@checkStDuplicate')->name('checkStDuplicate');
Route::post('/userAccess', [UserController::class, 'userAccess'])->name('userAccess');




