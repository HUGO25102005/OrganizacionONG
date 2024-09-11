<?php

// importaciones trabajadores 
use App\Http\Controllers\Auth\AuthLoginTrabajadorController;
use App\Http\Controllers\LoginTrabajadorController;

// importaciones usuarios
use App\Http\Controllers\LoginUsuarioController;


use Illuminate\Support\Facades\Route;


// Index (Login), primer vista de usuario-trabajador 
Route::get('/', function () {
    return view('Login.app_login_trab_usuario');
});

// Redireccionamiento de logins, dependiendo el tipo de usuario, sera su login
Route::get('/loginTrabajador', [LoginTrabajadorController::class, 'index'])->name('loginTrabajador');
Route::post('/loginTrabajador', [LoginTrabajadorController::class, 'authenticate'])->name('loginTrabajador.authenticate');

Route::get('/loginUsuario', [LoginUsuarioController::class, 'index'])->name('loginUsuario');

// Formularios de login


    //trabajador
    
    