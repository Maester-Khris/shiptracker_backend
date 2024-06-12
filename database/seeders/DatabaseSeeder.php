<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\ShipRoute;
use App\Models\ShipPackage;
use App\Models\Shipping;
use App\Models\User;

use App\Models\Route;
use App\Models\Step;
use Illuminate\Support\Facades\Crypt;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /** ========== v1 =====================
         * DB Initialisation: 
         * create roles staff, administrator, user guest
         * create admin user and give role administrator
         * create staff user and give role staff
         * create main route and steps of the main routes
        */  

        $faker = Faker::create();
        $numswiss = ['+41 76 123 45 67',
        '+41 44 234 56 78',
        '+41 31 987 65 43',
        '+41 22 654 32 10',
        '+41 81 543 21 98'];
        $numcamer = ['+33 6 12 34 56 78',
        '+33 1 23 45 67 89',
        '+33 4 98 76 54 32',
        '+33 5 67 89 01 23',
        '+33 2 34 56 78 90'];
        $numfrance = ['+237 6 12 34 56 78',
        '+237 2 34 56 78 90',
        '+237 9 87 65 43 21',
        '+237 3 21 54 76 98',
        '+237 7 65 43 21 09'];
        
        // =========================== Database Initilisation ==============================
        // 0- Roles
        $adminrole = Role::create(['name' => 'Admin']);
        $staffrole = Role::create(['name' => 'Staff member']);
        $guestrole = Role::create(['name' => 'Guest user']);

        // 1- Work account, Routes with steps
        $admin = User::create([
            "name" => "Admin Olbizgo",
            "password" => Hash::make('test admin'),
            "telephone" => $faker->randomElement($numswiss),
            "email" => "admin@olbizgo.com",
        ])->assignRole($adminrole);
        $staff_member = User::create([
            "name" => "Nathan C",
            "password" => Crypt::encryptString('test staff'),
            "telephone" => $faker->randomElement($numcamer),
            "email" => "nathan@olbizgo.com"
        ])->assignRole($staffrole);
        $staff_member2 = User::create([
            "name" => "Joel N",
            "password" => Crypt::encryptString('test staff'),
            "telephone" => $faker->randomElement($numcamer),
            "email" => "joel@olbizgo.com"
        ])->assignRole($staffrole);

        // 2- Guest account,
        $guest = User::create([
            "name" => "Franklin Dubois",
            "password" => Crypt::encryptString('test guest'),
            "telephone" => $faker->randomElement($numfrance),
            "email" => "franklin@gmail.com"
        ])->assignRole($guestrole);

        // 3- Routes with steps
        Route::create(['name' => 'Route principale'])
            ->steps()
            ->createMany([
                ['name' => 'Entrepot de Suisse'],
                ['name' => 'Aeroport de Paris'],
                ['name' => 'Aeroport de Yaoundé'],
                ['name' => 'Port de Kribi']
            ]);


        /** ============ Shipping process V1.2 =================
         * create shipping
         * launch shipping
         * update status
         * update step point
        */
        
        // 1- create shipping with basic info: sender, receiver, code and packages 
        // $packages = ShipPackage::factory(3)->create();
        // $shipping = Shipping::create([
        //     'sender' => $faker->name(),
        //     'sender_telephone' => $faker->name(),
        //     'receiver' => $faker->name(),
        //     'receiver_telephone' => $faker->name(),
        //     "receiver_address" => $faker->name(),
        //     "delivery_town" => $faker->name(),
        //     'reference_exp' => $faker->randomNumber(8, true),
        // ])->packages()->saveMany($packages);
        

        // 2- update shipping: Launch
        // $today = Carbon::now();
        // $route = Route::find(1);
        // $route_first_step = $route->steps()->orderBy('created_at', 'asc')->first();

        // $shipping = Shipping::where("reference_exp","60096236")->first();
        // $shipping->departure_date = $today;
        // $shipping->codebar_url = $faker->name(); 
        // $shipping->codebar_digit = $faker->randomNumber(8, true);
        // $shipping->status_exp = "ON WAY";
        // $shipping->save();

        // DB::table('shipping_step')
        //     ->insert([
        //         'shipping_id' => $shipping->id, 
        //         'step_id' => $route_first_step->id,
        //         'step_running' => true,
        //         'step_launched' => Carbon::today()
        //     ]);


        // 3- update route point(ship code and new pointid)
        // $stepid=2;
        // $shipping = Shipping::where("reference_exp","87733873")->first();
        // DB::table('shipping_step')
        //     ->where('shipping_id', $shipping->id)
        //     ->where('step_running', true)
        //     ->update(['step_running' => false]);

        // DB::table('shipping_step')
        //     ->insert([
        //         'shipping_id' => $shipping->id, 
        //         'step_id' => $stepid,
        //         'step_running' => true,
        //         'step_launched' => Carbon::today()
        //     ]);

        // 4- update status
        // if status == arrived update arrived date
        // $status = "COOl";
        // $shipping = Shipping::where("reference_exp","87733873")->first();
        // $shipping->status_exp =  $status;
        // if($status == "ARRIVED"){
        //     $shipping->arrival_date = Carbon::now();
        // }
        // $shipping->save();
    }
}
