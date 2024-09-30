<?php

use App\Http\Controllers\Page\ColaboraController;
use App\Http\Controllers\Page\ConocenosController;
use App\Http\Controllers\Page\DonarController;
use App\Http\Controllers\Page\ExperienciasController;
use App\Http\Controllers\Page\TrasparenciaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usuarios\AdminController;
use App\Http\Controllers\Usuarios\CoordinadorController;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Middleware\UserAccessDashboardMiddleware;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('auth.login');
});

// Rutas de perfil existentes de Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas del Dashboard
    Route::middleware([RoleMiddleware::class . ':Administrador'])->prefix('dashboard/admin')->group(function () {
        Route::get('/home', [DashboardController::class, 'adminHome'])->name('admin.home');
        Route::get('/panelControl', [DashboardController::class, 'adminPanelControl'])->name('admin.panelControl');
        Route::get('/donaciones', [DashboardController::class, 'adminDonaciones'])->name('admin.donaciones');
        Route::get('/programas', [DashboardController::class, 'adminProgramas'])->name('admin.programas');
        Route::get('/usuarios', [DashboardController::class, 'adminUsuarios'])->name('admin.usuarios');
    });

    Route::middleware(['role:cordi'])->prefix('dashboard/cordi')->group(function () {
        Route::get('/home', [DashboardController::class, 'cordiHome'])->name('cordi.home');
        Route::get('/profile', [DashboardController::class, 'cordiProfile'])->name('cordi.profile');
        Route::get('/settings', [DashboardController::class, 'cordiSettings'])->name('cordi.settings');
    });

    Route::middleware(['role:voluntario'])->prefix('dashboard/voluntario')->group(function () {
        Route::get('/home', [DashboardController::class, 'voluntarioHome'])->name('voluntario.home');
        Route::get('/profile', [DashboardController::class, 'voluntarioProfile'])->name('voluntario.profile');
        Route::get('/settings', [DashboardController::class, 'voluntarioSettings'])->name('voluntario.settings');
    });
});


Route::group(['prefix' => 'page'], function () {
    
    Route::resources([
        'conocenos' => ConocenosController::class,
        'transparencia' => TrasparenciaController::class,
        'experiencias' => ExperienciasController::class,
        'colabora' => ColaboraController::class,
        'donar' => DonarController::class,
    ]);

    Route::get('/', function () {
        return redirect()->route('conocenos.index');
    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
