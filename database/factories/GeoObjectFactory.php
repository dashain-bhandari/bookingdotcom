<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeoObject>
 */
class GeoObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word(),
            "lat" =>$this->faker->randomFloat(7,-999,999),
            "lon" => $this->faker->randomFloat(7,-999,999),
            'city_id' => City::inRandomOrder()->first()->id
        ];
    }
}
