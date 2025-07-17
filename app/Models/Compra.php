<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    public $timestamps = false;

    protected $fillable = [
        'id_cliente',
        'fecha_compra',
        'hora_compra',
        'monto_total',
        'cant_pases',
        'debito_credito',
        'numero_tarjeta',
        'cant_vehiculos',
        'fecha_vencimiento',
        'cvv',
    ];

    public function clientes(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }
    public function pase(): HasMany
    {
        return $this->hasMany(Pase::class, 'id_compra', 'id_compra');
    }
}
