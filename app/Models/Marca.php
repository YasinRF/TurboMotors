<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'modelo'];

    //Relacion 1:N con coche
    public function coches(): HasMany
    {
        return $this->hasMany(Coche::class);
    }

    //Accessors y Mutators
    public function nombre(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v)
        );
    }
    public function modelo(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => ucfirst($v)
        );
    }
}
