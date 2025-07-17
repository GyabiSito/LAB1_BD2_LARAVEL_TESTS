<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaseParque extends Model
{
    protected $table = 'pase_parques';
    protected $primaryKey = 'id_pase_parque';
    public $timestamps = false;

    protected $fillable = [
        'id_pase',
        'id_parque',
        'id_precio',
        'incluye_parking',
        'fecha_acceso'
    ];

    public function pase(): BelongsTo
    {
        return $this->belongsTo(Pase::class, 'id_pase', 'id_pase');
    }

    public function parque(): BelongsTo
    {
        return $this->belongsTo(Parque::class, 'id_parque', 'id_parque');
    }
    public function precio(): BelongsTo
    {
        return $this->belongsTo(Precio::class, 'id_precio', 'id_precio');
    }
}
