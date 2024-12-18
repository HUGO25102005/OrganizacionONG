<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\ProgramasEducativos\ProgramaEducativo;
use Illuminate\Http\Request;

class DonarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programas = ProgramaEducativo::getProgramasActivos()->get();
        $linkActive = 5;
        return view('Page.donar', compact('linkActive', 'programas'));
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
