<?php

namespace App\Console\Commands;

use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Parking;
use App\Models\Parque;
use App\Models\Pase;
use App\Models\PaseParque;
use App\Models\Precio;
use App\Models\Visitante;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCasesRunner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testcases:runner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $opcion = $this->choice(
            'Seleccione el caso de prueba a ejecutar',
            [
                'TC001 - Comprar 1 pase sin vehiculo', // X
                'TC002 - Comprar 1 pase con vehiculo', // X
                'TC003 - Comprar 2 pases sin vehiculo', // X
                'TC004 - Comprar 2 pases con vehiculo', // X
                'TC005 - Comprar 2 pases con 2 vehiculos cada uno', // X
                'TC006 - Comprar 100 pases y validar limite', // X
                'TC007 - Comprar 1 pase con 100 vehiculos y validar límite de los vehiculos', // X
                'TC008 - Comprar 1 pase para el dia de mañana', // X
                'TC009 - Comprar 100 pases para el dia de mañana y validar límite', // X
                'TC010 - Comprar 1 pase para el dia de mañana y 1 vehiculo', // X
                'TC011 - Comprar 1 pase para el dia de mañana y 100 vehiculos y validar límite', // X
                'TC012 - Comprar 1 pase para el dia 5,10,15,20', // X
                'TC013 - Comprar 99 pase para el dia 5,10,15,20 Y comprar 2 pases para el dia 20 y validar limite', // X
                'TC014 - Comprar 1 pase para el dia 5,10,15,20 y 1 vehiculo  para el dia 5 y 20, pero no para el dia 10 y 15', // X
                'TC015 - Comprar 1 pase para el dia 5,10,15,20 y 100 vehiculos para el dia 20 y validar limite', // X
                // 'TC16 - Comprar 1 pase para el dia de mañana con 100 estacionamientos reservados y validar límite', => ya existe en TC011
                // 'TC017 - Comprar 1 pase para los dias 15,16,20,21',
                // // 'TC018 - Comprar 99 pases para el dia 5,6,7 y validar límite',
                // 'TC019 - Comprar 1 pase para el dia 5,6,7 con reserva de 99 autos y validar límite',
                'TC020 - Comprar 1 pase par0a el dia 5 y volver a intentar con el mismo visitante', // X
                'TC021 - Comprar 1 pase para hoy y 1 para mañana', // X
                'TC022 - Comprar 2 pases para hoy y 2 para mañana', // X
                'TC023 - Comprar 100 pases para hoy y 100 para mañana y validar límites', // X
                'TC024 - Comprar 100 pases para hoy y 100 para mañana con 100 vehiculos y validar limites', // X
                'TC025 - 4 parques con precios independientes y 1 precio diferente por parque', // X
                'Query1',
                'Q2',
                'Q3',
                'Query4',
                'Q5',
                'Q6',
                'Q7',
                'Query5: Comprar 100 pases para 1 visitante',

                'Salir'
            ],
            0
        );

        switch ($opcion) {
            case 'TC001 - Comprar 1 pase sin vehiculo':
                $this->runTC001();
                // Implementar lógica para TC001
                break;
            case 'TC002 - Comprar 1 pase con vehiculo':
                $this->runTC002();
                // Implementar lógica para TC002
                break;
            case 'TC003 - Comprar 2 pases sin vehiculo':
                $this->runTC003();
                // Implementar lógica para TC003
                break;
            case 'TC004 - Comprar 2 pases con vehiculo':
                $this->runTC004();
                // Implementar lógica para TC004
                break;
            case 'TC005 - Comprar 2 pases con 2 vehiculos cada uno':
                $this->runTC005();
                // Implementar lógica para TC005
                break;
            case 'TC006 - Comprar 100 pases y validar limite':
                $this->runTC006();
                break;
            case 'TC007 - Comprar 1 pase con 100 vehiculos y validar límite de los vehiculos':
                $this->runTC007();
                // Implementar lógica para TC007
                break;
            case 'TC008 - Comprar 1 pase para el dia de mañana':
                $this->runTC008();
                // Implementar lógica para TC008
                break;
            case 'TC009 - Comprar 100 pases para el dia de mañana y validar límite':
                $this->runTC009();
                // Implementar lógica para TC009
                break;
            case 'TC010 - Comprar 1 pase para el dia de mañana y 1 vehiculo':
                $this->runTC010();
                // Implementar lógica para TC010
                break;
            case 'TC011 - Comprar 1 pase para el dia de mañana y 100 vehiculos y validar límite':
                $this->runTC011();
                // Implementar lógica para TC011
                break;
            case 'TC012 - Comprar 1 pase para el dia 5,10,15,20':
                $this->runTC012();
                // Implementar lógica para TC012
                break;
            case 'TC013 - Comprar 99 pase para el dia 5,10,15,20 Y comprar 2 pases para el dia 20 y validar limite':
                $this->runTC013();
                break;
            case 'TC014 - Comprar 1 pase para el dia 5,10,15,20 y 1 vehiculo  para el dia 5 y 20, pero no para el dia 10 y 15':
                $this->runTC014();
                // Implementar lógica para TC014
                break;
            case 'TC015 - Comprar 1 pase para el dia 5,10,15,20 y 100 vehiculos para el dia 20 y validar limite':
                $this->runTC015();
                // Implementar lógica para TC015
                break;
            // case 'TC016 - Comprar 1 pase para el dia de mañana con 100 estacionamientos reservados y validar límite':
            //     $this->info('Ejecutando TC016...');
            //     // Implementar lógica para TC016
            //     break;
            // case 'TC017 - Comprar 1 pase para los dias 15,16,20,21':
            //     $this->info('Ejecutando TC017...');
            //     // Implementar lógica para TC017
            //     break;
            // case 'TC018 - Comprar 99 pases para el dia 5,6,7 y validar límite':
            //     $this->info('Ejecutando TC018...');
            //     // Implementar lógica para TC018
            //     break;
            // case 'TC019 - Comprar 1 pase para el dia 5,6,7 con reserva de 99 autos y validar límite':
            //     $this->info('Ejecutando TC019...');
            //     // Implementar lógica para TC019
            //     break;
            case 'TC020 - Comprar 1 pase para el dia 5 y volver a intentar con el mismo visitante':
                $this->runTC020();
                // Implementar lógica para TC020
                break;
            case 'TC021 - Comprar 1 pase para hoy y 1 para mañana':
                $this->runTC021();
                break;
            case 'TC022 - Comprar 2 pases para hoy y 2 para mañana':
                $this->runTC022();
                break;
            case 'TC023 - Comprar 100 pases para hoy y 100 para mañana y validar límites':
                $this->runTC023();
                break;
            case 'TC024 - Comprar 100 pases para hoy y 100 para mañana con 100 vehiculos y validar limites':
                $this->runTC024();
                break;
            case 'TC025 - 4 parques con precios independientes y 1 precio diferente por parque':
                $this->runTC025();
                break;
            case 'Query1':
                $this->top3EntretenimientosMasUtilizados('2025-01-01', '2025-10-31');
                break;
            case 'Query4':
                $this->query4();
                break;
            case 'Query5: Comprar 100 pases para 1 visitante':
                $this->query5();
                break;
            case 'Salir':
                $this->info('Saliendo.');
                return;
        }
    }

    // TC 001 - Comprar 1 pase sin vehiculo
    private function runTC001()
    {
        DB::beginTransaction();

        try {

            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $compra = $this->crearCompraConPasesMultiples(
                visitantes: [
                    [
                        'nombre' => 'Visitante Único',
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
                    'tipo' => 'D' // Débito
                ],
                cantVehiculos: 0
            );

            $this->info("TC001: OK - Compra realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);
            $this->imprimirCompra($compra);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    // TC 002 - Comprar 1 pase con  1 vehiculo
    private function runTC002()
    {
        DB::beginTransaction();

        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);

            $compra = $this->crearCompraConPasesMultiples(
                visitantes: [
                    [
                        'nombre' => 'Visitante Único',
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
                    'tipo' => 'D' // Débito
                ],
                cantVehiculos: 1
            );
            $this->info(string: "TC002: OK - Compra realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    // TC 003 - Comprar 2 pases sin vehiculo
    private function runTC003()
    {
        DB::beginTransaction();
        echo "Ejecutando TC003...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $compra = $this->crearCompraConPasesMultiples(
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
                    ],
                    [
                        'nombre' => 'Visitante 2',
                        'ci' => '87654321',
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
            echo "Pases creados\n";
            $this->info("TC003: OK - Compra de 2 pases realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);

            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    // TC 004 - Comprar 2 pases con  1 vehiculo
    private function runTC004()
    {
        DB::beginTransaction();
        echo "Ejecutando TC004...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();

            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $compra = $this->crearCompraConPasesMultiples(
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
                    ],
                    [
                        'nombre' => 'Visitante 2',
                        'ci' => '87654321',
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

            echo "Pases creados\n";
            $this->info("TC004: OK - Compra de 2 pases con vehiculo realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    // TC 005 - Comprar 2 pases con 2 vehiculos
    private function runTC005()
    {
        DB::beginTransaction();
        echo "Ejecutando TC005...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente 1 creado\n";
            $cliente2 = Cliente::create(['nombre' => 'Cliente 2', 'email' => 'email2@gmail.com', 'ci' => '55794622']);
            echo "Cliente 2 creado\n";
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $compra = $this->crearCompraConPasesMultiples(
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
                    ],
                    [
                        'nombre' => 'Visitante 2',
                        'ci' => '87654321',
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
            echo "Pases(2) 1 creado\n";
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
            echo "Pases(2) 2 creado\n";
            $this->info("TC005: OK - Compra de 2 pases con 2 vehiculos realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    //TC006 - Comprar 100 pases y romper el limite del parque
    private function runTC006()
    {
        DB::beginTransaction();
        $fecha = now()->addDay()->toDateString();
        Precio::create([
            'precio' => 251,
            'id_parque' => 1,
            'fecha_inicio' => $fecha,
            'fecha_fin' => now()->addDays(10)->toDateString()
        ]);
        echo "Ejecutando TC006...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $visitantes = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
                $visitantes[] = [
                    'nombre' => 'Visitante ' . $ci,
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
            echo "Pases creados\n";
            $this->info("TC006: OK - Compra de 100 pases realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);
            $this->imprimirCompra($compra);

            $this->info("******* ROMPER CASO************.");
            //Total de pases el dia 22
            $totalPases = PaseParque::where('fecha_acceso', $fecha)
                ->where('id_parque', $parque->id_parque)
                ->count();
            $this->info("Total de pases el dia 22: " . $totalPases);
            $compra = $this->crearCompraConPasesMultiples(
                visitantes: [
                    [
                        'nombre' => 'Visitante roto',
                        'ci' => '99887766',
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
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Limite de parque alcanzado: " . $e->getMessage());
        }
    }


    // TC 007 - Comprar 1 pase con 100 vehiculos y validar límite de los vehiculos
    private function runTC007()
    {
        DB::beginTransaction();
        echo "Ejecutando TC007...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
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
                cantVehiculos: 100
            );
            echo "Pases(1) creados\n";
            //Imprimir los vehiculos reservados
            $this->info("Vehiculos reservados: " . $this->getVehiculosReservados($parque->id_parque, $fecha));
            //Ahora los disponibles
            $this->info("Vehiculos disponibles: " . ($this->getCapacidadVehiculos($parque->id_parque) - $this->getVehiculosReservados($parque->id_parque, $fecha)));
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante 2',
                            'ci' => '87654321',
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
                    cantVehiculos: 1
                );
                $this->info("TC007: ERROR NO DETECTADO, se permitió el 101º vehiculo.");
            } catch (\Exception $e) {
                $this->error("TC007: OK - No se permitió exceder el cupo de vehículos. " . $e->getMessage());
            }
            echo "Pases creados\n";
            $this->info("TC007: OK - Compra de 1 pase con 100 vehiculos + romper el limite con exito.");
            $this->imprimirDatos($parque, $fecha);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    //TC008 - Comprar 1 pase para el dia de mañana
    private function runTC008()
    {
        DB::beginTransaction();
        echo "Ejecutando TC008...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fecha,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);

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
            echo "Pases creados\n";
            $pase = Pase::where('id_compra', $compras->id_compra)->first();
            $fechaDePase = PaseParque::where('id_parque', $parque->id_parque)->where('fecha_acceso', $fecha)->where('id_pase', $pase->id_pase)->first();

            echo "Fecha del pase" . $fechaDePase->fecha_acceso . "\n";


            $this->info("TC008: OK - Compra de 1 pase para el dia de mañana realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);

            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha);


            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    //TC009 - Comprar 100 pases para el dia de mañana y validar límite
    private function runTC009()
    {
        DB::beginTransaction();

        echo "Ejecutando TC009...\n";
        try {
            $cliente1 = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente 1 creado\n";
            $cliente2 = Cliente::create(['nombre' => 'Cliente 2', 'email' => 'email2@gmail.com', 'ci' => '55794622']);
            echo "Cliente 2 creado\n";
            $parque = Parque::find(1);
            $fechaManana = now()->addDay()->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaManana,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $visitantes = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
                $visitantes[] = [
                    'nombre' => 'Visitante ' . $ci,
                    'ci' => $ci,
                    'fechas' => [
                        [
                            'fecha' => $fechaManana,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ];
            }


            $compra = $this->crearCompraConPasesMultiples(
                visitantes: $visitantes,
                cliente: $cliente1,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D' // Débito
                ],
                cantVehiculos: 0
            );
            $this->info("Pases creados para el dia de mañana\n");
            $this->imprimirDatos($parque, $fechaManana);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaManana);
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante 2',
                            'ci' => '87654321',
                            'fechas' => [
                                [
                                    'fecha' => $fechaManana,
                                    'id_parque' => $parque->id_parque,
                                    'incluye_parking' => false
                                ]
                            ]
                        ]
                    ],
                    cliente: $cliente2,
                    tarjeta: [
                        'numero' => '1234567890123456',
                        'vencimiento' => '2030-12-01',
                        'cvv' => '123',
                        'tipo' => 'D'
                    ],
                    cantVehiculos: 0
                );
                $this->info("TC009: ERROR NO DETECTADO, se permitió el 101º pase.");
            } catch (\Exception $e) {
                $this->error("TC009: OK - No se permitió exceder el cupo. " . $e->getMessage());
            }
            $this->info("TC009: OK - Compra de 100 pases para el dia de mañana realizada con éxito.");
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    //TC010 - Comprar 1 pase para el dia de mañana y 1 vehiculo

    private function runTC010()
    {
        DB::beginTransaction();
        echo "Ejecutando TC010...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            Precio::create([
                'precio' => 251,
                'id_parque' => 1,
                'fecha_inicio' => now()->addDay()->toDateString(),
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $parque = Parque::find(1);
            $fecha = now()->addDay()->toDateString();

            $compra = $this->crearCompraConPasesMultiples(
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
                cantVehiculos: 1
            );
            //Imprimir los vehiculos reservados de hoy
            // $hoy = now()->toDateString();
            // $pases[2] = $this->crearCompraConPase($cliente, parqueId: $parque->id_parque, $hoy, false, 0, 1);
            //Mostrar los pases agrupados por fecha
            $this->info("TC010: OK - Compra de 1 pase para el dia de mañana y 1 vehiculo realizada con éxito.");
            $this->imprimirDatos($parque, $fecha);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha);
            $fechaHoy = now()->toDateString();
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaHoy);

            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    //TC011 - Comprar 1 pase para el dia de mañana y 100 vehiculos y validar límite
    private function runTC011()
    {
        DB::beginTransaction();
        echo "Ejecutando TC011...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fechaManana = now()->addDay()->toDateString();
            $precio = Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaManana,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);
            $compra = $this->crearCompraConPasesMultiples(
                visitantes: [
                    [
                        'nombre' => 'Visitante 1',
                        'ci' => '12345678',
                        'fechas' => [
                            [
                                'fecha' => $fechaManana,
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
                cantVehiculos: 100
            );
            echo "Pases(1) creados\n";
            //Imprimir los vehiculos reservados
            $this->info("Vehiculos reservados: " . $this->getVehiculosReservados($parque->id_parque, $fechaManana));
            //Ahora los disponibles
            $this->info("Vehiculos disponibles: " . ($this->getCapacidadVehiculos($parque->id_parque) - $this->getVehiculosReservados($parque->id_parque, $fechaManana)));
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante 2',
                            'ci' => '87654321',
                            'fechas' => [
                                [
                                    'fecha' => $fechaManana,
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
                    cantVehiculos: 1
                );
                $this->error("TC011: ERROR NO DETECTADO, se permitió el 101º vehiculo.");
            } catch (\Exception $e) {
                $this->error("TC011: OK - No se permitió exceder el cupo de vehículos. " . $e->getMessage());
            }
            echo "Pases creados\n";
            $this->info("TC011: OK - Compra de 1 pase para el dia de mañana y 100 vehiculos realizada
            con éxito.");
            $this->imprimirDatos($parque, $fechaManana);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaManana);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    private function runTC012()
    {
        DB::beginTransaction();
        echo "Ejecutando TC012...\n";
        try {
            // Crear cliente
            $cliente = Cliente::create([
                'nombre' => 'Cliente 1',
                'email' => 'email@gmail.com',
                'ci' => '55794621'
            ]);
            echo "Cliente creado\n";

            // Fechas de prueba
            $fechas = [
                ['fecha' => now()->addDays(5)->toDateString(),  'id_parque' => 1, 'incluye_parking' => false],
                ['fecha' => now()->addDays(10)->toDateString(), 'id_parque' => 1, 'incluye_parking' => false],
                ['fecha' => now()->addDays(15)->toDateString(), 'id_parque' => 1, 'incluye_parking' => false],
                ['fecha' => now()->addDays(20)->toDateString(), 'id_parque' => 1, 'incluye_parking' => false],
            ];
            Precio::create([
                'precio' => 251,
                'id_parque' => 1,
                'fecha_inicio' => now()->addDays(1)->toDateString(),
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);
            // Datos de tarjeta ficticios
            $tarjeta = [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D' // Débito
            ];

            // Llamar al método nuevo
            $this->crearCompraConPasesMultiples([
                [
                    'nombre' => 'Visitante Único',
                    'ci' => '11223344',
                    'fechas' => $fechas
                ]
            ], $cliente, $tarjeta, 0); // 0 vehículos

            //Mostrar datos por fecha
            $parque = Parque::find(1);
            foreach ($fechas as $fecha) {
                $this->imprimirDatos($parque, $fecha['fecha']);
                $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha['fecha']);
            }
            DB::rollBack(); // Evitar que se graben los datos
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    // 'TC013 - Comprar 100 pase para el dia 5,10,15,20 Y comprar 1 pases para el dia 5 y validar limite',
    private function runTC013()
    {
        DB::beginTransaction();
        echo "Ejecutando TC013...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fecha5 = now()->addDays(5)->toDateString();
            $fecha10 = now()->addDays(10)->toDateString();
            $fecha15 = now()->addDays(15)->toDateString();
            $fecha20 = now()->addDays(20)->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);
            $visitantes = [];
            for ($i = 0; $i < 100; $i++) {
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
            echo "Pases creados\n";
            $this->info("Pases creados para el dia 5,10,15,20\n");
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha5);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha10);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha15);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha20);


            // Ahora comprar 1 pase para el dia 20
            try {

                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante 1',
                            'ci' => '12345678',
                            'fechas' => [
                                [
                                    'fecha' => $fecha10,
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
                $this->error("TC013: ERROR NO DETECTADO, se permitió el 101º pase.");
            } catch (\Exception $e) {
                $this->info("TC013: OK - Compra de 100 pases para el dia 5,10,15,20 y 1 pase que rompe el limite para el dia 5 realizada con éxito.");
            }
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    //TC014 - Comprar 1 pase para el dia 5,10,15,20 y 1 vehiculo  para el dia 5 y 20, pero no para el dia 10 y 15
    private function runTC014()
    {
        DB::beginTransaction();
        echo "Ejecutando TC014...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fecha5 = now()->addDays(5)->toDateString();
            $fecha10 = now()->addDays(10)->toDateString();
            $fecha15 = now()->addDays(15)->toDateString();
            $fecha20 = now()->addDays(20)->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);
            $visitantes = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
                $visitantes[] = [
                    'nombre' => 'Visitante ' . $ci,
                    'ci' => $ci,
                    'fechas' => [
                        [
                            'fecha' => $fecha5,
                            'id_parque' => $parque->id_parque, // 10 peso => id_precio pase_parque
                            'incluye_parking' => true
                        ],
                        [
                            'fecha' => $fecha10,
                            'id_parque' => $parque->id_parque, // 5 peso  => id_precio pase_parque
                            'incluye_parking' => false
                        ],
                        [
                            'fecha' => $fecha15,
                            'id_parque' => $parque->id_parque, // 5 peso  => id_precio pase_parque
                            'incluye_parking' => false
                        ],
                        [
                            'fecha' => $fecha20,
                            'id_parque' => $parque->id_parque, // 50 peso => id_precio pase_parque
                            'incluye_parking' => true
                        ]
                        // subtotal => 10 + 5 + 5 + 50 = 70 => subtotal en pase
                        // total => 70 * 1.21 = 84.7 => total en compra

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
                cantVehiculos: 1
            );
            echo "Pases creados\n";
            $this->info("Pases creados para el dia 5,10,15,20\n");
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha5);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha10);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha15);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha20);


            // Ahora comprar 1 pase para el dia 20
            try {

                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante 1',
                            'ci' => '12345678',
                            'fechas' => [
                                [
                                    'fecha' => $fecha10,
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
                    cantVehiculos: 1
                );
                $this->error("TC013: ERROR NO DETECTADO, se permitió el 101º pase.");
            } catch (\Exception $e) {
                $this->info("TC013: OK - Compra de 100 pases para el dia 5,10,15,20 y 1 pase que rompe el limite para el dia 5 realizada con éxito.");
            }
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }


    //TC015 - Comprar 1 pase para el dia 5,10,15,20 y 100 vehiculos para el dia 20 y validar limite
    // TC015 - Comprar 1 pase para el dia 5,10,15,20 y 100 vehiculos para el dia 20 y validar limite
    private function runTC015()
    {
        DB::beginTransaction();
        echo "Ejecutando TC015...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fecha5 = now()->addDays(5)->toDateString();
            $fecha10 = now()->addDays(10)->toDateString();
            $fecha15 = now()->addDays(15)->toDateString();
            $fecha20 = now()->addDays(20)->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);

            // Un visitante, 4 fechas, solo el día 20 con parking
            $visitantes = [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => '11223344',
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
                            'incluye_parking' => true // Solo el día 20 con parking
                        ]
                    ]
                ]
            ];

            // Realizar la compra con 100 vehículos SOLO para el día 20
            $compra = $this->crearCompraConPasesMultiples(
                visitantes: $visitantes,
                cliente: $cliente,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D'
                ],
                cantVehiculos: 100
            );
            echo "Pase creado\n";
            $this->info("Pase creado para los días 5,10,15,20 (100 vehículos solo para el día 20)\n");
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha5);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha10);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha15);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha20);

            // Intentar romper el límite de vehículos para el día 20
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante Exceso',
                            'ci' => '99887766',
                            'fechas' => [
                                [
                                    'fecha' => $fecha20,
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
                    cantVehiculos: 1
                );
                $this->error("TC015: ERROR NO DETECTADO, se permitió el 101º vehículo para el día 20.");
            } catch (\Exception $e) {
                $this->info("TC015: OK - No se permitió exceder el cupo de vehículos para el día 20. " . $e->getMessage());
            }
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    // 'TC020 - Comprar 1 pase para el dia 5 y volver a intentar con el mismo visitante',

    // TC020 - Comprar 1 pase para el dia 5 y volver a intentar con el mismo visitante
    private function runTC020()
    {
        DB::beginTransaction();
        echo "Ejecutando TC020...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fecha5 = now()->addDays(5)->toDateString();
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => now()->toDateString(),
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);

            $visitante = [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => '11223344',
                    'fechas' => [
                        [
                            'fecha' => $fecha5,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ];

            // Primera compra
            $compra1 = $this->crearCompraConPasesMultiples(
                visitantes: $visitante,
                cliente: $cliente,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D'
                ],
                cantVehiculos: 0
            );
            $this->info("TC020: OK - Primer pase comprado para el día 5.");

            // Intentar comprar de nuevo para el mismo visitante y fecha
            try {
                $compra2 = $this->crearCompraConPasesMultiples(
                    visitantes: $visitante,
                    cliente: $cliente,
                    tarjeta: [
                        'numero' => '1234567890123456',
                        'vencimiento' => '2030-12-01',
                        'cvv' => '123',
                        'tipo' => 'D'
                    ],
                    cantVehiculos: 0
                );
                $this->error("TC020: ERROR - Se permitió comprar dos veces el mismo pase para el mismo visitante y fecha.");
            } catch (\Exception $e) {
                $this->info("TC020: OK - No se permitió comprar dos veces el mismo pase para el mismo visitante y fecha. " . $e->getMessage());
            }

            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fecha5);

            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    //TC021 - Comprar 1 pase para hoy y 1 para mañana (usando la función nueva)
    private function runTC021()
    {
        DB::beginTransaction();
        echo "Ejecutando TC021...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fechaManana = now()->addDay()->toDateString();

            // Crear precios para ambas fechas si no existen
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);

            $visitantes = [
                [
                    'nombre' => 'Visitante Único',
                    'ci' => '12345678',
                    'fechas' => [
                        [
                            'fecha' => $fechaHoy,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ],
                        [
                            'fecha' => $fechaManana,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ];

            $tarjeta = [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ];

            $this->crearCompraConPasesMultiples($visitantes, $cliente, $tarjeta, 0);

            //Mostrar los pases agrupados por fecha
            $this->info("Pases disponibles para hoy: " . ($this->getCapacidad($parque->id_parque) - $this->getPasesReservados($parque->id_parque, $fechaHoy)));
            $this->info("Pases reservados para hoy: " . $this->getPasesReservados($parque->id_parque, $fechaHoy));
            $this->info("Pases creados para hoy y mañana\n");
            $this->info("TC021: OK - Compra de 1 pase para hoy y 1 para mañana realizada con éxito.");
            $this->imprimirDatos($parque, $fechaHoy);
            $this->imprimirDatos($parque, $fechaManana);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaHoy);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaManana);

            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    //TC022 - Comprar 2 pases para hoy y 2 para mañana
    private function runTC022()
    {
        DB::beginTransaction();
        echo "Ejecutando TC022...\n";
        try {
            $cliente = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente creado\n";
            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fechaManana = now()->addDay()->toDateString();

            // Crear precios para ambas fechas si no existen
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);

            $visitantes = [
                [
                    'nombre' => 'Visitante 1',
                    'ci' => '12345678',
                    'fechas' => [
                        [
                            'fecha' => $fechaHoy,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ],
                        [
                            'fecha' => $fechaManana,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante 2',
                    'ci' => '87654321',
                    'fechas' => [
                        [
                            'fecha' => $fechaHoy,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ],
                        [
                            'fecha' => $fechaManana,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ];

            $tarjeta = [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ];

            $this->crearCompraConPasesMultiples($visitantes, $cliente, $tarjeta, 0);

            $this->info("Pases creados para hoy y mañana\n");
            $this->info("TC022: OK - Compra de 2 pases para hoy y 2 para mañana realizada con éxito.");

            $this->imprimirDatos($parque, $fechaHoy);
            $this->imprimirDatos($parque, $fechaManana);

            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaHoy);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaManana);

            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    //TC023 - Comprar 100 pases para hoy y 100 para mañana y validar límites
    private function runTC023()
    {
        DB::beginTransaction();
        echo "Ejecutando TC023...\n";
        try {
            $cliente1 = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente 1 creado\n";
            $cliente2 = Cliente::create(['nombre' => 'Cliente 2', 'email' => 'email2@gmail.com', 'ci' => '55794622']);
            echo "Cliente 2 creado\n";
            $cliente3 = Cliente::create(['nombre' => 'Cliente 3', 'email' => 'email3@gmail.com', 'ci' => '55794623']);
            echo "Cliente 3 creado\n";

            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fechaManana = now()->addDay()->toDateString();

            // Crear precios para ambas fechas si no existen
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);

            // 100 pases para hoy
            $visitantesHoy = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
                $visitantesHoy[] = [
                    'nombre' => 'Visitante ' . $ci,
                    'ci' => $ci,
                    'fechas' => [
                        [
                            'fecha' => $fechaHoy,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ];
            }
            $this->crearCompraConPasesMultiples(
                visitantes: $visitantesHoy,
                cliente: $cliente1,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D'
                ],
                cantVehiculos: 0
            );

            // 100 pases para mañana
            $visitantesManana = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)($i + 100), 8, '0', STR_PAD_LEFT);
                $visitantesManana[] = [
                    'nombre' => 'Visitante ' . $ci,
                    'ci' => $ci,
                    'fechas' => [
                        [
                            'fecha' => $fechaManana,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ];
            }
            $this->crearCompraConPasesMultiples(
                visitantes: $visitantesManana,
                cliente: $cliente2,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D'
                ],
                cantVehiculos: 0
            );

            $this->info("Pases creados para hoy y mañana\n");

            //Mostrar los pases reservados para hoy y mañana
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaHoy);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaManana);

            $this->info("Rompiendo el límite de 100 pases");
            // Intentar romper el límite para hoy
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante Exceso Hoy',
                            'ci' => '99999999',
                            'fechas' => [
                                [
                                    'fecha' => $fechaHoy,
                                    'id_parque' => $parque->id_parque,
                                    'incluye_parking' => false
                                ]
                            ]
                        ]
                    ],
                    cliente: $cliente3,
                    tarjeta: [
                        'numero' => '1234567890123456',
                        'vencimiento' => '2030-12-01',
                        'cvv' => '123',
                        'tipo' => 'D'
                    ],
                    cantVehiculos: 0
                );
                $this->error("TC023: ERROR - Se permitió exceder el límite de pases para hoy.");
            } catch (\Exception $e) {
                $this->info("TC023: OK - No se permitió exceder el límite para hoy. " . $e->getMessage());
            }
            // Intentar romper el límite para mañana
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante Exceso Mañana',
                            'ci' => '99999998',
                            'fechas' => [
                                [
                                    'fecha' => $fechaManana,
                                    'id_parque' => $parque->id_parque,
                                    'incluye_parking' => false
                                ]
                            ]
                        ]
                    ],
                    cliente: $cliente3,
                    tarjeta: [
                        'numero' => '1234567890123456',
                        'vencimiento' => '2030-12-01',
                        'cvv' => '123',
                        'tipo' => 'D'
                    ],
                    cantVehiculos: 0
                );
                $this->error("TC023: ERROR - Se permitió exceder el límite de pases para mañana.");
            } catch (\Exception $e) {
                $this->info("TC023: OK - No se permitió exceder el límite para mañana. " . $e->getMessage());
            }

            $this->info("TC023: OK - Compra de 100 pases para hoy y 100 para mañana realizada con éxito.");
            $this->imprimirDatos($parque, $fechaHoy);
            $this->imprimirDatos($parque, $fechaManana);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Caso OK - Error esperado: " . $e->getMessage());
        }
    }
    //TC024 - Comprar 100 pases para hoy y 100 para mañana con 100 vehiculos y validar limites
    private function runTC024()
    {
        DB::beginTransaction();
        echo "Ejecutando TC024...\n";
        try {
            $cliente1 = Cliente::create(['nombre' => 'Cliente 1', 'email' => 'email@gmail.com', 'ci' => '55794621']);
            echo "Cliente 1 creado\n";
            $cliente2 = Cliente::create(['nombre' => 'Cliente 2', 'email' => 'email2@gmail.com', 'ci' => '55794622']);
            echo "Cliente 2 creado\n";
            $cliente3 = Cliente::create(['nombre' => 'Cliente 3', 'email' => 'email3@gmail.com', 'ci' => '55794623']);
            echo "Cliente 3 creado\n";

            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();
            $fechaManana = now()->addDay()->toDateString();

            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(10)->toDateString()
            ]);

            // 100 pases para hoy con 100 vehículos
            $visitantesHoy = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)$i, 8, '0', STR_PAD_LEFT);
                $visitantesHoy[] = [
                    'nombre' => 'Visitante ' . $ci,
                    'ci' => $ci,
                    'fechas' => [
                        [
                            'fecha' => $fechaHoy,
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => true
                        ]
                    ]
                ];
            }
            $this->crearCompraConPasesMultiples(
                visitantes: $visitantesHoy,
                cliente: $cliente1,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D'
                ],
                cantVehiculos: 100
            );
            $this->info("Pases creados para hoy con 100 vehículos.");

            // 100 pases para mañana con 100 vehículos
            $visitantesManana = [];
            for ($i = 0; $i < 100; $i++) {
                $ci = str_pad((string)($i + 100), 8, '0', STR_PAD_LEFT);
                $visitantesManana[] = [
                    'nombre' => 'Visitante ' . $ci,
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
            $this->crearCompraConPasesMultiples(
                visitantes: $visitantesManana,
                cliente: $cliente2,
                tarjeta: [
                    'numero' => '1234567890123456',
                    'vencimiento' => '2030-12-01',
                    'cvv' => '123',
                    'tipo' => 'D'
                ],
                cantVehiculos: 100
            );
            $this->info("Pases creados para mañana con 100 vehículos.");

            // Mostrar los pases y vehículos reservados/disponibles
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaHoy);
            $this->mostrarPasesEnFechaDisponiblesYResservados($parque->id_parque, $fechaManana);

            // Intentar romper el límite para hoy
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante Exceso Hoy',
                            'ci' => '99999999',
                            'fechas' => [
                                [
                                    'fecha' => $fechaHoy,
                                    'id_parque' => $parque->id_parque,
                                    'incluye_parking' => true
                                ]
                            ]
                        ]
                    ],
                    cliente: $cliente3,
                    tarjeta: [
                        'numero' => '1234567890123456',
                        'vencimiento' => '2030-12-01',
                        'cvv' => '123',
                        'tipo' => 'D'
                    ],
                    cantVehiculos: 1
                );
                $this->error("TC024: ERROR - Se permitió exceder el límite de vehículos/pases para hoy.");
            } catch (\Exception $e) {
                $this->info("TC024: OK - No se permitió exceder el límite para hoy. " . $e->getMessage());
            }

            // Intentar romper el límite para mañana
            try {
                $this->crearCompraConPasesMultiples(
                    visitantes: [
                        [
                            'nombre' => 'Visitante Exceso Mañana',
                            'ci' => '99999998',
                            'fechas' => [
                                [
                                    'fecha' => $fechaManana,
                                    'id_parque' => $parque->id_parque,
                                    'incluye_parking' => true
                                ]
                            ]
                        ]
                    ],
                    cliente: $cliente3,
                    tarjeta: [
                        'numero' => '1234567890123456',
                        'vencimiento' => '2030-12-01',
                        'cvv' => '123',
                        'tipo' => 'D'
                    ],
                    cantVehiculos: 1
                );
                $this->error("TC024: ERROR - Se permitió exceder el límite de vehículos/pases para mañana.");
            } catch (\Exception $e) {
                $this->info("TC024: OK - No se permitió exceder el límite para mañana. " . $e->getMessage());
            }

            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    //tc025
    private function runTC025()
    {
        DB::beginTransaction();
        echo "Ejecutando TC025...\n";
        try {
            // Precios independientes para 4 parques
            Precio::create([
                'precio' => 251,
                'id_parque' => 1,
                'fecha_inicio' => now()->toDateString(),
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);
            Precio::create([
                'precio' => 300,
                'id_parque' => 2,
                'fecha_inicio' => now()->toDateString(),
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);
            Precio::create([
                'precio' => 400,
                'id_parque' => 3,
                'fecha_inicio' => now()->toDateString(),
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);
            Precio::create([
                'precio' => 500,
                'id_parque' => 4,
                'fecha_inicio' => now()->toDateString(),
                'fecha_fin' => now()->addDays(50)->toDateString()
            ]);

            $cliente = Cliente::create(['nombre' => 'Cliente TC025', 'email' => 'tc025@gmail.com', 'ci' => '99999999']);

            $visitantes = [
                [
                    'nombre' => 'Visitante Parque 1',
                    'ci' => '10000001',
                    'fechas' => [
                        [
                            'fecha' => now()->addDays(1)->toDateString(),
                            'id_parque' => 1,
                            'incluye_parking' => false
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante Parque 2',
                    'ci' => '10000002',
                    'fechas' => [
                        [
                            'fecha' => now()->addDays(1)->toDateString(),
                            'id_parque' => 2,
                            'incluye_parking' => false
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante Parque 3',
                    'ci' => '10000003',
                    'fechas' => [
                        [
                            'fecha' => now()->addDays(1)->toDateString(),
                            'id_parque' => 3,
                            'incluye_parking' => false
                        ]
                    ]
                ],
                [
                    'nombre' => 'Visitante Parque 4',
                    'ci' => '10000004',
                    'fechas' => [
                        [
                            'fecha' => now()->addDays(1)->toDateString(),
                            'id_parque' => 4,
                            'incluye_parking' => false
                        ]
                    ]
                ]
            ];

            $tarjeta = [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ];

            $compra = $this->crearCompraConPasesMultiples($visitantes, $cliente, $tarjeta, 0);

            $this->info("TC025: OK - Compra realizada con precios diferentes por parque.");
            foreach ([1, 2, 3, 4] as $idParque) {
                $parque = Parque::find($idParque);
                $this->imprimirDatos($parque, now()->addDays(1)->toDateString());
            }
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }

    private function query5()
    {
        DB::beginTransaction();
        echo "Ejecutando Query5...\n";
        try {
            $parque = Parque::find(1);
            $fechaHoy = now()->toDateString();

            // Crear precio para la fecha de hoy si no existe
            Precio::create([
                'precio' => 251,
                'id_parque' => $parque->id_parque,
                'fecha_inicio' => $fechaHoy,
                'fecha_fin' => now()->addDays(100)->toDateString()
            ]);

            // Crear 100 visitantes (mismo nombre/ci, pero distintos pases)
            $visitantes = [];
            for ($i = 0; $i < 100; $i++) {
                $visitantes[] = [
                    'nombre' => 'Visitante 100 Veces',
                    'ci' => '99999999', // mismo CI
                    'fechas' => [
                        [
                            'fecha' => now()->addMonth()->addDays($i)->toDateString(),
                            'id_parque' => $parque->id_parque,
                            'incluye_parking' => false
                        ]
                    ]
                ];
            }

            $tarjeta = [
                'numero' => '1234567890123456',
                'vencimiento' => '2030-12-01',
                'cvv' => '123',
                'tipo' => 'D'
            ];

            $this->crearCompraConPasesMultiples($visitantes, Cliente::first(), $tarjeta, 0);

            $this->info("Pases creados: 100 pases distintos para el mismo visitante (uno por fecha)\n");
            $this->info("Query5: OK - Compra de 100 pases para 1 visitante realizada con éxito.");
            $this->imprimirDatos($parque, $fechaHoy);
            DB::rollBack();
            $this->info("Datos de prueba eliminados con rollback.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("Error durante la ejecución: " . $e->getMessage());
        }
    }
    private function crearCompraConPasesMultiples(array $visitantes, Cliente $cliente, array $tarjeta, int $cantVehiculos = 0): Compra
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
                'fecha_compra' => now()->toDateString(),
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

                    $horaUso = now()->setTime(rand(10, 18), rand(0, 59), 0)->format('Y-m-d H:i:s');
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


    // private function crearCompraConPase($cliente, int $parqueId, $fechas, bool $incluyeParking, int $cantidadVehiculos = 0, int $cantPases = 1)
    // {
    //     if ($incluyeParking && $cantidadVehiculos <= 0) {
    //         throw new \Exception('Si incluye parking, la cantidad de vehiculos debe ser mayor a 0.');
    //     }
    //     $parque = Parque::find($parqueId);

    //     if (!$parque) {
    //         throw new \Exception("Parque con ID {$parqueId} no encontrado.");
    //     }

    //     // Verificaciones de capacidad (simplificadas)
    //     // $pasesEnFecha = DB::table('pase_parques')
    //     //     ->join('pase_fecha_accesos', 'pase_parques.id_pase', '=', 'pase_fecha_accesos.id_pase')
    //     //     ->where('pase_fecha_accesos.fecha_acceso', $fecha)
    //     //     ->where('pase_parques.id_parque', $parqueId)
    //     //     ->count();
    //     $capacidad = Parque::find($parqueId)->capacidad_maxima_diaria;
    //     foreach ($fechas as $fecha) {
    //         $pasesEnFecha = PaseParque::where('fecha_acceso', $fecha)
    //             ->where('id_parque', $parqueId)
    //             ->count();

    //         // echo "Capacidad: $capacidad\n";
    //         // echo "Pases en fecha: $pasesEnFecha\n";

    //         if ($pasesEnFecha >= $capacidad) {
    //             throw new \Exception('Capacidad máxima alcanzada.');
    //         }
    //     }

    //     // Verificar la capacidad de vehículos
    //     // $compraIds = DB::table('compras')
    //     //     ->join('pases', 'compras.id_compra', '=', 'pases.id_compra')
    //     //     ->join('pase_fecha_accesos', 'pases.id_pase', '=', 'pase_fecha_accesos.id_pase')
    //     //     ->where('pases.id_parque', $parqueId)
    //     //     ->where('pase_fecha_accesos.fecha_acceso', $fecha)
    //     //     ->distinct()
    //     //     ->pluck('compras.id_compra');
    //     $compraIds = Compra::join('pases', 'compras.id_compra', '=', 'pases.id_compra')
    //         ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
    //         ->where('pases.id_parque', $parqueId)
    //         ->where('pase_parques.fecha_acceso', $fecha)
    //         ->distinct()
    //         ->pluck('compras.id_compra');



    //     $vehiculosReservados = DB::table('compras')
    //         ->whereIn('id_compra', $compraIds)
    //         ->sum('cant_vehiculos');


    //     $capacidadVehiculos = DB::table('parkings')
    //         ->where('id_parque', $parqueId)
    //         ->value('limite_vehiculos');
    //     // echo "Capacidad de vehículos: $capacidadVehiculos\n";
    //     // echo "Pases con vehículo en fecha: $vehiculosReservados\n";
    //     if ($incluyeParking && $cantidadVehiculos > 0) {
    //         if ($vehiculosReservados + $cantidadVehiculos > $capacidadVehiculos) {
    //             throw new \Exception('Capacidad de vehículos alcanzada.');
    //         }
    //     }

    //     // Crear compra, pase, pase_parques, etc...
    //     $compra = Compra::create(attributes: [
    //         'id_cliente' => $cliente->id_cliente,
    //         'cant_vehiculos' => $incluyeParking ? $cantidadVehiculos : 0,
    //         'fecha' => $fecha,
    //         'hora' => now()->format('H:i:s'),
    //         'monto_total' => 100, // Ajusta según lógica de precios
    //         'cant_pases' => $cantPases,
    //         'debito_credito' => 'D',
    //         'numero_tarjeta' => '1234567890123456',
    //         'fecha_vencimiento' => '2030-12-01', // YYYY-MM-DD
    //         'cvv' => '123'
    //     ]);
    //     $pases = [];
    //     for ($index = 0; $index < $cantPases; $index++) {
    //         $pase = $this->crearPase($compra, $cliente, $parqueId, $fecha, $incluyeParking);

    //         // $fechaAcceso = DB::table('pase')
    //         //     ->where('id_pase', $pase->id_pase)
    //         //     ->value('fecha_acceso');
    //         $fechaAcceso = PaseParque::where('fecha_acceso', $fecha)
    //             ->where('id_pase', $pase->id_pase)
    //             ->value('fecha_acceso');

    //         $pases[$fechaAcceso][] = $pase;
    //     }

    //     $this->info("Compra ID: " . $compra->id_compra);
    //     //Mostrar el total de compras realizada por el cliente
    //     $this->imprimirPasesAgrupadosPorFecha($pases);
    //     $totalCompras = $this->totalCompras($cliente->id_cliente);
    //     $this->info("*******************************");
    //     $this->info("Total de compras realizadas por el cliente: " . $totalCompras);
    //     $this->info("*******************************");
    //     return $compra;
    // }

    private function totalCompras($clienteId)
    {
        return DB::table('compras')
            ->where('id_cliente', $clienteId)
            ->count();
    }
    private function crearPase($compra, $cliente, $parqueId, $fecha, $incluyeParking)
    {
        $visitante = Visitante::create([
            'nombre' => 'Visitante de ' . $cliente->id_cliente,
            'ci' => (string) fake()->unique()->numerify('########'),
        ]);
        $precio = Precio::inRandomOrder()->first();

        $pase = Pase::create([
            'id_visitante' => $visitante->id_visitante,
            'id_precio' => $precio->id_precio,
            'id_compra' => $compra->id_compra,
            'id_parque' => $parqueId,
            'codigo_qr' => 'QR' . uniqid(),
        ]);
        DB::table('pases_parques')->insert([
            'id_pase' => $pase->id_pase,
            'id_parque' => $parqueId,
            'incluye_parking' => $incluyeParking,
            'fecha_acceso' => $fecha,
        ]);
        // DB::table('pase_fecha_accesos')->insert([
        //     'id_pase' => $pase->id_pase,
        //     'fecha_acceso' => $fecha,
        // ]);

        $this->info($this->imprimirPase($pase));
        return $pase;
    }

    private function getPasesEnFecha($parqueId, $fecha)
    {
        return PaseParque::where('id_parque', $parqueId)
            ->where('fecha_acceso', $fecha)
            ->count();
    }
    private function getCapacidad($parqueId)
    {
        return Parque::find($parqueId)->capacidad_maxima_diaria;
    }
    private function getCapacidadVehiculos($parqueId)
    {
        return DB::table('parkings')
            ->where('id_parque', $parqueId)
            ->value('limite_vehiculos');
    }
    private function getPasesConVehiculo($parqueId, $fecha)
    {
        return PaseParque::where('id_parque', $parqueId)
            ->where('fecha_acceso', $fecha)
            ->where('incluye_parking', true)
            ->count();
    }
    private function getPasesSinVehiculo($parqueId, $fecha)
    {
        return PaseParque::where('id_parque', $parqueId)
            ->where('fecha_acceso', $fecha)
            ->where('incluye_parking', false)
            ->count();
    }
    private function imprimirDatos($parque, $fechas)
    {
        if (!is_array($fechas)) {
            $fechas = [$fechas];
        }
        foreach ($fechas as $fecha) {
            $this->info("Datos del parque " . $parque->nombre_parque . " para la fecha " . $fecha);
            $this->info("ID Parque: " . $parque->id_parque);
            //Precio del parque
            $precio = Precio::where('id_parque', $parque->id_parque)
                ->where('fecha_inicio', '<=', $fecha)
                ->where('fecha_fin', '>=', $fecha)
                ->value('precio');
            $this->info("Datos.");
            $this->info("Precio: " . $precio);
            $this->info("Capacidad: " . $this->getCapacidad($parque->id_parque));
            $this->info("Pases con vehiculo: " . $this->getPasesConVehiculo($parque->id_parque, $fecha));
            $this->info("Pases sin vehiculo: " . $this->getPasesSinVehiculo($parque->id_parque, $fecha));
            $this->info("Pases totales: " . $this->getPasesEnFecha($parque->id_parque, $fecha));
            $this->info("Pases disponibles: " . ($this->getCapacidad($parque->id_parque) - $this->getPasesEnFecha($parque->id_parque, $fecha)));
            $this->info("Capacidad de vehiculos: " . $this->getCapacidadVehiculos($parque->id_parque));
            $this->info("Vehículos reservados: " . $this->getVehiculosReservados($parque->id_parque, $fecha));
            $this->info("Vehiculos disponibles: " . ($this->getCapacidadVehiculos($parque->id_parque) - $this->getVehiculosReservados($parque->id_parque, $fecha)));
            $this->info("Pases en fecha:   " . $fecha . " =>  " . $this->getPasesEnFecha($parque->id_parque, $fecha));
        }
    }
    private function getVehiculosReservados($parqueId, $fecha)
    {
        return DB::table('compras')
            ->join('pases', 'compras.id_compra', '=', 'pases.id_compra')
            ->join('pase_parques', 'pases.id_pase', '=', 'pase_parques.id_pase')
            ->where('pase_parques.fecha_acceso', $fecha)
            ->where('pase_parques.id_parque', $parqueId)
            ->where('pase_parques.incluye_parking', true) // <- 🎯 Esto es lo que faltaba
            ->select('compras.id_compra', 'compras.cant_vehiculos')
            ->distinct()
            ->get()
            ->sum('cant_vehiculos');
    }



    private function imprimirPase($pase)
    {
        $fechaAcceso = PaseParque::where('id_pase', $pase->id_pase)
            ->value('fecha_acceso');

        $incluyeParking = DB::table('pases_parques')
            ->where('id_pase', $pase->id_pase)
            ->value('incluye_parking');

        $this->info("-------------------------");
        $this->info("Pase ID: " . $pase->id_pase);
        $this->info("Visitante ID: " . $pase->id_visitante);
        $this->info("Fecha de acceso: " . $fechaAcceso);
        $this->info("Incluye parking: " . ($incluyeParking ? 'Sí' : 'No'));
        $this->info("-------------------------");
    }
    private function imprimirCompra($compra)
    {
        $this->info("-------------------------");
        $this->info("Compra ID: " . $compra->id_compra);
        $this->info("Cliente ID: " . $compra->id_cliente);
        $this->info("Fecha: " . $compra->fecha);
        $this->info("Hora: " . $compra->hora);
        $this->info("Monto total: " . $compra->monto_total);
        $this->info("Cantidad de pases: " . $compra->cant_pases);
        $this->info("Débito/Crédito: " . $compra->debito_credito);
        $this->info("Número de tarjeta: " . $compra->numero_tarjeta);
        $this->info("Cantidad de vehículos: " . $compra->cant_vehiculos);
        $this->info("Fecha de vencimiento: " . $compra->fecha_vencimiento);
        $this->info("CVV: " . $compra->cvv);
        $this->info("-------------------------");
        PHP_EOL;
    }

    //Imprimir la ID de los pases, el total y su fecha (agrupar por fecha)
    private function imprimirPasesAgrupadosPorFecha($pases)
    {
        foreach ($pases as $fecha => $pasesPorFecha) {
            $this->info("****************PASES AGRUPADOS POR FECHA $fecha**************");
            $this->info("Fecha: " . $fecha);
            $this->info("Total de pases en esta fecha: " . count($pasesPorFecha));
            foreach ($pasesPorFecha as $pase) {
                $this->info("Pase ID: " . $pase->id_pase);
            }
            $this->info("-------------------------");
        }
    }

    private function getPasesReservadBos($parqueId, $fecha)
    {
        return PaseParque::where('id_parque', $parqueId)
            ->where('fecha_acceso', $fecha)
            ->count();
    }
    private function mostrarPasesEnFechaDisponiblesYResservados($parqueId, $fecha)
    {
        $this->info("****************PASES AGRUPADOS POR FECHA $fecha**************");
        $pasesReservados = $this->getPasesReservados($parqueId, $fecha);
        $pasesDisponibles = $this->getCapacidad($parqueId) - $pasesReservados;
        $vehiculosReservados = $this->getVehiculosReservados($parqueId, $fecha);
        $vehiculosDisponibles = $this->getCapacidadVehiculos($parqueId) - $vehiculosReservados;

        $this->info("Pases reservados: " . $pasesReservados);
        $this->info("Pases disponibles: " . $pasesDisponibles);
        $this->info("Vehículos reservados: " . $vehiculosReservados);
        $this->info("Vehículos disponibles: " . $vehiculosDisponibles);

        $this->info("****************FIN PASES AGRUPADOS POR FECHA $fecha**************");
    }


    public function top3EntretenimientosMasUtilizados($fechaInicio, $fechaFin)
    {

        $entret = DB::table('usas')
            ->join('atracciones', 'usas.id_atraccion', '=', 'atracciones.id_atraccion')
            ->select('atracciones.nombre', DB::raw('COUNT(usas.id_usa) as total_usos'))
            ->whereBetween('usas.fecha_usa', [$fechaInicio, $fechaFin])
            ->groupBy('atracciones.id_atraccion', 'atracciones.nombre')
            ->orderByDesc('total_usos')
            ->limit(3)
            ->get();
        echo "-------------------------\n";
        echo "Top 3 entretenimientos más utilizados entre $fechaInicio y $fechaFin:\n ";
        echo "-------------------------\n";
        foreach ($entret as $atraccion) {
            echo "Atracción: " . $atraccion->nombre . " - Total usos: " . $atraccion->total_usos . "\n";
        }
        echo "-------------------------\n";
    }
    public function query4()
    {
        // --4 - Dado el documento de un visitante devolver las fechas y parques a los que puede ingresar. Entregar la solución
        // --en un script "query04.sql".

    }

    //Agarrar el total de todos loss entretenimientos usados en un rango de fechas
    public function totalEntretenimientosUsados($fechaInicio, $fechaFin)
    {
        $total = DB::table('usas')
            ->whereBetween('fecha_usa', [$fechaInicio, $fechaFin])
            ->count();
        return $total;
    }
}

