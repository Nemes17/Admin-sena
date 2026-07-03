<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseTeacherController;

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


Route::get('/area/create', [AreaController::class, 'create']);
Route::post('/area/store', [AreaController::class, 'store'])->name('area.store');
Route::get('/area', [AreaController::class, 'index']);
Route::get('/area/{id}', [AreaController::class, 'show']);

Route::get('/training_center/create', [TrainingCenterController::class, 'create']);
Route::post('/training_center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');
// Training Centers
Route::get('/training_center', [TrainingCenterController::class, 'index']);
Route::get('/training_center/{id}', [TrainingCenterController::class, 'show']);

Route::get('/computer/create', [ComputerController::class, 'create']);
Route::post('/computer/store', [ComputerController::class, 'store'])->name('computer.store');
// Computers
Route::get('/computer', [ComputerController::class, 'index']);
Route::get('/computer/{id}', [ComputerController::class, 'show']);

Route::get('/teacher/create', [TeacherController::class, 'create']);
Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
// Teachers
Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher/{id}', [TeacherController::class, 'show']);


Route::get('/course/create', [CourseController::class, 'create']);
Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
// Courses
Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'show']);


Route::get('/apprentice/create', [ApprenticeController::class, 'create']);
Route::post('/apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');
// Apprentices
Route::get('/apprentice', [ApprenticeController::class, 'index']);
Route::get('/apprentice/{id}', [ApprenticeController::class, 'show']);

Route::get('/course_teacher/create', [CourseTeacherController::class, 'create']);
Route::post('/course_teacher/store', [CourseTeacherController::class, 'store'])->name('course_teacher.store');