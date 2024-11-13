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
    public function misClases(Request $request)
    {

        // dd($request);

        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }

        // dd($seccion);

        return view('Dashboard.Voluntario.mis_clases', compact(['seccion']));
    }
    public function nuevaClase(Request $request)
    {
        if (empty($request->seccion)) {
            $seccion = $request->get('seccion', 1);
        } else {
            $seccion = $request->seccion;
        }
        
        return view('Dashboard.Voluntario.nueva_clase', compact(['seccion']));
    }
}
