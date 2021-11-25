<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [\App\Http\Controllers\CafedraController::class, 'index']);
Route::post('/', [\App\Http\Controllers\CafedraController::class, 'create']);
Route::put('/{id}', [\App\Http\Controllers\CafedraController::class, 'update']);
Route::delete('/{id}', [\App\Http\Controllers\CafedraController::class, 'delete']);


Route::group(['prefix' => 'teachers'], function () {
       Route::get('/', [\App\Http\Controllers\TeacherController::class, 'index']);
   Route::post('/', [\App\Http\Controllers\TeacherController::class, 'create']);
   Route::put('/{id}', [\App\Http\Controllers\TeacherController::class, 'update']);
   Route::delete('/{id}', [\App\Http\Controllers\TeacherController::class, 'delete']);
});

Route::group(['prefix' => 'groups'], function () {
   Route::get('/', [\App\Http\Controllers\GroupController::class, 'index']);
   Route::post('/', [\App\Http\Controllers\GroupController::class, 'create']);
   Route::put('/{id}', [\App\Http\Controllers\GroupController::class, 'update']);
   Route::delete('/{id}', [\App\Http\Controllers\GroupController::class, 'delete']);
});

Route::group(['prefix' => 'subjects'], function () {
   Route::get('/', [\App\Http\Controllers\SubjectController::class, 'index']);
   Route::post('/', [\App\Http\Controllers\SubjectController::class, 'create']);
   Route::put('/{id}', [\App\Http\Controllers\SubjectController::class, 'update']);
   Route::delete('/{id}', [\App\Http\Controllers\SubjectController::class, 'delete']);
});

Route::group(['prefix' => 'schedules'], function () {
   Route::get('/', [\App\Http\Controllers\ScheduleController::class, 'index']);
   Route::post('/', [\App\Http\Controllers\ScheduleController::class, 'create']);
   Route::put('/{id}', [\App\Http\Controllers\ScheduleController::class, 'update']);
   Route::delete('/{id}', [\App\Http\Controllers\ScheduleController::class, 'delete']);
});
