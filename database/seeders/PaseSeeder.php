<?php

namespace Database\Seeders;

use App\Models\Compra;
use App\Models\Parque;
use App\Models\Precio;
use App\Models\Visitante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pases')->insert([
            [
                'id_precio' => Precio::inRandomOrder()->first()->id_precio,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'id_visitante' => Visitante::inRandomOrder()->first()->id_visitante,
                'id_compra' => Compra::inRandomOrder()->first()->id_compra,
                'codigo_qr' => 'QR123456A',
            ],
            [
                'id_precio' => Precio::inRandomOrder()->first()->id_precio,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'id_visitante' => Visitante::inRandomOrder()->first()->id_visitante,
                'id_compra' => Compra::inRandomOrder()->first()->id_compra,
                'codigo_qr' => 'QR123456B',
            ],
            [
                'id_precio' => Precio::inRandomOrder()->first()->id_precio,
                'id_parque' => Parque::inRandomOrder()->first()->id_parque,
                'id_visitante' => Visitante::inRandomOrder()->first()->id_visitante,
                'id_compra' => Compra::inRandomOrder()->first()->id_compra,
                'codigo_qr' => 'QR123456C',
            ],
        ]);
    }
}
