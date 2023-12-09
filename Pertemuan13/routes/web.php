<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConverterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/converter', ConverterController::class)->except(['show']);
Route::get('/converter/database', [ConverterController::class, 'database'])->name('converter.database');
Route::get('/converter/api', [ConverterController::class, 'api'])->name('converter.api');
Route::post('/converter/conversion', [ConverterController::class, 'conversion'])->name('converter.conversion');


Auth::routes();