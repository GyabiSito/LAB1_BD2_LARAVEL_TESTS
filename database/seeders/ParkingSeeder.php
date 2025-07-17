<?php

namespace Database\Seeders;

use App\Models\Parque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parkings')->insert([
            [
                'id_parque' => Parque::where('id_parque', 1)->first()->id_parque,
                'limite_vehiculos' => 100,
                'costo_adicional' => 9
            ],
            [
                'id_parque' => Parque::where('id_parque', 2)->first()->id_parque,
                'limite_vehiculos' => 80,
                'costo_adicional' => 16
            ],
            [
                'id_parque' => Parque::where('id_parque', 3)->first()->id_parque,
                'limite_vehiculos' => 90,
                'costo_adicional' => 14
            ],
            [
                'id_parque' => Parque::where('id_parque', 4)->first()->id_parque,
                'limite_vehiculos' => 110,
                'costo_adicional' => 19
            ],
        ]);
    }
}
