<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:web,staff')->group(function () {
   
  
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:web,staff')->group(function () {
  
    Route::get('createresult', [RegisteredUserController::class, 'createresult'])->name('createresult');
    Route::post('storeresult', [RegisteredUserController::class, 'storeresult'])->name('storeresult');

    Route::get('viewregistersubjects', [RegisteredUserController::class, 'viewregistersubjects'])->name('viewregistersubjects');
    Route::post('storesubjects', [RegisteredUserController::class, 'storesubjects'])->name('storesubjects');
   
    
    Route::get('viewRegisterSubjectTeacher', [RegisteredUserController::class, 'viewRegisterSubjectTeacher'])
    ->name('viewRegisterSubjectTeacher');
    Route::post('storeRegisterSubjectTeacher', [RegisteredUserController::class, 'storeRegisterSubjectTeacher'])
    ->name('storeRegisterSubjectTeacher');

    Route::get('showresults', [RegisteredUserController::class, 'showresults'])->name('showresults'); 

    Route::get('resultreport', [RegisteredUserController::class, 'resultreport'])->name('resultreport');


    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
   Route::post('register', [RegisteredUserController::class, 'store']); 

   Route::get('viewregisterguardian', [RegisteredUserController::class, 'viewregisterguardian'])->name('viewregisterguardian');
   Route::post('Guardian', [RegisteredUserController::class, 'Guardian'])->name('Guardian');  

   Route::get('viewregisterstaff', [RegisteredUserController::class, 'viewregisterstaff'])->name('viewregisterstaff');
   Route::post('registerstaff', [RegisteredUserController::class, 'registerstaff'])->name('registerstaff');

   
   Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

   Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

