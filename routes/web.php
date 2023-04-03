<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KelolaUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LPCourseController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\FilemateriController;
use App\Http\Controllers\VideomateriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Landingpage Routes
Route::resource('/', LandingpageController::class);
Route::resource('/home', LandingpageController::class);
Route::get('/daftar-course', [LPCourseController::class, 'index'])->name('daftar-course.index');
Route::group(['middleware' => 'auth'], function() {
    Route::get('/daftar-course/{id}', [LPCourseController::class, 'show'])->name('daftar-course.show');
    Route::get('/daftar-course/filemateri-download/{id}', [LPCourseController::class, 'downloadFiles'])->name('daftar-course.downloadFiles');
    Route::get('/daftar-course/create', [LPCourseController::class, 'create']);
    Route::post('/daftar-course', [LPCourseController::class, 'store'])->name('daftar-course.store');
    Route::get('/daftar-course/{id}/edit', [LPCourseController::class, 'edit']);
    Route::put('/my-profile', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::resource('my-profile', ProfileController::class);
});
Route::get('/about', function () {
    return view('landingpage.about');
});


// Admin Routes
Route::prefix('/admin')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::resource('/users', KelolaUserController::class);
    Route::put('/users/{id}/update-password', [KelolaUserController::class, 'updatePasswordAdmin']);
    Route::get('get-users-excel', [KelolaUserController::class, 'exportExcel']);
    Route::resource('/course', CourseController::class);
    Route::resource('/modul', ModulController::class);
    Route::resource('/filemateri', FilemateriController::class);
    Route::get('/filemateri-download/{id}', [FilemateriController::class, 'downloadFiles']);  
    Route::resource('/videomateri', VideomateriController::class);
    Route::resource('/feedback', FeedbackController::class);
    Route::get('get-feedback-pdf', [FeedbackController::class, 'generatePDF']);  
    Route::resource('/testimoni', TestimoniController::class);
    Route::get('get-testimoni-pdf', [TestimoniController::class, 'generatePDF']);  
    Route::get('get-testimoni-excel', [TestimoniController::class, 'exportExcel']);
});

// Register & Login Page
Auth::routes();
