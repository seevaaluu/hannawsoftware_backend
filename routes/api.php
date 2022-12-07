<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrainerController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function() {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
});

// Trainer Routes
Route::controller(TrainerController::class)->group(function() {
    Route::get('entrenadores', 'index')->name('trainers.index');
    Route::post('entrenadores', 'store')->name('trainers.store');
});
    
// Routes Stats
Route::controller(StatsController::class)->group(function() {
    Route::get('estadisticas', 'index') ->name('stats.index');
});

// Routes Settings 
Route::controller(SettingsController::class)->group(function() {
    Route::get('configuraciones/{slug}', 'show')->name('settings.show');
    Route::patch('configuraciones/{id}', 'update')->name('settings.update');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return \Auth::user();
});
