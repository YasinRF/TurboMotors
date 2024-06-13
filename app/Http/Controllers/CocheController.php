<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        $coche = Coche::findOrFail($id);
        $user = Auth::user();

        // Verificar si el coche está en la lista de deseos del usuario actual
        $isDesired = $user ? $user->deseos()->where('coche_id', $id)->exists() : false;

        return view('coches.show', compact('coche', 'isDesired'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coche $coche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coche $coche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coche $coche)
    {
        //
    }
}
