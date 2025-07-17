<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        $filePath = storage_path('app/dml_ubicacion.sql');
        dump("Archivo de salida: $filePath");

        file_put_contents($filePath, ""); // Limpiar archivo antes de empezar

        // Definir ubicaciones
        $ubicaciones = [
            ['id_ubicacion' => 1, 'nombre' => 'Herrera'],
            ['id_ubicacion' => 2, 'nombre' => 'Nicolás Guerra'],
            ['id_ubicacion' => 3, 'nombre' => 'Ciganda'],
            ['id_ubicacion' => 4, 'nombre' => '18 de Julio'],
        ];

        foreach ($ubicaciones as $ubicacion) {
            echo "Insertando ubicación: {$ubicacion['nombre']}\n";
            $ubi = new Ubicacion([
                'id_ubicacion' => $ubicacion['id_ubicacion'],
                'nombre'       => $ubicacion['nombre'],
            ]);
            $ubi->save();

            $sql = sprintf(
            "INSERT INTO ubicacions (id_ubicacion, nombre, created_at, updated_at) VALUES (%d, '%s', NOW(), NOW());\n",
            $ubicacion['id_ubicacion'],
            addslashes($ubicacion['nombre'])
            );

            file_put_contents($filePath, $sql, FILE_APPEND);
        }

        dump("Seeder completado.");
        DB::rollBack();
    }
}
