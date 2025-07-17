<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accede extends Model
{
    protected $table = 'accedes';
    protected $primaryKey = 'id_accede';
    public $timestamps = false;
    protected $fillable = [
        'id_pase_parque',
        'id_parque',
        'fecha_accede',
        'hora_accede',
        'entrada_salida'
    ];

    protected $casts = [
        'hora' => 'datetime',
        'fecha' => 'date',
    ];

    public function paseParque(): BelongsTo
    {
        return $this->belongsTo(PaseParque::class, 'id_pase_parque', 'id_pase_parque');
    }

    public function parque(): BelongsTo
    {
        return $this->belongsTo(Parque::class, 'id_parque', 'id_parque');
    }
}
