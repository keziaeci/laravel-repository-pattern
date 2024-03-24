<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register_api(): void
    {
        $response = $this->withHeader('Accept', 'application/json')
                        ->postJson('/api/user/register', [
                            // 'name' => 'Daneshevsky',
                            // 'username' => 'dan',
                            // 'email' => 'dan@gmail.com',
                            'name' => fake()->name(),
                            'username' => fake()->word(),
                            'email' => fake()->email(),
                            'password' => '123',
                            'email_verified_at' => null
                        ]);
        
        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Created Successfully',
            'data' => User::latest()->first()->toArray()
            // 'data' => User::where('name' , 'like' , '%dan%')->first()->toArray()
        ]);
    }

    function test_login_api() : void {
        $response = $this->withHeader('Accept', 'application/json')
                        ->postJson('/api/login', [
                            'username' => 'dan',
                            'password' => '123',
                        ]);
        
        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Logged In Successfully',
            'data' => User::where('name' , 'like' , '%dan%')->select('name','username','email')->first()->toArray(),
        ]);
    }

    function test_logout_api() : void {
        $response = $this->withHeaders([
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer 14|xTNxozBrY6ir5o9IPrLvsZ2M5a6Dh1nFysriNJmG951df182'
                        ])
                        ->postJson('/api/logout');
        
        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Logged Out Successfully',
        ]);
    }
}
