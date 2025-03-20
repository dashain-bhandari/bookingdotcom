<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>$this->faker->sentence(),
            "address_street"=>$this->faker->streetAddress(),
            "city_id"=>City::inRandomOrder()->first()->id,
            "owner_id"=>User::inRandomOrder()->first()->id,
        ];
    }
}
