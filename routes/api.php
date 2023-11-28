<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Inicio Api sizes
 */
Route::prefix('v1')->group(function () {
    Route::get('sizes', [SizeController::class, 'index']);
    Route::post('sizes', [SizeController::class, 'store']);
    Route::get('sizes/{id}', [SizeController::class, 'show']);
    Route::put('sizes/{id}', [SizeController::class, 'update']);
    Route::delete('sizes/{id}', [SizeController::class, 'destroy']);
});
/**
 * Fin Api sizes
 */

/**
 * Inicio Api Color
 */
Route::prefix('v1')->group(function () {
    Route::get('Colors', [ColorController::class, 'index']);
    Route::post('Colors', [ColorController::class, 'store']);
    Route::get('Colors/{id}', [ColorController::class, 'show']);
    Route::put('Colors/{id}', [ColorController::class, 'update']);
    Route::delete('Colors/{id}', [ColorController::class, 'destroy']);
});
/**
 * Fin Api Color
 */
