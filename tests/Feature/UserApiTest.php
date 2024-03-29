<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all_users_api(): void
    {
        $response = $this->withHeader('Accept', 'application/json')
                        ->withHeader('Authorization', 'Bearer 4|uRhyG2FtcVx0MFVty12u9JRCssRvpardmzfhVwEt6c7ca8b7')
                        ->getJson('/api/users');
        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'Users Retrieved Successfully',
            'data' => User::all()->toArray()
        ]);
    }

    function test_get_user_by_id_api() : void {
        $response = $this->withHeader('Accept', 'application/json')
        ->withHeader('Authorization', 'Bearer 4|uRhyG2FtcVx0MFVty12u9JRCssRvpardmzfhVwEt6c7ca8b7')
        ->getJson('/api/user/id/1');

        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Retrieved Successfully',
            'data' => User::where('id', 1)->first()->toArray()
            // why use first()? bcz first only returns the first of the particular data and returns object outside of array 
        ]);
    }

    function test_get_user_by_name_api() : void {
        $response = $this->withHeader('Accept', 'application/json')
        ->withHeader('Authorization', 'Bearer 4|uRhyG2FtcVx0MFVty12u9JRCssRvpardmzfhVwEt6c7ca8b7')
        ->getJson('/api/user/name/rena');

        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Retrieved Successfully',
            'data' => User::where('name', 'like' ,'%rena%')->first()->toArray()
        ]);
    }

    function test_get_user_by_username_api() : void {
        $response = $this->withHeader('Accept', 'application/json')
        ->withHeader('Authorization', 'Bearer 4|uRhyG2FtcVx0MFVty12u9JRCssRvpardmzfhVwEt6c7ca8b7')
        ->getJson('/api/user/username/ren');

        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Retrieved Successfully',
            'data' => User::where('username', 'like' ,'%ren%')->first()->toArray()
        ]);
    }

    function test_get_user_by_email_api() : void {
        $response = $this->withHeader('Accept', 'application/json')
        ->withHeader('Authorization', 'Bearer 4|uRhyG2FtcVx0MFVty12u9JRCssRvpardmzfhVwEt6c7ca8b7')
        ->getJson('/api/user/email/ren');

        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Retrieved Successfully',
            'data' => User::where('email', 'like' ,'%ren%')->first()->toArray()
        ]);
    }
    
    function test_delete_user_api() : void {
        $response = $this->withHeader('Accept', 'application/json')
        ->withHeader('Authorization', 'Bearer 15|Oaitdm48bETI4OABuvqisNlV1EKM09qAT8Z4dZts75ab9ffe')
        ->deleteJson('/api/user/3');

        $response->assertJson([
            'success' => true,
            'code' => 200,
            'message' => 'User Deleted Successfully',
            'data' => null
        ]);
    }


}
