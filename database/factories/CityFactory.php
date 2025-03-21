<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>$this->faker->word(),
            "lat"=>$this->faker->randomFloat(7,-999,999),
            "lon"=>$this->faker->randomFloat(7,-999,999),
            'country_id'=>Country::inRandomOrder()->first()->id
        ];
    }
}
