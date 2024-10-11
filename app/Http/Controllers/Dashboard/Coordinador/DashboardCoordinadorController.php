<?php

namespace App\Http\Controllers\Dashboard\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCoordinadorController extends Controller
{
    public function home()
    {
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);
        return view('Dashboard.Coordinador.index');
    }
    
}
