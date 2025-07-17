<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usa extends Model
{
    protected $table = 'usas';
    protected $primaryKey = 'id_usa';
    public $timestamps = false;

    protected $fillable = [
        'id_pase',
        'id_atraccion',
        'fecha_usa',
        'hora_usa',
        'foto',
    ];

    public function pase(): BelongsToMany
    {
        return $this->belongsToMany(Pase::class, 'id_pase', 'id_pase');
    }

    public function atraccion(): BelongsToMany
    {
        return $this->belongsToMany(Atracciones::class, 'id_atraccion', 'id_atraccion');
    }
}
