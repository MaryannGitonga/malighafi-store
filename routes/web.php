<?php

use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\HomeController;
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

    // buyer account routes
    Route::get('/profile', [BuyerController::class, 'profile'])->name('buyer.profile');
    Route::put('/profile/update-profile', [BuyerController::class, 'update_profile'])->name('buyer.update-profile');
    Route::put('/profile/update-mpesa', [BuyerController::class, 'update_mpesa'])->name('buyer.update-mpesa');
    Route::put('/profile/update-address', [BuyerController::class, 'update_address'])->name('buyer.update-address');
});
require __DIR__.'/auth.php';
