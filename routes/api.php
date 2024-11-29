<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AduanWargaController;
use App\Http\Controllers\Api\KegiatanWargaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






Route::group(['middleware' => 'cors'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/aduan', [AduanWargaController::class, 'getAllAduan']);
    Route::post('/aduan', [AduanWargaController::class, 'createAduan']);
    Route::get('/kegiatan', [KegiatanWargaController::class, 'getAllKegiatan']);
});
