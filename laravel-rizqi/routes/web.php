<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/book', [App\Http\Controllers\BookController::class, 'index']);
Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index']);
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);

Route::resource('author', AuthorController::class); 

// Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index']);
// Route::get('/publisher/create', [App\Http\Controllers\PublisherController::class, 'create']);
// Route::post('/publisher', [App\Http\Controllers\PublisherController::class, 'store']);
// Route::get('/publisher/edit/{publisher}', [App\Http\Controllers\PublisherController::class, 'edit']);
// Route::put('/publisher/{publisher}', [App\Http\Controllers\PublisherController::class, 'update']);
// Route::delete('/publisher/{publisher}', [App\Http\Controllers\PublisherController::class, 'destroy']);
Route::resource('publisher', PublisherController::class); 


// Route::get('/catalog', [App\Http\Controllers\CatalogController::class, 'index']);
// Route::get('/catalog/create', [App\Http\Controllers\CatalogController::class, 'create']); //pindah halaman ke add data
// Route::post('/catalog', [App\Http\Controllers\CatalogController::class, 'store']); //untuk menyimpan data ke database
// Route::get('/catalog/edit/{catalog}', [App\Http\Controllers\CatalogController::class, 'edit']);
// Route::put('/catalog/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
// Route::delete('/catalog/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);
Route::resource('catalog', CatalogController::class); 