<?php

// importaciones trabajadores 
use App\Http\Controllers\Login\LoginTrabController;
// importaciones usuarios
use App\Http\Controllers\Login\loginBeneController;



use App\Http\Controllers\Usuarios\AdminController;
use Illuminate\Support\Facades\Route;


// Index (Login), primer vista de usuario-trabajador 
Route::get('/', function () {
    return view('Login.app_login_trab_usuario');
});


// router de login
Route::resource('/loginBeneficiario', loginBeneController::class);
Route::resource('/loginTrabajador', LoginTrabController::class);


Route::resource('/admin', AdminController::class);
    
    