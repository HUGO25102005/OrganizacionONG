<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Usuarios\VoluntarioController;
use App\Http\Controllers\Usuarios\CoordinadorController;
use App\Http\Controllers\Usuarios\BeneficiarioController;
use App\Http\Requests\Usuarios\StoreVoluntarioRequest;
use App\Http\Requests\Usuarios\StoreBeneficiarioRequest;
use App\Http\Requests\Usuarios\StoreCoordinadorRequest;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
    public function storeVoluntario(StoreVoluntarioRequest $request)
    {

        $volController = new VoluntarioController();
        $volController->store($request);

        return redirect()->route('colabora.index')->with('success', 'El registro se ha creado correctamente.');
    }
    
    public function storeBeneficiario(StoreBeneficiarioRequest $request)
    { 
        $beneficiarioController = new BeneficiarioController();
        $beneficiarioController->store($request);

        return redirect()->route('colabora.index')->with('success', 'El registro se ha creado correctamente.');
    }

    public function storeCoordinador(StoreCoordinadorRequest $request)
    {

        $coordinadorController = new CoordinadorController();
        $coordinadorController->store1($request);

        return redirect()->route('colabora.index')->with('success', 'El registro se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
