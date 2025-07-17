<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AtraccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('atracciones')->insert([
            [
                'id_atraccion' => 1,
                'id_parque' => 1,
                'nombre' => 'Montaña Rusa',
                'descripcion' => 'Velocidad extrema y adrenalina pura',
            ],
            [
                'id_atraccion' => 2,
                'id_parque' => 1,
                'nombre' => 'Carrusel',
                'descripcion' => 'Para los más peques',
            ],
            [
                'id_atraccion' => 3,
                'id_parque' => 2,
                'nombre' => 'Casa del Terror',
                'descripcion' => 'No apto para cardíacos',
            ],
            [
                'id_atraccion' => 4,
                'id_parque' => 3,
                'nombre' => 'Autos Chocadores',
                'descripcion' => 'Diversión garantizada',
            ],
            [
                'id_atraccion' => 5,
                'id_parque' => 4,
                'nombre' => 'Rueda de la Fortuna',
                'descripcion' => 'Una vista espectacular desde las alturas',
            ],
            [
                'id_atraccion' => 6,
                'id_parque' => 2,
                'nombre' => 'Tirolesa',
                'descripcion' => 'Aventura y emoción en las alturas',
            ],
            [
                'id_atraccion' => 7,
                'id_parque' => 3,
                'nombre' => 'Labertinto de Espejos',
                'descripcion' => 'Desafía tu percepción',
            ],
            [
                'id_atraccion' => 8,
                'id_parque' => 4,
                'nombre' => 'Splash',
                'descripcion' => 'Diversión acuática para toda la familia',
            ],
            [
                'id_atraccion' => 9,
                'id_parque' => 1,
                'nombre' => 'Simulador 4D',
                'descripcion' => 'Una experiencia inmersiva',
            ],
            [
                'id_atraccion' => 10,
                'id_parque' => 2,
                'nombre' => 'Mini Golf',
                'descripcion' => 'Diversión para todas las edades',
            ],
            [
                'id_atraccion' => 11,
                'id_parque' => 3,
                'nombre' => 'Cine al Aire Libre',
                'descripcion' => 'Películas bajo las estrellas',
            ],
            [
                'id_atraccion' => 12,
                'id_parque' => 4,
                'nombre' => 'Zona de Juegos Infantiles',
                'descripcion' => 'Diversión para los más pequeños',
            ],
        ]);
    }
}
