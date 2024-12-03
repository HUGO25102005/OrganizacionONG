<?php

use App\Http\Controllers\Dashboard\Administrador\DashboardAdminController;
use App\Http\Controllers\Dashboard\Beneficiario\DashboardBeneficiarioController;
use App\Http\Controllers\Dashboard\Coordinador\DashboardCoordinadorController;
use App\Http\Controllers\Dashboard\Voluntario\DashboardVolunController;
use App\Http\Controllers\Donaciones\CargarCampaniasPageController;
use App\Http\Controllers\Donaciones\ConvocatoriaController;
use App\Http\Controllers\Donaciones\RecaudacionController;
use App\Http\Controllers\MailController;
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
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Middleware\AuthSessionActive;
use App\Http\Middleware\CheckBeneficiario;
use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\PaypalWebhookController; */
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use Illuminate\Support\Facades\Auth;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckCoordinador;
use App\Http\Middleware\CheckVoluntario;

Route::get('/login', function () {
    return view('auth.login');
})->middleware(AuthSessionActive::class)->name('login');

//*Rutas de perfil existentes de Breeze


Route::get('/enviar-correo', [MailController::class, 'enviarCorreo']);

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


        // Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');

        // Rutas del chat
        Route::get('/chat', [MessagesController::class, 'index'])->name('admin.chat');
        Route::post('/chat/idInfo', [MessagesController::class, 'idFetchData'])->name('admin.chat.idFetchData');
        Route::post('/chat/sendMessage', [MessagesController::class, 'send'])->name('admin.chat.sendMessage');
        Route::post('/chat/fetchMessages', [MessagesController::class, 'fetch'])->name('admin.chat.fetchMessages');
        Route::get('/chat/download/{fileName}', [MessagesController::class, 'download'])->name('admin.chat.download');
        Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('admin.chat.pusherAuth');
        Route::post('/chat/makeSeen', [MessagesController::class, 'seen'])->name('admin.chat.makeSeen');
        Route::get('/chat/getContacts', [MessagesController::class, 'getContacts'])->name('admin.chat.getContacts');
        Route::post('/chat/updateContacts', [MessagesController::class, 'updateContactItem'])->name('admin.chat.updateContacts');
        Route::post('/chat/star', [MessagesController::class, 'favorite'])->name('admin.chat.star');
        Route::post('/chat/favorites', [MessagesController::class, 'getFavorites'])->name('admin.chat.favorites');
        Route::get('/chat/search', [MessagesController::class, 'search'])->name('admin.chat.search');
        Route::post('/chat/shared', [MessagesController::class, 'sharedPhotos'])->name('admin.chat.shared');
        Route::post('/chat/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('admin.chat.deleteConversation');
        Route::post('/chat/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('admin.chat.deleteMessage');
        Route::post('/chat/updateSettings', [MessagesController::class, 'updateSettings'])->name('admin.chat.updateSettings');
        Route::post('/chat/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('admin.chat.setActiveStatus');
        Route::get('/chat/group/{id}', [MessagesController::class, 'index'])->name('admin.chat.group');
        Route::get('/chat/{id}', [MessagesController::class, 'index'])->name('admin.chat.user');
    
    
    });

    //* Rutas del Dashboard Coordinador
    Route::middleware([CheckCoordinador::class])->prefix('dashboard/coordinador')->group(function () {
        Route::get('/home', [DashboardCoordinadorController::class, 'home'])->name('coordinador.home');
        Route::get('/panelControl', [DashboardCoordinadorController::class, 'panelControl'])->name('coordinador.panelControl');
        
        Route::get('/beneficiarios', [DashboardCoordinadorController::class, 'beneficiarios'])->name('coordinador.beneficiarios');
        Route::get('/beneficiarios/searchb', [DashboardCoordinadorController::class, 'searchb'])->name('coordinador.beneficiarios.searchb');
        Route::get('/beneficiarios/searchbs', [DashboardCoordinadorController::class, 'searchbs'])->name('coordinador.beneficiarios.searchbs');
        Route::put('/beneficiarios/beneficiarioDesactivar', [BeneficiarioController::class, 'desactivarBeneficiario'])->name('coordinador.desactivar');
        Route::put('/beneficiarios/beneficiarioCancelar', [BeneficiarioController::class, 'cancelarBeneficiario'])->name('coordinador.cancelar');
        Route::put('/benficiarios/beneficiarioAceptar', [BeneficiarioController::class, 'aceptarSolicitudBeneficiario'])->name('coordinador.aceptarSolicitudBeneficiario');
        Route::put('/benficiarios/beneficiarioActivar', [BeneficiarioController::class, 'aceptarSolicitudBeneficiario2'])->name('coordinador.aceptarSolicitudBeneficiario2');
        /* Route::post('/donaciones/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store'); */

        Route::get('/programas', [DashboardCoordinadorController::class, 'programas'])->name('coordinador.programas');
        Route::get('/programas/searchp', [DashboardCoordinadorController::class, 'searchp'])->name('coordinador.programas.searchp');
        Route::get('/programas/searchps', [DashboardCoordinadorController::class, 'searchps'])->name('coordinador.programas.searchps');
        Route::put('/programas/programaDesactivar', [ProgramaController::class, 'desactivarPrograma'])->name('coordinador.desactivarPrograma');
        Route::put('/programas/programaCancelar', [ProgramaController::class, 'cancelarPrograma'])->name('coordinador.cancelarPrograma');
        Route::put('/programas/programaActivar', [ProgramaController::class, 'activarPrograma'])->name('coordinador.activarPrograma');
        Route::put('/programas/programaAceptar', [ProgramaController::class, 'aceptarPrograma'])->name('coordinador.aceptarPrograma');
        Route::get('/programas/planeacion/{id}', [ProgramaController::class, 'show'])->name('coordinador.planeacion');

        // Rutas del chat
        Route::get('/chat', [MessagesController::class, 'index'])->name('coordinador.chat');
        Route::post('/chat/idInfo', [MessagesController::class, 'idFetchData'])->name('coordinador.chat.idFetchData');
        Route::post('/chat/sendMessage', [MessagesController::class, 'send'])->name('coordinador.chat.sendMessage');
        Route::post('/chat/fetchMessages', [MessagesController::class, 'fetch'])->name('coordinador.chat.fetchMessages');
        Route::get('/chat/download/{fileName}', [MessagesController::class, 'download'])->name('coordinador.chat.download');
        Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('coordinador.chat.pusherAuth');
        Route::post('/chat/makeSeen', [MessagesController::class, 'seen'])->name('coordinador.chat.makeSeen');
        Route::get('/chat/getContacts', [MessagesController::class, 'getContacts'])->name('coordinador.chat.getContacts');
        Route::post('/chat/updateContacts', [MessagesController::class, 'updateContactItem'])->name('coordinador.chat.updateContacts');
        Route::post('/chat/star', [MessagesController::class, 'favorite'])->name('coordinador.chat.star');
        Route::post('/chat/favorites', [MessagesController::class, 'getFavorites'])->name('coordinador.chat.favorites');
        Route::get('/chat/search', [MessagesController::class, 'search'])->name('coordinador.chat.search');
        Route::post('/chat/shared', [MessagesController::class, 'sharedPhotos'])->name('coordinador.chat.shared');
        Route::post('/chat/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('coordinador.chat.deleteConversation');
        Route::post('/chat/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('coordinador.chat.deleteMessage');
        Route::post('/chat/updateSettings', [MessagesController::class, 'updateSettings'])->name('coordinador.chat.updateSettings');
        Route::post('/chat/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('coordinador.chat.setActiveStatus');
        Route::get('/chat/group/{id}', [MessagesController::class, 'index'])->name('coordinador.chat.group');
        Route::get('/chat/{id}', [MessagesController::class, 'index'])->name('coordinador.chat.user');
    });

    //* Rutas del Dashboard Voluntario
    Route::middleware([CheckVoluntario::class])->prefix('dashboard/voluntario')->group(function () {
        Route::get('/home', [DashboardVolunController::class, 'home'])->name('vol.home');
        Route::get('/mis-clases', [DashboardVolunController::class, 'misClases'])->name('vol.misClases');
        Route::post('/mis-clases/detalles-clase', [DashboardVolunController::class, 'getInformacionClase'])->name('vol.detallesClaseV');
        Route::post('/mis-clases/detalles-clase/terminar', [DashboardVolunController::class, 'terminarClase'])->name('vol.terminarClase');
        Route::post('/mis-clases/detalles-clase/terminada', [DashboardVolunController::class, 'getInformacionClaseTerminada'])->name('vol.terminadaClase');
        Route::get('/nueva-clase', [DashboardVolunController::class, 'nuevaClase'])->name('vol.nuevaClase');
        Route::post('/nueva-clase/solicitud/informacion', [DashboardVolunController::class, 'storeProgramaEducativo'])->name('vol.storeProgramaEducativo');
        Route::post('/nueva-clase/solicitud/actividades', [DashboardVolunController::class, 'storeActividades'])->name('vol.storeActividades');
        Route::post('/nueva-clase/solicitud/actividades/cargar  ', [DashboardVolunController::class, 'cargarActividadesEnTabla'])->name('vol.cargarActividadesEnTabla');
        // Rutas del chat
        Route::get('/chat', [MessagesController::class, 'index'])->name('vol.chat');
        Route::post('/chat/idInfo', [MessagesController::class, 'idFetchData'])->name('vol.chat.idFetchData');
        Route::post('/chat/sendMessage', [MessagesController::class, 'send'])->name('vol.chat.sendMessage');
        Route::post('/chat/fetchMessages', [MessagesController::class, 'fetch'])->name('vol.chat.fetchMessages');
        Route::get('/chat/download/{fileName}', [MessagesController::class, 'download'])->name('vol.chat.download');
        Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('vol.chat.pusherAuth');
        Route::post('/chat/makeSeen', [MessagesController::class, 'seen'])->name('vol.chat.makeSeen');
        Route::get('/chat/getContacts', [MessagesController::class, 'getContacts'])->name('vol.chat.getContacts');
        Route::post('/chat/updateContacts', [MessagesController::class, 'updateContactItem'])->name('vol.chat.updateContacts');
        Route::post('/chat/star', [MessagesController::class, 'favorite'])->name('vol.chat.star');
        Route::post('/chat/favorites', [MessagesController::class, 'getFavorites'])->name('vol.chat.favorites');
        Route::get('/chat/search', [MessagesController::class, 'search'])->name('vol.chat.search');
        Route::post('/chat/shared', [MessagesController::class, 'sharedPhotos'])->name('vol.chat.shared');
        Route::post('/chat/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('vol.chat.deleteConversation');
        Route::post('/chat/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('vol.chat.deleteMessage');
        Route::post('/chat/updateSettings', [MessagesController::class, 'updateSettings'])->name('vol.chat.updateSettings');
        Route::post('/chat/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('vol.chat.setActiveStatus');
        Route::get('/chat/group/{id}', [MessagesController::class, 'index'])->name('vol.chat.group');
        Route::get('/chat/{id}', [MessagesController::class, 'index'])->name('vol.chat.user');
        
    });

    //* Rutas del Dashboard Beneficiario
    Route::middleware([CheckBeneficiario::class])->prefix('dashboard/beneficiario')->group(function () {
        Route::get('/home', [DashboardBeneficiarioController::class, 'home'])->name('ben.home');
        Route::get('/mis-clases', [DashboardBeneficiarioController::class, 'misClases'])->name('ben.misClases');
        Route::post('/mis-clases/oferta/detalles', [DashboardBeneficiarioController::class, 'getDetallesClase'])->name('ben.detallesClase');
        Route::post('/mis-clases/inscrito/detalles', [DashboardBeneficiarioController::class, 'getDetallesClase'])->name('ben.detallesClaseInscrito');
        Route::post('/mis-clases/oferta/inscripcion', [DashboardBeneficiarioController::class, 'inscribirmeClase'])->name('ben.inscribirmeClase');
        Route::get('/nueva-clase', [DashboardBeneficiarioController::class, 'nuevaClase'])->name('ben.nuevaClase');

        // Rutas del chat
        Route::get('/chat', [MessagesController::class, 'index'])->name('ben.chat');
        Route::post('/chat/idInfo', [MessagesController::class, 'idFetchData'])->name('ben.chat.idFetchData');
        Route::post('/chat/sendMessage', [MessagesController::class, 'send'])->name('ben.chat.sendMessage');
        Route::post('/chat/fetchMessages', [MessagesController::class, 'fetch'])->name('ben.chat.fetchMessages');
        Route::get('/chat/download/{fileName}', [MessagesController::class, 'download'])->name('ben.chat.download');
        Route::post('/chat/auth', [MessagesController::class, 'pusherAuth'])->name('ben.chat.pusherAuth');
        Route::post('/chat/makeSeen', [MessagesController::class, 'seen'])->name('ben.chat.makeSeen');
        Route::get('/chat/getContacts', [MessagesController::class, 'getContacts'])->name('ben.chat.getContacts');
        Route::post('/chat/updateContacts', [MessagesController::class, 'updateContactItem'])->name('ben.chat.updateContacts');
        Route::post('/chat/star', [MessagesController::class, 'favorite'])->name('ben.chat.star');
        Route::post('/chat/favorites', [MessagesController::class, 'getFavorites'])->name('ben.chat.favorites');
        Route::get('/chat/search', [MessagesController::class, 'search'])->name('ben.chat.search');
        Route::post('/chat/shared', [MessagesController::class, 'sharedPhotos'])->name('ben.chat.shared');
        Route::post('/chat/deleteConversation', [MessagesController::class, 'deleteConversation'])->name('ben.chat.deleteConversation');
        Route::post('/chat/deleteMessage', [MessagesController::class, 'deleteMessage'])->name('ben.chat.deleteMessage');
        Route::post('/chat/updateSettings', [MessagesController::class, 'updateSettings'])->name('ben.chat.updateSettings');
        Route::post('/chat/setActiveStatus', [MessagesController::class, 'setActiveStatus'])->name('ben.chat.setActiveStatus');
        Route::get('/chat/group/{id}', [MessagesController::class, 'index'])->name('ben.chat.group');
        Route::get('/chat/{id}', [MessagesController::class, 'index'])->name('ben.chat.user');
    });


});


//TODO: RUTAS DE LINING PAGE
Route::group(['prefix' => 'page'], function () {

    Route::resources([

        'transparencia' => TrasparenciaController::class,
        'nuestro-trabajo' => NuestroTrabajoController::class,
        'donar' => DonarController::class,
    ]);

    /* Route::prefix('conocenos')->group(function () {
        Route::get('/', [ConocenosController::class, 'index'])->name('conocenos.index');
    }); */

    Route::prefix('colabora')->group(function () {
        Route::get('/', [ColaboraController::class, 'index'])->name('colabora.index');
        Route::post('/solicitudes/voluntario', [ColaboraController::class, 'storeVoluntario'])->name('vol.store');
        Route::post('/solicitudes/beneficiarios', [ColaboraController::class, 'storeBeneficiario'])->name('ben.store');
        Route::post('/solicitudes/coordinador', [ColaboraController::class, 'storeCoordinador'])->name('coord.store');
    });

    /* Route::get('/', function () {
        return redirect()->route('conocenos.index');
    }); */
});

Route::group(['prefix' => '/'], function () {
    
    Route::prefix('conocenos')->group(function () {
        Route::get('/', [ConocenosController::class, 'index'])->name('conocenos.index');
    });

    Route::get('/', function () {
        return redirect()->route('conocenos.index');
    });

});


Route::group(['prefix' => 'terminosCondiciones'], function () {
    Route::get('/', function(){
        return view('TerminosCondiciones.index');
    })->name('terminosCondiciones.index');
});

Route::group(['prefix' => 'pdf'], function () {
    Route::get('/generar', [PDFController::class, 'generarPDF'])->name('pdf.generar');
});

Route::group(['prefix' => 'paypal'], function () {
    Route::post('/procesar-donacion', [DonacionController::class, 'procesarDonacion'])->name('paypal.procesarDonacion');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
