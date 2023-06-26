<?php

use App\Http\Controllers\version1\Person\PersonController;
use App\Http\Controllers\version1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/changePasswordPage', [UserController::class, 'changePasswordPage'])->name('changePasswordPage');
Route::post('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');