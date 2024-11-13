<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Usuarios\BeneficiarioController;
use App\Http\Controllers\Usuarios\CoordinadorController;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Requests\Usuarios\CoordinadorRequest;
use App\Http\Requests\Usuarios\StoreBeneficiarioRequest;
use App\Http\Requests\Usuarios\StoreVoluntarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ColaboraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $linkActive = 4;
        return view('Page.colabora', compact('linkActive'));
    }
    public function storeVoluntario(StoreVoluntarioRequest $request)
    {

        $volController = new VoluntarioController();
        $volController->store($request);

        return redirect()->route('colabora.index')->with('success', 'El registro se ha creado correctamente.');
    }
    public function storeBeneficiario(StoreBeneficiarioRequest $request)
    {

        $benController = new BeneficiarioController();
        $benController->store($request);

        // dd($benController);
        return redirect()->route('colabora.index')->with('success', 'El registro se ha creado correctamente.');
    }
    public function storeCoordinador(CoordinadorRequest $request)
    {
        
        
        // dd($request);
        $coordinadorController = new CoordinadorController();
        $coordinadorController->store($request);

        // dd($benController);
        return redirect()->route('colabora.index')->with('success', 'El registro se ha creado correctamente.');
    }

}
