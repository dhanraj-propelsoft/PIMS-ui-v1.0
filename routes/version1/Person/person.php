<?php

use App\Http\Controllers\version1\Person\PersonController;
use App\Http\Controllers\version1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/checkUserMobileNumber', [PersonController::class, 'checkUserMobileNumber'])->name('checkUserMobileNumber');
Route::post('/checkUserEmail', [PersonController::class, 'checkUserEmail'])->name('checkUserEmail');
Route::post('/personConfirmationPage', [PersonController::class, 'personConfirmationPage'])->name('personConfirmationPage');
Route::post('/storeTempPerson', [PersonController::class, 'storeTempPerson'])->name('storeTempPerson');
Route::post('/storeTempPersonPhase1', [PersonController::class, 'storeTempPersonPhase1'])->name('storeTempPersonPhase1');
Route::post('/storeTempPersonPhase2', [PersonController::class, 'storeTempPersonPhase2'])->name('storeTempPersonPhase2');
Route::post('/personConfirmationMobileOTP', [PersonController::class, 'personConfirmationMobileOTP'])->name('personConfirmationMobileOTP');
Route::post('/storeUser', [PersonController::class, 'storeUser'])->name('storeUser');
Route::post('/postLogin', [PersonController::class, 'postLogin'])->name('postLogin');
Route::post('/resendOtpForEmailByUid', [PersonController::class, 'resendOtpForEmailByUid'])->name('resendOtpForEmailByUid');
Route::post('/validateEmailOtp', [PersonController::class, 'validateEmailOtp'])->name('validateEmailOtp');
Route::post('/userLogin', [PersonController::class, 'userLogin'])->name('userLogin');

Route::post('/passwordPage', [PersonController::class, 'passwordPage'])->name('passwordPage');
Route::post('/tempOTP', [PersonController::class, 'tempOTP'])->name('tempOTP');
Route::post('/PersonDetails', [PersonController::class, 'PersonDetails'])->name('PersonDetails');
Route::post('/personUpdate', [PersonController::class, 'personUpdate'])->name('personUpdate');
Route::post('/personToUser', [PersonController::class, 'personToUser'])->name('personToUser');
Route::post('/userCreation', [PersonController::class, 'userCreation'])->name('userCreation');
Route::post('/updatePassword', [PersonController::class, 'updatePassword'])->name('updatePassword');
Route::post('/personValidate', [PersonController::class, 'personValidate'])->name('personValidate');
Route::post('/personDependency', [PersonController::class, 'personDependency'])->name('personDependency');
Route::post('/resendMobileOtp', [PersonController::class, 'resendMobileOtp'])->name('resendMobileOtp');
Route::post('/personEmailOtp', [PersonController::class, 'personEmailOtp'])->name('personEmailOtp');
Route::post('/findCredential', [PersonController::class, 'findCredential'])->name('findCredential');
Route::post('/resendEmailOtp', [PersonController::class, 'resendEmailOtp'])->name('resendEmailOtp');
Route::post('/checkPersonEmail', [PersonController::class, 'checkPersonEmail'])->name('checkPersonEmail');
Route::post('/personMobileOtp', [PersonController::class, 'personMobileOtp'])->name('personMobileOtp');
Route::post('/personMobileOtpValidated', [PersonController::class, 'personMobileOtpValidated'])->name('personMobileOtpValidated');
Route::get('/personProfiles', [PersonController::class, 'personProfiles'])->name('personProfiles');
Route::post('/profileUpdate', [PersonController::class, 'profileUpdate'])->name('profileUpdate');
Route::post('signout', [PersonController::class, 'signout'])->name('signout');
Route::post('personAllDetails', [PersonController::class, 'personAllDetails'])->name('personAllDetails');
//personProfiles//
Route::get('userView', [PersonController::class, 'userView'])->name('userView');
Route::post('addOtherMobile', [PersonController::class, 'addOtherMobile'])->name('addOtherMobile');
Route::post('resendOtpForMobile', [PersonController::class, 'resendOtpForMobile'])->name('resendOtpForMobile');
Route::post('OtpVerifiedForMobile', [PersonController::class, 'OtpVerifiedForMobile'])->name('OtpVerifiedForMobile');
Route::post('addOtherEmail', [PersonController::class, 'addOtherEmail'])->name('addOtherEmail');
Route::post('resendOtpForEmail', [PersonController::class, 'resendOtpForEmail'])->name('resendOtpForEmail');
Route::post('secondNumberChangeToPrimary', [PersonController::class, 'secondNumberChangeToPrimary'])->name('secondNumberChangeToPrimary');

Route::post('deleteForMobileNumber', [PersonController::class, 'deleteForMobileNumber'])->name('deleteForMobileNumber');
Route::post('otpValidationByEmail', [PersonController::class, 'otpValidationByEmail'])->name('otpValidationByEmail');
Route::post('seconEmailChangeToPrimary', [PersonController::class, 'seconEmailChangeToPrimary'])->name('seconEmailChangeToPrimary');
Route::post('deleteForEmail', [PersonController::class, 'deleteForEmail'])->name('deleteForEmail');
Route::post('resendOtpForTempMobileNo', [PersonController::class, 'resendOtpForTempMobileNo'])->name('resendOtpForTempMobileNo');
Route::post('OtpValidationForTempMobile', [PersonController::class, 'OtpValidationForTempMobile'])->name('OtpValidationForTempMobile');
Route::post('resendOtpForTempEmail', [PersonController::class, 'resendOtpForTempEmail'])->name('resendOtpForTempEmail');
Route::post('OtpValidationForTempEmail', [PersonController::class, 'OtpValidationForTempEmail'])->name('OtpValidationForTempEmail');
