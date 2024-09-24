<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usuarios\AdminController;
use App\Http\Middleware\UserAccessDashboardMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', UserAccessDashboardMiddleware::class]], function () {
    Route::resources([
        'admin' => AdminController::class,
        //'coordinador' => App\Http\Controllers\Dashboard\CategoryController::class,
    ]);
    Route::get('', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});

require __DIR__.'/auth.php';
