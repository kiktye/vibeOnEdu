<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BadgeController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\EvaluationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('auth/social/{provider}', [AuthController::class, 'socialLogin']);


Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('modules', ModuleController::class);
    Route::apiResource('lectures', LectureController::class);
    Route::apiResource('materials', MaterialController::class);
    Route::apiResource('evaluations', EvaluationController::class);
    Route::apiResource('badges', BadgeController::class);
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('certificates', CertificateController::class);
});
