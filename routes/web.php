<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth', 'prevent-back-history', 'verified']], function(){
    Route::get('/home', [HomeController::class, 'create'])->name('home');
    Route::get('/profile/{role}', [AccountController::class, 'index'])->name('account.index');
    Route::put('/profile/update-profile', [AccountController::class, 'update_profile'])->name('account.update-profile');
    Route::put('/profile/update-mpesa', [AccountController::class, 'update_mpesa'])->name('account.update-mpesa');
    Route::put('/profile/update-address', [AccountController::class, 'update_address'])->name('account.update-address');

    Route::post('/profile/check-permit', [AccountController::class, 'check_permit'])->name('account.check-permit');
    Route::post('/profile/upload-permit', [AccountController::class, 'upload_permit'])->name('account.upload-permit');
    Route::get('/profile/activate-vendor', [AccountController::class, 'activate_vendor'])->name('account.activate-vendor');
    Route::get('/profile/activate-buyer', [AccountController::class, 'activate_buyer'])->name('account.activate-buyer');


});

// buyer account routes
Route::group(['middleware' => ['buyer', 'auth', 'prevent-back-history', 'verified']], function(){



});

// vendor account routes
Route::group(['middleware' => ['vendor', 'auth', 'prevent-back-history', 'verified']], function(){


});

require __DIR__.'/auth.php';
