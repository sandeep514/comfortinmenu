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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'category'] , function(){
	Route::get('/list', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
	Route::get('create/new', [App\Http\Controllers\CategoryController::class, 'create'])->name('create.new.category');
	Route::post('save/new', [App\Http\Controllers\CategoryController::class, 'save'])->name('save.new.category');
	Route::get('delete{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete.category');
	Route::get('change/status/{id}', [App\Http\Controllers\CategoryController::class, 'changeStatus'])->name('change.status');
});

Route::group(['prefix' => 'cuisine'] , function(){
	Route::get('/list', [App\Http\Controllers\CuisineController::class, 'index'])->name('cuisine.index');
	Route::get('create/new', [App\Http\Controllers\CuisineController::class, 'create'])->name('create.new.cuisine');
	Route::post('save/new', [App\Http\Controllers\CuisineController::class, 'save'])->name('save.new.cuisine');
	Route::get('delete{id}', [App\Http\Controllers\CuisineController::class, 'delete'])->name('delete.cuisine');
	Route::get('change/status/{id}', [App\Http\Controllers\CuisineController::class, 'changeStatus'])->name('cuisine.change.status');
});


Route::get('get/category/by/type/{type}' , [App\Http\Controllers\ProductController::class, 'getCategoryByType'])->name('get.change.type');
Route::get('get/cuisine/by/type/{catId}' , [App\Http\Controllers\ProductController::class, 'getCuisineByType'])->name('get.change.category');