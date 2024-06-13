<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use App\Models\Vendido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendidos = Vendido::with('coche')->where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(4);
        return view('vendidos.index', compact('vendidos'));
    }

    public function factura(Coche $coche)
    {
        $vendidos = Vendido::where('coche_id', $coche->id)->get();

        // Genera el PDF con la vista y los datos proporcionados
        $factura = Pdf::loadView('vendidos.factura', compact('vendidos', 'coche'));

        // Solo abre el PDF
        // return $factura->stream();

        //Descarga el PDF
        return $factura->download('vendidos.factura.pdf');
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
        // $usuario = auth()->user();

        // // Verificar si el deseo ya existe
        // if (!$usuario->vendidos()->where('coche_id', $request->coche_id)->exists()) {
        //     // Crear un nuevo deseo
        //     $usuario->vendidos()->create([
        //         'coche_id' => $request->coche_id,
        //     ]);
        // }

        // return redirect()->back()->with('mensaje', 'Se ha solicitado la compra de coche con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendido $vendido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendido $vendido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendido $vendido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendido $vendido)
    {
        //
    }
}
