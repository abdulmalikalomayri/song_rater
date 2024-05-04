<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\SongLikeController;
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

/* Public URL */
Route::get('/',  function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/leaderboard', [SongController::class, 'leaderboard'])->name('leaderboard');

Route::get('/favoritesongs',  function () {
    return view('profile.favoritesongs');
})->name('profile.favoritesongs');

Route::get('/dashboard/search', [SongController::class, 'search'])->name('song.search');
Route::put('/favorite/{id}/', [SongController::class, 'storeFavorite'])->name('favorite.store');
Route::delete('/favorite/{id}/', [SongController::class, 'destroyFavorite'])->name('favorite.destroy');

/* Authenticated URL */
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
