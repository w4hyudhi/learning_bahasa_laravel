<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::put('user/{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('user/{user}/destroy', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');


    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('distrik', \App\Http\Controllers\DistrikController::class);
    Route::resource('distrik.desa', \App\Http\Controllers\DesaController::class)->shallow();
    Route::resource('desa.tps', \App\Http\Controllers\TpsController::class)->shallow();
    Route::resource('elector', \App\Http\Controllers\ElectorController::class);

    Route::get('/getDesaByDistrik/{id}',  [App\Http\Controllers\DesaController::class, 'getDesaByDistrik']);

    Route::get('/getTpsByDesa/{id}',  [App\Http\Controllers\DesaController::class, 'getTpsByDesa']);

    Route::get('/ExportElector',  [App\Http\Controllers\ExportController::class, 'export_elector'])->name('export.elector');
    Route::put('hasil/{tps}/update', [\App\Http\Controllers\TpsController::class, 'hasil'])->name('hasil.update');
});