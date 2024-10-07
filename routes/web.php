<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Page\ColaboraController;
use App\Http\Controllers\Page\ConocenosController;
use App\Http\Controllers\Page\DonarController;
use App\Http\Controllers\Page\NuestroTrabajoController;
use App\Http\Controllers\Page\TrasparenciaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminosCondiciones\TerminosCondicionesController;
use App\Http\Controllers\Usuarios\AdminController;
use App\Http\Controllers\Usuarios\CoordinadorController;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Middleware\UserAccessDashboardMiddleware;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Usuarios\UserController;
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
        Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
    });

    Route::middleware([RoleMiddleware::class .':Coordinador'])->prefix('dashboard/cordi')->group(function () {
        Route::get('/home', [DashboardController::class, 'coordiHome'])->name('cordi.home');
        Route::get('/profile', [DashboardController::class, 'cordiProfile'])->name('cordi.profile');
        Route::get('/settings', [DashboardController::class, 'cordiSettings'])->name('cordi.settings');
    });

    Route::middleware([RoleMiddleware::class .':Voluntario'])->prefix('dashboard/voluntario')->group(function () {
        Route::get('/home', [DashboardController::class, 'voluntarioHome'])->name('voluntario.home');
        Route::get('/profile', [DashboardController::class, 'voluntarioProfile'])->name('voluntario.profile');
        Route::get('/settings', [DashboardController::class, 'voluntarioSettings'])->name('voluntario.settings');
    });
});


Route::group(['prefix' => 'page'], function () {
    
    Route::resources([
        'conocenos' => ConocenosController::class,
        'transparencia' => TrasparenciaController::class,
        'nuestro-trabajo' => NuestroTrabajoController::class,
        'colabora' => ColaboraController::class,
        'donar' => DonarController::class,
    ]);

    Route::get('/', function () {
        return redirect()->route('conocenos.index');
    });
});
Route::group(['prefix' => 'terminosCondiciones'], function () {

    Route::get('/',[TerminosCondicionesController::class, 'index'])->name('terminosCondiciones.index');

});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
