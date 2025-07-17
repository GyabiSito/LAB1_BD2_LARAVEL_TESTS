<?php

namespace Database\Seeders;

use App\Models\Parque;
use App\Models\Pase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accedes')->insert([
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'fecha' => '2024-06-01',
                'hora' => '2024-06-01 09:00:00',
                'entrada_salida' => 'E',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'fecha' => '2024-06-02',
                'hora' => '2024-06-02 10:00:00',
                'entrada_salida' => 'S',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'fecha' => '2024-06-03',
                'hora' => '2024-06-03 11:00:00',
                'entrada_salida' => 'E',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'fecha' => '2024-06-04',
                'hora' => '2024-06-04 12:00:00',
                'entrada_salida' => 'S',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'fecha' => '2024-06-05',
                'hora' => '2024-06-05 13:00:00',
                'entrada_salida' => 'E',
            ],
        ]);
    }
}
