<?php

use App\Http\Controllers\Dashboard\Administrador\AdminPanelControlController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', UserAccessDashboardMiddleware::class]], function () {
    // RUTAS DE ADMINISTRADORES, COORDINADORES, VOLUNTARIOS
    Route::resources([
        'coordinador' => CoordinadorController::class,
        'voluntario' => VoluntarioController::class,
    ]);

    // Grupo de rutas para 'admin'
    Route::group(['prefix' => 'admin'], function () {

        // Ruta para el panel de control del administrador
        Route::resource('panel', AdminPanelControlController::class);

        // Otras rutas relacionadas con el administrador
        Route::resources([
            'home' => AdminController::class,
        ]);
    });

    Route::get('/', function () {
        // Sacamos el respectivo rol
        $rol = Auth::user()->getRole();

        switch ($rol) {
            case 'Administrador':
                return redirect()->route('home.index');
                break;
            case 'Coordinador':
                return redirect()->route('coordinador.index');
                break;
            case 'Voluntario':
                return redirect()->route('voluntario.index');
                break;
            default:
                return redirect()->route('dashboard');
                break;
        }
    })->middleware(['auth'])->name('dashboard');
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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */