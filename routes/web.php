<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\VisitedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function() {
    Route::resource('shops', ShopController::class);   

    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::post('favorites/{shop_id}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('favorites/{shop_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    Route::post('visited/{shop_id}', [VisitedController::class, 'store'])->name('visited.store');
    Route::delete('visited/{shop_id}', [VisitedController::class, 'destroy'])->name('visited.destroy');

    Route::controller(UserController::class)->group(function() {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
        Route::get('users/mypage/reserve', 'reserve')->name('mypage.reserve');
    });

    // Route::controller(ReservationController::class)->group(function() { 
        // Route::get('shops/{id}/reservations/create', 'create')->name('reservations.create');
        // Route::get('shops/{id}/reservations/show', 'show')->name('reservations.show');
        // Route::post('reservations', 'store')->name('reservations.store');  
        
        // Route::delete('reservations/{shop_id}/'. 'destroy')->name('reservations.destroy');
    // });

});