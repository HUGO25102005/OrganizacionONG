<?php

use App\Http\Controllers\Dashboard\Administrador\DashboardAdminController;
use App\Http\Controllers\Dashboard\Coordinador\DashboardCoordinadorController;
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
use App\Http\Controllers\PaypalWebhookController;

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckCoordinador;

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
        
        Route::post('/usuarios/adminsList', [AdminController::class, 'store'])->name('admin.store');
        Route::put('/usuarios/admin', [AdminController::class, 'desactivar'])->name('admin.desactivar');


        Route::post('/usuarios/coordis', [CoordinadorController::class, 'store'])->name('coordinador.store');
        // Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
    
    
    });

    Route::middleware([CheckCoordinador::class])->prefix('dashboard/coordinador')->group(function () {
        Route::get('/home', [DashboardCoordinadorController::class, 'home'])->name('coordinador.home');
        Route::get('/panelControl', [DashboardCoordinadorController::class, 'panelControl'])->name('coordinador.panelControl');
        
        Route::get('/beneficiarios', [DashboardCoordinadorController::class, 'beneficiarios'])->name('coordinador.beneficiarios');
        /* Route::post('/donaciones/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store'); */

        Route::get('/programas', [DashboardCoordinadorController::class, 'programas'])->name('coordinador.programas');

        /* Route::get('/usuarios', [DashboardAdminController::class, 'usuarios'])->name('admin.usuarios');
        
        Route::post('/usuarios/adminsList', [AdminController::class, 'store'])->name('admin.store');
        Route::put('/usuarios/admin', [AdminController::class, 'desactivar'])->name('admin.desactivar');


        Route::post('/usuarios/coordis', [CoordinadorController::class, 'store'])->name('coordinador.store'); */
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
    Route::get('/generar', [PDFController::class, 'generarPDF'])->name('pdf.generar');
});


Route::group(['prefix' => 'paypal'], function () {
    Route::post('/webhook', [PaypalWebhookController::class, 'handleWebhook'])->name('paypal.webhook');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
