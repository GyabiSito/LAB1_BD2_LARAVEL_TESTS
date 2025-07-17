<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Precio extends Model
{

    protected $table = 'precios';
    protected $primaryKey = 'id_precio';
    public $timestamps = false;
    protected $fillable = [
        'precio',
        'id_parque',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function parques(): HasMany
    {
        return $this->hasMany(Parque::class, 'id_parque', 'id_parque');
    }
}
