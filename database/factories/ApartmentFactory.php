<?php

namespace Database\Factories;

use App\Models\ApartmentType;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
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
            "property_id" => Property::inRandomOrder()->first()->id,
            "capacity_adults" => random_int(1, 1000),
            "capacity_children" => random_int(1, 1000),
            "apartment_type_id" => ApartmentType::inRandomOrder()->first()->id,
            'size' => random_int(4000, 10000)
        ];
    }
}
