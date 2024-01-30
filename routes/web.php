<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegitrationController;
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
