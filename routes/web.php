<?php

use App\Http\Controllers\ImageController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [ImageController::class, 'create'])->name('create');
Route::post('/store', [ImageController::class, 'store'])->name('store');
Route::get('/list', [ImageController::class, 'index'])->name('index');
Route::get('/edit/{id}', [ImageController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [ImageController::class, 'update'])->name('update');
Route::delete('/destroy/{id}', [ImageController::class, 'destroy'])->name('destroy');


