<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['email' => 'cliente1@example.com', 'nombre' => 'Juan Cliente', 'ci' => '12345678'],
            ['email' => 'cliente2@example.com', 'nombre' => 'Maria Compradora', 'ci' => '87654321'],
            ['email' => 'familia3@example.com', 'nombre' => 'Carlos Familiar', 'ci' => '15426587'],
            ['email' => 'cliente7@example.com', 'nombre' => 'Cliente 7', 'ci' => '51649872'],
            ['email' => 'cliente8@example.com', 'nombre' => 'Cliente 8', 'ci' => '54378234'],
            ['email' => 'cliente9@example.com', 'nombre' => 'Cliente 9', 'ci' => '74569814'],
            ['email' => 'cliente10@example.com', 'nombre' => 'Cliente 10', 'ci' => '05124685'],
            ['email' => 'cliente11@example.com', 'nombre' => 'Cliente 11', 'ci' => '45123685'],
            ['email' => 'cliente12@example.com', 'nombre' => 'Cliente 12', 'ci' => '55906938'],
        ]);
    }
}
