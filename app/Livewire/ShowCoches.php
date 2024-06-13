<?php

namespace App\Livewire;

use App\Models\Coche;
use App\Models\Marca;
use App\Models\Tipo;
use Livewire\Component;

class ShowCoches extends Component
{
    public string $buscar = "";
    public ?string $tipo = null;
    public ?string $nuevo = null;
    public ?string $color = null;
    public ?int $fabricacion = null;
    public ?array $precio = null;

    public function mount()
    {
        $this->buscar = request()->query('buscar', $this->buscar);
    }

    public function render()
    {
        $marcas = Marca::withCount('coches')->get();
        $tipos = Tipo::withCount('coches')->get();
        $colores = $this->obtenerColores();
        $anioFabricacion = $this->anioFabricacion();

        $cochesBusqueda = Coche::with('marca', 'tipo');

        // Filtrar por marca, modelo o tipo
        $cochesBusqueda->where(function($query) {
            $query->whereHas('marca', function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%')
                      ->orWhere('modelo', 'like', '%' . $this->buscar . '%');
            })->orWhereHas('tipo', function ($query) {
                $query->where('nombre', 'like', '%' . $this->buscar . '%');
            });
        });

        // Filtrar por tipo
        if ($this->tipo !== null) {
            $cochesBusqueda->whereHas('tipo', function ($query) {
                $query->where('nombre', $this->tipo);
            });
        }

        // Filtrar por nuevo
        if ($this->nuevo !== null) {
            $cochesBusqueda->where('nuevo', $this->nuevo);
        }

        // Filtrar por color
        if ($this->color !== null) {
            $cochesBusqueda->where('color', $this->color);
        }

        // Filtrar por año de fabricación
        if ($this->fabricacion !== null) {
            $cochesBusqueda->where('fabricacion', $this->fabricacion);
        }

        // Filtrar por precio
        if ($this->precio !== null) {
            $cochesBusqueda->whereBetween('precio', $this->precio);
        }

        $cochesBusqueda->orderBy('id', 'desc');

        $coches = $cochesBusqueda->paginate(12);

        return view('livewire.show-coches', compact('coches', 'marcas', 'tipos', 'colores', 'anioFabricacion'));
    }

    // Método para filtrar por MARCA
    public function filtrarPorMarca($marca)
    {
        $this->buscar = $marca;
        $this->render();
    }

    // Método para filtrar por TIPO
    public function filtrarPorTipo($tipo)
    {
        $this->buscar = $tipo ?? '';
        if ($this->buscar === 'Todos los tipos') {
            $this->buscar = '';
        }
        $this->render();
    }

    // Método para filtrar por ESTADO
    public function filtrarPorNuevo($estado)
    {
        $this->nuevo = $estado;
        $this->render();
    }

    // Método para filtrar por COLOR
    public function filtrarPorColor($color)
    {
        $this->color = $color;
        $this->render();
    }

    // Método para filtrar por FABRICACION
    public function filtrarPorFabricacion($fabricacion)
    {
        $this->fabricacion = $fabricacion;
        $this->fabricacion = (int)$fabricacion;
        $this->render();
    }

    // Método para filtrar por PRECIO
    public function filtrarPorPrecio($rango)
    {
        switch ($rango) {
            case '0-5000':
                $this->precio = [0, 5000];
                break;
            case '5000-10000':
                $this->precio = [5000, 10000];
                break;
            case '10000-20000':
                $this->precio = [10000, 20000];
                break;
            case '20000-50000':
                $this->precio = [20000, 50000];
                break;
            case '50000-100000':
                $this->precio = [50000, 100000];
                break;
            default:
                $this->precio = null;
        }
        $this->render();
    }

    public function obtenerColores()
    {
        return Coche::distinct()->pluck('color');
    }

    public function anioFabricacion()
    {
        return Coche::distinct()->pluck('fabricacion')->unique()->sort()->reverse();
    }
}
