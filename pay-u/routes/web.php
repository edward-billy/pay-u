<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;

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

Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'register'])->name('register');
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/post-login', [loginController::class, 'postLogin'])->name('login.post'); 
Route::get('/logout', [loginController::class, 'logout'])->name('logout');