<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');
            $table->foreignId('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
            $table->date('fecha_compra');
            $table->time('hora_compra');
            $table->integer('monto_total');
            $table->integer('cant_pases');
            $table->integer('cant_vehiculos');
            $table->char('debito_credito', 1);
            $table->char('numero_tarjeta', 16);
            $table->date('fecha_vencimiento');
            $table->char('cvv', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
