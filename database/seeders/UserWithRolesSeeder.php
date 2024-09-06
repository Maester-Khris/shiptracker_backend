<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Crypt;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserWithRolesSeeder extends Seeder
{
    public function run()
    {
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
    }
}
