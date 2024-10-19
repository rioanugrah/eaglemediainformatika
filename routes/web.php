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

Auth::routes([
    'verify' => true,
    'register' => true
]);

Route::domain(parse_url(env('APP_URL'), PHP_URL_HOST))->group(function () {
    Route::get('/', function () {
        // return view('welcome');
        return redirect()->route('login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // Route::prefix('users')->group(function () {
        //     Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->middleware('verified')->name('users');
        //     Route::get('create', [App\Http\Controllers\UserController::class, 'create'])->middleware('verified')->name('users.create');
        // });

        Route::resource('users', App\Http\Controllers\UserController::class)->middleware('verified');

        Route::prefix('permissions')->group(function () {
            Route::get('/', [App\Http\Controllers\PermissionController::class, 'index'])->middleware('verified')->name('permissions');
            Route::get('create', [App\Http\Controllers\PermissionController::class, 'create'])->middleware('verified')->name('permissions.create');
            Route::post('simpan', [App\Http\Controllers\PermissionController::class, 'simpan'])->middleware('verified')->name('permissions.simpan');
            Route::get('{id}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->middleware('verified')->name('permissions.edit');
            Route::post('{id}/update', [App\Http\Controllers\PermissionController::class, 'update'])->middleware('verified')->name('permissions.update');
        });

        Route::prefix('cooperation')->group(function () {
            Route::get('/', [App\Http\Controllers\CooperationController::class, 'index'])->middleware('verified')->name('cooperation');
            Route::get('create', [App\Http\Controllers\CooperationController::class, 'create'])->middleware('verified')->name('cooperation.create');
            Route::post('simpan', [App\Http\Controllers\CooperationController::class, 'simpan'])->middleware('verified')->name('cooperation.simpan');
            Route::get('{cooperation_code}', [App\Http\Controllers\CooperationController::class, 'detail'])->middleware('verified')->name('cooperation.detail');
            Route::get('{cooperation_code}/edit', [App\Http\Controllers\CooperationController::class, 'edit'])->middleware('verified')->name('cooperation.edit');
            Route::post('{cooperation_code}/update', [App\Http\Controllers\CooperationController::class, 'update'])->middleware('verified')->name('cooperation.update');
        });
        // Route::prefix('roles')->group(function () {
        //     Route::get('/', [App\Http\Controllers\RolesController::class, 'index'])->name('roles');
        //     Route::get('create', [App\Http\Controllers\RolesController::class, 'create'])->name('roles.create');
        // });
        Route::resource('roles', App\Http\Controllers\RolesController::class)->middleware('verified');
    });
});
