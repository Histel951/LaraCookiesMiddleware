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
    return redirect()->route('cookie.index');
});

Route::prefix('/cookie')->name('cookie.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CookiePageController::class, 'index'])
        ->name('index');

    Route::get('/update', [\App\Http\Controllers\CookiePageController::class, 'update'])
        ->name('update');

    Route::prefix('/access')->name('access.')->group(function () {
        Route::get('/', [\App\Http\Controllers\CookiePageController::class, 'success'])
            ->name('success')->middleware(['cookie.access']);

        Route::get('/failed', [\App\Http\Controllers\CookiePageController::class, 'failed'])
            ->name('failed');
    });
});
