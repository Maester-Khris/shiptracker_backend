<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => 'test ' .$this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => '+2376' . $this->faker->randomNumber(8,true),
            'email_verified_at' => now(),
            'password' => 'test users',
            'remember_token' => Str::random(10),
        ];
    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
