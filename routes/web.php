<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FriendDestroyController;
use App\Http\Controllers\FriendIndexController;
use App\Http\Controllers\FriendPatchController;
use App\Http\Controllers\FriendStoreController;
use App\Http\Controllers\ProfileIndexController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::get('/friends', FriendIndexController::class)->name('friends');
Route::post('/friends/{user}', FriendStoreController::class)->name('friends.store');
Route::delete('/friends/{user}', FriendDestroyController::class)->name('friends.destroy');
Route::patch('/friends/{user}', FriendPatchController::class)->name('friends.patch');

Route::get('/profile/{user}', ProfileIndexController::class)->name('profile');

require __DIR__.'/auth.php';
