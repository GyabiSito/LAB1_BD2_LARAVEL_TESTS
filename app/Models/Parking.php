<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parking extends Model
{
    protected $table = 'parkings';
    protected $primaryKey = 'id_parking';
    public $timestamps = false;
    protected $fillable = [
        'id_parque',
        'costo_adicional',
        'limite_vehiculos'
    ];

    public function parque(): BelongsTo
    {
        return $this->belongsTo(Parque::class, 'id_parque', 'id_parque');
    }
}
