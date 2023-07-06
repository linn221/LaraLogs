<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

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
})->name('dummy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/categories', CategoryController::class);
Route::resource('/logs', LogController::class);
Route::resource('/tags', TagController::class);
Route::get('/tags/{tag}', [LogController::class, 'tag'])->name('logs.tag');

// testing
Route::get('/test', CoffeeController::class)->name('test');

// Route::view('create-cat', "categories.create")->name('categories.create');
// Route::view('edit-cat', "categories.edit")->name('categories.edit');
// Route::view('cat', "categories.index")->name('categories.index');

// Route::view('create-log', "logs.create")->name('logs.create');
// Route::view('edit-log', "logs.edit")->name('logs.edit');
// Route::view('log', "logs.index")->name('logs.index');
// Route::view('log/1', "logs.show")->name('logs.show');