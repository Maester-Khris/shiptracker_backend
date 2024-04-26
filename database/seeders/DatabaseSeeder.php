<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $routes = ShipRoute::factory(3)->create();

    }
}
