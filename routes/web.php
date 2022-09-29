<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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
    return view('Layouts.layout');
});

Route::resource('User', UserController::class);

// Creamos la ruta individual para los permisos
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/user', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::get('/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::get('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');