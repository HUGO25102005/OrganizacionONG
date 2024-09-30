<?php

namespace App\Http\Controllers\Dashboard\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminHome(){ return view('Dashboard.Admin.index'); }
}
