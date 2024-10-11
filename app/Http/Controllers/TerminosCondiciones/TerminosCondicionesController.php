<?php

namespace App\Http\Controllers\TerminosCondiciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TerminosCondicionesController extends Controller
{
    

    public function index(){
        
        return view('TerminosCondiciones.index');
    }
}
