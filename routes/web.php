<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegitrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\VisitorFileController;
use App\Http\Controllers\VisitorPageController;
use Illuminate\Support\Facades\Route;


// Authentication
Route::get('/signin', [AuthController::class, 'showPage'])->name('auth.showPage')->middleware('guest');
Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin')->middleware('guest');
Route::delete('/signout', [AuthController::class, 'signout'])->name('auth.signout')->middleware('auth');
Route::get('/auth/{driver}', [AuthController::class, 'useSocialite'])->name('auth.socialite')->middleware('guest');
Route::get('/auth/{driver}/callback', [AuthController::class, 'socialiteCallback'])->name('auth.socialite.callback')->middleware('guest');

// Registration
Route::get('/signup', [RegitrationController::class, 'showPage'])->name('registration.showPage')->middleware('guest');
Route::post('/signup', [RegitrationController::class, 'register'])->name('registration.register')->middleware('guest');

// Recovery
Route::get('/forgot-password', [ResetPasswordController::class, 'showPage'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendEmail'])->name('password.email')->middleware('guest');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'updatePassword'])->name('password.update');


Route::middleware(['auth'])->group(function () {
    // File controller
    Route::resource('my-files', FileController::class)->parameter('my-files', 'file');
    Route::get('/account', [AccountController::class, 'detailAccount'])->name('account');
    Route::delete('/account', [AccountController::class, 'deleteAccountAndFiles'])->name('account.delete');
    Route::patch('/account', [AccountController::class, 'updateAccount'])->name('account.update');
    Route::patch('/account/email', [AccountController::class, 'updateEmail'])->name('account.email');
    Route::patch('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
    Route::get('/account/recovery', [AccountController::class, 'recoveryPassword'])->middleware('throttle:requestReset')->name('account.recovery');
    // Administration
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/files', [AdminController::class, 'indexFile'])->name('admin.files');
        Route::get('/files/{file}', [AdminController::class, 'detailFile'])->name('admin.files.detail');
        Route::get('/accounts', [AdminController::class, 'indexAccount'])->name('admin.accounts');
        Route::delete('/accounts', [AdminController::class, 'deleteAccount'])->name('admin.accounts.delete');
        Route::patch('/accounts', [AdminController::class, 'deactivateAccount'])->name('admin.accounts.deactive');
        Route::resource('pages', PageController::class);
    });
});

// Visitor
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/popular', [VisitorFileController::class, 'showPopularFiles'])->name('popular');
Route::get('/latest', [VisitorFileController::class, 'showLatestUploadFiles'])->name('latest');
Route::get('/search', [VisitorFileController::class, 'searchFiles'])->name('search');
Route::get('/p/{page}', [VisitorPageController::class, 'show'])->name('page.show');
Route::get('/u/{user}', [VisitorFileController::class, 'detailUserFiles'])->name('detailUserFiles');
Route::get('/{file}', [VisitorFileController::class, 'showDetailFile'])->name('showDetailFile');
Route::post('/{file}', [VisitorFileController::class, 'unlockDownloadFile'])->name('unlockDownloadFile');
Route::get('/{file}/download', [VisitorFileController::class, 'downloadFile'])->name('downloadFile');
