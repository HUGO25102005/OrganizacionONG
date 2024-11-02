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
}
