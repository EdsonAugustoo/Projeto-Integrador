<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::delete('/services/{id}', [ServiceController::class, 'delete']);
Route::post('/services', [ServiceController::class, 'create']);
Route::put('/services', [ServiceController::class, 'update']);
Route::get('/services/search/name/{name}', [ServiceController::class, 'searchName']);
Route::get('/services/search/name/last/{name}', [ServiceController::class, 'searchNameLast']);

Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/experiences/{id}', [ExperienceController::class, 'show']);
Route::delete('/experiences/{id}', [ExperienceController::class, 'delete']);
Route::post('/experiences', [ExperienceController::class, 'create']);
Route::put('/experiences', [ExperienceController::class, 'update']);
Route::put('/experiences/user/{user_id}', [ExperienceController::class, 'getByUser']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::post('/user', [UserController::class, 'create']);
Route::put('/user', [UserController::class, 'update']);
Route::get('/user/search/name/{name}', [UserController::class, 'searchName']);
Route::get('/user/search/name/last/{name}', [UserController::class, 'searchNameLast']);






