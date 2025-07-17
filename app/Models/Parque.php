<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Parque extends Model
{
    protected $primaryKey = 'id_parque';
    public $timestamps = false;
    protected $fillable = [
        'id_ubicacion',
        'nombre',
        'capacidad_maxima_diaria'
    ];

    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    public function parking(): HasOne
    {
        return $this->hasOne(Parking::class, 'id_parque', 'id_parque');
    }

    public function atracciones(): HasMany
    {
        return $this->hasMany(Atracciones::class, 'id_parque', 'id_parque');
    }

    public function accede(): HasMany
    {
        return $this->hasMany(Accede::class, 'id_parque', 'id_parque');
    }
    public function precio(): HasMany
    {
        return $this->hasMany(Precio::class, 'id_precio', 'id_precio');
    }
}
