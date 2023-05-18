<?php

use App\Http\Controllers\cartController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ControllerAPI\productControllerAPI;
use App\Http\Controllers\profileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\registerController;
// use App\Http\Controllers\loginController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\settingController;
// use App\Http\Controllers\cashierController;
use App\Http\Controllers\ControllerAPI\cashierControllerAPI;
use App\Http\Controllers\ControllerAPI\loginControllerAPI;
use App\Http\Controllers\ControllerAPI\registerControllerAPI;
use Illuminate\Http\Request;

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

// Route::get('/register', [registerController::class, 'index']);
// Route::post('/register', [registerController::class, 'register'])->name('register');
// Route::get('/login', [loginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/post-login', [loginController::class, 'postLogin'])->name('login.post');
// Route::get('/logout', [loginController::class, 'logout'])->name('logout');

// Route::group(['prefix' => 'v1'], function(){
// Route::post('login', 'UsersController@login');
// Route::post('register', 'UsersController@register');
// Route::get('logout', 'UsersController@logout')->middleware('auth:api');

Route::post('register', [registerControllerAPI::class, 'register']);
Route::post('login', [loginControllerAPI::class, 'login']);
Route::group(['middleware' => 'auth:api'], function () {

Route::get('logout', [loginControllerAPI::class, 'logout']);
Route::get('history', [cashierControllerAPI::class, 'history']);
Route::get('history/{id}', [cashierControllerAPI::class, 'detail']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('profile', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [profileController::class, 'update'])->name('profile.update');
    Route::get('/cashier', [cashierController::class, 'index'])->middleware('auth');
    Route::get('/cashier/kategori/', [cashierController::class, 'kategoriCart'])->middleware('auth');
    Route::get('/cashier/tambah/{id}', [cashierController::class, 'tambahCart'])->middleware('auth');
    Route::get('/cashier/cart', [cashierController::class, 'cart'])->middleware("auth");
    Route::get('/cashier/hapus/{id}', [cashierController::class, 'hapusCart'])->middleware("auth");
    Route::post('/cashier/transaksi', [cashierController::class, 'transaksiCart'])->name('buy')->middleware("auth");
    
    Route::get('/history/detail/{id}', [cashierController::class, 'detail'])->middleware('auth');
    Route::get('/history/detail/{id}/{invoiceId}/{nama}/{name}', [cashierController::class, 'detail'])->middleware('auth');
    Route::get('/history/print', [cashierController::class, 'generateCsv'])->middleware('auth');
});

// Route::group(['middleware' => 'admin'], function () {
Route::resource('/setting', settingController::class)->middleware('auth');
// });

// Route::middleware(['auth', 'role.admin-manager'])->group(function () {
//     Route::resource('/product', productControllerAPI::class)->middleware('auth');
// });
Route::resource('/product', productControllerAPI::class);