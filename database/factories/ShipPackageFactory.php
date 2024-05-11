<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShipPackage>
 */
class ShipPackageFactory extends Factory
{
    public function definition()
    {
        return [
            "reference_num" =>  $this->faker->randomNumber(6, true),
            "description" => $this->faker->sentence(15),
            "weight" => $this->faker->randomNumber(2, false),
        ];
    }
}
