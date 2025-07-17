<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pase extends Model
{
    protected $primaryKey = 'id_pase';
    public $timestamps = false;
    protected $fillable = [
        'id_visitante',
        'id_compra',
        'codigo_qr',
        'precio_total'
    ];

    public function precio(): BelongsTo
    {
        return $this->belongsTo(Precio::class, 'id_precio');
    }

    public function parque(): BelongsTo
    {
        return $this->belongsTo(Parque::class, 'id_parque');
    }

    public function visitante(): BelongsTo
    {
        return $this->belongsTo(Visitante::class, 'id_visitante');
    }

    public function compra(): BelongsTo
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }

    // public function fechasAcceso(): HasMany
    // {
    //     return $this->hasMany(PaseFechaAcceso::class, 'id_pase');
    // }

    public function paseParque(): HasMany
    {
        return $this->hasMany(PaseParque::class, 'id_pase');
    }
}
