<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumerController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/consumers', [ConsumerController::class, 'index'])
    ->name('consumers.index');

Route::get('/consumers/create', [ConsumerController::class, 'create'])
    ->name('consumers.create');

Route::post('/consumers', [ConsumerController::class, 'store'])
    ->name('consumers.store');

Route::get('/consumers/{id}', [ConsumerController::class, 'show'])
    ->name('consumers.show');


require __DIR__.'/auth.php';
