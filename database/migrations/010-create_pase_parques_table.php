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
        Schema::create('pase_parques', function (Blueprint $table) {
            $table->id('id_pase_parque');
            $table->foreignId('id_pase')->references('id_pase')->on('pases');
            $table->foreignId('id_parque')->references('id_parque')->on('parques');
            $table->foreignId('id_precio')->references('id_precio')->on('precios');
            $table->boolean('incluye_parking')->default(false);
            $table->date('fecha_acceso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pase_parques');
    }
};
