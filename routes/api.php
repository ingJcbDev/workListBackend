<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;

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

Route::get('v1/sizes', [SizeController::class, 'index']);
Route::post('v1/sizes', [SizeController::class, 'store']);
Route::put('v1/sizes/{id}', [SizeController::class, 'update']);
Route::delete('v1/sizes/{id}', [SizeController::class, 'destroy']);

