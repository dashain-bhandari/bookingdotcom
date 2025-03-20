<?php

namespace Tests\Feature;

use App\Models\User;
use App\RoleEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingsTest extends TestCase
{
    public function test_user_has_access_to_bookings_feature()
    {
        $user = User::factory()->create(['role_id' => RoleEnum::USER]);
        $response = $this->actingAs($user,"sanctum")->getJson('/api/bookings');

        $response->assertStatus(200);
    }

    public function test_property_owner_does_not_have_access_to_bookings_feature()
    {
        $owner = User::factory()->create(['role_id' => RoleEnum::OWNER]);
        $response = $this->actingAs($owner)->getJson('/api/bookings');

        $response->assertStatus(403);
    }
}
