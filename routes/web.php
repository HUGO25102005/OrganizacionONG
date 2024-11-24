<?php

use App\Http\Controllers\Dashboard\Administrador\DashboardAdminController;
use App\Http\Controllers\Dashboard\Beneficiario\DashboardBeneficiarioController;
use App\Http\Controllers\Dashboard\Coordinador\DashboardCoordinadorController;
use App\Http\Controllers\Dashboard\Voluntario\DashboardVolunController;
use App\Http\Controllers\Donaciones\CargarCampaniasPageController;
use App\Http\Controllers\Donaciones\ConvocatoriaController;
use App\Http\Controllers\Donaciones\RecaudacionController;
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
use App\Http\Controllers\Usuarios\BeneficiarioController;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Middleware\AuthSessionActive;
use App\Http\Middleware\CheckBeneficiario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalWebhookController;

use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckCoordinador;
use App\Http\Middleware\CheckVoluntario;

Route::get('/', function () {
    return view('auth.login');
})->middleware(AuthSessionActive::class);

//*Rutas de perfil existentes de Breeze


//TODO: RUTAS DE DASHBOARDS
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //* Rutas del Dashboard Administrador
    Route::middleware([CheckAdmin::class])->prefix('dashboard/admin')->group(function () {
        Route::get('/home', [DashboardAdminController::class, 'home'])->name('admin.home');
        Route::get('/panelControl', [DashboardAdminController::class, 'panelControl'])->name('admin.panelControl');
        // DONACIONES --------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/donaciones', [DashboardAdminController::class, 'donaciones'])->name('admin.donaciones');
        Route::post('/donaciones/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store');
        Route::put('/donaciones/convocatorias/editar', [ConvocatoriaController::class, 'update'])->name('convocatoria.update');
        Route::post('/campanias', [CargarCampaniasPageController::class, 'store'])->name('campanias.store');
        Route::delete('/campanias/{id}', [CargarCampaniasPageController::class, 'destroy'])->name('campanias.destroy');
        Route::put('/donaciones/convocatorias/desactivar', [ConvocatoriaController::class, 'desactivar'])->name('convocatoria.desactivar');
        Route::post('/donaciones/convocatorias/recaudacion', [RecaudacionController::class, 'store'])->name('recaudacion.store');

        // Route::get('/programas', [DashboardAdminController::class, 'programas'])->name('admin.programas');


        //  USUARIOS ---------------------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/usuarios', [DashboardAdminController::class, 'usuarios'])->name('admin.usuarios');

        Route::post('/usuarios/adminsList', [AdminController::class, 'store'])->name('admin.store');
        Route::post('/usuarios/coordis', [CoordinadorController::class, 'store'])->name('coordinador.store');

        Route::put('/usuarios/trabajadorDesactivar', [TrabajadorController::class, 'desactivarTrabajador'])->name('admin.desactivar');
        Route::put('/usuarios/trabajadorAceptar', [TrabajadorController::class, 'aceptarSolicitudTrabajador'])->name('admin.aceptarSolicitudTrabajador');

        // RECURSOS --------------------------------------------------------------------------------------------------------------------------------------
        Route::get('/recursos', [DashboardAdminController::class, 'recursos'])->name('admin.recursos');
        Route::get('/recursos/tabla/actualizar/soli', [DashboardAdminController::class, 'actualizarSolicitudes'])->name('tabla.actuSoli');
        Route::put('/recursos/tabla/actualizar/soli/aceptar', [DashboardAdminController::class, 'aceptarRecurso'])->name('tabla.aceptarRecurso');
        Route::put('/recursos/tabla/actualizar/soli/rechazar', [DashboardAdminController::class, 'rechazarRecurso'])->name('tabla.rechazarRecurso');
    
    });

    //* Rutas del Dashboard Coordinador
    Route::middleware([CheckCoordinador::class])->prefix('dashboard/coordinador')->group(function () {
        Route::get('/home', [DashboardCoordinadorController::class, 'home'])->name('coordinador.home');
        Route::get('/panelControl', [DashboardCoordinadorController::class, 'panelControl'])->name('coordinador.panelControl');
        
        Route::get('/beneficiarios', [DashboardCoordinadorController::class, 'beneficiarios'])->name('coordinador.beneficiarios');
        /* Route::post('/donaciones/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store'); */

        Route::get('/programas', [DashboardCoordinadorController::class, 'programas'])->name('coordinador.programas');
        Route::put('/beneficiarios/beneficiarioDesactivar', [BeneficiarioController::class, 'desactivarBeneficiario'])->name('coordinador.desactivar');
        Route::put('/beneficiarios/beneficiarioCancelar', [BeneficiarioController::class, 'cancelarBeneficiario'])->name('coordinador.cancelar');
        Route::put('/benficiarios/beneificiarioAceptar', [BeneficiarioController::class, 'aceptarSolicitudBeneficiario'])->name('coordinador.aceptarSolicitudBeneficiario');
        Route::put('/benficiarios/beneificiarioAceptar2', [BeneficiarioController::class, 'aceptarSolicitudBeneficiario2'])->name('coordinador.aceptarSolicitudBeneficiario2');
    });

    //* Rutas del Dashboard Voluntario
    Route::middleware([CheckVoluntario::class])->prefix('dashboard/voluntario')->group(function () {
        Route::get('/home', [DashboardVolunController::class, 'home'])->name('vol.home');
        Route::get('/mis-clases', [DashboardVolunController::class, 'misClases'])->name('vol.misClases');
        Route::get('/nueva-clase', [DashboardVolunController::class, 'nuevaClase'])->name('vol.nuevaClase');
        Route::post('/nueva-clase/solicitud/informacion', [DashboardVolunController::class, 'storeProgramaEducativo'])->name('vol.storeProgramaEducativo');
        Route::post('/nueva-clase/solicitud/actividades', [DashboardVolunController::class, 'storeActividades'])->name('vol.storeActividades');
        Route::post('/nueva-clase/solicitud/actividades/cargar  ', [DashboardVolunController::class, 'cargarActividadesEnTabla'])->name('vol.cargarActividadesEnTabla');
    });

    //* Rutas del Dashboard Beneficiario
    Route::middleware([CheckBeneficiario::class])->prefix('dashboard/beneficiario')->group(function () {
        Route::get('/home', [DashboardBeneficiarioController::class, 'home'])->name('ben.home');
        Route::get('/mis-clases', [DashboardBeneficiarioController::class, 'misClases'])->name('ben.misClases');
    });


});

//TODO: RUTAS DE LINING PAGE
Route::group(['prefix' => 'page'], function () {

    Route::resources([

        'transparencia' => TrasparenciaController::class,
        'nuestro-trabajo' => NuestroTrabajoController::class,
        'donar' => DonarController::class,
    ]);

    Route::prefix('conocenos')->group(function () {
        Route::get('/', [ConocenosController::class, 'index'])->name('conocenos.index');
    });

    Route::prefix('colabora')->group(function () {
        Route::get('/', [ColaboraController::class, 'index'])->name('colabora.index');
        Route::post('/solicitudes/voluntario', [ColaboraController::class, 'storeVoluntario'])->name('vol.store');
        Route::post('/solicitudes/beneficiarios', [ColaboraController::class, 'storeBeneficiario'])->name('ben.store');
        Route::post('/solicitudes/coordinador', [ColaboraController::class, 'storeCoordinador'])->name('coord.store');
    });


    Route::get('/', function () {
        return redirect()->route('conocenos.index');
    });
});

Route::group(['prefix' => 'terminosCondiciones'], function () {

    Route::get('/', [TerminosCondicionesController::class, 'index'])->name('terminosCondiciones.index');
});
Route::group(['prefix' => 'pdf'], function () {
    Route::get('/generar', [PDFController::class, 'generarPDF'])->name('pdf.generar');
});


Route::group(['prefix' => 'paypal'], function () {
    Route::post('/webhook', [PaypalWebhookController::class, 'handleWebhook'])->name('paypal.webhook');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
