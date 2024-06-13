<?php

use App\Models\Coche;
use Illuminate\Support\Facades\Route;

use App\Livewire\ShowCoches;
use App\Livewire\CompraCoches;
use App\Http\Controllers\DeseoController;
use App\Http\Controllers\CocheController;
use App\Http\Controllers\VendidoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $listaCoches = Coche::inRandomOrder()->paginate(4);
    return view('welcome', compact('listaCoches'));
})->name('home');

// Ruta para mostrar coches
Route::get('coches', ShowCoches::class)->name('coches.index');



Route::resource('contacto', ContactoController::class);

Route::get('contactanos', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('contactanos', [ContactoController::class, 'procesarFormulario'])->name('contacto.procesar');

// Ruta para ver un coche específico
Route::get('coches/{id}', [CocheController::class, 'show'])->name('ver_coche');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Ruta para generar el PDF
    Route::get('vendidos/factura/{coche}', [VendidoController::class, 'factura'])->name('vendidos.factura');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('compras', CompraCoches::class)->name('compras.index');
    Route::get('compra-coches/{coche}', CompraCoches::class)->name('compra.coche');

    Route::resource('deseos', DeseoController::class)->except(['create', 'edit', 'update']);

    Route::resource('vendidos', VendidoController::class);
});
