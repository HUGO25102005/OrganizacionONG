<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginUsuarioController extends Controller
{
    //

    function index(){
        return view('Login.app_login_usuario');
    }
}
