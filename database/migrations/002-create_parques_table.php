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
        Schema::create('parques', function (Blueprint $table) {
            $table->id('id_parque');
            $table->foreignId('id_ubicacion')->references('id_ubicacion')->on('ubicacions')->onDelete('cascade');
            $table->string('nombre', 50);
            $table->integer('capacidad_maxima_diaria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parques');
    }
};
