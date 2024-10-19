<?php

use App\Http\Controllers\LectureController;
use App\Http\Controllers\ProfileController;
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


Route::get('/manage', function () {
    return view('manage');
})->name('manage');


Route::prefix('modules')->name('modules.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ModuleController::class, 'index'])->name('index');
    Route::get('{module}', [\App\Http\Controllers\ModuleController::class, 'show'])->name('show');

    Route::post('/', [\App\Http\Controllers\ModuleController::class, 'store'])->name('store');

    Route::delete('{module}', [\App\Http\Controllers\ModuleController::class, 'destroy'])->name('destroy');
    Route::put('{modules}', [\App\Http\Controllers\ModuleController::class, 'update'])->name('update');

});

require __DIR__.'/auth.php';

Route::controller(LectureController::class)->group(function () {
    Route::get('/lectures', 'index')->name('lectures.index');
    Route::get('/lectures/create', 'create')->name('lectures.create');
    Route::post('/lectures/create', 'store')->name('lectures.store');
    Route::get('/lectures/{lecture}', 'show')->name('lectures.show');
    Route::get('/lectures/{lecture}/edit', 'edit')->name('lectures.edit');
    Route::put('/lectures/{lecture}', 'update')->name('lectures.update');
    Route::delete('/lectures/{lecture}', 'destroy')->name('lectures.destroy');
});
