<?php
use Illuminate\Support\Facades\Route;

// Admin controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;

// Frontend controllers
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;

// Admin router
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/users', UserController::class);
    Route::post('/admin/menus/update-order', [MenuController::class, 'updateOrder'])->name('menus.updateOrder');

});

// Frontend routes
Route::get('/', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/menu/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');

require __DIR__ . '/auth.php';
