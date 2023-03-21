<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AppController::class, 'welcome'])->name('welcome');

Route::middleware('guest')->group(function () {
    Route::get('admin-login', [AppController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('admin-login-store', [AppController::class, 'adminLogin'])->name('admin.login');
});

Route::middleware('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('create-new-user', [DashboardController::class, 'createUserView'])->name('user.create');
    Route::post('store-new-user', [DashboardController::class, 'storeUser'])->name('user.store');
});


Route::get('change-password/{id}', [AppController::class, 'changePassword'])->name('password.change');
Route::post('store-change-password/{id}', [AppController::class, 'storePassword'])->name('password.store');
