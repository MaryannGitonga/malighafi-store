<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\API\MpesaResponseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('validation', [MpesaResponseController::class, 'validation']);
Route::post('confirmation', [MpesaResponseController::class, 'confirmation']);
Route::post('stkpush', [MpesaResponseController::class, 'stkPush']);
Route::post('b2ccallback',[MpesaResponseController::class,'b2cCallback']);
