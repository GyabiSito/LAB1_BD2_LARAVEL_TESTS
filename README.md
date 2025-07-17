# 🍙 LabBD2 - Test Cases para Parque de Diversiones

Proyecto Laravel para testear automáticamente distintos escenarios sobre la base de datos del laboratorio 1 de **Bases de Datos 2 (2025)**.

## 🚀 ¿Qué hace este proyecto?

Simula compras de pases y validaciones de límites en un sistema de gestión para un parque de diversiones, mediante un comando interactivo de consola.

## 🧪 ¿Cómo se ejecuta?

Desde la raíz del proyecto:

```bash
php artisan testcases:runner
```

Se despliega un menú con más de 20 casos de prueba distintos:

```
[0 ] TC001 - Comprar 1 pase sin vehiculo
[1 ] TC002 - Comprar 1 pase con vehiculo
[5 ] TC006 - Comprar 100 pases y validar límite
[13] TC014 - Comprar 1 pase para 4 días y 1 vehículo para 2 de ellos
[28] Query5: Comprar 100 pases para 1 visitante
...
```

Cada test ejecuta inserts y validaciones sobre el modelo relacional.

## 🛠️ Requisitos

- PHP 8.2
- Laravel 11
- PostgreSQL (corriendo localmente o vía Docker)
- `.env` configurado con tu conexión a la base de datos

## 📁 Estructura relevante

```
app/
├── Console/
│   └── Commands/
│       └── TestCasesRunner.php    # Menú y lógica principal de testeo
database/
├── seeders/
│   └── TestDataSeeder.php         # Datos auxiliares
routes/
└── console.php                    # Registro del comando Artisan
```

## ✍️ Autor

José Gabriel Hernández
