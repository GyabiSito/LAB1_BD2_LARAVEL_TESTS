<?php

namespace Database\Seeders;

use App\Models\Parque;
use App\Models\Pase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaseParqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pase_parques')->insert([
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'incluye_parking' => true,
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'incluye_parking' => false,
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'incluye_parking' => true,
            ],
        ]);
    }
}
