<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coche extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen', 'descripcion', 'precio',
        'color', 'kilometros', 'fabricacion', 'nuevo', 'user_id',
        'marca_id', 'tipo_id'
    ];

    // Relación N:1 con Marca
    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    // Relación N:1 con Tipo
    public function tipo(): BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }

    // Relación N:1 con Vendido
    // public function vendido(): BelongsTo
    // {
    //     return $this->belongsTo(Vendido::class);
    // }

    // Relación N:1 con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // //Relacion 1:N con deseo
    // public function deseo(): BelongsTo
    // {
    //     return $this->belongsTo(Deseo::class);
    // }
}
