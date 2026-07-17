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
Route::get('/', function () { return view('home');})->name('home');
// Areas
Route::get('/area/create', [AreaController::class, 'create'])->name('area.create');
Route::post('/area/store', [AreaController::class, 'store'])->name('area.store');
Route::get('/area', [AreaController::class, 'index'])->name('area.index');
Route::get('/area/{id}', [AreaController::class, 'show']);
Route::get('/area/{area}/edit', [AreaController::class, 'edit']);
Route::put('/area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('/area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

// Training Centers
Route::get('/training_center/create', [TrainingCenterController::class, 'create'])->name('training_center.create');
Route::post('/training_center/store', [TrainingCenterController::class, 'store'])->name('training_center.store');
Route::get('/training_center', [TrainingCenterController::class, 'index'])->name('training_center.index');
Route::get('/training_center/{id}', [TrainingCenterController::class, 'show']);
Route::get('/training_center/{training_center}/edit', [TrainingCenterController::class, 'edit']);
Route::put('/training_center/{training_center}', [TrainingCenterController::class, 'update'])->name('training_center.update');
Route::delete('/training_center/{training_center}', [TrainingCenterController::class, 'destroy'])->name('training_center.destroy');


//Computers
Route::get('/computer/create', [ComputerController::class, 'create'])->name('computer.create');
Route::post('/computer/store', [ComputerController::class, 'store'])->name('computer.store');
Route::get('/computer', [ComputerController::class, 'index'])->name('computer.index');
Route::get('/computer/{id}', [ComputerController::class, 'show']);
Route::get('/computer/{computer}/edit', [ComputerController::class, 'edit']);
Route::put('/computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('/computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

//Teachers
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/{id}', [TeacherController::class, 'show']);
Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit']);
Route::put('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');


//Courses
Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/{id}', [CourseController::class, 'show']);
Route::get('/course/{course}/edit', [CourseController::class, 'edit']);
Route::put('/course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

//Apprentices
Route::get('/apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
Route::post('/apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');
Route::get('/apprentice', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('/apprentice/{id}', [ApprenticeController::class, 'show']);
Route::get('/apprentice/{apprentice}/edit', [ApprenticeController::class, 'edit']);
Route::put('/apprentice/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('/apprentice/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

//Course_teacher
Route::get('/course_teacher', [CourseTeacherController::class, 'index'])->name('course_teacher.index');
Route::get('/course_teacher/create', [CourseTeacherController::class, 'create'])->name('course_teacher.create');
Route::post('/course_teacher/store', [CourseTeacherController::class, 'store'])->name('course_teacher.store');
Route::delete('/course_teacher/{id}', [CourseTeacherController::class, 'destroy'])->name('course_teacher.destroy');