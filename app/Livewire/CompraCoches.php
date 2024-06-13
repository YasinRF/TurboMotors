<?php

namespace App\Livewire;

use App\Models\Coche;
use App\Models\Tipo;
use App\Models\Deseo;
use App\Models\User;
use App\Models\Vendido;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class CompraCoches extends Component
{
    public Coche $coche;
    public Tipo $tipo;
    public bool $openModalCompra = false;

    #[Validate('required', 'string')]
    public $nombre;

    #[Validate('required', 'integer', 'regex:/[0-9]{8}')]
    public $telefono;

    #[Validate('required', 'email')]
    public $email;

    #[Validate('nullable')]
    public $comentario;

    public function mount(Coche $coche)
    {
        $this->coche = $coche;
        $this->tipo = $coche->tipo; // Asigna el tipo de coche
    }

    public function render()
    {
        $tipoId = $this->coche->tipo_id;

        $cochesSimilares = Coche::where('tipo_id', $tipoId)
            ->where('id', '!=', $this->coche->id)
            ->paginate(4);

        $liked = Deseo::where('user_id', Auth::user()->id)
            ->where('coche_id', $this->coche->id)
            ->exists();

        return view('livewire.compra-coches', [
            'listaCoches' => $cochesSimilares,
            'liked' => $liked,
            'tipo' => $this->tipo, // Pasar el tipo de coche a la vista
        ]);
    }

    public function openCompra(Coche $miCoche)
    {
        $this->coche = $miCoche;
        $this->openModalCompra = true;
    }

    public function marcarComoDeseado()
    {
        // Obtener el usuario actual
        $usuario = auth()->user();

        // Verificar si el deseo ya existe
        if (!$usuario->deseos()->where('coche_id', $this->coche->id)->exists()) {
            // Crear un nuevo deseo
            $usuario->deseos()->create([
                'coche_id' => $this->coche->id,
            ]);
        }
    }

    // public function solicitarCompra()
    // {
    //     // Obtener el usuario actual
    //     $usuario = auth()->user();

    //     // Verificar si el deseo ya existe
    //     if (!$usuario->vendidos()->where('coche_id', $this->coche->id)->exists()) {
    //         // Crear un nuevo deseo
    //         $usuario->vendidos()->create([
    //             'coche_id' => $this->coche->id,
    //         ]);
    //     }
    // }

    public function store(Coche $coche)
    {
        $this->validate();

        Vendido::create([
            'vendido' => 'SI',
            'coche_id' => $this->coche->id,
            'user_id' => auth()->user()->id
        ]);

        // return $this->openModalCompra = false;
        return redirect()->route('coches.index')->with('comprado', 'En breves momentos recibirás un correo para completar la compra');
    }
}
