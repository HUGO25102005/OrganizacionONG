<?php

use App\Http\Controllers\Dashboard\Administrador\DashboardAdminController;
use App\Http\Controllers\Dashboard\Voluntario\DashboardVolunController;
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
use App\Http\Controllers\Usuarios\TrabajadorController;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Middleware\AuthSessionActive;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckVoluntario;

Route::get('/', function () {
    return view('auth.login');
})->middleware(AuthSessionActive::class);

// Rutas de perfil existentes de Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    // Rutas del Dashboard
    Route::middleware([CheckAdmin::class])->prefix('dashboard/admin')->group(function () {
        Route::get('/home', [DashboardAdminController::class, 'home'])->name('admin.home');
        Route::get('/panelControl', [DashboardAdminController::class, 'panelControl'])->name('admin.panelControl');
        // DONACIONES --------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/donaciones', [DashboardAdminController::class, 'donaciones'])->name('admin.donaciones');
        Route::post('/donaciones/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store');

        Route::get('/recursos', [DashboardAdminController::class, 'recursos'])->name('admin.recursos');
        // Route::get('/programas', [DashboardAdminController::class, 'programas'])->name('admin.programas');

        
        //  USUARIOS ---------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/usuarios', [DashboardAdminController::class, 'usuarios'])->name('admin.usuarios');

        Route::post('/usuarios/adminsList', [AdminController::class, 'store'])->name('admin.store');
        Route::post('/usuarios/coordis', [CoordinadorController::class, 'store'])->name('coordinador.store');

        Route::put('/usuarios/trabajadorDesactivar', [TrabajadorController::class, 'desactivarTrabajador'])->name('admin.desactivar');
        Route::put('/usuarios/trabajadorAceptar', [TrabajadorController::class, 'aceptarSolicitudTrabajador'])->name('admin.aceptarSolicitudTrabajador');
        

        // Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
    });

    Route::middleware([CheckVoluntario::class])->prefix('dashboard/voluntario')->group(function () {
        Route::get('/home', [DashboardVolunController::class, 'home'])->name('vol.home');
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

    Route::post('/solicitudes/voluntario', [ColaboraController::class, 'storeVoluntario'])->name('vol.store');

    Route::get('/', function () {
        return redirect()->route('conocenos.index');
    });
});

Route::group(['prefix' => 'terminosCondiciones'], function () {

    Route::get('/',[TerminosCondicionesController::class, 'index'])->name('terminosCondiciones.index');

});
Route::group(['prefix' => 'pdf'], function () {
    Route::get('/generar', [PDFController::class, 'generarPDF'])->name('pdf.generar');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
