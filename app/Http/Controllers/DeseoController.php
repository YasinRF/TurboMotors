<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Deseo;
use Illuminate\Http\Request;

class DeseoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deseos = Deseo::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(4);
        return view('deseos.index', compact('deseos'));
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
        $usuario = auth()->user();

        // Verificar si el deseo ya existe
        if (!$usuario->deseos()->where('coche_id', $request->coche_id)->exists()) {
            // Crear un nuevo deseo
            $usuario->deseos()->create([
                'coche_id' => $request->coche_id,
            ]);
        }

        return redirect()->back()->with('message', 'Coche marcado como deseado.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Deseo $deseo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deseo $deseo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deseo $deseo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deseo $deseo)
    {
        if ($deseo->user_id == Auth::id()) {
            $deseo->delete();
        }

        return redirect()->route('deseos.index')->with('mensaje', 'Eliminado de tu lista de deseos');
    }
}
