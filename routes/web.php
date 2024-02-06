<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\RegitrationController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





// Authentication
Route::get('/signin', [AuthController::class, 'showPage'])->name('auth.showPage')->middleware('guest');
Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin')->middleware('guest');
Route::delete('/signout', [AuthController::class, 'signout'])->name('auth.signout')->middleware('auth');

// Registration
Route::get('/signup', [RegitrationController::class, 'showPage'])->name('registration.showPage')->middleware('guest');
Route::post('/signup', [RegitrationController::class, 'register'])->name('registration.register')->middleware('guest');

// Recovery
Route::get('/forgot-password', [ResetPasswordController::class, 'showPage'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])->name('password.email')->middleware('guest');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset')->middleware('guest');
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'updatePassword'])->name('password.update')->middleware('guest');


Route::middleware(['auth'])->group(function () {
    // File controller
    Route::resource('my-files', FileController::class)->parameter('my-files', 'file');
});
