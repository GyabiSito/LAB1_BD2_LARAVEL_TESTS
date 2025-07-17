<?php

namespace Database\Seeders;

use App\Models\Parking;
use App\Models\Parque;
use App\Models\PaseFechaAcceso;
use App\Models\Precio;
use App\Models\Ubicacion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Pase;
use App\Models\PaseParque;
use App\Models\Visitante;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $filePath = storage_path('app/dml.sql');
        dump("Archivo de salida: $filePath");

        file_put_contents($filePath, ""); // Limpiar archivo antes de empezar

        // Definir ubicaciones
        //*********************UBICACION*****************************/
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
                "INSERT INTO ubicaciones (id_ubicacion, nombre) VALUES (%d, '%s');\n",
                $ubicacion['id_ubicacion'],
                addslashes($ubicacion['nombre'])
            );
            echo $sql;
            file_put_contents($filePath, $sql, FILE_APPEND);
        }
        //*****************PARQUES*********************
        $parques = [
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 1)->first()->id_ubicacion,
                'nombre' => 'Parque Herrera',
                'capacidad_maxima_diaria' => 100,
            ],
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 2)->first()->id_ubicacion,
                'nombre' => 'Parque Nicolás Guerra',
                'capacidad_maxima_diaria' => 200,
            ],
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 3)->first()->id_ubicacion,
                'nombre' => 'Parque Ciganda',
                'capacidad_maxima_diaria' => 300,
            ],
            [
                'id_ubicacion' => Ubicacion::where('id_ubicacion', 4)->first()->id_ubicacion,
                'nombre' => 'Parque 18 de Julio',
                'capacidad_maxima_diaria' => 400,
            ],
        ];

        foreach ($parques as $parque) {
            echo "Insertando parque: {$parque['nombre']}\n";
            $p = new Parque([
                'id_ubicacion' => $parque['id_ubicacion'],
                'nombre' => $parque['nombre'],
                'capacidad_maxima_diaria' => $parque['capacidad_maxima_diaria'],
            ]);
            $p->save();

            $sql = sprintf(
                "INSERT INTO parques (id_parque, id_ubicacion, nombre, capacidad_maxima_diaria) VALUES (%d, %d, '%s', %d);\n",
                $p->id_parque,
                $p->id_ubicacion,
                addslashes($p->nombre),
                $p->capacidad_maxima_diaria
            );
            echo $sql;
            file_put_contents($filePath, $sql, FILE_APPEND);
        }

        //*************PARKING******************** */
        $parkings = [
            [
                'id_parque' => Parque::where('id_parque', 1)->first()->id_parque,
                'limite_vehiculos' => 100,
                'costo_adicional' => rand(1, 20)
            ],
            [
                'id_parque' => Parque::where('id_parque', 2)->first()->id_parque,
                'limite_vehiculos' => 80,
                'costo_adicional' => rand(1, 20)
            ],
            [
                'id_parque' => Parque::where('id_parque', 3)->first()->id_parque,
                'limite_vehiculos' => 90,
                'costo_adicional' => rand(1, 20)
            ],
            [
                'id_parque' => Parque::where('id_parque', 4)->first()->id_parque,
                'limite_vehiculos' => 110,
                'costo_adicional' => rand(1, 20)
            ],
        ];
        foreach ($parkings as $parking) {
            echo "Insertando parking:" . $parking['id_parque'] . "\n";
            $p = new Parking([
                'id_parque' => $parking['id_parque'],
                'limite_vehiculos' => $parking['limite_vehiculos'],
                'costo_adicional' => $parking['costo_adicional'],
            ]);
            $p->save();
            $sql = sprintf(
                "INSERT INTO parkings (id_parking, id_parque, limite_vehiculos, costo_adicional) VALUES (%d, %d, %d, %d);\n",
                $p->id_parking,
                $p->id_parque,
                $p->limite_vehiculos,
                $p->costo_adicional
            );
            echo $sql;
            file_put_contents($filePath, $sql, FILE_APPEND);
        }

        //***************ATRACCIONES*********************** */

        $atracciones = [
            [
                'id_atraccion' => 1,
                'id_parque' => 1,
                'nombre' => 'Montaña Rusa',
                'descripcion' => 'Velocidad extrema y adrenalina pura',
            ],
            [
                'id_atraccion' => 2,
                'id_parque' => 1,
                'nombre' => 'Carrusel',
                'descripcion' => 'Para los más peques',
            ],
            [
                'id_atraccion' => 3,
                'id_parque' => 2,
                'nombre' => 'Casa del Terror',
                'descripcion' => 'No apto para cardíacos',
            ],
            [
                'id_atraccion' => 4,
                'id_parque' => 3,
                'nombre' => 'Autos Chocadores',
                'descripcion' => 'Diversión garantizada',
            ],
            [
                'id_atraccion' => 5,
                'id_parque' => 4,
                'nombre' => 'Rueda de la Fortuna',
                'descripcion' => 'Una vista espectacular desde las alturas',
            ],
            [
                'id_atraccion' => 6,
                'id_parque' => 2,
                'nombre' => 'Tirolesa',
                'descripcion' => 'Aventura y emoción en las alturas',
            ],
            [
                'id_atraccion' => 7,
                'id_parque' => 3,
                'nombre' => 'Labertinto de Espejos',
                'descripcion' => 'Desafía tu percepción',
            ],
            [
                'id_atraccion' => 8,
                'id_parque' => 4,
                'nombre' => 'Splash',
                'descripcion' => 'Diversión acuática para toda la familia',
            ],
            [
                'id_atraccion' => 9,
                'id_parque' => 1,
                'nombre' => 'Simulador 4D',
                'descripcion' => 'Una experiencia inmersiva',
            ],
            [
                'id_atraccion' => 10,
                'id_parque' => 2,
                'nombre' => 'Mini Golf',
                'descripcion' => 'Diversión para todas las edades',
            ],
            [
                'id_atraccion' => 11,
                'id_parque' => 3,
                'nombre' => 'Cine al Aire Libre',
                'descripcion' => 'Películas bajo las estrellas',
            ],
            [
                'id_atraccion' => 12,
                'id_parque' => 4,
                'nombre' => 'Zona de Juegos Infantiles',
                'descripcion' => 'Diversión para los más pequeños',
            ],
        ];

        foreach ($atracciones as $atraccion) {
            echo "Insertando atracción: {$atraccion['nombre']}\n";
            DB::table('atracciones')->insert([
                'id_atraccion' => $atraccion['id_atraccion'],
                'id_parque' => $atraccion['id_parque'],
                'nombre' => $atraccion['nombre'],
                'descripcion' => $atraccion['descripcion'],
            ]);
            $sql = sprintf(
                "INSERT INTO atracciones (id_atraccion, id_parque, nombre, descripcion) VALUES (%d, %d, '%s', '%s');\n",
                $atraccion['id_atraccion'],
                $atraccion['id_parque'],
                addslashes($atraccion['nombre']),
                addslashes($atraccion['descripcion'])
            );
            echo $sql;
            file_put_contents($filePath, $sql, FILE_APPEND);
        }

        // ***************PRECIOS*********************** */
        $year = now()->year;

        $parques = Parque::all();

        foreach ($parques as $parque) {
            // Precio 1: enero a junio
            $precio1 = new Precio([
                'id_parque'    => $parque->id_parque,
                'precio'       => rand(100, 5000),
                'fecha_inicio' => now()->startOfDay()->format('Y-m-d H:i:s'),
                'fecha_fin'    => now()->copy()->addMonths(6)->endOfMonth()->format('Y-m-d 23:59:59'),
            ]);
            $precio1->save();

            $sql1 = sprintf(
                "INSERT INTO precios (id_precio, precio, id_parque, fecha_inicio, fecha_fin) VALUES (%d, %d, %d, '%s', '%s');\n",
                $precio1->id_precio,
                $precio1->precio,
                $precio1->id_parque,
                $precio1->fecha_inicio,
                $precio1->fecha_fin
            );
            echo $sql1;
            file_put_contents($filePath, $sql1, FILE_APPEND);

            // Precio 2: julio a diciembre
            $precio2 = new Precio([
                'id_parque'    => $parque->id_parque,
                'precio'       => rand(100, 5000),
                'fecha_inicio' => now()->copy()->setDate($year, 7, 1)->startOfDay()->format('Y-m-d H:i:s'),
                'fecha_fin'    => now()->copy()->setDate($year, 12, 31)->endOfDay()->format('Y-m-d H:i:s'),
            ]);
            $precio2->save();

            $sql2 = sprintf(
                "INSERT INTO precios (id_precio, precio, id_parque, fecha_inicio, fecha_fin) VALUES (%d, %d, %d, '%s', '%s');\n",
                $precio2->id_precio,
                $precio2->precio,
                $precio2->id_parque,
                $precio2->fecha_inicio,
                $precio2->fecha_fin
            );
            echo $sql2;
            file_put_contents($filePath, $sql2, FILE_APPEND);
        }
        //1 precio por mes durante todo 2024
        $year2024 = "2024";
        foreach ($parques as $parque) {
            for ($i = 1; $i <= 12; $i++) {
                $precio = new Precio([
                    'id_parque'    => $parque->id_parque,
                    'precio'       => rand(100, 5000),
                    'fecha_inicio' => now()->setDate($year2024, $i, 1)->startOfDay()->format('Y-m-d H:i:s'),
                    'fecha_fin'    => now()->setDate($year2024, $i, 1)->endOfMonth()->endOfDay()->format('Y-m-d H:i:s'),
                ]);
                $precio->save();

                $sql = sprintf(
                    "INSERT INTO precios (id_precio, precio, id_parque, fecha_inicio, fecha_fin) VALUES (%d, %d, %d, '%s', '%s');\n",
                    $precio->id_precio,
                    $precio->precio,
                    $precio->id_parque,
                    $precio->fecha_inicio,
                    $precio->fecha_fin
                );
                echo $sql;
                file_put_contents($filePath, $sql, FILE_APPEND);
            }
        }

        //***************CLIENTES, PASE, PASE_PARQUE_VISITANTES*********************** */
        // Solo insertar clientes para los casos de prueba TC001-TC025


        $clientes = [];
        for ($i = 1; $i <= 25; $i++) {
            $num = str_pad($i, 3, '0', STR_PAD_LEFT);
            $clientes[] = [
                'nombre' => "TC$num",
                'ci' => strval(rand(10000000, 99999999)),
                'email' => "tc$num@example.com",
            ];
        }

        foreach ($clientes as $cliente) {
            echo "Insertando cliente: {$cliente['nombre']}\n";
            $cli = new Cliente([
                'nombre' => $cliente['nombre'],
                'ci' => $cliente['ci'],
                'email' => $cliente['email'],
            ]);
            $cli->save();

            $sql = sprintf(
                "INSERT INTO clientes (id_cliente, nombre, ci, email) VALUES (%d, '%s', '%s', '%s');\n",
                $cli->id_cliente,
                addslashes($cli->nombre),
                addslashes($cli->ci),
                addslashes($cli->email),
            );
            echo $sql;
            file_put_contents($filePath, $sql, FILE_APPEND);
        }
        //Crear cliente HECHO
        //TC 001 - COMPRAR 1 PASE SIN VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC001')->first();
        $parque = Parque::find(1);
        $fecha = now()->toDateString();

        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => strval(rand(10000000, 99999999)),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );
        //*******************************************************************
        //TC 002 - COMPRAR 1 PASE CON VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC002')->first();
        $parque = Parque::find(1);
        $fecha = now()->toDateString();
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => strval(rand(10000000, 99999999)),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 1
        );
        //*******************************************************************
        //TC 003 - COMPRAR 2 PASES SIN VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC003')->first();
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );
        //*******************************************************************
        //TC 004 - COMPRAR 2 PASES CON VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC004')->first();
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ],
            cantVehiculos: 1 // Un solo vehículo para ambos
        );
        //*******************************************************************
        //TC 005 - COMPRAR 2 PASES CON 2 VEHICULOS*******************************************************************
        $cliente = Cliente::where('nombre', 'TC005')->first();
        //Crear cliente 2
        $cliente2 = Cliente::where('nombre', 'TC016')->first();
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' =>  rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 2
        );
        $compra2 = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 3',
                    'ci' => '12345679',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 4',
                    'ci' => '87654322',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente2,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 2
        );

        //*******************************************************************
        //TC 006 - COMPRAR PASES LIMITES PARA EL PARQUE SELECCIONADO SIN VEHICULO FECHA 31   ********************************************************************************
        $fecha = now()->endOfMonth()->toDateString();
        $cliente = Cliente::where('nombre', 'TC006')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC006_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }


        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );
        $fecha = now()->endOfMonth()->addDay()->toDateString();
        //********************************************************************
        // TC 007 - COMPRAR 1 PASE CON 100 VEHICULOS
        //********************************************************************
        $parque = Parque::find(3);
        $cliente = Cliente::where('nombre', 'TC007')->first();
        $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => '12345678',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ],
            cantVehiculos: $parque->parking->limite_vehiculos // N vehiculos
        );
        //********************************************************************
        // TC 008 - COMPRAR 1 PASE PARA EL DIA DE MAÑANA
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC008')->first();
        $parque = Parque::find(4);
        $fechaManana = now()->addDay()->toDateString();
        //Agregar 5
        $compras = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => '12345678',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ],
            cantVehiculos: 0
        );

        //********************************************************************
        // TC009 - Comprar N pases para fin de mes y validar límite
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC009')->first();
        $fecha = now()->addMonth()->endOfMonth()->toDateString();
        $parque = Parque::find(1);
        $visitantes = [];
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC009_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );
        $fecha = now()->addMonth()->endOfMonth()->addDay()->toDateString();
        //********************************************************************
        //TC011 - Comprar MAX pase para el dia mañana y MAX vehiculos y validar límite
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC011')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        $fechaManana = now()->addDay()->toDateString();
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC011_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fechaManana,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => true
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: $parque->parking->limite_vehiculos // N vehiculos
        );
        //********************************************************************
        //TC012 - Comprar 1 pase para el dia 5,10,15,20
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC012')->first();
        $parque = Parque::find(3);
        $visitantes = [];
        $fechas = [
            now()->addDays(5)->toDateString(),
            now()->addDays(10)->toDateString(),
            now()->addDays(15)->toDateString(),
            now()->addDays(20)->toDateString()
        ];
        foreach ($fechas as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC012_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );
        //********************************************************************
        //TC013 - Comprar MAX -1 pase para el dia 5,10,15,20 Y comprar 2 pases para el dia 20
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC013')->first();
        $parque = Parque::find(4);
        $visitantes = [];
        $fecha5 = now()->addDays(5)->toDateString();
        $fecha10 = now()->addDays(10)->toDateString();
        $fecha15 = now()->addDays(15)->toDateString();
        $fecha20 = now()->addDays(20)->toDateString();
        $visitantes = [];
        for ($i = 0; $i < $parque->capacidad_maxima_diaria - 1; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'Visitante ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha5,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ],
                    [
                        'fecha' => $fecha10,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ],
                    [
                        'fecha' => $fecha15,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ],
                    [
                        'fecha' => $fecha20,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );
        //*********************************************************************
        //TC014 - Comprar 1 pase para el dia 8,16,24,28 y 1 vehiculo  para el dia 5 y 20, pero no para el dia 10 y 15
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC014')->first();
        $parque = Parque::find(1);
        $visitantes = [];
        $fechas = [
            now()->addDays(8)->toDateString(),
            now()->addDays(16)->toDateString(),
            now()->addDays(24)->toDateString(),
            now()->addDays(28)->toDateString()
        ];
        $llevaVehiculo = [false, true, false, true];
        $i = 0;
        foreach ($fechas as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC014_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => $llevaVehiculo[$i]
                    ]
                ]
            ];
            $i++;
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 9
        );
        // echo "Compra realizada con éxito: {$compra->id_compra}\n";
        // foreach ($compra->pase as $pase) {
        //     echo "Pase ID: {$pase->id_pase}, Visitante: {$pase->visitante->nombre}, QR: {$pase->codigo_qr}\n";
        //     foreach ($pase->paseParque as $paseParque) {
        //         echo "PaseParque ID: {$paseParque->id_pase_parque}, Fecha: {$paseParque->fecha_acceso}, Incluye Parking: " . ($paseParque->incluye_parking ? 'Sí' : 'No') . "\n";
        //     }
        // }

        // // Imprimir la cantidad de vehículos del parque los días de $fechas
        // foreach ($fechas as $fechaCheck) {
        //     $vehiculos = Compra::join('pases', 'compras.id_compra', '=', 'pases.id_compra')
        //     ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
        //     ->where('pase_parques.fecha_acceso', $fechaCheck)
        //     ->where('pase_parques.id_parque', $parque->id_parque)
        //     ->where('pase_parques.incluye_parking', true)
        //     ->distinct()
        //     ->sum('compras.cant_vehiculos');
        //     echo "Fecha: $fechaCheck - Vehículos: $vehiculos\n";
        // }
        //*********************************************************************
        //TC015 - Comprar 1 pase para el dia 3,6,9,12 y 100 vehiculos para el dia 20, pero NO para el dia 5,10,15
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC015')->first();
        $parque = Parque::find(2);
        $parque_id_1 = Parque::find(1);
        $parque_id_3= Parque::find(3);
        $parque_id_4= Parque::find(4);
        $visitantes = [];
        $fechas_1 = [
            //FECHAS PARQUE ID 1
            now()->addDays(3)->addMonth()->toDateString(),
            now()->addDays(6)->addMonth()->toDateString(),
            now()->addDays(9)->addMonth()->toDateString(),
            now()->addDays(12)->addMonth()->toDateString(),
        ];
        $fechas2 = [
            now()->addDays(4)->addMonth()->toDateString(),
            now()->addDays(8)->addMonth()->toDateString(),
            now()->addDays(12)->addMonth()->toDateString(),
            now()->addDays(16)->addMonth()->toDateString(),
        ];
        $fechas3 = [
            now()->addDays(5)->addMonth()->toDateString(),
            now()->addDays(10)->addMonth()->toDateString(),
            now()->addDays(15)->addMonth()->toDateString(),
            now()->addDays(20)->addMonth()->toDateString(),
        ];
        $fechas4 = [
            now()->addDays(6)->addMonth()->toDateString(),
            now()->addDays(11)->addMonth()->toDateString(),
            now()->addDays(16)->addMonth()->toDateString(),
            now()->addDays(21)->addMonth()->toDateString(),
        ];
        $llevaVehiculo = [false, false, false, true];
        $i = 0;
        foreach ($fechas as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC015_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque_id_1->id_parque,
                        'incluye_parking' => $llevaVehiculo[$i]
                    ]
                ]
            ];
            $i++;
        }
        foreach ($fechas2 as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC015_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        foreach ($fechas3 as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC015_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque_id_3->id_parque,
                        'incluye_parking' => true
                    ]
                ]
            ];
        }
        foreach ($fechas4 as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC015_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque_id_4->id_parque,
                        'incluye_parking' => true
                    ]
                ]
            ];
        }

        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: $parque->parking->limite_vehiculos // N vehiculos
        );
        // foreach ($compra->pase as $pase) {
        //     echo "Pase ID: {$pase->id_pase}, Visitante: {$pase->visitante->nombre}, QR: {$pase->codigo_qr}\n";
        //     foreach ($pase->paseParque as $paseParque) {
        //         echo "PaseParque ID: {$paseParque->id_pase_parque}, Fecha: {$paseParque->fecha_acceso}, Incluye Parking: " . ($paseParque->incluye_parking ? 'Sí' : 'No') . "\n";
        //     }
        // }

        // // Imprimir la cantidad de vehículos del parque los días de $fechas
        // foreach ($fechas as $fechaCheck) {
        //     $vehiculos = Compra::join('pases', 'compras.id_compra', '=', 'pases.id_compra')
        //     ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
        //     ->where('pase_parques.fecha_acceso', $fechaCheck)
        //     ->where('pase_parques.id_parque', $parque->id_parque)
        //     ->where('pase_parques.incluye_parking', true)
        //     ->distinct()
        //     ->sum('compras.cant_vehiculos');
        //     echo "Fecha: $fechaCheck - Vehículos: $vehiculos\n";
        // }
        //*********************************************************************
        //TC016 - Comprar 1 pase para el dia 5 y volver a intentar con el mismo visitante
        //El visitante con CI 11223344 ya tiene un pase para el día 2025-05-25 en el parque 1.
        //Error al intentar comprar el pase nuevamente: El visitante con CI 11223344 ya tiene un pase para el día 2025-05-25 en el parque 1.
        //*********************************************************************
        // $parque = Parque::find(1);
        // $visitantes = [];
        // $fecha = now()->addDays(2)->toDateString();
        // $visitante = [
        //     [
        //         'nombre' => 'Visitante Único',
        //         'ci' => '11223344',
        //         'fechas' => [
        //             [
        //                 'fecha' => $fecha,
        //                 'id_parque' => $parque->id_parque,
        //                 'incluye_parking' => false
        //             ]
        //         ]
        //     ]
        // ];
        // // Primera compra
        // $compra = $this->crearCompraConPasesMultiples(
        //     visitantes: $visitante,
        //     cliente: $cliente,
        //     tarjeta: [
        //         'numero' => '1234567890123456',
        //         'vencimiento' => '2030-12-01',
        //         'cvv' => '123',
        //         'tipo' => 'D'
        //     ],
        //     cantVehiculos: 0
        // );
        // try {
        //     $compra2 = $this->crearCompraConPasesMultiples(
        //         visitantes: $visitante,
        //         cliente: $cliente,
        //         tarjeta: [
        //             'numero' => '1234567890123456',
        //             'vencimiento' => '2030-12-01',
        //             'cvv' => '123',
        //             'tipo' => 'D'
        //         ],
        //         cantVehiculos: 0
        //     );
        // } catch (\Exception $e) {
        //     echo "Error al intentar comprar el pase nuevamente: " . $e->getMessage() . "\n";
        // }

        //*********************************************************************
        //TC017 - Comprar 100 pases para el dia 29 y validar limite
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC017')->first();
        $parque = Parque::find(1);
        $visitantes = [];
        $fecha = now()->addDays(29)->toDateString();

        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC017_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0
        );

        //*********************************************************************

        //*********************************************************************
        //TC018 - Comprar 100 pases para el dia fin de mes de 2 meses conm MAX vehiculos y validar limite
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC018')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        $fecha = now()->addMonths(2)->endOfMonth()->toDateString();
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC018_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => true
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: $parque->parking->limite_vehiculos // N vehiculos
        );

        //*********************************************************************
        //DATOS 2024
        //**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************//**********************************************************************

        //***************CLIENTES, PASE, PASE_PARQUE_VISITANTES*********************** */
        // Solo insertar clientes para los casos de prueba TC001-TC025


        $clientes = [];
        $fecha = Carbon::parse('2024-01-01')->toDateString();
        for ($i = 1; $i <= 25; $i++) {
            $num = str_pad($i, 3, '0', STR_PAD_LEFT);
            $clientes[] = [
                'nombre' => "TC2024$num",
                'ci' => strval(rand(10000000, 99999999)),
                'email' => "tc2024$num@example.com",
            ];
        }

        foreach ($clientes as $cliente) {
            echo "Insertando cliente: {$cliente['nombre']}\n";
            $cli = new Cliente([
                'nombre' => $cliente['nombre'],
                'ci' => $cliente['ci'],
                'email' => $cliente['email'],
            ]);
            $cli->save();

            $sql = sprintf(
                "INSERT INTO clientes (id_cliente, nombre, ci, email) VALUES (%d, '%s', '%s', '%s');\n",
                $cli->id_cliente,
                addslashes($cli->nombre),
                addslashes($cli->ci),
                addslashes($cli->email),
            );
            echo $sql;
            file_put_contents($filePath, $sql, FILE_APPEND);
        }
        //Crear cliente HECHO
        //TC 001 - COMPRAR 1 PASE SIN VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC2024001')->first();
        $parque = Parque::find(1);


        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => strval(rand(10000000, 99999999)),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: $fecha
        );
        //*******************************************************************
        //TC 002 - COMPRAR 1 PASE CON VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC2024002')->first();
        $parque = Parque::find(1);
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => strval(rand(10000000, 99999999)),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 1,
            fecha_compra_2024: $fecha
        );
        //*******************************************************************
        //TC 003 - COMPRAR 2 PASES SIN VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC2024003')->first();
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: $fecha
        );
        //*******************************************************************
        //TC 004 - COMPRAR 2 PASES CON VEHICULO*******************************************************************
        $cliente = Cliente::where('nombre', 'TC2024004')->first();
        $fecha_v2 = Carbon::parse('2024-05-05')->toDateString();

        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha_v2,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha_v2,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ],
            cantVehiculos: 1,
            fecha_compra_2024: $fecha_v2
        );
        //*******************************************************************
        //TC 005 - COMPRAR 2 PASES CON 2 VEHICULOS*******************************************************************
        $cliente = Cliente::where('nombre', 'TC2024005')->first();
        //Crear cliente 2
        $cliente2 = Cliente::where('nombre', 'TC2024016')->first();
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' =>  rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha_v2,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => rand(10000000, 99999999),
                    'fechas' => [
                        [
                            'fecha' => $fecha_v2,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 2,
            fecha_compra_2024: Carbon::parse('2024-05-05')->toDateString(),
        );
        $compra2 = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 3',
                    'ci' => '12345679',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 4',
                    'ci' => '87654322',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente2,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 2,
            fecha_compra_2024: Carbon::parse('2024-05-05')->toDateString(),
        );

        //*******************************************************************
        //TC 006 - COMPRAR PASES LIMITES PARA EL PARQUE SELECCIONADO SIN VEHICULO FECHA 31   ********************************************************************************
        $fecha = Carbon::parse('2024-01-31')->toDateString();
        $cliente = Cliente::where('nombre', 'TC2024006')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC006_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }


        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: Carbon::parse('2024-01-31')->toDateString(),
        );
        $fecha = Carbon::parse('2024-01-31')->toDateString();
        //********************************************************************
        // TC 007 - COMPRAR 1 PASE CON 100 VEHICULOS
        //********************************************************************
        $parque = Parque::find(3);
        $cliente = Cliente::where('nombre', 'TC2024007')->first();
        $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => '12345678',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ],
            cantVehiculos: $parque->parking->limite_vehiculos,
            fecha_compra_2024: Carbon::parse('2024-01-01')->toDateString(),
        );
        //********************************************************************
        // TC 008 - COMPRAR 1 PASE PARA EL DIA DE MAÑANA
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024008')->first();
        $parque = Parque::find(4);
        $fechaManana = Carbon::parse('2024-01-02')->toDateString();

        //Agregar 5
        $compras = $this->crearCompraConPasesMultiples(
            visitantes: [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => '12345678',
                    'fechas' => [
                        [
                            'fecha' => $fecha,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ],
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ],
            cantVehiculos: 0,
            fecha_compra_2024: Carbon::parse('2024-01-02')->toDateString(),
        );

        //********************************************************************
        // TC009 - Comprar N pases para fin de mes y validar límite
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024009')->first();
        $fecha = Carbon::parse('2024-01-31')->toDateString();
        $parque = Parque::find(1);
        $visitantes = [];
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC009_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: Carbon::parse('2024-01-31')->toDateString(),
        );
        $fecha = Carbon::parse('2024-01-31')->addDay()->toDateString();

        //********************************************************************
        //TC011 - Comprar MAX pase para el dia mañana y MAX vehiculos y validar límite
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024011')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        $fechaManana = Carbon::parse('2024-01-02')->toDateString();
        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC011_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fechaManana,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => true
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: $parque->parking->limite_vehiculos,
            fecha_compra_2024: Carbon::parse('2024-01-02')->toDateString(),
        );

        //********************************************************************
        //TC012 - Comprar 1 pase para el dia 5,10,15,20
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024012')->first();
        $parque = Parque::find(3);
        $visitantes = [];
        $fechas = [
            Carbon::parse('2024-01-05')->toDateString(),
            Carbon::parse('2024-01-10')->toDateString(),
            Carbon::parse('2024-01-15')->toDateString(),
            Carbon::parse('2024-01-20')->toDateString()
        ];
        foreach ($fechas as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC012_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: Carbon::parse('2024-01-20')->toDateString(),
        );
        //********************************************************************
        //TC013 - Comprar MAX -1 pase para el dia 5,10,15,20 Y comprar 2 pases para el dia 20
        //********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024013')->first();
        $parque = Parque::find(4);
        $visitantes = [];
        $fecha5 = Carbon::parse('2024-01-05')->toDateString();
        $fecha10 = Carbon::parse('2024-01-10')->toDateString();
        $fecha15 = Carbon::parse('2024-01-15')->toDateString();
        $fecha20 = Carbon::parse('2024-01-20')->toDateString();
        $visitantes = [];
        for ($i = 0; $i < $parque->capacidad_maxima_diaria - 1; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'Visitante ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha5,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ],
                    [
                        'fecha' => $fecha10,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ],
                    [
                        'fecha' => $fecha15,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ],
                    [
                        'fecha' => $fecha20,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: Carbon::parse('2024-01-20')->toDateString(),
        );
        //*********************************************************************
        //TC014 - Comprar 1 pase para el dia 8,16,24,28 y 1 vehiculo  para el dia 5 y 20, pero no para el dia 10 y 15
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024014')->first();
        $parque = Parque::find(1);
        $visitantes = [];
        $fechas = [
            Carbon::parse('2024-01-08')->toDateString(),
            Carbon::parse('2024-01-16')->toDateString(),
            Carbon::parse('2024-01-24')->toDateString(),
            Carbon::parse('2024-01-28')->toDateString()
        ];
        $llevaVehiculo = [false, true, false, true];
        $i = 0;
        foreach ($fechas as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC014_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => $llevaVehiculo[$i]
                    ]
                ]
            ];
            $i++;
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 9,
            fecha_compra_2024: Carbon::parse('2024-01-05')->toDateString(),
        );

        //*********************************************************************
        //TC015 - Comprar 1 pase para el dia 3,6,9,12 y 100 vehiculos para el dia 20, pero NO para el dia 5,10,15
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024015')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        $fechas = [
            Carbon::parse('2024-01-03')->toDateString(),
            Carbon::parse('2024-01-06')->toDateString(),
            Carbon::parse('2024-01-09')->toDateString(),
            Carbon::parse('2024-01-12')->toDateString()
        ];
        $llevaVehiculo = [false, false, false, true];
        $i = 0;
        foreach ($fechas as $fecha) {
            $visitantes[] = [
                'nombre' => 'VisitanteTC015_  ' . $fecha,
                'ci' => str_pad((string)rand(10000000, 99999999), 8, '0', STR_PAD_LEFT),
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => $llevaVehiculo[$i]
                    ]
                ]
            ];
            $i++;
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: $parque->parking->limite_vehiculos,
            fecha_compra_2024: Carbon::parse('2024-01-03')->toDateString(),
        );

        //*********************************************************************
        //TC017 - Comprar 100 pases para el dia 29 y validar limite
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024017')->first();
        $parque = Parque::find(1);
        $visitantes = [];
        $fecha = Carbon::parse('2024-01-29')->toDateString();


        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC017_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => false
                    ]
                ]
            ];
        }
        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: 0,
            fecha_compra_2024: $fecha
        );

        //*********************************************************************

        //*********************************************************************
        //TC018 - Comprar 100 pases para el dia fin de mes de 2 meses conm MAX vehiculos y validar limite
        //*********************************************************************
        $cliente = Cliente::where('nombre', 'TC2024018')->first();
        $parque = Parque::find(2);
        $visitantes = [];
        $fecha = Carbon::parse('2024-03-31')->toDateString();

        for ($i = 0; $i < $parque->capacidad_maxima_diaria; $i++) {
            $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $visitantes[] = [
                'nombre' => 'VisitanteTC018_  ' . $ci,
                'ci' => $ci,
                'fechas' => [
                    [
                        'fecha' => $fecha,
                        'id_parque' => $parque->id_parque,
                        'incluye_parking' => true
                    ]
                ]
            ];
        }

        $compra = $this->crearCompraConPasesMultiples(
            visitantes: $visitantes,
            cliente: $cliente,
            tarjeta: [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ],
            cantVehiculos: $parque->parking->limite_vehiculos, // N vehiculos
            fecha_compra_2024: $fecha
        );



        // DB::rollBack();


        // $this->call([
        //     // UbicacionSeeder::class,
        //     // ParqueSeeder::class,
        //     // ParkingSeeder::class,
        //     // AtraccionesSeeder::class,
        //     // PrecioSeeder::class,
        //     // ClienteSeeder::class,
        //     // CompraSeeder::class,
        //     // VisitanteSeeder::class,
        //     // PaseSeeder::class,
        //     // PaseParqueSeeder::class,
        //     // UsaSeeder::class,
        //     // AccedeSeeder::class,

        //     //ANTES DE CREAR PASES (NO PODER USAR ATRACCIONES SIN PASE, NI ACCEDER A PARQUES SIN PASE)

        //     //Paso 1, crear 4 ubicaciones
        //     //*********************UBICACION*****************************/


        //     //Paso 2, crear 1 parque por cada ubicacion
        //     ParqueSeeder::class,
        //     //Paso 3, crear 1 parking por cada parque
        //     ParkingSeeder::class,
        //     //Paso 4, crear 2 precios para cada parque con precios diferentes en cada uno y que sea 1 precio para todo el año por parque
        //     PrecioSeeder::class,
        //     //Paso 5, crear 5 atracciones por parque
        //     //Paso 6, crear CLIENTES, PASES, PASE_PARQUE Y VISITANTES
        //     //************PARA EFECTUAR COMPRAS, EL CLIENTE ESPECIFICA**************
        //     //    La cantidad de visitantes que iran
        //     //    Los parques a los que se quiere acceder
        //     //    Las fechas de acceso del parque que seleccionaron (pueden ser varias y estar intercaladas)
        //     //    Si incluye parking o no
        //     //    El cliente puede comprar un pase para si mismo o para otra 0:N personas con 0:N vehiculos (es decir, si compro un pase para el dia 15 para el parque 2, puedo reservar 2 vehiculos para esa fecha y reservar 3 para otra fecha)
        //     //    Luego de especificar, se efectua el pago y se genera la compra guardando:
        //     //    La Compra en la tabla Compra
        //     //    El Pase en la tabla Pase
        //     //    La fecha de acceso en la tabla PaseFechaAcceso, donde especifico si incluye parking o no, la fecha y el id del parque
        //     //    NOTA: NO SE DEBE TOMAR INCLUYE_PARKING COMO LA CANTIDAD DE VEHICULOS, PORQUE 2 PERSONAS PUEDEN IR EN UN SOLO VEHICULO. PARA CONTAR ESO SE AGARRA DE LA CANTIDAD DE VEHICULOS QUE SE PASA EN LA COMPRA
        //     //************./PARA EFECTUAR COMPRAS, EL CLIENTE ESPECIFICA**************
        //     //**********INSERT CLIENTES SIN VEHICULOS*****************
        //     INSERTAR LOS DATOS DE LOS CASOS DE PRUEBAS
        //     //**********FIN INSERT CLIENTES CON VEHICULOS*****************/

        //     //FIN INSERT CLIENTES, PASES, PASE_PARQUE Y VISITANTES

        //     //Paso 7, INSERTAR de forma factory n la tabla accede (respetando la fecha, entrada / salida (es descir no puede haber 2 entradas sin salida y viceversa),
        //     //Paso 8, INSERTAR de forma factory n la tabla usa, respetando la fecha del aprque y la atraccion


        // ]);
    }


    private function crearCompraConPasesMultiples(array $visitantes, Cliente $cliente, array $tarjeta, int $cantVehiculos = 0, $fecha_compra_2024 = null): Compra
    {
        $filePath = storage_path('app/dml.sql');
        try {

            $totalMonto = 0;
            $seCobroParking = false;

            // Primero recorremos las fechas para calcular el total del monto
            $capacidadPorFecha = []; // Agrupamos las fechas

            $pasesAComprar = 0;
            foreach ($visitantes as $visitanteData) {
                $pasesAComprar += count($visitanteData['fechas']);
                foreach ($visitanteData['fechas'] as $infoFecha) {
                    $fecha = $infoFecha['fecha'];
                    $parqueId = $infoFecha['id_parque'];
                    $incluyeParking = $infoFecha['incluye_parking'] ?? false;
                    if ($incluyeParking && $cantVehiculos > 0) {
                        $parking = DB::table('parkings')->where('id_parque', $parqueId)->first();
                        if (!$parking) {
                            throw new \Exception("No hay parking definido para el Parque $parqueId.");
                        }

                        $vehiculosExistentes = Compra::join('pases', 'compras.id_compra', '=', 'pases.id_compra')
                            ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
                            ->where('pase_parques.fecha_acceso', $fecha)
                            ->where('pase_parques.id_parque', $parqueId)
                            ->distinct()
                            ->sum('compras.cant_vehiculos');

                        if (($vehiculosExistentes + $cantVehiculos) > $parking->limite_vehiculos) {
                            throw new \Exception("Capacidad de vehículos alcanzada en Parque $parqueId para $fecha.");
                        }

                        $seCobroParking = true;
                        $totalMonto += $parking->costo_adicional;
                    }

                    // Buscar precio correcto
                    $precio = Precio::where('fecha_inicio', '<=', $fecha)
                        ->where('fecha_fin', '>=', $fecha)
                        ->where('id_parque', $parqueId)
                        ->first();

                    if (!$precio) {
                        throw new \Exception("No hay precio definido para la fecha $fecha en el Parque $parqueId.");
                    }

                    $totalMonto += $precio->precio;

                    // Validar parking si aplica
                    if ($incluyeParking) {
                        $parking = DB::table('parkings')->where('id_parque', $parqueId)->first();
                        if (!$parking) {
                            throw new \Exception("No hay parking definido para el Parque $parqueId.");
                        }

                        $vehiculosExistentes = Compra::join('pases', 'compras.id_compra', '=', 'pases.id_compra')
                            ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
                            ->where('pase_parques.fecha_acceso', $fecha)
                            ->where('pase_parques.id_parque', $parqueId)
                            ->distinct()
                            ->sum('compras.cant_vehiculos');

                        if ($incluyeParking && !$seCobroParking && ($vehiculosExistentes + $cantVehiculos > $parking->limite_vehiculos)) {
                            throw new \Exception("Capacidad de vehículos alcanzada en Parque $parqueId para $fecha.");
                        }
                        $seCobroParking = true;
                        $totalMonto += $parking->costo_adicional;
                    }
                }
            }
            $capacidadPorFecha = []; // Agrupamos las fechas

            foreach ($visitantes as $visitanteData) {
                foreach ($visitanteData['fechas'] as $infoFecha) {
                    $fecha = $infoFecha['fecha'];
                    $parqueId = $infoFecha['id_parque'];

                    if (!isset($capacidadPorFecha[$fecha][$parqueId])) {
                        $capacidadPorFecha[$fecha][$parqueId] = 0;
                    }
                    $capacidadPorFecha[$fecha][$parqueId]++;
                }
            }

            // Ahora validamos por cada fecha-parque individual
            foreach ($capacidadPorFecha as $fecha => $parques) {
                foreach ($parques as $parqueId => $cantidadAComprar) {
                    $capacidad = Parque::find($parqueId)->capacidad_maxima_diaria;
                    $pasesReservados = PaseParque::where('fecha_acceso', $fecha)
                        ->where('id_parque', $parqueId)
                        ->count();

                    if ($pasesReservados + $cantidadAComprar > $capacidad) {
                        throw new \Exception("Capacidad de pases alcanzada en Parque $parqueId para $fecha.");
                    }
                }
            }

            // Crear la compra
            $compra = Compra::create([
                'id_cliente' => $cliente->id_cliente,
                'cant_vehiculos' => $cantVehiculos,
                'fecha_compra' => $fecha_compra_2024 ?? now()->format('Y-m-d'),
                'hora_compra' => now()->format('Y-m-d H:i:s'),
                'monto_total' => $totalMonto,
                'cant_pases' => count($visitantes),
                'debito_credito' => $tarjeta['tipo'],
                'numero_tarjeta' => $tarjeta['numero'],
                'fecha_vencimiento' => $tarjeta['vencimiento'],
                'cvv' => $tarjeta['cvv']
            ]);
            $sql_compra = sprintf(
                "INSERT INTO compras (id_compra, id_cliente, cant_vehiculos, fecha_compra, hora_compra, monto_total, cant_pases, debito_credito, numero_tarjeta, fecha_vencimiento, cvv) VALUES (%d, %d, %d, '%s', '%s', %d, %d, '%s', '%s', '%s', '%s');\n",
                $compra->id_compra,
                $compra->id_cliente,
                $compra->cant_vehiculos,
                $compra->fecha_compra,
                $compra->hora_compra,
                $compra->monto_total,
                $compra->cant_pases,
                $compra->debito_credito,
                addslashes($compra->numero_tarjeta),
                $compra->fecha_vencimiento,
                $compra->cvv
            );
            echo $sql_compra;
            file_put_contents($filePath, $sql_compra, FILE_APPEND);
            $pasesAgrupados = [];

            $pasesCreados = []; // Para guardar los pases y sus paseParques

            // Ahora creamos los visitantes y los pases
            foreach ($visitantes as $visitanteData) {
                //Si existe el visitante, no lo creamos
                $exist = Visitante::where('ci', $visitanteData['ci'])->first();
                if ($exist) {
                    $visitante = $exist;
                } else {
                    // Crear el visitante
                    $visitante = Visitante::create([
                        'nombre' => $visitanteData['nombre'],
                        'ci' => $visitanteData['ci'] ?? null
                    ]);
                    $sql_visitante = sprintf(
                        "INSERT INTO visitantes (id_visitante, nombre, ci) VALUES (%d, '%s', '%s');\n",
                        $visitante->id_visitante,
                        addslashes($visitante->nombre),
                        $visitante->ci
                    );
                    echo $sql_visitante;
                    file_put_contents($filePath, $sql_visitante, FILE_APPEND);
                }
                $precioTotal = array_reduce($visitanteData['fechas'], function ($carry, $infoFecha) {
                    $precio = Precio::where('fecha_inicio', '<=', $infoFecha['fecha'])
                        ->where('fecha_fin', '>=', $infoFecha['fecha'])
                        ->where('id_parque', $infoFecha['id_parque'])
                        ->first();
                    $total = $precio ? $precio->precio : 0;
                    if (!empty($infoFecha['incluye_parking'])) {
                        $parking = Parking::where('id_parque', $infoFecha['id_parque'])->first();
                        $total += $parking ? $parking->costo_adicional : 0;
                    }
                    return $carry + $total;
                }, 0);
                // Crear el pase

                $pase = Pase::create([
                    'id_visitante' => $visitante->id_visitante,
                    'id_compra' => $compra->id_compra,
                    'codigo_qr' => uniqid('qr_'),
                    'precio_total' => $precioTotal
                ]);
                $sql_pase = sprintf(
                    "INSERT INTO pases (id_pase, id_visitante, id_compra, precio_total, codigo_qr) VALUES (%d, %d, %d, %d, '%s');\n",
                    $pase->id_pase,
                    $pase->id_visitante,
                    $pase->id_compra,
                    $precioTotal, // ✅ este faltaba
                    addslashes($pase->codigo_qr)
                );


                echo $sql_pase;
                file_put_contents($filePath, $sql_pase, FILE_APPEND);

                $paseParquesCreados = [];

                foreach ($visitanteData['fechas'] as $infoFecha) {
                    $fecha = $infoFecha['fecha'];
                    $parqueId = $infoFecha['id_parque'];
                    $incluyeParking = $infoFecha['incluye_parking'] ?? false;

                    // Obtener nuevamente el precio para esta fecha/parque
                    $precio = Precio::where('fecha_inicio', '<=', $fecha)
                        ->where('fecha_fin', '>=', $fecha)
                        ->where('id_parque', $parqueId)
                        ->first();

                    if (!$precio) {
                        throw new \Exception("No hay precio definido para la fecha $fecha en el Parque $parqueId.");
                    }
                    // Validar si ya existe un pase para este visitante en esta fecha y parque
                    $yaExistePase = DB::table('pases')
                        ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
                        ->where('pases.id_visitante', $visitante->id_visitante)
                        ->where('pase_parques.id_parque', $parqueId)
                        ->where('pase_parques.fecha_acceso', $fecha)
                        ->exists();

                    if ($yaExistePase) {
                        throw new \Exception("El visitante con CI {$visitante->ci} ya tiene un pase para el día $fecha en el parque $parqueId.");
                    }

                    // Crear el pase_parque con id_precio incluido
                    $paseParque = PaseParque::create([
                        'id_pase' => $pase->id_pase,
                        'id_parque' => $parqueId,
                        'id_precio' => $precio->id_precio,
                        'fecha_acceso' => $fecha,
                        'incluye_parking' => $incluyeParking,
                    ]);

                    if (!$paseParque) {
                        throw new \Exception("No se pudo crear el PaseParque para el pase {$pase->id_pase}, parque $parqueId, fecha $fecha.");
                    }
                    $textoIncluyeParking = $incluyeParking ? 'true' : 'false';

                    $sql_pase_parque = sprintf(
                        "INSERT INTO pases_parques (id_pase_parque, id_pase, id_parque, id_precio, incluye_parking, fecha_acceso) VALUES (%d, %d, %d, %d, %s, '%s');\n",
                        $paseParque->id_pase_parque,
                        $pase->id_pase,
                        $parqueId,
                        $precio->id_precio,
                        $incluyeParking ? 'true' : 'false',
                        $fecha
                    );

                    echo $sql_pase_parque;
                    file_put_contents($filePath, $sql_pase_parque, FILE_APPEND);

                    $paseParquesCreados[] = $paseParque;
                }

                $pasesCreados[] = [
                    'pase' => $pase,
                    'paseParques' => $paseParquesCreados,
                ];
            }

            // =========================
            // Lógica de accesos (E/S) y usos (usas)
            // =========================
            $horaBase = now()->setTime(9, 0, 0);
            $atraccionesPorParque = [];

            foreach ($pasesCreados as $paseInfo) {
                $pase = $paseInfo['pase'];
                foreach ($paseInfo['paseParques'] as $paseParque) {
                    $fechaAcceso = $paseParque->fecha_acceso;
                    $horaAcceso = Carbon::parse($fechaAcceso)->setTime(rand(9, 10), rand(0, 59), 0);
                    $horaAcceso = $horaAcceso->format('Y-m-d H:i:s');
                    $horaBase = Carbon::parse($horaAcceso);
                    $horaBase->setTime(rand(9, 10), rand(0, 59), 0);
                    $horaBase->setTimezone('America/Montevideo');
                    $horaSalida = $horaBase->addMinutes(rand(1, 59))->format('Y-m-d H:i:s');
                    $parqueId = $paseParque->id_parque;

                    // ========= Accede ==========
                    //***************************ENTRADA***************************** */
                    DB::table('accedes')->insert([
                        'id_pase_parque' => $paseParque->id_pase_parque,
                        'id_parque' => $parqueId,
                        'fecha_accede' => $fechaAcceso,
                        'hora_accede' => $horaBase->format('Y-m-d H:i:s'),
                        'entrada_salida' => 'E',
                    ]);
                    $sql_accede = sprintf(
                        "INSERT INTO acceden (id_pase_parque, id_parque, fecha_accede, hora_accede, entrada_salida) VALUES (%d, %d, '%s', '%s', '%s');\n",
                        $paseParque->id_pase_parque,
                        $parqueId,
                        $fechaAcceso,
                        $horaBase->format('Y-m-d H:i:s'),
                        'E'
                    );

                    echo $sql_accede;
                    file_put_contents($filePath, $sql_accede, FILE_APPEND);
                    //***************************ENTRADA***************************** */

                    // ========= Usa ==========
                    // Cacheamos atracciones del parque si no lo hicimos
                    if (!isset($atraccionesPorParque[$parqueId])) {
                        $atraccionesPorParque[$parqueId] = DB::table('atracciones')
                            ->where('id_parque', $parqueId)
                            ->pluck('id_atraccion')
                            ->toArray();
                    }

                    $idAtraccion = $atraccionesPorParque[$parqueId][array_rand($atraccionesPorParque[$parqueId])];

                    $horaUso = $horaBase->copy()->addMinutes(rand(1, 59))->format('Y-m-d H:i:s');
                    $foto = uniqid('foto_');

                    //**************************USA**************************** */
                    DB::table('usas')->insert([
                        'id_pase' => $pase->id_pase,
                        'id_atraccion' => $idAtraccion,
                        'fecha_usa' => $fechaAcceso,
                        'hora_usa' => $horaUso,
                        'foto' => $foto,
                    ]);
                    $sql_usa = sprintf(
                        "INSERT INTO usan (id_pase, id_atraccion, fecha_usa, hora_usa, foto) VALUES (%d, %d, '%s', '%s', '%s');\n",
                        $pase->id_pase,
                        $idAtraccion,
                        $fechaAcceso,
                        $horaUso,
                        $foto
                    );
                    echo $sql_usa;
                    file_put_contents($filePath, $sql_usa, FILE_APPEND);
                    //**************************USA**************************** */

                    //****************************SALIDA***************************** */
                    $horaSalida = $horaBase->copy()->addHour()->format('Y-m-d H:i:s');
                    DB::table('accedes')->insert([
                        'id_pase_parque' => $paseParque->id_pase_parque,
                        'id_parque' => $parqueId,
                        'fecha_accede' => $fechaAcceso,
                        'hora_accede' => $horaSalida,
                        'entrada_salida' => 'S',
                    ]);
                    $sql_accede_salida = sprintf(
                        "INSERT INTO acceden (id_pase_parque, id_parque, fecha_accede, hora_accede, entrada_salida) VALUES (%d, %d, '%s', '%s', '%s');\n",
                        $paseParque->id_pase_parque,
                        $parqueId,
                        $fechaAcceso,
                        $horaBase->format('Y-m-d H:i:s'),
                        'S'
                    );

                    echo $sql_accede_salida;
                    file_put_contents($filePath, $sql_accede_salida, FILE_APPEND);
                    // Aumentamos la hora base para el siguiente acceso
                    $horaBase->addMinutes(rand(1, 59)); // Para que no queden todas iguales
                    //****************************SALIDA***************************** */
                }
            }

            return $compra;
        } catch (\Exception $e) {

            dump($e->getMessage());
            throw $e;
        }
    }
}
