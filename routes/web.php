<?php

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

Route::view('create-cat', "categories.create")->name('categories.create');
Route::view('edit-cat', "categories.edit")->name('categories.edit');
Route::view('cat', "categories.index")->name('categories.index');

Route::view('create-log', "logs.create")->name('logs.create');
Route::view('edit-log', "logs.edit")->name('logs.edit');
Route::view('log', "logs.index")->name('logs.index');
Route::view('log/1', "logs.show")->name('logs.show');

