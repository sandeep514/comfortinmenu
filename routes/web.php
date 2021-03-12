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

});


