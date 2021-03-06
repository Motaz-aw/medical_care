<?php

use App\Http\Controllers\Auth\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('login', [ApiAuthController::class, 'login']);// 
    Route::post('user-login', [ApiAuthController::class, 'userLogin']);
    Route::post('register', [ApiAuthController::class, 'register']);
    Route::post('forget-password', [ApiAuthController::class, 'forgetPassword']);
    Route::post('reset-password', [ApiAuthController::class, 'resetPassword']);

});

Route::prefix('auth')->middleware('auth:user-api')->group(function () {
    Route::get('logout', [ApiAuthController::class, 'logout']);
});
