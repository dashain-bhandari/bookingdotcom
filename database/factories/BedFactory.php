<?php

namespace Database\Factories;

use App\Models\BedType;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bed>
 */
class BedFactory extends Factory
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
            'bed_type_id'=>BedType::inRandomOrder()->first()->id,
            'room_id'=>Room::inRandomOrder()->first()->id,

        ];
    }
}
