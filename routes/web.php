<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\DepartmentController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Front

Route::prefix('/')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('', 'index')->name('home');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
    });
});

Auth::routes([
    'login' => false,
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Back
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'back'],
    function () {

        // Dashboard Controller
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

        // Departemen Controller
        Route::resource('departments', DepartmentController::class);
    }
);
