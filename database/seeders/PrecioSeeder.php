<?php

namespace Database\Seeders;

use App\Models\Precio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        $filePath = storage_path('app/dml.sql');
        dump("Archivo de salida: $filePath");

        file_put_contents($filePath, ""); // limpiamos antes de empezar

        // Obtener todos los parques
        $parques = \App\Models\Parque::all();
        $year = now()->year;

        foreach ($parques as $parque) {
            // Crear 2 precios diferentes para cada parque, cada uno válido para todo el año
            for ($i = 1; $i <= 2; $i++) {
                $precio = new Precio([
                    'id_parque'    => $parque->id_parque,
                    'precio'       => rand(1000, 5000) + $i * 100, // precios diferentes
                    'fecha_inicio' => "$year-01-01 00:00:00",
                    'fecha_fin'    => "$year-12-31 23:59:59",
                ]);

                $precio->save();

                $sql = sprintf(
                    "INSERT INTO precios (id_precio, precio, id_parque, fecha_inicio, fecha_fin, created_at, updated_at) VALUES (%d, %d, %d, '%s', '%s', NOW(), NOW());\n",
                    $precio->id_precio,
                    $precio->precio,
                    $precio->id_parque,
                    $precio->fecha_inicio,
                    $precio->fecha_fin
                );

                file_put_contents($filePath, $sql, FILE_APPEND);
            }
        }

        dump("Seeder completado.");
        DB::rollBack();
    }
}
