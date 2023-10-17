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

Route::post('/countryValidation', 'App\Http\Controllers\PIMS\Master\CountryController@countryValidation')->name('countryValidation');
Route::post('/stateValidation', 'App\Http\Controllers\PIMS\Master\StateController@stateValidation')->name('stateValidation');
Route::post('/DistrictValidation', 'App\Http\Controllers\PIMS\Master\DistrictController@DistrictValidation')->name('DistrictValidation');
Route::post('/cityValidation', 'App\Http\Controllers\PIMS\Master\CityController@cityValidation')->name('cityValidation');
Route::post('/areaValidation', 'App\Http\Controllers\PIMS\Master\AreaController@areaValidation')->name('areaValidation');
Route::post('/salutationValidation', 'App\Http\Controllers\PIMS\Master\SalutationController@salutationValidation')->name('salutationValidation');
Route::post('/genderValidation', 'App\Http\Controllers\PIMS\Master\GenderController@genderValidation')->name('genderValidation');
Route::post('/documentTypeValidation', 'App\Http\Controllers\PIMS\Master\DocumentTypeController@documentTypeValidation')->name('documentTypeValidation');
Route::post('/bloodGroupValidation', 'App\Http\Controllers\PIMS\Master\BloodGroupController@bloodGroupValidation')->name('bloodGroupValidation');
Route::post('/MaritalStatusValidation', 'App\Http\Controllers\PIMS\Master\MaritalStatusController@MaritalStatusValidation')->name('MaritalStatusValidation');
Route::post('/relationshipValidation', 'App\Http\Controllers\PIMS\Master\RelationShipController@relationshipValidation')->name('relationshipValidation');
Route::post('/qualificationValidation', 'App\Http\Controllers\PIMS\Master\QualificationController@qualificationValidation')->name('qualificationValidation');
Route::post('/bankAccountTypeValidation', 'App\Http\Controllers\PIMS\Master\BankAccountTypeController@bankAccountTypeValidation')->name('bankAccountTypeValidation');
Route::post('/bankValidation', 'App\Http\Controllers\PIMS\Master\BankController@bankValidation')->name('bankValidation');
Route::post('/addressTypeValidation', 'App\Http\Controllers\PIMS\Master\AddressTypeController@addressTypeValidation')->name('addressTypeValidation');
Route::post('/languageValidation', 'App\Http\Controllers\PIMS\Master\LanguageController@languageValidation')->name('languageValidation');

Route::post('/administratorTypeValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\AdministratorTypeController@administratorTypeValidation')->name('administratorTypeValidation');
Route::post('/businessActivityValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessActivityController@businessActivityValidation')->name('businessActivityValidation');
Route::post('/businessSaleSubsetValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessSaleSubsetController@businessSaleSubsetValidation')->name('businessSaleSubsetValidation');
Route::post('/businessSectorValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\BusinessSectorController@businessSectorValidation')->name('businessSectorValidation');
Route::post('/categoryValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationCategoryController@categoryValidation')->name('categoryValidation');
Route::post('/documentTypeValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationDocumentTypeController@documentTypeValidation')->name('documentTypeValidation');
Route::post('/ownershipValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationOwnershipController@ownershipValidation')->name('ownershipValidation');
Route::post('/structureValidation', 'App\Http\Controllers\PIMS\OrganizationMaster\OrganizationStructureController@structureValidation')->name('structureValidation');

Route::post('/originValidation', 'App\Http\Controllers\PIMS\PFM\OriginController@originValidation')->name('originValidation');
Route::post('/authorizationValidation', 'App\Http\Controllers\PIMS\PFM\AuthorizationController@authorizationValidation')->name('authorizationValidation');
Route::post('/cachetValidation', 'App\Http\Controllers\PIMS\PFM\CachetController@cachetValidation')->name('cachetValidation');
Route::post('/deponeStatusValidation', 'App\Http\Controllers\PIMS\PFM\DeponeStatusController@deponeStatusValidation')->name('deponeStatusValidation');
Route::post('/existenceValidation', 'App\Http\Controllers\PIMS\PFM\ExistenceController@existenceValidation')->name('existenceValidation');
Route::post('/personStageValidation', 'App\Http\Controllers\PIMS\PFM\PersonStageController@personStageValidation')->name('personStageValidation');
Route::post('/survivalValidation', 'App\Http\Controllers\PIMS\PFM\SurvivalController@survivalValidation')->name('survivalValidation');
Route::post('/validationChecking', 'App\Http\Controllers\PIMS\PFM\ValidationController@validationChecking')->name('validationChecking');
Route::post('/activeStatusValidation', 'App\Http\Controllers\PIMS\PFM\ActiveStatusController@activeStatusValidation')->name('activeStatusValidation');

Route::post('/get_states', 'App\Http\Controllers\PIMS\Master\StateController@get_states')->name('get_states');
Route::post('/get_districts', 'App\Http\Controllers\PIMS\Master\DistrictController@get_districts')->name('get_districts');
Route::post('/get_cities', 'App\Http\Controllers\PIMS\Master\CityController@get_cities')->name('get_cities');
Route::post('/get_areas', 'App\Http\Controllers\PIMS\Master\AreaController@get_areas')->name('get_areas');
Route::post('/userAccess', [UserController::class, 'userAccess'])->name('userAccess');




