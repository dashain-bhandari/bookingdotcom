<?php

namespace Tests\Feature\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_that_users_can_register()
    {
        $response = $this->postJson("/api/auth/register",[
            "name"=>fake()->name,
            "email"=>fake()->email,
            "password"=>fake()->password,
            "role_id"=>array_rand([2=>2,3=>3])
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            "message",
            "data" => [
                "name",
                "email",
                "role",
                "token"
            ]
        ]);
    }

    public function test_that_admin_cannot_be_registered(){
        $response = $this->postJson("/api/auth/register",[
            "name"=>fake()->name,
            "email"=>fake()->email,
            "password"=>fake()->password,
            "role_id"=>1
        ]);
        $response->assertStatus(422);
        $response->assertJsonStructure([
            "message",
            "errors" => [
           "role_id"
            ]
        ]);
    }
}
