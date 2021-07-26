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
    Route::get('home', [HomeController::class, 'create'])->name('home');

    // user profile action routes
    Route::put('profile/update-profile', [AccountController::class, 'update_profile'])->name('account.update-profile');
    Route::put('profile/update-mpesa', [AccountController::class, 'update_mpesa'])->name('account.update-mpesa');
    Route::put('profile/update-address', [AccountController::class, 'update_address'])->name('account.update-address');
});

// buyer account routes
Route::group(['middleware' => ['buyer', 'auth', 'prevent-back-history', 'verified']], function(){
    Route::get('buyer/profile', [BuyerController::class, 'profile'])->name('buyer.profile');
    Route::get('profile/activate-vendor', [BuyerController::class, 'activate_vendor'])->name('buyer.activate-vendor');

    Route::get('vendor/permit-upload', [VendorController::class, 'check_permit'])->name('vendor.check-permit');
    Route::post('vendor/upload-permit', [VendorController::class, 'upload_permit'])->name('vendor.upload-permit');
});

// vendor account routes
Route::group(['middleware' => ['vendor', 'auth', 'prevent-back-history', 'verified']], function(){
    Route::get('vendor/profile', [VendorController::class, 'profile'])->name('vendor.profile');
    Route::get('profile/activate-buyer', [VendorController::class, 'activate_buyer'])->name('vendor.activate-buyer');
    Route::get('vendor/products', [VendorController::class, 'products'])->name('vendor.products');
    Route::get('product/edit', [VendorController::class, 'edit_product'])->name('edit_product');

});

require __DIR__.'/auth.php';
