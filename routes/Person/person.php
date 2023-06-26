<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Person\PersonController;

Route::prefix("person")->group(function(){

});
//dhana Code Start
Route::post('/check', [PersonController::class, 'check'])->name('check');
Route::post('person_check_email', [PersonController::class, 'person_check_email'])->name('person_check_email');
Route::post('create_temp_person', [PersonController::class, 'create_temp_person'])->name('create_temp_person');
//dhana Code End

Route::get('stage2/{mobile}', [PersonController::class, 'temp_stage2'])->name('stage2');
// Route::post('/post_login', [PersonController::class, 'post_login'])->name('post_login');
Route::post('try_again', [PersonController::class, 'try_again'])->name('try_again');

Route::post('update_temp', [PersonController::class, 'update_temp'])->name('update_temp');

Route::get('confirmation', [PersonController::class, 'confirmation'])->name('confirmation');
Route::post('mobile_otp', [PersonController::class, 'mobile_otp'])->name('mobile_otp');
Route::get('Personal_datas', [PersonController::class, 'Personal_datas'])->name('Personal_datas');

Route::post('registration', [PersonController::class, 'registration'])->name('registration');
Route::post('update_person', [PersonController::class, 'update_person'])->name('update_person');
Route::get('registration_basic', [PersonController::class, 'registration_basic'])->name('registration_basic');
Route::post('basic_details', [PersonController::class, 'basic_details'])->name('basic_details');
Route::post('basic_details1', [PersonController::class, 'basic_details1'])->name('basic_details1');
Route::post('form_submit', [PersonController::class, 'form_submit'])->name('form_submit');
Route::post('upload_pic', [PersonController::class, 'upload_pic'])->name('upload_pic');
Route::get('edit_profile', [PersonController::class, 'edit_profile'])->name('edit_profile');
Route::post('complete_profile', [PersonController::class, 'complete_profile'])->name('complete_profile');
Route::get('create_password', [PersonController::class, 'create_password'])->name('create_password');
Route::post('create_person', [PersonController::class, 'create_person'])->name('create_person');

Route::post('get_cities',[PersonController::class,'get_cities'])->name('get_cities');
Route::view('registration_account', 'wizard.registration_account')->name('registration_account');
Route::get('check_email',[PersonController::class,'check_email'])->name('check_email');
Route::get('account/{uid}', [PersonController::class, 'account'])->name('account');
Route::get('person_confirmation', [PersonController::class, 'person_confirmation'])->name('person_confirmation');
Route::post('person_otp', [PersonController::class, 'person_otp'])->name('person_otp');
Route::get('person_details_update', [PersonController::class, 'person_details_update'])->name('person_details_update');
Route::post('update_password', [PersonController::class, 'update_password'])->name('update_password');


//AUTH AUTHENTICATION ROUTE
Route::get('/dashboard', [PersonController::class, 'dashboard'])->name('/dashboard');
Route::get('/profile', [PersonController::class, 'profile'])->name('profile');
Route::post('/save_profile', [PersonController::class, 'save_profile'])->name('save_profile');
Route::post('save_profile_extra', [PersonController::class, 'save_profile_extra'])->name('save_profile_extra');
Route::post('storeMobile', [PersonController::class, 'storeMobile'])->name('storeMobile');
Route::post('makeAsPrimary', [PersonController::class, 'makeAsPrimary'])->name('makeAsPrimary');
Route::post('DeleteOther', [PersonController::class, 'DeleteOther'])->name('DeleteOther');
Route::post('SendEmailOtp', [PersonController::class, 'SendEmailOtp'])->name('SendEmailOtp');
Route::post('VerifyEmailOtp', [PersonController::class, 'VerifyEmailOtp'])->name('VerifyEmailOtp');
Route::post('EmailSecondary', [PersonController::class, 'EmailSecondary'])->name('EmailSecondary');
Route::post('Make_primary_email', [PersonController::class, 'Make_primary_email'])->name('Make_primary_email');
Route::post('validate_email', [PersonController::class, 'validate_email'])->name('validate_email');
Route::post('DeleteOtherEmail', [PersonController::class, 'DeleteOtherEmail'])->name('DeleteOtherEmail');

Route::get('/forgot_password/{mobile}', [PersonController::class, 'forgot_password'])->name('forgot_password');

// Route::post('validate_otp', [PersonController::class, 'validate_otp'])->name('validate_otp');
Route::get('resend_email_otp/{uid}', [PersonController::class, 'resend_email_otp'])->name('resend_email_otp');
// Route::get('reset_password/{uid}', [PersonController::class, 'reset_password'])->name('reset_password');
Route::get('tryagain_password/{username}/{uid}/{mobile}', [PersonController::class, 'tryagain_password'])->name('tryagain_password');
Route::post('try_password/{username}', [PersonController::class, 'tryagain_password'])->name('try_password');
Route::get('try_Again/{name}/{uid}/{mobile}', [PersonController::class, 'try_Again'])->name('try_Again');

Route::post('set_pasword', [PersonController::class, 'set_pasword'])->name('set_pasword');
 Route::get('change_password', [PersonController::class, 'change_password'])->name('change_password');
// Route::get('forget_password/{uid}', [PersonController::class, 'forget_password'])->name('forget_password');
