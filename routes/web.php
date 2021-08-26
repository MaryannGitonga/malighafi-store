<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'welcome'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('shop', [HomeController::class, 'index'])->name('shop');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

Route::group(['middleware' => ['auth', 'prevent-back-history', 'verified']], function(){
    // user profile action routes
    Route::put('profile/update-profile', [AccountController::class, 'update_profile'])->name('account.update-profile');
    Route::put('profile/update-mpesa', [AccountController::class, 'update_mpesa'])->name('account.update-mpesa');
    Route::put('profile/update-address', [AccountController::class, 'update_address'])->name('account.update-address');
});

// buyer account routes
Route::group(['middleware' => ['buyer', 'auth', 'prevent-back-history', 'verified']], function(){
    Route::get('buyer/profile', [BuyerController::class, 'profile'])->name('buyer.profile');
    Route::get('buyer/wishlist', [BuyerController::class, 'wishlist'])->name('buyer.wishlist');
    Route::get('buyer/orders', [BuyerController::class, 'orders'])->name('buyer.orders');
    Route::get('buyer/inbox', [BuyerController::class, 'inbox'])->name('buyer.inbox');
    Route::get('cart', [BuyerController::class, 'cart'])->name('buyer.cart');
    Route::get('customer-information', [BuyerController::class, 'checkout_info'])->name('buyer.checkout-info');
    Route::get('payment', [BuyerController::class, 'payment'])->name('buyer.payment');
    Route::get('profile/activate-seller', [BuyerController::class, 'activate_seller'])->name('buyer.activate-seller');

    Route::get('seller/permit-upload', [SellerController::class, 'check_permit'])->name('seller.check-permit');
    Route::post('seller/upload-permit', [SellerController::class, 'upload_permit'])->name('seller.upload-permit');
});

// admin/ seller account routes
Route::group(['middleware' => ['admin', 'auth', 'prevent-back-history', 'verified']], function(){
    // General Routes
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('roles', RoleController::class);
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'delete'])->name('products.delete');

    // Admin routes
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::resource('users', UserController::class);

    // Seller routes
    Route::get('seller/profile', [SellerController::class, 'profile'])->name('seller.profile');
    Route::get('profile/activate-buyer', [SellerController::class, 'activate_buyer'])->name('seller.activate-buyer');

});

require __DIR__.'/auth.php';
