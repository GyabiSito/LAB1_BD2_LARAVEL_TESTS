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
        Schema::create('pases', function (Blueprint $table) {
            $table->id('id_pase');
            $table->foreignId('id_visitante')->references('id_visitante')->on('visitantes');
            $table->foreignId('id_compra')->references('id_compra')->on('compras');
            $table->string('codigo_qr', 255);
            $table->integer('precio_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pases');
    }
};
