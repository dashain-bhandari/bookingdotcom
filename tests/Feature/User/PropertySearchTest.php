<?php

namespace Tests\Feature\User;

use App\Models\Apartment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertySearchTest extends TestCase
{
    public function test_that_all_apartments_are_returned_on_no_params()
    {
        $apartment = Apartment::factory(5)->create([
            'capacity_adults' => random_int(50, 500),
            'capacity_children' => random_int(50, 500),
        ]);
        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "message",
            "data"
        ]);
        $this->assertArrayHasKey('name', $response['data'][0]);
    }

    public function test_that_apartments_can_be_searched_by_adults()
    {
        $apartment = Apartment::factory(5)->create([
            'capacity_adults' => random_int(50, 500),
            'capacity_children' => random_int(50, 500),
        ]);
        $response = $this->getJson('/api/users?' . http_build_query([
            "adults" => 90
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure(["message", "data"]);
        $this->assertIsArray($response['data']);
        foreach ($response['data'] as $item) {
            foreach($item['apartments'] as $apartment){
                $this->assertGreaterThanOrEqual(90,$apartment['capacity_adults']);
            }
        }
    }

    public function test_that_apartments_can_be_searched_by_children()
    {
        $apartment = Apartment::factory(5)->create([
            'capacity_adults' => random_int(50, 500),
            'capacity_children' => random_int(50, 500),
        ]);
        $response = $this->getJson('/api/users?' . http_build_query([
            "children" => 90
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure(["message", "data"]);
        $this->assertIsArray($response['data']);
        foreach ($response['data'] as $item) {
            foreach($item['apartments'] as $apartment){
                $this->assertGreaterThanOrEqual(90,$apartment['capacity_children']);
            }
        }
    }

    public function test_that_apartments_can_be_searched_by_both()
    {
        $apartment = Apartment::factory(5)->create([
            'capacity_adults' => random_int(50, 500),
            'capacity_children' => random_int(50, 500),
        ]);
        $response = $this->getJson('/api/users?' . http_build_query([
            "adults" => 90,
            "children"=>200
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure(["message", "data"]);
        $this->assertIsArray($response['data']);
        foreach ($response['data'] as $item) {
          foreach($item['apartments'] as $apt){
            $this->assertGreaterThanOrEqual(90,$apt['capacity_adults']);
            $this->assertGreaterThanOrEqual(200,$apt['capacity_children']);
          }
        }
    }
}
