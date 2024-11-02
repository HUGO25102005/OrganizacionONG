<?php

namespace App\Http\Controllers\Dashboard\Voluntario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardVolunController extends Controller
{
    public function home()
    {

        session(['name' => auth()->user()->name, 'rol' => 'Voluntario', 'id' => auth()->user()->id]);

        return view('Dashboard.Voluntario.index');
    }
    public function misClases()
    {

        

        $seccion = 1;

        return view('Dashboard.Voluntario.mis_clases', compact(['seccion']));
    }
    public function nuevaClase()
    {

        
        $seccion = 1;
        return view('Dashboard.Voluntario.nueva_clase', compact(['seccion']));
    }
}
