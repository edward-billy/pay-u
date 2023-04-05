<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\profileController;
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
    return view('landing');
});

Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'register'])->name('register');
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/post-login', [loginController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/stokbarang', [produkController::class, 'index']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [profileController::class, 'update'])->name('profile.update');
});