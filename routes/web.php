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

Auth::routes();

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('users')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::get('create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions');
        Route::get('create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create');
        Route::post('simpan', [App\Http\Controllers\PermissionController::class, 'simpan'])->name('permissions.simpan');
        Route::get('{id}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
        Route::post('{id}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
    });

});
