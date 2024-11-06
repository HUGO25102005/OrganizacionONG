<?php

namespace App\Http\Controllers\Dashboard\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCoordinadorController extends Controller
{
    public function home()
    {
        session(['name' => auth()->user()->name, 'rol' => 'Coordinador', 'id' => auth()->user()->id]);
        return view('Dashboard.Coordinador.index');
    }

    public function panelControl()
    {
        session(['name' => auth()->user()->name,]);
        return view('Dashboard.Coordinador.panel-control');
    }

    public function beneficiarios()
    {
        return view('Dashboard.Coordinador.beneficiarios');
    }

    public function programas()
    {
        return view('Dashboard.Coordinador.programas');
    }
    
}
