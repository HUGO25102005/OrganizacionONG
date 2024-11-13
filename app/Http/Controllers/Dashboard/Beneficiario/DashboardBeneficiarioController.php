<?php

namespace App\Http\Controllers\Dashboard\Beneficiario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardBeneficiarioController extends Controller
{
    public function home()
    {

        session(['name' => auth()->user()->name, 'rol' => 'Beneficiario', 'id' => auth()->user()->id]);

        return view('Dashboard.Beneficiario.index');
    }
    public function misClases()
    {

        

        $seccion = 2;

        return view('Dashboard.Beneficiario.mis_clases', compact(['seccion']));
    }
    public function nuevaClase()
    {

        
        $seccion = 2;
        return view('Dashboard.Beneficiario.nueva_clase', compact(['seccion']));
    }
}
