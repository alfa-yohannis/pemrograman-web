<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ConverterController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Converter routess
Route::group(['prefix' => 'converters'], function () {
    Route::get('/', [ConverterController::class, 'index']);
    Route::post('/', [ConverterController::class, 'store']);
    Route::get('{id}', [ConverterController::class, 'show']);
    Route::put('{id}', [ConverterController::class, 'update']);
    Route::delete('{id}', [ConverterController::class, 'destroy']);
});
