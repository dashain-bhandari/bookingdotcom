<?php

namespace Tests\Feature\Property;

use App\Models\City;
use App\Models\Country;
use App\Models\GeoObject;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FindAllTest extends TestCase
{
    public $city;
    public $country;
    public $geoobject;
    public $user;
    public function setUp(): void
    {
        parent::setUp();
        $this->country = Country::factory()->create();
        $this->city = City::factory()->create([
            "country_id"=>$this->country->id
        ]);
        $this->geoobject = GeoObject::factory()->create([
            "city_id"=>$this->city->id
        ]);
        $this->user=User::factory()->create([
            "role_id"=>2
        ]);
    }
    public function test_that_properties_can_be_searched_by_city() {
        $property=Property::factory()->create([
            'city_id'=>$this->city->id,
           'owner_id'=>$this->user->id
        ]);
        $response=
        $this->withHeaders([
            'accept' => 'application/json',
        ])->
        get('/api/properties?'.http_build_query([
            "city"=>$this->city->id
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "message"
        ]);
        $this->assertIsArray($response["data"]);
        $this->assertEquals(count($response["data"]),1);
        
        $this->assertEquals($response["data"][0]["id"],$property->id);
    }
    public function test_that_properties_can_be_searched_by_country() {
      
        $property=Property::factory()->create([
            'city_id'=>$this->city->id,
           "owner_id"=>$this->user->id
        ]);
        $response=$this->getJson('/api/properties?'.http_build_query([
            "country"=>$this->country->id
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "message"
        ]);
        $this->assertIsArray($response["data"]);
        $this->assertEquals(count($response["data"]),1);
        $this->assertEquals($response["data"][0]["id"],$property->id);
    }
    public function test_that_properties_can_be_searched_by_geoobject() {
        $this->actingAs($this->user);
       
        $property=Property::factory()->create([
           'lat'=>$this->geoobject->lat,
           'lon'=>$this->geoobject->lon,
           "owner_id"=>$this->user->id
        ]);
        $response=$this->getJson('/api/properties?'.http_build_query([
            "geoObject"=>$this->geoobject->id
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "data",
            "message"
        ]);
        $this->assertIsArray($response["data"]);
        $this->assertEquals(count($response["data"]),1);
        $this->assertEquals($response["data"][0]["id"],$property->id);
    }
}
