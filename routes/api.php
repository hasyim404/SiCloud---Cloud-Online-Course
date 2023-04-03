<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\VideomateriController;
use App\Http\Controllers\Api\ModulController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\AuthController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/* 
|--------------------------------------------------------------------------
| No Auth
|--------------------------------------------------------------------------
*/
Route::get('/course', [CourseController::class, 'index']);

/* 
|--------------------------------------------------------------------------
| Auth Admin Only
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum', 'role:Admin')->group(function () {
    // Route::apiResource('videomateri', VideomateriController::class);
    // Videomateri
    Route::post('/videomateri-create', [VideomateriController::class, 'store']);
    Route::put('/videomateri-update/{id}', [VideomateriController::class, 'update']);
    Route::delete('/videomateri/{id}', [VideomateriController::class, 'destroy']);

    // Route::apiResource('modul', ModulController::class);
    // Modul
    Route::post('/modul-create', [ModulController::class, 'store']);
    Route::put('/modul-update/{id}', [ModulController::class, 'update']);
    Route::delete('/modul/{id}', [ModulController::class, 'destroy']);

    // Course
    Route::post('/course-create', [CourseController::class, 'store']);
    Route::put('/course-update/{id}', [CourseController::class, 'update']);
    Route::delete('/course/{id}', [CourseController::class, 'destroy']);

    // Feedback
    Route::get('/feedback', [FeedbackController::class, 'index']);
    Route::get('/feedback/{id}', [FeedbackController::class, 'show']);
    Route::delete('/feedback/{id}', [FeedbackController::class, 'destroy']);


});


/* 
|--------------------------------------------------------------------------
| Auth Only
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {
    // Videomateri
    Route::get('/videomateri', [VideomateriController::class, 'index']);
    Route::get('/videomateri/{id}', [VideomateriController::class, 'show']);
    
    // Modul
    Route::get('/modul', [ModulController::class, 'index']);
    Route::get('/modul/{id}', [ModulController::class, 'show']);
    
    // Course
    Route::get('/course/{id}', [CourseController::class, 'show']);

    // Feedback
    Route::post('/feedback-create', [FeedbackController::class, 'store']);
});


/* 
|--------------------------------------------------------------------------
| Auth Register RestAPI
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
