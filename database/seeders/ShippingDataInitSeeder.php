<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Route;
use App\Models\Shipping;
use App\Models\ShipPackage;

use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Traits\ShippingOperation;

class ShippingDataInitSeeder extends Seeder
{
    use ShippingOperation;

    public function run()
    {
        $faker = Faker::create();

        // Usual Shipping Data init 
        // $packages = ShipPackage::factory(3)->create();
        // $shipping = new Shipping();
        // $shipping->sender = $faker->name();
        // $shipping->sender_telephone =$faker->name();
        // $shipping->receiver = $faker->name();
        // $shipping->receiver_telephone = $faker->name();
        // $shipping->receiver_address =$faker->name();
        // $shipping->delivery_town = $faker->name();
        // $shipping->reference_exp = $faker->randomNumber(8, true);
        // $shipping->codebar_url = $faker->name(); 
        // $shipping->codebar_digit = $faker->name();
        // $shipping->save();
        // $shipping->packages()->saveMany($packages);


        //============ Special Shipping Data init for statistic test ==============
        $nbshiptogenerate=10;
        $nblastmonth=6;

        

        for($i=0; $i<=$nbshiptogenerate; $i++){
            $now = Carbon::now();
            $starting = Carbon::now()->subMonths(rand(0, 6));
            $packages = ShipPackage::factory(3)->create();
            $shipping = new Shipping();
            $shipping->sender = $faker->name();
            $shipping->sender_telephone =$faker->name();
            $shipping->receiver = $faker->name();
            $shipping->receiver_telephone = $faker->name();
            $shipping->receiver_address =$faker->name();
            $shipping->delivery_town = $faker->name();
            $shipping->reference_exp = $faker->randomNumber(8, true);
            $shipping->codebar_url = $faker->name(); 
            $shipping->codebar_digit = $faker->name();
            $shipping->created_at = $now->copy()->subDays(rand(1, 100));
            $shipping->departure_date =  $starting;
            $shipping->arrival_date = $starting->copy()->addMonths(rand(1, 3));
            $shipping->save();
            $shipping->packages()->saveMany($packages);
        }

    }
}
