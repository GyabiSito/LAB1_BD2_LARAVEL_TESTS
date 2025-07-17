<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Atracciones extends Model
{
    protected $table = 'atracciones';
    protected $primaryKey = 'id_atraccion';
    public $timestamps = false;

    protected $fillable = [
        'id_parque',
        'nombre',
        'descripcion',
    ];

    public function parque(): BelongsTo
    {
        return $this->belongsTo(Parque::class, 'id_parque', 'id_parque');
    }
    public function usa(): BelongsToMany
    {
        return $this->BelongsToMany(Accede::class, 'id_atraccion', 'id_atraccion');
    }
}
