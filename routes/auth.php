<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ChatController;
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


    Route::get('createTimetable', [RegisteredUserController::class, 'createTimetable'])->name('createTimetable');
    Route::post('storeTimetable', [RegisteredUserController::class, 'storeTimetable'])->name('storeTimetable');


    Route::get('viewtimetable', [RegisteredUserController::class, 'viewtimetable'])->name('viewtimetable');
    Route::get('/timetable/export-pdf', [RegisteredUserController::class, 'exportPdf'])->name('timetable.export-pdf');

    Route::get('/timetable/{id}/edit', [RegisteredUserController::class, 'edit'])->name('timetable.edit');
    Route::put('/timetable/{id}', [RegisteredUserController::class, 'update'])->name('timetable.update');

    //chatroute
    Route::get('chat/index', [ChatController::class, 'index'])->name('index');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
    Route::get('/chat/messages/{receiver_id}', [ChatController::class, 'fetchMessages']);

    Route::get('yourattendance', [ChatController::class, 'yourattendance'])->name('yourattendance');



    //Lesson plan layout 
    Route::get('lessonplanview', [RegisteredUserController::class, 'lessonplanview'])->name('lessonplanview'); 
    Route::post('lessonplan', [RegisteredUserController::class, 'lessonplan'])->name('lessonplan');

      //lesson plan layout report
      Route::get('/reportlessonplan', [RegisteredUserController::class, 'reportlessonplanview'])->name('reportlessonplan');
      Route::post('/searchLessonPlans', [RegisteredUserController::class, 'searchLessonPlans'])->name('searchLessonPlans');
      

      


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

