<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmergencyController;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    Route::post('emergency', [EmergencyControlleR::class, 'store']);
    Route::get('emergency', [EmergencyControlleR::class, 'getEmergency']);
    
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});