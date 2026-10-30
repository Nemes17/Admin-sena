<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\TrainingCenterController;
use App\Http\Controllers\Api\EnvironmentController;
use App\Http\Controllers\Api\ComputerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\ApprenticeController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\AttendanceController;
use App\Http\Controllers\Api\IncidentController;
use App\Http\Controllers\Api\CourseTeacherController;
use App\Http\Controllers\Api\AdministrativeController;
use App\Http\Controllers\Api\AuthController;

Route::post('login', [AuthController::class, 'login'])->name('api.v1.login');

Route::get('teachers/home/{user}', [TeacherController::class, 'home'])->name('api.v1.teachers.home');
Route::get('teachers/course/{course}/apprentices', [TeacherController::class, 'aprendices'])->name('api.v1.teachers.apprentices');
Route::get('apprentices/home/{user}', [ApprenticeController::class, 'home'])->name('api.v1.apprentices.home');
Route::get('apprentices/ofertas', [ApprenticeController::class, 'ofertas'])->name('api.v1.apprentices.ofertas');
Route::post('apprentices/inscribirse/{user}/{course}', [ApprenticeController::class, 'inscribirse'])->name('api.v1.apprentices.inscribirse');
Route::post('apprentices/retirarme/{user}', [ApprenticeController::class, 'retirarme'])->name('api.v1.apprentices.retirarme');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('areas/consulta1', [AreaController::class, 'consulta1'])->name('api.v1.areas.consulta1');
Route::get('training-centers/consulta1', [TrainingCenterController::class, 'consulta1'])->name('api.v1.training-centers.consulta1');
Route::get('environments/consulta1', [EnvironmentController::class, 'consulta1'])->name('api.v1.environments.consulta1');
Route::get('computers/consulta1', [ComputerController::class, 'consulta1'])->name('api.v1.computers.consulta1');
Route::get('users/consulta1', [UserController::class, 'consulta1'])->name('api.v1.users.consulta1');
Route::get('teachers/consulta1', [TeacherController::class, 'consulta1'])->name('api.v1.teachers.consulta1');
Route::get('courses/consulta1', [CourseController::class, 'consulta1'])->name('api.v1.courses.consulta1');
Route::get('apprentices/consulta1', [ApprenticeController::class, 'consulta1'])->name('api.v1.apprentices.consulta1');
Route::get('offers/consulta1', [OfferController::class, 'consulta1'])->name('api.v1.offers.consulta1');
Route::get('attendances/consulta1', [AttendanceController::class, 'consulta1'])->name('api.v1.attendances.consulta1');
Route::get('incidents/consulta1', [IncidentController::class, 'consulta1'])->name('api.v1.incidents.consulta1');
Route::get('course-teachers/consulta1', [CourseTeacherController::class, 'consulta1'])->name('api.v1.course-teachers.consulta1');
Route::get('administratives/consulta1', [AdministrativeController::class, 'consulta1'])->name('api.v1.administratives.consulta1');

Route::get('areas', [AreaController::class, 'index'])->name('api.v1.areas.index');
Route::post('areas', [AreaController::class, 'store'])->name('api.v1.areas.store');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('api.v1.areas.show');
Route::put('areas/{area}', [AreaController::class, 'update'])->name('api.v1.areas.update');
Route::delete('areas/{area}', [AreaController::class, 'destroy'])->name('api.v1.areas.destroy');

Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('api.v1.training-centers.index');
Route::post('training-centers', [TrainingCenterController::class, 'store'])->name('api.v1.training-centers.store');
Route::get('training-centers/{training_center}', [TrainingCenterController::class, 'show'])->name('api.v1.training-centers.show');
Route::put('training-centers/{training_center}', [TrainingCenterController::class, 'update'])->name('api.v1.training-centers.update');
Route::delete('training-centers/{training_center}', [TrainingCenterController::class, 'destroy'])->name('api.v1.training-centers.destroy');

Route::get('environments', [EnvironmentController::class, 'index'])->name('api.v1.environments.index');
Route::post('environments', [EnvironmentController::class, 'store'])->name('api.v1.environments.store');
Route::get('environments/{environment}', [EnvironmentController::class, 'show'])->name('api.v1.environments.show');
Route::put('environments/{environment}', [EnvironmentController::class, 'update'])->name('api.v1.environments.update');
Route::delete('environments/{environment}', [EnvironmentController::class, 'destroy'])->name('api.v1.environments.destroy');

Route::get('computers', [ComputerController::class, 'index'])->name('api.v1.computers.index');
Route::post('computers', [ComputerController::class, 'store'])->name('api.v1.computers.store');
Route::get('computers/{computer}', [ComputerController::class, 'show'])->name('api.v1.computers.show');
Route::put('computers/{computer}', [ComputerController::class, 'update'])->name('api.v1.computers.update');
Route::delete('computers/{computer}', [ComputerController::class, 'destroy'])->name('api.v1.computers.destroy');

Route::get('users', [UserController::class, 'index'])->name('api.v1.users.index');
Route::post('users', [UserController::class, 'store'])->name('api.v1.users.store');
Route::get('users/{user}', [UserController::class, 'show'])->name('api.v1.users.show');
Route::put('users/{user}', [UserController::class, 'update'])->name('api.v1.users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('api.v1.users.destroy');

Route::get('teachers', [TeacherController::class, 'index'])->name('api.v1.teachers.index');
Route::post('teachers', [TeacherController::class, 'store'])->name('api.v1.teachers.store');
Route::get('teachers/{teacher}', [TeacherController::class, 'show'])->name('api.v1.teachers.show');
Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('api.v1.teachers.update');
Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('api.v1.teachers.destroy');

Route::get('courses', [CourseController::class, 'index'])->name('api.v1.courses.index');
Route::post('courses', [CourseController::class, 'store'])->name('api.v1.courses.store');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('api.v1.courses.show');
Route::put('courses/{course}', [CourseController::class, 'update'])->name('api.v1.courses.update');
Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('api.v1.courses.destroy');

Route::get('apprentices', [ApprenticeController::class, 'index'])->name('api.v1.apprentices.index');
Route::post('apprentices', [ApprenticeController::class, 'store'])->name('api.v1.apprentices.store');
Route::get('apprentices/{apprentice}', [ApprenticeController::class, 'show'])->name('api.v1.apprentices.show');
Route::put('apprentices/{apprentice}', [ApprenticeController::class, 'update'])->name('api.v1.apprentices.update');
Route::delete('apprentices/{apprentice}', [ApprenticeController::class, 'destroy'])->name('api.v1.apprentices.destroy');

Route::get('offers', [OfferController::class, 'index'])->name('api.v1.offers.index');
Route::post('offers', [OfferController::class, 'store'])->name('api.v1.offers.store');
Route::get('offers/{offer}', [OfferController::class, 'show'])->name('api.v1.offers.show');
Route::put('offers/{offer}', [OfferController::class, 'update'])->name('api.v1.offers.update');
Route::delete('offers/{offer}', [OfferController::class, 'destroy'])->name('api.v1.offers.destroy');

Route::get('attendances', [AttendanceController::class, 'index'])->name('api.v1.attendances.index');
Route::post('attendances', [AttendanceController::class, 'store'])->name('api.v1.attendances.store');
Route::get('attendances/{attendance}', [AttendanceController::class, 'show'])->name('api.v1.attendances.show');
Route::put('attendances/{attendance}', [AttendanceController::class, 'update'])->name('api.v1.attendances.update');
Route::delete('attendances/{attendance}', [AttendanceController::class, 'destroy'])->name('api.v1.attendances.destroy');

Route::get('incidents', [IncidentController::class, 'index'])->name('api.v1.incidents.index');
Route::post('incidents', [IncidentController::class, 'store'])->name('api.v1.incidents.store');
Route::get('incidents/{incident}', [IncidentController::class, 'show'])->name('api.v1.incidents.show');
Route::put('incidents/{incident}', [IncidentController::class, 'update'])->name('api.v1.incidents.update');
Route::delete('incidents/{incident}', [IncidentController::class, 'destroy'])->name('api.v1.incidents.destroy');

Route::get('course-teachers', [CourseTeacherController::class, 'index'])->name('api.v1.course-teachers.index');
Route::post('course-teachers', [CourseTeacherController::class, 'store'])->name('api.v1.course-teachers.store');
Route::get('course-teachers/{course_teacher}', [CourseTeacherController::class, 'show'])->name('api.v1.course-teachers.show');
Route::put('course-teachers/{course_teacher}', [CourseTeacherController::class, 'update'])->name('api.v1.course-teachers.update');
Route::delete('course-teachers/{course_teacher}', [CourseTeacherController::class, 'destroy'])->name('api.v1.course-teachers.destroy');

Route::get('administratives', [AdministrativeController::class, 'index'])->name('api.v1.administratives.index');
Route::post('administratives', [AdministrativeController::class, 'store'])->name('api.v1.administratives.store');
Route::get('administratives/{administrative}', [AdministrativeController::class, 'show'])->name('api.v1.administratives.show');
Route::put('administratives/{administrative}', [AdministrativeController::class, 'update'])->name('api.v1.administratives.update');
Route::delete('administratives/{administrative}', [AdministrativeController::class, 'destroy'])->name('api.v1.administratives.destroy');
