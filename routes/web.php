<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::post('/upload', [DataController::class, 'upload'])->name('upload');

Route::get('/data', [IndexController::class, 'data'])->name('data');
Route::get('/filter', [IndexController::class, 'filter'])->name('filter');
Route::post('/filter', [IndexController::class, 'store'])->name('store');
