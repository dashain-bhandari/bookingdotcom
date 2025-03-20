<?php

namespace Tests\Feature\Apartment;

use App\Models\Property;
use App\Models\User;
use App\RoleEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApartmentTest extends TestCase
{
    public function test_that_apartment_can_be_created()
    {
        $owner = User::factory()->create([
            'role_id' => RoleEnum::OWNER->value
        ]);
        $this->actingAs($owner, 'sanctum');
        $response = $this->postJson('/api/apartments', [
            'name' => fake()->name,
            'property_id' => Property::inRandomOrder()->first()->id,
            'capacity_adults' => random_int(1, 1000),
            'capacity_children' => random_int(1, 1000)
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            "message",
            "data" => [
                "name",
                "capacity_adults",
                "capacity_children",
            ]
        ]);
    }
}
