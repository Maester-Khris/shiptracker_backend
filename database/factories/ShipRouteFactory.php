<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShipRouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "route_name" => $this->faker->name(),
            "route_uuid" => Str::uuid(),
            "route_points" => [
                [
                    "point_id" => $this->faker->randomDigit(),
                    "point_name" => $this->faker->name(),
                ],
                [
                    "point_id" => $this->faker->randomDigit(),
                    "point_name" => $this->faker->name(),
                ]
            ]
        ];
    }
}
