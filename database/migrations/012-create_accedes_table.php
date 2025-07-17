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
        Schema::create('accedes', function (Blueprint $table) {
            $table->id('id_accede');
            $table->foreignId('id_pase_parque')->references('id_pase_parque')->on('pase_parques');
            $table->foreignId('id_parque')->references('id_parque')->on('parques');
            $table->date('fecha_accede');
            $table->timestamp('hora_accede');
            $table->char('entrada_salida', 1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accedes');
    }
};
