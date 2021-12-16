<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Services\Reddit;

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

app()->singleton(Reddit::class, function($app) {
    return new Reddit('Beep Boop');
});

Route::get('/reddit', [ConsumerController::class, 'redditMethod']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/consumers', [ConsumerController::class, 'index'])
    ->name('consumers.index');

Route::get('/consumers/create', [ConsumerController::class, 'create'])
    ->name('consumers.create')->middleware(['auth'])
    ->middleware(['two.factor']);

Route::post('/consumers', [ConsumerController::class, 'store'])
    ->name('consumers.store')->middleware(['auth']);

Route::get('/consumers/{consumer}', [ConsumerController::class, 'show'])
    ->name('consumers.show');

Route::post('/consumers/{consumer}', [ConsumerController::class, 'destroy'])
    ->name('consumers.destroy')->middleware(['auth']);

Route::get('consumers/{consumer}/edit', [ConsumerController::class, 'edit'])
    ->name('consumers.edit')->middleware(['auth']);

Route::post('consumers/{consumer}/edit', [ConsumerController::class, 'update'])
    ->name('consumers.update');

Route::get('/comments', [CommentController::class, 'index'])
    ->name('comments.index');

Route::get('/images/index', [ImageController::class, 'index'])
    ->name('images.index');

Route::get('/images/create', [ImageController::class, 'create'])
    ->name('images.create');

Route::post('/images/create', [ImageController::class, 'store'])
    ->name('images.store');

require __DIR__.'/auth.php';
