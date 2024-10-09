<?php

namespace App\Http\Controllers\Dashboard\Voluntario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardVoluntarioController extends Controller
{
    public function home()
    {
        session(['name' => auth()->user()->name, 'rol' => auth()->user()->Rol]);
        return view('Dashboard.Voluntario.index');
    }
}
