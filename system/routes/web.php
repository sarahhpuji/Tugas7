<<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

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
    return view('home');
});

Route::get('/base', function () {
    return view('template.base');
});

Route::get('/dashboard', [HomeController::class, 'showDashboard']);
Route::get('/kategori', [HomeController::class, 'showKategori']);


Route::get('/about', [HomeController::class, 'showAbout']);
Route::get('/produk', [HomeController::class, 'showProduk']);
Route::get('/contact', [HomeController::class, 'showContact']);
Route::get('/shop', [HomeController::class, 'showShop']);
Route::get('/login', [AuthController::class, 'showlogin']);
Route::get('/logout', [AuthController::class, 'showLogout']);
Route::get('/registrasi', [AuthController::class, 'showRegistrasi']);
Route::get('/home', [HomeController::class, 'showHome']);

Route::get('produk', [ProdukController::class, 'index2']);
Route::get('produk/create', [ProdukController::class, 'create']);
Route::post('produk', [ProdukController::class, 'store']);
Route::get('produk/{produk}', [ProdukController::class, 'show']);
Route::get('produk/{produk}/edit', [ProdukController::class, 'edit']);
Route::put('produk/{produk}', [ProdukController::class, 'update']);
Route::delete('produk/{produk}', [ProdukController::class, 'destroy']);
Route::post('produk/filter', [ProdukController::class, 'filter']);

// user

Route::get('/user', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{user}', [UserController::class, 'show']);
Route::get('user/{user}/edit', [UserController::class, 'edit']);
Route::put('user/{user}', [UserController::class, 'update']);
Route::delete('user/{user}', [UserController::class, 'destroy']);