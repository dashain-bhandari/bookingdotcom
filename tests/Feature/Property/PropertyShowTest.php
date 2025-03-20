<?php

namespace Tests\Feature\Property;

use App\Models\Apartment;
use App\Models\Facility;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyShowTest extends TestCase
{
    public function test_that_property_is_returned_with_facility_and_apts()
    {
        $property = Property::factory()->create();
        $apartment = Apartment::factory()->create([
            'property_id' => $property->id
        ]);
        $facility = Facility::factory()->create();
        $apartment->facilities()->attach($facility->id);
        $response = $this->getJson('/api/properties/' . $property->id);
        $response->assertStatus(200);
        $facilities = $response['data']['apartments'][0];
        $this->assertArrayHasKey('facilities', $facilities);
        $this->assertIsArray($facilities);
        $this->assertEquals(count($facilities['facilities']), 1);
    }
}
