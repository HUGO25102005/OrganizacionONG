<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comprobantes\ComprobanteIngreso;
use App\Models\Registros\Donacion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminHome(){ 

        
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);
        return view('Dashboard.Admin.index'); 
    }
    public function adminPanelControl(){ 

        $total_ingresos = ComprobanteIngreso::getTotalDonaciones();
        $ultimas_donaciones = Donacion::all();
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);
        return view('Dashboard.Admin.panel-control', compact('total_ingresos', 'ultimas_donaciones')); 
    }
    public function adminDonaciones(){ return view('Dashboard.Admin.donaciones'); }
    public function adminProgramas(){ return view('Dashboard.Admin.programas'); }
    public function adminUsuarios(){ return view('Dashboard.Admin.usuarios'); }
}
