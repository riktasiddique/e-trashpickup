<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('dashboard')->group(function () {
    Route::resource('users', UserController::class)->middleware(['auth','admin']);
    Route::get('users/{user}/change_status',[UserController::class, 'chageStatus'])->name('user.change_status')->middleware(['auth','admin']);
    Route::post('users/{user}/change-role',[UserController::class, 'chageRole'])->name('user.change_role')->middleware(['auth','super_admin']);
    Route::resource('posts', PostController::class)->middleware(['auth','admin']);
   
});
