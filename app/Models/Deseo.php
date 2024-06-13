<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deseo extends Model
{
    use HasFactory;

    protected $fillable = ['deseo', 'coche_id', 'user_id'];

    // Relación N:1 con Coche
    public function coche(): BelongsTo
    {
        return $this->belongsTo(Coche::class);
    }

    // Relación N:1 con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
