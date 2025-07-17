<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compras')->insert([
            [
                'id_cliente' => Cliente::inRandomOrder()->first()->id_cliente,
                'fecha' => '2024-06-01',
                'hora' => '10:30:00',
                'monto_total' => 150,
                'cant_pases' => 2,
                'debito_credito' => 'D',
                'numero_tarjeta' => '4111111111111111',
                'fecha_vencimiento' => '2026-12-01',
                'cvv' => '123',
            ],
            [
                'id_cliente' => Cliente::inRandomOrder()->first()->id_cliente,
                'fecha' => '2024-06-02',
                'hora' => '12:00:00',
                'monto_total' => 200,
                'cant_pases' => 3,
                'debito_credito' => 'C',
                'numero_tarjeta' => '5500000000000004',
                'fecha_vencimiento' => '2027-05-01',
                'cvv' => '456',
            ],
        ]);
    }
}
