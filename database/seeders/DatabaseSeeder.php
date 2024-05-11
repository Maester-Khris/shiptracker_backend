<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\ShipRoute;
use App\Models\ShipPackage;
use App\Models\Shipping;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /**
         * Test Scenario
         * 0- create users
         * 1- create a route with 2 steps
         * 3- create 3 package
         * 4- create a new shipping
         * Note: add uuid code on package and sjippong
        */

        $faker = Faker::create();
        $users = User::factory(2)->create();
        
        // $routes = ShipRoute::factory(3)->create();
        $routes = [];
        for($i=0; $i<2; $i++){
            $routepointdata = 
            $route = ShipRoute::create([
                "route_name" => "Route Commerciale No".$i, 
                "route_points" =>[
                    [
                        "point_id" => 1,
                        "point_name" => "Aéoroport de Marseille",
                    ],
                    [
                        "point_id" => 2,
                        "point_name" => "Checkpoint Paris",
                    ],
                    [
                        "point_id" => 3,
                        "point_name" => "Port de Lomé",
                    ],
                    [
                        "point_id" => 4,
                        "point_name" => "Port de Douala",
                    ]
                ],
                "route_uuid" => Str::uuid()
            ]);
            $routes[] = $route;
        }

        for($i=0; $i<=4; $i++){
            $packages = ShipPackage::factory(3)->create();
            $user = $faker->randomElement($users);
            $route = $faker->randomElement($routes);
            $shipping = Shipping::create([
                'reference_exp' => "SHIP". $faker->randomNumber(8, true),
                'sender' => $faker->name(),
                'receiver' => $faker->name(),
                'codebar_digit' => $faker->randomNumber(8, true),
                'actual_point_id' => $route->route_points[0]['point_id'],
                'route_uuid' => $route->route_uuid,
                'user_id' => $user->id,
                'departure_date' => Carbon::now(),
            ])->packages()
                ->saveMany($packages);
        }

    }
}
