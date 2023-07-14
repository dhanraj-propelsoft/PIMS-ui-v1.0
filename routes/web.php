<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\WizardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

// Route::prefix('user')->name('user.')->group(function () {
Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {

    //dhana Code Start

    include_once('version1/Person/person.php');
    include_once('version1/User/user.php');
    include_once('version1/Organization/organization.php');
    include_once('version1/Hrm/hrmMasters.php');
    include_once('version1/Hrm/Transaction/hrmTransaction.php');
    
    //dhana Code End
    Route::get('login', [AuthController::class, 'login'])->name('login');

    Route::post('set_password', [AdminController::class, 'set_password'])->name('set_password');
    // Modules
    Route::get('list/', [ModuleController::class, 'list'])->name('list');

    //include_once('Hrm/hrmMasters.php');
    include_once('Person/person.php');
    include_once('Organization/organization.php');
    //include_once('Hrm/Transaction/hrmTransaction.php');
});

Route::view('/add-resource-stage-1', 'resource/add-resource-stage-1');
Route::view('/resource', 'resource/resource');
Route::view('/add-resource-stage-2', 'resource/add-resource-stage-2');
Route::view('/add-resource-stage-3', 'resource/add-resource-stage-3');
Route::view('/reliveresource', 'resource/relieveresource');
Route::view('/rejoin_stage_1', 'resource/rejoin_stage_1');
Route::view('/rejoin_stage_2', 'resource/rejoin_stage_2');
Route::view('/rejoin_stage_3', 'resource/rejoin_stage_3');
Route::view('/rejoin_case2_stage_1', 'resource/rejoin_case2_stage_1');
Route::view('/rejoin_case2_stage_2', 'resource/rejoin_case2_stage_2');
Route::view('/rejoin_case2_stage_3', 'resource/rejoin_case2_stage_3');
Route::view('/rejoin_case3_stage_1', 'resource/rejoin_case3_stage_1');
Route::view('/resourceview', 'resource/resourceview');
Route::view('/slide_one_org', 'organization/slide_one');
Route::view('/slide_two_org', 'organization/slide_two');
Route::view('/profileView', 'profiles/profileView');
