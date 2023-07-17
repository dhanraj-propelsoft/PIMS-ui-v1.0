<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\WizardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PIMS\Master\SalutationController;
use App\Http\Controllers\PIMS\Master\GenderController;
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




});

Route::Resource('salutation','App\Http\Controllers\PIMS\Master\SalutationController');
Route::Resource('gender','App\Http\Controllers\PIMS\Master\GenderController');


// Route::view('/gender', 'pimsUi/gender/list');
// Route::view('/genderView', 'pimsUi/gender/view');
// Route::view('/genderEdit', 'pimsUi/gender/edit');
// Route::view('/genderAdd', 'pimsUi/gender/add');