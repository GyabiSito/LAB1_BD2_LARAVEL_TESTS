<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parques')->insert([
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 1)->first()->id_ubicacion,
                'nombre' => 'Parque Herrera',
                'capacidad_maxima_diaria' => 100,
            ],
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 2)->first()->id_ubicacion,
                'nombre' => 'Parque Nicolás Guerra',
                'capacidad_maxima_diaria' => 200,
            ],
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 3)->first()->id_ubicacion,
                'nombre' => 'Parque Ciganda',
                'capacidad_maxima_diaria' => 300,
            ],
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 4)->first()->id_ubicacion,
                'nombre' => 'Parque 18 de Julio',
                'capacidad_maxima_diaria' => 400,
            ],
        ]);
    }
}
