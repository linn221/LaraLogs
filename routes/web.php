<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UploadImage;
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
Route::get('/tags/{tag}', [TagController::class, 'showLogs'])->name('logs.index.tag');
Route::get('/categories/{category}', [CategoryController::class, 'showLogs'])->name('logs.index.category');
// testing
Route::get('/test', CoffeeController::class)->name('test');

Route::post('/upload-image', UploadImage::class)->name('upload-image');
Route::patch('/images/{image}', [ImageController::class, 'update'])->name('caption-image');
Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('delete-image');

// Route::view('create-cat', "categories.create")->name('categories.create');
// Route::view('edit-cat', "categories.edit")->name('categories.edit');
// Route::view('cat', "categories.index")->name('categories.index');

// Route::view('create-log', "logs.create")->name('logs.create');
// Route::view('edit-log', "logs.edit")->name('logs.edit');
// Route::view('log', "logs.index")->name('logs.index');
// Route::view('log/1', "logs.show")->name('logs.show');