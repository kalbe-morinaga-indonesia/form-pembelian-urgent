<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Back\AssignPermissionController;
use App\Http\Controllers\Back\AssignUserController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\DepartmentController;
use App\Http\Controllers\Back\DivisiController;
use App\Http\Controllers\Back\InputDataController;
use App\Http\Controllers\Back\JabatanController;
use App\Http\Controllers\Back\LokasiController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\PurchaseRequestController;
use App\Http\Controllers\Back\ReportController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\SubDepartmentController;
use App\Http\Controllers\Back\UomController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\SettingController;
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

Route::get('form-po', function () {
    return view('back.purchase.form-po.form-po');
});

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::controller(DashboardController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard');
            Route::get('dashboard/chart', 'chart');
        });

        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile', 'index')->name('profile');
            Route::put('profile', 'update')->name('profile.update');
        });

        Route::get('settings', [SettingController::class,'index'])->name('settings.index');
        Route::put('settings', [SettingController::class,'update'])->name('settings.update');

        Route::resources([
            'departments' => DepartmentController::class,
            'subdepartments' => SubDepartmentController::class,
            'divisis' => DivisiController::class,
            'jabatan' => JabatanController::class,
            'lokasi' => LokasiController::class,
            'users' => UserController::class,
            'uoms' => UomController::class,
            'roles' => RoleController::class,
            'permissions' => PermissionController::class
        ], [
            'except' => ['show']
        ]);

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

        Route::controller(PurchaseRequestController::class)->group(function () {
            Route::get('purchase-requests/', 'index')
                ->name('purchase-requests.index');
            Route::get('purchase-requests/create', 'create')
                ->name('purchase-requests.create');
            Route::get('purchase-requests/{purchase:txtSlug}', 'show')
                ->name('purchase-requests.show');
            Route::get('purchase-requests/{purchase:txtSlug}/form-po', 'formpo')
                ->name('purchase-requests.formpo');
            Route::post('purchase-requests/{purchase:txtSlug}/create', 'createInput')
                ->name('purchase-requests.create.input');
            Route::post('purchase-requests/create-input', 'storeInput')
                ->name('purchase-requests.store.input');
            Route::post('purchase-requests/create', 'store')
                ->name('purchase-requests.store');
            Route::get('purchase-requests/{purchase:txtSlug}/edit', 'edit')
                ->name('purchase-requests.edit');
            Route::put('purchase-requests/{purchase:txtSlug}/update', 'update')
                ->name('purchase-requests.update');
            Route::get('purchase-requests/approve/{purchase:txtSlug}', 'showApprove')
                ->name('purchase-requests.show-approve');
            Route::get('purchase-requests/list-po/{purchase:txtSlug}', 'showList')
                ->name('purchase-requests.show-list');
            Route::get('purchase-requests/list-po/{purchase:txtSlug}/{input:txtNomorPO}', 'showListPo')
            ->name('purchase-requests.show-list-po');
            Route::get('purchase-requests/{purchase:txtSlug}/{input:txtNomorPO}/cetak_po', 'cetakPo')
            ->name('purchase-requests.cetakpo');
            Route::put('purchase-requests/list-po/{purchase:txtSlug}/{input:txtNomorPO}', 'approvePo')
            ->name('purchase-requests.approve-po');
            Route::put('purchase-requests/approve/{purchase:txtSlug}', 'approve')
                ->name('purchase-requests.approve');
        });

        Route::controller(ReportController::class)->group(function () {
            Route::get('reports/', 'index')
                ->name('reports.index');
        });
    }
);

Route::fallback(function () {
    abort(404);
});
