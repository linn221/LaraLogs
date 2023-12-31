<?php

use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UploadImage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CategoryController;

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

Auth::routes([
    'register' => false
]);

// admin
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/logs', LogController::class);
    Route::get('/logs/{log}/restore', [LogController::class, 'restore'])->name('logs.restore');

    Route::get('/show-subscribers', [HomeController::class, 'showSubscribers'])->name('show-subscribers');

    Route::resource('/tags', TagController::class);
    Route::get('/tags/{tag}', [TagController::class, 'showLogs'])->name('logs.index.tag');

    Route::resource('/categories', CategoryController::class);
    Route::get('/categories/{category}', [CategoryController::class, 'showLogs'])->name('logs.index.category');
    Route::post('/upload-image', [ImageController::class, 'store'])->name('upload-image');
    Route::patch('/images/{image}', [ImageController::class, 'update'])->name('caption-image');
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('delete-image');
});

// index 
// Route::middleware('auth')->get('/', [LogController::class, 'index'])->name('home');

// public, guest users
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('page.index');
    Route::get('/tag/{tag}', 'tag')->name('page.tag');
    Route::get('/category/{category}', 'category')->name('page.category');
    Route::get('/log/{log}', 'log')->name('page.log');
});

// email subscription and following post
Route::prefix('email')->controller(EmailController::class)->group(function () {
    Route::post('/subscribe', 'subscribe')->name('email.sub');
    Route::get('/unsubscribe', 'cancel')->name('email.unsub');
    Route::get('/subscribe-again', 'resubscribe')->name('email.resub');
    
    Route::post('/receive-updates', 'follow')->name('email.follow');
    Route::get('/unfollow', 'unfollow')->name('email.unfollow');
});


// testing
Route::get('/test', CoffeeController::class)->name('test');
// Route::view('create-cat', "categories.create")->name('categories.create');
// Route::view('edit-cat', "categories.edit")->name('categories.edit');
// Route::view('cat', "categories.index")->name('categories.index');

// Route::view('create-log', "logs.create")->name('logs.create');
// Route::view('edit-log', "logs.edit")->name('logs.edit');
// Route::view('log', "logs.index")->name('logs.index');
// Route::view('log/1', "logs.show")->name('logs.show');