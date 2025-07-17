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
        Schema::create('usas', function (Blueprint $table) {
            $table->id('id_usa');
            $table->foreignId('id_pase')->references('id_pase')->on('pases');
            $table->foreignId('id_atraccion')->references('id_atraccion')->on('atracciones');
            $table->date('fecha_usa');
            $table->timestamp('hora_usa');
            $table->string('foto', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usas');
    }
};
