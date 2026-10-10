<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\TrainingCenterController;
use App\Http\Controllers\Api\ComputerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\EnvironmentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Consultas con relaciones
Route::get('areas/consulta1', [AreaController::class, 'consulta1'])->name('api.v1.areas.consulta1');

Route::get('training-centers/consulta1', [TrainingCenterController::class, 'consulta1'])->name('api.v1.training-centers.consulta1');

Route::get('environments/consulta1', [EnvironmentController::class, 'consulta1'])->name('api.v1.environments.consulta1');

Route::get('users/consulta1', [UserController::class, 'consulta1'])->name('api.v1.users.consulta1');

// Area
Route::get('areas', [AreaController::class, 'index'])->name('api.v1.areas.index');
Route::post('areas', [AreaController::class, 'store'])->name('api.v1.areas.store');
Route::get('areas/{area}', [AreaController::class, 'show'])->name('api.v1.areas.show');
Route::put('areas/{area}', [AreaController::class, 'update'])->name('api.v1.area.update');
Route::delete('areas/{area}', [AreaController::class, 'destroy'])->name('api.v1.area.destroy');

// Training_center
Route::get('training-centers', [TrainingCenterController::class, 'index'])->name('api.v1.training-centers.index');
Route::post('training-centers', [TrainingCenterController::class, 'store'])->name('api.v1.training-centers.store');
Route::get('training-centers/{training_center}', [TrainingCenterController::class, 'show'])->name('api.v1.training-centers.show');
Route::put('training-centers/{training_center}', [TrainingCenterController::class, 'update'])->name('api.v1.training-center.update');
Route::delete('training-centers/{training_center}', [TrainingCenterController::class, 'destroy'])->name('api.v1.training-center.destroy');

// Environment
Route::get('environments', [EnvironmentController::class, 'index'])->name('api.v1.environments.index');
Route::post('environments', [EnvironmentController::class, 'store'])->name('api.v1.environments.store');
Route::get('environments/{environment}', [EnvironmentController::class, 'show'])->name('api.v1.environments.show');
Route::put('environments/{environment}', [EnvironmentController::class, 'update'])->name('api.v1.environment.update');
Route::delete('environments/{environment}', [EnvironmentController::class, 'destroy'])->name('api.v1.environment.destroy');

// Computer
Route::get('computers/consulta1', [ComputerController::class, 'consulta1'])->name('api.v1.computers.consulta1');
Route::get('computers', [ComputerController::class, 'index'])->name('api.v1.computers.index');
Route::post('computers', [ComputerController::class, 'store'])->name('api.v1.computers.store');
Route::get('computers/{computer}', [ComputerController::class, 'show'])->name('api.v1.computers.show');
Route::put('computers/{computer}', [ComputerController::class, 'update'])->name('api.v1.computer.update');
Route::delete('computers/{computer}', [ComputerController::class, 'destroy'])->name('api.v1.computer.destroy');

// User
Route::get('users', [UserController::class, 'index'])->name('api.v1.users.index');
Route::post('users', [UserController::class, 'store'])->name('api.v1.users.store');
Route::get('users/{user}', [UserController::class, 'show'])->name('api.v1.users.show');
Route::put('users/{user}', [UserController::class, 'update'])->name('api.v1.user.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('api.v1.user.destroy');

