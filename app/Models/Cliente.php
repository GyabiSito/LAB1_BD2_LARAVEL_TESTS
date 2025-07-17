<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'nombre',
        'ci',
    ];

    public function compras(): HasMany
    {
        return $this->hasMany(Compra::class, 'id_cliente', 'id_cliente');
    }

}
