<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Coche;
use App\Models\Vendido;
use App\Models\Deseo;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::count();
        $coches = Coche::count();
        $vendidos = Vendido::count();
        $deseos = Deseo::count();

        return view('dashboard', compact('usuarios', 'coches', 'vendidos', 'deseos'));
    }
}
