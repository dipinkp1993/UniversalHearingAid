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