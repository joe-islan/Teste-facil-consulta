<?php

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

Route::post('/login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);

Route::get('/cidades', [\App\Http\Controllers\Api\CityController::class, 'index']);
Route::get('/medicos', [\App\Http\Controllers\Api\DoctorController::class, 'index']);
Route::get('/cidades/{city}/medicos', [\App\Http\Controllers\Api\DoctorController::class, 'showByCity']);
Route::group(['middleware' => ['api', 'jwt.verify'], 'prefix' => ''], function () {
    Route::post('/medicos', [\App\Http\Controllers\Api\DoctorController::class, 'store']);
    Route::post('/pacientes', [\App\Http\Controllers\Api\PatientController::class, 'store']);
    Route::post('/medicos/{doctor}/pacientes', [\App\Http\Controllers\Api\DoctorController::class, 'attachPatient']);

    Route::get('/medicos/{doctor}/pacientes', [App\Http\Controllers\Api\DoctorController::class, 'getPatients']);
    Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'show']);

    Route::put('/pacientes/{patient}', [\App\Http\Controllers\Api\PatientController::class, 'update']);
});
