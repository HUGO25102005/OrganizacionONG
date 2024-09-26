<?php

use App\Http\Controllers\Page\PageController;
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
    Route::resources([
        'admin' => AdminController::class,
        'coordinador' => CoordinadorController::class,
        'voluntario' => VoluntarioController::class,
    ]);
    Route::get('/', function () {
        
        // Sacamos el respectivo rol
        $rol = Auth::user()->getRole();

        switch($rol){
            case 'Administrador':
                return redirect()->route('admin.index');
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
    // El recurso ya manejará las rutas index, create, store, etc.
    Route::resource('/', PageController::class)->names([
        'index' => 'page.index', // Nombra la ruta index
    ]);
});

require __DIR__.'/auth.php';

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */