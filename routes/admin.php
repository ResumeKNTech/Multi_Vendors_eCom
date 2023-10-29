<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserRelationshipController;
use App\Http\Controllers\Admin\VendorController;



use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PermissionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\RolePermissionController;
use App\Http\Controllers\Auth\UserRoleController;

Route::middleware(['check_login'])->group(
    function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('sub_category')->controller(SubCategoryController::class)->name('sub_category.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('show/{id}', 'show')->name('show');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::get('show/{id}', 'show')->name('show');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
                Route::post('getSubcategories', 'getSubcategories')->name('getSubcategories');
            });
            Route::prefix('user_relationship')->controller(UserRelationshipController::class)->name('user_relationship.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::get('show/{id}', 'show')->name('show');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('brand')->controller(BrandController::class)->name('brand.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('show/{id}', 'show')->name('show');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::get('show/{id}', 'show')->name('show');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('vendor')->controller(VendorController::class)->name('vendor.')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::get('show/{id}', 'show')->name('show');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
            });
            Route::prefix('customer')->controller(CustomerController::class)->name('customer.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
            });


            // ? Route phân quyền

            Route::prefix('role')->controller(RoleController::class)->name('role.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('permission')->controller(PermissionController::class)->name('permission.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('role_permission')->controller(RolePermissionController::class)->name('role_permission.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
            Route::prefix('user_role')->controller(UserRoleController::class)->name('user_role.')->group(function () {
                Route::get('index', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::post('update/{id}', 'update')->name('update');
                Route::get('destroy/{id}', 'destroy')->name('destroy');
            });
        });
    }
);
// ? Route đăng nhập
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

});

// ? Route 404
Route::fallback(function () {
    return view('error.error');
});
