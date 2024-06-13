<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendido extends Model
{
    use HasFactory;
    protected $fillable = ['vendido', 'coche_id', 'user_id'];

    //Relacion 1:N con coche
    public function coche(): BelongsTo
    {
        return $this->belongsTo(Coche::class);
    }

    //Relacion 1:N con user
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
