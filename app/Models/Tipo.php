<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    //Relacion 1:N con tipo
    public function coches(): HasMany
    {
        return $this->hasMany(Coche::class);
    }
}
