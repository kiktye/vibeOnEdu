<?php
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FunFactController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MaterialController; // Ensure this is included
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;


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
        Route::put('{user}', [UserController::class, 'update'])->name('update');
        Route::delete('{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Badge Management
    Route::prefix('badges')->name('badges.')->group(function () {
        Route::get('/', [BadgeController::class, 'index'])->name('index');
        Route::get('{badge}', [BadgeController::class, 'show'])->name('show');
        Route::post('/', [BadgeController::class, 'store'])->name('store');
        Route::put('{badge}', [BadgeController::class, 'update'])->name('update');
        Route::delete('{badge}', [BadgeController::class, 'destroy'])->name('destroy');
    });

    // Modules Management
    Route::prefix('modules')->name('modules.')->group(function () {
        Route::get('/', [\App\Http\Controllers\ModuleController::class, 'index'])->name('index');
        Route::get('{module}', [\App\Http\Controllers\ModuleController::class, 'show'])->name('show');
        Route::post('/', [\App\Http\Controllers\ModuleController::class, 'store'])->name('store');
        Route::delete('{module}', [\App\Http\Controllers\ModuleController::class, 'destroy'])->name('destroy');
        Route::put('{module}', [\App\Http\Controllers\ModuleController::class, 'update'])->name('update');
    });

    // Lectures Management
    Route::controller(LectureController::class)->group(function () {
        Route::get('/lectures', 'index')->name('lectures.index');
        Route::get('/lectures/create', 'create')->name('lectures.create');
        Route::post('/lectures/create', 'store')->name('lectures.store');
        Route::get('/lectures/{lecture}', 'show')->name('lectures.show');
        Route::get('/lectures/{lecture}/edit', 'edit')->name('lectures.edit');
        Route::put('/lectures/{lecture}', 'update')->name('lectures.update');
        Route::delete('/lectures/{lecture}', 'destroy')->name('lectures.destroy');
    });

    // Materials Management
    Route::controller(MaterialController::class)->group(function () {
        Route::get('/materials', 'index')->name('materials.index');
        Route::get('/materials/create', 'create')->name('materials.create');
        Route::post('/materials', 'store')->name('materials.store');
        Route::get('/materials/{material}', 'show')->name('materials.show');
        Route::get('/materials/{material}/edit', 'edit')->name('materials.edit');
        Route::put('/materials/{material}', 'update')->name('materials.update');
        Route::delete('/materials/{material}', 'destroy')->name('materials.destroy');
    });

    Route::controller(FunFactController::class)->group(function () {
        Route::get('/funFacts', 'index')->name('funFacts.index');
        Route::get('/funFacts/create', 'create')->name('funFacts.create');
        Route::post('/funFacts/create', 'store')->name('funFacts.store');
        Route::get('/funFacts/{funFact}', 'show')->name('funFacts.show');
        Route::get('/funFacts/{funFact}/edit', 'edit')->name('funFacts.edit');
        Route::put('/funFacts/{funFact}', 'update')->name('funFacts.update');
        Route::delete('/funFacts/{funFact}', 'destroy')->name('funFacts.destroy');
    });


    // Topics
    Route::resource('/topics', TopicsController::class, ['except' => ['create', 'edit', 'show']]);

// Courses
    Route::resource('/courses', CoursesController::class, ['except' => ['create', 'edit', 'show']]);

    Route::resource('/quizzes', \App\Http\Controllers\QuizController::class, ['except' => ['create', 'edit', 'show']]);


});


Route::post('/upload/image', [ImageUploadController::class, 'uploadImage']);

Route::get('/materials/editor/{id}', [MaterialController::class, 'editor'])->name('materials.editor');
Route::put('/materials/{id}', [MaterialController::class, 'update'])->name('materials.update');


Route::get('/manage', function () {
    return view('manage');
})->name('manage');

require __DIR__.'/auth.php';



