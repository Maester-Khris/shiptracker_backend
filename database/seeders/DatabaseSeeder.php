<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Route;
use App\Models\Shipping;
use App\Models\ShipPackage;

use Spatie\Permission\Models\Role;

use Hash;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserWithRolesSeeder::class,
            ShippingRouteSeeder::class,
            ShippingDataInitSeeder::class
        ]);
        

        
    }
}


/** ========== v1 =====================
 * DB Initialisation: 
 * create roles staff, administrator, user guest
 * create admin user and give role administrator
 * create staff user and give role staff
 * create main route and steps of the main routes
*/  

/** ============ Shipping process V1.2 =================
 * create shipping
 * launch shipping
 * update status
 * update step point
*/

// 1- create shipping with basic info: sender, receiver, code and packages 
// $today = Carbon::now();
// $route = Route::find(1);
// $route_first_step = $route->steps()->orderBy('created_at', 'asc')->first();
// $shipping = Shipping::where("reference_exp","60096236")->first();
// $shipping->departure_date = $today;
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