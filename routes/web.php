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

Route::group(['prefix' => 'query'], function () {
    Route::get('/', [\App\Http\Controllers\QueryController::class, 'page']);
    Route::get('casee', [\App\Http\Controllers\QueryController::class, 'casee']);
    Route::get('cor', [\App\Http\Controllers\QueryController::class, 'cor']);
    Route::get('uncor', [\App\Http\Controllers\QueryController::class, 'uncor']);
    Route::get('select', [\App\Http\Controllers\QueryController::class, 'select']);
    Route::get('from', [\App\Http\Controllers\QueryController::class, 'from']);
    Route::get('having', [\App\Http\Controllers\QueryController::class, 'having']);
    Route::get('any', [\App\Http\Controllers\QueryController::class, 'any']);
});
