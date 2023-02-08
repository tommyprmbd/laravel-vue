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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/products', App\Http\Controllers\ProductController::class);
Route::resource('/categories', App\Http\Controllers\CategoryController::class);
Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::resource('/suppliers', App\Http\Controllers\SupplierController::class);
Route::resource('/pengeluarans', App\Http\Controllers\PengeluaranController::class);

Route::get('/api/categories',[App\Http\Controllers\CategoryController::class, 'api']);
Route::get('/api/products',[App\Http\Controllers\ProductController::class, 'api']);
Route::get('/api/members',[App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/suppliers',[App\Http\Controllers\SupplierController::class, 'api']);
Route::get('/api/pengeluarans',[App\Http\Controllers\PengeluaranController::class, 'api']);
