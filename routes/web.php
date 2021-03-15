<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

use App\Models\Employee;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
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
    return view('lib.frontpage');
});

Route::get('/home', [FormController::class, 'index']);
Route::post('/home', [FormController::class, 'insert'])->name('home');

Route::get('/all', [FormController::class, 'seeAll']);

Route::get('/edit/{id}', [FormController::class, 'edit']);
Route::post('/edit/{id}', [FormController::class, 'update']);

Route::get('/delete/{id}', [FormController::class, 'delete']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Brand
Route::get('/brand/all', [BrandController::class, 'index']);
Route::get('/brand', [BrandController::class, 'create']);
Route::post('/brand', [BrandController::class, 'insert'])->name('brand.insert');

Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/edit/{id}', [BrandController::class, 'update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);

//Category
Route::get('/category', [CategoryController::class, 'index']);


//Product
Route::get('/product', [ProductController::class, 'index']);