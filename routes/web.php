<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseTeacherController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthLogin;
use App\Http\Controllers\AdministrativeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. RUTAS PÚBLICAS (No requieren sesión)
// ==========================================
Route::get('/', function () { return view('welcome');})->name('welcome');

// Rutas de Autenticación
Route::get('/login', [AuthLogin::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthLogin::class, 'login']);
Route::post('/logout', [AuthLogin::class, 'logout'])->name('logout');


// ==========================================
// 2. RUTAS PROTEGIDAS (Requieren iniciar sesión)
// ==========================================
Route::middleware('auth')->group(function () {
    
    // El Home del Administrador
    Route::get('/administrative', [AdministrativeController::class, 'index'])->name('administrative.home');

    // Paneles personalizados por rol (deben ir ANTES de las rutas con {id})
    Route::get('/teacher/home', [TeacherController::class, 'home'])->name('teacher.home');
    Route::get('/apprentice/home', [ApprenticeController::class, 'home'])->name('apprentice.home');
    
    Route::get('/perfil', function () { return view('profile.edit'); })->name('profile.edit');

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

    // Computers
    Route::get('/computer/create', [ComputerController::class, 'create'])->name('computer.create');
    Route::post('/computer/store', [ComputerController::class, 'store'])->name('computer.store');
    Route::get('/computer', [ComputerController::class, 'index'])->name('computer.index');
    Route::get('/computer/{id}', [ComputerController::class, 'show']);
    Route::get('/computer/{computer}/edit', [ComputerController::class, 'edit']);
    Route::put('/computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
    Route::delete('/computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

    // Teachers
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/{id}', [TeacherController::class, 'show']);
    Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit']);
    Route::put('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    // Courses
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/{id}', [CourseController::class, 'show']);
    Route::get('/course/{course}/edit', [CourseController::class, 'edit']);
    Route::put('/course/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

    // Apprentices
    // Estas rutas van ANTES de /apprentice/{id} para que "ofertas" no sea interpretado como un id
    Route::get('/apprentice/ofertas', [ApprenticeController::class, 'ofertas'])->name('apprentice.ofertas');
    Route::post('/apprentice/inscribirse/{course}', [ApprenticeController::class, 'inscribirse'])->name('apprentice.inscribirse');
    Route::post('/apprentice/retirarme', [ApprenticeController::class, 'retirarme'])->name('apprentice.retirarme');
    Route::get('/apprentice/attendance', [AttendanceController::class, 'historial'])->name('apprentice.attendance');
    Route::get('/apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');
    Route::post('/apprentice/store', [ApprenticeController::class, 'store'])->name('apprentice.store');
    Route::get('/apprentice', [ApprenticeController::class, 'index'])->name('apprentice.index');
    Route::get('/apprentice/{id}', [ApprenticeController::class, 'show']);
    Route::get('/apprentice/{apprentice}/edit', [ApprenticeController::class, 'edit']);
    Route::put('/apprentice/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentice.update');
    Route::delete('/apprentice/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');

    // Asistencia (el instructor toma asistencia de un curso puntual)
    Route::get('/teacher/attendance/{course}', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('/teacher/attendance/{course}', [AttendanceController::class, 'store'])->name('attendance.store');

    // CRUD de Ambientes
    Route::get('/environment/create', [EnvironmentController::class, 'create'])->name('environment.create');
    Route::post('/environment/store', [EnvironmentController::class, 'store'])->name('environment.store');
    Route::get('/environment', [EnvironmentController::class, 'index'])->name('environment.index');
    Route::get('/environment/{id}', [EnvironmentController::class, 'show']);
    Route::get('/environment/{environment}/edit', [EnvironmentController::class, 'edit']);
    Route::put('/environment/{environment}', [EnvironmentController::class, 'update'])->name('environment.update');
    Route::delete('/environment/{environment}', [EnvironmentController::class, 'destroy'])->name('environment.destroy');

    // Ofertas (programas / catálogo)
    Route::get('/offer/create', [OfferController::class, 'create'])->name('offer.create');
    Route::post('/offer/store', [OfferController::class, 'store'])->name('offer.store');
    Route::get('/offer', [OfferController::class, 'index'])->name('offer.index');
    Route::get('/offer/{id}', [OfferController::class, 'show']);
    Route::get('/offer/{offer}/edit', [OfferController::class, 'edit']);
    Route::put('/offer/{offer}', [OfferController::class, 'update'])->name('offer.update');
    Route::delete('/offer/{offer}', [OfferController::class, 'destroy'])->name('offer.destroy');

    // Bitácora de Novedades (Ambientes/Computadores)
    Route::get('/incident/create', [IncidentController::class, 'create'])->name('incident.create');
    Route::post('/incident/store', [IncidentController::class, 'store'])->name('incident.store');
    Route::get('/incident', [IncidentController::class, 'index'])->name('incident.index');
    Route::put('/incident/{incident}/resolve', [IncidentController::class, 'resolve'])->name('incident.resolve');

    // Course_teacher
    Route::get('/course_teacher', [CourseTeacherController::class, 'index'])->name('course_teacher.index');
    Route::get('/course_teacher/create', [CourseTeacherController::class, 'create'])->name('course_teacher.create');
    Route::post('/course_teacher/store', [CourseTeacherController::class, 'store'])->name('course_teacher.store');
    Route::delete('/course_teacher/{id}', [CourseTeacherController::class, 'destroy'])->name('course_teacher.destroy');

});