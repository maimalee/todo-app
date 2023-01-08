<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
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
Route::get('/', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::prefix('todo')
    ->middleware('auth')
    ->name('todo.')
    ->group(function () {
        Route::get('/', [TodoController::class, 'index'])->name('index');
        Route::get('/create', [TodoController::class, 'create'])->name('create');
        Route::post('/store', [TodoController::class, 'store'])->name('store');
        Route::get('/{id}/show', [TodoController::class, 'show'])->name('show');
    });

Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {
        Route::get('/users', [AdminController::class, 'showUsers'])->name('users');
        Route::get('/{id}/delete', [AdminController::class, 'softDelete'])->name('delete');
        Route::match(['post', 'get'], '/{user_id}/edit', [AdminController::class, 'editUser'])->name('edit');
        Route::get('/{user_id/recover', [AdminController::class, 'recoverUser'])->name('recover');
    });
