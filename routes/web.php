<?php

use App\Http\Controllers\BadgeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FunFactController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MaterialController; // Ensure this is included
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;


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

    //Quizzes
    Route::controller(QuizController::class)->group(function () {
        Route::get('/quizzes', 'index')->name('quizzes.index');
        Route::get('/quizzes/create', 'create')->name('quizzes.create');
        Route::post('/quizzes/create', 'store')->name('quizzes.store');
        Route::get('/quizzes/{quiz}', 'show')->name('quizzes.show');
        Route::get('/quizzes/{quiz}/edit', 'edit')->name('quizzes.edit');
        Route::put('/quizzes/{quiz}', 'update')->name('quizzes.update');
        Route::delete('/quizzes/{quiz}', 'destroy')->name('quizzes.destroy');
    });

    //Questions
    Route::controller(QuestionController::class)->group(function () {
        Route::get('/questions', 'index')->name('questions.index');
        Route::get('/questions/create', 'create')->name('questions.create');
        Route::post('/questions', 'store')->name('questions.store'); // Adjusted for storing questions
        Route::get('/questions/{question}', 'show')->name('questions.show'); // Show quiz questions
        Route::get('/questions/{quiz}/edit/{question}', 'edit')->name('questions.edit'); // Edit specific question
        Route::put('/questions/{question}', 'update')->name('questions.update'); // Update specific question
        Route::delete('/questions/{question}', 'destroy')->name('questions.destroy');
    });

        //Options
        Route::controller(OptionController::class)->group(function () {
            Route::get('/options', 'index')->name('options.index');
            Route::get('/options/create', 'create')->name('options.create');
            Route::post('/options', 'store')->name('options.store'); // Adjusted for storing options
            Route::get('/options/{option}', 'show')->name('options.show'); // Show quiz options
            Route::get('/options/{question}/edit/{option}', 'edit')->name('options.edit'); // Edit specific option
            Route::put('/options/{option}', 'update')->name('options.update'); // Update specific option
            Route::delete('/options/{option}', 'destroy')->name('options.destroy');
        });
    


});


// Route to show the form for creating a new lecture
Route::get('/createlecture', [LectureController::class, 'create'])->name('create.lecture');

// Route to handle the form submission for creating a new lecture
Route::post('/createlecture', [LectureController::class, 'store'])->name('store.lecture');

// Route to handle the edit for lecture
Route::get('/editlecture/{lecture}', [LectureController::class, 'edit'])->name('edit.lecture');

// Route to handle the update for lecture
Route::put('/editlecture/{lecture}', [LectureController::class, 'update'])->name('update.lecture');

// Route to handle image uploads
Route::post('/upload/image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');





Route::get('/manage', function () {
    return view('manage');
})->name('manage');

require __DIR__ . '/auth.php';



// Topics
Route::resource('/topics', TopicsController::class, ['except' => ['create', 'edit', 'show']]);

// Courses
Route::resource('/courses', CoursesController::class, ['except' => ['create', 'edit', 'show']]);
