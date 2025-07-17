<?php

namespace Database\Seeders;

use App\Models\Atracciones;
use App\Models\Pase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usas')->insert([
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_atraccion' => Atracciones::inRandomOrder()->first()->id_atraccion,
                'fecha' => '2024-06-01',
                'hora' => '2024-06-01 10:00:00',
                'foto' => 'foto1.jpg',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_atraccion' => Atracciones::inRandomOrder()->first()->id_atraccion,
                'fecha' => '2024-06-02',
                'hora' => '2024-06-02 11:00:00',
                'foto' => 'foto2.jpg',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_atraccion' => Atracciones::inRandomOrder()->first()->id_atraccion,
                'fecha' => '2024-06-03',
                'hora' => '2024-06-03 12:00:00',
                'foto' => 'foto3.jpg',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_atraccion' => Atracciones::inRandomOrder()->first()->id_atraccion,
                'fecha' => '2024-06-04',
                'hora' => '2024-06-04 13:00:00',
                'foto' => 'foto4.jpg',
            ],
            [
                'id_pase' => Pase::inRandomOrder()->first()->id_pase,
                'id_atraccion' => Atracciones::inRandomOrder()->first()->id_atraccion,
                'fecha' => '2024-06-05',
                'hora' => '2024-06-05 14:00:00',
                'foto' => 'foto5.jpg',
            ],
        ]);
    }
}
