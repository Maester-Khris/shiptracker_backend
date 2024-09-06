<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Route;

class ShippingRouteSeeder extends Seeder
{
    public function run()
    {
        // Main Shipping Routes with steps
        Route::create(['name' => 'Route principale'])
        ->steps()
        ->createMany([
            ['name' => 'Entrepot de Suisse'],
            ['name' => 'Aeroport de Paris'],
            ['name' => 'Aeroport de Yaoundé'],
            ['name' => 'Port de Kribi']
        ]);
    }
}
