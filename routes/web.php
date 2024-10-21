<?php

use App\Http\Controllers\Dashboard\Administrador\DashboardAdminController;
use App\Http\Controllers\Donaciones\ConvocatoriaController;
use App\Http\Controllers\Page\ColaboraController;
use App\Http\Controllers\Page\ConocenosController;
use App\Http\Controllers\Page\DonarController;
use App\Http\Controllers\Page\NuestroTrabajoController;
use App\Http\Controllers\Page\TrasparenciaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerminosCondiciones\TerminosCondicionesController;
use App\Http\Controllers\Usuarios\AdminController;
use App\Http\Controllers\Usuarios\CoordinadorController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\CheckAdmin;
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
    Route::middleware([CheckAdmin::class])->prefix('dashboard/admin')->group(function () {
        Route::get('/home', [DashboardAdminController::class, 'home'])->name('admin.home');
        Route::get('/panelControl', [DashboardAdminController::class, 'panelControl'])->name('admin.panelControl');
        
        Route::get('/donaciones', [DashboardAdminController::class, 'donaciones'])->name('admin.donaciones');
        Route::post('/donaciones/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store');

        Route::get('/programas', [DashboardAdminController::class, 'programas'])->name('admin.programas');

        Route::get('/usuarios', [DashboardAdminController::class, 'usuarios'])->name('admin.usuarios');
        Route::post('/usuarios/admins', [AdminController::class, 'store'])->name('admin.store');
        Route::post('/usuarios/coordis', [CoordinadorController::class, 'store'])->name('coordinador.store');
        // Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
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
Route::group(['prefix' => 'pdf'], function () {
    Route::get('/generar-P', [PDFController::class, 'generarPDF_P'])->name('pdf.generar_P');
    Route::get('/generar-A', [PDFController::class, 'generarPDF_A'])->name('pdf.generar_A');
    Route::get('/generar-C', [PDFController::class, 'generarPDF_C'])->name('pdf.generar_C');
    Route::get('/generar-V', [PDFController::class, 'generarPDF_V'])->name('pdf.generar_V');
    Route::get('/generar-B', [PDFController::class, 'generarPDF_B'])->name('pdf.generar_B');
    Route::get('/generar-All', [PDFController::class, 'generarPDF_All'])->name('pdf.generar_All');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
