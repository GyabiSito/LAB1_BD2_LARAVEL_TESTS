<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Visitante extends Model
{
    protected $table = 'visitantes';
    protected $primaryKey = 'id_visitante';
    public $timestamps = false;
    protected $fillable = [
        'ci',
        'nombre',
    ];
    public function pase(): HasMany
    {
        return $this->hasMany(Pase::class, 'id_visitante', 'id_visitante');
    }
}
