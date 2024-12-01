<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donaciones\Donacion;


class ConocenosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suma_monto = Donacion::getMontoTotal();
        $cantidad_donaciones = Donacion::getDonacionesTotal();
        $linkActive = 1;
        return view('Page.conocenos', compact('linkActive', 'suma_monto', 'cantidad_donaciones'));
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
