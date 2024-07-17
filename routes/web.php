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

Route::get('/', [App\Http\Controllers\SpellController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\SpellController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('user/store', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::put('user/{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('user/{user}/destroy', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('spells', \App\Http\Controllers\SpellController::class);
    Route::resource('category_video', \App\Http\Controllers\CategoryVideoController::class);
    Route::resource('category_video.video', \App\Http\Controllers\VideoController::class)->shallow();
    Route::resource('category_image', \App\Http\Controllers\CategoryImageController::class);
    Route::resource('category_image.item_image', \App\Http\Controllers\ItemImageController::class)->shallow();
    Route::resource('quiz_categories', \App\Http\Controllers\QuizCategoryController::class);
    Route::resource('quiz_categories.quiz', \App\Http\Controllers\QuizController::class)->shallow();

});
