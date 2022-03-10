<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Back\AssignPermissionController;
use App\Http\Controllers\Back\AssignUserController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\DepartmentController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\RoleController;
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

        // Role and Permsissions
        Route::group([
            'prefix' => 'role-and-permissions'
        ], function () {

            // Role
            Route::resource('roles', RoleController::class);

            // Permission
            Route::resource('permissions', PermissionController::class);

            // Assign Permission
            Route::controller(AssignPermissionController::class)
                ->group(function () {
                    Route::get('assign-permissions/', 'index')
                        ->name('assign-permissions.index');
                    Route::get('assign-permissions/create', 'create')
                        ->name('assign-permissions.create');
                    Route::post('assign-permissions/create', 'store')
                        ->name('assign-permissions.store');
                    Route::get('assign-permissions/edit/{role}', 'edit')
                        ->name('assign-permissions.edit');
                    Route::put('assign-permissions/edit/{role}', 'update')
                        ->name('assign-permissions.update');
                });

            // Assign User
            Route::controller(AssignUserController::class)
                ->group(function () {
                    Route::get('assign-users/', 'index')
                        ->name('assign-users.index');
                    Route::get('assign-users/create', 'create')
                        ->name('assign-users.create');
                    Route::post('assign-users/create', 'store')
                        ->name('assign-users.store');
                    Route::get('assign-users/edit/{user}', 'edit')
                        ->name('assign-users.edit');
                    Route::put('assign-users/edit/{user}', 'update')
                        ->name('assign-users.update');
                });
        });
    }
);
