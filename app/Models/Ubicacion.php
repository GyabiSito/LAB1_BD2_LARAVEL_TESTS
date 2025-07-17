<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ubicacion extends Model
{
    protected $primaryKey = 'id_ubicacion';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
    ];


    public function parque():HasOne
    {
        return $this->hasOne(Parque::class, 'id_ubicacion', 'id_ubicacion');
    }
}
