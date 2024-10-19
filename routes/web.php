<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

    // Users Management
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('{user}', [UserController::class, 'show'])->name('show');
        Route::post('/', [UserController::class, 'store'])->name('store');

        Route::put('{badge}', [UserController::class, 'update'])->name('update');
        Route::delete('{badge}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Badge Management
    Route::prefix('badges')->name('badges.')->group(function () {
        Route::get('/', [BadgeController::class, 'index'])->name('index');
        Route::get('{badge}', [BadgeController::class, 'show'])->name('show');
        Route::post('/', [BadgeController::class, 'store'])->name('store');

        Route::put('{badge}', [BadgeController::class, 'update'])->name('update');
        Route::delete('{badge}', [BadgeController::class, 'destroy'])->name('destroy');
    });
});


Route::get('/manage', function () {
    return view('manage');
})->name('manage');


require __DIR__ . '/auth.php';
