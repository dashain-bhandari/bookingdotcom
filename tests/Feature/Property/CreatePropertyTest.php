<?php

namespace Tests\Feature\Property;

use App\Models\City;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePropertyTest extends TestCase
{

    public function test_that_owners_can_create_property()
    {
        $owner = User::where('role_id', 2)->firstOrCreate();
        echo "owner ". $owner->id;
        $this->actingAs($owner);
        $response = $this->postJson('/api/properties', [
            "name" => fake()->sentence(),
            "address_street" => fake()->address(),
            "city_id" => City::inRandomOrder()->firstOrCreate()->id,
            "owner_id" => $owner->id,
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            "message",
            "data" => [
                "name",
                "owner",
                "address_street",
                "city"
            ]
        ]);
    }

    public function test_that_authenticated_user_is_owner()
    {
        $owner = User::where('role_id', 2)->firstOrCreate();
        $this->actingAs($owner);
        $response = $this->postJson('/api/properties', [
            "name" => fake()->sentence(),
            "address_street" => fake()->address(),
            "city_id" => City::inRandomOrder()->firstOrCreate()->id,
            "owner_id" => User::inRandomOrder()->first()->id,
        ]);
        $response->assertStatus(201);
        $this->assertEquals($owner->email, $response['data']['owner']['email']);
    }
    public function test_that_users_cannot_create_property()
    {
        $user = User::where('role_id', 3)->firstOrCreate();
        $this->actingAs($user);
        $response = $this->postJson('/api/properties', [
            "name" => fake()->sentence(),
            "address_street" => fake()->address(),
            "city_id" => City::inRandomOrder()->firstOrCreate()->id
        ]);
        $response->assertStatus(403);
    }
}
