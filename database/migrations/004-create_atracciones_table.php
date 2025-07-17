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
        Schema::create('atracciones', function (Blueprint $table) {
            $table->id('id_atraccion');
            $table->foreignId('id_parque')->references('id_parque')->on('parques')->onDelete('cascade');
            $table->string('nombre', 50);
            $table->string('descripcion', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atracciones');
    }
};
