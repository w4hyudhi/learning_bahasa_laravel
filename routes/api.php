<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DistrikController;
use App\Http\Controllers\Api\ElectorController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\PemilihController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('fetch', [AuthController::class, 'fetch']);
    Route::get('distrik', [DistrikController::class, 'index']);
    Route::apiResource('elector', ElectorController::class);
    Route::get('dashboard/distrik', [DistrikController::class, 'distrik']);
    Route::get('tps/', [DistrikController::class, 'tps']);
    Route::get('desa/', [DistrikController::class, 'desa']);
    Route::get('dashboard', [DistrikController::class, 'dashboard']);


});

Route::get('spell', [MainController::class, 'spell']);
Route::get('image-category', [MainController::class, 'ImageCategory']);
Route::get('item-image/{id}', [MainController::class, 'ItemImage']);
Route::get('video-category', [MainController::class, 'VideoCategory']);
Route::get('item-video/{id}', [MainController::class, 'ItemVideo']);



