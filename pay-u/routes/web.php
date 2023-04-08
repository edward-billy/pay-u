<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\productController;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\settingController;


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
    return view('registlogin.landing');
});

Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'register'])->name('register');
Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/post-login', [loginController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/profile', [profileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/cart', [cartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/kasir', [kasirController::class, 'index'])->name('kasir')->middleware('auth');
Route::get('/setting', [settingController::class, 'index'])->name('setting')->middleware('auth');

// Route::get('/stokbarang', [produkController::class, 'index'])->name('stokbarang')->middleware('auth');
// Route::get('/stokbarang/addStok', [produkController::class, 'addData'])->middleware('auth');
// Route::post('/stokbarang/insert', [produkController::class, 'insert'])->middleware('auth');
// Route::get('/stokbarang/edit/{id}', [produkController::class, 'edit'])->middleware('auth');
// Route::post('/stokbarang/editstok/{produk}', [produkController::class, 'editstok'])->middleware('auth');
// Route::get('stokbarang/detail/{produk}', [produkController::class, 'detail'])->middleware('auth');
// Route::get('stokbarang/delete/{produk}', [produkController::class, 'delete'])->middleware('auth');

Route::resource('/product', productController::class)->middleware('auth');