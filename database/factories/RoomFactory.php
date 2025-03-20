<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'room_type_id' => RoomType::inRandomOrder()->first()->id,
            'apartment_id' => Apartment::inRandomOrder()->first()->id
        ];
    }
}
