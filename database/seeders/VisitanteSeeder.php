<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visitantes')->insert([
            [
                'ci' => '12345678',
                'nombre' => 'Juan Perez',
            ],
            [
                'ci' => '87654321',
                'nombre' => 'Maria Gomez',
            ],
            [
                'ci' => '11223344',
                'nombre' => 'Carlos Lopez',
            ],
        ]);
    }
}
