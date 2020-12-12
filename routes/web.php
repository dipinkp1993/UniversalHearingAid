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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/agents', [App\Http\Controllers\HomeController::class, 'agents'])->name('agents');
Route::post('/agents', [App\Http\Controllers\HomeController::class, 'addAgents'])->name('addagents');
Route::get('/getagents', [App\Http\Controllers\HomeController::class, 'loadAgents'])->name('getagents');
Route::post('/deleteagents/{id}', [App\Http\Controllers\HomeController::class, 'deleteAgent'])->name('deleteagents');
Route::get('/estimates', [App\Http\Controllers\HomeController::class, 'estimates'])->name('estimates');
Route::post('/estimates', [App\Http\Controllers\HomeController::class, 'addEstimates'])->name('addestimates');
Route::get('/getestimatestoday', [App\Http\Controllers\HomeController::class, 'getEstimatesCurrentDate'])->name('addestimates');
Route::post('/deleteestimates/{id}', [App\Http\Controllers\HomeController::class, 'deleteEstimate'])->name('deleteagents');
Route::get('/invoice/{id}', [App\Http\Controllers\HomeController::class, 'getInvoice'])->name('getinvoice')->where('id', '[0-9]+');
Route::get('/monthlyreport', [App\Http\Controllers\HomeController::class, 'monthlyReport'])->name('estimates');
Route::post('/monthlyreport', [App\Http\Controllers\HomeController::class, 'getmonthlyReport'])->name('postestimates');
Route::post('/getmonthlychart', [App\Http\Controllers\HomeController::class, 'getMonthlyChart'])->name('getdateentry');
Route::post('/estimatesofaday/{id}', [App\Http\Controllers\HomeController::class, 'getaDayEstimate'])->name('getdateentry');