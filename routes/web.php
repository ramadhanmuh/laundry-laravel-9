<?php

use App\Http\Controllers\Backend\AuthController;
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
    return view('welcome');
});

Route::name('admin.')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::name('auth.')->group(function () {
            Route::prefix('/')->group(function () {
                Route::middleware(['logout'])->group(function () {
                    Route::controller(AuthController::class)->group(function () {
                        Route::get('/', 'show')->name('show');
                        Route::post('/', 'authenticate')->name('authenticate');
                    });
                });
            });
        });
    });
});

