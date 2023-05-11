<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\PlanerController;
use App\Http\Controllers\HarmonogramController;


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

Route::middleware(['auth:sanctum'])->group(function () {
      Route::get('/users/auth', AuthController::class);
      Route::get('/users/{id}', function ($id) {
        return User::findOrFail($id);
    });
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('trackers', TrackerController::class);
    Route::apiResource('groups', TrackerController::class);
    Route::apiResource('planers', PlanerController::class);
    Route::apiResource('harmonograms', HarmonogramController::class);
  });
